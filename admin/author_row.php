<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = $pdo->prepare("SELECT * FROM author WHERE id_auth = '$id'") ;
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);
		echo json_encode($row);
	}
?>