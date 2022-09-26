<?php
include '../includes/sessionconnected.php';

if(isset($_POST['add'])){

    $conn = $pdo->open();
    try{
        $filename = $_FILES['photo']['name'];

        if(!empty($filename)){
            move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);
        }
        $stmt = $conn->prepare("INSERT INTO tbl_site(Designation,Description,Adresse,Longitude,Latitude,Prevision,TempsPrevision,Gestionnaire,CodeCategorie,Image, CodeProvince) 
												VALUES(:designation, :description, :adresse, :longitude, :latitude, :prix, :temps, :gestionnaire, :categorie, :image, :province)");
        $stmt->execute(['designation'=>$_POST['designation'], 'description'=>$_POST['description'], 'adresse'=>$_POST['adresse'], 'longitude'=>$_POST['longitude'], 'latitude'=>$_POST['latitude'],'prix'=>$_POST['prix'],'temps'=>$_POST['temps'],'gestionnaire'=>$_POST['gestionnaire'],'categorie'=>$_POST['categorie'],'image'=>$filename,'province'=>$_POST['province']]);
        $_SESSION['success'] = 'Site ajouté';
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
