<?php  
include('envs.php');
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
  
if(isset($_POST['adminlogin']))  
{  
    $admin_email=$_POST['email'];  
    $admin_pass=$_POST['password'];  

    $check_user="select * from admin WHERE admin_email='$admin_email'AND admin_password='$admin_pass'";  
  
    $run=mysqli_query($conn,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        session_start(); 
        $_SESSION['admin_email']=$admin_email;
        echo "<script>window.open('dashboard.php','_self')</script>";  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";
	  echo "<script>window.open('adminlogin.php','_self')</script>";	
    }  
} 
?>