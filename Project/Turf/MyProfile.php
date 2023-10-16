<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
$selQry="select * from tbl_turf u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where turf_id=".$_SESSION['tid'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>My Profile</h1>
<table width="500" border="5">
  <tr>
    <td colspan="2"><img src="../Assets/Files/Turf/Logo/<?php echo $row['turf_logo'] ?>" width="300px"  /></td>
  </tr>
  <tr>
    <td width="242">Name</td>
    <td width="234"><?php echo $row['turf_name'] ?></td>
  </tr>
  <tr>
    <td>place</td>
    <td><?php echo $row['place_name'] ?></td>
  </tr>
  <tr>
    <td>district</td>
    <td><?php echo $row['district_name'] ?></td>
  </tr>
  <tr>
    <td>address</td>
    <td><?php echo $row['turf_address'] ?></td>
  </tr>
  <tr>
    <td>contact number</td>
    <td><?php echo $row['turf_contact'] ?></td>
  </tr>
  <tr>
    <td colspan="2"><a href="Edit_Profile.php">edit Profile</a>&nbsp;
    <a href="ChangePassword.php">Change Password</a></td>
  </tr>
</table>
</body>
</html>
<?php
include("Foot.php"); 
?>