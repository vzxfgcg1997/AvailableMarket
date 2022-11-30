<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$fileimg = $_FILES['photo']['name'];
		if(!empty($fileimg)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$fileimg);	
		}
		
		$sql =$pdo->prepare("UPDATE user SET imgeuser = '$fileimg' WHERE id = '$id'") ;
		if($sql->execute()){
			$_SESSION['success'] = 'تم تحديث صورة المسؤول بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر!';
		}

	}
	else{
		$_SESSION['error'] = 'اختر مسؤول لتعديله أولاً!';
	}

	header('location: userad.php');
?>