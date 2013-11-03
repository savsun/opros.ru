<html>
 <head>
  <title>ListOfInterview</title>
 </head>
 
<body>	
	<?php
			$db=mysql_connect("localhost","root");
			mysql_select_db ("interview");
			$query=mysql_query("SELECT * FROM listofinterview");
			$interview_data=mysql_fetch_array($query);
			var_dump($interview_data);
	?>


</body>
</html>