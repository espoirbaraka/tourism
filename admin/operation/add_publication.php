<?php
	include '../includes/sessionconnected.php';

	if(isset($_POST['ajouter'])){
		$titre = $_POST['titre'];
		$contenue = $_POST['contenue'];
		$type = $_POST['type'];
		$categorie = $_POST['categorie'];
		$user = $_SESSION['UserConnect'];
		$today = date('Y-m-d');
		$filename = $_FILES['photo']['name'];

		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);
		}

		$conn = $pdo->open();
			try{
                $stmt = $conn->prepare("INSERT INTO tbl_publication(titre, description, photo, count_seen, created_on, created_by, code_categ, code_type) 
												VALUES(:titre, :description, :photo, :count, :today, :user, :categ, :type)");
                $stmt->execute(['titre'=>$titre, 'description'=>$contenue, 'photo'=>$filename, 'count'=>0, 'today'=>$today, 'user'=>$user, 'categ'=>$categorie, 'type'=>$type]);
				$_SESSION['success'] = 'Article publié';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
	}

	header('location: ../publication.php');

?>
