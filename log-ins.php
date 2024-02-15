<?php
	session_start();

	if (isset($_POST['log-ins'])) {
		try {
			$conn = new PDO('mysql:host=localhost;dbname=student_LaEngenA21','LaEngenA21','FP5H1tPZ');
			$query = 'SELECT * FROM `userss` WHERE `user_login` = "'.$_POST['login'].'" && `user_password` = "'.$_POST['password'].'"';
			$result = $conn->query($query);
			$rows = $result->rowCount();
								
			if ($rows == 1 && $_POST['login'] == 'admin') {
				$_SESSION['login'] = $_POST['login'];
				$conn = NULL;
				header('Location: admin_statement.php');
			} else {
				$_SESSION['login'] = $_POST['login'];
				$conn = NULL;
				header('Location: statement.html');
			}

			} catch (PDOException $e) {
				print 'ERROR > '.$e->getMessage();
					die();
			}
	}
?>