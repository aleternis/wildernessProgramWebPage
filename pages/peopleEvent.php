<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	$eventId=$_GET['eventId'];
	$userId=-1;
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="pageEventPHP.css">
		<meta charset="utf-8" />
	</head>
	<body>
		<div id="joinEvent" align="center">
			<?php
				$query="select idUser from userEvent where idEvent = '".$eventId."';";
				$result=mysql_query($query);
				$result_user=mysql_query($query);
				if ($result){
					if($row=mysql_fetch_array($result,MYSQL_NUM)){
						echo "<p>People that signed for the event:</p>";
						while($row_user=mysql_fetch_array($result_user,MYSQL_NUM)){
							$userId=$row_user[0];

							$queryEvent="select nickname from user where id = '".$userId."';";
							$resultEvent1=mysql_query($queryEvent);
							$resultEvent2=mysql_query($queryEvent);
							if ($resultEvent1){
								if($row=mysql_fetch_array($resultEvent1,MYSQL_NUM)){
									while($row_user=mysql_fetch_array($resultEvent2,MYSQL_NUM)){
										$userName=$row_user[0];
										echo $userName;
										echo "</br>";
									}
								}
							}

						}
					}else{
						echo "<p>No one signed for the event</p>";
					}
				}		
				?>
		</div>
	</body>	
</html>