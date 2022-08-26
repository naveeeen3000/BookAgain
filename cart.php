<?php session_start();
include('envs.php');
$_SESSION['done']='no';
?>
<html>
<head>
<meta charset="utf-8">
<title>Book Again | MyCart</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>		
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	
	
<style>
body{
		background-color: #FAFAFA !important;
		font-family:Arial !important;
	    margin: 0;
	padding: 0;
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
  border-bottom: 1.5px solid white; 
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
  margin-top: 0;
  padding-top: 8px;
  padding-bottom: 8px;
	}
.sidepanel{
  height: 400px;
	}	
	.cartimage{
	height: 120px;
	width: 80px;	
	}
	
	.collapsible {
  background-color: white;
  color: #000000;
  cursor: pointer;
  padding: 30px;		
  width: 87%;
  border: none;
  text-align: left;
  outline-color: black;
  font-size: 15px;	
  margin-left: 20px;
   font-size: 18px;		
	font-weight: bold;
  border-left: 1px solid black;
  border-right: 1px solid black;		
}

.active, .collapsible:hover {
  background-color: #FFFFFF;
}

.collapsible:after {
  content: '\002B';
  color: #000000;
   font-size: 18px;		
	font-weight: bold;	
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 30px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #FFFFFF;
  width: 87%;	  	
  margin-left: 20px;
  border-bottom: 1px solid #DDDDDD;
  border-left: 1px solid black;
  border-right: 1px solid black;	
}
	
	.collapsible1 {
  background-color: white;
  color: #000000;
  padding: 30px;		
  width: 87%;
  border: none;
  text-align: left;
  outline-color: black;
  font-size: 15px;	
  margin-left: 20px;
   font-size: 18px;		
	font-weight: bold;
  border-left: 1px solid black;
  border-right: 1px solid black;		
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
		<a href="" class="option" style="width: 150px;background-color: #ED8155"><i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>My Cart</a>
		<a href="books.php" class="option" style="width: 150px;"><i class="fas fa-book" style="margin-right: 5px;"></i>Books</a>
		<a href="categories.php" class="option" style="width: 150px;"><i class="fas fa-list-alt" style="margin-right: 5px;"></i>Categories</a>
		<a href="index.php" class="option" style="width: 150px;"><i class="fas fa-home" style="margin-right: 5px;"></i>Home</a>
		</div>		
</div>
	
	
	
	<?php

	require_once "./functions/database_functions.php";
	require_once "./functions/cart_functions.php";

	// book_isbn got from form post method, change this place later.
	if(isset($_POST['bookisbn'])){
		$book_isbn = $_POST['bookisbn'];
		$_SESSION['added']='';
		echo "<script>location.replace(document.referrer);</script>";
	}

	if(isset($book_isbn)){

		// new item selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$book_isbn])){
			$_SESSION['cart'][$book_isbn] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$book_isbn]++;
			unset($_POST);
		}
	}


	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart']["$isbn"]);
			} else {
				$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
			}
		}
	echo "<script>window.location.href = 'cart.php';</script>";
	}

	

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
   	<form action="cart.php" method="post">
		
		<h3 style="text-align: center;padding: 25px;color: #093F55">Your cart:<span> <?php echo $_SESSION['total_items']; ?> </span>items</h3>
		
		<div class="row">
		<div class="col-md-8" style="padding-left: 50px;padding-right: 0;">
	   	<table class="table" style="background: #FFFFFF;border-left: 1px solid #DDD;border-right: 1px solid #DDD;border-bottom: 1px solid #DDD;">
	   		<tr>
	   			<th style="text-align: center;width: 120px;padding: 20px;">Product</th>
				<th style="width: 25%;">&nbsp;</th>
	   			<th style="padding: 20px;text-align: center;">Price</th>
	  			<th style="padding: 20px;text-align: center;">Quantity</th>
	   			<th style="padding: 20px;text-align: center;">Total</th>
				<th style="width: 60px;">&nbsp;</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
				
			?>
			<tr>
				<td style="text-align: end"><img class="cartimage" src="./otherimages/<?php echo $book['book_image']; ?>"></td>
				<td style="padding-right: 50px;vertical-align: middle;text-align: center;"><span><?php echo $book['book_title'] . " by " ;?></span><br><span style="color: #777"><?php echo $book['book_author'] ?></span></td>
				<td style="vertical-align: middle;text-align: center;"><?php echo "₹" . $book['book_price']; ?></td>
				<td style="vertical-align: middle;text-align: center;"><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
				<td style="vertical-align: middle;text-align: center;"><?php echo "₹" . $qty * $book['book_price']; ?></td>
					
				<td style="vertical-align: middle;font-size: 20px;"><a href="removeitem.php?item_id=<?php echo $isbn; ?>"><i class="fas fa-times"></i></a></td>
					
				
			</tr>
			<?php } ?>
		    
	   	</table>
	     </div>	
		<div class="col-md-4">	
			
 <button type="button" class="collapsible" style=" border-top: 1px solid black;">Cart totals</button>
<div class="content">
  <p><span>Subtotal</span><span style="float: right"><?php echo "₹" . $_SESSION['total_price']; ?></span></p>	
  <p><span>Shipping</span><span style="float: right">₹0</span></p>	  
</div>
<button type="button" class="collapsible">Discount Section</button>
<div class="content">

  <?php	
  if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {	
      $email=$_SESSION['email'];
	  $result3=mysqli_query($conn,"SELECT * FROM membership WHERE user_email='$email'");
	  if(mysqli_num_rows($result3)==0){
	  $_SESSION['grandtotal']= $_SESSION['total_price'];
	  $_SESSION['discount']='0'; ?>
	  <a href="plans.php">Subscribe now to claim discounts</a>   
  <?php	  }else{ 
	  $query_row = mysqli_fetch_assoc($result3);
	  if($query_row['subscription_type']=="silver"){
	  $subtotal= $_SESSION['total_price'];
	  $discount_price=(5 / 100) * $subtotal;
	  $_SESSION['discount']=$discount_price;  
	  $grand_total=$subtotal - $discount_price;	
	  $_SESSION['grandtotal']=$grand_total;	  
	?>
	  <p><span>Discount</span><span style="float: right;">-₹<?php echo $_SESSION['discount']; ?></span></p>
		  
	<?php  }else{
	  $subtotal= $_SESSION['total_price'];
	  $discount_price=(10 / 100) * $subtotal;
	  $_SESSION['discount']=$discount_price;
	  $grand_total=$subtotal - $discount_price;	
	  $_SESSION['grandtotal']=$grand_total;	  
	?>
	  <p><span>Discount</span><span style="float: right;">-₹<?php echo $_SESSION['discount']; ?></span></p>
	<?php } ?>
	  	  
		  
  <?php	  }  }else{ $_SESSION['grandtotal']= $_SESSION['total_price']; ?>
	
	<a href="login.php"><p>Please login for details</p></a>
	
	<?php } ?>
	
 
	
</div>
<div class="collapsible1" style=" border-bottom: 1px solid black;">
<p><span>Grand total</span><span style="float: right">₹<?php echo $_SESSION['grandtotal']; ?></span></p>  
</div>	
<br><br>		
<a href="checkout.php" style="background-color: #093F55;padding: 15px 83px 15px 83px;margin-left: 20px;font-size: 20px;color: white">Proceed to checkout</a> 			
		</div>	
		</div>
	   	
		<input type="submit" class="btn btn-primary" name="save_change" value="Save Changes" style="margin-left: 36px;height: 50px;border-radius: 0;background-color: #ED8155; width: 200px;font-size: 18px;">
	</form>
	
	<br/><br>
<?php
	} else { ?>
		<h3 style="text-align: center">Your cart is empty!<br>Please make sure you add some books in it!</h3>
	    <img src="images/add-to-cart-animate.svg" style="margin-left: auto;display: block;margin-left: auto;margin-right: auto;width: 25%;">
<?php	}
	if(isset($conn)){ mysqli_close($conn); }
?>
	
	
	
	
	<?php include("footer.php") ?>
	
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
<script src="preloader.js"></script>	
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
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
</body>
</html>

	