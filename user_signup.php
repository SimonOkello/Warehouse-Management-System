<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$category = $_POST['category'];
if ($category=="employee") {
	
$sql = "INSERT INTO `employees` (`user_id`, `firstname`, `lastname`, `address`,`username`, `password`, `phone`) VALUES (NULL,'$firstname','$lastname','$address','$username','$password','$phone')";
$query = mysql_query($sql)or die(mysql_error());
if($query){
	echo 'true';
}else{
	echo 'false';
}
}elseif ($category=="customer") {
	
$sql = "INSERT INTO `customers` (`user_id`, `firstname`, `lastname`, `address`,`username`, `password`, `phone`) VALUES (NULL,'$firstname','$lastname','$address','$username','$password','$phone')";
$query = mysql_query($sql)or die(mysql_error());
if($query){
	echo 'true';
}else{
	echo 'false';
}
}elseif ($category=="supplier") {
	
$sql = "INSERT INTO `suppliers` (`user_id`, `firstname`, `lastname`, `address`,`username`, `password`, `phone`) VALUES (NULL,'$firstname','$lastname','$address','$username','$password','$phone')";
$query = mysql_query($sql)or die(mysql_error());
if($query){
	echo 'true';
}else{
	echo 'false';
}
}
?>