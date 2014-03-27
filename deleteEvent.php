<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	$eventId=$_GET['eventId'];
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
				$varInsert = "DELETE FROM event WHERE id='".$eventId."'";
				if(mysql_query($varInsert))
					echo "<p>You successfully deleted the event</p>";

				else
					echo "<p>You could not delete the event</p>";

				echo "<script language=\"javascript\">\n";
				echo "setTimeout(\"window.top.location.reload()\",1500);\n";   
				echo "</script>\n";
			?>
		</div>
	</body>	
</html>