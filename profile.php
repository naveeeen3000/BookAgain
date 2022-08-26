<?php
include('envs.php');
  session_start();
  if(!isset($_SESSION['email'])){
  $_SESSION['previous']='profile.php';
  echo '<script>alert("login to continue");</script>';
  header("Location: login.php");
}

  $user_email=$_SESSION['email'];	
  $conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
  $query = "SELECT * FROM users where user_email='$user_email'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  $row = mysqli_fetch_assoc($result);
?>

<html>
<head>
<meta charset="utf-8">
<title>BookAgain | UserProfile</title>
</head>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>		
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
		height: 400px;
	}	
	.background td{
		padding-bottom: 10px;
	}
	.background label{
		font-weight: 400;
		color: #000;
	}
	.background .textbox{
		width: 425px;
		height: 30px;
		border: 1px solid grey;
		border-radius: 3px;
		outline-color:#ED8155;
	}
	.button{
		height: 40px;
		width: 150px;
		margin-right: 25px;
		border-radius: 5px;
		border: none;
		box-shadow: inset 0 0 0 0 #093F55;
        -webkit-transition: ease-out 0.4s;
        -moz-transition: ease-out 0.4s;
        transition: ease-out 0.4s;
		background-color: #093F55;
		color: white;
		
	}
	.button:hover{
		box-shadow: inset 150px 0 0 0 #093F55;
		color: white;
	}
	.button1{
		height: 40px;
		width: 150px;
		margin-right: 25px;
		border-radius: 5px;
		background-color: white;
		color: #093F55;
		border: 2px solid #093F55;
		box-shadow: inset 0 0 0 0 white;
        -webkit-transition: ease-out 0.4s;
        -moz-transition: ease-out 0.4s;
        transition: ease-out 0.4s;
	}
	.button1:hover{
		box-shadow: inset 150px 0 0 0 #093F55;
		color: #FFFFFF;
	}
	.passwordbutton{
		height: 40px;width: 100px;
		border-radius: 5px;
		border: none;
		box-shadow: inset 0 0 0 0 limegreen;
        -webkit-transition: ease-out 0.4s;
        -moz-transition: ease-out 0.4s;
        transition: ease-out 0.4s;
	}
	.passwordbutton:hover{
		box-shadow: inset 150px 0 0 0 limegreen;
		color: white;
	}
	
	#passwordreset{
		opacity: 0;
		
	}
	.heading:hover{
		color: #093F55;
	}
	
	.swal2-popup {
  font-size: 1.2rem !important;
  font-family: Arial;
}
	</style>
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
	
<?php
	$gender=$row['user_gender'];
	?>
<div class="background" style="background-color:#FAFAFA;padding-bottom: 50px;margin-top: -20px;">
	
	
	<hr>
	<h3 style="margin-left: 110px; font-weight: bold;padding-bottom: 25px;color: 093F55"><i class="fas fa-user-edit"></i>&nbsp;Edit Profile</h3>
	
	<div class="row">
	<div class="col-md-1">
		&nbsp;
	</div>	
	<div class="col-md-5">	
	<form action="profile.php" method="post" name="profileform" onSubmit="return profileForm">	
	<table style="margin-bottom: 20px;">
	<tr><td><label>Full Name</label></td></tr>	
	<tr><td><input type="text" name="name" value="<?php echo $row['user_name'];?>" class="textbox" required></td></tr>
	<tr><td><label>E-mail</label></td></tr>
	<tr><td><input type="email" name="email" value="<?php echo $row['user_email'];?>" class="textbox" required readonly></td></tr>	
	<tr><td><label>DOB</label></td><td><label style="margin-left: -200px;">Number</label></td></tr>	
	<tr><td><input type="date" name="dob" value="<?php echo $row['user_dob'];?>" style="width: 200px;outline-color:#ED8155;height: 30px;border: none;border-radius: 5px;border: 1px solid grey;"></td>
		<td><input type="text" name="number" maxlength="10" pattern="\d{10}" value="<?php echo $row['user_number'];?>" style="width: 200px;height: 30px;margin-left: -200px;outline-color:#ED8155;border: none;border-radius: 5px;border: 1px solid grey;"></td></tr>
	
	<tr><td><label>Gender</label></td></tr>
	<?php if($gender=="") {?>
	<tr><td>	
	<input type="radio" id="male" name="gender" value="male" style="cursor: pointer;">
    <label for="male" style="color: #444">Male</label><br>
    <input type="radio" id="female" name="gender" value="female" style="cursor: pointer;">
    <label for="female" style="color: #444">Female</label><br>
    <input type="radio" id="other" name="gender" value="other" style="cursor: pointer;">
    <label for="other" style="color: #444">Other</label></td>
	</tr>	
	<?php }else{ ?>
	<tr><td><input type="text" value="<?php echo("$gender"); ?>" style="width: 200px;outline-color:#ED8155;height: 30px;border: none;border-radius: 5px;border: 1px solid grey;" readonly></td></tr>
    <?php } ?>
		
	</table>	
    <a href="index.php"><button type="button" class="button1" style="margin-left: 0px;">Back to home</button></a> 
	<button type="submit" name="save" class="button">Save changes</button><br>	
	</form>	
	</div>
		
	
		
	<div class="col-md-3">
		
		<?php
		$result1=mysqli_query($conn,"SELECT * FROM users WHERE user_email='$user_email' AND membership=0");	
		if(mysqli_num_rows($result1)==0){ 
			
		$result2=mysqli_query($conn,"SELECT * FROM users WHERE user_email='$user_email'");
		$row1=mysqli_fetch_array($result2);
		if(($row1['membership']==1) || ($row['membership']==2)){ ?>
			
		<div class="heading">
	    <a style="font-size: 20px;padding-bottom: 20px;color:#093F55"><i class="fas fa-crown"></i>&nbsp;Subscription Details</a>
	    </div><br>	
		<p style="font-size: 15px;margin-right: 10px;color: #222">Your request will be approved soon, Thank you for being patient</p>	
			
		<?php }else{
			
		$result3=mysqli_query($conn,"SELECT * FROM membership WHERE user_email='$user_email'");
		$row2=mysqli_fetch_array($result3);
		?>	
		<div class="heading">
	    <a style="font-size: 20px;padding-bottom: 20px;color:#093F55;"><i class="fas fa-crown"></i>&nbsp;Subscription Details</a>
	    </div>		
		<?php
			if($row2['subscription_type']=="silver"){ ?>
			<h4 style="color: red;margin-top: 20px;">Silver member</h4>
			<h4 style="font-size: 15px;color: #333">You can now save <span style="color: red;">5%</span> on final amount of purchase</h4>
				
		<?php	}else{ ?>
			<h4 style="color: red;margin-top: 20px;">Golden member</h4>
			<h4 style="font-size: 15px;color: #333">You can now save <span style="color: red;">10%</span> on final amount of purchase</h4>
		<?php	}
			?>			
		<h4 style="color: #333;font-size: 15px;">Your plans ends in <span id="demo" style="color: red;font-size: 18px;"></span></h4>
			
			
			
		<?php } }else{ ?>
		 
			
		<div class="heading">
	    <a style="font-size: 20px;padding-bottom: 20px;color:#093F55"><i class="fas fa-crown"></i>&nbsp;Subscription</a>
	    </div>
		<h4>Subscribe now to get access to exclusive offers!</h4>
		<a href="plans.php" style="cursor: pointer;color: #ED8155"><i class="fas fa-info-circle" style="font-size: 20px;">&nbsp;</i><span style="font-size: 20px;">View plans</span></a>	
			
			
			<?php } ?>
			
		
		
	</div>	
		
		
		<div class="col-md-3">		
		
			<div class="heading">
	<a onClick="funA()" id="heading" style="font-size: 20px;cursor: pointer;padding-bottom: 20px;color:#ED8155"><i class="fas fa-key"></i>&nbsp;Change password</a>	</div>
    <div id="passwordreset" style="visibility:hidden;">
	<form method="post" action="changepassword.php">	
	<table style="margin-top:0px;">
		<tr><td>&nbsp;</td></tr>
		<tr><td><label>Current Password</label></td></tr>
		<tr><td><input required name="currentpassword" type="password" style="height:30px;width:225px;border: 1px solid grey;border-radius: 5px;outline-color:#ED8155;"></td></tr>
		<tr><td><label>New Password</label></td></tr>
		<tr><td><input required name="newpassword" type="password" style="height: 30px;width:225px;border: 1px solid grey;border-radius: 5px;outline-color:#ED8155;"></td></tr>
		<tr><td><label>Re-enter Password</label></td></tr>
		<tr><td><input required name="confirmpassword" type="password" style="height: 30px;width:225px;border: 1px solid grey;border-radius: 5px;outline-color:#ED8155;"></td></tr>
		<tr><td><button type="button" class="button1" onClick="funB()" style="width: 100px;margin-right: 25px;">Cancel</button><button type="submit" name="change" class="button" style="width: 100px;">Confirm</button></td></tr>
	</table>	
		</form>
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
		
function funA() {
  document.getElementById("passwordreset").style.visibility = "visible";
  document.getElementById("passwordreset").style.opacity = "1";	
  document.getElementById("passwordreset").style.transition = "opacity 800ms linear";	
  document.getElementById("heading").style.cursor="text";	
  document.getElementById("heading").style.color="#093F55";		
}	
function funB(){
  document.getElementById("passwordreset").style.visibility = "hidden";
  document.getElementById("passwordreset").style.opacity = "0";	
 document.getElementById("passwordreset").style.transition = "opacity 200ms linear";	
  document.getElementById("heading").style.cursor="pointer";	
  document.getElementById("heading").style.color="#ED8155";
}		
</script>	
<script src="preloader.js"></script>	
		
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
	<script type="text/javascript">

	
function myFn(){
  Swal.fire({
  width: '40rem',
  padding:"1rem",	  
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
	
<!--
    <script type="text/javascript">
	function myFnn(){
      swal.fire({
	icon: 'success',	  
    title: "Profile updated!",	  
    padding:"3rem",	
    confirmButtonColor: '#3085d6',		  
    text: "",
    type: "success",
    		  
}).then(function() {
    window.location = "profile.php";
});
}
	</script>
-->
	
	<script>
// Set the date we're counting down to
<?php 
$date1=$row2['subscription_date'];		
$date2=date('M d, Y H:i:s', strtotime($date1. ' + 30 day'));		
?>		
var countDownDate = new Date("<?php echo $date2; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<?php if(isset($_SESSION['updated'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Profile updated',
  showConfirmButton: false,
  timer: 1800,	
})	
</script>	
	
<?php unset($_SESSION['updated']); } ?>
<?php if(isset($_SESSION['passwordchange'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Password changed',
  showConfirmButton: false,
  timer: 1800,	
})	
</script>	
	
<?php unset($_SESSION['passwordchange']); } ?>
	
<?php if(isset($_SESSION['passwordmismatch'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'password does not match',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['passwordmismatch']); } ?>
	
<?php if(isset($_SESSION['passwordincorrect'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'incorrect password',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['passwordincorrect']); } ?>
	
	
</body>
</html>

<?php
if(isset($_POST['save'])) // when click on Update button
{
    
	$name = trim($_POST['name']);
	$number = trim($_POST['number']);
	$dob = trim($_POST['dob']);
	
	if (isset($_POST['gender'])) {
	    $gender1=trim($_POST['gender']);	
		
		$edit = mysqli_query($conn,"update users set user_name = '$name', user_dob = '$dob',user_number = '$number', user_gender ='$gender1' WHERE user_email = '$user_email'");
	    }else{
		$edit = mysqli_query($conn,"update users set user_name = '$name', user_dob = '$dob',user_number = '$number' WHERE user_email = '$user_email'");
	}	    
	

	
			
    if($edit)
    {   
/*	echo '<script>alert("Profile updated");</script>'; */
//	 echo '<script type="text/javascript">
//       myFnn();
//      </script>';
	$_SESSION['updated']='';
	echo "<script>location.replace(document.referrer);</script>";
	}
}
?>