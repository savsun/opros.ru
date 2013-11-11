<html>
 <head>
  <title>DeleteInterview</title>
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
				<form method="post" action="delInterview.php">
					<tr>
						<td width="100">Название опроса</td>
						<td width="80">Дата начала</td>
						<td width="80">Дата окончания</td>
						<td width="150">Эксперты</td>
						<td width="150">Критерии</td>
						<td width="20">Удалить</td>
					</tr>
					<?php
						$db=mysql_connect("localhost","root");
						mysql_select_db ("interview");
						$query=mysql_query("SELECT * FROM listofinterview");
						$x=1;
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
							echo "</td><td><input type='radio' name='interview".$x."' value='$row[id]'</td></tr>";
							$x+=1;
						}
					?>
				</table><br><br>
				<input type="submit" name="deleteInterview" value="Удалить"/><br>
				</form>
				<?php
				//var_dump($_POST);
					if (isset ($_POST['deleteInterview']))
                        {	
							$delInterview=array_reverse($_POST);
							$delInterview=array_slice($delInterview,1);
							$delInterview=array_values($delInterview);
							//var_dump($delInterview);
							for ($k=0; $k<count($delInterview); $k++) 
								{
									$delete=mysql_query("DELETE FROM listofinterview WHERE id='$delInterview[$k]'") or die(mysql_error());
									$delete=mysql_query("DELETE FROM experttointerview WHERE numberOpros='$delInterview[$k]'") or die(mysql_error());
								}
							
							exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
						}
				?>	
			</td>
		</tr>
	</table>
	
</body> 
</html>