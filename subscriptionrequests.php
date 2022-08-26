<?php include('adminconfig.php');
include('envs.php');
$admin_email= $_SESSION['admin_email'];
?>
<?php
$db = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
//include("planexpiry.php");

?>

<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Subscriptions</title>
<link href="adminpreloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		
	
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
		
		.main {
 margin-left: 225px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 62px 20px;
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
		
	table{
		 border-collapse: collapse;
  background-color: white;
  width: 100%;
		}	
		
	td{
	padding:5px;
	text-align: center;			
    border-right:  0.8px solid #BFD9EE;
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
	
		.approve{
			background-color: white;
			color: green;
			font-weight: bold;
			border: none;
			cursor: pointer;
		}	
		form{
			margin: 0;
			padding: 0;
		}
		.btn i{
			font-size: 18px;
		}
		.btn span{
			font-size: 18px;
		}
			.scroll{	
  min-height: 50 !important;
  max-height: 350 !important;
  overflow: hidden;
  overflow-y: scroll;
  border: 2px solid #3283C4;	
	}
.topnav .dropdown .sidepanel  {
  width: 15% !important;	
  margin-top: 66px;
  height: 0 !important;	
  position: absolute;
  z-index: 99999;	
  top: 0;  
  right: 0 !important;
  margin-left: 1088px;
  background-color: #FFFFFF;
  overflow-y: hidden;
  transition: 0.5s;
  box-shadow: 0 -6px 0 #fff, 0 1px 6px #093F55;
  visibility: hidden;
}

.sidepanel a {
  margin-left: 20px; 	
  padding: 0px 0px 0px 32px;	
  text-decoration: none;
  font-size: 18px;
  color: #093F55 !important;
  display: block;
}

.sidepanel a:hover {
  color: #ED8155;
}


.topnav .dropdown:hover .sidepanel {visibility: visible;}
		
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
  <a href="addbook.php" class="btn"><i class="fas fa-plus"></i>New Book</a><hr size="2" width="210px;">
  <a href="managebooks.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Books</a><hr size="2" width="215px;">
	 <a href="orders.php" class="btn"><i class="fas fa-shopping-bag"></i>Orders</a><hr size="2" width="215px;"> 
  <a href="manageusers.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Users</a><hr size="2" width="215px;">
	  <a href="" class="btn active"><span class="icon1-request-2" style="padding-right: 10px;"></span>Subscriptions</a><hr size="2" width="215px;">
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
       	 <h5 style="color: #093F55;padding: 10px;margin-top: -70px"><?php echo $admin_email; ?></h5>
		 <a href="adminlogout.php" style="margin-top: -25px;"><i class="fa fa-fw fa-sign-out"></i>LogOut</a>   
    </div>	
	
	</div>
	
	<img src="images/adminicon.png" alt="adminicon" class="avatar" style="float: right;height: 40px;width: 40px;padding-top: 10px;"> 
	<p style="margin-left: 250px;margin-top: 0;padding-top:15px;font-size: 20px;color: white">Subscriptions</p>	
	</div>
	
	
	<div class="main">
	<div class="scroll">		
	<table>
		
  <tr>
    <th>subscription type</th>
    <th>user email</th>
    <th>status</th>
    <th>price</th>
	<th>term</th>  
	<th>subscription date</th>
	<th>end date</th>  
    <th>&nbsp;</th>
  </tr>
	
  <?php
$records = mysqli_query($db,"select * from users WHERE membership!='0' ORDER BY membership"); 

	
while($data = mysqli_fetch_array($records))
{
?>
  <tr>
	  
	<td><?php if(($data['membership'] == 1) || ($data['membership'] == 3)){ 
	echo("silver");     
     }else{
    echo("gold");
     } 
	 
	?></td>  
	  
    <td><?php echo $data['user_email']; ?></td>
	  
	 <td><?php if(($data['membership'] == 1) || ($data['membership'] == 2)){ 
	echo("pending");     
     }else{
    echo("Active");
	}	 
	?></td>  
	  
    <td><?php if(($data['membership'] == 1) || ($data['membership'] == 3)){ 
	echo("₹300");     
     }else{
    echo("₹500");
     } 	 
	?></td>
	  
	<td>1 month</td>  
	 
	<td><?php
        $email=$data['user_email']; 
 
       if(($data['membership'] == 1) || ($data['membership'] == 2)){
		   echo("----");
	   }else{
		   $query1=mysqli_query($db,"SELECT * FROM membership WHERE user_email='$email'");
		   if($data1=mysqli_fetch_array($query1)){
			   $subscription_date1 = $data1['subscription_date'];
			   $subscription_date3 = date("d-m-Y" , strtotime("$subscription_date1"));
			   echo $subscription_date3;
		   }
	   }
		
        
		?></td>  
	  
	<td><?php 
        $email=$data['user_email'];
 
        if(($data['membership'] == 1) || ($data['membership'] == 2)){
		   echo("----");
	   }else{
		   $query2=mysqli_query($db,"SELECT * FROM membership WHERE user_email='$email'");
			
		   if($data2=mysqli_fetch_array($query2)){
			   $subscription_date2 = $data2['subscription_date'];
			  $enddate = date("d-m-Y", strtotime("$subscription_date2 +30 day")); 
			 
			   echo $enddate;
		   }
	   }
 

		
		?></td>
	  
    <td><?php if(($data['membership'] == 1) || ($data['membership'] == 2)){ ?>
	<form method="post" action="subscriptionrequests.php">
	<input type="hidden" name="plantype" value="<?php echo $data['membership']; ?>">	
	<input type="hidden" name="user_email" value="<?php echo $data['user_email']; ?>">	
	<button type="submit" name="approve" class="approve">Approve</button>	
	</form>	
		  
	<?php }  ?></td>
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
	</script>
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['approve'])){
	
$plantype= $_POST['plantype'];
$user_email=$_POST['user_email'];
$subscription_date=date('Y-m-d H:i:s');
	
if($plantype == 1){
	$membership="3";
	$subscription_type="silver"; 
    $subscription_price="300";
	
	
}elseif($plantype == 2){
	$membership="4";
	$subscription_type="gold";
    $subscription_price="500";
	
}
	
	
	$query = mysqli_query($db,"INSERT INTO `membership` (`subscription_id`, `user_email`, `subscription_type`, `subscription_price`, `subscription_date` ) VALUES ('0', '$user_email', '$subscription_type', '$subscription_price', '$subscription_date')");
if($query){
	
	$notification=mysqli_query($db,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$user_email', 'Congrats on becoming a premium user, Please check your profile for more details', '$subscription_date', 'unread')");
	
	$update = mysqli_query($db,"update users set membership = '$membership' WHERE user_email = '$user_email'");
	echo '<script>location.replace(document.referrer);</script>';
}else{
	echo "Can't add new data " . mysqli_error($db);
			exit;
}
	
}


?>




