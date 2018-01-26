<?php
#to display the errore
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// #connect to the database

// $conn = new mysqli("localhost", "root", "", "php_project");

// #check for errors

// 	if ($conn->connect_errno){
// 		trigger_error($db->connect_error);
// 		echo "ERROR";
// 	}

#to get todays date in php

$tz = date_default_timezone_get();
date_default_timezone_set($tz);
$date = date('Y/m/d', time());
echo $date;

#start a session to have all the needed variables to insert in the data base

session_start();

foreach ($_POST as $key => $value) {
		$_SESSION["$key"] = $value;
	}

var_dump($_SESSION);

#make a class for the orders
class Order{
	private $oid;
	private $odate;
	private $status;
	private $uid;

	public function __construct($orderId, $orderDate, $orderStatus, $userId){
		$this->oid = $orderId;
		$this->odate = $orderDate;
		$this->status = $orderStatus;
		$this->uid = $userId; 
	}

	#function to insert into the database in orders table::
	public function insert_order(){
		#connect to the database

$conn = new mysqli("localhost", "root", "", "php_project");

#check for errors

	if ($conn->connect_errno){
		trigger_error($db->connect_error);
		echo "ERROR";
	}
		#prepared statment 
		$insert_orders_stmt = "insert into orders values (?, ?, ?, ?)";
		if($stmt = $conn->prepare($insert_orders_stmt)){
			$stmt->bind_param("issi", $this->oid, $this->odate, $this->status, $this->uid);
			$insert_order_result = $stmt->execute();
			echo $insert_order_result;
			$stmt->close();
		}
		
	}

}

#making a new order object

$user_id='NULL';
$order_status = 'processing';

$new_order = new Order ($user_id, $date, $order_status, $_SESSION["uid"]);
$new_order->insert_order();

//////////////////////////////////////////////////////////////////////////////////////////////////////////
#class order details 

class Order_details{
	private $oid;
	private $odate;
	private $status;
	private $uid;

}

header('Location: page2.php');

?>