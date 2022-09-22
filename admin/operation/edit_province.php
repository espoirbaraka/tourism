<?php
include '../includes/sessionconnected.php';

if(isset($_POST['edit'])){
    $province = $_POST['province'];
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("UPDATE tbl_province SET Province=:province WHERE CodeProvince=:id");
        $stmt->execute(['province'=>$province, 'id'=>$id]);
        $_SESSION['success'] = 'Province modifié';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../province');

?>
