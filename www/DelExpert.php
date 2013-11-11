<html>
 <head>
  <title>DelExpert</title>
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
					<form method="post" action="DelExpert.php">
					<tr>
						<td>ФИО эксперта</td>
						<td>Специализация</td>
						<td>Адрес электронной почты</td>
						<td>Удалить</td>
					</tr>
					<?php
						$db=mysql_connect("localhost","root");
						mysql_select_db ("interview");
						$query=mysql_query("SELECT * FROM users WHERE userId>2");
						$x=3;
						while ($row = mysql_fetch_array($query))
						{
							echo "<tr><td>$row[fio]</td><td>$row[specialization]</td><td>$row[mail]</td><td><input type='radio' name='expert".$x."' value='$row[userId]'</td></tr>";
							$x+=1;
						}
					?>
				</table><br><br>
				<input type="submit" name="deleteExpert" value="Удалить"/><br>
					</form>
				<?php
					if (isset ($_POST['deleteExpert']))
                        {	
							$delExpert=array_reverse($_POST);
							$delExpert=array_slice($delExpert,1);
							$delExpert=array_values($delExpert);
							//var_dump($delExpert);
							for ($k=0; $k<count($delExpert); $k++) 
								{
									$delete=mysql_query("DELETE FROM users WHERE userId='$delExpert[$k]'") or die(mysql_error());
								}
							
							exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
						}
				?>
			</td>
		</tr>
	</table>
	
</body>
</html>