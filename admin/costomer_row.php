<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql =$pdo->prepare("SELECT * FROM `costomer` WHERE id_cust = '$id'");
		/*$query = $conn->query($sql);*/
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		echo json_encode($row);
	}
?>