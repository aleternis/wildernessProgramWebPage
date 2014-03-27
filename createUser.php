<?php
	session_start();
	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');
?>
<head>
	<title>Wilderness Program</title>
	<link rel="stylesheet" type="text/css" href="createUser.css">
</head>
<body>
	<div id="header" style="background-image: url(image/cover1.png);">
			<div id="logo">
				<a href="inicialPage.php"><img src="image/logo.png" alt="logo" height="120px" width="120px"
				 style="margin:38px;"></a>
				<h3 id="nameHeader">Wilderness Program</h3>
			</div>
		</div>
	<div id="content" align="center">
		<br />
		<?php
			if (isset($_POST["nickname"])) {
			    $nickname =  $_POST["nickname"];
				$password = $_POST["password"];
				$password2 = $_POST["password2"];
				if($nickname!=null){
					if(($password!=null)&&($password2!=null)){
						if($password!=$password2){
							echo '<div id="createUserText">Invalid password <br /><br />
									<a href="createUser.php"><button class="buttonBackPage" type="button">Back to create user page!</button></a>
								</div>';
						}else{
							echo '<div id="createUserText">';

							$id = 1;
							$type =0;

							$query="select MAX(id) from user;";
							$result=mysql_query($query);
							if ($result){
								while($row=mysql_fetch_array($result,MYSQL_NUM)){
									$id = $row[0]+1;
								}
							}
							$varInsert = "insert into user values('".$id."','".$nickname."','".$password."','".$type."')";
							if(mysql_query($varInsert))
								echo "Successfully Created";
							else
								echo "User already exist";
							echo '<br /><br />
									<a href="inicialPage.php"><button class="buttonBackPage" type="button">Back main page!</button></a>
							</div>';
						}
					}else{
						echo '<div id="createUserText">Password cannot be null <br /><br />
								<a href="createUser.php"><button class="buttonBackPage" type="button">Back to create user page!</button></a>
						</div>';
					}
				}else{
					echo '<div id="createUserText">You must fill username <br /><br />
							<a href="createUser.php"><button class="buttonBackPage" type="button">Back to create user page!</button></a>
					</div>';
				}
			}else{
				echo '<form class="formCreateUser" align="center" action="createUser.php" method="post">
  
						<fieldset>
							<legend>Enter your information to create a new user:</legend>
							<br/>
							 <div class="fieldCreateUser">
					            <input name="nickname" type="text" placeholder="Username">
					        </div>

					        <div class="fieldCreateUser">
					            <input name="password" type="password" placeholder="Password">
					        </div>

					        <div class="fieldCreateUser">
					            <input name="password2" type="password" placeholder="Confirm your password">
					        </div>
						</fieldset>
						<p align="center"> 
							<input class="buttonCreateUser" type="submit" name="submit" value="Submit Info"></p>
					</form>';
			}
		?>
	</div>
	<div id="footer">
		<p>Wilderness Program</p>
		<p>Contact information - Phone: (802) 654-2614 - Email: wwidlund@smcvt.edu</p>
	</div>
</body>
