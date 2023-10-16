<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RejectedTurf</title>
</head>
<body>
<form action="" method="post">
<table width="500" border="5">
  <tr>
    <td width="100">SL NO</td>
    <td width="160">TURF NAME</td>
    <td width="24">EMAIL ID</td>
    <td width="24">CONTACT</td>
    <td width="24">ADDRESS</td>
    <td width="24">DISTRICT</td>
    <td width="24">PLACE</td>
    <td width="24">PROOF</td>
    <td width="30">LOGO</td>
  </tr>
  <?php
	$i=0;
	$selQry="select * from tbl_turf t inner join tbl_place p on t.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where turf_vstatus=2";
	
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