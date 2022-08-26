<?php
include('envs.php');
include("config.php");
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
?>
<?php if($_SESSION['done']=='yes'){
	header("Location:cart.php");
} ?>
<html>
<head>
<meta charset="utf-8">
<title>Book Again | Payment</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	
<style>
body{
	background-color:#FAFAFA !important;
	font-family:Arial !important;
	margin: 0;
	padding: 0;
	overflow-x: hidden;
	}  
.questionNumbers {
  display: flex;
  align-items: center;
}
.questionNumberIcon {
  display: flex;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  border: 2px solid #444;
  align-items: center;
  justify-content: center;
  color: #444;	
  background-color: white;	
}
.questionNumberLine {
  flex: 1 0 auto;
  height: 0;
  border-top: 2px solid #444;
  margin-left: 5px;
  margin-right: 5px;
	
}	

	.name span{
		color: #444;
		width: 100px;
		
	}	
	body{
		overflow-x: hidden;
		
		
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
	
<main class="questionNumbers" style="margin-left: 150px;margin-right: 150px;margin-top: 25px;">
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="background-color: #ED8155;color: white;border-color: #ED8155;">
    3
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    4
  </div>
   
</main>

	<div class="name">
	<p><span style="color: #ED8155;margin-left: 152px;">Login</span><span style="color: #ED8155;margin-left: 265px;">Shipping</span><span style="margin-left: 255px;color: #ED8155">Payment</span><span style="margin-left: 260px;">Done!</span></p>
    </div>
  
	
	<div class="row">
	<div class="bakground" style="background-image: url('images/bg.png');background-repeat: no-repeat;background-size: contain;width: 70%;height: 75%;margin-left: auto;margin-right: auto;margin-top: 75px;border-radius: 20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;background-color: white;">
		
	<div class="row">
	
		<div class="col-md-5">
		<h4 onClick="history.back()" style="color: white;cursor: pointer;padding-left: 20px;padding-top: 10px;position: relative"><i class="fas fa-arrow-left" style="padding-right: 10px"></i>Previous page</h4>	
		<img src="images/card.png" style="padding-top: 25px;width: 400px; margin-left: -70px;margin-top: -40px;">
		</div>
	    <div class="col-md-5 col-sm-1">
		<form method="post" action="purchase.php" name="purchase" onSubmit="return purchase()">	
		<h3>Your payment details</h3>
		<table style="margin-top: 75px;">
		<tr><td>card holder name</td></tr>	
		<tr><td><input type="text" name="name" style="width: 430px;height: 30px;" required></td></tr>	
		<tr><td>card number</td></tr>
		<tr><td><input name="cardnumber" type="text" maxlength="28" pattern="^.{28,}$" id="input" style="width: 430px;height: 30px" required title="enter valid 16 digit number"><i class="fas fa-check-circle" style="margin-left: -20px;color: green;opacity: 10%" id="check"></i></td></tr>
		<tr><td>expiry date</td><td><span style="margin-left: -210px;">CVV</span></td></tr>
			
		<tr><td><div><span><input type="number" name="month" style="width: 15%;text-align: end;" min="01" max="12" style="height: 40px;" placeholder="MM" required></span><span style="position: relative;">/</span><span><input name="year" type="number" style="width: 15%;text-align: center" min="2021" max="2040" style="height: 40px;" placeholder="YYYY"  required></span>
			
			</div></td>
			
		<td><input type="password" maxlength="3" style="margin-left: -210px;margin-top: -7px; height: 30px" required></td></tr>
			
		</table>
			
			
		<button name="buy" type="submit" style="margin-left: 75px;width: 300px;height: 50px;margin-top: 50px;background-color: #309EB7;color: white;border: none;font-size: 20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;border-radius: 5px;">Pay ₹<?php echo $_SESSION['grandtotal'];?></button>	
		</form>	
		
		
			
		</div>
	</div>	
		
	</div>
	</div><br><br><br>
	
<script>
	$(function(){
   
  $("form[name='purchase']").validate({
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
	
	 if ((input.value.length > 0) && (input.value.length < 28)) {

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
	
	
<script>
$(function(){
    $("input[name=name]")[0].oninvalid = function () {
        this.setCustomValidity("Enter your name as per card");
    };
});
	
$(function(){
    $("input[name=name]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
	
$(function(){
    $("input[name=cardnumber]")[0].oninvalid = function () {
        this.setCustomValidity("Enter your card number");
    };
});
	
$(function(){
    $("input[name=cardnumber]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
	
$(function(){
    $("input[name=month]")[0].oninvalid = function () {
        this.setCustomValidity("Select expiry Month");
    };
});
	
$(function(){
    $("input[name=month]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});
	
$(function(){
    $("input[name=year]")[0].oninvalid = function () {
        this.setCustomValidity("Select expiry Year");
    };
});
	
$(function(){
    $("input[name=year]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
</script>	
	
	
<script src="preloader.js"></script>	
<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>	
		
</body>
</html>
<?php 
if(isset($_POST['buy'])){
	$_SESSION['payment']=1;
	echo '<script>window.location.href="process.php";</script>';
}
?>	
	
	