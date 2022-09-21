<?php
	include 'includes/sessionoutconnection.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = htmlspecialchars(sha1($_POST['password']));
		try{
			$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE Username = ? AND Password = ?");
            $stmt->execute(array($email,$password));
			$nbre = $stmt->rowCount();
			
			if($nbre == 1){
				$row = $stmt->fetch();
				$id = $row['id'];
				$today = date('Y-m-d');
				$_SESSION['UserConnect'] = $row['id'];
				$stmt = $conn->prepare("UPDATE tbl_user SET last_connection=? WHERE CodeUser=?");
				$stmt->execute(array($today,$id));
			}
			else{
				$_SESSION['error'] = 'Utilisateur inexistant';
			}
		}
		catch(PDOException $e){
			echo "Erreur de connexion: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Entrez vos identifiants de connexion d\'abord';
	}

	$pdo->close();
	header('location: index.php')