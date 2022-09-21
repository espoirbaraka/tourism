<?php
	include 'conn.php';
	session_start();

	if(!isset($_SESSION['UserConnect']) || trim($_SESSION['UserConnect']) == ''){
		header('location: ./index.php');
		exit();
	}

	$conn = $pdo->open();
	$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE CodeUser=:code");
	$stmt->execute(['code'=>$_SESSION['UserConnect']]);
	$user = $stmt->fetch();

	$pdo->close();

?>