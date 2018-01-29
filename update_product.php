<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
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
	
    <div id="userTag">
		<img id="userImg" src="imgs/admin.jpg">
		<?php 
		if (isset($_SESSION['user_name'])) {
		echo "<u>".$_SESSION['user_name']."</u>";
	}
		 ?>
		<a id="log_out" href="login.php?out='out'">logout</a>
	</div>
<h1>Update Product</h1>
<form class="form" action="update_product_sql.php" method="POST"> 

	<?php $product_data_arr = explode(",", $_GET['update_data']);?>

		<label>Product Name</label>
		<input class="inputform" type="Text" name="product" required value="<?php echo $product_data_arr[0];?>">
		<br> 
		<br> 

		<label>Price</label>
		<input class="inputform" type="Number" name="price" required value="<?php echo $product_data_arr[2];?>">
		<br> 
		<br>

		<label>Category</label>
		<label>
		<select class="custom-select" name="category" required value="<?php echo $product_data_arr[1];?>"> 
		 <option><?php echo $product_data_arr[1];?></option>
		 <option value="Hot Drinks">Hot Drinks</option>
		 <option value="Cold Drinks">Cold Drinks</option>
		 <option >Food</option>
</select>
<a href="">Add Category</a>
</label>
<br>
<br>
	
		<label>Product Picture</label>
		<input type="file" name="productpic" accept="image/*" >
		<br> 
		<br> 
		
	<input class="inputform" name="pid" hidden value="<?php echo $product_data_arr[3];?>" ">
		
	<div align="Center">
		<input type="submit" name="submit" >
		<input type="reset" name="reset">
	</div>
	
</form>
<div class="profilepic" >
    <img src="imgs/admin.jpg">
  </div>
</body>
</html>