<?php include('adminconfig.php');
include('envs.php');
$admin_email= $_SESSION['admin_email'];
?>

<html>
<head>
<meta charset="utf-8">
<title>Book Again | New Book</title>
<link href="adminpreloader.css" rel="stylesheet">
	<style>
body {
font-family: "Lato", sans-serif;
background-color:#E3F4FB;
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
		
		table{
			margin-left: auto;
			margin-right: auto;
			padding-top: 20px;
		}		
		td{
			padding: 11px;
			padding-bottom: 5px;
			padding-bottom: 5px;
	
		}
		label{
			color: #093F55;
			font-weight: bold;
		}
	.innercontainer	button{		
	box-shadow: 2px 2px 4px 1px #000;	
	cursor: pointer;
	text-align: center;
	width: 140px;
	height: 40px; 
	border: 1px solid #000;
	border-radius: 5px;
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
	
.main {
  margin-left: 225px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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
  position: absolute;
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


.topnav .dropdown:hover .sidepanel {height: 8%;}
		
.topnav .dropdown:hover button ::before{
			content: "\f0d8";
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
	
	<div class="sidenav">
		
		<div class="sidebar">
  <div style="width: 205px;height: 90px;background-color: #CDEEFA;margin-left: 10px;box-shadow:0 0 3px 1px #CDEEFA;margin-bottom: 10px; ">		
  <img src="images/logo2.png" alt="" style="margin-left: 31.5px;margin-top: 5px">
			</div>	  <hr size="2" width="215px;">
  <div id="activepage">			
  <a href="dashboard.php" class="btn"><i class="fas fa-chart-line"></i>Dashboard</a><hr size="2" width="215px;">
  <a href="addbook.php" class="btn active"><i class="fas fa-plus"></i>New Book</a><hr size="2" width="210px;">
  <a href="managebooks.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Books</a><hr size="2" width="215px;">
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
	<p style="margin-left: 250px;margin-top: 0;padding-top:15px;font-size: 20px;color: white">Dashboard</p>	
	</div>
	
	<div class="main">				
		
<div class="innercontainer" style="width: 97%;height:80%;background-color:#E3F4FB;margin-left: 20px;margin-top: 24px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<form action="addbook.php" method="post" enctype="multipart/form-data">	
<table>
<tr>
    <td>
	<label for="isbn">ISBN</label>
	</td>
    <td>
	<input type="number" name="isbn" id="inputISBN" style="border:1px solid #888;height:25px;width: 250px;" onFocus="funA()" onBlur="funA1()" required>
	</td>	
</tr>
<tr>
	<td>
	<label for="title">Title</label>
	</td>
	<td>
	<input type="text" name="title" id="inputtitle" style="border:1px solid #888;height:25px;width: 250px;" onFocus="funB()" onBlur="funB1()" required>
	</td>	
</tr>	
<tr>
    <td>
	<label for="author">Author</label>
	</td>	
	<td>
	<input type="text" name="author" id="inputauthor" style="border:1px solid #888;height:25px;width: 250px;" onFocus="funC()" onBlur="funC1()" required>
	</td>
	</tr>	
<tr>
	<td>
	<label for="image">Image</label>
	</td>
	<td>
	<input type="file" name="image" id="inputimage" style="" required>
	</td>
</tr>
<tr>
	<td>
	<label for="description">Description</label>
	</td>
	<td>
	<textarea name="descr" id="inputdescription" style="border:1px solid #888;width: 250px;height: 80px;" onFocus="funD()" onBlur="funD1()" required></textarea>
	</td>
</tr>	
<tr>
    <td>
	<label for="price">Price</label>
	</td>	
	<td>
	<input type="number" name="price" id="inputprice" style="border:1px solid #888;height:25px;width: 250px;" onFocus="funE()" onBlur="funE1()" required>
	</td>
</tr>	
<tr>
    <td>
	<label for="publisher">Publisher</label>
	</td>	
	<td>
	<input type="text" name="publisher" id="inputpublisher" style="border:1px solid #888;height:25px;width: 250px;" onFocus="funF()" onBlur="funF1()" required>
	</td>
</tr>	
<tr>
    <td>
	<label for="category">Category</label>
	</td>	
	<td>
	
	<select name="category" id="inputcategory" style="border:1px solid #888;height: 25px;width:250px" onFocus="funG()" onBlur="funG1()" required>
	<option>Academics</option>	
	<option>Business</option>	
	<option>Children</option>	
	<option>Exams</option>	
	<option>Health Care</option>	
	<option>Fiction</option>	
	<option>Non-fiction</option>	
	</select>	
	</td>
</tr>
	
<tr>
    <td>
	<button type="submit" class="submit" name="submit">Submit</button>	
	</td>	
	<td>
	<button type="reset" class="clear" name="clear">Cancel</button>
	</td>
</tr>	
</table>
</form>
</div>
	</div>
	
	
	<script>
		
// Add active class to the current button 
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
     document.getElementById("inputISBN").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("inputISBN").style.outline="none";
	
}	
function funA1() {
     document.getElementById("inputISBN").style.boxShadow = "none";
}		
	
function funB() {
     document.getElementById("inputtitle").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("inputtitle").style.outline="none";
}	
function funB1() {
      document.getElementById("inputtitle").style.boxShadow = "none";
}	
	
function funC() {
     document.getElementById("inputauthor").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("inputauthor").style.outline="none";
}	
function funC1() {
      document.getElementById("inputauthor").style.boxShadow = "none";
}	
	
function funD() {
   document.getElementById("inputdescription").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("inputdescription").style.outline="none";
}	
function funD1() {
     document.getElementById("inputdescription").style.boxShadow = "none";
}	
		
function funE() {
     document.getElementById("inputprice").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("inputprice").style.outline="none";
}	
function funE1() {
   document.getElementById("inputprice").style.boxShadow = "none";
}
function funF() {
     document.getElementById("inputpublisher").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("inputpublisher").style.outline="none";
}	
function funF1() {
   document.getElementById("inputpublisher").style.boxShadow = "none";
}		

function funG() {
     document.getElementById("inputcategory").style.boxShadow = "0 0 2px 0.75px #00B9F7";
	 document.getElementById("inputcategory").style.outline="none";
}	
function funG1() {
   document.getElementById("inputcategory").style.boxShadow = "none";
}		
		
	
</script>
	
	<script src="preloader.js">
</script>
	
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
</body>
</html>



<?php


$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));	


	if(isset($_POST['submit'])){
		$isbn = trim($_POST['isbn']);
		$isbn = mysqli_real_escape_string($conn, $isbn);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($conn, $title);

		$author = trim($_POST['author']);
		$author = mysqli_real_escape_string($conn, $author);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
		$publisher = trim($_POST['publisher']);
		$publisher = mysqli_real_escape_string($conn, $publisher);
		
		$category = trim($_POST['category']);
		$category = mysqli_real_escape_string($conn,$category);
		
		$date = date("y.m.d");

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "otherimages/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}
		
		if(isset($_FILES['image1']) && $_FILES['image1']['name'] != ""){
			$image1 = $_FILES['image1']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "otherimages/";
			$uploadDirectory .= $image1;
			move_uploaded_file($_FILES['image1']['tmp_name'], $uploadDirectory);
		}
		
		
		$query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $publisher . "', '" . $category . "', '" . $date . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			
			$result1=mysqli_query($conn,"SELECT * FROM bookrequests WHERE isbn='$isbn'");
			if(mysqli_num_rows($result1)>0){
				$row=mysqli_fetch_assoc($result1);
				$email=$row['user_email'];
				$notification_time= date("Y-m-d H:i:s");
				
						$notification=mysqli_query($conn,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$email', 'Hurry up, Your requested book is now available', '$notification_time', 'unread')");
				$result2=mysqli_query($conn,"UPDATE bookrequests SET request_status = 'completed' WHERE isbn = '$isbn'");
			}
			
			echo "succesfull";
		}
	}     
?>

  
















