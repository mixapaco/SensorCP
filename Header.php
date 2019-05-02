<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
	 	<div class="headerr">
      <h1 class='hesh'>Scanner statistics</h1>
      <hr>
			<p class='pesh'>We will provide info about your scanner</p>
      <hr>
		  <div id="callout">
        <h2> <i class="fa fa-envelope" aria-hidden="true"></i></h2>
    	</div>
      <div id="login">
      <?php 
      if($_SESSION!='undefine')
      if(!empty($_SESSION["login_user"]))
      {
        echo $_SESSION['login_user'];
        echo 
        "<button onclick='getLogoutPage()'>
         logout 
        </button>";
      }
      else
      {
        echo 
        "<button class='inp lef' onclick='getLoginPage()'>
         login 
        </button>";
        echo 
        "<button class='inp rig' onclick='getRegistrPage()'>
         registrate
        </button>";

      }
       ?>
       
      
      </div>
    </div>
  </header>
  <div class="conntennt">