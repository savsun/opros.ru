
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
					$name=array_values($_POST);
					echo "<center><h2>".$name[0]."</h2></center>";
					
					$result=mysql_query("SELECT id FROM listofinterview WHERE nameInterview='".$name[0]."'");
					while ($row = mysql_fetch_row($result))
					{
						$id=$row[0];
					}
					
					$query=mysql_query("SELECT COUNT(*) FROM users");
					while ($row = mysql_fetch_row($query))
					{
						$count=$row[0];
					}
					
					//Вывод заголовка таблицы оценок
					$query=mysql_query("SELECT DISTINCT measure FROM experttointerview WHERE numberOpros=".$id);
					$mesureCount = mysql_num_rows($query);
					if ($row = mysql_fetch_row($query))
					{
						echo "<table border='2'><tr><td align='center' rowspan = '2'>Эксперт</td>";
						echo "<td align = 'center' colspan = $mesureCount'>Оценки</td></tr><tr>";
						echo "<td align='center'>$row[0]</td>";
						while ($row = mysql_fetch_row($query))
						{
							echo "<td align='center'>$row[0]</td>";
						}
						echo "</tr>";
					}
					
					//Элемент массива marks - оценки конкретного эксперта в конкретном опросе.
					$marks=array();
					
					for ($i=3; $i<($count)+1; $i++)
					{
						$query=mysql_query("SELECT mark FROM experttointerview WHERE numberOpros=".$id." and numberExpert=".$i."");
						if (mysql_num_rows ($query) != 0)
						{
							$expertQuery = mysql_query("SELECT fio FROM users WHERE userId = ".$i);
							$expertName = mysql_fetch_row($expertQuery);
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
					echo "</table>";
					
					$listRankMatr = array();
					foreach($marks as $key => $mark)
					{
						//Матрица рангов для оценок конкретного эксперта
						$rankMatr=array();
						for ($i=0; $i<(count($mark)); $i++)
							{
								$rankRow=array();
								for ($j=0; $j<(count($mark)); $j++)
								{
									array_push($rankRow,0);
								}
								array_push($rankMatr,$rankRow);
							} 
						
						for ($i=0; $i<(count($mark)); $i++)
						{
							for ($j=$i+1; $j<(count($mark)); $j++)
							{
								if ($mark[$i]==$mark[$j])
								{
									$rankMatr[$i][$j]=0;
									$rankMatr[$j][$i]=0;
								}
								else if ($mark[$i]>$mark[$j])
									{
										$rankMatr[$i][$j]=1;
										$rankMatr[$j][$i]=-1;
									}
									else
									{
										$rankMatr[$i][$j]=-1;
										$rankMatr[$j][$i]=1;
									}
							}
						}
						$listRankMatr[$key] = $rankMatr;
					}
				?>
			</td>
		</tr>
	</table>
	<?php
/*$query=mysql_query("SELECT mark FROM experttointerview WHERE numberOpros=1 and numberExpert=3");
		$mark3=array();
		while ($row = mysql_fetch_row($query))
			{
				array_push($mark3,$row[0]);
			}
		print_r($mark3);
		$query=mysql_query("SELECT mark FROM experttointerview WHERE numberOpros=1 and numberExpert=4");
		$mark4=array();
		while ($row = mysql_fetch_row($query))
			{
				array_push($mark4,$row[0]);
			}
		print_r($mark4);
		
		
		$keyCount=count($mark3);
		echo $keyCount;
		$rankMatr=array();
		for ($i=0; $i<(count($mark3)); $i++)
			{
				$rankRow=array();
				for ($j=0; $j<(count($mark3)); $j++)
				{
					array_push($rankRow,0);
				}
				array_push($rankMatr,$rankRow);
			} 
		
		for ($i=0; $i<(count($mark3)); $i++)
			{
				for ($j=$i+1; $j<(count($mark3)); $j++)
				{
					if ($mark3[$i]==$mark3[$j])
					{
						$rankMatr[$i][$j]=0;
						$rankMatr[$j][$i]=0;
					}
					else if ($mark3[$i]>$mark3[$j])
						{
							$rankMatr[$i][$j]=1;
							$rankMatr[$j][$i]=-1;
						}
						else
						{
							$rankMatr[$i][$j]=-1;
							$rankMatr[$j][$i]=1;
						}
				}
			}
		echo "<br>";	
		for ($i=0; $i<4; $i++)
		{
			print_r($rankMatr[$i]);
			echo "<br>";
		}*/
	?>
	
</body>
</html>