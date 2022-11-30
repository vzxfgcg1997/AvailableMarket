<?php
	include 'includes/session.php';

    $sql =$pdo->prepare("SELECT * FROM user");
    $sql->execute();
if($sql->rowCount() > 1)
{
    if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql =$pdo->prepare("DELETE FROM `user` WHERE id = '$id'") ;
		if($sql->execute()){
			$_SESSION['success'] = 'تم حذف المستخدم بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر';
		}
	}
	else{
		$_SESSION['error'] = 'اختر مستخدم لحذفه';
	}
}
else{
    $_SESSION['error'] = 'العملية غير مسموح بها';
}
	

	header('location: userad.php');
	
?>