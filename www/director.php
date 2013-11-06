
<html>
 <head>
  <title>UserPage</title>
 </head>
 
<body bgcolor="ffc13d">
	<center>
		<h3>Здравствуйте, пользователь</h3>
	</center>
	<table valign="center" width="700" cellspacing="0" cellpadding="5">
		<tr valign="left">
			<td width="200">Посмотреть степени близости мнений экспертов в оконченных опросах<br>
			<?php
				$db=mysql_connect("localhost","root");
				mysql_select_db ("interview");
				$query=mysql_query("SELECT nameInterview FROM listofinterview WHERE dataEnding < NOW()");
				echo "<form method='post' action='director.php'>";
				while ($row = mysql_fetch_array($query))
				{
					echo "<input type='submit' name='".$row['nameInterview']."' value='".$row['nameInterview']."'/><br>";
				}				
				echo "</form>";
				
				
			?>
			</td>
			<td>
				<?php
					//Получение матрицы оценок экспертов
					var_dump($_SESSION);
					$name=array_values($_POST);
					
					$result=mysql_query("SELECT id FROM listofinterview WHERE nameInterview='".$name[0]."'");
					if ($result && mysql_num_rows($result)>0)
					{
						$row = mysql_fetch_row($result);
						$interviewId=$row[0];
						
						//Вывод заголовка таблицы оценок
						$query=mysql_query("SELECT DISTINCT measure FROM experttointerview WHERE numberOpros=".$interviewId);
						if ($query && mysql_num_rows($query)>0)
						{
							echo "<center><h2>".$name[0]."</h2></center><br>";
							
							$mesureCount = mysql_num_rows($query);
						
							echo "<h4 align='right'>Таблица оценок экспертов</h4>";
							echo "<table border='2' cellspacing = '1'><tr><td align='center' rowspan = '2'>Эксперт</td>";
							echo "<td align = 'center' colspan = '$mesureCount'>Оценки по следующим критериям</td></tr><tr>";
							while ($row = mysql_fetch_row($query))
							{
								echo "<td align='center'>$row[0]</td>";
							}
							echo "</tr>";
							
							//Элемент массива marks - оценки конкретного эксперта в конкретном опросе.
							$marks=array();
							
							$query=mysql_query("SELECT COUNT(*) FROM users");
							while ($row = mysql_fetch_row($query))
							{
								$count=$row[0];
							}
							
							$expertNames = array();
							for ($i=3; $i<($count)+1; $i++)
							{
								$query=mysql_query("SELECT mark FROM experttointerview WHERE numberOpros=".$interviewId." and numberExpert=".$i."");
								if ($query)
								{
									$expertQuery = mysql_query("SELECT fio FROM users WHERE userId = ".$i);
									$expertName = mysql_fetch_row($expertQuery);
									$expertNames[$i] = $expertName[0];
									echo "<tr><td align='left' >".$expertName[0]."</td>";
									$mark=array();
									while ($row = mysql_fetch_row($query))
									{
										echo "<td align='center'>$row[0]</td>";
										array_push($mark,$row[0]);
									}
									echo "</tr>";
									$marks[$i] = $mark;
								}
							}
							
							//Конец таблицы оценок
							echo "</table><br>";
							
							include ("logic.php");
							//Получение набора матриц рангов
							$listRankMatr = getRankMatrix($marks);
							
							//Таблица мер близости оценок экспертов
							$proximityMatr = getProximityMatrix($listRankMatr);
							
							//Вывод таблицы близости мнений экспертов
							echo "<h4 align='right'>Таблица близости оценок экспертов</h4>";
							echo "<table border='2' cellspacing = '1'><tr><td align='center' >Эксперты</td>";
							foreach($expertNames as $expertId => $expertName)
							{
								echo "<td align='center' >$expertName</td>";
							}
							echo "</tr>";
							foreach($expertNames as $expertId => $expertName)
							{
								echo "<tr><td align='left' >$expertName</td>";
								foreach($expertNames as $secondExpertId => $expertName)
								{
									echo "<td>".$proximityMatr[$expertId][$secondExpertId]."</td>";
								}
								echo "</tr>";
							}
							
							echo "</table>";
							
						}
						else if ($query && mysql_num_rows($query) == 0)
						{
							echo "<center><b><i>В опросе нет критериев!</i></b></center>";
						}	
					}
				?>
			</td>
		</tr>
	</table>
</body>
</html>