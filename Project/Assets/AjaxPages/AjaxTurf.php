<?php
include('../Connection/Connection.php');
?>
<table align="center" cellpadding="10" cellspacing="60" id="result">
<tr>
<?php
$sel="select * from tbl_turf u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where u.turf_vstatus=1";
if($_GET["pid"]!="")
{
	$sel.=" and u.place_id='".$_GET["pid"]."'";
}
if($_GET["did"]!="")
{
	$sel.=" and p.district_id='".$_GET["did"]."'";
}
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