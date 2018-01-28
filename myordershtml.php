<!DOCTYPE html>
<html>
<head>
	<title>My Orders</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<header id="header">
		<div class="navBar">
			<a href="order_user.php">Home</a> | 
			<a href="myordershtml.php">My Orders</a>
		</div>
	</header>

	<div id="userTag">
		<img id="userImg" src="imgs/admin.jpg">
		<u id="userName">Islam Askar</u>
	</div>

	<form action="myorders.php" method="post">
		<div align="center">
			<h1>My Orders</h1>
			<input type="date" name="datefrom" id="datefrom" placeholder="Date from">
			<input type="date" name="dateto" id="dateto" placeholder="Date from">
		</div>

		<br><br><br>

		<div>
			<table id="ordersTable" bordercolor="black" border="5px" width="1000px" align="center">
				<tr align="center">
					<th>Order date</th>
					<th>Status</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
				
				<?php		
					if (!empty($_GET['keys'])) {
						$myorders_keys_arr = explode(",",$_GET['keys']);
						$myorders_values_arr = explode(",",$_GET['values']);
						$myorders_arr = array_chunk($myorders_values_arr, 3);
						$ordersNum = sizeof($myorders_arr);					
						for($i = 0; $i < $ordersNum; $i++){
							echo "<tr align=\"center\">";
								for($j = 0; $j < 3; $j++){
									echo "<td>";
										echo $myorders_arr[$i][$j];
									echo "</td>";
								}

								if ($myorders_arr[$i][1] == "processing") {
									echo "<td>";
										echo "<button>"."Cancel"."</button>";
									echo "</td>";
								}
								else{
									echo "<td></td>";
								}
							echo "</tr>";
						}
					}
					else{
						echo "<div align=\"center\">No Orders<div> <br>";
					}
				?>
			
				<tr>
					<td hight= "100px" colspan="4">&nbsp;</td>
				</tr>
			</table>
<br><br>
			<p align="center"><button id="show" type="submit">Show</button></p> 
		</div>
	</form>
	<script type="text/javascript" src="myorder.js"></script>
</body>
</html>