<?php
error_reporting(0);
session_start();
if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $isbn => $isbn) {
        if($_GET["item_id"] == $isbn)
        {
            unset($_SESSION["cart"][$isbn]);
			header("Location:cart.php");
        }
    }
}
?>