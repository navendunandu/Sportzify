<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_save']))
{
	$name=$_POST['user_name'];
	$email=$_POST['user_email'];
	$address=$_POST['user_address'];
	$updQry="update tbl_user set user_name='".$_name."', user_email='".$_email."' where user_id=".$_SESSION['uid'];
	
}
$selQry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where user_id=".$_SESSION['uid'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
?>
<form action="" method="post">
<table align="center" cellpadding="10" style="border-collapse:collapse">
  <tr>
    <td width>name</td>
    <td width><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"  value="<?php echo $row['user_name'] ?>"required="required" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>email</td>
    <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place"value="<?php echo $row['user_email'] ?>"required="required" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>address</td>
    <td><label for="txt_address"></label>
      <label for="txt_area"></label>
      <textarea name="txt_area" id="txt_area" cols="45" rows="5"required="required" ><?php echo $row['user_address'] ?></textarea></td>
  </tr>
  <tr>
    <td>contact_number</td>
    <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"value="<?php echo $row['user_contact'] ?>"required="required" autocomplete="off"/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_save" id="btn_save" value="save" />
    </div></td>
    </tr>
</table>

</form>
</body>
</html>
<?php
include("Foot.php"); 
?>