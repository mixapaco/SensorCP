<?php include 'header.php'; ?>
<div id="nav">
	<div class='logbutt'>
		<button  class='btn btn-outline-secondary temp' type='button' onclick='getLoginPage()'>Увійти</button>
	</div>
	<div class='logbutt'>
		<button  class='btn btn-outline-secondary temp' type='button' onclick='getRegistrPage()'>Зареєструватись</button>
	</div>
</div>
<div id="login" class="container">
	<?php 
		require_once 'log/registrate.php';
	?>	
</div>
<?php include 'footer.php'; ?>