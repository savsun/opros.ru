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
				<a href=delInterview.php>Удалить опрос</a><br>
				<p>Эксперты</p>
				<a href=addExpert.php>Добавить эксперта</a><br>
				<a href=ListOfExpert.php>Посмотреть список экспертов</a><br>
				<a href=DelExpert.php>Удалить эксперта</a><br><br>
				<a href=admin.php>В меню администратора</a><br>
			</td>
			<td>
				<table border ="2">
					<tr>
						<td width="150">Название опроса</td>
						<td width="80">Дата начала</td>
						<td width="80">Дата окончания</td>
						<td width="150">Эксперты</td>
						<td width="150">Критерии</td>
					</tr>
					<?php
						$db=mysql_connect("localhost","root");
						mysql_select_db ("interview");
						$query=mysql_query("SELECT * FROM listofinterview");
						while ($row = mysql_fetch_array($query))
						{
							echo "<tr><td>$row[nameInterview]</td><td>$row[dataBegining]</td><td>$row[dataEnding]</td><td>";
							$result=mysql_query("SELECT DISTINCT fio FROM users JOIN experttointerview ON users.userId=experttointerview.numberExpert WHERE experttointerview.numberOpros='$row[id]'");
							while ($row2 = mysql_fetch_array($result))
							{
								echo "$row2[fio]<br>";
							}
							echo "</td><td>";
							$result=mysql_query("SELECT DISTINCT measure FROM experttointerview WHERE numberOpros='$row[id]'");
							while ($row2 = mysql_fetch_array($result))
							{
								echo "$row2[measure]<br>";
							}
							echo "</td></tr>";
						}
					?>
				</table>
			</td>
		</tr>
	</table>
	
</body> 
</html>