<?php
include('envs.php');
$conn=mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));

if($_GET['support_id']){
$support_id = $_GET['support_id'];
$result = mysqli_query($conn,"DELETE FROM customersupport WHERE support_id = '$support_id'");
	if(!$result){
		echo "request removed" . mysqli_error($conn);
		exit;
	}
	header("Location: contactsupport.php");
}elseif($_GET['feedbackid']){
$feedbackid = $_GET['feedbackid'];
$result = mysqli_query($conn,"DELETE FROM feedback WHERE feedbackid = '$feedbackid'");
	if(!$result){
		echo "feedback removed" . mysqli_error($conn);
		exit;
	}
	header("Location: viewfeedbacks.php");	
}
?>	