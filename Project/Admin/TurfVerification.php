<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
if(isset($_GET['aid']))
{
		 $updQry="update tbl_turf set turf_vstatus='1' where turf_id=".$_GET['aid'];
		if($conn->query($updQry))
		{
		?>
		 <script>
		 alert("Updated")
		 window.location="Turfverification.php"
		 </script>
		 <?php	
		}
		else{
			?>
		 <script>
		 alert("Failed")
		 window.location="Turfverification.php"
		 </script>
		 <?php	
		}
}
if(isset($_GET['rid']))
{
		 $updQry="update tbl_turf set turf_vstatus='2' where turf_id=".$_GET['rid'];
		if($conn->query($updQry))
		{
		?>
		 <script>
		 alert("Updated")
		 window.location="Turfverification.php"
		 </script>
		 <?php	
		}
		else{
			?>
		 <script>
		 alert("Failed")
		 window.location="Turfverification.php"
		 </script>
		 <?php	
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TurfVerification</title>
</head>

<body>
<form action="" method="post">
<table border="3" align="center" cellpadding="10">
  <tr>
    <td >SL NO</td>
    <td >TURF NAME</td>
    <td >EMAIL ID</td>
    <td >CONTACT</td>
    <td >ADDRESS</td>
    <td >DISTRICT</td>
    <td >PLACE</td>
    <td >PROOF</td>
    <td >LOGO</td>
    <td >ACTION</td>

  </tr>
  <?php
	$i=0;
	$selQry="select * from tbl_turf t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where turf_vstatus=0";
	
$res=$conn->query($selQry);
	while($row=$res->fetch_assoc())
	{
		?>
  <tr>
    <td><?php echo ++$i ?></td>
    <td><?php echo $row['turf_name'] ?></td>
    <td><?php echo $row['turf_email'] ?></td>
    <td><?php echo $row['turf_contact'] ?></td>
    <td><?php echo $row['turf_address'] ?></td>
    <td><?php echo $row['district_name'] ?></td>
    <td><?php echo $row['place_name'] ?></td>
    <td><a href="../Assets/Files/Turf/Proof/<?php echo $row['turf_proof'] ?>" target="_blank">Proof</a></td>
    <td><a href="../Assets/Files/Turf/logo/<?php echo $row['turf_logo'] ?>" target="_blank">logo</a></td>
   
    <td><a href="TurfVerification.php?aid=<?php echo $row['turf_id']?>">ACCEPT</a> | <a href="TurfVerification.php?rid=<?php echo $row['turf_id']?>">REJECT</a></td>
  </tr>
  <?php 
	}
	?>
</table>

</form>
<?php
include('foot.php');
ob_flush();
?>
</body>
</html>
