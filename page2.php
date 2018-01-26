<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/georgestyle.css">
</head>
<body>

<!-- user image and name -->

	<div id="menuBar">
		<a href="page2.html">Home</a> |
		<a href="page2.html">My Orders</a>
	</div>

<!-- user image and name -->

	<div id="userTag">
		<img id="userImg" src="imgs/userImg.jpg">
		<u id="userName"></u>
	</div>

<!-- search bar -->

	<div id="searchBar">
		<input type="text" name="search" placeholder="search">
	</div>

<!-- order form -->

	<div id="orderForm">
	<form action="order_class.php" method="post" onchange="teaPrice.value=teaAmount.value*5+' EGP', coffePrice.value=coffeAmount.value*7+' EGP', juicePrice.value=juiceAmount.value*12+' EGP', pepsiPrice.value=pepsiAmount.value*8+' EGP'">
		<table>
			<tr>
				<td>Tea</td>
				<td><input type="number" name="teaAmount" min="0" value="0"></td>
				<td><output name="teaPrice"></output></td>
			</tr>
			<tr>
				<td>Coffe</td>
				<td><input type="number" name="coffeAmount" min="0" value="0">
				</td>
				<td><output name="coffePrice"></output></td>

			</tr>
			<tr>
				<td>Juice</td>
				<td><input type="number" name="juiceAmount" min="0" value="0"></td>
				<td><output name="juicePrice"></output></td>
			</tr>
			<tr>
				<td>Pepsi</td>
				<td><input type="number" name="pepsiAmount" min="0" value="0"></td>
				<td><output name="pepsiPrice"></output></td>
			</tr>
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
				<td><h1>Total:</h1></td>
				<td><h1 id='totalPriceDisplay'>0</h1></td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="totalPrice" value="0">
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Confirm"></td>
			</tr>

			
		</table>
	</form>
	</div>

<!-- products -->

	<div id="productOrder">
		<table>
			<tr>
				<td id="tea">
					<img  src="imgs/tea.jpg">
					<div name="productName">tea</div>
					<div name="productPrice">5 EGP</div>
				</td>
				<td id="coffe">
					<img src="imgs/tea.jpg">
					<div name="productName">Coffe</div>
					<div name="productPrice">7 EGP</div>
				</td>
				<td id="juice">
					<img src="imgs/tea.jpg">
					<div name="productName">Juice</div>
					<div name="productPrice">12 EGP</div>
				</td>
				<td id="pepsi">
					<img src="imgs/tea.jpg">
					<div name="productName">Pepsi</div>
					<div name="productPrice">8 EGP</div>
				</td>
			</tr>
		</table>
	</div>
	<!-- MY PHP CODE -->
	<?php
	#to display the errore
	ini_set('display_errors', 'on');
	error_reporting(E_ALL);
	session_start();
	
	#variables in post from the form

	// $teaAmount = $_POST["teaAmount"];
	// $coffeAmount = $_POST["coffeAmount"];
	// $pepsiAmount = $_POST["pepsiAmount"];
	// $juiceAmount = $_POST["juiceAmount"];
	// $roomNo = $_POST["roomNo"];
	// $totalPrice = $_POST["totalPrice"];
	// $notes = $_POST["notes"];

	#send these variables to other pages in $_SESSION 

	foreach ($_POST as $key => $value) {
		$_SESSION["$key"] = $value;
	}

	var_dump($_SESSION);

	# connect to data base to get the user data

	$conn = new mysqli("localhost", "root", "", "php_project");
	#check for errors
	// if ($conn->connect_errno) {
	// 	trigger_error($db->connect_error);
	// }
	#select from data base the user data
	//$query = "select * from users where email = $_SESSION["iemail"]";
	$result = $conn -> query("select * from users where email="."'".$_SESSION["iemail"]."'");
	#put all the user data into array
	$user_data = $result -> fetch_assoc();

	#isert all the user data into session array
	foreach ($user_data as $key => $value) {
		$_SESSION["$key"] = $value;
		# code...
	}
	//var_dump($user_data);
	// unset($_SESSION["orderRoomNo"]);
	?>
	<!-- END of PHP CODE -->

<!-- adding my script -->

<!-- a script to get any variables I need from the php to js -->

<script type="text/javascript">
var userName = "<?php echo $user_data["uname"] ?>";
</script>

<!-- my page script -->

<script type="text/javascript" src="js/homePage.js">
</script>


</body>
</html>