<?php
include '../includes/sessionconnected.php';

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = htmlspecialchars(sha1($_POST['password']));

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("INSERT INTO tbl_user(username, email, password) 
												VALUES(:username, :email, :password)");
        $stmt->execute(['username'=>$username, 'email'=>$mail, 'password'=>$password]);
        $_SESSION['success'] = 'Utilisateur crée';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../user.php');

?>
