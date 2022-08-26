<?php
include('envs.php');
session_start();
if(!isset($_SESSION['email'])){
	$_SESSION['previous']='requestbook.php';
	echo '<script>alert("login to continue");</script>';
	header("Location: login.php");
}else{
	$email=$_SESSION['email'];
}
?>
<html>
<head>
		
<meta charset="utf-8">
<title>BookAgain | RequestBook</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
	<style>
		body{
			font-family: Arial !important;
		}
		
		@media only screen and (max-width: 1000px) {
  /* For mobile phones: */
  .navbar {
    width: 100%;
	height: 250px;  
  }
		.navbar a{
	float: left;
    margin-top: 50px;
    margin-left: 50px;			
		}		
		
		.navbar .searchTerm{
			margin-left: -55px;
			width: 320px
		}
		
		
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
		.navbar a{
			margin-top: 0;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.requestbox table{
			margin-left: auto;
			margin-right: auto;
		}
		.requestbox label{
			width: 350px;
			height: 50px;
			color: #093F55;
			font-weight: bold;
			font-size: 16px;
		}
		.requestbox input{
			width: 350px;
			height: 30px;
			outline-color:#ED8155;
			border:0.5px solid #999;
			border-radius: 3px;
		}
	
		
		.requestbox button{
		cursor: pointer;	
		height: 40px;
		width: 125px;
		background-color: #ED8155;
		color: white;
		border-radius: 5px;
		border: none;
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		}
		.requestbox td{
			padding: 10px;
			padding-right: 20px;
			padding-left: 20px;
		}
		
	</style>

<script>
function requestbookForm() {
				var email = document.getElementById('isbn');
				var author = document.forms["requestbookform"]["author"];				
				var msg = document.forms["requestbookform"]["msg"];
                
                var filter = /\A\d{13}\z/;	
	            
//	            if (!filter.test(isbn.value)) {
//                msg.value="invalid ISBN";
//                isbn.focus;
//                return false;
//                } 
	
	            if(author.value == ""){
				   msg.value="author cannot be empty";
				   return false;
				}
	
				return true;
			}	
		
</script>	
	
</head>

<body style="background-color: #FAFAFA">
	
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
<h2 style="color: #093F55;text-align:center;">Request a Book</h2>
<div class="requestbox" style="width: 80%;height: 400px;background-color:white;margin-left: auto;margin-right: auto;margin-bottom: 100px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
<p style="padding-top: 10px;padding-bottom: 10px;text-align: center;">Please fill up the form below to Request a Book. We will inform you as soon as book is available.</p>
	
<table>
	<tr>
	<form action="" method="post" name="requestbookform" onSubmit="return requestbookForm()">	
	<td><label for="isbn">ISBN</label></td>
	<td><label for="title">Title</label></td>	
	</tr>
	<tr>
	<td><input type="text" name="isbn" id="isbn" placeholder="isbn" required></td>
	<td><input type="text" name="title" id="title" placeholder="title" required></td>
	</tr>
	<tr>
	<td><label for="author">Author</label></td>
	<td><label for="number">Phone/Mobile</label></td>
	</tr>
	<tr>
	<td><input type="text" name="author" id="author" placeholder="author" required></td>
	<td><input type="tel" name="phone" id="phone" placeholder="number" min="10" maxlength="10" pattern="[789][0-9]{9}" required></td>	
    </tr>
	<tr>
	<td><label for="email">E-mail</label></td>	
	<td><input type="text" name="msg" style="height: 30px;margin-top: -20px;width: 360px;color: red;border: none;outline: none;"></td>	
	</tr>
	<tr>
	<td><input type="text" name="email" value="<?php echo("$email");?>" readonly></td>
	<td><button type="submit" name="requestbook">Submit</button></td>	
	</form>	
    </tr>
	</table>
	
</div>	
	
	<?php include("footer1.php"); ?>	
	
	
	
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

<?php if(isset($_SESSION['bookrequest'])) ?>	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Request sent',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['bookrequest']); ?>
</body>
</html>


<?php
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$email=$_SESSION['email'];

if(isset($_POST['requestbook'])){
$isbn = trim($_POST['isbn']);
$isbn = mysqli_real_escape_string($conn, $isbn);
$author = trim($_POST['author']);
$author = mysqli_real_escape_string($conn, $author);	
$title = trim($_POST['title']);
$title = mysqli_real_escape_string($conn, $title);
$phone = trim($_POST['phone']);
$phone = mysqli_real_escape_string($conn, $phone);	
$notification_time= date("Y-m-d H:i:s");
$query = "INSERT INTO `bookrequests` (`request_id`, `user_email`, `isbn`, `title`, `author`, `phonenumber`, `request_status`) VALUES ('0', '$email', '$isbn', '$title', '$author', '$phone', 'pending')";
	$result = mysqli_query($conn, $query);	
	if($result){
		
		$notification=mysqli_query($conn,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$email', 'Your request has been submitted, We will notify you as soon as the book is available', '$notification_time', 'unread')");
		$_SESSION['bookrequest']='';
		echo '<script>location.replace(document.referrer);</script>';
	}	
		else{
		echo mysqli_error($conn);	
		}	
}
?>