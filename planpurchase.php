<?php
include('envs.php');
session_start();
if(!isset($_SESSION['email'])){
	$_SESSION['previous']='plans.php';
	echo '<script>alert("login to continue");</script>';
	header("Location: login.php");
}
?>
<?php
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$email=$_SESSION['email'];
?>
<?php
if(isset($_POST['silver'])){
  $plantype=$_POST['plantype'];
  $amount=$_POST['amount'];	
}
elseif(isset($_POST['gold'])){
  $plantype=$_POST['plantype'];
  $amount=$_POST['amount'];	
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Payment</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	

	<style>
	body{
		background-color: #FFFFFF !important;
		font-family:Arial !important;
		margin: 0;
		padding: 0;
		overflow-x: hidden;
		background-image:url("images/blue.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		
	}
		
		td{
			padding-top: 10px;
			padding-bottom: 10px;
			padding-right: 10px;
			position: relative;
		}
	
		input{
			
			border: none;
			border-bottom:1px solid #555;
			outline: none;
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
	

	
	<div class="row">
	<div class="bakground" style="background-image: url('images/bg.png');background-repeat: no-repeat;background-size: contain;width: 70%;height: 75%;margin-left: auto;margin-right: auto;margin-top: 75px;border-radius: 20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;background-color: white;">
		
	<div class="row">
	
		<div class="col-md-5">
		<a href="plans.php" style="text-decoration: none;"><h4 style="color: white;padding-left: 20px;padding-top: 10px;position: relative;"><i class="fas fa-arrow-left" style="padding-right: 10px"></i>Previous page</h4></a>	
		<img src="images/card.png" style="padding-top: 25px;width: 400px; margin-left: -70px;margin-top: -40px;">
		</div>
	    <div class="col-md-5 col-sm-1">
		<form method="post" action="planpurchase.php" name="planpurchase" onSubmit="return planPurchase()">	
		<h3>Your payment details</h3>
		<table style="margin-top: 75px;">
		<tr><td>card holder name</td></tr>	
		<tr><td><input type="text" style="width: 430px;height: 30px;" required></td></tr>	
		<tr><td>card number</td></tr>
		<tr><td><input type="text" style="width: 430px;height: 30px" maxlength="28" min="28" id="input" required><i id="check" class="fas fa-check-circle" style="margin-left: -20px;color: green;opacity: 10%"></i></td></tr>
		<tr><td>expiry date</td><td><span style="margin-left: -210px;">CVV</span></td></tr>
			
		<tr><td><div><span><input type="number" style="width: 15%;text-align: end;" min="1" max="12" style="height: 40px;" placeholder="MM" required></span><span style="position: relative;">/</span><span><input type="number" style="width: 15%;text-align: center" min="2021" max="2040" style="height: 40px;" placeholder="YYYY"  required></span>
			
			</div></td>
			
		<td><input type="password" maxlength="3" style="margin-left: -210px;margin-top: -7px; height: 30px" required></td></tr>	
		</table>
		<input type="hidden" value="<?php echo("$plantype") ; ?>" name="membership">	
		<button name="buy" type="submit" style="margin-left: 75px;width: 300px;height: 50px;margin-top: 50px;background-color: #309EB7;color: white;border: none;font-size: 20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;border-radius: 5px;">Pay ₹<?php echo("$amount");?></button>	
		</form>	
		
		
			
		</div>
	</div>	
		
	</div>
	</div>
	
	
		
   <script>
	$(function() {
   
  $("form[name='planpurchase']").validate({
    // Specify validation rules
    rules: {
      input:{ 
		required:true,	
		minlength:28;  
	  },
      cvv: {
        required: true,
      },
     
    },
    // Specify validation error messages
    messages: {
      cvv: "Please enter your firstname",
      input: {
        required: "Please provide a password",
        minlength: "invalid card number"
	  },
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>

   <script>
	   
	   var input = document.getElementById("input");

input.onkeydown = function A() {
    if ((input.value.length > 0)&&(input.value.length < 28)) {

        if (input.value.length % 4 == 0) {
            input.value += "    ";
        }
	   }
	}
input.onkeyup = function B(){
	if(input.value.length == 28){
		document.getElementById("check").style.opacity="100%";
	}else{
		document.getElementById("check").style.opacity="10%";
	}
	}



	</script>		
    <script>
	function planPurchase() {	
	var number = document.getElementById('input');
	if (number.value.length < 28) {
		            alert("Invalid card number");
					number.focus();
					return false;
				} 
	}
	</script>
    <script src="preloader.js"></script>	
		
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
		

	
</body>
</html>


<?php
if(isset($_POST['buy'])){
  $membership=$_POST['membership'];	
  $notification_time= date("Y-m-d H:i:s");	
  $result = mysqli_query($conn,"update users set membership = '$membership' WHERE user_email = '$email'");
  if($result){
	 
	$notification=mysqli_query($conn,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$email', 'Thank you, your request for premium subscription has been made, we will verify and approve it soon', '$notification_time', 'unread')");
	 
	$_SESSION['planpurchase']='';  
	echo '<script>window.location.href="index.php";</script>';
  }	
	else
	{
		echo '<script>alert("Something went wrong")</script>';
	}
}
?>