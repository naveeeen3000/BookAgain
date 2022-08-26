<?php
include('envs.php');
session_start();
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
require_once "./functions/database_functions.php";

//insert customer
$email=$_SESSION['email'];
$name=$_SESSION['name'];	
$number=$_SESSION['number'];	
$address=$_SESSION['adress'];	
$city=$_SESSION['city'];	
$zipcode=$_SESSION['zipcode'];	
$country=$_SESSION['country'];
$discount=$_SESSION['discount'];
$subtotal=$_SESSION['total_price'];
$grandtotal=$_SESSION['grandtotal'];
$date = date("Y-m-d H:i:s");

if($_SESSION['payment']==0){
	$payment_type='cash on delivery';
	$payment_status='pending';
	$payment_date='----';
}elseif($_SESSION['payment']==1){
	$payment_type='credit or debit card';
	$payment_status='paid';
	$payment_date=date("Y-m-d H:i:s");
}


$result2 = mysqli_query($conn, "SELECT customer_id from customer WHERE user_email='$email' AND name = '$name' AND number='$number' AND address= '$address' AND city = '$city' AND zipcode ='$zipcode' AND country = '$country'");

if(mysqli_num_rows($result2)==0){

$result1=mysqli_query($conn,"INSERT INTO `customer` (`customer_id`, `user_email`, `name`, `number`, `address`, `city`, `zipcode`, `country`) VALUES ('0', '$email', '$name', '$number', '$address', '$city', '$zipcode', '$country')");	
if(!$result1){
	echo mysqli_error($conn);	
}	
}

$result7 = mysqli_query($conn, "SELECT customer_id from customer WHERE user_email='$email' AND name = '$name' AND number='$number' AND address= '$address' AND city = '$city' AND zipcode ='$zipcode' AND country = '$country'");
$row2 = mysqli_fetch_assoc($result7);
$customerid=$row2['customer_id'];
if($result7){
	
//insert order
$result3=mysqli_query($conn,"INSERT INTO `orders` (`orderid`, `customer_id`, `subtotal`, `discount`, `grandtotal`, `ship_name`, `ship_address`, `ship_city`, `ship_zipcode`, `ship_country`, `order_date`, `order_visibility`) VALUES ('0', '$customerid', '$subtotal', '$discount', '$grandtotal', '$name', '$address', '$city', '$zipcode', '$country', '$date', 'unread')");


if(!$result3){
	echo mysqli_error($conn);
}else{
	
  $result4 = mysqli_query($conn, "SELECT orderid FROM orders WHERE customer_id = '$customerid'");
		if(!$result4){
			echo "retrieve data failed!" . mysqli_error($conn);
			exit;
		}else{
		$row1 = mysqli_fetch_assoc($result4);
		$orderid= $row1['orderid'];
		$_SESSION['orderid']=$orderid; 	
		}
}
			
			
		//insert orderitems
        foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$result5 = mysqli_query($conn, "INSERT INTO order_items VALUES ('$orderid', '$isbn', '$bookprice', '$qty')");
		if(!$result5){
			echo "Insert value false!" . mysqli_error($conn);
			exit;
		}else{
			
		$result6=mysqli_query($conn,"INSERT INTO `trackorder` (`orderid`,`customerid`,`user_email`,`payment_type`,`payment_status`,`payment_date`,`order_status`) VALUES ('$orderid','$customerid','$email','$payment_type','$payment_status','$payment_date','processing')");
        if(!$result6){
	    echo mysqli_error($conn);
        }else{
        unset($_SESSION['name']);
        unset($_SESSION['number']);
        unset($_SESSION['address']);
        unset($_SESSION['city']);
        unset($_SESSION['zipcode']);
        unset($_SESSION['country']);
        unset($_SESSION['payment']);
        unset($_SESSION['discount']);
        unset($_SESSION['total_price']);
        unset($_SESSION['grandtotal']);
        unset($_SESSION['total_items']);
        unset($_SESSION['total_price']);			
		unset($_SESSION['cart']);	
			
		$_SESSION['ordersuccessful']='';	
        echo '<script>window.location.replace("success.php");</script>';	
			
        }	
			
		}
	}
			
		
}else{
	mysqli_error($conn);
}
	
?>