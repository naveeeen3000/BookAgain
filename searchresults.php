<?php
include('envs.php');
session_start();
$count = 0;
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
if(isset($_POST['search'])){
$searchword=$_POST['searchword']; 
$result = mysqli_query($conn,"SELECT book_isbn, book_title, book_author, book_image FROM books WHERE book_author LIKE '%$searchword%' OR  book_title LIKE '%$searchword%'");
if(mysqli_num_rows($result)==0){
 $_SESSION['noresults']='';	
 echo '<script>location.replace(document.referrer);</script>'; 
}
}
?>

<html>
<head>
<meta charset="utf-8">
<title>BookAgain | SearchResults</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	

	<style>
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
		z-index: 1;
	}
	body{
		margin: 0;
		padding: 0;
		background-color:#fff;
		font-family: Arial !important;
	}
	
	.navbar .searchTerm {
     height: 36.3px;
	}
	
	.column1 {	
  float: left;
  width: 200px;	
  height: 55%;	
  margin: 10px 26.3px 40px 26.3px;
}
	


/* Clear floats after the columns */
.row1:after {
  content: "";
  display: table;
  clear: both;
}
	.bookimages{
		box-shadow: 0 0 4px 2px Grey;
	}
	
	.bookimages:hover {
	box-shadow: 0 0 4px 2px black;
	}
		
	.heading1{
		text-align: left;
		margin-left: 25px;
		font-weight: bolder;
		color: #093F55;
		font-size: 30px;
	}
	
.column1 .overlay{
  text-decoration: none;
  position:relative;
  bottom: 120px;
  background: #F38E53;
  color: #f1f1f1; 
  width: 100%;
  transition: .3s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20 79 20 79;
  text-align: center;
}

.column1:hover .overlay {
  opacity: 1;	
}

 .overlay1 {
  text-decoration: none;
  position: relative; 
  top: -300; 	
  background: #F38E53;
  color: #f1f1f1; 
  width: 100%;
  transition: .3s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20 51.5 20 51.5;
  text-align: center;
	 border: none;
	 cursor: pointer;
}

.column1:hover .overlay1 {
  opacity: 1;	
}	
	
	.bookname{
		color: #fff;
		height: 30px;
		width: 200px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		outline: none;
		text-align: center;
		background-color: #333;
		border: none;
	}	
		
	.bookauthor{
		color: #fff;
		height: 30px;
		width: 200px;
		outline: none;
		text-align: center;
		background-color: #333;
		border: none;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}	
	
		.book{
		margin-top: -90px;	
		background-color: #333;	
		height: 60px;	
		width: 200px;	
		border-radius: 5px !important;	
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
		
		
	.swal2-popup {
  font-size: 1.2rem !important;
  font-family: Arial;
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
    <button type="submit" name="search" class="searchButton"><i class="fa fa-search" style="margin-top: 0px"></i></button>
	</form>		
    </div>
        <div id="activepage">
		<a href="cart.php" class="option" style="width: 150px;"><i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>My Cart</a>
		<a href="books.php" class="option active" style="width: 150px;"><i class="fas fa-book" style="margin-right: 5px;"></i>Books</a>
		<a href="categories.php" class="option" style="width: 150px;"><i class="fas fa-list-alt" style="margin-right: 5px;"></i>Categories</a>
		<a href="index.php" class="option" style="width: 150px;"><i class="fas fa-home" style="margin-right: 5px;"></i>Home</a>
		</div>		
</div>	

<p class="heading1">Search results for <?php echo("$searchword"); ?>...</p>
	
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row1">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="column1" onMouseOver="funA()">
			  
         <img class="bookimages" src="/otherimages/<?php echo $query_row['book_image']; ?>">     
<form method="post" action="cart.php" id="myform">
		 <input type="hidden" name="bookisbn" value="<?php echo $query_row['book_isbn'];?>">	
		 <input class="overlay1" name="cart" type="submit" value="Add to cart">	
		 </form>		 <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>" class="overlay">View</a>
		  <div class="book">  
		  <input type="text"  name="bookname" class="bookname" value="<?php echo $query_row['book_title'];?>" readonly>
		  <input type="text" name="booktauthor" class="bookauthor" value="Author:&nbsp;<?php echo $query_row['book_author'];?>" readonly>	  
			  </div>
		  </div>
        <?php
          $count++;
          if($count >= 5){
              $count = 0;
              break;
            }
          }?>
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
?>	
	
	
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
</body>
</html>



