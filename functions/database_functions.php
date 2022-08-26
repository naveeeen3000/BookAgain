<?php
	include('envs.php');
	function db_connect(){
		$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}
  



	function getBookByIsbn($conn, $isbn){
		$query = "SELECT book_isbn, book_title, book_author, book_price, book_image FROM books WHERE book_isbn = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getOrderId($conn, $customerid){
		$query = "SELECT orderid FROM orders WHERE customerid = '$customerid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "retrieve data failed!" . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['orderid'];
	}

	function insertIntoOrder($conn, $customerid, $total_price, $date, $ship_name, $ship_address, $ship_city, $ship_zip_code, $ship_country){
		$query = "INSERT INTO orders VALUES 
		('', '" . $customerid . "', '" . $total_price . "', '" . $date . "', '" . $ship_name . "', '" . $ship_address . "', '" . $ship_city . "', '" . $ship_zip_code . "', '" . $ship_country . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert orders failed " . mysqli_error($conn);
			exit;
		}
	}

	function getbookprice($isbn){
		 $conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
		$query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "get book price failed! " . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['book_price'];
	}

	function getCustomerId($email, $name, $number, $address, $city, $zipcode, $country){
	    $conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
		$result2 = mysqli_query($conn, "SELECT customer_id from customer WHERE user_email='$email' AND name = '$name' AND number='$number' AND address= '$address' AND city = '$city' AND zipcode ='$zipcode' AND country = '$country'");
		// if there is customer in db, take it out
		if($result2){
			$row2 = mysqli_fetch_assoc($result2);
			return $row2['customerid'];
		} else {
			return null;
		}
	}

function setCustomerId($email, $name, $number, $address, $city, $zipcode, $country){
        $conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
	    $result1 = mysqli_query($conn, "INSERT INTO `customer` (`customer_id`, `user_email`, `name`, `number`, `address`, `city`, `zipcode`, `country`) VALUES ('0', '$email', '$name', '$number', '$address', '$city', '$zipcode', '$country')");
		if(!$result1){
			echo "insert false !" . mysqli_error($conn);
			exit;
		}
		$customerid = mysqli_insert_id($conn);
		return $customerid;
	}



	function getAll($conn){
		$query = "SELECT * from books ORDER BY book_isbn DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
?>