<?php
	session_start();

	if (isset($_POST['add'])) {
		try {
			$conn = new PDO('mysql:host=localhost;dbname=student_LaEngenA21','LaEngenA21','FP5H1tPZ');
			$query = 'INSERT INTO `userss`(user_fio, user_phone, user_email, user_login, user_password) VALUES (:user_fio,:user_phone,:user_email,:user_login,:user_password)';
			
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':user_fio', $_POST['user_fio']);
			$stmt->bindParam(':user_phone', $_POST['user_phone']);
			$stmt->bindParam(':user_email', $_POST['user_email']);
			$stmt->bindParam(':user_login', $_POST['user_login']);
			$stmt->bindParam(':user_password', $_POST['user_password']);
			$stmt->execute();
			$conn = NULL;
			header('Location: index.html');
		} catch (PDOException $e) {
			print 'ERROR > '.$e->getMessage();
			die();
		}
	}
?>