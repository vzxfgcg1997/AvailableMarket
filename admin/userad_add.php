<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fileimg = $_FILES['photo']['name'];

		if(!empty($fileimg)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$fileimg);	
		}
        else $_SESSION['error'] = 'اً!';
        $paasword= password_hash($password, PASSWORD_DEFAULT);
		$sql =$pdo->prepare("INSERT INTO `user`(`username`, `password`, `nameuser`, `imgeuser`) VALUES ('$username','$paasword','$name','$fileimg')");
		if($sql->execute()){
			$_SESSION['success'] = 'تم إضافة المستخدم بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر!';
		}

	}
	else{
		$_SESSION['error'] = 'اضف البيانات أولاً!';
	}

	header('location: userad.php');
?>