<?php
	session_start();
?>
<html>
 <head>
  <title>ExpertPage</title>
 </head>
 
<body>
	<center>
		<h3>Здравствуйте, 
			<?php
				$db=mysql_connect("localhost","root");
				mysql_select_db ("interview");
				$query=mysql_query("SELECT fio FROM users WHERE login=S_SESSION['login']");
				echo $query;
			?>
		</h3>
	</center>
	<p>Вам неободимо выставить оценки по следующим опросам</p>
	<?php
		$query=mysql_query("SELECT fio FROM users WHERE login=S_SESSION['login']");
	?>
	
</body>
</html>