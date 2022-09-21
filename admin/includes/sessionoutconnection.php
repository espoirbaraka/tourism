<?php
	include './includes/conn.php';
	session_start();


	if(isset($_SESSION['UserConnect'])){
		header('location: home');
	}

?>