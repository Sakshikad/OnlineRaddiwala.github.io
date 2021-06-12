<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");
*/

$databaseHost = 'localhost';
$databaseName = 'db1';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	
?>
