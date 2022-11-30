<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql =$pdo->prepare("SELECT * FROM user WHERE username = '$username'") ;
		$sql->execute();
		if($sql->rowCount() < 1){
			$_SESSION['error'] = 'لا يمكن العثور على حساب باسم المستخدم!';
		}
		else{
			$row = $sql->fetch(PDO::FETCH_OBJ);
			if(password_verify($password, $row->password)){
				$_SESSION['admin'] = $row->id;
			}
			else{
				$_SESSION['error'] = 'كلمة المرور خاطئة!';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

?>