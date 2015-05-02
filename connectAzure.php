<?php
//Connect Window Azure
	// $host = "ap-cdbr-azure-southeast-a.cloudapp.net";
	// $username = "b999ca0d73df38";
	// $password = "1d841e95";
	// $database = "medmobdb";;
	// $objConnect = mysql_connect($host,$username,$password);

	// if($objConnect)
	// {
	// 	//echo "MySQL Connected";
	// }
	// else
	// {
	// 	echo "MySQL Connect Failed : Error : ".mysql_error();
	// }

	// $objDB = mysql_select_db($database) or die("Couldn't select database");
	// mysql_query("SET NAMES UTF8");

//Connect Localhost
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "medmobdb";
	$objConnect = mysql_connect($host,$username,$password);

	if($objConnect)
	{
		//echo "MySQL Connected";
	}
	else
	{
		echo "MySQL Connect Failed : Error : ".mysql_error();
	}
	$objDB = mysql_select_db($database) or die("Couldn't select database");
	mysql_query("SET NAMES UTF8");
?>
