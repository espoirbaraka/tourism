<?php
include '../includes/sessionconnected.php';

if(isset($_POST['edit'])){
    $nom = $_POST['nom'];
    $postnom = $_POST['postnom'];
    $prenom = $_POST['prenom'];
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("UPDATE tbl_client SET NomClient=:nom, PostnomClient=:postnom, PrenomClient=:prenom WHERE CodeClient=:id");
        $stmt->execute(['nom'=>$nom, 'postnom'=>$postnom, 'prenom'=>$prenom, 'id'=>$id]);
        $_SESSION['success'] = 'Client modifié';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../client');

?>
