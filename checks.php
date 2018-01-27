<!DOCTYPE html>
<html>
<head>
	<title>Checks</title>
	<link rel="stylesheet" type="text/css" href="css/georgestyle.css">

</head>
<body>

	<div class="menuBar">

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

	<!-- user image and name -->

	<div id="userTag">
		<img id="userImg" src="imgs/admin.jpg">
		<u>Islam Askar</u>
	</div>

	<div>
		<h1>Checks</h1>
	</div>

	<!--  the form -->

	<form action="#" method="post">
		<div>
			From Date: <input type="date" name="fromDate">
			To Date: <input type="date" name="toDate">
		</div>

		<div>
			<select name="userName">
				<!-- select user names from the data base to make the options -->
				<?php
				ini_set('display_errors', 'on');
				error_reporting(E_ALL);

				#connect to the database
				$conn = new mysqli("localhost", "root", "", "php_project");

				#check for errors

				if ($conn->connect_errno){
					trigger_error($db->connect_error);
					echo "ERROR";
				}

				#select the user names from the users table
				$user_names = $conn -> query("SELECT uname FROM `users`");
				$no_users = $user_names -> num_rows;
				echo $no_users;
				while ($user_names_array = $user_names -> fetch_assoc()){
					foreach ($user_names_array as $key => $value) {
						echo "<option>".$user_names_array["$key"]."</option>";
					}
				}
				?>
			</select>
		</div>

		<!-- place holder to show the orders -->
		<div id="displayOrders">
			<table>
			<?php
			$select_all_username_and_amount = "SELECT users.uname , sum(order_details.amount_price) AS total FROM users INNER JOIN orders ON users.uid = orders.uid INNER JOIN order_details ON  order_details.oid = orders.oid group by uname";
			$result_all_users = $conn->query($select_all_username_and_amount);
			while ($all_users_array = $result_all_users -> fetch_assoc()){
				echo "<tr>";
					foreach ($all_users_array as $key => $value) {

						echo "<td id=".$all_users_array["$key"].">".$all_users_array["$key"]."</td>";
					}
				echo "</tr>";
				}
			
			?>
			</table>
		</div>
		<?php
		$username = $_POST["userName"];
		$select_username_and_amount = "SELECT users.uname , sum(order_details.amount_price) AS total, orders.odate FROM users INNER JOIN orders ON users.uid = orders.uid INNER JOIN order_details ON  order_details.oid = orders.oid WHERE users.uname ="."'".$username."'"."group by orders.odate";
		$result_user = $conn->query($select_username_and_amount);
		while ($user_array = $result_user -> fetch_assoc()) {
			echo "<tr>";
			foreach ($user_array as $key => $value){
				echo "<td id=".$user_array["$key"].">".$user_array["$key"]."</td>";
			}
			echo "</tr>";
			# code...
		}
		?>


		<div>
			<button id="showBtn">SHOW</button>
		</div>
	</form>

	<div>
		<table>

		</table>
	</div>

<script type="text/javascript">
	var btn = document.getElementById('showBtn');
</script>

</body>
</html>