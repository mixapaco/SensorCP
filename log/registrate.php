<?php 
 
   require_once '../connection.php';
?>
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
   if(!empty($_POST["username"])&!empty($_POST["password"])&!empty($_POST["password2"]))
   {
      $db = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $mypassword2 = mysqli_real_escape_string($db,$_POST['password2']); 
      $myusername=hash('md5', $myusername);
      
      if($mypassword!=$mypassword2)
      {
         echo 'Passwords different';
      //return;
      }

      $mypassword=hash('md5', $mypassword);

      $sql = "SELECT id FROM users WHERE username = '$myusername' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) 
      {
         echo "Your Login Name is invalid";
      }
      else 
      {
         $sql = "INSERT INTO users (username,passcode) VALUES('$myusername','$mypassword')";
         $result = mysqli_query($db,$sql);
         header("location: ../GetAll.php");
      }
   }
}
 ?>
<form action="log/registrate.php" method="post">
	<p>
		Name:<input type="text" name="username">
	</p>
	<p>
		Password:<input type="text" name="password">
	</p>
   <p>
      Repeat password:<input type="text" name="password2">
   </p>
	<input type="submit">
</form>

<?php  ?>