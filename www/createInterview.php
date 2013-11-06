<html>
 <head>
  <title>CreateInterview</title>
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
				<form method="post" action="createInterview.php">
					<p>Введите название опроса</p>
					<input type="text" name="nameInterview" required/><br>
					<p>Выберите дату начала опроса</p>
					<input type="date" name="dataBegining" required/><br>
					<p>Выберите дату окончания опроса</p>
					<input type="date" name="dataEnding" required/><br>
					<p>Выберите экспертов, участвующих в опросе</p>
					<?php
						$db=mysql_connect("localhost","root");
						mysql_select_db ("interview");
						$query=mysql_query("SELECT fio as fio FROM users WHERE userId>2");
						$expert_data=mysql_fetch_array($query);
						for ($x=0; $x<count($expert_data); $x++) 
						{
							echo "<input type='checkbox' name='expert".$x."' value='".$expert_data[$x]."'>";
							echo $expert_data[$x];
							echo "<br>";	
						}
					?>
					<p>Выберите критерии, по которым эксперты оценят данную предметную область по дестибальной шкале</p>
					<p>Введите число критериев</p>
					<form method="post" action="createInterview.php">
						<input type="text" name="countmeasure"  required/><br>
						<input type="submit" name="measure" value="Добавить критерии"/><br>
					</form>
					<?php
						if (isset ($_POST['measure']))
						{
							$countmeasure=$_POST['countmeasure'];
						}
						for ($x=0; $x<countmeasure; $x++) 
						{
							echo "<input type='text' name='measure".$x."'><br>";
						}
					?>
					<input type="submit" name="interview" value="Создать"/><br>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>