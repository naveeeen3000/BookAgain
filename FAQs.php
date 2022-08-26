<?php session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | FAQs</title>
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
		font-family:Arial !important;
		overflow-x: hidden;
		background-color: #FAFAFA;
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
		text-decoration: none !important;
	}
	.sidepanel{
		height: 400px;
	}
	.sidepanel a{
		text-decoration: none;
	}
	
	.collapsible {
  background-color: white;
  color: #000000;
  cursor: pointer;
  padding: 30px;		
  width: 100%;
  border: none;
  text-align: left;
  font-size: 18px;	
  border: 1px solid #AAA;	
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
  background-color: #FAFAFA;
  width: 100%;	
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

<h2 style="text-align: center;color: #093F55">Frequently Asked Questions</h2>	
<div class="row">
<div class="col-md-2">
	
</div>
<div class="col-md-8">
<h3>Shopping</h3><br>
	
<button type="button" class="collapsible">Delivery charges for orders?</button>
<div class="content">
<p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p>  
</div>
<button type="button" class="collapsible">How long will delivery take</button>
<div class="content">	
 <p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p> 	
</div>	
<button type="button" class="collapsible">Do I recieve invoice of an Order</button>
<div class="content">	
 <p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p> 	
</div>	
<br>
<h3>Payment</h3><br>	
<button type="button" class="collapsible">What are the available payment options?</button>
<div class="content">
<p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p>  
</div>
<button type="button" class="collapsible">What all cards are accepted?</button>
<div class="content">	
 <p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p> 	
</div>	
<button type="button" class="collapsible">Can I make google pay on delivey</button>
<div class="content">	
 <p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p> 	
</div>
<br>
<h3>Premium Subscriptions</h3><br>	
<button type="button" class="collapsible">Where can I Buy a plan?</button>
<div class="content">
<p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p>  
</div>
<button type="button" class="collapsible">What are payment options to purchase a plan?</button>
<div class="content">	
 <p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p> 	
</div>	
<button type="button" class="collapsible">How long will the plan last?</button>
<div class="content">	
 <p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p> 	
</div>	
<button type="button" class="collapsible">Can I have two plans at a time?</button>
<div class="content">	
 <p>A placerat ac vestibulum integer vehicula suspendisse nostra aptent fermentum tempor a magna erat ligula parturient curae sem conubia vestibulum ac inceptos sodales condimentum cursus nunc mi consectetur condimentum.

	Tristique parturient nulla ullamcorper at ullamcorper non orci iaculis neque augue.</p> 	
</div>		
	
	
<br><br><br><br><br><br><br><br>	
</div>
<div class="col-md-2">
	
</div>	
</div>	
<script>
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
  document.getElementById("mySidepanel").style.transition = "ease 0.02s";		
  document.getElementById("buttonvisibility").style.opacity="0%";
}
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
  document.getElementById("buttonvisibility").style.opacity="100%";
}
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