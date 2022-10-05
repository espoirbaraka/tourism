<?php
include '../includes/sessionconnected.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM tbl_reservation
                                        INNER JOIN tbl_site
                                        ON tbl_reservation.CodeSite=tbl_site.CodeSite
                                        INNER JOIN tbl_client
                                        ON tbl_reservation.CodeClient=tbl_client.CodeClient
                                        LEFT JOIN tbl_paiement
                                        ON tbl_reservation.CodeReservation=tbl_paiement.CodeReserv
                                        WHERE CodeReservation=:id");
    $stmt->execute(['id'=>$id]);
    $row = $stmt->fetch();

    $pdo->close();

    echo json_encode($row);
}
?>