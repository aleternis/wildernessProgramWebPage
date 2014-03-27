<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	$nickname=$_SESSION["nickname"];
	$userId=$_SESSION["userId"];
	$eventId=-1;
	$eventName="";
	if($nickname==null){
    	header("Location: inicialPage.php");
	}
	echo "Welcome, ".$nickname;

	$query="select idEvent from userEvent where idUser = '".$userId."';";
	$result=mysql_query($query);
	$result_user=mysql_query($query);
	if ($result){
		if($row=mysql_fetch_array($result,MYSQL_NUM)){
			echo '<p class="eventName">You signed up for the event(s):</p>';
			while($row_user=mysql_fetch_array($result_user,MYSQL_NUM)){
				$eventId=$row_user[0];

				$queryEvent="select name from event where id = '".$eventId."';";
				$resultEvent1=mysql_query($queryEvent);
				$resultEvent2=mysql_query($queryEvent);
				if ($resultEvent1){
					if($row=mysql_fetch_array($resultEvent1,MYSQL_NUM)){
						while($row_user=mysql_fetch_array($resultEvent2,MYSQL_NUM)){
							$eventName=$row_user[0];
							echo "<br />";
							echo $eventName;

						}
					}
				}

			}
		}
	}		
?>