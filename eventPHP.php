<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	if($_SESSION["nickname"]==null){
    	header("Location: inicialPage.php");
	}

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="PageEventPHP.css">
	</head>
	<body>


		<?php	
			$var=$_GET['eventId'];
			$day="";
			$month="";
			$year="";
			$date="";

			$query_event='select id,name,info,day from event where id="'.$var.'";';
			$result_event=mysql_query($query_event);
			if ($result_event){
				while($row_event=mysql_fetch_array($result_event,MYSQL_NUM)){
						echo '<div id="joinEvent">';
							$day= substr($row_event[3],8,2);
							$month= substr($row_event[3],5,2);
							$year= substr($row_event[3],0,4);
							echo "<p class=\"header\">".$row_event[1]."</p>";
							echo "<p class=\"description\">".$row_event[2]."</p>";

							
							$date=$month."/".$day."/".$year;
							echo "<p class=\"date\">".$date."</p> <br/> <br />";
							echo '<div id="buttonPage"><a href="joinEvent.php?eventId='.$row_event[0].'"><button class="buttonBackPage" type="button">Join Event</button></a>';
							echo '</div>';

						echo "</div>";
				}

			}
		?>
	</body>
</html>


