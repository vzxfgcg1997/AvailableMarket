<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$idbook = $_POST['add'];
		$sql =$pdo->prepare("INSERT INTO `detailscart`(`idbook`, `idcart`) VALUES ('$cart','$idbook')");
		if($sql->execute()){
            $_SESSION['success'] = 'تم الإضافة  بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ';
		}
	}	
	else{
		$_SESSION['error'] = 'اضف معلومات لاضافتها';
	}

	header('location: index.php');

?>