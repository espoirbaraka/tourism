<?php
include '../includes/sessionconnected.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM tbl_commentaire_pub WHERE CodeComment=:id");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();

    $pdo->close();

    echo json_encode($row);
}
?>