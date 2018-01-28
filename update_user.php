<!DOCTYPE html>
<html>
<head>
	<title>updateuser</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="nav">
   <label><a href="#">Home</a></label>
   		<label>|</label>
   <label><a href="#">Products</a></label>
      	<label>|</label>
   <label><a href="#">Users</a></label>
      	<label>|</label>
   <label><a href="#">Manuel Order</a></label>
      	<label>|</label>
   <label><a href="#">Checks</a></label>
</div>
    <div id="user">    
</div>
<h1>Update User</h1>
<form class="form" " action="update_user_sql.php" method="post"> 
	<?php $user_data_arr = explode(",", $_GET['update_data']);?>
		<label>Name</label>
		<input class="inputform" type="Text" name="name" required value="<?php echo $user_data_arr[0];?>">
		<br> 
		<br> 

		<label>Email</label>
		<input class="inputform" type="Email" name="email" required value="<?php echo $user_data_arr[1];?>">
		<br> 
		<br> 
	
		<label>Password</label>
		 	<input class="inputform" type="text" name="password" minlength="8" placeholder="Password" id="password" required value="<?php echo $user_data_arr[2];?>">
		<br> 
		<br> 

		<label>Confirm Password</label>
		  	<input  class="inputform" type="text" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required value="<?php echo $user_data_arr[2];?>">
		<br> 
		<br> 

		<label>Room Number</label>
		<input class="inputform" type="Number" name="room_no" required value="<?php echo $user_data_arr[3];?>">
		<br> 
		<br> 
	
		<label>Ext</label>
		<input  class="inputform" type="Number" name="ext" required value="<?php echo $user_data_arr[4];?>">
		<br> 
		<br> 
	
		<label>Profile Picture</label>
		<input type="file" name="pic" accept="image/*" required>
		<br> 
		<br> 
	
		
		<div align="Center"><input type="submit" name="submit" id="submit"><input type="reset" name="reset"> </div>

		<input class="inputform" name="uid" hidden value="<?php echo $user_data_arr[5];?>" ">
	
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