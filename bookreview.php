<?php
include("config.php");
include('envs.php');
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
if(isset($_POST['submitreview'])){
$review = trim($_POST['review']);
$review = mysqli_real_escape_string($conn, $review);
$rating = trim($_POST['rating']);
$rating = mysqli_real_escape_string($conn, $rating);	
$email=$_SESSION['email'];	
	
$isbn =trim($_POST['bookisbn']);
$isbn =mysqli_real_escape_string($conn, $isbn);
$date=date("Y.m.d");	
	
$finduser = "SELECT * FROM users WHERE user_email = '$email'";
		$findResult = mysqli_query($conn, $finduser);
		
		if(!$findResult){
			echo ('invalid user');
			}	
		else{
			$row = mysqli_fetch_assoc($findResult);
		    $username = $row['user_name'];
		}	
	

  /*  $query1 = "SELECT * FROM reviews WHERE user_name ='$username' AND book_isbn='$isbn'";  */
	$query1="SELECT * FROM reviews WHERE user_email = '$email' AND book_isbn='$isbn'";
	$findResult1 = mysqli_query($conn, $query1);
	
	if(mysqli_num_rows($findResult1)==0){
	$query = "INSERT INTO `reviews` (`user_email`, `review_id`, `user_name`, `book_isbn`, `rating`, `review`, `timestamp`) VALUES ('$email', '0', '$username', '$isbn', '$rating', '$review', '$date')";
	$result = mysqli_query($conn, $query);	
	if($result){
		$_SESSION['reviewsuccessful']='';
		echo '<script>location.replace(document.referrer);</script>';
	}	
		else{
		echo mysqli_error($conn);
		}	
		
	}
	else
	{	$_SESSION['reviewalreadysubmitted']='';
		echo '<script>location.replace(document.referrer);</script>';		
	}
	
	
		}
?>

