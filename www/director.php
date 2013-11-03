<html>
 <head>
  <title>UserPage</title>
 </head>
 
<body>
	<center>
		<h3>Здравствуйте, пользователь</h3>
	</center>
	<p>Посмотреть степени близости мнений экспертов в оконченных опросах</p>
	<?php
			$db=mysql_connect("localhost","root");
			mysql_select_db ("interview");
			$query=mysql_query("SELECT nameInterview FROM listofinterview WHERE dataEnding < NOW()");
			while ($row = mysql_fetch_array($query))
			{
				echo $row['nameInterview']."<br>";
			}
		$query=mysql_query("SELECT mark FROM experttointerview WHERE numberOpros=1 and numberExpert=3");
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
		}
	?>
	
</body>
</html>