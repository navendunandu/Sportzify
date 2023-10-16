<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
	$name=$_POST["txt_name"];
	$details=$_POST["txt_details"];
	$image = $_FILES['image']['name'];
	$tempimage = $_FILES['image']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/product/'.$image);
	$rate=$_POST["txt_rate"];
	$ins="insert into tbl_product(product_name,product_details,product_image,product_rate)values('".$name."','".$details."','".$image."','".$rate."')";
	echo $insQry;
if($conn->query($insQry))
		{
			?>
		 <script>
		 alert("inserted")
		 window.location="turf.php"
		 </script>
		 <?php   
		}
		else
		{
			?>
		 <script>
		 alert("failed")
		 window.location="turf.php"
		 </script>	
		 <?php
		}
}

if(isset($_GET['did']))
{
	$delQry= "delete from tbl_product where product_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		header('location:Product.php');
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
<?php 
include('head.php');

?>
</head>

<body>
<form method="post" enctype="multipart/form-data">
<table width="200" border="1">
  <tr>
    <td>NAME</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>DETAILS</td>
    <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5" required="required" autocomplete="off"></textarea></td>
  </tr>
  <tr>
    <td>IMAGE</td>
    <td>
      <label for="txt_image"></label>
      <input type="file" name="txt_image" id="txt_image" required="required" autocomplete="off"/>
    </td>
  </tr>
  <tr>
    <td>RATE</td>
    <td>
      <label for="txt_rate"></label>
      <input type="text" name="txt_rate" id="txt_rate" required="required" autocomplete="off"/>
   </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
  </tr>
</table>

    </form>
</body>
<?php 
include('foot.php');

?>
</html>