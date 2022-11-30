<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql =$pdo->prepare("SELECT *, book.id AS bookid FROM book LEFT JOIN catgories ON catgories.id=book.Category WHERE book.id = '$id'") ;
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_OBJ);

		echo json_encode($row);
	}
?>