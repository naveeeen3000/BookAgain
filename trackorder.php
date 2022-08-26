<?php session_start();
include('envs.php');
if(!isset($_SESSION['email'])){
	$_SESSION['previous']='trackorder.php';
	echo '<script>alert("login to continue");</script>';
	header("Location: login.php");
}
$email=$_SESSION['email'];
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
?>
<?php
$result=mysqli_query($conn,"SELECT * FROM customer WHERE user_email='$email'");
?>
<html>
<head>
<meta charset="utf-8">
<title>My orders</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">		
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
<style>
	body{
		background-color: #FAFAFA;
		font-family:Arial !important;
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
	padding-right: 5px;
	padding-left: 2px;
}
.icon1-group-2:before {
  content: "\e901";
	padding-right: 5px;
	padding-left: 2px;
}
.icon1-iconfinder-icon:before {
  content: "\e902";
  color: #cdeefa;
}	

	.navbar a:hover {
  background: #ED8155;
  color: white;
}		

 .active, .option:hover {
  background-color: #ED8155;
  color: white;
}	

	.search form {
  display: flex;
	height: 100%;
	width: 100%;
}

.navbar {
  border-bottom: 1.5px solid white !important; 
  overflow: hidden;
  background-color: #111;
  height: 80px;	
  position: sticky !important;
  top: 0;
  width: 100% !important;
  z-index: 1;
border-radius: 0 !important;
}	
	.navbar a{
		margin-top: 0px;
		padding-top: 8px;
		padding-bottom: 8px;
	}
	.sidepanel{
		height: 400px;
	}
	.image{
		background-image:url( "images/contact-us-animate.svg");
		background-size: contain;
	}
	
	
	.somecontainer label{
		padding-bottom: 15px;
		padding-top: 25px;
		margin-left: 20px;
		font-size: 16px;
		color: #093F55;
	}
	.somecontainer input{
		width: 89%;
		height: 30px;
		margin-left: 20px;
		border: none;
		border-bottom: 1px solid #999;
		outline: none;
	}
	.somecontainer textarea{
		width: 95%;
		margin-left: 20px;
		height: 80px;
		border: none;
		border-bottom: 1px solid #999;
		outline: none;
	}
	.somecontainer button{
		height: 40px;
		width: 125px;
		margin-top: 25px;
		margin-left: 20px;
		background-color: #ED8155;
		color: white;
		border-radius: 5px;
		border: none;
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	}
	
	.bookimages{
		width: 67px;
	}
	.button{
		margin-top: 20px;
		width: 100px;
		height: 40px;
		background-color:#093F55;
		color: white;
		text-decoration: none;
		border: 1.5px solid #093F55;
		font-weight:500;
		-webkit-transition: ease-out 0.4s;
        -moz-transition: ease-out 0.4s;
        transition: ease-out 0.4s;	
	}
	.button:hover{
		box-shadow: inset 250px 0 0 0 white;
		color: #093F55;
	}
	.button1{
		
		background-color:#093F55;
		color: white;
		text-decoration: none;
		border: 2px solid #093F55;
		font-size: 13.5px;
		-webkit-transition: ease-out 0.6s;
        -moz-transition: ease-out 0.6s;
        transition: ease-out 0.6s;
		cursor: pointer;
	}
	.button1:hover{
		box-shadow: inset 300px 0 0 0 white;
		color: #093F55;
	}
	.image{
		background-image:url( "images/delivery-animate.svg");
		background-size: contain;
	    background-repeat: no-repeat;
	    height: 50%;
	    background-position: center;
	}
	
.content {
  width: 90%;	
  display: flex;
  align-items:baseline;
}
.questionNumberIcon {
  display: flex;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  border: 2px solid #999;
  align-items: center;
  justify-content: center;
  color: #999999;	
  background-color: white;	
}
.questionNumberLine {
  flex: 1 0 auto;
  height: 0;
  border-top: 2px solid #999;
  margin-left: 5px;
  margin-right: 5px;
	
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
	
<div id="mySidepanel" class="sidepanel">
     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		 
		 <a href="profile.php"><i class="fa fa-fw fa-user" aria-hidden="true"></i>My Account</a>
		 <a href="trackorder.php"><i class="fa fa-fw fa-shopping-bag"></i>My orders</a>
		 <a href="requestbook.php"><span class="icon1-request-2"></span>Request a Book</a>
		 <a href="aboutus.php"><span class="icon1-group-2"></span>About us</a>
         <a href="contactus.php"><i class="fa fa-fw fa-address-book-o"></i>Contact us</a>
         <a href="FAQs.php"><i class="fa fa-fw fa-question-circle" style="padding-right: 5px;"></i>FAQ's</a>
		 <a href="feedback.php"><i class="fas fa-comments" style="padding-left: 2px;padding-right: 5px;"></i>Feedback</a>	 
        <?php  
		if(!isset($_SESSION['email'])){?>
		<a href="login.php"><i class="fa fa-fw fa-sign-in"  style="padding-right:3px;"></i>Login</a>
        <?php }else{ ?>
        <a href="#" onClick="myFn()"><i class="fa fa-fw fa-sign-out"></i>Log out</a>
        <?php } ?>
		 </div>
		
	
<div class="navbar"> 		
 
<div class="search">
<div id="buttonvisibility">
<button class="openbtn" onclick="openNav()" style="cursor: pointer;">☰</button>
</div>
<form method="post" action="searchresults.php">		
<input type="text" name="searchword" class="searchTerm" placeholder="Search by Title or Author...">
<button type="submit" name="search" class="searchButton"><i class="fa fa-search"></i></button>
</form>	
</div>
        <div id="activepage">
		<a href="cart.php" class="option" style="width: 150px;"><i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>My Cart</a>
		<a href="books.php" class="option" style="width: 150px;"><i class="fas fa-book" style="margin-right: 5px;"></i>Books</a>
		<a href="categories.php" class="option" style="width: 150px;"><i class="fas fa-list-alt" style="margin-right: 5px;"></i>Categories</a>
		<a href="index.php" class="option" style="width: 150px;"><i class="fas fa-home" style="margin-right: 5px;"></i>Home</a>
		</div>		
</div>

<div class="row"><h2 style="text-align: center">Your Orders</h2></div><br>
	
<div class="box" style="width: 75%;margin-left: auto;margin-right: auto;">	
<?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
<?php while($row=mysqli_fetch_array($result)){ 
$customerid=$row['customer_id'];
$result1=mysqli_query($conn,"SELECT * FROM orders WHERE customer_id='$customerid' AND order_visibility='unread'");
    if(!$result1){
	mysqli_error($conn);
}	?>	
<?php for($i = 0; $i < mysqli_num_rows($result1); $i++){ ?>
<?php while($row1=mysqli_fetch_array($result1)){ ?>	
<div class="row">
<div class="col-md-3">
<h5 style="font-weight: bold">Order ID</h5>	
<h5><?php echo $row1['orderid'] ?></h5>	
</div>
<div class="col-md-3">
<h5 style="font-weight: bold">Date</h5>		
<h5><?php echo $row1['order_date'] ?></h5>		
</div>	
<div class="col-md-3">
<h5 style="font-weight: bold">payment type</h5>	
<h5><?php 
		  $order=$row1['orderid'];
		  $query=mysqli_query($conn,"SELECT * FROM trackorder WHERE orderid='$order'");
	      $row4=mysqli_fetch_assoc($query);
	      echo $row4['payment_type'];?> (<?php echo $row4['payment_status']; ?>)</h5>	
</div>
<div class="col-md-2">
<h5 style="font-weight: bold">Total amount</h5>		
<h5><?php echo $row1['grandtotal'] ?></h5>		
</div>
<div class="col-md-1">
<a href="trackorder.php?orderid=<?php echo $row1['orderid'] ?>"><h2 style="color: grey;margin-top: 15px"><i class="fas fa-remove"></i></h2></a>	
</div>	
</div>

<br><br>
	
<div class="row">
<div class="col-md-2">
<?php 
$orderid=$row1['orderid'];
$result2=mysqli_query($conn,"SELECT * FROM order_items WHERE orderid='$orderid'");
if($result2){	
while($row2=mysqli_fetch_assoc($result2)){	
$isbn=$row2['book_isbn'];	
$result3=mysqli_query($conn,"SELECT * FROM books WHERE book_isbn='$isbn'");
if($result3){
	$row3=mysqli_fetch_array($result3);
}	?>
 <img class="bookimages" src="/otherimages/<?php echo $row3['book_image']; ?>">	
<?php
 echo "<br>";	
 echo "<br>";	
}
}else{
	echo mysqli_error($conn);
} ?>	
</div>
<div class="col-md-3">
<p style="margin-top: 32px;font-size: 14px;">
<?php 
$orderid=$row1['orderid'];
$result2=mysqli_query($conn,"SELECT * FROM order_items WHERE orderid='$orderid'");
if($result2){	
while($row2=mysqli_fetch_assoc($result2)){	
$isbn=$row2['book_isbn'];	
$result3=mysqli_query($conn,"SELECT * FROM books WHERE book_isbn='$isbn'");
if($result3){
	$row3=mysqli_fetch_array($result3);
}	
 echo $row3['book_title'];	
 echo "<br>";	
 echo "<br>";	
 echo "<br>";	
 echo "<br>";			
 echo "<br>";			
 echo "<br>";			
}
}else{
	echo mysqli_error($conn);
} ?>
	</p>	
</div>
<div class="col-md-1">
<p style="margin-top: 32px;font-size: 14px;">	
<?php
$result3=mysqli_query($conn,"SELECT * FROM order_items WHERE orderid='$orderid'");
if($result3){	
while($row3=mysqli_fetch_assoc($result3)){	

 echo 'x' . $row3['quantity'];
 echo "<br>";	
 echo "<br>";	
 echo "<br>";	
 echo "<br>";			
 echo "<br>";			
 echo "<br>";	
}
}else{
	echo mysqli_error($conn);
}													
?>
	</p>	
</div>
<div class="col-md-3">
<p style="margin-top: 32px;font-size: 14px;">	
<?php
$result3=mysqli_query($conn,"SELECT * FROM order_items WHERE orderid='$orderid'");
if($result3){	
while($row3=mysqli_fetch_assoc($result3)){	

 echo "₹" . $row3['quantity'] * $row3['item_price'];
 echo "<br>";	
 echo "<br>";	
 echo "<br>";	
 echo "<br>";			
 echo "<br>";			
 echo "<br>";	
}
}else{
	echo mysqli_error($conn);
}													
?>	
	</p>	
</div>	
<div class="col-md-3">
	
<!-- <button type="button" class="button">Track order</button>  -->
	
</div>		
</div>

	
	
<?php 
$result5=mysqli_query($conn,"SELECT * FROM trackorder WHERE orderid='$orderid'");
if($result5){
$row5=mysqli_fetch_assoc($result5);
}
if(($row5['order_status']=='Processing') || ($row5['order_status']=='processing')){ ?>
	

<div class="content">
	
 <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
 2
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    3
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    4
  </div>	
  </div>
	
	<div class="name" style="margin-top: 5px;">
	<p><span style="padding-right: 12%;">Ordered</span><span style="padding-left: 10%;padding-right: 10.5%;text-align: center">Processed</span><span style="padding-left: 12%;padding-right: 12%;text-align: center">Shipping</span><span style="padding-left: 10%;text-align: center">Delivered</span></p>
    </div>	
	
	
<?php	
}elseif($row5['order_status']=='Ready for packaging'){		
?>

	
<div class="content">
	
 <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    3
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    4
  </div>	
  </div>
	
	<div class="name" style="margin-top: 5px;">
	<p><span style="padding-right: 12%;">Ordered</span><span style="padding-left: 10%;padding-right: 10.5%;text-align: center">Processed</span><span style="padding-left: 12%;padding-right: 12%;text-align: center">Shipping</span><span style="padding-left: 10%;text-align: center">Delivered</span></p>
    </div>	
	

<?php }elseif($row5['order_status']=='Ready to deliver'){ 
?>
	
	
<div class="content">
	
 <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="color: green;border-color: green;">
   <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    4
  </div>	
  </div>
	
	<div class="name" style="margin-top: 5px;">
	<p><span style="padding-right: 12%;">Ordered</span><span style="padding-left: 10%;padding-right: 10.5%;text-align: center">Processed</span><span style="padding-left: 12%;padding-right: 12%;text-align: center">Shipping</span><span style="padding-left: 10%;text-align: center">Delivered</span></p>
    </div>	
	

<?php }elseif(($row5['order_status']=='Delivered') || $row5['order_status']=='Received'){
?>	

	
	
<div class="content">
	
 <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="color: green;border-color: green;">
   <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="color: green;border-color: green;">
    <i class="fas fa-check"></i>
  </div>	
  </div>
	
	<div class="name" style="margin-top: 5px;">
	<p><span style="padding-right: 12%;">Ordered</span><span style="padding-left: 10%;padding-right: 10.5%;text-align: center">Processed</span><span style="padding-left: 12%;padding-right: 12%;text-align: center">Shipping</span><span style="padding-left: 10%;text-align: center">Delivered</span></p>
    </div>	
		
<?php }elseif($row5['order_status']=='Not delivered'){ 
?>	

<div class="content">
	
 <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="border-color: green;color: green;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: green"></div>
  <div class="questionNumberIcon" style="color: green;border-color: green;">
   <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: red"></div>
  <div class="questionNumberIcon" style="color: red;border-color: red;">
    <i class="fas fa-times"></i>
  </div>	
  </div>
	
	<div class="name" style="margin-top: 5px;">
	<p><span style="padding-right: 12%;">Ordered</span><span style="padding-left: 10%;padding-right: 10.5%;text-align: center">Processed</span><span style="padding-left: 12%;padding-right: 12%;text-align: center">Shipping</span><span style="padding-left: 10%;text-align: center">Delivered</span></p>
    </div>	
	
<?php }	?>
	
<br><br><br>   
	
<div style="color:#F87431;height: 1.5px;background-color: #ED8155;width: 100%;"></div><br>
	
<?php }} }}?>	
</div>
	
<?php 

if(mysqli_num_rows($result)==0){ ?>
<h3 style="text-align: center;margin-top: -10px">No orders yet<br></h3>
<div class="image">
	</div>	
<h4 style="text-align: center;margin-top: -50px">Looks like you haven't made your choice yet</h4>	
<div style="margin-left: auto;margin-right: auto;width: 175px;margin-bottom: 50px;margin-top: 25px;">
<a href="books.php" style="padding: 10px 40px 10px 40px; background-color:#093F55;border-radius: 50px;margin-bottom: 50px;" class="button1">Start Shopping</a>	
</div>	
<?php  }else { 
	    $result7=mysqli_query($conn,"SELECT * FROM orders WHERE customer_id='$customerid' AND order_visibility='unread'");
	    if(mysqli_num_rows($result7)==0){?>
	    
<h3 style="text-align: center;margin-top: -10px">No orders yet<br></h3>
<div class="image">
	</div>	
<h4 style="text-align: center;margin-top: -50px">Looks like you haven't made your choice yet</h4>	
<div style="margin-left: auto;margin-right: auto;width: 175px;margin-bottom: 50px;margin-top: 25px;">
<a href="books.php" style="padding: 10px 40px 10px 40px; background-color:#093F55;border-radius: 50px;margin-bottom: 50px;" class="button1">Start Shopping</a>	
</div>	
	
<?php }} ?>
	
	
	
<?php include("footer.php"); ?>	
	
<script>
// Add active class to the current button (highlight it) //
var currentpage = document.getElementById("activepage");
var page = currentpage.getElementsByClassName("option");
for (var i = 0; i < page.length; i++) {
  page[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}	

function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
  document.getElementById("mySidepanel").style.transition = "ease 0.02s";		
  document.getElementById("buttonvisibility").style.opacity="0%";
}
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
  document.getElementById("buttonvisibility").style.opacity="100%";
}	
	</script>
</script>	
<script src="preloader.js"></script>	
		</script>
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
	<script type="text/javascript">

	
function myFn(){
  Swal.fire({
  width: '32rem',
  padding:'1rem',
  background:'#fff',		  
  title: 'Are you sure?',
  text: "",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Log out'
}).then((result) => {
  if (result.isConfirmed) {  
  window.location.href = 'logout.php'
  }
})
}
</script>

</body>
</html>

<?php
if(isset($_GET['orderid'])){
	$orderid1=$_GET['orderid'];
	$result6=mysqli_query($conn,"update orders set order_visibility = 'read' WHERE orderid = '$orderid1'");
	if($result6){
		echo '<script>window.location.href="trackorder.php"</script>';
	}else{
		echo mysqli_error($conn);
		}
}
?>