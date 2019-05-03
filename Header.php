<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>
	<header class="container-fluid" id="header">
	 	<p><h1 class="h1">Scanner statistics</h1>
		We will provide info about your scanner</p>
		<div id="login">
			<?php 
			if($_SESSION!='undefine')
			if(!empty($_SESSION["login_user"]))
			{
				echo $_SESSION['login_user'];
				echo "<button onclick='getLogoutPage()'>logout</button>";
			}
			else
			{
				echo "<button onclick='getLoginPage()'>login</button>";
				echo "<button onclick='getRegistrPage()'>registrate</button>";
			}
			?>
		</div>
    </header>
	<div class="container-fluid">