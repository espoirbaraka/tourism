<?php
include '../includes/sessionconnected.php';

if(isset($_POST['payer'])){
    $montant = $_POST['nombre'];
    $id = $_POST['id'];

    $conn = $pdo->open();
    try{
        $stmt = $conn->prepare("UPDATE tbl_reservation SET Status=:status WHERE CodeReservation=:id");
        $stmt->execute(['status'=>1, 'id'=>$_POST['id']]);
        if($stmt){
            $stmt = $conn->prepare("INSERT INTO tbl_paiement(Montant,CodeReserv) VALUES (:montant,:id)");
            $stmt->execute(['montant'=>$montant, 'id'=>$id]);
        }
        $_SESSION['success'] = 'Payement effectué';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
}
else{
    $_SESSION['error'] = 'Compléter le formulaire d\'ajout materiel';
}

header('location: ../paiement');

?>
