 <html>
 <head>
  <title>  </title>
 </head>
 
<body>
	<div>
		<?php
			/*session_start();
			include ("blocks/header.php");*/
		?>
	</div>
	<center>
		<h3>Для входа в систему необходимо ввести логин и пароль</h3>
	</center>
	
	<form method="post" action="user.php">
		<input type="text" name="login" placeholder="login" required/><br>
		<input type="password" name="password" placeholder="password" required/><br>
		<input type="submit" name="enter" value="Войти"/><br>
	</form>
	
	
	
  
  
</body>
</html>