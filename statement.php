<?php
	echo "<link rel='stylesheet' href=/main.css>";
{
		try {
			$conn = new PDO('mysql:host=localhost;dbname=student_LaEngenA21','LaEngenA21','FP5H1tPZ');


			$query = 'SELECT * FROM `statement`';

			$result = $conn->query($query);

			echo '<h2 class="page-title popup__title">Посмотреть заявление';

			echo '<table class="form__input" border="1">';
				foreach ($result as $data) {
					try{
						$conn = new PDO('mysql:host=localhost;dbname=student_LaEngenA21','LaEngenA21','FP5H1tPZ');

						$query = 'SELECT * FROM `statement`';

						$gruppa = $conn->query($query);

						$conn = NULL;
					} catch (PDOException $e) {
						print 'ERROR> '.$e->getMessage();
						die();	
					}

					echo '</td></tr>
					<tr><td><h2>Заявление №'.$data['id'].'<br>'.$data['confirmation'].'</td></tr>
					<td>Регистрацоный номер автомобиля: '.$data['car_number'].'</td></tr>
					<td>Описание нарушения: '.$data['description'].'<br></br></td>';
				}

			echo '</table></h2>';
			echo '<a class="btn form__btn" href="statement.html">Назад</a>';

			$conn = NULL;
		} catch(PDOException $e) {
			print 'ERROR: >' .$e->getMessage();
			die();
		}
	}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <title>Нарушениям.Нет</title>
</head>
<body>
</body>
</html>