<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		
		$sql =$pdo->prepare("INSERT INTO catgories (name) VALUES ('$name')");
		if($sql->execute()){
			$_SESSION['success'] = 'تمت اضافة الفئة بنجاح';
		}
		else{
			$_SESSION['error'] = $sql->error;
		}
	}	
	else{
		$_SESSION['error'] = 'اضف معلومات لاضافتها';
	}

	header('location: category.php');

?>