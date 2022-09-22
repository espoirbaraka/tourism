<?php
include '../includes/sessionconnected.php';

if(isset($_POST['edit'])){
    $categorie = $_POST['categorie'];
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("UPDATE tbl_categorie SET Categorie=:categorie WHERE CodeCategorie=:id");
        $stmt->execute(['categorie'=>$categorie, 'id'=>$id]);
        $_SESSION['success'] = 'Categorie modifié';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../categorie_site');

?>
