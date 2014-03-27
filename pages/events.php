<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="pageEventPHP.css">
	</head>
	<body>


		<?php	
			$day="";
			$month="";
			$year="";
			$date="";

			$query_event='select id,name,info,day from event;';
			$result_event=mysql_query($query_event);
			if ($result_event){
				while($row_event=mysql_fetch_array($result_event,MYSQL_NUM)){
						echo "<div id=\"joinEvent\" align=\"center\">";
							echo "<h2>".$row_event[1]."</h2> <br />";
							echo "<p>".$row_event[2]."</p> <br />";

							$day= substr($row_event[3],8,2);
							$month= substr($row_event[3],5,2);
							$year= substr($row_event[3],0,4);
							$date=$month."/".$day."/".$year;
							echo "<p>".$date."</p> <br />";
							echo '<a href="peopleEvent.php?eventId='.$row_event[0].'"><button class="buttonBackPage" type="button">Show people in event</button></a>';

						echo "</div>";
				}

			}
		?>
	</body>
</html>