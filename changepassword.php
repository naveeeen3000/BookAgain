<?php
include('envs.php');
session_start();
$user_email=$_SESSION['email'];
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$query = "SELECT * FROM users where user_email='$user_email'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  $row = mysqli_fetch_assoc($result);



if(isset($_POST['change'])) // when click on Update button
{
    
	$currentpassword = md5($_POST['currentpassword']);   
	$newpassword = md5($_POST['newpassword']);
	$confirmpassword = md5($_POST['confirmpassword']);	
    
	$user_password=$row['user_password'];
	
	if($currentpassword == $user_password){
		
		if($newpassword == $confirmpassword){
		$edit1 = mysqli_query($conn,"update users set user_password = '$newpassword' WHERE user_email = '$user_email'");	
		if($edit1){
		$_SESSION['passwordchange']='';	
		echo '<script>location.replace(document.referrer);</script>';	
		}
	  }else{
		$_SESSION['passwordmismatch']='';	
		echo '<script>location.replace(document.referrer);</script>';	
		}
	  }else{
		$_SESSION['passwordincorrect']='';
		echo '<script>location.replace(document.referrer);</script>';	
	}
	
}
?>