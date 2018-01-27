<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

#connect to the database
$conn = new mysqli("localhost", "root", "", "php_project");

#check for errors

if ($conn->connect_errno){
	trigger_error($db->connect_error);
	echo "ERROR";
}

#all users names vs thier amounts
// $select_all_username_and_amount = "SELECT users.uname , sum(order_details.amount_price) AS total FROM users INNER JOIN orders ON users.uid = orders.uid INNER JOIN order_details ON  order_details.oid = orders.oid group by uname";
// $result_all_users = $conn->query($select_all_username_and_amount);
// $all_users_array = $result_all_users -> fetch_assoc();
// var_dump($all_users_array);


#select query for the user name and the amount


$username = $_POST["userName"];

$select_username_and_amount = "SELECT users.uname , sum(order_details.amount_price) AS total, orders.odate FROM users INNER JOIN orders ON users.uid = orders.uid INNER JOIN order_details ON  order_details.oid = orders.oid WHERE users.uname ="."'".$username."'"."group by orders.odate";
$result_user = $conn->query($select_username_and_amount);
$user_array = $result_user -> fetch_assoc();
var_dump($user_array);

?>