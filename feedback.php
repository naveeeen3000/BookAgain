<?php session_start();
include('envs.php');
if(!isset($_SESSION['email'])){
	$_SESSION['previous']='feedback.php';
	echo '<script>alert("login to continue");</script>';
	header("Location: login.php");
} ?>

<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Feedback</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
	
<style>
	body{
		background-color: #FAFAFA;
		font-family:Arial !important;
		margin: 0 !important;
		padding: 0 !important;
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
	margin: 0 !important;
	padding: 0 !important;
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
		background-image:url( "images/feedback-animate (2).svg");
		background-size: contain;
	    background-repeat: no-repeat;
	    height: 70%;
	    vertical-align: middle;
	    background-position: center;
	    margin-top: 60px;
	}
	
.checked {
  color: #FF9529;
}	

       .row button{
		height: 40px;
		width: 125px;
		margin-top: 25px;
		margin-bottom: 25px;
		float: right;
		background-color: #ED8155;
		color: white;
		border-radius: 5px;
		border: none;
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	}	
	</style>

<script>
function feedbackForm() {
				var rating = document.forms["feedbackform"]["rating"];
				
				var msg = document.forms["feedbackform"]["msg"];
                
	           
	            if(rating.value == "-1"){
				   msg.value="Rating cannot be empty";
				   return false;
				}
	
				return true;
			}	
		
</script>	
	
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

<div class="row">

<div class="col-md-5 image">
	
</div>
<div class="col-md-6">
<h2 style="text-align: center;color: 093F55;font-weight: bold">Your feedback</h2>
<p style="text-align: center">Send us your Feedback to improve our website</p>		
<br>
<form action="feedback.php" method="post" name="feedbackform" onSubmit="return feedbackForm()">	
<h4 style="text-align: left">How was your experience?</h4>
	
<div class="rating1" style="font-size: 25px;margin-top: 10px;cursor: pointer">
			<input type="hidden" id="rating" name="rating" value="-1" required>
                <span class="ratings_stars fa fa-star" data-rating="1"></span>
                <span class="ratings_stars fa fa-star" data-rating="2"></span>
                <span class="ratings_stars fa fa-star" data-rating="3"></span>
                <span class="ratings_stars fa fa-star" data-rating="4"></span>
                <span class="ratings_stars fa fa-star" data-rating="5"></span>
</div>	
<br>	
<input type="text" name="msg" style="height: 30px;margin-top: -20px;width: 360px;color: red;border: none;outline: none;">		
	
	
<h4 style="text-align: left">Describe your experience here...</h4>
<textarea id="feedback" name="feedback" style="width: 100%;height: 80px;border-color: #AAA;outline-color: #ED8155;"></textarea>
<br><br>	
<h4 style="text-align: left">Select your feedback category </h4>	
<span><input type="radio" name="category" value="bug" style="cursor: pointer;" required> Bug</span><br>
<span><input type="radio" name="category" value="suggestion" style="cursor: pointer;"> Suggestion</span><br>	
<span><input type="radio" name="category" value="others" style="cursor: pointer;"> Others</span>	
	
<button type="submit" name="submit">Submit</button>	
</form>
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

const stars = document.querySelectorAll('.ratings_stars');

document.addEventListener('click', (evt) => {
  if (evt.target.classList.contains('ratings_stars')) {
    let clicktargetReached = false;
    for (const star of stars) {
      star.classList[clicktargetReached ? 'remove' : 'add']('checked');
      if (star === evt.target) {
        clicktargetReached = true;
      }
    }
    result.textContent = evt.target.dataset.rating;
  }
});		
	
	</script>	
<script src="preloader.js"></script>	
<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>	
<script>
$('.ratings_stars').click(function() {
  $('.ratings_stars').removeClass('selected'); // Removes the selected class from all of them
  $(this).addClass('selected');
  var rating = $(this).data('rating'); // Get the rating from the selected star

  $('#rating').val(rating); // Set the value of the hidden rating form element
});
	
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
	
<?php if(isset($_SESSION['feedbacksubmitted'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Feedback Submitted',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['feedbacksubmitted']); } ?>	
	
<?php if(isset($_SESSION['feedbackalreadysubmitted'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'Feedback already Submitted',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['feedbackalreadysubmitted']); } ?>	
	
</body>
</html>

<?php 
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));

if(isset($_POST['submit'])){
	
$email=$_SESSION['email'];	
$rating = trim($_POST['rating']);
$feedback = trim($_POST['feedback']);
$category = trim($_POST['category']);	
$date=date('Y-m-d H:i:s');	

$query1=mysqli_query($conn,"SELECT * FROM feedback WHERE user_email='$email'");
if(mysqli_num_rows($query1)==0){
$query = "INSERT INTO `feedback` (`feedbackid`, `user_email`, `rating`, `review`, `date`, `feedback_category`) VALUES ('0', '$email', '$rating', '$feedback', '$date', '$category')";
	$result = mysqli_query($conn, $query);	
	if($result){
		$notification=mysqli_query($conn,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$email', 'Thank you for your valuable feedback, We will continue to serve you better', '$date', 'unread')");
		
		$_SESSION['feedbacksubmitted']='';
		echo '<script>location.replace(document.referrer); </script>';
	}	
		else{
		echo mysqli_error($conn);	
		}	
}else{
	    $_SESSION['feedbackalreadysubmitted']='';
		echo '<script>location.replace(document.referrer); </script>';
}	
	
	
	
}
?>
