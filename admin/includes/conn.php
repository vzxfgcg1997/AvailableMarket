<?php
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=library_ng_en', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	} catch (PDOException $error) {
		echo'لا يوجد اتصال مع قاعدة البيانات';
	  }
	
?>