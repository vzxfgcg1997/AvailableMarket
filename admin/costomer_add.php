<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$add_custd = $_POST['add_custd'];
		$add_custs = $_POST['add_custs'];
		$add_custz = $_POST['add_custz'];
		$add_name = $_POST['add_name'];
		$add_email = $_POST['add_email'];
		$add_phone = $_POST['add_phone'];
		/*if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating studentid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}*/
		$sql =$pdo->prepare("INSERT INTO `costomer`(`name`, `email`, `phone`, `zip`, `city`, `st`) VALUES ('$add_name','$add_email','$add_phone','$add_custz','$add_custd','$add_custs')");
		
		if($sql->execute()){
			$_SESSION['success'] = 'تمت اضافةالزبون بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر';
		}

	}
	else{
		$_SESSION['error'] = 'اضف البيانات أولاً';
	}

	header('location: costomer.php');
?>