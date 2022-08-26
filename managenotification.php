<?php 
include('envs.php');
session_start();
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
if(isset($_GET['id'])){
$id=$_GET['id'];	
$result=mysqli_query($conn,"DELETE FROM notifications WHERE notificationid='$id'");
if($result){
	$_SESSION['open']='';	
	header("location:index.php");
}
}	
?>

<?php
if(isset($_GET['id1'])){
$id=$_GET['id1'];

$result1=mysqli_query($conn,"SELECT * FROM notifications WHERE notificationid='$id'");
if($result1){
	$row1=mysqli_fetch_assoc($result1);
	if($row1['notification_status']=='unread'){
	$result=mysqli_query($conn,"UPDATE notifications SET notification_status = 'read' WHERE notificationid='$id'");	
	if($result){
	$_SESSION['open']='';	
	header("location:index.php");	
	}	
	}else{
	$result=mysqli_query($conn,"UPDATE notifications SET notification_status = 'unread' WHERE notificationid='$id'");	if($result){
	$_SESSION['open']='';	
	header("location:index.php");	
	}	
	}
}	
}
?>