<?php
include('envs.php');
$conn=mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$request_id = $_GET['request_id'];
$result = mysqli_query($conn,"DELETE FROM bookrequests WHERE request_id = '$request_id'");
	if(!$result){
		echo "request removed" . mysqli_error($conn);
		exit;
	}
	header("Location: bookrequests.php");
?>	