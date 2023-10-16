<?php
session_start();
$_SESSION['tid']="";
session_destroy();
header("location:../Guest/Login.php");
?>