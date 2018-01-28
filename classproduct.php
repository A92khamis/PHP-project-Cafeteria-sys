<?php
	

class product {

	private $pID;
	private $pName;
	private $pPrice;
	private $Category;

	public function __construct($id,$name,$price,$category){
		$this->pID 	  	= $id;
		$this->pName  	= $name;
		$this->pPrice 	= $price;
		$this->Category = $category;
	}

	public function insertIntoProductsDB(){
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
		 $sql = "insert into products values(?,?,?,?)";
 		if ($stmt = $conn->prepare($sql)) {
 		$stmt->bind_param("isis",$this->pID,$this->pName,$this->pPrice,$this->Category);
 		$result = $stmt->execute();
 		echo $result;
 		// Fetch data here
 		$stmt->close();
 		} 
	}

}
//class product ended
$Pid='NULL';
$productobj = new product ($Pid,$_POST['product'],$_POST['price'],$_POST['category']);

$productobj->insertIntoProductsDB();

header('Location: products.php');

  ?>
 