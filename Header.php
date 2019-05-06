<?php 
	session_start();
  define('SensorCP/', __DIR__);

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
	<div id="main">
	<header id="header" class="container-fluid" >
	 	<p><h1 class="h1">Scanner statistics</h1>
		<div id="border-bot" class="container">We will provide info about your scanner</div></p>
		 
		<!--<button class='btn btn-outline-secondary' type='button' onclick='getLogoutPage()'>logout</button>-->
    
			<?php 
			if(!empty($_SESSION))
			if(!empty($_SESSION["login_user"])){ 
        $way='log/logout.php';
        echo "<form action='$way'>";
      	echo $_SESSION['login_user'];
				echo "<button class='btn btn-outline-secondary' type='submit' >logout</button>";
        echo '</form>';
			}
			//else
			//{
				//echo "<div class='logbutt'><button class='btn btn-outline-secondary' type='button' onclick='getLoginPage()'>login</button></div>";
				//echo "<div class='logbutt'><button class='btn btn-outline-secondary' type='button' onclick='getRegistrPage()'>registrate</button></div>";
			//}
			?>
		
    </header>
	<div id="content" class="container-fluid">