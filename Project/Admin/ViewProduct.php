<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["did"]))
{
    $delQry= "delete from tbl_product where product_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		header('location:ViewProduct.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
include('head.php');

?>
</head>
<body>
<table width="200" border="1">
  <tr>
    <td>SL_NO</td>
    <td>PRODUCT_NAME</td>
    <td>PRODUCT_DETAIL</td>
    <td>PRODUCT_RATE</td>
    <td>PRODUCT_IMAGE</td>
    <td>ACTION</td>
  </tr>
 <?php
  $sel="select*from tbl_product";
  $data=$conn->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
  $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["product_name"]?></td>
    <td><?php echo $row["product_detail"]?></td>
    <td><?php echo $row["product_rate"]?></td>
    <td><img src="../Assets/Files/product/<?php echo $row["product_image"]?>" width="120" height="120"/></td>
    <td><a href="ViewProduct.php?did=<?php echo $row['product_id']?>">Delete|<br><a href="Stock.php?pid=<?php echo $row['product_id']?>">Add stock</a></td>
  </tr>
  <?php
  }
  ?>
</table>  
<?php 
include('foot.php');

?> 
</body>
</html>