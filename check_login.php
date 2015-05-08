<?php
	session_start();
	//mysql_connect("localhost","root","");
	
	include('connectAzure.php');
 
    //mysql_select_db("medmobdb");
    //mysql_query("SET NAMES UTF8");
    //echo $_POST['txtUsername'];
    //echo $_POST['txtPassword'];
	$strSQL = "SELECT * FROM user WHERE username = '".$_POST['txtUsername']."' 
	AND password = '".$_POST['txtPassword']."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	//echo "USer :".$objResult['userID'];
	if(!$objResult)
	{
			//echo "Username and Password Incorrect!";
			//echo $_POST['txtUsername']);
			echo "cannotConnect";
	}
	else
	{
			$_SESSION["userID"] = $objResult["userID"];
			//echo $_SESSION["userID"];
			session_write_close();
			
			echo "connect";
			//header("Location: dashboard/SymptomManage.php");
			die();
	}
	mysql_close();
?>
