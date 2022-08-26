<?php
include('envs.php');
$conn=mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$user_email = $_GET['user_email'];
$result = mysqli_query($conn,"DELETE FROM users WHERE user_email = '$user_email'");
$result1 = mysqli_query($conn,"DELETE FROM membership WHERE user_email = '$user_email'");
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: manageusers.php");
?>