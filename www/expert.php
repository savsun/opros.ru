<?php
	session_start();
?>
<html>
 <head>
  <title>ExpertPage</title>
 </head>
 
<body bgcolor="ffc13d">
	<center>
		<h3>Здравствуйте, 
			<?php
				$db=mysql_connect("localhost","root");
				mysql_select_db ("interview");
				$query=mysql_query("SELECT fio FROM users WHERE login='".$_SESSION['login']."'");
				while ($row = mysql_fetch_row($query))
				{
					echo $row[0];
				}
			?>
		</h3>
	</center>
	<table valign="center" width="700" cellspacing="0" cellpadding="5">
		<tr valign="left">
			<td width="400"> <h3>Вам неободимо выставить оценки<br> по следующим опросам</h3><br><br>
			
				<?php
					
					$query=mysql_query("SELECT userId FROM users WHERE login='".$_SESSION['login']."'");
					while ($row = mysql_fetch_row($query))
					{
						$userId=$row[0];
					}
					$query=mysql_query("SELECT DISTINCT nameInterview FROM listofinterview JOIN experttointerview  ON listofinterview.id=experttointerview.numberOpros 
													WHERE experttointerview.numberExpert='".$userId."' AND mark IS NULL") or die(mysql_error());
					echo "<form method='post' action='expert.php'>";
					while ($row = mysql_fetch_array($query))
					{
						echo "<input type='submit' name='".$row['nameInterview']."' value='".$row['nameInterview']."'/><br>";
					}				
					echo "</form>";			
				?>
			</td>
			<td width="1000">
			<?php
				$name=array_values($_POST);
				echo "<center><h2>".$name[0]."</h2></center><br><br>";
				echo "<center>Поставьте оценку от 1 до 10 (10-самый лучший, 1-самый худший)</center><br><br>";
				$query=mysql_query("SELECT measure FROM listofinterview JOIN experttointerview  ON listofinterview.id=experttointerview.numberOpros
											WHERE experttointerview.numberExpert='".$userId."' AND listofinterview.nameInterview='".$name[0]."'");
				echo "<form method='POST' action='expert.php'>";
				while ($row = mysql_fetch_row($query))
					{
						echo $row[0]."<input type='text' name='".$row[0]."' required/><br><br>";
					}
				echo "<input type='submit' name='estimate' value='Оценить'/><br>";
				echo "</form>";
				
				if (isset ($_POST['estimate']))
					{
						foreach($_POST as $key => $value) 
							{ 
								$query=mysql_query("UPDATE experttointerview SET mark='".$value."' WHERE measure='".str_replace('_',' ',$key)."'")or die(mysql_error());
							} 
					
						exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");	
					}
			?>
			</td>
		</tr>
	</table>
	
</body>
</html>