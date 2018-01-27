<!DOCTYPE html>
<html>
<head>
	<title>All Products</title>
</head>
<body>
	<form action="products.php" method="post">
		<div>
			<a href="">Home</a> | 
			<a href="">Products</a> |
			<a href="">Users</a> |
			<a href="">Manual Order</a> |
			<a href="">Checks</a>
			<img src="" align="right">
			<a href="" align= "right" name="username">Admin</a>
		</div>

		<div>
			<h2>All Products</h2>
			<a href="">Add Product</a>
		</div>

		<br><br><br>

		<div>
			<table bordercolor="black" border="5px" width="1000px" align="center">
				<tr align="center">
					<th>Product</th>
					<th>Category</th>
					<th>Price</th>
					<th>Image</th>
					<th>Action</th>
				</tr>

				<?php		
				
					$conn = mysqli_connect("localhost","root","godislove!!","php_project");
					if (mysqli_connect_errno()) {
						trigger_error(mysqli_connect_error());
						echo "error";
					}

					$products_sql = mysqli_query($conn,"Select pname, category, price FROM products");
					while ($products_arr_assoc = mysqli_fetch_assoc($products_sql)) {
						echo "<tr align=\"center\">";
							foreach ($products_arr_assoc as $key => $value) {
								echo "<td>";
									echo $products_arr_assoc[$key];
								echo "</td>";
							}
							echo "<td align=\"center\">"."</td>";
							
							echo "<td align=\"center\">";
								echo "<a href=\"\">Available</a>"."  ";
								echo "<a href=\"\">Edit</a>"."  ";
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