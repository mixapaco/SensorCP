<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<form action='' method='GET'>
	<p>ID:<input type='text'  name='id' ></p>
	<p>Value:<input type='text'  name='value' ></p>
	<p>Date:<input type='text'  name='cdata' ></p>
	<p>UserId:<input type='text'  name='userID' ></p>
	<input type=submit >
</form>

<?php 
	require_once 'connection.php';
	$mysqli = new mysqli($host, $user, $password, $database);
	if ($mysqli->connect_errno) {
	    echo "Не вдалося підкльчитися до MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else {
		echo "connected<br>";
	}

	if (!empty($_GET["id"]) & !empty($_GET["value"]) & !empty($_GET["cdata"]) & !empty($_GET["userID"])) {
	  	echo " Отримано id - ".$_GET["id"]."<br>";
	 	$id = (int)($_GET["id"]);
	 	$val = (int)($_GET["value"]);
	 	//$cdate=date('Y-m-d');
	 	$cdate = $_GET["cdata"];
	 	$userid= $_GET["userID"];
	 	echo $cdate;
	 	echo $val;
	 	echo $userid;
	 	$mysqli->query("INSERT INTO Sensors(id,Value,cdate,UserID) VALUES ($id,$val,'$cdate','$userid')");
	} 
	else {
	 	echo "Зміні не дійшли спробуйте ще раз."; 
	}
?>	
</body>
</html>

