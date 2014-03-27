<?php
	session_start();
	$_SESSION["nickname"] = $_POST["nickname"];
	$_SESSION["password"] = $_POST["password"];
	$_SESSION["invalid"] = 0;

	mysql_connect('127.0.0.1','root','malk');
	mysql_select_db('club');

	$nickname =  $_SESSION["nickname"];
	$password = $_SESSION["password"];
	$typeUser=0;

	$query="select id,type from user where nickname = '".$nickname."' and password = '".$password."';";
	$result=mysql_query($query);
	$result_user=mysql_query($query);
	if ($result){
		if($row=mysql_fetch_array($result,MYSQL_NUM)){
			while($row_user=mysql_fetch_array($result_user,MYSQL_NUM)){
				$typeUser=$row_user[1];
				$_SESSION["userId"] = $row_user[0];

			}
			if($typeUser==0){
				$_SESSION["invalid"]=0;			
				echo "<script language=\"javascript\">\n";
				echo "window.location = \"user.php\";\n";
				echo "</script>\n";
			}else{
				$_SESSION["invalid"]=0;			
				echo "<script language=\"javascript\">\n";
				echo "window.location = \"admin.php\";\n";
				echo "</script>\n";
			}
	}else{
			$_SESSION["invalid"]=1;	
			echo "<script language=\"javascript\">\n";
			echo "window.location = \"inicialPage.php\";\n";
			echo "</script>\n";
		}
	}
?>