<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$edit_custd = $_POST['edit_custd'];
		$edit_custs = $_POST['edit_custs'];
		$edit_custz = $_POST['edit_custz'];
		$edit_name = $_POST['edit_name'];
		$edit_email = $_POST['edit_email'];
		$edit_phone = $_POST['edit_phone'];
		/*
      $('#edit_custd').val(response.city);
      $('#edit_custs').val(response.st);
      $('#edit_custz').val(response.zip);
      $('#edit_name').val(response.name);
      $('#edit_email').val(response.email);
      $('#edit_phone').val(response.phone);
*/
		$sql =$pdo->prepare("UPDATE `costomer` SET `name`='$edit_name',`email`='$edit_email',`phone`='$edit_phone',`zip`='$edit_custz',`city`='$edit_custd',`st`='$edit_custs' WHERE id_cust = '$id'");
		if($sql->execute()){
			$_SESSION['success'] = 'تم تعديل الزبون بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر';
		}
	}
	else{
		$_SESSION['error'] = 'يرجى اختيار زبون لتعديله';
	}

	header('location:costomer.php');

?>