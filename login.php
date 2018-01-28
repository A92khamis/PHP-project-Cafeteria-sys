
<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="login-wrap">
  <h1 align="Center" >Cafeteria</h1>
  <form action="login.php" method="post">
  <div class="form">
  	<label>Email</label>
    <input class="inputform" type="Email" name="iemail" required="required" />
    <br>
    <br>
    <label>Password</label>
    <input class="inputform" type="password" name="ipassword" required="required" />
    <br>
    <br>
    <input type="submit" name="submit" value="sign in">
    <br>
    <br>
    <a href="#"> <p> Forgot Your Password</p></a>
    </form>
    <p id="error-p" style="color: red"> <?php echo (isset($_GET['error']) ? 'invaled email or password' : '');?></p>
  </div>

<?php
$GLOBALS['error'] = 0;
if (!empty($_GET)) {
  if (isset($_GET['out'])) {
    if (!empty($_SESSION)) {
      
    $_SESSION = array();
    session_destroy();
  }
  }
}
function check_in_database()
{
  $conn = new mysqli("localhost","root","12345","php_project");
  if ($conn->connect_errno) {
trigger_error($conn->connect_error);
}
$query = "select * from users where email = ".$_POST['iemail']."";
$result = $conn->query("select * from users where email = \"".trim($_POST['iemail'])."\"");
//echo $conn->error;
$hash=md5(trim($_POST['ipassword']));
if ($result) {
while($row = $result->fetch_assoc()) {
if ($row['email'] == trim($_POST['iemail'])) {
if ($hash == $row['password']) {
  $error=0;
  session_start();
  $_SESSION['user_name'] = $row['uname'];
  $_SESSION['user_Id'] = $row['uid'];
  if ($row['uid']==1) {
    header("Location: orders.php");
  }else{
    header("Location: order_user.php");
  }
  
}else{
  $er="erorr";
header("Location: login.php?error=$er");
$error=1;
}
}else{
header("Location: login.php?error=$er");
$error=1;
}
}
}
$result->free();
$conn->close();
}
if ($_POST) {
  check_in_database();
}

 ?>
<!-- <script type="text/javascript">
  var error = "<?php //echo $error ?>"
  var p = document.getElementById('error-p');
  if (error==1) {
    p.innerHTML="invaled email or password";
  }else{
     p.innerHTML="";
  }
</script> -->

</body>

</html>