<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<form action="" method="post">
<table  border="5" align="center" cellpadding="10">
  <tr>
    <td>District</td>
    <td><label for="seldistrict"></label>
      <select name="seldistrict" id="seldistrict" onchange="getPlace(this.value)">
      <option value="">---Select---</option>
  <?php
	$selQryDist="select * from tbl_district";
	$res=$conn->query($selQryDist);
	while($row=$res->fetch_assoc())
	{
		?>
       <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name']?></option>
       <?php
	}
	?>      </select></td>
 
    <td>Place</td>
    <td><label for="selplace"></label>
      <select name="selplace" id="selplace" onchange="getTurf()">
      <option value="">---Select---</option>
      </select></td>
  </tr>
</table>
<table align="center" cellpadding="10" cellspacing="60" id="result">
<tr>
<?php
$sel="select * from tbl_turf u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where u.turf_vstatus=1";
$datas=$conn->query($sel);
$i=0;
while($rows=$datas->fetch_assoc())
{
	$i++;
?>
<td><p>
<img src="../Assets/Files/Turf/Logo/<?php echo $rows['turf_logo'] ?>" width="300px"  /><br />
<?php echo $rows['turf_name'] ?><br />
<?php echo $rows['turf_details'] ?><br />
<?php echo $rows['turf_address'] ?><br />
<?php
if($rows["turf_cricket"]!="")
{
	echo "Cricket Available <br>";
}
?>
<?php 
if($rows['turf_11s']=="" && $rows['turf_5s']=="" && $rows['turf_7s']==""){
	echo "Not Available";
}
else{
	echo "Football Available<br>";
	if($rows['turf_5s']!=""){
		echo "5's ";
	}
	if($rows['turf_7s']!=""){
		echo "7's ";
	}
	if($rows['turf_11s']!=""){
		echo "11's ";
	}
}



?>
<?php
										
											
										$average_rating = 0;
										$total_review = 0;
										$five_star_review = 0;
										$four_star_review = 0;
										$three_star_review = 0;
										$two_star_review = 0;
										$one_star_review = 0;
										$total_review_rating = 0;
										$review_content = array();
									
										$query = "SELECT * FROM tbl_review where turf_id = '".$rows["turf_id"]."' ORDER BY review_id DESC";
									
										$result = $conn->query($query);
									
										while($row = $result->fetch_assoc())
										{
											
									
											if($row["review_rating"] == '5')
											{
												$five_star_review++;
											}
									
											if($row["review_rating"] == '4')
											{
												$four_star_review++;
											}
									
											if($row["review_rating"] == '3')
											{
												$three_star_review++;
											}
									
											if($row["review_rating"] == '2')
											{
												$two_star_review++;
											}
									
											if($row["review_rating"] == '1')
											{
												$one_star_review++;
											}
									
											$total_review++;
									
											$total_review_rating = $total_review_rating + $row["review_rating"];
									
										}
										
										
										if($total_review==0 || $total_review_rating==0 )
										{
											$average_rating = 0 ; 			
										}
										else
										{
											$average_rating = $total_review_rating / $total_review;
										}
										
										?>
										<p align="center" style="color:#F96;font-size:20px">
									   <?php
									   if($average_rating==5 || $average_rating==4.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
										   <?php
									   }
									   if($average_rating==4 || $average_rating==3.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==3 || $average_rating==2.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==2 || $average_rating==1.5)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==1)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   if($average_rating==0)
									   {
										   ?>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
											<i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
										   <?php
									   }
									   echo "(".$total_review.")";
									   ?>
									   
									</p>
  

<br />
<a href="TurfBooking.php?tuf=<?php echo $rows["turf_id"]?>">Book Turf</a>
</p>
</td>
<?php
if($i%4==0)
{
	echo "</tr><tr>";
}
}
?>
</tr>
</table>
</form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#selplace").html(html);
			getTurf();
		}
	});
}
function getTurf()
{
	var did=document.getElementById("seldistrict").value;
	var pid=document.getElementById("selplace").value;
	$.ajax({
		url:"../Assets/AjaxPages/AjaxTurf.php?did="+did+"&pid="+pid,
		success: function(html){
			$("#result").html(html);
		}
	});
}
</script>

<?php
include("Foot.php"); 
?>