<?php
include 'conn.php';
session_start();

if(!isset($_SESSION['id_client']) || trim($_SESSION['id_client']) == ''){
    header('location: ./connection.php');
    exit();
}

$conn = $pdo->open();

$pdo->close();

?>