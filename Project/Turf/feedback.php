<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
session_start();
if(isset($_POST['btn_save'])){
  $title=$_POST['txt_title'];
  $description=$_POST['txt_description'];
  $insQry="insert into tbl_turffeedback(feedback_title,description,turf_id) values('".$title."','".$description."','".$_SESSION['tid']."')";
  if($conn->query($insQry)){
    ?>
    <script>
      alert('feedback Posted')
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
<table align="center" border="1" cellpadding="10" style="border-collapse:collapse">
<tr>
    <td>FEEDBACK TITLE</td>
    <td>
      <input type="text" name="txt_title" id="txt_title"required="required" autocomplete="off">
          </td>
  </tr>
  <tr>
    <td>DESCRIPTION</td>
    <td>
      <textarea name="txt_description" id="txt_description" cols="45" rows="5"required="required" autocomplete="off"></textarea></td>
        
  </tr>
   <tr>
    <td height="36" colspan="2"><div align="center">
      <input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="submit" name="btn_reset" id="btn_reset" value="Reset" />
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