<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>
<form action="" method="post">
<table  border="1" align="center" cellpadding="10" style="border-collapse:collapse">
  <tr>
    <td>admin name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" autocomplete="off" /></td>
  </tr>
  <tr>
    <td>admin email</td>
    <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email"  required="required" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>admin password</td>
    <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" /></td>
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