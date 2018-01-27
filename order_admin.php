<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/georgestyle.css">
</head>
<body>

<!-- menu bar -->

	<div id="menuBar">
		<a href="page2.html">Home</a> |
		<a href="page2.html">Products</a> |
		<a href="page2.html">Users</a> |
		<a href="page2.html">Manual Order</a> |
		<a href="page2.html">Checks</a>
	</div>

<!-- user image and name -->

	<div id="userTag">
		<img id="userImg" src="imgs/admin.jpg">
		<u>Islam Askar</u>
	</div>

<!-- search bar -->

	<div id="searchBar">
		<input id="search_input" type="text" name="search" onkeyup="searchFun()" placeholder="search">
	</div>

<!-- order form -->

	<div id="orderForm">
	<form oninput="teaPrice.value=teaAmount.value*5+' EGP', coffePrice.value=coffeAmount.value*7+' EGP', juicePrice.value=juiceAmount.value*12+' EGP', pepsiPrice.value=pepsiAmount.value*8+' EGP'" action="order_admin.php" method="post">
		

			<table id="order_div" >
				
			</table>
		
		    <table>
			<tr>
				<td>Notes</td>
				<td><textarea name="notes" cols="21" rows="10"></textarea></td>
			</tr>
			<tr>
				<td>Room No.</td>
				<td><select name="roomNo">
					<option>2006</option>
					<option>2023</option>
					<option>2008</option>
				</select></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Confirm"></td>
			</tr>
		</table>
	</form>
	</div>
	<div>
		<table>
			<tr>
				<td>
					Add to user:
				</td>
			</tr>
			<tr>
				<td>
					<select>
					<option>Islam Askar</option>
					<option>S.Bahader</option>
					<option>H.Sabagh</option>
					</select>
				</td>
			</tr>
		</table>
	</div>

<!-- products -->

	<div id="productOrder">
		<!-- <table>
			<tr>
				<td>
					<img src="imgs/tea.jpg">
					<div name="productName">tea</div>
					<div name="productPrice">5 EGP</div>
				</td>
				<td>
					<img src="imgs/tea.jpg">
					<div name="productName">Coffe</div>
					<div name="productPrice">7 EGP</div>
				</td>
				<td>
					<img src="imgs/tea.jpg">
					<div name="productName">Juice</div>
					<div name="productPrice">12 EGP</div>
				</td>
				<td>
					<img src="imgs/tea.jpg">
					<div name="productName">Pepsi</div>
					<div name="productPrice">8 EGP</div>
				</td>
			</tr>
		</table> -->
		<?php 
		require('product.php');
		$conn = new mysqli("localhost","essam","iti123","php_project");
  if ($conn->connect_errno) {
trigger_error($conn->connect_error);
}
$query = "select * from products";
$result = $conn->query($query);
$array = array();
if ($result) {
while($row = $result->fetch_assoc()) {
	$product = new Product($row['pid'],$row['pname'],$row['price']);
	$array[]=$product;
	echo "<div id=\"".$product->pname."-".$product->pid."\" class=\"product\"> <div> <img class=\"pimage\" src=\"imgs/tea.jpg\"></div>
	<div id=\"".$product->pname."\">".$product->pname."</div>
	<div id=\"".$product->pid."\"></div>
	<label class=\"price\">".$product->price." LE</label></div>";
}
print_r($array);

}else{
	echo "<div id=\"noitems\"> <label> there is no items </label></div>";
}
echo "<script type=\"text/javascript\">
function searchFun() {
	var search = document.getElementById('search_input');
	for (var i = 0; i < ".sizeof($array)."; i++) {
		if (".$array[0]->pname.".includes(search.value)) {
			console.log('include');
		}
	}
}

</script>";

		 ?>
	</div>

	 <script type="text/javascript">
var products = document.getElementsByClassName('product');
var orderPoard = document.getElementById('order_div');
if (products) {
for (i = 0; i < products.length; i++) {
    products[i].addEventListener('click',function (e) {
    	console.log(this.id);
    	var index= this.id.indexOf('-');
    	var last = this.id.length;
    	var item= this.id.slice(0,index);
    	var id = this.id.slice(index,last);
    	console.log(index);
    	
    	console.log(item);
	orderPoard.innerHTML+="<tr><td>"+item+"</td><td><input hidden=\"hidden\" value=\""+id+"\"></input><input type=\"number\" name=\"teaAmount\" min=\"0\" value=\"1\"></td><td><output name=\"teaPrice\"></output></td</tr>";
});
}
}	 	

	 </script>
</body>
</html>