<?php session_start();
include('envs.php');
 ?>
<html>
<head>
	
<script>
function registerForm() {
				var user_name =
					document.forms["registerform"]["user_name"];
				var user_email =
					document.forms["registerform"]["user_email"];
				var user_dob =
					document.forms["registerform"]["user_dob"];
				var user_password =
					document.forms["registerform"]["user_password"];
	            var confirm_password =
					document.forms["registerform"]["confirm_password"];
				var msg = document.forms["registerform"]["msg"];
                
	           
                var email = document.getElementById('user_email');
	              var password = document.getElementById('registerpassword');
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	              var passw=  /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	
				if (user_name.value == "") {
					msg.value="username cannot be empty";
					user_name.focus();
					return false;
				}       
	           
				if (user_email.value == "") {
					user_email.focus();
					return false;
				}
	            
	            if (!filter.test(email.value)) {
                msg.value="invalid email id";
                email.focus;
                return false;
                }   
	            
	            if (!passw.test(password.value)) {
                msg.value="password must contain minimum 8 characters, 1 number";
                password.focus;
                return false;
                }  
	           

				if (user_dob.value == "") {
					msg.value="Select your date of birth";
					user_dob.focus();
					return false;
				}
	            
	            if(user_password.value != confirm_password.value){
				   msg.value="password do not match";
				   return false;
				}
	
				return true;
			}	
		
</script>	
	
<meta charset="utf-8">
<title>Sign-in | BookAgain</title>
<link href="style.css" rel="stylesheet">
<link href="preloader.css" rel="stylesheet">	
<link href="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">	
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js">		
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	
	<style>
.text-field {
        position: relative;
        margin: 10px 2.5px 20px 2.5px;
	    margin-top: 10px;
	    margin-left: 80px;
    }

   .text-field  input {
        display: inline-block;
        border: 2px solid #BBB;
        color: #444;
        background-color: #fff;
        padding: 10px 10px 10px 10px;
        border-radius: 5px;
	    height: 50px;
	    width: 85%;
    }

   .text-field  input:focus {
       border: 2px solid #ED8155;
       background-color:#fff;
	   outline: none;
        }

       .text-field label {
        color: #999;
        position: absolute;
        pointer-events: none;
        left: 10px;
        top: 15px;
        transition: 0.2s;
    }

     .text-field  input:focus ~ label, input:valid ~ label {
        top: -10px;
        left: 15px;
        font-size: medium;
        color: #ED8155;
        background-color:#fff;
        padding:0 5px 0 5px;
    }    
	
		

	</style>
</head>

<body style="overflow: hidden; margin: 0;padding: 0;">
	
	<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>
	
<div class="container3">
	
	<img src="images/name.png" alt="" style="margin-left: 120px;margin-top: 10px;align-self:center;">
		<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Login')" id="defaultopen">LogIn</button>
  <button class="tablinks" onclick="openCity(event, 'Signup')">SignUp</button>
</div>

<div id="Login" class="tabcontent">
   <form method="post" action="authentication.php" enctype="multipart/form-data">
	 
	<div class="text-field" style="margin-top: 50px;">
    <input type="text" name="email" id="email" style="height: 60px;" required>
    <label>Email</label>
    </div>  
	 <div class="text-field" style="margin-top: 50px;">
    <input type="password" name="password" id="password" style="height: 60px;" required>
    <label>Password</label>	
	<i class="far fa-eye" id="togglePassword" style="margin-left: -40px;"></i>	
    </div>	  	
		
<!--    <a href="#" class="forgotpassword">Forgot Password?</a>-->
		
	<button type="submit" class="signin" name="login" style="background-color: #093F55; color: white;height: 50px;">SignIn</button>
	</form>	
	
</div>
	

<div id="Signup" class="tabcontent">
	
	<form action="" name="registerform" onSubmit="return registerForm()" method="post">   <!--	 -->
	
    <div class="text-field">
    <input type="text" name="user_name" id="user_name" required>
    <label>Full Name</label>
    </div>
    
	<div class="text-field">
    <input type="text" name="user_email" id="user_email" required>
    <label>Email</label>
    </div>	
	
	<div class="text-field">
    <input type="password" name="user_password" id="registerpassword" required>
    <label>Password</label>	
	<i class="far fa-eye" id="togglePassword1" style="margin-left: -40px;"></i>	
    </div>	
	
	<div class="text-field">
    <input type="password" name="confirm_password" id="confirmpassword" required>
    <label>Confirm Password</label>
	<i class="far fa-eye" id="togglePassword2" style="margin-left: -40px;"></i>	
    </div>	
	
	<div class="text-field">
    <input onfocus="(this.type='date')" onBlur="this.type='text'" name="user_dob" id="dob" style="text-decoration: none;padding-right: 20px;"required>
    <label>DOB</label>
    </div>	
	
	<input type="text" name="msg" style="margin-left: 82px;height: 30px;margin-top: -20px;width: 360px;color: red;border: none;outline: none;">	
		
	<button type="submit" name="submit" class="signup" style="background-color: #093F55; color: white;height: 50px;">SignUp</button>
		
	</form>
	
	</div>
	</div>
	
<div class="container4" style="background-color: #FDF1EC;">
<div class="mySlides fade">  
  <img src="images/slideshow-3.png" style="background-size:cover;" alt="">
</div>
<div class="mySlides fade">
  <img src="images/slideshow-1.png" style="background-size:cover;" alt="">
 </div>
<div class="mySlides fade">
  <img src="images/slideshow-2.png" style="background-size:cover;" alt="">	
</div>	
	</div>
	<div>
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>	

	
	

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
	
function funA() {
     document.getElementById("emailfield").style.border = "2px solid #ED8155"; 
	document.getElementById("email").style.outline = "none";
}	
function funA1() {
     document.getElementById("emailfield").style.border = "2px solid #BBB";
}
	
function funB() {
     document.getElementById("passwordfield").style.border = "2px solid #ED8155";
	document.getElementById("password").style.outline = "none";
}	
function funB1() {
     document.getElementById("passwordfield").style.border = "2px solid #BBB";
}	
	

	
	document.getElementById("defaultopen").click();
	
	var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display="block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}
	
	
const togglePassword = document.querySelector('#togglePassword'); 
const password = document.querySelector('#password');
	
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});	
	
const togglePassword1 = document.querySelector('#togglePassword1');
const password1 = document.querySelector('#password1');
	
togglePassword1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type1 = registerpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    registerpassword.setAttribute('type', type1);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});	
	
const togglePassword2 = document.querySelector('#togglePassword2');
const password2 = document.querySelector('#password2');
	
togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type2 = confirmpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmpassword.setAttribute('type', type2);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});		
	

</script>	
	
<script src="preloader.js"></script>	

<script>
function fun1(){
	const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Signed in successfully'
})
}	
</script>
	
<?php if(isset($_SESSION['registration'])) 
echo "<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,	
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: 'success',
    title: 'Signed in successfully'
  })	
</script>";
?>	
		
	
<?php if(isset($_SESSION['incorrect']))
echo "<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,	
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  
  Toast.fire({
    icon: 'error',
    title: 'Incorrect login credentials'
  })	
</script>	";
?>	

<?php unset($_SESSION['incorrect']); ?>	
<?php unset($_SESSION['registration']) ?>
</body>
</html>


 <?php   
$con = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));

// get the post records
if($_SERVER['REQUEST_METHOD']=="POST"){

  $user_name = $_POST['user_name'];
  $user_dob = $_POST['user_dob'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
$user_password=md5($user_password);
$confirm_password = $_POST['confirm_password'];
$confirm_password=md5($confirm_password);
$notification_time= date("Y-m-d H:i:s");
$result=mysqli_query($con,"SELECT * FROM users WHERE user_email='$user_email'");

$sql = "INSERT INTO `users` (`user_name`, `user_dob`, `user_email`, `user_password`,`membership`) VALUES ( '$user_name', '$user_dob', '$user_email', '$user_password','0')";
$rs = mysqli_query($con, $sql);
if($rs)
{
  echo "<h1> Registered </h1>";
  $notification=mysqli_query($con,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$user_email', 'Welcome to the world of books, We are happy to have you', '$notification_time', 'unread')");
	
	$notification1=mysqli_query($con,"INSERT INTO `notifications` (`notificationid`, `user_email`,`notification`, `notification_time`, `notification_status`) VALUES ('0', '$user_email', 'Become a premium user and get discounts', '$notification_time','unread')");
	
	$_SESSION['registration']='';
	echo '<script>location.replace(document.referrer);</script>';
}
}
?>

























