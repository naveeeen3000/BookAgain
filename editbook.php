<?php
include('envs.php');
$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
	if(isset($_POST['submit'])) // when click on Update button
{
    
	$isbn = trim($_POST['isbn']);
	$title = trim($_POST['title']);
	$author = trim($_POST['author']);
	$descr = trim($_POST['descr']);
	$price = floatval(trim($_POST['price']));
	$publisher = trim($_POST['publisher']);	
	$category=trim($_POST['category']);	
	
	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "otherimages/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		
	if(isset($image)){
		$edit = mysqli_query($conn,"update books set book_title = '$title',book_author = '$author',book_descr = '$descr',book_price = '$price',book_image ='$image', publisher_name='$publisher', book_category ='$category' WHERE book_isbn = '$isbn'");
	}
		else{
		$edit = mysqli_query($conn,"update books set book_title = '$title',book_author = '$author',book_descr = '$descr',book_price = '$price', publisher_name='$publisher', book_category ='$category' WHERE book_isbn = '$isbn'");	
		}

	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:managebooks.php"); 
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }    	
}
?> 