<?php
include '../includes/sessionconnected.php';

if(isset($_POST['edit'])){
    $categorie = $_POST['categorie'];
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("UPDATE tbl_site SET Designation=:designation, Adresse=:adresse, Longitude=:longitude, Latitude=:latitude, Prevision=:prix, TempsPrevision=:temps, Gestionnaire=:gestionnaire WHERE CodeSite=:id");
        $stmt->execute(['designation'=>$_POST['designation'], 'adresse'=>$_POST['adresse'], 'longitude'=>$_POST['longitude'], 'latitude'=>$_POST['latitude'],'prix'=>$_POST['prix'],'temps'=>$_POST['temps'],'gestionnaire'=>$_POST['gestionnaire']]);
        $_SESSION['success'] = 'Site modifié';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../site');

?>
