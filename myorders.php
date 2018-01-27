<?php

	$conn = mysqli_connect("localhost","root","godislove!!","php_project");
	if (mysqli_connect_errno()) {
		trigger_error(mysqli_connect_error());
		echo "error";
	}


$myorders_sql = mysqli_query($conn, "SELECT orders.odate, orders.status, SUM(order_details.amount_price) AS total FROM order_details INNER JOIN orders ON orders.oid = order_details.oid WHERE odate >= '$_POST[datefrom]' AND odate <= '$_POST[dateto]' GROUP BY orders.oid");


	$myorders_keys_arr = array();
	$myorders_values_arr = array();
	while ($myorders_arr_assoc = mysqli_fetch_assoc($myorders_sql)) {
		foreach ($myorders_arr_assoc as $key => $value) {
			$myorders_keys_arr[] = $key;
			$myorders_values_arr[] = $value;
		}	
	}

	$myorders_keys_str = implode(",", $myorders_keys_arr);
	$myorders_values_str = implode(",", $myorders_values_arr);

	header("location: myordershtml.php?keys=$myorders_keys_str&values='$myorders_values_str'");

?>