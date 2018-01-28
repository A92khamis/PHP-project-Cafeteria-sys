<?php 
	$conn = mysqli_connect("localhost","root","12345","php_project");
	if (mysqli_connect_errno()) {
		trigger_error(mysqli_connect_error());
		echo "error";
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$update_user_sql = mysqli_query($conn, "UPDATE users SET uname = '$_POST[name]', email = '$_POST[email]', password = '$_POST[password]', room_no = '$_POST[room_no]', ext = '$_POST[ext]' where uid='$_POST[uid]'");
	}

	header("location: users.php");
?>