<?php include('adminconfig.php');
include('envs.php');
$admin_email= $_SESSION['admin_email'];
?>
<?php
$db = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
?>

<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Book Requests</title>
<link href="adminpreloader.css" rel="stylesheet">	

<style>
body {
font-family: "Lato", sans-serif;
background-color: #E3F4FB; 
margin: 0;
overflow: hidden;	
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
  padding: 95px 20px;	
}
	.scroll{
  margin-top: 25px;		
  max-height: 350 !important;
  min-height: 50 !important;
  overflow: hidden;
  overflow-y: scroll;
  border: 2px solid #3283C4;	
	}



@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
	td{
	padding:5px;
	text-align: center;			
    border-right:  0.8px solid #BFD9EE;
	height: 40px;	
	}
	
	table {

  border-collapse: collapse;
  background-color: white;
  width: 100%;
}

table tr {
  border-bottom: 2px solid #3283C4;	
}
	th{
		padding-top: 5px;
		padding-bottom: 5px;
		background-color: #3283C4;
		color: white;
		position: sticky;
		top:0px;    	
	}
	
.edit{
		text-decoration: none;
	    color: green;
	}
	.delete{
		text-decoration: none;
		color: red;
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
  </div><hr size="2" width="215px;">
  <div id="activepage">			
  <a href="dashboard.php" class="btn"><i class="fas fa-chart-line"></i>Dashboard</a><hr size="2" width="215px;">
  <a href="addbook.php" class="btn"><i class="fas fa-plus"></i>New Book</a><hr size="2" width="210px;">
  <a href="managebooks.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Books</a><hr size="2" width="215px;">
  <a href="orders.php" class="btn"><i class="fas fa-shopping-bag"></i>Orders</a><hr size="2" width="215px;">	  
  <a href="manageusers.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Users</a><hr size="2" width="215px;">
  <a href="subscriptionrequests.php" class="btn"><span class="icon1-request-2" style="padding-right: 10px;"></span>Subscriptions</a><hr size="2" width="215px;">
  <a href="" class="btn  active"><span class="icon1-iconfinder-icon" style="padding-right: 10px;"></span>Book requests</a><hr size="2" width="215px;">
  <a href="viewfeedbacks.php" class="btn"><i class="fas fa-comments"></i>Feedbacks</a><hr size="2" width="215px;">
  <a href="contactsupport.php" class="btn"><i class="fas fa-address-card"></i>Contacts</a><hr size="2" width="215px;">
  </div>
  </div>
	
</div>

	
    <div class="topnav" style="width: 100%;height: 60px;background-color: #093F55;box-shadow: 0 0px 10px 1px black;position: fixed">
	<div class="dropdown">	
		
	<button class="openbtn" id="button" onclick="openNav()" style="cursor: pointer;float: right;font-size: 25px;background-color: #093F55;border: none;color: white; height: 60px;margin-top: 0;padding-top: 12px;"><i class="fas fa-caret-down"></i></button>
		
	<div id="mySidepanel" class="sidepanel">
       	 <h5 style="color: #093F55;padding: 10px;margin-top: -10px"><?php echo $admin_email; ?></h5>
		 <a href="adminlogout.php" style="margin-top: -25px;"><i class="fa fa-fw fa-sign-out"></i>LogOut</a>   
    </div>	
	
	</div>
	<img src="images/adminicon.png" alt="adminicon" class="avatar" style="float: right;height: 40px;width: 40px;padding-top: 10px;"> 
	<p style="margin-left: 250px;margin-top: 0;padding-top:15px;font-size: 20px;color: white">Book Requests</p>	
	</div>
	
<div class="main">
<div class="scroll">	
<table>
  <tr style="border-bottom: none;">
    <th>request ID</th>
    <th>user email</th>
    <th>isbn</th>
    <th>title</th>
    <th>author</th>
	<th>phone</th>  
    <th>status</th>
    <th>&nbsp;</th>
  </tr>

<?php
$records = mysqli_query($db,"select * from bookrequests"); 

	
while($data = mysqli_fetch_array($records))
{
?>	
  <tr>
    <td><?php echo $data['request_id']; ?></td>
    <td><?php echo $data['user_email']; ?></td>
    <td><?php echo $data['isbn']; ?></td>  
    <td><?php echo $data['title']; ?></td> 
    <td><?php echo $data['author']; ?></td> 
	<td><?php echo $data['phonenumber']; ?></td>    
	<td><?php echo $data['request_status']; ?></td>    
    <td><a href="deleterequest.php?request_id=<?php echo $data['request_id']; ?>"  class="delete"><i class="fas fa-minus-circle"></i></a></td>
  </tr>
<?php
}
?>	
</table>	
<?php if(mysqli_num_rows($records)==0){?>
	<p style="text-align: center;">No data found</p>
<?php } ?>	
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
</script>	
<script src="preloader.js">
</script>	
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
		
	
</body>
</html>
