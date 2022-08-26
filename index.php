<?php
  include('envs.php');
  session_start();
  $count = 0;
  // connecto database
  $conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
  $query = "SELECT book_isbn, book_title, book_image FROM books ORDER BY date_added DESC LIMIT 4";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
?>

<?php
if(isset($_session['email'])){
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$email=$_SESSION['email'];

$result1 = mysqli_query($conn,"select * from membership WHERE user_email='$email'");
$result2= mysqli_query($conn,"SELECT * FROM users WHERE user_email='$email' AND membership!='0' AND membership!='1' AND membership!='2'");
if(mysqli_num_rows($result2)){
  $row=mysqli_fetch_assoc($result1);
  $notification_time= date("Y-m-d H:i:s"); 
  $start_date = $row['subscription_date'];	
  $end_date= strftime("%d-%m-%Y", strtotime("$start_date +30 day"));
  $today=date("d-m-Y");	
	
  $expDate =  date_create($end_date);
  $todayDate = date_create($today);	
  $diff =  date_diff($todayDate, $expDate);	
  
  if($diff->format("%R%a")<0){
	  	  
  $notification=mysqli_query($conn,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$email', 'Your plan has expired, Please renew it ', '$notification_time', 'unread')");	  
  
  $expire = mysqli_query($conn,"update users set membership = '0' WHERE user_email = '$email'");	  
  }	
}
	
}
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BookAgain | Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="preloader.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
	<style>	
		body{
			font-family: Arial !important;
		}
		.header .socialmedia{
	float: right;
	display: table-cell;
	margin-right: 10px;
	padding-top: 15px;
}
.header .socialmedia .fa {
  margin-right: 8px !important;	
  padding: 20px !important;
  font-size: 16px !important;
  width: 12px !important;
  height: 12px !important;	
  text-align: center !important;
  text-decoration: none !important;
  border-radius: 50% !important;
}

.fa:hover {
    opacity: 0.7;
}

.header .socialmedia .fa-facebook {
  background: #111;
  color: white;
  border: 3px solid #093F55;
}

.header .socialmedia .fa-twitter {
  background: #111;
  color: white;
  border: 3px solid #093F55;
}

.header .socialmedia .fa-google {
 background: #111;
  color: white;
  border: 3px solid #093F55;
}
.header .socialmedia .fa-instagram {
  background: #111;
  color: white;
  border: 3px solid #093F55;
}
		
		.active, .option:hover {
  background-color: #ED8155;
  color: white;
}

		
		.fa {
  font-size: 20px;
  margin-top: -50;			
}

		
		.bookname{
		color: #093F55;
		margin-top: -100px;	
		height: 30px;
		width: 100%;
		outline: none;
		text-align: center;
		border: none;
		background-color: #FFFFFF;
	}
		
	.overlay{
  text-decoration: none;
  position:relative;
  bottom: 120px;
  background-color: #093F55;
  color: #f1f1f1; 
  width: 100%;
  transition:0.3s ease;	
  opacity: 0;		
  color: white;
  font-size: 20px;
  padding: 20 79 20 79;
  text-align: center;
}

.column:hover .overlay {
opacity: 1;
}
		
 .overlay1 {
  text-decoration: none;
  position: relative; 
  top: -300; 	
  background: #093F55;
  color: #f1f1f1; 
  width: 86%;
  transition: .3s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20 51.5 20 51.5;
  text-align: center;
  border: none;
  cursor: pointer;
}

.column:hover .overlay1 {
  opacity: 1;
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
		.navbar{
			top: -1;
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
		
		@media only screen and (max-width: 1000px){
		.card{
			width: 50%;				
		}
			.outercontainer{
				height: 1000px;
			}
			.container{
				height: 1000px;
			}
		}	
		
	.notification{
			border: none !important;
		}
		.notification:hover{
			background-color: #111 !important;
		}	
		.notification:hover .bell{
			color: #888888;
		}
		
	.sidepanel2  {
  width: 30% !important;	  
  margin-top: -18px;	
  margin-right: 14px;		
  height: 0;
  position: absolute;
  z-index: 0;		
  right: 0;	
  background-color: #222222;
  overflow-y: hidden;
  transition: 0.5s;
}	
	.dropdown a{
	text-align: center;
	font-size: 15px;
	margin-top: -8px;	
		}		
.dropdown:hover .sidepanel2{
  height: 70px;
  }	
.sidepanel1 .closebtn1:hover{
	color: #ED8155 !important;
}	
		
		
		
</style>
</head>

<body style="overflow-x: hidden;">
	
	<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>
	
	
	<div class="header">
    <div class="logo">		
	<img src="images/logo2.png" alt="">	
		</div>
		<div class="socialmedia">
	<a href="#" class="fa fa-facebook" style="margin-top: 0;"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-instagram"></a>		
	</div> 
 
</div>
	
	
	

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
	
	<div id="mySidepanel1" class="sidepanel1" style="padding-bottom: 50px !important;height: 500px !important;position: fixed;margin-right: -17px;box-sizing: content-box;">
		
    <div style="position: sticky;top:0;height: 60px; background-color: #111;padding-bottom: -50px;margin-top:-20px"><span style="color: white;"><h3 style="padding-left: 10px;padding-top: 30px;">Your Notifications </h3></span><span><a href="javascript:void(0)" class="closebtn1" onclick="closeNav1();">×</a></span></div> 
	
	<div class="content" style="margin-top: 30px;margin-left: 10px;margin-right: 10px;">
		
	<?php 
		$email=$_SESSION['email'];
		$result10=mysqli_query($conn,"SELECT * FROM notifications where user_email='$email'");
		$result11=mysqli_query($conn,"SELECT * FROM notifications where user_email='$email' AND notification_status='unread'");
		while($row10=mysqli_fetch_array($result10)){
	?>
	
	
	<p style="width: 100%;color: #AAA;<?php if($row10['notification_status']=='unread'){ echo 'color:#FFF;'; } ?>"><?php echo $row10['notification']; ?></p>
	<div style="display: flex;justify-content: space-between;margin-top: -20px;">
    <p style="color: #AAA;font-size: 15px;<?php if($row10['notification_status']=='unread'){ echo 'color:#FFF;'; } ?>"><?php $date = date_create($row10['notification_time']);$date11=date_format($date, 'g:ia \o\n jS F Y');echo $date11; ?></p>
		
	<div class="dropdown">	
    <a style="font-size: 12px;padding: 5px;cursor:none" href="javascript:void(0)"><i class="fas fa-ellipsis-v"></i></a>		
	<div class="sidepanel2">
	<a href="managenotification.php?id=<?php echo $row10['notificationid'];?>">delete</a>
	<?php if($row10['notification_status']=='unread'){ ?>	
	<a href="managenotification.php?id1=<?php echo $row10['notificationid']; ?>">mark as read</a>	
	<?php }else{ ?>	
	<a href="managenotification.php?id1=<?php echo $row10['notificationid']; ?>">mark as unread</a>	
	<?php } ?>	
	</div>		
    </div>
	</div>	
    <hr size="1.5">
	<?php } ?>
	</div>
		
		
	</div>
		
	
	<div class="navbar"> 
	
	<div class="search">
	<div id="buttonvisibility">
	<button class="openbtn" onclick="openNav()" style="cursor: pointer;">☰</button>
	</div>	
	<form method="post" action="searchresults.php">	
    <input type="text" name="searchword" class="searchTerm" placeholder="Search by Title or Author...">
    <button type="submit" name="search" class="searchButton"><i class="fa fa-search" style="margin-top: 0px"></i></button>
	</form>		
    </div>
	

		
	<div id="activepage">
		
		<?php if(isset($_SESSION['email'])){ ?>
		<a href="javascript:void(0)" class="notification" onclick="openNav1()" style="padding-right:10px;padding-left:10px;">
        <span class="bell"><i class="fas fa-bell"></i></span>
        <span class="badge" style="position: absolute;top: -2;color:#FF9529"><?php echo mysqli_num_rows($result11); ?></span>
        </a>
		<?php } ?>
		
		
		<a href="cart.php" class="option" style="width: 150px;"><i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>My Cart</a>
		<a href="books.php" class="option" style="width: 150px;"><i class="fas fa-book" style="margin-right: 5px;"></i>Books</a>
		<a href="categories.php" class="option" style="width: 150px;"><i class="fas fa-list-alt" style="margin-right: 5px;"></i>Categories</a>
		<a href="#" class="option active" style="width: 150px;"><i class="fas fa-home" style="margin-right: 5px;"></i>Home</a>
		
		</div>		
    </div>

	<div class="bg-img">
		
	</div>
	<div class="outercontainer">	
	<div class="container">
	<div class="latest">
		<h2 class="latest" style="color: white;text-shadow: 2px 2px 4px black">Latest Books</h2>
	</div>	
 		
   <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="column" onMouseOver="funA()">
			<div class="card">  
              <img class="bookimages" src="/otherimages/<?php echo $query_row['book_image']; ?>"> 
				
				<form method="post" action="cart.php" id="myform">
				<input type="hidden" name="bookisbn" value="<?php echo $query_row['book_isbn'];?>">	
				<input class="overlay1" name="cart" type="submit" value="Add to cart">	
				</form>	
				
				
		        <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>" class="overlay">View</a>
			  <input type="text" name="bookname" class="bookname" value="<?php echo $query_row['book_title'];?>" readonly>	
				
			  </div>
		  </div>
          
     <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          }?>
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
?>	
	<a href="books.php?latestbooks" class="view"><button type="submit" name="viewmore" class="viewmore" style="float: right;margin-right: 30px;font-size: 20px;cursor: pointer;margin-top: -15px;background-color: #F0946E;color: white;border: none">View more <i class="fas fa-angle-double-right"></i></button></a>	
	</div></div>
	<div class="container_background">
	
	
	<div class="container2">
		<div class="subscribe_icon"><img src="images/subscribe_icon.png" alt="get now"></div>
		<div class="subscribe1">		
		<h2>Subscribe to Premium</h2>
	    <h3>and enjoy exclusive offers!</h3>	
     	</div>	
        <a href="plans.php"><button class="subscribe">Subscribe</button></a>	
	</div>
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
</script>
	

	
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

	
function openNav1() {
  document.getElementById("mySidepanel1").style.width = "425px";
  document.getElementById("mySidepanel1").style.transition = "ease 0.02s";
}
		
function closeNav1() {
  document.getElementById("mySidepanel1").style.width = "0";
}		
    </script>
	
<?php 
if(isset($_SESSION['open'])){ ?>
	
<script>
window.addEventListener("load", function() {

document.getElementById("mySidepanel1").style.width = "425px";	
  document.getElementById("mySidepanel1").style.transition = "ease";	
document.getElementById("mySidepanel1").style.transitionDelay = "0.9s";	
});	
</script>		
<?php unset($_SESSION['open']); } ?>
	

	
<script src="preloader.js">
</script>
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
  window.location.href = 'logout.php';
  }
})
}	
</script>
<?php if(isset($_SESSION['added'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Book added to cart',
  showConfirmButton: false,
  timer: 1800,	
})	
</script>	
	
<?php unset($_SESSION['added']); } ?>
	
<?php if(isset($_SESSION['planupgradation'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'Plan upgradation not available',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['planupgradation']); } ?>	
	
<?php if(isset($_SESSION['noresults'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'No results found',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['noresults']); } ?>
	
<?php if(isset($_SESSION['planpurchase'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Payment successfull',
  showConfirmButton: true,	
});
    


</script>	
	
<?php unset($_SESSION['planpurchase']); } ?>
	
</body>
</html>

