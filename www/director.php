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
		$query=mysql_query("SELECT mark FROM experttointerview WHERE numberOpros=1 and numberExpert=4");
		$mark4=array();
		while ($row = mysql_fetch_row($query))
			{
				array_push($mark4,$row[0]);
			}
		print_r($mark4);
	?>
	
</body>
</html>