<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="nav">
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
    <div id="user">    
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