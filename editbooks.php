<?php include('adminconfig.php');
include('envs.php');
$admin_email= $_SESSION['admin_email'];
?>
<?php
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
if(isset($_GET['id'])){
		$book_isbn = $_GET['id'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($book_isbn)){
		echo "Empty isbn! check again!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
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
<title>Book Again | EditBooks</title>
<link href="adminpreloader.css" rel="stylesheet">	
<style>
body {
font-family: "Lato", sans-serif;
background-color: #E3F4FB; 
margin: 0;	
}

 .sidenav {
	box-shadow: 0 1px 10px 2px black;
  background-color: #093F55;
  height: 100%;
  width: 225px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow: hidden;
  padding-top:10px;
  	
}
	
	.sidenav a {
  border: 0.1px solid #0A5B7A;		
  margin:4px 0 4px;
  position: relative;
  padding: 3.5px 8px 3.5px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #CDEEFA;
  display: block;
}

.active, .btn:hover{
 box-shadow: 0px 0px 5px 1px #ADBFC6;
 background-color:#062A38;	
}	
		
		.fas {
		
			padding-right: 10px;
		}

.main {
  margin-left: 225px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
	
.innercontainer button{
	margin-top: 15px;
	box-shadow: 2px 2px 4px 1px #000;
	cursor: pointer;
	text-align: center;
	width: 140px;
	height: 40px; 
	border: 1px solid #000;
	border-radius: 5px;
		}
		
.confirm{
	text-decoration: none;
	background-color: #093F55;
	color: white;
	box-shadow: 2px 2px 4px 1px #000;
	border-radius: 5px;
	font-size: 14px;
	padding:11.5px 45px 11.5px 45px;
	border: 1px solid #000;
	}
	
			
		.submit{
			 background-color: #ED8155;
			color: white;
		}
		.submit:hover{
			opacity: 80%;
		}
		.clear{
			 background-color: #555;
			color: white;
		}
		.clear:hover{
			opacity: 80%;
		}	
	.confirm:hover{
		opacity: 80%;
	}
	
table{      
			margin-left: auto;
			margin-right: auto;
			padding-top: 20px;
		}
	td{
			padding: 7px 0px 7px 60px;
	
		}
	th{
		text-align: left;
		color: #093F55
	}
	
	input{
		width: 250px;
		border:1px solid #888;
	}
	
	textarea{
		width: 250px;
		height: 100px;
		border:1px solid #888;
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
}
.icon1-group-2:before {
  content: "\e901";
}
.icon1-iconfinder-icon:before {
  content: "\e902";
  color: #cdeefa;
}

	.btn i{
			font-size: 18px;
		}
		.btn span{
			font-size: 18px;
		}
.sidepanel  {
  width: 15% !important;	
  margin-top: 66px;
  height: 0;
  position: fixed ;
  z-index: 999999999;
  top: 0;  
  right: 0;	
  background-color: #FFFFFF;
  overflow-y: hidden;
  transition: 0.5s;
  box-shadow: 0 -6px 0 #fff, 0 1px 6px #093F55;
}

.sidepanel a {
  margin-left: 20px;  
  padding: 0px 0px 0px 32px;	
  text-decoration: none;
  font-size: 18px;
  color: #093F55;
  display: block;
 transition: 0.3s;
 	
  	
}

.sidepanel a:hover {
  color: #ED8155;
}


.dropdown:hover .sidepanel {height: 8%;}
		
.dropdown:hover button ::before{
			content: "\f0d8";
		}	
	</style>	
</head>

<body>

<body>
	
<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>

<div class="sidenav">
		
		<div class="sidebar">
  <div style="width: 205px;height: 90px;background-color: #CDEEFA;margin-left: 10px;box-shadow:0 0 3px 1px #CDEEFA;margin-bottom: 10px; ">		
  <img src="images/logo2.png" alt="" style="margin-left: 31.5px;margin-top: 5px">
			</div>	  <hr size="2" width="215px;">
  <div id="activepage">			
  <a href="dashboard.php" class="btn"><i class="fas fa-chart-line"></i>Dashboard</a><hr size="2" width="215px;">
  <a href="addbook.php" class="btn"><i class="fas fa-plus"></i>New Book</a><hr size="2" width="210px;">
  <a href="managebooks.php" class="btn active"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Books</a><hr size="2" width="215px;">
	  <a href="orders.php" class="btn"><i class="fas fa-shopping-bag"></i>Orders</a><hr size="2" width="215px;">
  <a href="manageusers.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Users</a><hr size="2" width="215px;">
	  <a href="subscriptionrequests.php" class="btn"><span class="icon1-request-2" style="padding-right: 10px;"></span>Subscriptions</a><hr size="2" width="215px;">
  <a href="bookrequests.php" class="btn"><span class="icon1-iconfinder-icon" style="padding-right: 10px;"></span>Book requests</a><hr size="2" width="215px;">
  <a href="viewfeedbacks.php" class="btn"><i class="fas fa-comments"></i>Feedbacks</a><hr size="2" width="215px;">
	<a href="contactsupport.php" class="btn"><i class="fas fa-address-card"></i>Contacts</a><hr size="2" width="215px;">
  	  
		</div>
 
		</div>
</div>

<div class="topnav" style="width: 100%;height: 60px;background-color: #093F55;box-shadow: 0 0px 10px 1px black;">
	<div class="dropdown">	
		
	<button class="openbtn" id="button" onclick="openNav()" style="cursor: pointer;float: right;font-size: 25px;background-color: #093F55;border: none;color: white; height: 60px;margin-top: 0;padding-top: 12px;"><i class="fas fa-caret-down"></i></button>
		
	<div id="mySidepanel" class="sidepanel">
       	 <h5 style="color: #093F55;padding: 10px;margin-top: -10px"><?php echo $admin_email; ?></h5>
		 <a href="adminlogout.php" style="margin-top: -25px;"><i class="fa fa-fw fa-sign-out"></i>LogOut</a>   
    </div>	
	
	</div>
	<img src="images/adminicon.png" alt="adminicon" class="avatar" style="float: right;height: 40px;width: 40px;padding-top: 10px;"> 
	<p style="margin-left: 250px;margin-top: 0;padding-top:15px;font-size: 20px;color: white"><a href="managebooks.php" style="text-decoration: none;color: white">Manage Books</a>&nbsp;&nbsp;<i class="fas fa-angle-right"></i>Edit</p>	
	</div>	
	
<div class="main">
<div class="innercontainer" style="width: 97%;height:80%;background-color:#E3F4FB;margin-left: 20px;margin-top: 24px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">	
<form method="post" action="editbook.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" value="<?php echo $row['book_isbn'];?>" readOnly="true" style="height: 25px;" id="isbn" onFocus="funA()" onBlur="funA1()"></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" value="<?php echo $row['book_title'];?>" required style="height: 25px;" id="title" onFocus="funB()" onBlur="funB1()"></td>
			</tr>
			<tr>
				<th>Author</th>
				<td><input type="text" name="author" value="<?php echo $row['book_author'];?>" required style="height: 25px;" id="author" onFocus="funC()" onBlur="funC1()"></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image" style="border: none;"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" id="descr" onFocus="funD()" onBlur="funD1()"><?php echo $row['book_descr'];?></textarea>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" value="<?php echo $row['book_price'];?>" required style="height: 25px;" id="price" onFocus="funE()" onBlur="funE1()"></td>
			</tr>
			<tr>
				<th>Publisher</th>
				<td><input type="text" name="publisher" value="<?php echo $row['publisher_name']; ?>" required style="height: 25px;" id="publisher" onFocus="funF()" onBlur="funF1()"></td>
			</tr>
			<tr>
				<th>Category</th>
				<td><input type="text" name="category" value="<?php echo $row['book_category'];?>" required style="height: 25px;" id="category" onFocus="funG()" onBlur="funG1()"></td>
			</tr>
	</table>
	    <button type="submit" class="submit" name="submit" style="margin-left: 280px;">Change</button>
	    <button type="reset" class="clear" name="clear">Reset</button>
	    <a href="managebooks.php" class="confirm" style="">Confirm</a>
	</form>     
	
</div>	
	</div>
<script>
var header = document.getElementById("activepage");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
	
function funA() {
     document.getElementById("isbn").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("isbn").style.outline="none";
	
}	
function funA1() {
     document.getElementById("isbn").style.boxShadow = "none";
}		
		
function funB() {
     document.getElementById("title").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("title").style.outline="none";
}
function funB1() {
      document.getElementById("title").style.boxShadow = "none";
}	
	
function funC() {
     document.getElementById("author").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("author").style.outline="none";
}	
function funC1() {
      document.getElementById("author").style.boxShadow = "none";
}	
	
function funD() {
   document.getElementById("descr").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("descr").style.outline="none";
}	
function funD1() {
     document.getElementById("descr").style.boxShadow = "none";
}	
		
function funE() {
     document.getElementById("price").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("price").style.outline="none";
}	
function funE1() {
   document.getElementById("price").style.boxShadow = "none";
}
function funF() {
     document.getElementById("publisher").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("publisher").style.outline="none";
}	
function funF1() {
   document.getElementById("publisher").style.boxShadow = "none";
}	
function funG() {
     document.getElementById("category").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("category").style.outline="none";
}	
function funG1() {
   document.getElementById("category").style.boxShadow = "none";
}	
	
</script>	
<script src="preloader.js">
</script>	
</script>
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
	
</body>
	
</html>
	


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	