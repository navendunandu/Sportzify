<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpass'];
	$selTurf="select * from tbl_turf where turf_email='".$email."' and turf_password='".$password."'";
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$resTurf=$conn->query($selTurf);
	$resAdmin=$conn->query($selAdmin);
	$resUser=$conn->query($selUser);
	if($resAdmin->num_rows>0)
	{
		$row=$resAdmin->fetch_assoc();
		$_SESSION['aid']=$row['admin_id'];
		$_SESSION['aname']=$row['admin_name'];
		header('location: ../Admin/Homepage.php');
	}
	else if($resTurf->num_rows>0)
	{
		$row=$resTurf->fetch_assoc();
    if($row['turf_vstatus']==0){
      ?>
      <script>
        alert("Account Verification Pending!")
      </script>
      <?php
    }
    else if($row['turf_vstatus']==2){
      ?>
      <script>
        alert("Account Rejected!")
      </script>
      <?php
    } 
    else {
		$_SESSION['tid']=$row['turf_id'];
		$_SESSION['tname']=$row['turf_name'];
		header('location: ../Turf/Homepage.php');
  }
	}
	else if($resUser->num_rows>0)
	{
		$row=$resUser->fetch_assoc();
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['uname']=$row['user_name'];
		header('location: ../user/Homepage.php');
	}
	else
	{
		echo "Invalid Credential";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../Assets/Templates/Login/snakestyle.css">

</head>

<body>
  <div class="page">
    <div class="container">
      <div class="left">
        <div class="login">Login</div>
        <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
      </div>
      <div class="right">
        <svg viewBox="0 0 320 300">
          <defs>
            <linearGradient inkscape:collect="always" id="linearGradient" x1="13" y1="193.49992" x2="307" y2="193.49992"
              gradientUnits="userSpaceOnUse">
              <stop style="stop-color:#ff00ff;" offset="0" id="stop876" />
              <stop style="stop-color:#ff0000;" offset="1" id="stop878" />
            </linearGradient>
          </defs>
          <path
            d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
        </svg>
        <div class="form">
          <form method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="txtemail">
            <label for="password">Password</label>
            <input type="password" id="password" name="txtpass">
            <input type="submit" id="submit" name="btnlogin" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="../Assets/Templates/Login/snakescript.js"></script>

</html>