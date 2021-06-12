<?php

session_start();

$con = mysqli_connect('localhost','root','','db1');


mysqli_select_db($con,'session');

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$s = "select * from login where username = '$username'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){

echo "<script type='text/javascript'>alert('username already taken'); document.location = 'index.html'; </script>";}else{
	$reg= " insert into login(username , password , email) values ('$username' , '$password' , '$email')";
	mysqli_query($con, $reg);
		
	// header('location:pickup.html');
	echo "<script type='text/javascript'>alert('Registration Successfull'); document.location = 'login.html'; </script>";
}
?>
