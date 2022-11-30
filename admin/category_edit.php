<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		$sql =$pdo->prepare("UPDATE catgories SET name = '$name' WHERE id = '$id'");
		if($sql->execute()){
			$_SESSION['success'] = 'تم التحديث الفئة';
		}
		else{
			$_SESSION['error'] = $sql->error;
		}
	}
	else{
		$_SESSION['error'] = 'اختر فئة لتعديلها';
	}

	header('location:category.php');

?>