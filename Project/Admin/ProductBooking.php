<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProductBooking</title>
</head>

<body>
<?php
if(isset($_GET["cid"]))
{

$upQry="update tbl_cart set cart_status='".$_GET["status"]."' where cart_id='".$_GET["cid"]."'";
$conn->query($upQry);
header("location:ProductBooking.php");

}


?>
    <br><br>
<table width="200" border="1" align="center">
  <tr>
    <th>SL_NO</th>
    <th>PRODUCT</th>
    <th>IMAGE</th>
    <th>QUANTITY</th>
    <th>AMOUNT</th>
    <th>USERNAME</th>
    <th>ADDRESS</th>
    <th>CONTACT</th>
    <th>STATUS</th>
  </tr>
   <?php
  $sel="select * from tbl_cart c inner join tbl_pbook b on b.booking_id=c.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_user u on u.user_id=b.user_id where b.booking_status>=1" ;
  $data=$conn->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
  $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["product_name"]?></td>
    <td><img src="../Assets/Files/Product/<?php echo $row['product_image'] ?>" width="150" height="150"></td>
    <td><?php echo $row["cart_quantity"]?></td>
    <td>Rs.<?php echo $row["booking_amount"]?></td>
    <td><?php echo $row["user_name"]?></td>
    <td><?php echo $row["user_address"]?></td>
    <td><?php echo $row["user_contact"]?></td>
    <td>
		<?php
		if($row["booking_status"]==1&&$row["cart_status"]==1)
    {
      echo "Booking Completed ";
    }
    else if($row["booking_status"]==2&&$row["cart_status"]==1)
    {
      echo "Product Ordered & paid";
      ?>
<a href="ProductBooking.php?cid=<?php  echo $row["cart_id"] ?>&&status=2">Packed</a>
      <?php
    }
    else if($row["booking_status"]==2&&$row["cart_status"]==2)
    {
      echo "Product Packed";
      ?>
<a href="ProductBooking.php?cid=<?php  echo $row["cart_id"] ?>&&status=3">Shipped</a>
      <?php
    }
    else if($row["booking_status"]==2&&$row["cart_status"]==3)
    {
      echo "Product Shipped";
      ?>
<a href="ProductBooking.php?cid=<?php  echo $row["cart_id"] ?>&&status=4">Delivered</a>
      <?php
    }else if($row["booking_status"]==2&&$row["cart_status"]==4)
    {
      echo "Product Delivered";
      
    }
		?>
  </td>
  </tr>
  <?php
  }
  ?>
</table>
</body>
</html>