<?php  
include('envs.php');
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
 
if(isset($_POST['login']))  
{  
    $user_email=$_POST['email'];  
    $user_pass=md5($_POST['password']);  

    $check_user="select * from users WHERE user_email='$user_email'AND user_password='$user_pass'";  
  
    $run=mysqli_query($conn,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
		session_start(); 
        $_SESSION['email']=$user_email;
		
		if(isset($_SESSION['previous'])){
		$previous=$_SESSION['previous'];	
	    header("Location: $previous");	
		}else{
		echo "<script>window.open('index.php','_self')</script>"; 	
		} 
    }  
    else  
    {  
//      echo "<script>alert('Email or password is incorrect!')</script>";
	  session_start();	
	  $_SESSION['incorrect']='';	
	  echo "<script>window.open('login.php','_self')</script>";	
    }  
} 
?>