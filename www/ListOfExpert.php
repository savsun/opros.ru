<html>
 <head>
  <title>ListOfExpert</title>
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
				<?php
					$db=mysql_connect("localhost","root");
					mysql_select_db ("interview");
					$query=mysql_query("SELECT * FROM users WHERE userId>2");
					while ($row = mysql_fetch_array($query))
					{
						echo $row[0];
					}
				?>
			</td>
		</tr>
	</table>
	
</body> 
</body>
</html>