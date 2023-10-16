<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
$selQry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where user_id=".$_SESSION['uid'];
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
<div align="center"> <h1>My Profile </h1></div>
<table align="center" cellpadding="10" style="border-collapse:collapse">
  <tr>
    <td colspan="2"><img src="../Assets/Files/User/Photo/<?php echo $row['user_photo'] ?>" width="300px"  /></td>
  </tr>
  <tr>
    <td >Name</td>
    <td ><?php echo $row['user_name'] ?></td>
  </tr>
  <tr>
    <td>email</td>
    <td><?php echo $row['user_email'] ?></td>
  </tr>
  <tr>
    <td>address</td>
    <td><?php echo $row['user_address'] ?></td>
  </tr>
  <tr>
    <td>contact number</td>
    <td><?php echo $row['user_contact'] ?></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="submit" name="btn_reset" id="btn_reset" value="Reset" />
    </div></td>
  </tr>
</table>
</body>
</html>
<?php
include("Foot.php"); 
?>