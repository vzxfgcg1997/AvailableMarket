<?php
	include 'includes/session.php';

	if(isset($_POST['login'])){
		$pass = $_POST['pass'];
		$sql =$pdo->prepare("SELECT * FROM costomer WHERE passwordcust = '$pass'");
		$sql->execute();
		if($sql->rowCount() > 0){
			$row = $sql->fetch(PDO::FETCH_OBJ);
			$_SESSION['costomer'] = $row->id_cust;
			header('location: transaction.php');
		}
		else{
			$_SESSION['error'] = 'المعرف غير صحيح';
			header('location: index.php');
		}

	}
	else{
		$_SESSION['error'] = 'أدخل المعرف أولاً';
		header('location: index.php');
	}


?>