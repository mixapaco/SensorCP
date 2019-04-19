<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<form action='' method='post'>
<p>ID:<input type='text'  name='id' ></p>
<p>Value:<input type='text'  name='value' ></p>
<p>Date:<input type='text'  name='cdata' ></p>
<input type=submit >
</form>


<?php 
require_once 'connection.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) 
{
    echo "Не вдалося підкльчитися до MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else 
{
	echo "conected<br>";
}

if ( !empty($_POST["id"]) & !empty($_POST["value"]) & !empty($_POST["cdata"])) 
{
  echo " Отримано id - ".$_POST["id"]."<br>";
 	$id=$_POST["id"];
 	$val=$_POST["value"];
 	//$cdate=date('Y-m-d');
 	$cdate=$_POST["cdata"];
 	echo $cdate;
 	$mysqli->query("INSERT INTO Sensors(id,Value,cdate) VALUES ($id,$val,'$cdate')");
 } 
 else 
 	{
 		echo "Зміні не дійшли спробуйте ще раз."; 
 	}




 ?>	
</body>
</html>

