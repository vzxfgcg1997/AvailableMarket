<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql =$pdo->prepare("SELECT * FROM `user` WHERE id = '$id'");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		echo json_encode($row);
	}
?>