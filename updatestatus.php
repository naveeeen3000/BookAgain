<?php include('adminconfig.php');
include('envs.php');
$admin_email= $_SESSION['admin_email'];
?>
<?php

$db = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$orderid=$_GET['orderid'];
?>
<?php
$result=mysqli_query($db,"SELECT * FROM trackorder WHERE orderid='$orderid'");
if($result){
	$row=mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])) 
{
$orderid1=trim($_POST['orderid']);	
$orderstatus = trim($_POST['orderstatus']);
$paymentstatus = trim($_POST['paymentstatus']);
$paymentmode = trim($_POST['paymentmode']);
$date = trim($_POST['date']);	
	
$update = mysqli_query($db,"update trackorder set order_status = '$orderstatus', payment_status = '$paymentstatus', payment_type = '$paymentmode', payment_date = '$date' WHERE orderid = '$orderid1'");	

if($update){
	echo 'record updated';
	header("location:orders.php"); 
}else{
	mysqli_error($db);
}
}
?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | OrderStatus</title>
<link href="adminpreloader.css" rel="stylesheet">		
<style>
body {
font-family: "Lato", sans-serif;
background-color: #E3F4FB; 
margin: 0;
overflow: hidden;	
}

.sidenav {
	box-shadow: 0 1px 10px 2px black;
  background-color: #093F55;
  height: 100%;
  width: 225px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow: hidden;
  padding-top:10px;
  	
}
	
	.sidenav a {
  border: 0.1px solid #0A5B7A;		
  margin:4px 0 4px;
  position: relative;
  padding: 3.5px 8px 3.5px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #CDEEFA;
  display: block;
}

.active, .btn:hover{
 box-shadow: 0px 0px 5px 1px #ADBFC6;
 background-color:#062A38;	
}	
		
		.fas {
		
			padding-right: 10px;
		}	

.main {
  margin-left: 225px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 95px 20px;	
}
	.scroll{
  margin-top: 25px;		
  min-height: 50 !important;
  max-height: 350 !important;
  overflow: hidden;
  overflow-y: scroll;
  border: 2px solid #3283C4;	
	}



@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
	
	
.edit{
		text-decoration: none;
	    color: green;
	}
	.update{
		text-decoration: none;
		color: cornflowerblue;
	}	
.view{
		text-decoration: none;
		color: forestgreen;
	}	

	@font-face {
  font-family: 'icomoon1';
  src:  url('fonts/icomoon1.eot?suge6d');
  src:  url('fonts/icomoon1.eot?suge6d#iefix') format('embedded-opentype'),
    url('fonts/icomoon1.ttf?suge6d') format('truetype'),
    url('fonts/icomoon1.woff?suge6d') format('woff'),
    url('fonts/icomoon1.svg?suge6d#icomoon1') format('svg');
  font-weight: normal;
  font-style: normal;
  font-display: block;
}

[class^="icon1-"], [class*=" icon1-"] {
  /* use !important to prevent issues with browser extensions that change fonts */
  font-family: 'icomoon1' !important;
  speak: never;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;

  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.icon1-request-2:before {
  content: "\e900";
}
.icon1-group-2:before {
  content: "\e901";
}
.icon1-iconfinder-icon:before {
  content: "\e902";
  color: #cdeefa;
}

	.btn i{
			font-size: 18px;
		}
		.btn span{
			font-size: 18px;
		}
	table{
		margin-left: auto;
		margin-right: auto;
	}
	select{
		height: 40px;
		width: 300px;
		border-color: #DDD;
		outline-color: #ED8155;
	}
	input{
		width: 300px;
		height: 40px;
		border:1px solid #DDD;
		outline-color: #ED8155;
	}
	td{
		padding-top: 6px;
	}
	.innercontainer button{
		margin-top: 10px;
		width: 150px;
		height: 40px;
		cursor: pointer;
		background-color: #ED8155;
		color: white;
		border: none;
		font-size: 15px;
	    box-shadow: 2px 2px 4px 1px #000;
	}
	.sidepanel  {
  width: 15% !important;	
  margin-top: 66px;
  height: 0;
  position: absolute ;
  z-index: 999999999;
  top: 0;  
  right: 0;	
  background-color: #FFFFFF;
  overflow-y: hidden;
  transition: 0.5s;
  box-shadow: 0 -6px 0 #fff, 0 1px 6px #093F55;
}

.sidepanel a {
  margin-left: 20px;  
  padding: 0px 0px 0px 32px;	
  text-decoration: none;
  font-size: 18px;
  color: #093F55;
  display: block;
 transition: 0.3s;
 	
  	
}

.sidepanel a:hover {
  color: #ED8155;
}


.dropdown:hover .sidepanel {height: 80%;}
		
.dropdown:hover button ::before{
			content: "\f0d8";
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
	
<div class="sidenav">
		
  <div class="sidebar">
  <div style="width: 205px;height: 90px;background-color: #CDEEFA;margin-left: 10px;box-shadow:0 0 3px 1px #CDEEFA;margin-bottom: 10px; ">		
  <img src="images/logo2.png" alt="" style="margin-left: 31.5px;margin-top: 5px">
  </div><hr size="2" width="215px;">
  <div id="activepage">			
  <a href="dashboard.php" class="btn"><i class="fas fa-chart-line"></i>Dashboard</a><hr size="2" width="215px;">
  <a href="addbook.php" class="btn"><i class="fas fa-plus"></i>New Book</a><hr size="2" width="210px;">
  <a href="managebooks.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Books</a><hr size="2" width="215px;">
	 <a href="orders.php" class="btn active"><i class="fas fa-shopping-bag"></i>Orders</a><hr size="2" width="215px;"> 
  <a href="manageusers.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Users</a><hr size="2" width="215px;">
  <a href="subscriptionrequests.php" class="btn"><span class="icon1-request-2" style="padding-right: 10px;"></span>Subscriptions</a><hr size="2" width="215px;">
  <a href="bookrequests.php" class="btn"><span class="icon1-iconfinder-icon" style="padding-right: 10px;"></span>Book requests</a><hr size="2" width="215px;">
  <a href="viewfeedbacks.php" class="btn"><i class="fas fa-comments"></i>Feedbacks</a><hr size="2" width="215px;">
  <a href="contactsupport.php" class="btn"><i class="fas fa-address-card"></i>Contacts</a><hr size="2" width="215px;">
  </div>
  </div>
	
</div>

	
    <div class="topnav" style="width: 100%;height: 60px;background-color: #093F55;box-shadow: 0 0px 10px 1px black;position: fixed">
	<div class="dropdown">	
		
	<button class="openbtn" id="button" onclick="openNav()" style="cursor: pointer;float: right;font-size: 25px;background-color: #093F55;border: none;color: white; height: 60px;margin-top: 0;padding-top: 12px;"><i class="fas fa-caret-down"></i></button>
		
	<div id="mySidepanel" class="sidepanel">
       	 <h5 style="color: #093F55;padding: 10px;margin-top: -10px"><?php echo $admin_email; ?></h5>
		 <a href="adminlogout.php" style="margin-top: -25px;"><i class="fa fa-fw fa-sign-out"></i>LogOut</a>   
    </div>	
	
	</div>
	<img src="images/adminicon.png" alt="adminicon" class="avatar" style="float: right;height: 40px;width: 40px;padding-top: 10px;"> 
	<p style="margin-left: 250px;margin-top: 0;padding-top:15px;font-size: 20px;color: white">Orders&nbsp;&nbsp;<i class="fas fa-angle-right"></i>Order Status</p>	
	</div>

<div class="main">
<div class="innercontainer" style="width: 97%;height:70%;background-color:#E3F4FB;margin-left: 20px;margin-top: 24px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">	

	
<form method="post" action="updatestatus.php">	
<input type="hidden" name="orderid" value="<?php echo $_GET['orderid'] ?>">	
<table>
<tr><td> <h4 style="font-weight: bold;">Order ID: <span><?php echo $_GET['orderid'] ?></span></h4></td></tr>		
<tr>
<td>
<label>Update status</label>
</td>	
</tr>
<tr>
<td>
<select name="orderstatus" id="orderstatus">
<option <?php if($row['order_status']=='processing'){ echo "selected"; } ?> >Processing</option>	
<option value="Ready for packaging" <?php if($row['order_status']=='Ready for packaging'){ echo "selected"; } ?>>Ready for packing</option>	
<option value="Ready to deliver" <?php if($row['order_status']=='Ready to deliver'){ echo "selected"; } ?>>Ready to deliver</option>	
<option value="Delivered" <?php if($row['order_status']=='Delivered'){ echo "selected"; } ?>>Delivered</option>	
<option value="Received" <?php if($row['order_status']=='Received'){ echo "selected"; } ?>>Received</option>	
<option value="Not delivered" <?php if($row['order_status']=='Not delivered'){ echo "selected"; } ?>>Not delivered</option>	
</select>
</td>	
</tr>
	
<tr>
<td>
<label>Payment status</label>
</td>	
</tr>
<tr>
<td>
<select name="paymentstatus" id="paymentstatus">
<option <?php if($row['payment_status']=='pending'){ echo "selected"; } ?> value="pending">Pending</option>	
<option <?php if($row['payment_status']=='paid'){ echo "selected"; } ?> value="paid">Paid</option>	
<option <?php if($row['payment_status']=='Cancelled'){ echo "selected"; } ?> value="Cancelled">Cancelled</option>	
</select>
</td>	
</tr>

<tr>
<td>
<label>Payment mode</label>
</td>	
</tr>
<tr>
<td>
<select name="paymentmode" id="paymentmode">
<option <?php if($row['payment_type']=='Cash on delivery'){ echo "selected"; } ?> value="Cash on delivery">Cash on delivery</option>	
<option <?php if($row['payment_type']=='Debit or Credit card'){ echo "selected"; } ?> value="Debit or Credit card" >Debit or Credit card</option>
<option <?php if($row['payment_type']=='Ready to deliver'){ echo "selected"; } ?> value="other">Other</option>	
</select>
</td>	
</tr>	
	
<tr>
<td>
<label>Payment date</label>
</td>	
</tr>
<tr>
<td>
<input type="date" name="date" value="<?php echo $row['payment_date']; ?>">
</td>	
</tr>

<tr><td><button type="submit" name="update">Update</button></td></tr>	
</table>	
	</form>	
</div>
</div>
	
	<script>
var header = document.getElementById("activepage");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}	
</script>	
<script src="preloader.js">
</script>	
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
	
	
</body>
</html>

