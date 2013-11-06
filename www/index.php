 <html>
 <head>
  <title>  </title>
 </head>
 
<body bgcolor="ffc13d">
	<div>
		<?php
			include ("blocks/header.php");
		?>
	</div>
	<center>
		<h3>Для входа в систему необходимо ввести логин и пароль</h3><br><br>

	
	<form method="post" action="user.php">
		<input type="text" name="login" placeholder="login" required/><br>
		<input type="password" name="password" placeholder="password" required/><br>
		<input type="submit" name="enter" value="Войти"/><br>
	</form>
	
	</center>
	
  
  
</body>
</html>