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
<input type=submit >
</form>


<?php 
$mysqli = new mysqli("localhost", "root", "", "DB");
if ($mysqli->connect_errno) 
{
    echo "Не вдалося підкльчитися до MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else 
{
	echo "conected<br>";
}

if ( !empty($_POST["id"]) & !empty($_POST["value"])) 
{
  echo " Отримано id - ".$_POST["id"]."<br>";
 	$id=$_POST["id"];
 	$val=$_POST["value"];
 	$cdate=date('Y-m-d');
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

