<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: index.php');
	}

	$chek =$pdo->prepare("SELECT * FROM usre WHERE id = '".$_SESSION['admin']."'");
	$chek->execute();
	$user = $chek->fetch(PDO::FETCH_OBJ);
	
?>