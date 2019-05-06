<?php 
   session_start();
   require_once '../connection.php';
?>
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
   if(!empty($_POST["username"]) & !empty($_POST["password"]))
   {
      $db = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $myusernamebuf = $myusername;
      $myusername = hash('md5', $myusername);
      $mypassword = hash('md5', $mypassword);

      $sql = "SELECT id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row['id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $myusernamebuf;
         header("location: ../GetAll.php");
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
}
?>
<form action="log/login.php" method="post">
	<div id="loginform" class="form-group">
		<div class="logrows">
			<div class="labelforinput">	
				<label class="llog" for="inputrec">Логін</label>
			</div>
			<div>
				<input class="form-control same-input" type="text" onchange='textInputFilter(this)' name="username">
			</div>
		</div>
		<div class="logrows">
			<div class="labelforinput">	
				<label class="llog" for="inputrec">Пароль</label>
			</div>
			<div>
				<input class="form-control same-input" type="password" onchange='textInputFilter(this)' name="password">
			</div>
		</div>
		<div class="logrows">
			<input class="btn btn-outline-secondary inp rig temp1" type='submit' value="Увійти">
		</div>
	</div>
</form>

<?php  ?>