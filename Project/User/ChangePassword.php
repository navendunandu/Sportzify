<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_save']))
{

    $selQry="select * from tbl_user where user_id=".$_SESSION['uid'];
	$res=$conn->query($selQry);
    $row=$res->fetch_assoc();
	
	$my_password=$row['txt_password'];
	$current_password=$_POST['txt_new_password'];
	$new_password=$_POST['txt_confirm_password'];
	$confirm_password=$_POST['txt_confirmpassword'];
	
	if($current_password==$my_password)
	{
		if($new_password==$confirm_password)
		{
			$updateQry="update tbl_user set user_password='".$new_password."' where user_id=".$_SESSION['uid'];
			if($conn->query($updateQry))
			{
				echo"updated";
			}
		}
		
			 else
			 {
				 echo"NOT MATCH";
			 }
		}
		else
		{
			echo"wrong password";
		}
    }

		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
<table align="center" cellpadding="10" style="border-collapse:collapse">
  <tr>
    <td width="241">current password</td>
    <td width="235"><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" required="required" autocomplete="off" /></td>
  </tr>
  <tr>
    <td>new password</td>
    <td><label for="txt_new_password"></label>
      <input type="text" name="txt_new password" id="txt_new password" required="required" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>confirm password</td>
    <td><label for="txt_confirm_password"></label>
      <input type="text" name="txt_confirm password" id="txt_confirm password"required="required" autocomplete="off" /></td>
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