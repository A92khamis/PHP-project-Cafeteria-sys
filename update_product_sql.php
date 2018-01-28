<?php 
	$conn = mysqli_connect("localhost","root","123456","php_project");
	if (mysqli_connect_errno()) {
		trigger_error(mysqli_connect_error());
		echo "error";
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$update_product_sql = mysqli_query($conn, "UPDATE products SET pname = '$_POST[product]', price = '$_POST[price]', category = '$_POST[category]'  where pid='$_POST[pid]'");
	}
	else{
		$product_data_arr = explode(",", $_GET['product_data']);
		if ($product_data_arr[4] == "true") {
			$available_product_sql = mysqli_query($conn, "UPDATE products SET available = 'false' where pid='$product_data_arr[3]'");
		}
		else{
			$available_product_sql = mysqli_query($conn, "UPDATE products SET available = 'true' where pid='$product_data_arr[3]'");
		}
	}


	header("location: products.php");
?>

<?php 
	// $conn = mysqli_connect("localhost","root","godislove!!","php_project");
	// if (mysqli_connect_errno()) {
	// 	trigger_error(mysqli_connect_error());
	// 	echo "error";
	// }

	

	// if (!empty($_GET['delete_data'])) {
	// 	$product_data_arr = explode(",", $_GET['delete_data']);
	// 	$delete_product_sql = mysqli_query($conn, "DELETE FROM products where pid='$product_data_arr[3]'");
	// }
	// $product_data_arr = explode(",", $_POST['update_data']);
	// if (!empty($product_data_arr)) {
	// 	echo "update";
		
	// 	$update_product_sql = mysqli_query($conn, "UPDATE products SET pname = '$_POST[product]', price = '$_POST[price]', category = '$_POST[category]'  where pid='$_POST[pid]'");
	// }
	// header("location: products.php");
