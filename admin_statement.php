<?php
{
		try {
			$conn = new PDO('mysql:host=localhost;dbname=student_LaEngenA21','LaEngenA21','FP5H1tPZ');


			$query = 'SELECT * FROM `statement` WHERE `id`';

			$result = $conn->query($query);

			echo '<h2 class="section_title">Панель администратора';

			echo '<table class="form__input" border="1">';
				foreach ($result as $data) {
					try{
						$conn = new PDO('mysql:host=localhost;dbname=student_LaEngenA21','LaEngenA21','FP5H1tPZ');

						$query = 'SELECT * FROM `statement` WHERE `id`';

						$gruppa = $conn->query($query);

						$conn = NULL;
					} catch (PDOException $e) {
						print 'ERROR> '.$e->getMessage();
						die();	
					}
                    
                    echo '</td></tr>
                    <tr><td><h2>Заявление №'.$data['id'].'<br>
										<form action="admin_formulate_statement.php" method="post" class="form form-send">
                    <input type="text" name="statement" value="'.$data['confirmation'].'">
                    <input type="submit" name="confirmation" value="Заявка подтверждена ✔">
										<input type="submit" name="confirmation" value="Заявка отклонена ×">
										</form>
                    <tr><td>Регистрацоный номер автомобиля: '.$data['car_number'].'</td></tr>
                    <td>Описание нарушения: '.$data['description'].'<br></br></td>';
                }

			echo '</table></h2>';
			echo '<a class="btn form__btn" href="index.html">Выход</a>';

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


  <title>Нарушениям.Нет</title>
</head>
<body>
</body>
</html>