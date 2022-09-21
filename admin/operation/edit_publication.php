<?php
include '../includes/sessionconnected.php';

if(isset($_POST['add'])){
    $titre = $_POST['titre'];
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("UPDATE tbl_publication SET titre=:titre WHERE id=:id");
        $stmt->execute(['titre'=>$titre, 'id'=>$id]);
        $_SESSION['success'] = 'Article modifié';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../publication.php');

?>
