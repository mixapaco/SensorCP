<?php session_start();
    require_once '../connection.php';
?>
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $db = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $myusername=hash('md5', $myusername);

      $mypassword=hash('md5', $mypassword);



      $sql = "SELECT id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row


       

      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         echo 'yes';
         header("location: ../GetAll.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
 ?>
<form action="login.php" method="post">
	<p>
		Name:<input type="text" name="username">
	</p>
	<p>
		Password:<input type="text" name="password">
	</p>
	<input type="submit">
</form>

<?php  ?>