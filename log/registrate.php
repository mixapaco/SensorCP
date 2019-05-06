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
   <div id="loginform" class="form-group">
      <div class="logrows">
         <div class="labelforinput">   
            <label class="llog" for="inputrec">Name</label>
         </div>
         <div>
            <input class="form-control same-input" type="text" onchange='textInputFilter(this)' name="username">
         </div>
      </div>
      <div class="logrows">
         <div class="labelforinput">   
            <label class="llog" for="inputrec">Password</label>
         </div>
         <div>
            <input class="form-control same-input" type="password" onchange='textInputFilter(this)' name="password">
         </div>
      </div>
	  <div class="logrows">
         <div class="labelforinput">   
            <label class="llog" for="inputrec">Repeat Password</label>
         </div>
         <div>
            <input class="form-control same-input" type="password" onchange='textInputFilter(this)' name="password2">
         </div>
      </div>
      <div class="logrows">
         <input class="btn btn-outline-secondary temp1" type='submit'>
      </div>
   </div>
	<!--<p>
		Name:<input type="text" onchange='textInputFilter(this)' name="username">
	</p>
	<p>
		Password:<input type="password" onchange='textInputFilter(this)' name="password">
	</p>
   <p>
      Repeat password:<input type="password" onchange='textInputFilter(this)' name="password2">
   </p>
	<input class='inp rig' type="submit">-->
</form>

<?php  ?>