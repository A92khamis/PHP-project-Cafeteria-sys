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
		<a href="page2.html">Products</a> |
		<a href="page2.html">Users</a> |
		<a href="page2.html">Manual Order</a> |
		<a href="page2.html">Checks</a>
	</div>

<!-- user image and name -->

	<div id="userTag">
		<img id="userImg" src="imgs/admin.jpg">
		<?php 
		if (isset($_SESSION['user_name'])) {
		echo "<u>".$_SESSION['user_name']."</u>";
	}
		 ?>
		<a id="log_out" href="login.php?out='out'">logout</a>
		<!-- <<?php 
		/*echo "<script type=\"text/javascript\">
		var logo=document.getElementById('log_out');
		logo.addEventListener('click',function(e){
			".$_SESSION = array();session_destroy();header("Location: login.php?out='out'");"
		})
		</script>"*/
		 ?> -->
	</div>

<!-- search bar -->

	<div id="searchBar">
		<input id="search_input" type="text" name="search" onkeyup="searchFun()" placeholder="search">
	</div>

<!-- order form -->

	<div id="orderForm">
	<form oninput="pprice.value=teaAmount.value*teaPrice.value+' EGP'" action="order_admin.php" method="post">
		

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
					<select id="user_select">
					<?php
				ini_set('display_errors', 'on');
				error_reporting(E_ALL);

				#connect to the database
				$conn = new mysqli("localhost", "essam", "iti123", "php_project");
				#check for errors
				if ($conn->connect_errno){
					trigger_error($db->connect_error);
					echo "ERROR";
				}

				#select the user names from the users table
				$user_names = $conn -> query("SELECT uname,uid FROM `users`");
				$no_users = $user_names -> num_rows;
				echo $no_users;
				while ($user_names_array = $user_names -> fetch_assoc()){
					
						echo "<option value=\"".$user_names_array["uid"]."\">".$user_names_array["uname"]."</option>";
				
				}
				echo "<script type=\"text/javascript\">
				var users=document.getElementById('user_select');
				var orderDiv = document.getElementById('order_div');
				orderDiv.innerHTML+='<input id=\"user_id\" name=\"uid2\" hidden=\"hidden\" value=\"'+users.value+'\"></input>';
				var userid = document.getElementById('user_id');
				users.addEventListener(\"change\", function() {
					var userid = document.getElementById('user_id');
						userid.value=users.value;
				});
				</script>";

				?>
					</select>
				</td>
			</tr>
		</table>
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
if (isset($_POST['id'])) {
	$conn = new mysqli("localhost","essam","iti123","php_project");
  if ($conn->connect_errno) {
trigger_error($conn->connect_error);
}
$i=6;
$i++;
date_default_timezone_set('Africa/Cairo');
if (empty($_POST['uid2'])) {
	$query = "insert into orders values ('".$i."','".date("Y-m-d H:i:s")."','orderd','1')";

}else {
	$query = "insert into orders values ('".$i."','".date("Y-m-d H:i:s")."','orderd','".$_POST['uid2']."')";
}

if ($conn->query($query)) {	
$lastid= $conn->insert_id;
if (isset($_POST['id'])&&isset($_POST['teaAmount'])&&isset($_POST['teaPrice'])) {
	
$query2 = "insert into order_details values ('".$i."','".$_POST['id']."','".$_POST['teaAmount']."','".$_POST['teaPrice']*$_POST['teaAmount']."')";
$conn->query($query2);
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

if (products) {
for (i = 0; i < products.length; i++) {
    products[i].addEventListener('click',function (e) {
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
	orderPoard.innerHTML += "<div id='div"+id+"'><label>"+item+"</label><input hidden=\"hidden\" name=\"id\" value=\""+id+"\"></input><input type=\"number\" name=\"teaAmount\" min=\"1\" value=\"1\"><input name=\"teaPrice\" hidden=\"hidden\" value=\""+price+"\"></input><input type=\"button\" onclick=\"delitem(this)\" name=\"del\" class=\"delbtn\" id='del"+id+"' value=\"X\"></input><output name=\"pprice\" ></output ></div>";
	
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