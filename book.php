<?php 
include('envs.php');
session_start();
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$book_isbn = $_GET['bookisbn'];
  // connecto database
  require_once "./functions/database_functions.php";
  $query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['book_title'];

  $query2="SELECT AVG(rating) AS average FROM reviews WHERE book_isbn = $book_isbn";
  $result2 = mysqli_query($conn, $query2);
  $row1 = mysqli_fetch_assoc($result2); 
  $average = $row1['average'];
  $average1=floor($average);

  $query3="SELECT COUNT(rating) AS totalratings FROM reviews WHERE book_isbn=$book_isbn";
  $result3= mysqli_query($conn,$query3);	 
  $row2=mysqli_fetch_assoc($result3);
  $totalratings=$row2['totalratings'];
?>
<?php
  $count = 0;
  // connecto database
  $query1 = "SELECT user_name, rating, review, timestamp FROM reviews WHERE book_isbn='$book_isbn'";
  $result1 = mysqli_query($conn, $query1);
 
?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Book</title>
	<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	
	<style>
	body {
	margin:0;
	font-family: Arial !important;	
	   }
		
  .navbar .searchTerm {
  background: #111;
  width: 20%;
  border: 3px solid white;
  border-right: none;
  padding: 5px;
  height: 36px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #fff;
 margin-top:  -17px;
}
		
 .navbar .searchTerm:focus{
  color: #ED8155;
}
		a{
			text-decoration: none;
		}
		
 .navbar .searchButton {
  width: 40px;
  height: 36px;
  border: 2px solid white;
  background-color: #111;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
	 margin-top: -17px;
}
		
  .navbar .search {
  width: 100%;
  margin-top: 38px;
  margin-bottom: -55px;
  margin-left: 0px;
  position: relative;
  display: flex;
}
		
  .header {
 display: table;
  background-color:white;
  width: 100%;
}
  .header .logo{
	  float: left;
	  display: table-cell;
      margin-left: 35px;
	  padding-bottom: 6px;
		}
.header .socialmedia{
	float: right;
	display: table-cell;
	margin-right: 10px;
	padding-top: 15px;
}
.header .socialmedia .fa {
  margin-right: 8px;	
  padding: 20px;
  font-size: 16px;
  width: 12px;
  height: 12px;	
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
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

		
.navbar {
  border-bottom: 1.5px solid white !important; 
  overflow: hidden;
  background-color: #111;
  height: 80px;	
  position: sticky;
  position: -webkit-sticky;
  top: 0;
  width: 100%;
	z-index: 1;
}

.navbar a {
  position: relative;
  float: right;
  display: block;
  color: white;
  text-align: center;
  margin-right: 10px;
  margin-top: 4px;
	padding-top: 10px;
	padding-bottom: 10px;
  text-decoration: none;
  font-size: 18px;
  border: 1px solid #D26635;
}

.navbar a:hover {
  background: #ED8155;
  color: white;
}		

 .active, .option:hover {
  background-color: #ED8155;
  color: white;
}	
		

  .bg-img {
  /* The image used */
  background-image: url("images/bg1.jpg");
  min-height: 575px;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  margin-top: 0px;
	  
}

  

          .outercontainer{
			
			background-color: #111;
			height: 1100px;
			width: 100%;  		
			  padding-top: 60px;
			
		}

	      .container{
			margin-left: auto;
			  margin-right: auto;
			background-color: #F0946E;
			height: 1000px;
			width: 90%;  
			  border-radius: 5px;
		}
.container .latest{
	text-align: center;
	font-size: 40px;
	color: white;
	margin-top: 20px;
	padding-top: 5px;
}

/* Float four columns side by side */
.column {
	margin-left: 40px;
  float: left;
  width: 20%;
  padding: 0 5px;
	padding-bottom: 50px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
	color: #093F55;
	height: 332px;
  
  padding-bottom: 40px;
	padding-top: 10px;
  text-align: center;
  background-color: white;
  box-shadow: 0px 0px 4px 1px black;
	border-radius: 5px;
}	

.card:hover{
	box-shadow: 0px 0px 15px 4px black;
}




/*
.container2{
			background-color: #9D9EA0;
			height: 160px;
			
			
		} */
		.container_background {
  /* The image used */
  background-image: url("https://www.teahub.io/photos/full/209-2091368_background-color-gray-background-hd.jpg");
  min-height: 160px;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  margin-top: 0px;
			color: white;
}
		
		.container2 .subscribe1{
			float: left;
			font-size: 20px;		
			margin-left: 400px;
			margin-top: -140px;
			
		}
		
		.container2 .subscribe_icon{
			padding-top: 20px;
			margin-left: 140px;
			margin-top:0px;
		}
		
		.container2 .subscribe{				
			float: right;
			background-color: #093F55; 
            border: none;
			box-shadow: 0 0 4px 2px black;
            color: white;
            padding-top: 15px;
		    padding-bottom: 15px;
			padding-left: 35px;
			padding-right: 35px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin-right: 350px;
			margin-top: -100px;
            cursor: pointer;
			border-radius: 30px;
		}
        


.navbar .search .openbtn{
	position: relative;
	margin-right: 60px;
	font-size: 40px;
	margin-top: -30px;
	border: none;
	background-color: #111;
	color: white;
	
}

.navbar .search .openbtn:hover{
	color: #fff;
	opacity: 50%;
}

.sidepanel  {
	
  border-top:1.5px solid white;
border-bottom:1.5px solid white;

  margin-top: 80px;
  width: 0;
  position: fixed;
  z-index: 99999999;
  height: 400px;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 50px;
}

.sidepanel a {
	
  margin-left: 20px;
  padding: 8px 8px 12.2px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #FFFFFF;
  display: block;
 transition: 0.3s;
 	
  	
}

.sidepanel a:hover {
  color: #ED8155;
}

.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
}

.container3{
	min-width: 512px;
	width: 40%;
	background-color:white;
	float: left;
	height:100%;
}
.container4{
    
	position: absolute;
	margin-left: 512px;
	width: 60%;
}

/* Style the tab */
.container3 .tab {
  margin-top: 20px;	
  overflow: hidden;
  border-top: 1px solid #999;
  background-color: #FFFFFF;
}

/* Style the buttons inside the tab */
.container3 .tab button {
	text-align: center;
  background-color:white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 103px;
  transition: 0.3s;
  font-size: 17px;
	color: grey;
}

/* Change background color of buttons on hover */
.container3 .tab button:hover {
	border-top: 2px solid #ED8155;
  color:#ED8155;
}

/* Create an active/current tablink class */
.container3 .tab button.active {
  border-top: 2px solid #ED8155;
	outline: none;
	color: #ed8155;
}

/* Style the tab content */
.container3 .tabcontent {
	font-size: 18px;
  display:none;
  border: 1px solid #ccc;
  border: none;
}


#emailfield{
	padding-top: 18px;
	margin-top: 50px;
	margin-bottom: 40px;
	margin-left: 80px;
	text-align: center;
	width: 70%;
	height: 40px; 
	border: 2px solid #BBB;
	border-radius: 5px;
}

#emailfield:hover{
	border-color: #999999;
}
#passwordfield:hover{
	border-color: #999999;
}

#passwordfield{
	
	margin-bottom:40px;
	padding-top: 18px;
	margin-left: 80px;
	text-align: center;
	width: 70%;
	height: 40px; 
	border: 2px solid #BBB;
	border-radius: 5px;
}

.container3 .tabcontent .forgotpassword{
	color: black;
	margin-left: 80px;
	font-size: 18px;
	text-decoration: none;
	display: inline-block;
}
.container3 .tabcontent .forgotpassword:hover{
	color: firebrick;
	
}

.container3 .tabcontent .signin{
	background-color: #fff;
	color: #093F55;
	font-size: 20px;
	margin-top: 20px;
	margin-left: 80px;
	cursor: pointer;
	text-align: center;
	width: 70%;
	height: 40px; 
	border: 2px solid #333;
	border-radius: 5px;
}



/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3s;
  animation-name:fade;
  animation-duration: 3s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


#namefield{
	padding-bottom: 20px;
	margin-top: 10px;
	margin-left: 80px;
	width: 65%;
	height: 30px; 
	border: 2px solid #BBB;
	border-radius: 5px;
}


#dobfield{
	padding-bottom: 20px;
	margin-top: 10px;
	margin-left: 80px;
	width: 65%;
	height: 30px; 
	border: 2px solid #BBB;
	border-radius: 5px;
}

#registeremailfield{
	padding-bottom: 20px;
	margin-top: 10px;
	margin-left: 80px;
	width: 65%;
	height: 30px; 
	border: 2px solid #BBB;
	border-radius: 5px;
}

#registerpasswordfield{
	padding-bottom: 20px;
	margin-top: 10px;
	margin-left: 80px;
	width: 65%;
	height: 30px; 
	border: 2px solid #BBB;
	border-radius: 5px;
}

#confirmpasswordfield{
	padding-bottom: 20px;
	margin-top: 10px;
	margin-left: 80px;
	width: 65%;
	height: 30px; 
	border: 2px solid #BBB;
	border-radius: 5px;
}

.container3 .tabcontent .signup{
	background-color: #fff;
	color: #093F55;
	font-size: 20px;
	margin-top: 20px;
	margin-left: 80px;
	cursor: pointer;
	text-align: center;
	width: 70%;
	height: 40px; 
	border: 2px solid #333;
	border-radius: 5px;
}

/* admin portal page */

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
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


.checked {
  color: gold;
}
	
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}	
  .search form {
  display: flex;
	height: 100%;
	width: 100%;
}
		.navbar a{
			margin-top: 0;
			padding-top: 8px;
			padding-bottom: 8px;
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
		
	
<div class="navbar" style="border-radius: 0;position: sticky;"> 		
 
<div class="search">
<div id="buttonvisibility">
<button class="openbtn" onclick="openNav()" style="cursor: pointer;">☰</button>
</div>
<form method="post" action="searchresults.php" >		
<input type="text" name="searchword" class="searchTerm" placeholder="Search by Title or Author...">
<button type="submit" name="search" class="searchButton"><i class="fa fa-search"></i></button>
</form>	
</div>

        <div id="activepage">
		<a href="cart.php" class="option" style="width: 150px;"><i class="fas fa-shopping-cart" style="margin-right: 5px;"></i>My Cart</a>
		<a href="books.php" class="option" style="width: 150px;"><i class="fas fa-book" style="margin-right: 5px;"></i>Books</a>
		<a href="categories.php" class="option" style="width: 150px;padding-left: 0;padding-right: 0;"><i class="fas fa-list-alt" style="margin-right: 5px;"></i>Categories</a>
		<a href="index.php" class="option" style="width: 150px;"><i class="fas fa-home" style="margin-right: 5px;"></i>Home</a>
		</div>		

	
	</div>	
       
	
<div class="container-fluid">
  <!-- Example row of columns -->
	    <br>
          <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" style="box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;" src="./otherimages/<?php echo $row['book_image']; ?>">
		
			
	</div>
        <div class="col-md-6">
		  <p class="lead" style="color: #093F55;font-size: 20px;"><a href="books.php" style="text-decoration: none;">Books</a> > <?php echo $row['book_title']; ?></p> 
	
				
			 
           
			
          <h4 style="color: #ED8155;font-size: 20px;margin-top: 15px;">About the Book</h4>
          <p style="font-size: 16px;"><?php echo $row['book_descr']; ?></p>
		  <h4 style="color: #ED8155;font-size: 20px;">Book Details</h4>	
	<table class="table" style="margin-left: -8px;">
          	<?php foreach($row as $key => $value){
              if($key == "book_descr" || $key == "book_image" || $key == "date_added" || $key == "book_title"){
                continue;
              }
              switch($key){
                case "book_isbn":
                  $key = "ISBN";
                  break;
                case "book_title":
                  $key = "Title";
                  break;
                case "book_author":
                  $key = "Author";
                  break;
                case "book_price":
                  $key = "Price";
                  break;
				case "publisher_name":
				  $key="Publisher";  
					  break;
			    case "book_category":
                  $key = "Genre";
                  break;		  
              }
            ?>
            <tr>
              <td style="border: none;font-weight:700;color: #093F55"><?php echo $key; ?></td>
              <td style="border:none;font-size: 16px;"><?php echo $value; ?></td>
            </tr> 
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>	
       
			
			<form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" value="Add to cart" name="cart" class="btn btn-primary" style="background-color:green;padding:10 25 10 25;box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">		<br><br>
          </form>			
       	</div>
<!--
	    <div class="col-md-3">
	   <div style="width: 100%;height: 500px;background-color: white;border:1px solid black">
			
		</div>
	    </div>
-->
	<div class="row">
	<div class="col-md-12">
	   <hr color="#000" style="height: 0.5px;width: 95%;margin-left: 25;">	   
		</div>	
	</div>
	
	<div class="row">
	<div class="col-md-12">
		<p style="margin-left: 25px;font-size: 20px;">Write Review</p><br>
		</div>	
	</div>
	
	<div class="row">
	<div class="col-md-1">
	<img src="images/user.png" alt="Avatar" class="avatar" style="margin-left: 25px;"> 	
	</div>
	<form action="bookreview.php" method="post" enctype="multipart/form-data" >	
	<div class="col-md-11">
	<input type="text" name="review" id="review" style="height: 50px;width: 65%;outline-color:#00B9F7;border: 0.5px solid #999;">
	</div>	
	</div>
	<div class="row">
		
	<input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">	
	<div class="col-md-7">
		   <div class="rating1" style="font-size: 20px;margin-left: 100px;margin-top: 10px;cursor: pointer">
			<input type="hidden" id="rating" name="rating" value="-1">
                <span class="ratings_stars fa fa-star" data-rating="1"></span>
                <span class="ratings_stars fa fa-star" data-rating="2"></span>
                <span class="ratings_stars fa fa-star" data-rating="3"></span>
                <span class="ratings_stars fa fa-star" data-rating="4"></span>
                <span class="ratings_stars fa fa-star" data-rating="5"></span>
        </div>
		</div>
	<div class="col-md-5">
		<input type="submit" value="Submit" name="submitreview" style="background-color:#093F55;margin-top: 12px; box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;color: white;border-radius: 100px;padding:8 25 8 25;color: white;border: none;">
		</div>	
		
	</div>
		</form>
	<br>
	<div class="row">
	<div class="col-md-12">
		<p style="margin-left: 25px;font-size: 20px;">Reviews</p><br>
		</div>	
	</div>
	
	<?php for($i = 0; $i < mysqli_num_rows($result1); $i++){ ?>
	<?php while($query_row = mysqli_fetch_assoc($result1)){ ?>
	<div class="row">	
		
	<div class="col-md-1">
		<img src="images/user.png" alt="Avatar" class="avatar" style="margin-left: 25px;width: 35px;height: 35px;"> 
	</div>
		
	<div class="col-md-1">
	<h4 style="margin-left: -15px;"><?php echo $query_row['user_name'];?></h4>
    </div>	
		
	<div class="col-md-5">
	
	<?php
    $rating=$query_row['rating'];
	if($rating==1){
		?>
		<div class="rating2" style="font-size: 13px;margin-top: 10px;">
		  <span class="fa fa-star checked"></span>
          <span class=" fa fa-star"></span>
          <span class=" fa fa-star"></span>
          <span class=" fa fa-star"></span>
          <span class=" fa fa-star"></span>
	</div>
		<?php
	}else if($rating==2){
		?>
	<div class="rating2" style="font-size: 13px;margin-top: 14px;">
		  <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class=" fa fa-star"></span>
          <span class=" fa fa-star"></span>
          <span class=" fa fa-star"></span>
	</div>
		<?php
	}else if($rating==3){
		?>
	<div class="rating2" style="font-size: 13px;margin-top: 14px;">
		  <span class="fa fa-star checked"></span>
          <span class=" fa fa-star checked"></span>
          <span class=" fa fa-star checked"></span>
          <span class=" fa fa-star"></span>
          <span class=" fa fa-star"></span>
	</div>
	<?php
	}else if($rating==4){
		?>
	<div class="rating2" style="font-size: 13px;margin-top: 14px;">
		  <span class="fa fa-star checked"></span>
          <span class=" fa fa-star checked"></span>
          <span class=" fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class=" fa fa-star"></span>
	</div>
		<?php
	}else if($rating==5){
		?>
	<div class="rating2" style="font-size: 13px;margin-top: 14px;">
		  <span class="fa fa-star checked"></span>
          <span class=" fa fa-star checked"></span>
          <span class=" fa fa-star checked"></span>
          <span class=" fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
	</div>
	<?php } ?>	
		
	</div>
		
	<div class="col-md-5" style="margin-top: 10px;">
	<?php echo $query_row['timestamp'];?>
	</div>	
	
	<div class="row" >
	<div class="col-md-6">
		<p style="margin-top: 10px;"><?php echo $query_row['review'];?></p>
		</div>
		</div>	
		
	 <?php
          $count++;
          if($count >= 0){
              $count = 0;
              break; 
          }
          }?>
		
	</div>
	<?php
      }
?> </div>
	
	<?php if(mysqli_num_rows($result1)==0){ ?>
		<p style="margin-left: 40px;font-size: 20px;">There are no reviews yet!</p>
 <?php } ?>
	<br>
	

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
	
<?php if(isset($_SESSION['reviewsuccessful'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Review succesfully submitted',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['reviewsuccessful']); } ?>
	
<?php if(isset($_SESSION['reviewalreadysubmitted'])){ ?>
	
<script>
Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'Review already submitted',
  showConfirmButton: false,
  timer: 2000,	
})	
</script>	
	
<?php unset($_SESSION['reviewalreadysubmitted']); } ?>
	
</body>
</html>



