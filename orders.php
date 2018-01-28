<!DOCTYPE html>
<html>
<head>
	<title>orders</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
  #tea {
    width:50px; 
    height::;0px;
  }
	</style>
</head>
<body>
  <header id="header">  
    <div class="navBarAdmin">
      <a href="orders.php">Home</a> |
      <a href="products.php">Products</a> |
      <a href="users.php">Users</a> |
      <a href="order_admin.php">Manual Order</a> |
      <a href="checks.php">Checks</a>
    </div>
  </header>

    <div id="user">    
</div>
<h1>Orders</h1>
      <table bordercolor="black" border="5px" width="1000px" align="center">
    <tr align="center">
      <th>order id</th>
      <th>order date</th>
      <th>Name</th>
      <th>Room</th>
      <th>Ext</th>
      <th>Status</th>
      <th>TotalPrice</th>
     
      </tr>
<?php   
        
    $conn = mysqli_connect("localhost","root","12345","php_project");
    if (mysqli_connect_errno()) {
    trigger_error(mysqli_connect_error());
    echo "error";
    }

    $orders_sql = mysqli_query($conn,"select orders.oid,orders.odate,users.uname,users.room_no,users.ext,orders.status ,sum(order_details.amount_price) as TotalPrice from orders ,users , order_details where orders.uid=users.uid and orders.oid=order_details.oid group by orders.oid order by orders.odate;");
 while ($orders_arr_assoc = mysqli_fetch_assoc($orders_sql)) {
      echo "<tr align=\"center\">";
      foreach ($orders_arr_assoc as $key => $value) {
        echo "<td>";
        echo $orders_arr_assoc[$key];
        echo "</td>";
       }
      echo "</tr>";
      echo "<tr align=\"center\"> 
      <td colspan=\"7\"> " ;
      $orderdetails_sql = mysqli_query($conn,"select p.pname as Product,p.price as Price,od.product_amount as Amount from  order_details od ,products p, users u where p.pid = od.pid  and od.oid=".$orders_arr_assoc['oid']." and u.uname=\"".$orders_arr_assoc['uname']."\";");
      //nested while loop 
    while ($orderdetails_arr_assoc = mysqli_fetch_assoc($orderdetails_sql)){
     echo "<div> <img src=\"imgs/tea.jpg\" id=\"tea\">   <div>";
      foreach ($orderdetails_arr_assoc as $key => $value) {
        echo "| ".$key." :  ";
        echo $orderdetails_arr_assoc[$key];
        echo "   ";
      }
      echo " |  ";
    }

      echo  "</tr>";
          }
        ?>
      </table>
<div class="profilepic" >
<img src="imgs/admin.jpg">
  </div>
</body>
</html>

