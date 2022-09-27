<?php
include '../admin/includes/sessionclient.php';

if(isset($_POST['annuler'])){
    $reserv = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("DELETE FROM tbl_reservation WHERE CodeReservation=:code");
        $stmt->execute(['code'=>$reserv]);
        $_SESSION['success'] = 'Votre commande a été annulée!!!';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../cli_dashboard');

?>
