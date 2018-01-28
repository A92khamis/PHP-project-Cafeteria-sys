<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/georgestyle.css">
	<style type="text/css">
		#line{
			border: 1px;
			border-color: black;
		}
		.product{
			display: inline-block;
			margin: 10px;
		}
		.product:hover {
			transform: scale(.75,.75);
		}
		.delbtn{
			background-color: lightgray;
			margin-left: 2px;
		}
	</style>
</head>
<body>

<!-- menu bar -->

	<div id="menuBar">
		<a href="page2.html">Home</a> |
		<a href="page2.html">My Orders</a>
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
	<form id="form" action="order_user.php" method="post">
		

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

<!-- products -->
<div id="searchDiv">
	
</div>
<div id="line"> <label></label></div>
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

}else{
	echo "<div id=\"noitems\"> <label> there is no items </label></div>";
}
$result->free();
$conn->close();
 function backdata()
{
	for ($i=0; $i < sizeof($array); $i++) { 
		
			echo "<div id=\"".$array[$i]->pname."-".$array[$i]->pid."\" class=\"product\"> <div> <img class=\"pimage\" src=\"imgs/tea.jpg\"></div>
	<div id=\"".$array[$i]->pname."\">".$array[$i]->pname."</div>
	<div id=\"".$array[$i]->pid."\"></div>
	<label class=\"price\">".$array[$i]->price." LE</label></div>";
		}
	}
if (!empty($_POST)) {
	$conn = new mysqli("localhost","essam","iti123","php_project");
  if ($conn->connect_errno) {
trigger_error($conn->connect_error);
}
$i=20;
$i++;
date_default_timezone_set('Africa/Cairo');
	$query = "insert into orders values ('".$i."','".date("Y-m-d H:i:s")."','orderd','".$_SESSION['user_id']."')";

if ($conn->query($query)) {	
$lastid= $conn->insert_id;
for ($j=1; $j <=$_POST['count']; $j++) { 
	if (isset($_POST['id'.$j])&&isset($_POST['teaAmount'.$j])&&isset($_POST['teaPrice'.$j])) {
$query2 = "insert into order_details values ('".$lastid."','".$_POST['id'.$j]."','".$_POST['teaAmount'.$j]."','".$_POST['teaPrice'.$j]*$_POST['teaAmount'.$j]."')";
$conn->query($query2);
}

}
}
echo $conn->error;
$conn->close();

}




		 ?>
	</div>

	 <script type="text/javascript">
var products = document.getElementsByClassName('product');
var orderPoard = document.getElementById('order_div');
var temp = products;
	var productsboard = document.getElementById('productOrder');
count=0;
if (products) {
for (i = 0; i < products.length; i++) {
    products[i].addEventListener('click',function (e) {
    	count++;
    	console.log(this.id);
    	var index= this.id.indexOf('-');
    	var last = this.id.length;
    	var item= this.id.slice(0,index);
    	var id = this.id.slice(index+1,last);
    	var d=this.children;
    	var price = d[3].innerHTML.slice(0,d[3].innerHTML.indexOf(" "));
    	console.log(index);
    	var dItem = document.getElementById("div"+id);
    	console.log(item);
    	if (!dItem) {
	orderPoard.innerHTML += "<div id='div"+id+"'><label>"+item+"</label><input hidden=\"hidden\" name=\"id"+count+"\" value=\""+id+"\"></input><input type=\"number\" name=\"teaAmount"+count+"\" min=\"1\" value=\"1\"><input name=\"teaPrice"+count+"\" hidden=\"hidden\" value=\""+price+"\"></input><input name=\"count\" hidden=\"hidden\" value=\""+count+"\"></input><input type=\"button\" onclick=\"delitem(this)\" name=\"del\" class=\"delbtn\" id='del"+id+"' value=\"X\"></input><output name=\"pprice"+count+"\" ></output ></div>";
	
}else{
	var childs = dItem.children;
	childs[2].value = ++childs[2].value;
}

});
}

}	 	
function searchFun() {
	var search = document.getElementById('search_input');
	var products = document.getElementsByClassName('product');
	
	var searchBoard = document.getElementById('searchDiv');
	searchBoard.innerHTML="";
	for (var i = 0; i < temp.length; i++) {
		var divs = temp[i].children;
		if (divs[1].id.toString().includes(search.value)) {
			if (search.value) {
			console.log("include");
			productsboard.innerHTML = "<div id=\""+temp[i].id+"\" class=\"product\"> <div> <img class=\"pimage\" src=\"imgs/tea.jpg\"></div>\
	<div id=\""+divs[1].id+"\">"+divs[1].id+"</div>\
	<div id=\""+divs[2].id+"\"></div>\
	<label class=\"price\">"+divs[3].innerHTML+" </label></div>";
}
		}else{
			searchBoard.innerHTML="<div>there is no item match</div>";
		}
	}
	
	}

	function delitem(e) {
		console.log("allah");
		console.log(e.parentNode);
		e.parentNode.remove();
	}


	 </script>
</body>
</html>