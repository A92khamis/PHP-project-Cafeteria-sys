<!DOCTYPE html>
<html>
<head>
	<title>All Products</title>
</head>
<body>
	<form action="update_product.php" method="post">
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
					$i = 0;
					
					$products_sql = mysqli_query($conn,"Select pname, category, price, pid, available FROM products");
					while ($products_arr_assoc = mysqli_fetch_assoc($products_sql)) {
						echo "<tr align=\"center\">";
						$product_data_arr= array();
							foreach ($products_arr_assoc as $key => $value) {
								if ($key != "pid" && $key != "available") {		
									echo "<td>";
										echo $products_arr_assoc[$key];
										$product_data_arr[] = $products_arr_assoc[$key];
									echo "</td>";
								}
								else{
									echo "<td hidden>";
										echo $products_arr_assoc[$key];
										$product_data_arr[] = $products_arr_assoc[$key];
									echo "</td>";
								}
							}
							echo "<td align=\"center\">"."</td>";
							
							$product_data_str = implode(",", $product_data_arr);
							echo "<input type=\"text\" name=\"product_data_str\" value=\"$product_data_str \" hidden>";
							
							echo "<td align=\"center\">";
								//Available
								if ($product_data_arr[4] == "true") {
									echo "<a name=\"available\" href=\"http://localhost/phpproject/update_product_sql.php?product_data=$product_data_str\">Unavailable</a>"."  ";
								}
								else{
									echo "<a name=\"available\" href=\"http://localhost/phpproject/update_product_sql.php?product_data=$product_data_str\">Available</a>"."  ";
								}
								
								//Edit
								echo "<a href=\"http://localhost/phpproject/update_product.php?update_data=$product_data_str\">Edit</a>"."  ";
								
								//Delete
								echo "<a name=\"delete\" href=\"http://localhost/phpproject/updateproductsql.php?product_data=$product_data_str\">Delete</a>"."  ";
							echo "</td>";
						echo "</td>";
					}
				?>
			</table>
		</div>
	</form>
</body>
</html>