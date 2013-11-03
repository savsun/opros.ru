<html>
 <head>
  <title>ListOfExpert</title>
 </head>
 
<body>	
	<?php
			$db=mysql_connect("localhost","root");
			mysql_select_db ("interview");
			$query=mysql_query("SELECT * FROM users WHERE userId>2");
			$expert_data=mysql_fetch_array($query);
			var_dump($expert_data);
	?>


</body>
</html>