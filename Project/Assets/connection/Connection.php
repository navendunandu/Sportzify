<?php
$server="localhost";
$user="root";
$password="";
$database="db_sportzify";
$conn=mysqli_connect($server,$user,$password,$database);
if(!$conn)
{
	echo "connection error";
}
?>


