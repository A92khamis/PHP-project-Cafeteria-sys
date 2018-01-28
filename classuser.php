<?php

class user {

	private $uname;
	private $email;
	private $password;
	private $room_no;
	private $ext;
	private $uid;

	public function __construct($unpar,$empar,$passwdpar,$nopar,$extpar,$uidpar){
		$this->uname 	= $unpar;
		$this->email 	= $empar;
		$this->password = $passwdpar;
		$this->room_no  = $nopar;
		$this->ext      = $extpar;
		$this->uid      = $uidpar;

	}

	public function insertIntoDB(){
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
		 $sql = "insert into users values(?,?,?,?,?,?)";
 		if ($stmt = $conn->prepare($sql)) {
 		$stmt->bind_param("ssssii",$this->uname,$this->email,$this->password,$this->room_no,$this->ext,$this->uid);
 		$result = $stmt->execute();
 		echo $result;
 		// Fetch data here
 		$stmt->close();
 		} 
	}

}
//class user ended
$id='NULL';
$object = new user ($_POST['name'],$_POST['email'],$_POST['password'],$_POST['room_no'],$_POST['ext'],$id);

	 $object->insertIntoDB();
header('Location: users.php');

  ?>
 