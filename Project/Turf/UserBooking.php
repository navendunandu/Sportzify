<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET['aid'])){
  $updQry="update tbl_booking set booking_status=".$_GET['status']." where booking_id=".$_GET['aid'];
  if($conn->query($updQry)){
    ?>
    <script>
      alert('Updated')
		 window.location="UserBooking.php"
      </script>
    <?php
  }
  else{
    ?>
    <script>
      alert('Failed')
		 window.location="UserBooking.php"
      </script>
    <?php
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
<table align="center" cellpadding="10" style="border-collapse:collapse">
  <tr>
    <td>SL.NO</td>
    <td>USERNAME</td>
    <td>TYPE</td> 
    <td>CONTACT</td>
    <td>DATE</td>
    <td>TIME</td>
    <td>ACTION</td>
  </tr>
  <?php
  $sel="select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id where b.turf_id='".$_SESSION["tid"]."' and booking_status>=1 ";
  $data=$conn->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
  $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["user_name"]?></td>
    <td><?php echo $row["type"]?></td>
    <td><?php echo $row["user_contact"]?></td>
    <td><?php echo $row["booking_date"]?></td>
    <td><?php echo $row["booking_time"]?></td>
    <td>
      <?php
      if($row['booking_status']==1){
        ?>
        <a href="userbooking.php?aid=<?php echo $row['booking_id']?>&&status=2">ACCEPT</a><br>
        <a href="userbooking.php?aid=<?php echo $row['booking_id']?>&&status=3">Reject</a>
        <?php
      }
      else if($row['booking_status']==2){
        echo "Payment Completed<br>";
        ?>
        <a href="userbooking.php?aid=<?php echo $row['booking_id']?>&&status=5">Check In</a><br>
        <a href="userbooking.php?aid=<?php echo $row['booking_id']?>&&status=6">Absent</a>
        <?php
      }
      else if($row['booking_status']==3){
        echo "Rejected";
      }
      else if($row['booking_status']==4){
        echo "User Cancelled";
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
<?php
include("Foot.php"); 
?>