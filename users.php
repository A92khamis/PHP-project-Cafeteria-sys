<!DOCTYPE html>
<html>
<head>
	<title>All Users</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<form action="update_user.php" method="post">
	
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

		<div align="center">
			<h1>All users</h1>
			<a href="adduser.html">Add User</a>
		</div>

		<br><br><br>

		<div>
			<table bordercolor="black" border="5px" width="1000px" align="center">
				<tr align="center">
					<th>Name</th>
					<th>Room</th>
					<th>Ext</th>
					<th>Image</th>
					<th>Action</th>
				</tr>

				<?php		
				
					$conn = mysqli_connect("localhost","root","123456","php_project");
					if (mysqli_connect_errno()) {
						trigger_error(mysqli_connect_error());
						echo "error";
					}

					$users_sql = mysqli_query($conn,"select uname, email, password,room_no, ext, uid from users;");
					while ($users_arr_assoc = mysqli_fetch_assoc($users_sql)) {
						echo "<tr align=\"center\">";
						$user_data_arr= array();
							foreach ($users_arr_assoc as $key => $value) {
								if ($key != "email" && $key != "password" && $key != "uid") {	
									echo "<td>";
										echo $users_arr_assoc[$key];
										$user_data_arr[] = $users_arr_assoc[$key];
									echo "</td>";
								}
								else{
									echo "<td hidden>";
										echo $users_arr_assoc[$key];
										$user_data_arr[] = $users_arr_assoc[$key];
									echo "</td>";
								}
							}
							echo "<td align=\"center\">"."</td>";
							
							$user_data_str = implode(",", $user_data_arr);
							echo "<input type=\"text\" name=\"user_data_str\" value=\"$user_data_str \" hidden>";

							echo "<td align=\"center\">";
								//Edit
								echo "<a href=\"http://localhost/phpproject/update_user.php?update_data=$user_data_str\">Edit</a>"."  ";
								
								//Delete
								echo "<a href=\"\">Delete</a>"."  ";
							echo "</td>";
						echo "</td>";
					}
				?>
			</table>
		</div>
	</form>
</body>
</html>