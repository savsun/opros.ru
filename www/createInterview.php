<html>
 <head>
  <title>CreateInterview</title>
 </head>
 
<<<<<<< HEAD
<body bgcolor="ffc13d">        
        <center>
                <h3>Здравствуйте,администратор!</h3>
        </center>
        <table valign="center" width="700" cellspacing="0" cellpadding="5">
                <tr valign="left">
                        <td width="200"><p>Опросы</p><br>
                                <a href=createInterview.php>Создать опрос</a><br>
                                <a href=ListOfInterview.php>Посмотреть список опросов</a><br>
                                <p>Эксперты</p>
                                <a href=addExpert.php>Добавить эксперта</a><br>
                                <a href=ListOfExpert.php>Посмотреть список экспертов</a><br><br>
                                <a href=admin.php>В меню администратора</a><br>
                        </td>
                        <td>
                                <form method="post" action="createInterview.php">
                                        <p>Введите название опроса</p>
										<?php
                                        echo "<input type='text' name='nameInterview'  value='".$_POST['nameInterview']."' required/><br>";
                                        echo "<p>Выберите дату начала опроса</p>";
                                        echo "<input type='date' name='dataBegining' value='".$_POST['dataBegining']."' required/><br>";
                                        echo "<p>Выберите дату окончания опроса</p>";
                                        echo "<input type='date' name='dataEnding' value='".$_POST['dataEnding']."'required/><br>";
                                        echo "<p>Выберите экспертов, участвующих в опросе</p>";
                                        
                                                $db=mysql_connect("localhost","root");
                                                mysql_select_db ("interview");
                                                $query=mysql_query("SELECT fio as fio FROM users WHERE userId>2");
												$x=1;
                                                while ($row = mysql_fetch_row($query)) 
                                                {
                                                        echo "<input type='checkbox' name='expert".$x."' value='".$row[0]."'>";
                                                        echo $row[0];
														$x+=1;
                                                        echo "<br>";        
                                                }
                                        ?>
                                        <p>Введите критерии, по которым эксперты оценят данную предметную область по дестибальной шкале.<br> Критериев может быть от 2х до 5, лишние поля оставьте пустыми</p>
                                                <input type="text" name="measure1"  placeholder="Критерий1" required/><br>
												<input type="text" name="measure2"  placeholder="Критерий2" required/><br>
												<input type="text" name="measure3"  placeholder="Критерий3" ><br>
												<input type="text" name="measure4"  placeholder="Критерий4" ><br>
												<input type="text" name="measure5"  placeholder="Критерий5" ><br>
												
												<input type="submit" name="create" value="Cоздать"/><br>
										</form>
										<?php
											if (isset ($_POST['create']))
                                                {
												var_dump($_POST);
												for ($i=1; $i<=$x; $i++)
												{
													$expert.$i=$_POST['expert.$i'];
													print_r ($expert.$i);
												}
													/*$nameInterview=$_POST['nameInterview'];
													$dataBegining=$_POST['dataBegining'];
													$dataEnding=$_POST['dataEnding'];
													if ( !empty($_POST['measure1']) )
													{$measure1=$_POST['measure1']}
													if ( !empty($_POST['measure2']) )
													{$measure2=$_POST['measure2']}
													if ( !empty($_POST['measure3']) )
													{$measure3=$_POST['measure3']}
													if ( !empty($_POST['measure4']) )
													{$measure4=$_POST['measure4']}
													if ( !empty($_POST['measure5']) )
													{$measure5=$_POST['measure5']}
													
													$query=mysql_query("INSERT INTO listofinterview (nameInterview,dataBegining,dataEnding) VALUES('$nameInterview','$dataBegining','$dataEnding')") or die(mysql_error());
													$result=mysql_query("SELECT id FROM listofinterview WHERE nameInterview='$nameInterview'");
													while ($row = mysql_fetch_row($result))
                                                        {
															$numberOpros = $row[0];
														}
															$query=mysql_query("INSERT INTO experttpinterview (numberOpros,numberExpert,measure) VALUES('$numberOpros','$dataBegining','$dataEnding')") or die(mysql_error());
                                                       */
													
													/*if ($query)
													{
														echo "Добавление выполнено успешно!!";
													}*/
												}
										?>
                        </td>
                </tr>
        </table>
=======
<body bgcolor="ffc13d">	
	<center>
		<h3>Здравствуйте,администратор!</h3>
	</center>
	<table valign="center" width="700" cellspacing="0" cellpadding="5">
		<tr valign="left">
			<td width="200"><p>Опросы</p><br>
				<a href=createInterview.php>Создать опрос</a><br>
				<a href=ListOfInterview.php>Посмотреть список опросов</a><br>
				<p>Эксперты</p>
				<a href=addExpert.php>Добавить эксперта</a><br>
				<a href=ListOfExpert.php>Посмотреть список экспертов</a><br><br>
				<a href=admin.php>В меню администратора</a><br>
			</td>
			<td>
				<form method="post" action="createInterview.php">
					<p>Введите название опроса</p>
					<input type="text" name="nameInterview" required/><br>
					<p>Выберите дату начала опроса</p>
					<input type="date" name="dataBegining" required/><br>
					<p>Выберите дату окончания опроса</p>
					<input type="date" name="dataEnding" required/><br>
					<p>Выберите экспертов, участвующих в опросе</p>
					<?php
						$db=mysql_connect("localhost","root");
						mysql_select_db ("interview");
						$query=mysql_query("SELECT fio as fio FROM users WHERE userId>2");
						while ($row = mysql_fetch_row($query)) 
						{
							echo "<input type='checkbox' name='expert".$x."' value='".$row[0]."'>";
							echo $row[0];
							echo "<br>";	
						}
					?>
					<p>Выберите критерии, по которым эксперты оценят данную предметную область по дестибальной шкале</p>
					<p>Введите число критериев</p>
					<form  method="post" action="createInterview.php">
						<input type="text" name="countmeasure"  required/><br>
						<input type="submit" name="measure" value="Добавить критерии"/><br>
					</form>
					<?php
						if (isset ($_POST['measure']))
						{
							$countmeasure=$_POST['countmeasure'];
							for ($x=0; $x<$countmeasure; $x++) 
							{
								echo "<input type='text' name='measure".$x."'><br>";
							}
						}
						
					?>
					<input type="submit" name="create" value="Создать"/><br>
				</form>
			</td>
		</tr>
	</table>
>>>>>>> 09cab740702107c40b6f330392f863177ae6bd40
</body>
</html>