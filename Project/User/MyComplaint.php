<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_GET['did']))
{
	$del_qry="delete from tbl_complaint where complaint_id=".$_GET['did'];
	if($conn->query($del_qry))
	{
	?>
     <script>
	 alert("deleted")
	 window.location="MyComplaint.php"
	 </script>
	 <?php 
	}
		 else
		 {
	?>
     <script>
	 alert("failed")
	 window.location="MyComplaint.php"
	 </script>
	 <?php   
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
    <form action="" method="post">
        <table border="1" align="center" cellpadding="10">
               <tr>
                <th>Sl.No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Reply</th>
                <th>Action</th>
               </tr>
               <?php
               $sel="select * from tbl_complaint where user_id='".$_SESSION["uid"]."'";
               $data=$conn->query($sel);
               $i=0;
               while($row=$data->fetch_assoc())
               {
$i++;
               ?>
               <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row["complaint_title"]?></td>
                <td><?php echo $row["complaint_details"]?></td>
                <td><?php 
                if($row['complaint_status']==0){
                    echo "Admin Hasn't Reviewed your complaint.";
                }
                else{
                echo $row["complaint_replay"];
                }
                ?></td>
                <td><a href="MyComplaint.php?did=<?php echo $row["complaint_id"]?>">Delete</a></td>
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