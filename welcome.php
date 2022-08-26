<html>
<head>
<meta charset="utf-8">
<title>BookAgain</title>
	<link href="preloader.css" rel="stylesheet">
	<style>
		#img {
  /* The image used */
  background-image:url("images/welcome-bg-final.png");
  
  /* Center and scale the image nicely */
  background-position:center;
  background-repeat: no-repeat;
  background-sizeauto;
  margin-top: 0px;
}
		


*{  font-family: Arial !important;
	margin:0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'poppins', sans-serif;
}
section{
	position: relative;
	width: 100%;
	min-height: 100vh;
	padding: 100px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	
}
header{
	margin-left: -30px;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	padding: 20px 100px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
header .logo
{
	position: relative;
	max-width: 20px;
	
}
header ul
{
	margin-right: 10px;
	position: relative;
	display: flex;
}
header ul li
{
	list-style: none;
}
header ul li a{
	display: inline-block;
	color:#000;
	font-weight: 400;
	margin-left: 40px;
	text-decoration: none;
}
.content
{
	margin-left:-30px;
	position: relative;
	width: 100%;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.content .textbox
{  
	margin-top: 100px;
	position: relative;
	max-width: 600px;
}
.content .textbox h2 
{   
	color: #333;
	font-size: 2em;
	line-height: 1em;
	font-weight: 500px;
	}
.content .textbox h2 span
{
	color: #EE8749;
	font-size: 1.4em;
	font-weight: 900;
}
.content .textbox p
{  
	margin-top: 50px;
	font-size: 23px;
	color: #093F55;
}

#b
{  
	margin-bottom: -10px;
	background-color:#ED8155;
	margin-right: 20px;
	text-align: center;
	width: 125px;
	font-size: 15px;
	margin-top: 80px;
	display: inline-block;
	padding: 12px 8px;
	color:#fff;
	border-radius: 40px;
	font-weight: 500;
	letter-spacing: 1px;
	text-decoration: none;	
}

#b:hover{
	opacity: 80%;
}

#c
{   
	margin-bottom: -10px;
	border: 1px solid #ED8155;
	background-color: white;
	color: #ED8155;
	margin-right: 20px; 
	text-align: center;
	width: 125px;
	font-size: 15px;
	margin-top: 80px;
	display: inline-block;
	padding: 12px 8px;
	border-radius: 40px;
	font-weight: 500;
	letter-spacing: 1px;
	text-decoration: none;	
	box-shadow: inset 0 0 0 0 #ED8155;
	-webkit-transition: ease-out 0.6s;
        -moz-transition: ease-out 0.6s;
        transition: ease-out 0.6s;
}
#c:hover{
	box-shadow: inset 150px 0 0 0 #ED8155;
	color:white;
}

.content .imgBox
{
	width: 600px;
	display: flex;
	justify-content: flex-end;
	padding-right: 50px;
	margin-top: 50px;
}
.content .imgBox img
{
	max-width: 340px;
}
.sci
{
	position:absolute;
	top:50%;
	right: 30px;
	transform: translateY(-50%);
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.sci li
{
	list-style: none;
}
.sci li a
{
	display: inline-block;
	margin: 5px 0;
	transform: scale(0.6);
	filter: invert(1);
}		
	</style>
</head>
<link rel="stylesheet" href="style.css">
<body>
	
<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>	
	
	<div id="img">
	<section>	
		
		<header>
			<a href="#" class="logo"><img src="images/logo1.png" alt=""></a>
				<ul>
					<li><a href="aboutus.php">About us</a></li>
					<li><a href="#">Terms and policy</a></li>
					<li><a href="login.php">Sign In</a></li>
					<li><a href="index.php">Get started</a></li>
				</ul>
		</header>
			<div class="content">
			<div class="textbox">
		    <h2>welcome to <span>BookAgain</span></h2>
		<p style="text-align: center;margin-left: -175px;">Drive the<br>road of knowledge<br>with the<br>best collection of books</p>
				<a href="index.php" id="b" >Get started</a>
				
				<a href="login.php" id="c">Sign up</a>
				
				
</div>         
				
			</div>	
			<ul class="sci">
			  
			<li><a href="#"><img src="file:///C|/Users/kaush/Downloads/facebook.png" alt=""></a></li>
			<li><a href="#"><img src="file:///C|/Users/kaush/Downloads/twitter.png" alt=""></a></li>
		    <li><a href="#"><img src="file:///C|/Users/kaush/Downloads/instagram.png" alt=""></a></li>
			</ul>
		
		</section></div>
	
	<script src="preloader.js">
</script>
</body>
</html>
