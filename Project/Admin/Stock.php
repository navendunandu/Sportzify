<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$quantity=$_POST["txt_quantity"];
	$ins="insert into tbl_stock(stock_quantity,stock_date,product_id)values('".$quantity."',curdate(),'".$_GET["pid"]."')";
if($conn->query($ins))
	{
		echo "inserted";
	}
}
if(isset($_GET['did']))
{
	$delQry= "delete from tbl_stock where stock_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		header('location:ViewProduct.php');
	}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock</title>
</head>

<body>
<?php 
include('head.php');

?>
<form id="form1" name="form1" method="post" action="">
<table width="200" border="1">
  <tr>
    <td>QUANTITY</td>
    <td>
      <label for="txt_quantity"></label>
      <input type="text" name="txt_quantity" id="txt_quantity" required="required" autocomplete="off"/>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="200" border="1">
  <tr>
    <td>Sl.no</td>
    <td>Stock</td>
    <td>Action</td>
  </tr>
  <?php
  $sel="select * from tbl_stock where product_id='".$_GET["pid"]."'";
  $data=$conn->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
  $i++;
  ?>
  <tr>
    <td><?php echo $i  ?></td>
    <td><?php echo $row["stock_quantity"] ?></td>
    <td><a href="Stock.php?did=<?php  echo $row["stock_id"]?>">Delete</a></td>
  </tr>
   <?php
  }
  ?>
</table>
</form>
</body>
<?php 
include('foot.php');

?>
</html>