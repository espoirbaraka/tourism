<?php
include '../includes/sessionconnected.php';

if(isset($_POST['add'])){

    $conn = $pdo->open();
    $site = $_POST['id'];
    try{
        $filename = $_FILES['photo']['name'];

        if(!empty($filename)){
            move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$filename);
        }

        $stmt = $conn->prepare("UPDATE tbl_categorie SET Image=:image WHERE CodeCategorie=:code");
        $stmt->execute(['image'=>$filename, 'code'=>$_POST['id']]);
        $_SESSION['success'] = 'Image ajoutée';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header("location: ../categorie_site.php");

?>
