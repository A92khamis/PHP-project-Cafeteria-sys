<!DOCTYPE html>
<html>
<head>
	<title>Checks</title>
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


	<!-- user image and name -->

	<div id="userTag">
		<img id="userImg" src="imgs/admin.jpg">
		<?php 
		if (isset($_SESSION['user_name'])) {
		echo "<u>".$_SESSION['user_name']."</u>";
	}
		 ?>
		<a id="log_out" href="login.php?out='out'">logout</a>
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
				$conn = new mysqli("localhost", "root", "12345", "php_project");

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
      <table bordercolor="black" border="5px" width="1000px" align="center">
			<tr align="center">
				<th> Name </th>
				<th> Total price </th>
			</tr>
			<?php

			$select_all_username_and_amount = "SELECT users.uname , sum(order_details.amount_price) AS total FROM users INNER JOIN orders ON users.uid = orders.uid INNER JOIN order_details ON  order_details.oid = orders.oid group by uname";
			$result_all_users = $conn->query($select_all_username_and_amount);
			while ($all_users_array = $result_all_users -> fetch_assoc()){
				echo "<tr align=\"center\">";
					foreach ($all_users_array as $key => $value) {

						echo "<td id=".$all_users_array["$key"].">".$all_users_array["$key"]."</td>";
					}
				echo "</tr>";
				}
			
			?>
			</table>
		</div>
		<div>
	<table bordercolor="black" border="5px" width="1000px" align="center">
		<tr align="center">

				<th> Name </th>
				<th> Order Price </th>
				<th> Order Date</th>
			</tr>
		<?php
		$username = $_POST["userName"];
		$fromDate=$_POST["fromDate"];
		$toDate=$_POST["toDate"];
		$select_username_and_amount = "SELECT users.uname , sum(order_details.amount_price) AS total, orders.odate , orders.oid FROM users INNER JOIN orders ON users.uid = orders.uid INNER JOIN order_details ON  order_details.oid = orders.oid WHERE users.uname ="."'".$username."'"." and orders.odate between'".$fromDate."'and'".$toDate."'group by orders.odate";
		$result_user = $conn->query($select_username_and_amount);
		while ($user_array = $result_user -> fetch_assoc()) {
			echo "<tr  id =".$user_array["oid"]." align=\"center\">";
				echo "<td>".$user_array["uname"]."</td>";
				echo "<td>".$user_array["total"]."</td>";
				echo "<td>".$user_array["odate"]."</td>";
				echo "<td hidden>".$user_array["oid"]."</td>";
			echo "</tr>";
			echo "<tr align=\"center\">";
			echo "<td colspan=\"3\">";
			$order_id = $user_array["oid"];
			// echo $order_id;

			$select_order_details = "SELECT products.pname , products.price, order_details.product_amount from products inner join order_details on products.pid = order_details.pid inner join orders on  order_details.oid = orders.oid where orders.oid ="."'".$order_id."'";
			$order_details_result = $conn -> query($select_order_details);
			while ($order_details_array = $order_details_result -> fetch_assoc()){
				// echo "<tr align=\"center\">";
				echo "<div> <img src=\"imgs/tea.jpg\" id=\"tea\">   <div>";
				foreach ($order_details_array as $key => $value) {
					echo "| ".$key." :  ";
        			echo $order_details_array["$key"];
       				echo "   ";
					// echo "<td>".$order_details_array["$key"]."</td>";
					# code...
				}
				// echo "</tr>";
			}
			echo "</td>";
			echo "</tr>";

			# code...
			// echo "<script>
			// 	var myElement".$user_array["oid"]." = document.getElementById(".$user_array["oid"].");
			// 	myElement.$user_array["oid"].addEventListener('click', function(){
			// 		echo\"hello\";
			// 	})

			// </script>";
		}
		?>
		</table>
		</div>

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
