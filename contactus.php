<?php session_start();
include('envs.php');
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));	

if(isset($_POST['contactus'])){
$name = trim($_POST['name']);
$name = mysqli_real_escape_string($conn, $name);
$email = trim($_POST['email']);
$email = mysqli_real_escape_string($conn, $email);	
$number = trim($_POST['number']);
$number = mysqli_real_escape_string($conn, $number);	
$subject = trim($_POST['subject']);
$subject = mysqli_real_escape_string($conn, $subject);
$message = trim($_POST['message']);
$message = mysqli_real_escape_string($conn, $message);	

$query = "INSERT INTO `customersupport` (`support_id`, `user_email`, `user_name`, `number`, `subject`, `message`, `replies`) VALUES ('0', '$email', '$name', '$number', '$subject', '$message', 'none')";
	$result = mysqli_query($conn, $query);	
	if($result){
		echo '<script>alert("Submitted successfully");location.replace(document.referrer); </script>';
	}	
		else{
		echo mysqli_error($conn);	
		}	
}
?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Contact us</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>		
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

	
	<div class="row" style="text-align: center;color: #093F55">	
	<h2 style="font-weight: bold;">Contact Us</h2>
	<p style="font-size: 15px;color: #444;">Have any questions? We would love to hear from you.</p>	
	</div><br><br>
		
	<div class="row" style="text-align: center;margin-left: auto;margin-right: auto;width:1100px;">
	<div class="col-md-3">
	<a href="#" style="background-color: green;padding: 19px 20px 19px 20px;;border-radius: 50%;color:white;background-color:#ED8155;cursor: pointer;"><span class="fa fa-map-marker" style="font-size: 18px;border-radius: 50%"></span></a>	
	<br><br><br>	
	<p style="color: #444;"><span style="font-weight: bold;color:#093F55;">Address:</span>198 west 21st street,<br>Suite 721 Bangalore 560032</p>	
	</div>
		
	<div class="col-md-3">
	<a href="#" style="background-color: green;padding: 19px 18px 20px 18px;border-radius: 50%;color:white;background-color:#ED8155;"><span class="fa fa-phone" style="font-size: 18px;border-radius: 50%"></span></a>	
	<br><br><br>	
	<p><span style="font-weight: bold;color:#093F55;">Phone:</span><a style="cursor: pointer;">+ 1235 2355 98</a></p>	
	</div>
		
	<div class="col-md-3">
	<a href="#" style="background-color: green;padding: 19px 18px 19px 18px;border-radius: 50%;color:white;background-color:#ED8155;"><span class="fa fa-paper-plane" style="font-size: 18px;border-radius: 50%"></span></a>
	<br><br><br>	
	<p><span style="font-weight: bold;color:#093F55;">Email:</span><a style="cursor: pointer;">SUPPORT@BOOKAGAIN.COM</a></p>	
	</div>
		
	<div class="col-md-3">
	<a href="#" style="background-color: green;padding: 20px 18px 18px 18px;border-radius: 50%;color:white;background-color:#ED8155;"><span class="fa fa-globe" style="font-size: 18px;border-radius: 50%"></span></a>
	<br><br><br>	
	<p><span style="font-weight: bold;color:#093F55;">Website:</span><a style="cursor: pointer;">bookagain.com</a></p>	
	</div>	
		
	</div>
	
	<div class="row">
	<div class="somecontainer" style="margin-top: 50px;margin-bottom: 50px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;width: 1100px;height: 500px; margin-left: auto;margin-right: auto;">
		
    <div class="col-md-7" style="height: 100%;">
	<form action="contactus.php" method="post" name="contactform">	
	<div class="row" style="margin-top: 30px;">
	<div class="col-md-6">
	<label for="name" style="margin-left: 35px;">Full name</label>	
	</div>
	<div class="col-md-6">
	<label for="email">Email Address</label>		
	</div>		
	</div>
	<div class="col-md-6">
	<input type="text" name="name" id="name" placeholder="Name" onFocus="funA()" onBlur="funA1()" required>	
	</div>	
	<div class="col-md-6">
	<?php if( isset($_SESSION['email']) && !empty($_SESSION['email']) ){ ?>	
	<input type="text" name="email" id="email" value="<?php echo $_SESSION['email'] ; ?>" placeholder="email" onFocus="funB()" onBlur="funB1()" readonly>
	<?php }else{ ?>	
	<input type="email" name="email" id="email" placeholder="email" onFocus="funB()" onBlur="funB1()" required>	
	<?php }?>	
	</div>	
	
	<div class="col-md-6">
	<label for="number">Number</label>
	</div>		
	<div class="col-md-6">
	<label for="subject">Subject</label>
	</div>
	<div class="col-md-6">
	<input type="tel" maxlength="10" pattern="[789][0-9]{9}" name="number" id="number" placeholder="Number" onFocus="funC()" onBlur="funC1()" required >
	</div>		
	<div class="col-md-6">
	<input type="text" name="subject" id="subject" placeholder="Subject" onFocus="funD()" onBlur="funD1()" required>
	</div>	
	<div class="col-md-12">	
	<label for="message">Message</label>
	</div>
	<div class="col-md-12">
	<textarea name="message" id="message" placeholder="Message" onFocus="funE()" onBlur="funE1()" required></textarea>
	</div>
	<div class="col-md-3">
	<button type="submit" name="contactus">Submit</button>
	</div>
		
	</form>	
	</div>
	<div class="col-md-5 image" style="height: 100%;">
	
	</div>	
	</div>
	</div>
	
	
	
	
	
<?php include("footer.php"); ?>	
	
<script>
$(function(){
    $("input[name=name]")[0].oninvalid = function () {
        this.setCustomValidity("Please enter your name");
    };
});
	
$(function(){
    $("input[name=name]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
	
$(function(){
    $("input[name=number]")[0].oninvalid = function () {
        this.setCustomValidity("Enter valid phone number");
    };
});
	
$(function(){
    $("input[name=number]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
	
$(function(){
    $("input[name=subject]")[0].oninvalid = function () {
        this.setCustomValidity("Enter your subject");
    };
});
	
$(function(){
    $("input[name=subject]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
	
	
</script>
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

function funA() {
     document.getElementById("name").style.borderBottom = "1px solid #ED8155";
}	
function funA1() {
     document.getElementById("name").style.borderBottom = "1px solid #999";
}	
function funB() {
     document.getElementById("email").style.borderBottom = "1px solid #ED8155";
}	
function funB1() {
     document.getElementById("email").style.borderBottom = "1px solid #999";
}	
function funC() {
     document.getElementById("number").style.borderBottom = "1px solid #ED8155";
}	
function funC1() {
     document.getElementById("number").style.borderBottom = "1px solid #999";
}
function funD() {
     document.getElementById("subject").style.borderBottom = "1px solid #ED8155";
}	
function funD1() {
     document.getElementById("subject").style.borderBottom = "1px solid #999";
}	
function funE() {
     document.getElementById("message").style.borderBottom = "1px solid #ED8155";
}	
function funE1() {
     document.getElementById("message").style.borderBottom = "1px solid #999";
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
