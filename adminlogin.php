<html>
<head>
<meta charset="utf-8">
<title>BookAgain | AdminLogin</title>	
<link href="adminpreloader.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	

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
       border: 2px solid #093F55;
       background-color:#fff;
	   outline: none;
        }

       .text-field label {
        color: #999;
        position: absolute;
        pointer-events: none;
        left: 10px;
        top: 20px;
        transition: 0.2s;
    }

     .text-field  input:focus ~ label, input:valid ~ label {
        top: -10px;
        left: 15px;
        font-size: medium;
        color: #093F55;
        background-color:#fff;
        padding:0 5px 0 5px;
    }	
</style>	

</head>

<body style="background-image:url('images/adminglogin.png');background-position: center;background-size: cover;">
<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>	
	
<div class="container" style="width: 80%;height: 80%;margin-left: auto;margin-right: auto;background-color: white;margin-top: 5%;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
	
<div class="col-md-6" >
<div style="height: 90%;margin-left: auto;margin-right: auto;background-repeat: no-repeat;background-image: url(images/admin-animate.svg);background-size: contain;margin-top: 20px;">
	
</div>	
</div>	
<div class="col-md-6" >
	
<form method="post" action="adminauthentication.php" enctype="multipart/form-data">
	 
	<div class="text-field" style="margin-top: 80px;">
    <input type="text" name="email" id="email" style="height: 60px;" required>
    <label>Email</label>
    </div>  
	 <div class="text-field" style="margin-top: 50px;">
    <input type="password" name="password" id="password" style="height: 60px;" required>
    <label>Password</label>	
	<i class="far fa-eye" id="togglePassword" style="margin-left: -40px;"></i>	
    </div>	  	
		
    <a href="#" style="margin-left: 80px;text-decoration: none">Forgot Password?</a>
		
	<button type="submit" class="adminlogin" name="adminlogin" style="background-color: #093F55; color: white;height: 50px;width: 70%;margin-top: 40px;margin-left: 80px;box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;border: none;font-size: 20px;">SignIn</button>
	
</form>		
	
</div>	
</div>

<script src="preloader.js"></script>
<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
<script>
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
</script>	
</body>
</html>


