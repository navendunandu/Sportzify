<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$turfname=$_POST['txt_name'];
	$turfdetails=$_POST['txt_details'];
	$turfaddress=$_POST['txt_address'];
	$turfplaceid=$_POST['txt_place'];
	$turf5s=$_POST['radio5s'];
	$turf7s=$_POST['radio7s'];
	$turf11s=$_POST['radio11s'];
	$turfcricket=$_POST['radiocricket'];
	$turfdoe=$_POST['txt_doe'];
	$turfemail=$_POST['txt_email'];
	$turfpwd=$_POST['txt_password'];
	$turfcontact=$_POST['txt_contact'];
	$logo = $_FILES['logo']['name'];
	$tempphoto = $_FILES['logo']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/Turf/Logo/'.$logo);
	$proof = $_FILES['proof']['name'];
	$tempproof = $_FILES['proof']['tmp_name'];
	move_uploaded_file($tempproof,'../Assets/Files/Turf/Proof/'.$proof);
  $user="select * from tbl_user where user_email='".$_POST["txt_email"]."'";
  $uresult=$conn->query($user);
  
  $farmer="select * from tbl_turf where turf_email='".$_POST["txt_email"]."'";
  $fresult=$conn->query($farmer);
  
  
  
  $admin="select * from tbl_admin where admin_email='".$_POST["txt_email"]."'";
  $adminresult=$conn->query($admin);

  
  if($adminresult->num_rows>0 ||  $uresult->num_rows>0 || $fresult->num_rows>0  )
  {
    ?>
    <script>
        alert("Email Already Exist !!!");
        window.location="Turf.php";
        </script>
<?php
}
else
{	
	$insQry="insert into tbl_turf (turf_name,turf_details,turf_logo,turf_proof,turf_address,place_id,turf_5s,turf_7s,turf_11s,turf_cricket,turf_doe,turf_email, turf_password,turf_contact) values('".$turfname."','".$turfdetails."','".$logo."','".$proof."','".$turfaddress."','".$turfplaceid."','".$turf5s."','".$turf7s."','".$turf11s."','".$turfcricket."','".$turfdoe."','".$turfemail."','".$turfpwd."','".$turfcontact."')";
	echo $insQry;
if($conn->query($insQry))
		{
			?>
		 <script>
		 alert("inserted")
		 window.location="Turf.php"
		 </script>
		 <?php   
		}
		else
		{
			?>
		 <script>
		 alert("failed")
		 window.location="Turf.php"
		 </script>	
		 <?php
		}

  }  
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Turf</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
<table  border="5" align="center" cellpadding="10" style="margin-top: 200px;">
  <tr>
    <td >NAME</td>
    <td >
      <input type="text" name="txt_name" id="txt_area" required autocomplete="off"  class="form-control" /></td>
  </tr>
  <tr>
    <td>DETAILS</td>
    <td>
      <textarea name="txt_details" id="txt_details3" cols="45" rows="5" required class="form-control"></textarea></td>
  </tr>
  <tr>
    <td>LOGO</td>
    <td><label for="logo"></label>
      <input type="file" name="logo" id="logo" required  class="form-control" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>PROOF</td>
    <td><label for="proof"></label>
      <input type="file" name="proof" id="proof" required class="form-control"autocomplete="off"/></td>
  </tr>
  <tr>
    <td>ADDRESS</td>
    <td>
      <label for="txt_area"></label>
      <textarea name="txt_address" id="txt_area" cols="45" rows="5" required class="form-control"autocomplete="off"></textarea></td>
  </tr>
  <tr>
    <td>DISTRICT</td>
    <td><label for="district"></label>
      <select name="district" id="district" onChange="getPlace(this.value)" required class="form-control"autocomplete="off">
       <option value="">select district</option>
    <?php	
	$selQryDist="select * from tbl_district";
	$res=$conn->query($selQryDist);
	while($row=$res->fetch_assoc())
	{
		?>
       <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name']?></option>
       <?php
	}
	?>
      </select></td>
  </tr>
  <tr>
    <td>PLACE</td>
    <td><label for="place"></label>
      <select name="txt_place" id="txt_place" required=""autocomplete="off">
      <option value="">---Select---</option>
      </select></td>
  </tr>
  <tr>
    <td>5's</td>
    <td><input type="text" name="radio5s" id="btn_5's"  />
     </td>
  </tr>
  <tr>
    <td>7's</td>
    <td><input type="text" name="radio7s" id="btn_7's" />
    </td>
  </tr>
  <tr>
    <td>11's</td>
    <td><input type="text" name="radio11s" id="btn11's"  />
    </td>
  </tr>
  <tr>
    <td>CRICKET</td>
    <td><input type="text" name="radiocricket" id="btn_cricket"  />
    </td>
  </tr>
  <tr>
    <td>DOE</td>
    <td><label for="txt_doe"></label>
      <input type="date" name="txt_doe" id="txt_doe"  required="" autocomplete="off" class="form-control"/></td>
  </tr>
  <tr>
    <td>EMAIL</td>
    <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required autocomplete="off" class="form-control"/></td>
  </tr>
  <tr>
    <td>PASSWORD</td>
    <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password"  required="" autocomplete="off" class="form-control"/></td>
  </tr>
  <tr>
    <td>CONTACT	</td>
    <td><label for="txt_contact"></label>
      <input type="txt" name="txt_contact" id="txt_contact"  required="" autocomplete="off" class="form-control"/></td>
  </tr>

  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="save" />
        <input type="submit" name="txt_reset" id="txt_reset" value="reset" />
      </div></td>
    </tr>
</table>

</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#txt_place").html(html);
		}
	});
}
</script>
</html>
<br><br><br><br><br><br><br><br><br>
<?php 
include("Foot.php");
ob_flush();
?>