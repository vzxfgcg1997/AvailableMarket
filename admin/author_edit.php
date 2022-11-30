<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$edit_authd = $_POST['edit_authd'];
		$edit_name = $_POST['edit_name'];
		$edit_email = $_POST['edit_email'];
		$edit_phone = $_POST['edit_phone'];
		$sql =$pdo->prepare("UPDATE `author` SET `description`='$edit_authd',`name`='$edit_name',`email`='$edit_email',`phone`='$edit_phone' WHERE id_auth = '$id'");
		if($sql->execute()){
			$_SESSION['success'] = 'تم تعديل المؤلف بنجاح';
		}
		else{
			$_SESSION['error'] = $sql->error;
		}
	}
	else{
		$_SESSION['error'] = 'اختر مؤلف لتعديله';
	}

	header('location:author.php');

?>