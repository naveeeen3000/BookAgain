<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | AboutUs</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>		
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
<style>
body{
		background-color: #FAFAFA !important;
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
	}
	.sidepanel{
		height: 400px !important;
	}	
	.background{
		background-image: url("images/bg1.jpg");
        height: 425px;
		background-size: cover;
		background-repeat: no-repeat;
	}
	.container6{
		width: 70%;
		height: 500px;
		background-color: #FAFAFA;
		margin-left: auto;
		margin-right: auto;
		margin-top: -125px;
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

<h2 style="text-align: center;color:#ED8155">About Us</h2>
<div class="background"></div>	
<div class="row">
<div class="container6">
<h1 style="padding-left: 100px;padding-top: 50px;color: #093F55;">Welcome to Book Again</h1>
<p style="padding-left: 100px;font-size: 17px;">“I declare after all there is no enjoyment like reading!”- Jane Austen, Pride and Prejudice.</p>
<p style="padding-left: 100px;font-size: 17px;">Dear readers,<br>We offer tremendous gathering of books in various classification of Fiction, Non-fiction, Biographies, History, Religions, Self – Help, Children. We likewise move in immense accumulation of Investments and Management, Computers, Engineering, Medical, College and School content references books proposed by various foundations as schedule the nation over.<br>We endeavor to broaden the consumer loyalty by providing food simple easy to use web index, brisk and easy to understand installment alternatives and snappier conveyance frameworks. Upside to the majority of this, we are arranged to give energizing offers and charming limits on our books.</p>	
<h3 style="padding-left: 100px;color: #093F55;">Our Vision</h3>
<p style="padding-left: 100px;font-size: 17px;">The Book Again is a locally owned independent bookshop committed to offering a quality selection of affordable new, gently read, and varieties of books, as well as discounts and educational items for customers of all ages and backgrounds.</p>	
</div>	
</div>	
<div class="row">
<div class="col-md-4">
<p style="text-align:center;font-size: 50px;color: #093F55;margin-bottom: -15px;">1K+</p>	
<p style="text-align:center;font-size: 25px;color: #555;">Buyers active</p>	
</div>	
<div class="col-md-4">
<p style="text-align:center;font-size: 50px;color: #093F55;margin-bottom: -15px;">2K+</p>	
<p style="text-align:center;font-size: 25px;color: #555;">Active users</p>	
</div>	
<div class="col-md-4">
<p style="text-align:center;font-size: 50px;color: #093F55;margin-bottom: -15px;">10K+</p>	
<p style="text-align:center;font-size: 25px;color: #555;">Total Books</p>	
</div>	
</div>	
<h3 style="text-align: center;color: #093F55;">Why we?</h3><br>
<div class="row">
<div class="col-md-4" style="text-align: center;">
<i class="fas fa-shipping-fast" style="font-size: 50px;color:#ED8155"></i>	
<h4>Free Delivery</h4>	
</div>
<div class="col-md-4" style="text-align: center;">
<i class="fas fa-credit-card" style="font-size: 50px;color:#ED8155"></i>
<h4>Secure Payment</h4>	
</div>
<div class="col-md-4" style="text-align: center;">
<i class="fas fa-support" style="font-size: 50px;color:#ED8155"></i>
<h4>24/7 Support</h4>	
</div>
</div>	
<br><br>	
	
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