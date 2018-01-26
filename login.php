<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="login-wrap">
  <h1 align="Center" >Cafeteria</h1>
  
  <div class="form">
    <form method="post" action="page2.php">
  	<label>Email</label>
    <input class="inputform" type="Email" name="iemail" />
    <br>
    <br>
    <label>Password</label>
    <input class="inputform" type="password" name="ipassword"/>
    <br>
    <br>
    <button> Sign in </button>
    <br>
    <br>
    <a href="#"><p>Forgot Your Password</p></a>
    </form>
  </div>

<!-- My PHP CODE -->

<?php

#to display the errore
  ini_set('display_errors', 'on');
  error_reporting(E_ALL);
  session_start();


# inserting my variables in session array
foreach ($_POST as $key => $value) {
  $_SESSION["$key"] = $value;
}

?>

</body>
</html>