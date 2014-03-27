<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	if($_SESSION["nickname"]==null){
    	header("Location: inicialPage.php");
	}
	$eventId=$_GET['eventId'];
	$userId=-1;
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="PageEventPHP.css">
	</head>
	<body>
		<div id="joinEvent">
			<p class="eventName">People that signed up for the event:
			<?php

				$queryName="select name,day from event where id = '".$eventId."';";
				$resultName=mysql_query($queryName);
				if($row=mysql_fetch_array($resultName,MYSQL_NUM)){
					$day= substr($row[1],8,2);
					$month= substr($row[1],5,2);
					$year= substr($row[1],0,4);
					$date=$month."/".$day."/".$year;
					echo $row[0].' on '.$date.'</p>';
				}

				$query="select idUser from userEvent where idEvent = '".$eventId."';";
				$result=mysql_query($query);
				$result_user=mysql_query($query);
				if ($result){
					if($row=mysql_fetch_array($result,MYSQL_NUM)){
						while($row_user=mysql_fetch_array($result_user,MYSQL_NUM)){
							$userId=$row_user[0];

							$queryEvent="select nickname from user where id = '".$userId."';";
							$resultEvent1=mysql_query($queryEvent);
							$resultEvent2=mysql_query($queryEvent);
							if ($resultEvent1){
								if($row=mysql_fetch_array($resultEvent1,MYSQL_NUM)){
									while($row_user=mysql_fetch_array($resultEvent2,MYSQL_NUM)){
										$userName=$row_user[0];
										echo '<p class="description">'.$userName.'</p>';
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