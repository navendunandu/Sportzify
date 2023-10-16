<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_tbl"]))
{   
  $selQry="select * from tbl_booking where booking_date='".$_POST["txt_date"]."' and booking_time='".$_POST["txt_time"]."'";
   $data=$conn->query($selQry);
   if($res=$data->fetch_assoc())
   {
	   ?>
       <script>
	   alert('Turf is already booked!!') 
	   </script>
       <?php
   }
   else{  
	$insQry="insert into tbl_booking(booking_date,booking_time,turf_id,user_id,type) values('".$_POST["txt_date"]."','".$_POST["txt_time"]."','".$_GET['tuf']."','".$_SESSION["uid"]."','".$_POST["types"]."')";
if($conn->query($insQry))
		{
			?>
		 <script>
		 window.location="Payment.php"
		 </script>
		 <?php   
		}
		else
		{
			?>
		 <script>
		 alert("failed")
		 window.location="Homepage.php"
		 </script>	
		 <?php
		}
}
}
$sel="select * from tbl_turf where turf_id='".$_GET["tuf"]."'";
$data=$conn->query($sel);
$row=$data->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
<table border="5" align="center" cellpadding="10">
 <tr> 
    <td colspan="2" align="center"><img src="../Assets/Files/Turf/Logo/<?php echo $row['turf_logo'] ?>" width="300px"  /></td>
</tr>
  <tr> 
    <td><label for="txt_name">NAME</label></td>
    <td><?php echo $row["turf_name"]?></td>
</tr>
  <tr> 
    <td><label for="txt_address">ADDRESS</label></td>
    <td><?php echo $row["turf_address"]?></td>
    </tr>
   

  <tr>
    <td>BOOKING_DATE</td>
    <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" required autocomplete="off" /></td>
  </tr>
  <tr>
    <td>BOOKING_TIME</td>
    <td><label for="txt_time"></label>
      <input type="time" name="txt_time" id="txt_time" required autocomplete="off" /></td>  </tr>
  <tr>
    <td>BOOKING_TYPE</td>
    <td>
    <?php
	if($row["turf_5s"]!="")
	{
		?>
        <input type="radio" name="types" value="<?php echo $row["turf_5s"]?>" onclick='getPrice(this.value)' />5
        <?php
	}
	if($row["turf_7s"]!="")
	{
		?>
        <input type="radio" name="types" value="<?php echo $row["turf_7s"]?>" onclick='getPrice(this.value)' />7
        <?php
	}
	if($row["turf_11s"]!="")
	{
		?>
        <input type="radio" name="types" value="<?php echo $row["turf_11s"]?>" onclick='getPrice(this.value)' />11
        <?php
	}
  if($row["turf_cricket"]!="")
	{
		?>
        <input type="radio" name="types" value="<?php echo $row["turf_cricket"]?>" onclick='getPrice(this.value)' />Cricket
        <?php
	}
	 ?>
    
    </td>
  </tr>
  <tr>
    <td>BOOKING AMOUNT</td>
    <td><p id='amt'></p></td>
</tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_tbl" id="btn_tbl" value="Book Now" />
      <input type="submit" name="btn_tbll" id="btn_tbll" value="Cancel" />
      </div></td>
  </tr>
</table>

</form>
</body>
<script>
  function getPrice(amt)
  {
    // alert(amt)
    document.getElementById('amt').innerHTML=amt;
  }// Get today's date in the format "YYYY-MM-DD"
  const today = new Date().toISOString().split('T')[0];

// Set the min attribute of the input element to today's date
document.getElementById("txt_date").min = today;

  </script>
</html>
<?php
include("Foot.php"); 
?>