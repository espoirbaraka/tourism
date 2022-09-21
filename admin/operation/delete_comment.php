<?php
include '../includes/sessionconnected.php';

if(isset($_POST['remove'])){
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("DELETE FROM tbl_commentaire_pub WHERE CodeComment=:id");
        $stmt->execute(['id'=>$id]);
        $_SESSION['success'] = 'Commentaire supprimé';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../commentaire.php');

?>
