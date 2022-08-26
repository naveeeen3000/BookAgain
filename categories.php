<?php
include('envs.php');
  session_start();
  $count = 0;
  $count1=0;
  // connecto database
  $conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
  $query = "SELECT book_isbn, book_title, book_image FROM books ORDER BY book_isbn DESC LIMIT 5";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
?>
<?php 
 $result2=mysqli_query($conn,"SELECT DISTINCT book_category from books ORDER BY book_category ASC");
 if(!$result2){
	 echo "can't retrieve data" .mysqli_error($conn);
	 exit;
 }
?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Categories</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>
	<style>
		body{
			font-family: Arial !important;
		}
	.container{
		overflow: hidden;
			background-color: #F0946E;
			height: 500px !important;
			 width: 100%;
		border-radius: 0px !important;
		}
	.container5{
		overflow: hidden;
			background-color: #333;
			
			 width: 100%;
		}	
	.container6{
		
		background-color: white;
		width: 100%;
		margin-bottom: 50px;
		}		
	.column {
	margin-left: 35px;
  float: left;
  width: 16%;
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
	height: 330px;
	padding-bottom: 10px;
	padding-top: 10px;
  text-align: center;
  background-color: white;
  box-shadow: 0px 0px 4px 1px black;
	border-radius: 5px;
}	

.card:hover{
	box-shadow: 0px 0px 15px 4px black;
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
  transition: .3s ease;
  opacity:0;
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
  width: 98%;
  transition: .3s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20 50 20 50;	 
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
		
		.publisher th{	
		width: 174px;
		color: white;
		}	
		.alphabet{
			margin-left: auto;
			margin-right: auto;
			width: 20px;
			height: 20px;
			padding: 6px;
			border-radius: 50px;
			background-color:#ED8155;
			-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
		}
		.publisher td{
			
			text-align: center;
		}
		.publisher a{ 
			color: white;
			text-decoration: none;
		}
		.publisher a:hover{
			color: #ED8155;
		}
		
		.active a{
			background-color: #ED8155;
		}

.column1 {
  float: left;
  width: 15%;	
  padding: 10 31.5;
}

.row1:after {
  content: "";
  display: table;
  clear: both;
}

.card1 {	
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
  text-align: center;
  background-color: #333;
  height: 80px;
  border-radius: 5px;	
  color: white;
  padding-top: 20px;	
}
		
		.card1:hover{
		box-shadow: 0 0 6px 0.5px black;	
		cursor: pointer;
		color: #ED8155;	
			
		}
		.card1 h3{
			font-size: 20px;
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
		<a href="books.php" class="option " style="width: 150px;"><i class="fas fa-book" style="margin-right: 5px;"></i>Books</a>
		<a href="categories.php" class="option" style="width: 150px;background-color: #ED8155"><i class="fas fa-list-alt" style="margin-right: 5px;"></i>Categories</a>
		<a href="index.php" class="option" style="width: 150px;"><i class="fas fa-home" style="margin-right: 5px;"></i>Home</a>
		</div>		
</div>	

<div class="container6" style="background-color: #FAFAFA">
<h2 class="toprated" style="text-align: center;font-size: 30px;color:#ED8155;text-shadow: 0.5px 0.5px 2px black">ALL CATEGORIES</h2>	
<?php for($i = 0; $i < mysqli_num_rows($result2); $i++){ ?>	
<div class="row1">
<?php while($row1 = mysqli_fetch_assoc($result2)){ ?>	
  <div class="column1">
	<a href="booksbycategory.php?book_category=<?php echo $row1['book_category']; ?>" style="text-decoration: none;">  
    <div class="card1">
      <h3><?php echo $row1['book_category']; ?></h3>
    </div>
	</a>	
  </div>
	 <?php
          $count1++;
          if($count1 >= 5){
              $count1 = 0;
              break;
            }
          }?>
</div>
	<?php
      }
?>	
</div>
	

	
<div class="container5">
<div class="publisher" style="margin-top: 25px;margin-bottom: 50px;">
<h2 class="toprated" style="text-align: center;font-size: 30px;;color: white;text-shadow: 0.5px 0.5px 2px black">PUBLISHERS</h2>
<hr width="95%;">	
<table>
	<tr>
	<th><div class="Alphabet">A</div></th>
	<th><div class="Alphabet">B</th>
	<th><div class="Alphabet">C</th>
	<th><div class="Alphabet">D</th>
	<th><div class="Alphabet">E</th>
	<th><div class="Alphabet">F</th>
	<th><div class="Alphabet">G</th>	
	</tr>
	<tr>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'A%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?> </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'B%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'C%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'D%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'E%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'F%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
		<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'G%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	</tr>
</table><hr width="95%">
<table>
	<tr>
	<th><div class="Alphabet">H</th>
	<th><div class="Alphabet">I</th>
	<th><div class="Alphabet">J</th>
	<th><div class="Alphabet">K</th>
	<th><div class="Alphabet">L</th>
	<th><div class="Alphabet">M</th>
	<th><div class="Alphabet">N</th>
	</tr>
	<tr>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'H%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'I%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'J%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'K%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'L%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'M%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'N%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	</tr>
	</table><hr width="95%;">

	<table>
	<tr>
	<th><div class="Alphabet">O</th>
	<th><div class="Alphabet">P</th>
	<th><div class="Alphabet">Q</th>
	<th><div class="Alphabet">R</th>
	<th><div class="Alphabet">S</th>
	<th><div class="Alphabet">T</th>
	<th><div class="Alphabet">U</th>
	</tr>
	<tr>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'O%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'P%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'Q%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'R%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'S%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'T%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'U%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	</tr>
	</table><hr width="95%">
	
	<table>
	<tr>
	<th><div class="Alphabet">V</th>
	<th><div class="Alphabet">W</th>
	<th><div class="Alphabet">X</th>
	<th><div class="Alphabet">Y</th>
	<th><div class="Alphabet">Z</th>
	</tr>
	<tr>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'V%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'W%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'X%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'Y%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	<td><?php 
		$result1=mysqli_query($conn,"SELECT DISTINCT publisher_name FROM books WHERE publisher_name LIKE 'Z%'");
        if(!$result1){
	    echo "can't retrieve data" . mysqli_error($conn);
	    exit;
        }
		while ($row = mysqli_fetch_assoc($result1)) {?><a href="booksbypublisher.php?publisher_name=<?php echo $row['publisher_name']; ?>"><?php echo $row['publisher_name']; ?></a><br><?php }?>  </td>
	</tr>
	</table><hr width="95%;">
	</div>
	</div>		
	
<div class="container" style="background-color: #F0946E;">
	<div class="Toprated">
		<h2 class="toprated" style="text-align: center;font-size: 30px;;color: #FFFFFF;text-shadow: 0.5px 0.5px 2px black">TOP RATED</h2>
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
          if($count >= 5){
              $count = 0;
              break;
            }
          }?>
      </div>
<?php
      }
?>	
		
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