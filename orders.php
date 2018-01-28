<!DOCTYPE html>
<html>
<head>
  <title>orders</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
  #tea {
    width:50px; 
    height:50px;
  }
  </style>
</head>
<body>
<div class="nav">
   <label><a href="#">Home</a></label>
      <label>|</label>
   <label><a href="produts.php">Products</a></label>
        <label>|</label>
   <label><a href="users.php">Users</a></label>
        <label>|</label>
   <label><a href="page3.html">Manuel Order</a></label>
        <label>|</label>
   <label><a href="checks.php">Checks</a></label>
</div>
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
      <th>TotalPrice</th>
      <th>Status</th>
      <th>Action</th>
     
      </tr>
<?php   
  session_start();
  $arr=array();
        
    $conn = mysqli_connect("localhost","root","12345","php_project");
    if (mysqli_connect_errno()) {
    trigger_error(mysqli_connect_error());
    echo "error";
    }

    $orders_sql = mysqli_query($conn,"select orders.oid,orders.odate,users.uname,users.room_no,users.ext,sum(order_details.amount_price) as TotalPrice ,orders.status from orders ,users , order_details where orders.uid=users.uid and orders.oid=order_details.oid group by orders.oid order by orders.odate;");
 while ($orders_arr_num = mysqli_fetch_array($orders_sql,MYSQLI_NUM)) {
      echo "<tr align=\"center\">";
        for ($i=0; $i <sizeof($orders_arr_num) ; $i++) { 
        echo "<td>";
        echo $orders_arr_num[$i];
        }
        // $arr[].=$orders_arr_assoc['oid'];
        echo "</td>";
        // echo $orders_arr_assoc['oid'];
         // print_r($arr);
        echo "<td> <form action=\"action.php\" method=\"POST\"><input type=\"number\"name=\"id\" value=\"".$orders_arr_num[0]."\" hidden  ><input type=\"text\"name=\"status\" value= \"Delivered\"  class='status' hidden > <input type=\"submit\"value=\"Delivered\" class='submitbtns'> </form>";
        echo "</td>";

      echo "</tr>";
      echo "<tr align=\"center\"> 
      <td colspan=\"8 \"> " ;
      $orderdetails_sql = mysqli_query($conn,"select p.pname as Product,p.price as Price,od.product_amount as Amount from  order_details od ,products p, users u where p.pid = od.pid  and od.oid=".$orders_arr_num[0]." and u.uname=\"".$orders_arr_num['2']."\";");
      //nested while loop 
    while ($orderdetails_arr_assoc = mysqli_fetch_assoc($orderdetails_sql)){
     echo "<div> <img src=\"imgs/tea.jpg\" id=\"tea\">   <div>";
      foreach ($orderdetails_arr_assoc as $key => $value) {
        echo "| ".$key." :  ";
        echo $orderdetails_arr_assoc[$key];
        echo "   ";
        // $id= $orders_arr_assoc['oid'];
      }
      echo " |  ";
    }

      echo  "</tr>";
}
        ?>
      </table>
<div class="profilepic" >
<img src="imgs/admin.jpg">
<!-- <script type="text/javascript">
var submitbuttons=document.getElementsByClassName('submitbtns');
var stats=document.getElementsByClassName('status');
for (var i = 0; i < stats.length; i++) {
  if (stats[i].value==='on going') {
 setTimeout(function(){ stats[i].value ='delivered'},1000);
  }
 for (var i = 0; i < submitbuttons.length; i++) {
  if (submitbuttons[i].value==='on going') {
  setTimeout(function(){ submitbuttons[i].value ='delivered'},1000);
  }
}

</script> -->
</div>
</body>
</html>

