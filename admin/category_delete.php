<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql =$pdo->prepare("DELETE FROM catgories WHERE id = $id");
		if($sql->execute()){
			$_SESSION['success'] = 'تم حذف الفئة بنجاح';
		}
		else{
			$_SESSION['error'] = $sql->error;
		}
	}
	else{
		$_SESSION['error'] = 'اختر فئة لحذفها';
	}

	header('location: category.php');
	
?>