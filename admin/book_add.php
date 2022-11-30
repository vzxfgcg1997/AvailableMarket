<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$pub_date = $_POST['pub_date'];
		$qiute = $_POST['qiute'];
		$sql =$pdo->prepare( "INSERT INTO `book`(`AuthorId`, `Category`, `ISBM`, `Namebook`, `price`, `PublishDate`, `status`) VALUES ('$author','$category','$isbn','$title','$publisher','$pub_date','$qiute')");
		if($sql->execute()){
			$_SESSION['success'] = 'تمت اضافة الكتاب بنجاح';
		}
		else{
			$_SESSION['error'] = 'خطأ من السيرفر';
		}
	}	
	else{
		$_SESSION['error'] = 'لا يوجد بيانات لا ضافتها';
	}

	header('location: book.php');

?>