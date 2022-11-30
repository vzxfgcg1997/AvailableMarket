<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$id = $_POST['id'];
		$add_authd = $_POST['add_authd'];
		$add_name = $_POST['add_name'];
		$add_email = $_POST['add_email'];
		$add_phone = $_POST['add_phone'];

		$sql =$pdo->prepare("INSERT INTO `author`( `description`, `name`, `email`, `phone`)	VALUES ('$add_authd','$add_name','$add_email','$add_phone')");
		if($sql->execute()){
			$_SESSION['success'] = 'تمت الإضافة بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر';
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: author.php');

?>