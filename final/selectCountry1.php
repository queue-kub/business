<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add country</title>
</head>

<body>
	<h1>Add Country</h1>
	<form action="" method="POST">
	  <input type="text" placeholder="Enter Country code" name="Code"> 
        <br><br>
        <input type="text" placeholder="Enter Country name" name="Name">
        <br><br>
       	<input type="submit">
	</form>
</body>
</html>

<?php
if (!empty($_POST['Code']) && !empty($_POST['Name'])):
    require 'connectMid.php';
     $sql_insert = "insert into country values (:CountryCode, :CountryName)";

    $stmt = $dbHandler->prepare($sql_insert);
    $stmt->bindParam(':CountryCode', $_POST['Code']);
    $stmt->bindParam('CountryName', $_POST['Name']);
      
    if ($stmt->execute()):
        $message = 'Suscessfully add new country';
        //header("Location: /business/selectCountry1.php");
    else:
        $message = 'Fail to add new country';
    endif;
    echo $message;
    $dbHandler = null;
endif;   ?>

