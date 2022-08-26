<?php
include('envs.php');
$hostname=getenv("HOSTNAME"); //local server name default localhost
$username=getenv("USERNAME");  //mysql username default is root.
$password=getenv("PASSWORD");       //blank if no password is set for mysql.
$database=getenv("DATABASE");  //database name which you created
$conn=mysql_connect($hostname,$username,$password);
if(!$conn)
{
die('Connection Failed'.mysql_error());
}

mysql_select_db($database,$conn);
?>