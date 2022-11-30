<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql =$pdo->prepare("DELETE FROM `author` WHERE id_auth = '$id'") ;
		if($sql->execute()){
			$_SESSION['success'] = 'تم حذف المؤلف بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر';
		}
	}
	else{
		$_SESSION['error'] = 'اختر مؤلف لحذفه';
	}

	header('location: author.php');
	
?>