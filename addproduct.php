<!DOCTYPE html>
<html>
<head>
	<title>addproduct</title>
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

<p align="center"><h1>Add Product</h1></p>
<br>
<br>

<form class="form" action="classproduct.php" method="POST"> 


		<label>Product</label>
		<input class="inputform" type="Text" name="product" required>
		<br> 
		<br> 

		<label>Price</label>
		<input class="inputform" type="Number" name="price" required>
		<br> 
		<br>
<label>Category</label>
<label>
<select class="custom-select" name="category" required> 
 <option value="Hot Drinks">Hot Drinks</option>
 <option value="Cold Drinks">Cold Drinks</option>
 <option value="Food">Food</option>
</select>
<a href="">AddCategory</a>
</label>
<br>
<br>
	
		<label>Product Picture</label>
		<input type="file" name="productpic" accept="image/*" >
		<br> 
		<br> 
	
		
		<div align="Center"><input type="submit" name="submit"><input type="reset" name="reset"> </div>
	
</form>
<div class="profilepic" >
    <img src="imgs/admin.jpg">
  </div>
</body>
</html>