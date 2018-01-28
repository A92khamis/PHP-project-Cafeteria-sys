<?php
// var_dump ($_POST);
// $yy= is_numeric($_GET['id']);
// echo $yy;
$dbusername="akhamis";
$dbpassword="123456";
$dbserver="localhost";
$dbname="php_project"; 
// connecting database via mysqli oop
$conn= new mysqli ($dbserver,$dbusername,$dbpassword,$dbname);
//checking of errors
	if ($conn->connect_errno) {
		trigger_error($db->connect_error);
		echo "ERROR";
		}
// prepared statement
	$sql = "update orders set status= ?  where oid=?";
 		if ($stmt = $conn->prepare($sql)) {
 		$stmt->bind_param("si",$_POST['status'],$_POST['id']);
 		$result = $stmt->execute();
 		// echo $result;
 		// Fetch data here
 		$stmt->close();
 		} 
$number =$_POST['id'];
 echo $number;
 echo $_POST['status'];
 var_dump($_POST);	
header('Location: orders.php');



  ?>
