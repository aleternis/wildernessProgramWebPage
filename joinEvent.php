<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	$nickname=$_SESSION["nickname"];
	$eventId=$_GET['eventId'];
	$userId=$_SESSION["userId"];
	if($_SESSION["nickname"]==null){
    	header("Location: inicialPage.php");
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="PageEventPHP.css">
	</head>
	<body>
		<div id="joinEvent" align="center">
			<?php
				$varInsert = "insert into userEvent values('".$eventId."','".$userId."')";
				if(mysql_query($varInsert))
					echo "<p class=\"description\">You successfully entered the event</p>";

				else
					echo "<p class=\"description\">You are already in this event</p>";

				echo "<script language=\"javascript\">\n";
				echo "setTimeout(\"window.top.location.reload()\",1500);\n";   
				echo "</script>\n";

			?>
		</div>
	</body>	
</html>