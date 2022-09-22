<?php
include '../includes/sessionconnected.php';

if(isset($_POST['add'])){
    $province = $_POST['province'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("INSERT INTO tbl_province(Province) 
												VALUES(:province)");
        $stmt->execute(['province'=>$province]);
        $_SESSION['success'] = 'Province ajoutée';
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
