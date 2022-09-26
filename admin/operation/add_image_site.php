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

        $stmt = $conn->prepare("INSERT INTO tbl_photo(Photo,CodeSite) 
												VALUES(:photo, :site)");
        $stmt->execute(['photo'=>$filename, 'site'=>$_POST['id']]);
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

header("location: ../detail_site.php?code=$site");

?>
