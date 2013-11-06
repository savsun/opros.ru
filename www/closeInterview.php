<html>
 <head>
  <title>CloseInterview</title>
 </head>
 
<body>
	<center>
		<h3>Здравствуйте, пользователь</h3>
	</center>
	<table valign="center" width="100%" cellspacing="0" cellpadding="5">
		<tr valign="left">
			<td width="300">Посмотреть степени близости мнений экспертов в оконченных опросах<br>
			<?php
				$db=mysql_connect("localhost","root");
				mysql_select_db ("interview");
				$query=mysql_query("SELECT nameInterview FROM listofinterview WHERE dataEnding < NOW()");
				$k=0;
				while ($row = mysql_fetch_array($query))
				{
					echo "<a name='".$row['nameInterview']."'href=closeInterview.php>".$row['nameInterview']."</a><br>";
					$k++;
				}
			?>
			</td>
			<td>
			</td>
		</tr>
	</table>