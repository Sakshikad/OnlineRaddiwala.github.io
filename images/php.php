<?php
$dbhost='localhost';
$user='root';
$pass='';
$db='db1';
mysql_connect("$dbhost","$user","$pass","$db");
#$db=new mysqli('localhost',$user,$pass,$db) or die("Unable to connect");
echo"Great Work";




?>