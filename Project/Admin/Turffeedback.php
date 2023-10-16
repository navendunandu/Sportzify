<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_GET['did']))
{
	$del_qry="delete from tbl_turffeedback where feedback_id=".$_GET['did'];
	if($conn->query($del_qry))
	{
	?>
     <script>
	 alert("deleted")
	 window.location="Turffeedback.php"
	 </script>
	 <?php 
	}
		 else
		 {
	?>
     <script>
	 alert("failed")
	 window.location="Turffeedback.php"
	 </script>
	 <?php   
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Turffeedback</title>
</head>

<body>
<form action="Turffeedback.php" method="post">
        <table border="1" align="center" cellpadding="10">
  <tr>
    <td>Sl.no</td>
    <td>Title</td>
    <td>Description</td>
    <td>Action</td>

  </tr>
   <?php
               $sel="select * from tbl_Turffeedback where turf_id='".$_SESSION["tid"]."'";
               $data=$conn->query($sel);
               $i=0;
               while($row=$data->fetch_assoc())
               {
$i++;
               ?>
               <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row["feedback_title"]?></td>
                <td><?php echo $row["description"]?></td>
                <td><a href="Feedback.php?did=<?php echo $row["feedback_id"]?>">Delete</a></td>
               </tr>
               <?php
               }
               ?> 
        </table>
    </form>
</body>
</html>
<?php
include('Foot.php');
ob_flush();
?>
  <tr>
    <td><form id="form1" name="form1" method="post" action="Feedback.php">
      <label for="txt_description"></label>
      <input type="text" name="txt_description" id="txt_description" />
    </form></td>
    <td><form id="form2" name="form2" method="post" action="Feedback.php">
      <input type="submit" name="btn_delete" id="btn_delete" value="delete" />
    </form></td>

  </tr>
</table>
</body>
</html>