<?php
include '../includes/sessionconnected.php';

if(isset($_POST['edit'])){
    $password = htmlspecialchars(sha1($_POST['password']));
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("UPDATE tbl_user SET password=:password WHERE id=:id");
        $stmt->execute(['password'=>$password, 'id'=>$id]);
        $_SESSION['success'] = 'Mot de passe modifié';
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
