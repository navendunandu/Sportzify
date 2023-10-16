<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
?>

<body>
<?php
$selQry="select * from tbl_turf where turf_id=".$_SESSION['tid'];
$res=$conn->query($selQry);
$row=$res->fetch_assoc();
if(isset($_POST['btn_save']))
{
	$turf_name=$_POST['txt_name'];
	$turf_address=$_POST['txt_address'];
	$turf_contact=$_POST['txt_contact'];
	$turf_details=$_POST['txt_details'];
	$updateQry="update tbl_turf set turf_name='".$turf_name."',turf_address='".$turf_address."',turf_contact='".$turf_contact."',turf_details='".$turf_details."' where turf_id=".$_SESSION['tid'];
	if($conn->query($updateQry))
	{
		header("location:MyProfile.php");
	}
}

?>

<form action="" method="post">
<table align="center" cellpadding="10" style="border-collapse:collapse">
  <tr>
    <td >name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $row['turf_name'] ?>"required="required" autocomplete="off" /></td>
  </tr>
  <tr>
    <td>address</td>
    <td><label for="txt_address"></label>
      <label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"required="required" ><?php echo $row['turf_address'] ?>
      </textarea></td>
  </tr>
  <tr>
    <td>contact_number</td>
    <td><label for="txt_contact"></label>
      <input type="number" name="txt_contact" id="txt_contact"value="<?php echo $row['turf_contact'] ?>" required="required" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>details</td>
    <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"required="required" ><?php echo $row['turf_details'] ?>
      </textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_save" id="btn_save" value="save" />
      <input type="submit" name="btn_reset" id="btn_reset" value="reset" />
    </div></td>
    </tr>
</table>

</form>
</body>
</html>
<?php
include("Foot.php"); 
?>