<?php
include('envs.php');
$conn=mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
$book_isbn = $_GET['id'];
$query = "DELETE FROM books WHERE book_isbn = '$book_isbn'";
$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: managebooks.php");
?>