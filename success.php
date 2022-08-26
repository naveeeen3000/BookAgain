<?php include("config.php"); 
include('envs.php');
$email=$_SESSION['email'];
$_SESSION['done']='yes';
?>
<?php 
$orderid=$_SESSION['orderid'];
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$result1=mysqli_query($conn, "SELECT * FROM orders WHERE orderid='$orderid'");
if($result1){
$row1=mysqli_fetch_assoc($result1);	
}else{
	mysqli_error($conn);
}
$result2=mysqli_query($conn,"SELECT * FROM trackorder WHERE orderid='$orderid'");
if($result2){
$row2=mysqli_fetch_assoc($result2);	
}else{
	mysqli_error($conn);
}


?>

<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Success</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	
<style>
body{
	background-color:#FAFAFA !important;
	font-family:Arial !important;
	margin: 0;
	padding: 0;
	overflow-x: hidden;
	}
.questionNumbers {
  display: flex;
  align-items: center;
}
.questionNumberIcon {
  display: flex;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  border: 2px solid #444;
  align-items: center;
  justify-content: center;
  color: #444;	
  background-color: white;	
}
.questionNumberLine {
  flex: 1 0 auto;
  height: 0;
  border-top: 2px solid #444;
  margin-left: 5px;
  margin-right: 5px;
	
}	

.name span{
		color: #444;
		width: 100px;
	}

</style>	
</head>

<body>

<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>
<?php if($row2['payment_type']=='cash on delivery'){ ?>	
<main class="questionNumbers" style="margin-left: 150px;margin-right: 150px;margin-top: 25px;">
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="border-color: cornflowerblue;color: cornflowerblue;">
  <i class="fas fa-exclamation"></i>
  </div>
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>
   
</main>	
   <div class="name">
	<p><span style="color: #ED8155;margin-left: 152px;">Login</span><span style="color: #ED8155;margin-left: 265px;">Shipping</span><span style="margin-left: 255px;color:cornflowerblue">Payment</span><span style="margin-left: 260px;color: #ED8155;">Done!</span></p>
    </div>
	
<?php }else{ ?>
  <main class="questionNumbers" style="margin-left: 150px;margin-right: 150px;margin-top: 25px;">
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>
   
</main>	
	
  <div class="name">
	<p><span style="color: #ED8155;margin-left: 152px;">Login</span><span style="color: #ED8155;margin-left: 265px;">Shipping</span><span style="margin-left: 255px;color:#ED8155">Payment</span><span style="margin-left: 260px;color: #ED8155;">Done!</span></p>
    </div>	
	
  <?php } ?>	
  	

  <br>	
	
<h2 style="text-align: center;"><a href="index.php" style="float:left;padding-left: 40px;cursor: pointer;text-decoration: none;font-size: 18px;"><i class="fas fa-arrow-left"></i> Back to Home</a><span style="margin-left: -170px;color: #093F55;">Order Recieved</span></h2> 
	
<div id="pdf">
<div class="innercontainer" style="background-color: white;width: 70%;margin-left: auto;margin-right: auto;margin-top: 50px;padding-left: 40px;padding-right: 40px;border: 1px solid #AAA;margin-bottom: 100px;padding-bottom: 50px;"><br>
<h3 style="text-align: center">Thank you. Your order has been recieved</h3><br>
<div class="row">
<div class="col-md-3">
<h4>Order ID:</h4>
<h5 style="font-weight: bold;"><?php echo $orderid ?></h5>	
&nbsp;	
</div>
<div class="col-md-3">
<h4>Date:</h4>	
<h5 style="font-weight: bold;"><?php $date=$row1['order_date'];$date1 = date("d-m-Y" , strtotime("$date"));echo $date1; ?></h5>	
</div>
<div class="col-md-3">
<h4>Total:</h4>	
<h5 style="font-weight: bold;">₹<?php echo $row1['grandtotal'] ?></h5>	
</div>
<div class="col-md-3">
<h4>Payment method:</h4>	
<h5 style="font-weight: bold;"><?php echo $row2['payment_type'] ?></h5>	
</div>
</div>	
<hr>

<h4>Order details</h4><br>
<div class="row">
<div class="col-md-4">
<p>	
<?php 
$result3=mysqli_query($conn,"SELECT * FROM order_items WHERE orderid='$orderid'");
if($result3){	
while($row3=mysqli_fetch_assoc($result3)){	
$isbn=$row3['book_isbn'];	
$result4=mysqli_query($conn,"SELECT * FROM books WHERE book_isbn='$isbn'");
if($result4){
	$row4=mysqli_fetch_array($result4);
}	
 echo $row4['book_title'];
 echo "<br>";	
 echo "<br>";	
}
}else{
	echo mysqli_error($conn);
}
?>
<span style="text-align: end">
	
</span>	
</p>	
</div>	
<div class="col-md-1">
<?php
$result3=mysqli_query($conn,"SELECT * FROM order_items WHERE orderid='$orderid'");
if($result3){	
while($row3=mysqli_fetch_assoc($result3)){	

 echo 'x' . $row3['quantity'];
 echo "<br>";	
 echo "<br>";	
}
}else{
	echo mysqli_error($conn);
}	
	?>
</div>
<div class="col-md-7">
<p style="text-align: end;">	
<?php
$result3=mysqli_query($conn,"SELECT * FROM order_items WHERE orderid='$orderid'");
if($result3){	
while($row3=mysqli_fetch_assoc($result3)){	
$isbn=$row3['book_isbn'];	
$result4=mysqli_query($conn,"SELECT * FROM books WHERE book_isbn='$isbn'");
if($result4){
	$row4=mysqli_fetch_array($result4);
}	
 $price=$row4['book_price'];
 $qty=$row3['quantity'];
 echo "₹" . $price * $qty;	
 echo "<br>";	
 echo "<br>";	
}
}else{
	echo mysqli_error($conn);
}
?>	
	</p>	
</div>	
</div>	
<hr>
	
<div class="row">
<div class="col-md-6">
<h4>Subtotal:</h4>	
<h4>Shipping:</h4>	
<h4>discount:</h4>	
</div>	
<div class="col-md-6">
<h5 style="text-align:end;">₹<?php echo $row1['subtotal'] ?></h5>	
<h5 style="text-align:end;">₹0</h5>	
<h5 style="text-align:end;">₹<?php echo $row1['discount'] ?></h5>	
</div>	
</div>
	
<hr>	
	
<div class="row">
<div class="col-md-6">
<h4 style="font-weight: bold">Total</h4>	
</div>
<div class="col-md-6">
<h4 style="text-align:end;font-weight: bold">₹<?php echo $row1['grandtotal'] ?></h4>	
</div>	
</div>	
<hr>
	
<div class="row">
<div class="col-md-3">
<h4>Billing Address</h4>
<h5><?php echo $row1['ship_address'] ?></h5>	
</div>
<div class="col-md-3">
	
</div>
<div class="col-md-3">
	
</div>	
<div class="col-md-3">
<h4>Shipping Address</h4>
<h5><?php echo $row1['ship_address'] ?></h5>	
</div>	
</div>	
</div>	
</div>	
	
<script src="preloader.js"></script>	
<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>	
	
<?php if(isset($_SESSION['ordersuccessful'])){ ?>	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Order successful',
  showConfirmButton: false,
  timer: 2500,	
})	
</script>	
	
<?php unset($_SESSION['ordersuccessful']); } ?>	
	
</body>
</html>