<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
if(isset($_POST["btn_save"]))
{
	$dis=$_POST["district"];
	$place=$_POST["txtplace"];
	$ins="insert into tbl_place(place_name,district_id)values('".$place."','".$dis."')";
	if($conn->query($ins))
	{
		echo "inserted";
	}
}

if(isset($_GET['did']))
{
	$delQry= "delete from tbl_place where place_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		header('location:Place.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<form action="" method="post" border="3" align="center" cellpadding="10" style="border-collapse:collapse">

<table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
  <tr>
    <td>District</td>
    <td><select name="district">
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
    <td>place</td>
    <td><input name="txtplace" type="text" required="required" autocomplete="off"/></td>
 </td>
  </tr>

  <tr>
    <td colspan="2" align="center">
      <input name="btn_save" type="submit" value="save" />
         <input type="reset" name="btn_cancel" id="button" value="cancel" />
      </td>
  </tr>
</table>
</form>

<table border="3" align="center" cellpadding="10" style="border-collapse:collapse">

  <tr>
    <td>SL_NO</td>
    <td>DISTRICT</td>
    <td>PLACE</td>
    <td>ACTION</td>
  </tr>
 
  <?php
  $selQry = "select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
  $row=$conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
	  $i++;
	?>
   <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['district_name']?></td>
    <td><?php echo $data['place_name'] ?></td>
    <td><a href="Place.php?did=<?php echo $data['place_id']?>">Delete</a></td>
  </tr>
    
    <?php
  }
	?>     
</table>

<?php
include('foot.php');
ob_flush();
?>
</body>
</html>