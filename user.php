<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	$nickname =  $_SESSION["nickname"];
	if($nickname==null){
    	header("Location: inicialPage.php");
	}

?>

<html>
	<head>
		<title>Wilderness Program</title>
		<link rel="stylesheet" type="text/css" href="user.css">
	</head>

	<body>
		<div id="header" style="background-image: url(image/cover1.png);">
			<div id="logo">
				<a href="inicialPage.php"><img src="image/logo.png" height="120px" alt="logo" width="120px" style="margin:38px;"></a>
				<h3 id="nameHeader">Wilderness Program</h3>
			</div>
			<div id="login">
				<div id="loginPage" > 
					<?php
					echo '<p id="userName">Welcome ' .$nickname.'<p>';
					echo '<a href="killSession.php"><button class="buttonBackPage" type="button">Logout</button></a>';
					?>
				</div>
			</div>
		</div>
		<div id="content"> 
			<div id="sideLeft">
				<div id="contentLeft">
					<ol id="linkList">
					  <?php
					  	if(strlen($nickname)<22){
					  		echo '<li class="smallEle"><a href=userPHP.php?eventId='.$nickname.' target="right_side">'.$nickname.'\'s info</a></li>';
					  	}else{
					  		echo '<li class="bigEle"><a href=userPHP.php?eventId='.$nickname.' target="right_side">'.$nickname.' info</a></li>';
					  		}
					  	$query_event="select id,name from event;";
						$result_event=mysql_query($query_event);
						if ($result_event){
							while($row_event=mysql_fetch_array($result_event,MYSQL_NUM)){
								if(strlen($row_event[1])<22){
									echo '<li class="smallEle"><a href=eventPHP.php?eventId='.$row_event[0].' target="right_side">'.$row_event[1].'</a></li>';
								}else{
									echo '<li class="bigEle"><a href=eventPHP.php?eventId='.$row_event[0].' target="right_side">'.$row_event[1].'</a></li>';
									}

							}
						}
					  ?>
					</ol>
				</div>	
			</div>

			<div id="sideRight">
				<iframe name="right_side" src="userPHP.php" height="100%" width="100%" style="	overflow: hidden;
				"frameBorder="0">
				</iframe>
			</div>
			</div>
		<div id="footer">
		<p>Wilderness Program</p>
		<p>Contact information - Phone: (802) 654-2614 - Email: wwidlund@smcvt.edu</p>
	</div>
</body>
</html>