<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["txt_button"]))
{
	$user_name=$_POST['txt_name'];
	$user_email=$_POST['txt_email'];
	$user_place=$_POST['selplace'];
	$user_password=$_POST['txt_password'];
	$user_address=$_POST['txt_address'];
	$user_contact=$_POST['txt_phonenumber'];
	$user_dob=$_POST['txt_dob'];
	$user_photo = $_FILES['txt_photo']['name'];
	$tempphoto=$_FILES['txt_photo']['tmp_name'];
	move_uploaded_file($tempphoto,'../Assets/Files/User/Photo/'.$user_photo);
	// echo $user_contact;
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
        window.location="UserRegitration.php";
        </script>
<?php
}
else
{
	$insQry="insert into tbl_user (user_name,user_email,user_password,user_address,user_contact,user_photo,user_dob,place_id) values('".$user_name."','".$user_email."','".$user_password."','".$user_address."','".$user_contact."','".$user_photo."','".$user_dob."','".$user_place."')";

$conn->query($insQry);
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
<form action="" method="post" enctype="multipart/form-data">
<table border="5" style="margin-top: 200px;" align="center">
  <tr>
    <td>NAME</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" class="form-control" required=""  autocomplete="off"/></td>
  </tr>
  <tr>
    <td>EMAIL</td>
    <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" class="form-control" required="" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>District</td>
    <td><label for="seldistrict"></label>
      <select name="seldistrict" id="seldistrict" onchange="getPlace(this.value)" class="form-control" required="required"autocomplete="off" >
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
  </tr>
  <tr>
    <td>Place</td>
    <td><label for="selplace"></label>
      <select name="selplace" id="selplace" class="form-control" required="required"autocomplete="off">
      <option value="">---Select---</option>
      </select></td>
  </tr>
  <tr>
    <td>PASSWORD</td>
    <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password"  class="form-control"required="required"autocomplete="off"/></td>
  </tr>
  <tr>
    <td>ADDRESS</td>
    <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5" class="form-control"required="required"autocomplete="off"></textarea></td>
  </tr>
  <tr>
    <td>CONTACT</td>
    <td><label for="txt_phonenumber"></label>
      <input type="text" name="txt_phonenumber" id="txt_phonenumber"  class="form-control" required="" autocomplete="off" pattern="[0-9]{10,10}"/></td>
  </tr>
  <tr>
    <td>PHOTO</td>
    <td><label for="txt_photo"></label>
      <input type="file" name="txt_photo" id="txt_photo"  class="form-control"required="required"autocomplete="off"/></td>
  </tr>
  <tr>
    <td>DOB</td>
    <td><label for="txt_dob"></label>
      <input type="date" name="txt_dob" id="txt_dob" class="form-control" required="required" autocomplete="off" onchange="checkAge(this.value)"/>
<span id="ageError" style="color: red;"></span></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="txt_button" id="txt_button" value="Save" class="btn-sucess"/>
      <input type="submit" name="button" id="button" value="Reset" />
    </div></td>
    </tr>
</table>
<label for="user_photo"></label>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#selplace").html(html);
		}
	});
}
function checkAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();

    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    if (age <= 6) {
        document.getElementById("ageError").innerHTML = "You must be older than 6 years.";
        document.getElementById("txt_dob").value = "";
    } else {
        document.getElementById("ageError").innerHTML = "";
    }
}
</script>
</html>
<br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php"); 
ob_flush();
?>