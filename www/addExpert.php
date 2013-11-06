<html>
 <head>
  <title>AddExpert</title>
 </head>
 
<body bgcolor="ffc13d">
	<center>
		<h3>Здравствуйте,администратор!</h3>
	</center>
	<table valign="center" width="700" cellspacing="0" cellpadding="5">
		<tr valign="left">
			<td width="200"><p>Опросы</p><br>
				<a href=createInterview.php>Создать опрос</a><br>
				<a href=ListOfInterview.php>Посмотреть список опросов</a><br>
				<p>Эксперты</p>
				<a href=addExpert.php>Добавить эксперта</a><br>
				<a href=ListOfExpert.php>Посмотреть список экспертов</a><br><br>
				<a href=admin.php>В меню администратора</a><br>
			</td>
			<td>	
				<form method="post" action="addExpert.php">
					<p>Введите ФИО эксперта</p>
					<input type="text" name="fio" required/><br>
					<p>Введите логин эксперта</p>
					<input type="text" name="login" required/><br>
					<p>Введите пароль эксперта</p>
					<input type="password" name="password" required/><br>
					<p>Введите специализацию эксперта</p>
					<input type="text" name="specialization" required/><br>
					<p>Ведите адрес эклектронной почты эксперта</p>
					<input type="text" name="mail" required/><br>
					<input type="submit" name="add" value="Добавить"/><br>
				</form>
				<?php
					$db=mysql_connect("localhost","root");
					mysql_select_db ("interview");
					if (isset ($_POST['add']))
					{
						$fio=$_POST['fio'];
						$login=$_POST['login'];
						$password=md5($_POST['password']);
						$specialization=$_POST['specialization'];
						$mail=$_POST['mail'];			
						$query=mysql_query("INSERT INTO users (login,password,fio,specialization,mail) VALUES('$login','$password','$fio','$specialization','$mail')") or die(mysql_error());
						if ($query)
						{
							echo "Добавление выполнено успешно!!";
						}
					}
				?>
			</td>
		</tr>
	</table>
	
</body>
</html>