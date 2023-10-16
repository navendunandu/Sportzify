<?php
include('../Assets/Connection/Connection.php');
// session_start();
ob_start();
include('head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints</title>
</head>

<body>
<form action="" method="post">
<table border="3" align="center" cellpadding="10">
  <tr>
    <td >SL NO</td>
    <td >TITLE</td>
    <td >DETAIL</td>
    <td >USERID</td>
    <td >TURFID</td>
    <td >REPLY</td>
    <td >ACTION</td>
  </tr>
  <?php
	$i=0;
	$selQry="select * from tbl_complaint c inner join tbl_turf t on t.turf_id=c.turf_id  inner join tbl_user u on u.user_id=c.user_id";
$res=$conn->query($selQry);
	while($row=$res->fetch_assoc())
	{
		?>
  <tr>
    <td><?php echo ++$i ?></td>
    <td><?php echo $row['complaint_title'] ?></td>
    <td><?php echo $row['complaint_details'] ?></td>
    <td><?php echo $row['user_name'] ?></td>
    <td><?php echo $row['turf_name'] ?></td>
    <td><?php echo $row['complaint_replay'] ?></td>
    <td><a href="Reply.php?aid=<?php echo $row['complaint_id']?>">ACTION</a></td>
  </tr> 
  <?php
    }
    ?>
    </table>
  </form>
</body>
<?php
include('foot.php');
ob_flush();
?>
</html>