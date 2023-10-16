<?php
$_SESSION['aid']="";
session_destroy();
header("location:../Guest/Login.php");
?>