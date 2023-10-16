<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_GET['bid']))
{
		 $updQry="update tbl_booking set booking_status=4 where booking_id=".$_GET['bid'];
		if($conn->query($updQry))
		{
		?>
		 <script>
		 alert("Cancelled")
		 window.location="MyBooking.php"
		 </script>
		 <?php	
		}
		else{
			?>
		 <script>
		 alert("Failed")
		 window.location="MyBooking.php"
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
    <td>TURFNAME</td>
    <td>TYPE</td>
    <td>CONTACT</td>
    <td>DATE</td>
    <td>TIME</td>
    <td>STATUS</td>
    <td>ACTION</td>
  </tr>
  <?php
  $sel="select * from tbl_booking b inner join tbl_turf t on t.turf_id=b.turf_id where b.user_id='".$_SESSION["uid"]."' and booking_status>0 ";
  $data=$conn->query($sel);
  $i=0;
  while($row=$data->fetch_assoc())
  {
  $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $row["turf_name"]?></td>
    <td><?php echo $row["type"]?></td>
    <td><?php echo $row["turf_contact"]?></td>
    <td><?php echo $row["booking_date"]?></td>
    <td><?php echo $row["booking_time"]?></td>
    <td>
		<?php
		if($row["booking_status"]==1){
			echo "Payment Completed<br>Waiting for Turf Approval";
		}
		else if($row["booking_status"]==2){
			echo "Turf slot Booked";
		}
		else if($row["booking_status"]==3){
			echo "Booking Rejected<br>Will get the refund in 7 working days";
		}
		else if($row["booking_status"]==4){
			echo "Cancelled";
		}
		else if($row["booking_status"]==5){
			echo "Completed";
		}
		else if($row["booking_status"]==6){
			echo "Absent";
		}
		?>
	</td>
    <td>
	<?php
		if($row["booking_status"]==1 || $row["booking_status"]==2){
			?>
			<a href="MyBooking.php?bid=<?php echo $row["booking_id"]?>">Cancel</a>
			<?php
		}
		else if($row["booking_status"]==5){
			?>
			<a href="TurfRating.php?tid=<?php echo $row["turf_id"]?>">Review</a><br>
			<a href="PostComplaint.php?tid=<?php echo $row["turf_id"]?>">Complaint</a>
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
<?php
include("Foot.php"); 
?>