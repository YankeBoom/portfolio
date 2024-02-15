<?php
	if (isset($_POST['statement']))
	{
		try
		{
			$conn = new PDO('mysql:host=localhost;dbname=student_LaEngenA21','LaEngenA21','FP5H1tPZ');
			$query = 'INSERT INTO `statement`(car_number,description,confirmation) VALUES (:car_number,:description,:confirmation)';
			$stmt = $conn->prepare($query);
			$stmt -> bindParam(':car_number',$_POST['car_number']);
			$stmt -> bindParam(':description',$_POST['description']);
			$stmt -> bindParam(':confirmation',$_POST['confirmation']);
			$stmt -> execute();
			$conn = NULL;

			header('Location: statement.html');
		}
		catch (PDOExceptoion $e)
		{
		print'ERROR > '.$e->getMessage();
		die();
		}
	}
?>