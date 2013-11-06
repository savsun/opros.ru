<?php
	session_start();
?>
<html>
 <head>
	<title>UserPage</title>
 </head>
 
<body bgcolor="ffc13d">
	<div>
		<?php
			include ("blocks/header.php");
		?>
	</div>
		<?php
			$db=mysql_connect("localhost","root");
			mysql_select_db ("interview");
		
			/*if (isset ($_POST['submit']))
		{
			$e_login=$_POST['e_login'];
			$e_password=md5($_POST['e_password']);
			$query=mysql_query("INSERT INTO users (login,password,fio,specialization,mail) VALUES('$e_login','$e_password','Иванов Иван Иванович','Фильмы','ivanovich@mail.ru')") or die(mysql_error());
		}*/
		
			if (isset ($_POST['enter']))
			{
			$login=$_POST['login'];
			$password=md5($_POST['password']);
			$query=mysql_query("SELECT login,password FROM users WHERE login='$login'");
			$user_data=mysql_fetch_array($query);
			
			if ($user_data['password']==$password)
			{
				if ($user_data['login']=='admin')
					{
						include("admin.php");
					}
				else if ($user_data['login']=='director')
						{
							include("director.php");
						}
					else
						{
						include("expert.php");
						}
			}
			else
			{
				echo "Неверный пароль или логин";
			}
			}
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
			var_dump(session_id());
	?>
</body>
</html>