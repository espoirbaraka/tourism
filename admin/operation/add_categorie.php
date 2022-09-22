<?php
include '../includes/sessionconnected.php';

if(isset($_POST['add'])){
    $categorie = $_POST['categorie'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("INSERT INTO tbl_categorie(Categorie) 
												VALUES(:categorie)");
        $stmt->execute(['categorie'=>$categorie]);
        $_SESSION['success'] = 'Categorie ajoutée';
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
