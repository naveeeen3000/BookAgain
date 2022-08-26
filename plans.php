<?php session_start(); 
include('envs.php');
if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));	
$email=$_SESSION['email'];
$result=mysqli_query($conn,"SELECT * FROM users WHERE user_email='$email' AND membership='0'");
if(mysqli_num_rows($result)==0){
$_SESSION['planupgradation']='';	
echo '<script>window.location.href="index.php";</script>';
}
}?>

<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Plans</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>		
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
	.plan-card{
		height: 400px;
		width: 300px;
		background-color: white;
		margin-left: auto;
		margin-right: auto;
		margin-top: 50px;
		margin-bottom: 50px;
		border-radius: 25px;
	   box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, #ED8155 0px 30px 60px -30px, #ED8155 0px -2px 6px 0px inset;
	}	
	.plan-card:hover{
	
		
	}
	.plans{
		background-image: url("images/plans.png");
		background-size: contain;
		background-repeat: no-repeat;
		margin-top: -20px;
	}
	
	.free {
		width: 200px;
		height: 40px;
		background-color:white;
		color: #093F55;
		text-decoration: none;
		border: 1.5px solid #093F55;
		border-radius: 5px;
		margin-left: 50px;
		font-weight:500;
		box-shadow: inset 0 0 0 0 #093F55;
        -webkit-transition: ease-out 0.06s;
        -moz-transition: ease-out 0.06s;
        transition: ease-out 0.06s;
	}
	.free:hover{
		box-shadow: inset 200px 0 0 0 #093F55;
		color: white;
	}
		.gold{
		width: 200px;
		height: 40px;
		background-color:white;
		color: #093F55;
		text-decoration: none;
		border: 1.5px solid #093F55;
		border-radius: 5px;
		margin-left: 50px;
		font-weight:500;
		-webkit-transition: ease-out 0.06s;
        -moz-transition: ease-out 0.06s;
        transition: ease-out 0.06s;	
	}
	   
	    .gold:hover{
		box-shadow: inset 200px 0 0 0 #093F55;
		color: white;
	}
		.silver{
		width: 200px;
		height: 40px;
		background-color:#093F55;
		color: white;
		text-decoration: none;
		border: 1.5px solid #093F55;
		border-radius: 5px;
		margin-left: 50px;
		font-weight:500;
		box-shadow: inset 0 0 0 0 #fff;
        -webkit-transition: ease-out 0.06s;
        -moz-transition: ease-out 0.06s;
        transition: ease-out 0.06s;	
	}
	.silver:hover{
		box-shadow: inset 200px 0 0 0 white;
		color: #093F55;
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

<div class="plans">
<h2 style="text-align: center;color: white;padding-top: 20px;">We have a plan for everyone</h2>
<h4 style="text-align: center;color: white"></h4>	
<div class="row">
<div class="col-md-4" >
<div class="plan-card">
<i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 75px;color:#ED8155;padding-left: 112px;padding-top: 30px;"></i>	
<h2 style="text-align: center">Free</h2>
<h4 style="text-align: center;"><span style="color:#F0946E;font-size: 24px;">₹0</span>/month</h4>	
	<a href="login.php"><button name="free" class="free">Create an account now</button></a><hr color="green" width="65%">		
<h4 style="text-align: center;"><a href="index.php" style="color: #093F55">Get started</a></h4>	
</div> 
</div>
<div class="col-md-4" >
 <div class="plan-card">
<i class="fa fa-plane" aria-hidden="true" style="font-size: 75px;color:#ED8155;padding-left: 112px;padding-top: 30px;"></i>	 
<h2 style="text-align: center;">Silver</h2>	 
<h4 style="text-align: center;"><span style="color: darkgrey;font-size: 24px;">₹300</span>/month</h4>	
<form method="post" action="planpurchase.php"> 
<input type="hidden" name="plantype" value="1">	
<input type="hidden" name="amount" value="300">	
<button type="submit" name="silver" class="silver">Buy Now</button>
</form>		
<hr color="green" width="65%">	 
<h4 style="text-align: center">Benefits</h4>
<p style="text-align: center;padding-left: 50px;padding-right: 50px;"><i class="fas fa-check"></i>&nbsp;get 5% discounts on final amount of purchase</p>	 
</div> 
</div>	
<div class="col-md-4">
<div class="plan-card">
<i class="fa fa-rocket" aria-hidden="true" style="font-size: 75px;color:#ED8155;padding-left: 112px;padding-top: 30px;"></i>
<h2 style="text-align: center;">Gold</h2>	
<h4 style="text-align: center;"><span style="color: gold;font-size: 24px;">₹500</span>/month</h4>	
<form method="post" action="planpurchase.php"> 
<input type="hidden" name="plantype" value="2">		
<input type="hidden" name="amount" value="500">		
<button type="submit" name="gold" class="gold">Buy Now</button>
</form>	
<hr color="green" width="65%">	
<h4 style="text-align: center">Benefits</h4>
<p style="text-align: center;padding-left: 50px;padding-right: 50px;"><i class="fas fa-check"></i>&nbsp;get 10% discounts on final amount of purchase</p>
</div> 
</div> 	
</div>	
</div>	
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
</body>
</html>