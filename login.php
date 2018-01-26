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
    <p id="error-p" style="color: red"></p>
  </div>

<?php
$GLOBALS['error'] = 0;
function check_in_database()
{
  $conn = new mysqli("localhost","essam","iti123","php_project");
  if ($conn->connect_errno) {
trigger_error($conn->connect_error);
}
$query = "select * from users where email = ".$_POST['iemail']."";
$result = $conn->query("select * from users where email = \"".trim($_POST['iemail'])."\"");
//echo $conn->error;
if ($result) {
while($row = $result->fetch_assoc()) {
if ($row['email'] == $_POST['iemail']) {
if ($_POST["ipassword"] == $row['password']) {
  header("Location: adduser.html");
  $error=0;
}else{
echo "<p>invaled email or password </p>";
$error=1;
}
}else{
echo "<p>invaled email or password </p>";
$error=1;
}
}

}
}
if ($_POST) {
  check_in_database();
}

 ?>
<!-- <script type="text/javascript">
  var error = "<?php echo $error ?>"
  var p = document.getElementById('error-p');
  if (error==1) {
    p.innerHTML="invaled email or password";
  }else{
     p.innerHTML="";
  }
</script> -->

</body>
</html>