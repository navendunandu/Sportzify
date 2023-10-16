<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <br><br>
<table width="200" border="1" align="center">
  <tr>
    <td>SL_NO</td>
    <td>PRODUCT</td>
    <td>IMAGE</td>
    <td>QUANTITY</td>
    <td>AMOUNT</td>
    <td>DETAILS</td>
    <td>STATUS</td>
  </tr>
   <?php
  $sel="select * from tbl_cart c inner join tbl_pbook b on b.booking_id=c.booking_id inner join tbl_product p on p.product_id=c.product_id where b.user_id='".$_SESSION["uid"]."' and b.booking_status>=1" ;
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
    <td><?php echo $row["product_detail"]?></td>
        <td>
		<?php
		if($row["booking_status"]==1&&$row["cart_status"]==1)
    {
      echo "Booking Completed ";
    }
    else if($row["booking_status"]==2&&$row["cart_status"]==1)
    {
      echo "Product Ordered & paid";
     
    }
    else if($row["booking_status"]==2&&$row["cart_status"]==2)
    {
      echo "Product Packed";
      
    }
    else if($row["booking_status"]==2&&$row["cart_status"]==3)
    {
      echo "Product Shipped";
     
    }else if($row["booking_status"]==2&&$row["cart_status"]==4)
    {
      echo "Product Delivered";
      ?>
      <a href="ProductRating.php?pid=<?php echo $row["product_id"]?>">Rate Now</a>
      <?php
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