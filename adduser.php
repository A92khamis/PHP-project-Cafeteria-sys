<!DOCTYPE html>
<html>
<head>
	<title>adduser</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header id="header"> 
	    <div class="navBarAdmin">
	      <a href="orders.php">Home</a> |
	      <a href="products.php">Products</a> |
	      <a href="users.php">Users</a> |
	      <a href="order_admin.php">Manual Order</a> |
	      <a href="checks.php">Checks</a>
	    </div>
 	</header>
    <div id="userTag">
		<img id="userImg" src="imgs/admin.jpg">
		<?php 
		if (isset($_SESSION['user_name'])) {
		echo "<u>".$_SESSION['user_name']."</u>";
	}
		 ?>
		<a id="log_out" href="login.php?out='out'">logout</a>
	</div>
<h1>Add User</h1>
<form class="form" " action="classuser.php" method="post"> 


		<label>Name</label>
		<input class="inputform" type="Text" name="name" required>
		<br> 
		<br> 

		<label>Email</label>
		<input class="inputform" type="Email" name="email" required>
		<br> 
		<br> 
	
		<label>Password</label>
		 	<input class="inputform" type="password" name="password" minlength="8" placeholder="Password" id="password" required>
		<br> 
		<br> 

		<label>Confirm Password</label>
		  	<input  class="inputform" type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>
		<br> 
		<br> 

		<label>Room Number</label>
		<input class="inputform" type="Number" name="room_no" required>
		<br> 
		<br> 
	
		<label>Ext</label>
		<input  class="inputform" type="Number" name="ext" required>
		<br> 
		<br> 
	
		<label>Profile Picture</label>
		<input type="file" name="pic" accept="image/*" required>
		<br> 
		<br> 
	
		
		<div align="Center"><input type="submit" name="submit" id="submit"><input type="reset" name="reset"> </div>
	
</form>
<div class="profilepic" >
    <img src="imgs/admin.jpg">
  </div>

  <script type="text/javascript">
 var password = document.getElementById("password");
 var confirm_password = document.getElementById("confirm_password");

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
confirm_password.onkeydown = validatePassword;

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}



  </script>
</body>
</html>