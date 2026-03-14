<?php
$host = "localhost";
$authenAccount = "root";
$pwd = "";
$db = "business";
  
   $dbHandler = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $authenAccount, $pwd); 
  	
	if($dbHandler)
	{
		echo "Database connected successfully.";
	}
	else
	{
		echo "Database Connect Failed.";
	}

?>

