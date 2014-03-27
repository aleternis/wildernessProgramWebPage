<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');
?>

<html>
	<head>
		<title>Wilderness Program</title>
		<link rel="stylesheet" type="text/css" href="inicialcss.css">
		<meta charset="utf-8" />
	</head>

	<body>
		<div id="header" style="background-image: url(image/cover1.png);">
			<div id="logo">
				<a href="inicialPage.php"><img src="image/logo.png" alt="logo" height="120px" width="120px" style="margin:38px;"></a>
				<h3 id="nameHeader">Wilderness Program</h3>
			</div>
			<div id="login">
				<div id="loginPage" > 
					<form method="post" action="login.php">
						<input type="text" name="nickname" placeholder="Username" size="15" />
						<input type="password" name="password" placeholder="Password" size="15"/>
						<input id="submitLogin"type="submit" name="submit1" value="Login" align="center">
						<a id="createNewUser" href="createUser.php">Create new user</a>
					</form>
				</div>
				<?php
					if($_SESSION["invalid"]==1){
						echo '<p style="color:red; background-color:#FFFFFF; margin-left:5px; width:130px;">*invalid password!</p>';
						$_SESSION["invalid"]=0;
					}
				?>
			</div>
		</div>
		<div id="content"> 
			<div id="sideLeft">
				<div id="contentLeft">
					<ol id="linkList">
					  <li class="smallEle"><a href="pages/climbing.html" target="right_side">Climbing</a></li>
					  <li class="smallEle"><a href="pages/kayaking.html" target="right_side">Kayaking</a></li>
					  <li class="smallEle"><a href="pages/expeditions.html" target="right_side">Expeditions</a></li>
					  <li class="smallEle"><a href="pages/hiking.html" target="right_side">Hiking + Backpacking</a></li>
					  <li class="bigEle"><a href="pages/medicine.html" target="right_side">Wilderness Medicine Program</a></li>
					  <li class="smallEle"><a href="pages/master.html" target="right_side">For Master's Students</a></li>
					  <li class="smallEle"><a href="pages/events.php" target="right_side">Events</a></li>
					</ol>
				</div>	
			</div>

			<div id="sideRight">
				<iframe id="framePage" name="right_side" src="pages/climbing.html" height="100%" width="100%" style="	overflow: hidden;
"frameBorder="0"></iframe>
			</div>
			</div>
		<div id="footer">
		<p>Wilderness Program</p>
		<p>Contact information - Phone: (802) 654-2614 - Email: wwidlund@smcvt.edu</p>
	</div>
</body>
</html>