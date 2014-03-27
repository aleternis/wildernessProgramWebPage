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
	?>

	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="adminPanecss.css">
		<script>

		</script>
	</head>
	<body>
		<div id="content">
			<div id="leftPane">
				<?php
					if (isset($_POST["nickname"])) {
					    $nickname =  $_POST["nickname"];
						$password = $_POST["password"];
						$password2 = $_POST["password2"];
						if($nickname!=null){
							if(($password!=null)&&($password2!=null)){
								if($password!=$password2){
									echo '<div id="createUserText">Invalid password <br /><br />
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
									if(mysql_query($varInsert)){
										echo "Successfully Created";
										echo "<script language=\"javascript\">\n";
										echo "setTimeout(\"window.top.location.reload()\",2000);\n";   
										echo "</script>\n";
									}else{
										echo "User already exist";
									}
									echo '</div>';

								}
							}else{
								echo '<div id="createUserText">Password cannot be null <br /><br />
								</div>';
							}
						}else{
							echo '<div id="createUserText">You must fill username <br /><br />
							</div>';
						}
						echo "<script language=\"javascript\">\n";
						echo "setTimeout(\"window.top.location.reload()\",2000);\n";   
						echo "</script>\n";
					}else{
						echo '<form class="formCreateUser" align="center" action="adminPHP.php" method="post">
		  
								<fieldset>
									<legend>Enter the information to create a new user:</legend>
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
								<p align="center" id="butonAlign">
									<input class="buttonCreateUser" type="submit" name="submit" value="Submit Info"></p>
							</form>';
					}
					?>
				
			</div>
			<div id="rightPane">
					<?php
					if(isset($_POST["eventName"])){
						$eventName =  $_POST["eventName"];
						$eventDate = $_POST["eventDate"];
						$eventDesc = $_POST["eventDescription"];
						if($eventName!=NULL){
							if(strlen($eventDate)==10){
								echo '<div id="createUserText">';

									$id = 1;

									$query="select MAX(id) from event;";
									$result=mysql_query($query);
									if ($result){
										while($row=mysql_fetch_array($result,MYSQL_NUM)){
											$id = $row[0]+1;
										}
									}
									$day= substr($eventDate,3,2);
									$month= substr($eventDate,0,2);
									$year= substr($eventDate,6,4);
									$date=$year."-".$month."-".$day;
									if($eventDesc==NULL){
										$eventDesc="No event description.";
									}else{
										$eventDesc=addslashes($eventDesc);
									}

									$varInsert = "insert into event values('".$id."','".$eventName."','".$eventDesc."','".$date."')";
									if(mysql_query($varInsert)){
										echo "Successfully Created";
										echo "<script language=\"javascript\">\n";
										echo "setTimeout(\"window.top.location.reload()\",1500);\n";   
										echo "</script>\n";
									}else{
										echo "Error name or date invalid";
									}	
									echo '</div>';
							}else{
								echo '<div id="createUserText">Invalid date format<br /><br />
							</div>';
							}
						}else{
							echo '<div id="createUserText">You must fill the event name <br /><br />
							</div>';
						}
						echo "<script language=\"javascript\">\n";
						echo "setTimeout(\"window.top.location.reload()\",2000);\n";   
						echo "</script>\n";
					}else{
						echo '<form class="formCreateUser" align="center" action="adminPHP.php" method="post">
						<fieldset>
							<legend>Enter the information to create new event:</legend>
							<br/>
							 <div class="fieldCreateUser">
					            <input name="eventName" type="text" placeholder="Event Name">
					        </div>

					        <div class="fieldCreateUser">
						        	<script type="text/javascript">  
									  function FormatDateField(xField){  
									    var theText = xField.value;  
									    theText = theText.replace(/\//gi ,"");  
									    if(!(theText.length == 8 || theText.length == 8)){  
									      xField.focus();
									      return false;  
									    }  
									    theText = theText.substring(0,2) + "/" + theText.substring(2,4) + "/" + theText.substring(4,8);  
									    xField.value = theText;      
									  }  
									</script>  
									<input type="text" name="eventDate" placeholder="mm/dd/yyyy" onchange="FormatDateField(this)"> 
								</div> 
					        <div class="fieldCreateUser">
					            <textarea name="eventDescription" placeholder="Enter information about the event."rows="7" cols="50"></textarea>
					        </div>
						</fieldset>
						<p align="center"> 
							<input class="buttonCreateUser" type="submit" name="submit" value="Submit Info"></p>
					</form>';
					}
					?>
			
			</div>
		</div>
	</body>
</html> 
