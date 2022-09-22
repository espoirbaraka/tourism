<?php
include '../includes/sessionconnected.php';

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $password = htmlspecialchars(sha1($_POST['password']));

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("INSERT INTO tbl_user(Username, Password) 
												VALUES(:username, :password)");
        $stmt->execute(['username'=>$username, 'password'=>$password]);
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

header('location: ../user');

?>
