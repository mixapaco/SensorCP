<?php 
   require_once $_SERVER['DOCUMENT_ROOT'].'/SensorCP/connection.php';
?>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
   if(!empty($_POST["username"])&!empty($_POST["password"])&!empty($_POST["password2"])) {
      $db = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $mypassword2 = mysqli_real_escape_string($db,$_POST['password2']); 
      $myusername=hash('md5', $myusername);
      
      if($mypassword!=$mypassword2) {
         echo 'Passwords different';
      }

      $mypassword=hash('md5', $mypassword);
      $sql = "SELECT id FROM users WHERE username = '$myusername' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['id'];
      $count = mysqli_num_rows($result);

      if($count == 1) {
         echo "Your Login Name is invalid";
      }
      else {
         $sql = "INSERT INTO users (username,passcode) VALUES('$myusername','$mypassword')";
         $result = mysqli_query($db,$sql);
         header("location: ../index.php");
      }
   }
}
?>
<form action="log/registrate.php" method="post">
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
         <div class="labelforinput">   
            <label class="llog" for="inputrec">Повторіть пароль</label>
         </div>
         <div>
            <input class="form-control same-input" type="password" onchange='textInputFilter(this)' name="password2">
         </div>
      </div>
      <div class="logrows">
         <input class="btn btn-outline-secondary temp1" type='submit' value="Зареєструватись">
      </div>
   </div>
</form>