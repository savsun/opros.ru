<html>
 <head>
  <title>ListOfInterview</title>
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
				<table border ="2">
					<tr>
						<td>Название опроса</td>
						<td>Дата начала</td>
						<td>Дата окончания</td>
					</tr>
					<?php
						$db=mysql_connect("localhost","root");
						mysql_select_db ("interview");
						$query=mysql_query("SELECT * FROM listofinterview");
						while ($row = mysql_fetch_array($query))
						{
							echo "<tr><td>$row[nameInterview]</td><td>$row[dataBegining]</td><td>$row[dataEnding]</td></tr>";
						}
					?>
				</table>
			</td>
		</tr>
	</table>
	
</body> 
</html>