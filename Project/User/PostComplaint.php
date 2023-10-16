<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btn_save'])){
  $title=$_POST['txt_title'];
  $content=$_POST['txt_details'];
  $insQry="insert into tbl_complaint(complaint_title,complaint_details,complaint_date,turf_id,user_id) values('".$title."','".$content."',curdate(),'".$_GET['tid']."','".$_SESSION['uid']."')";
  if($conn->query($insQry)){
    ?>
    <script>
      alert('Complaint Posted')
      </script>
      <?php
  }
  else{
    ?>
    <script>
      alert('Failed')
      </script>
      <?php
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
<table align="center" cellpadding="10" style="border-collapse:collapse">
<tr>
    <td>COMPLAINT TITLE</td>
    <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title"required="required" autocomplete="off"></td>
  </tr>
  <tr>
    <td>COMPLAINT DETAILS</td>
    <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"required="required" autocomplete="off"></textarea></td>
  </tr>
   <tr>
    <td height="36" colspan="2"><div align="center">
      <input type="submit" name="btn_save" id="btn_save" value="save" />
      <input type="submit" name="btn_table" id="btn_table" value="reset" />
    </div></td>
    </tr>
</table>

</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>