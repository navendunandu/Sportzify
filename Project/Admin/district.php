<?php
$distname="";
$distid=0;
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
if(isset($_POST['btnsave']))
{
	$districtid=$_POST['txtid'];
	$district=$_POST['txtdist'];
	if($districtid==0)
	{
		$insQry="insert into tbl_district (district_name) values('".$district."')";
		if($conn->query($insQry))
		{
			?>
		 <script>
		 alert("inserted")
		 window.location="district.php"
		 </script>
		 <?php   
		}
		else
		{
			?>
		 <script>
		 alert("failed")
		 window.location="district.php"
		 </script>	
		 <?php
		 }
	}
	else {
		$updQry="update tbl_turf s district_name='".$district."' where district_id=".$districtid;
		if($conn->query($updQry))
		{
			?>
		 <script>
		 alert("Updated")
		 window.location="Turfverification.php"
		 </script>
		 <?php   
		}
		else
		{
			?>
		 <script>
		 alert("failed")
		 window.location="district.php"
		 </script>	
		 <?php
		 }
	}
}
if(isset($_GET['did']))
{
	$del_qry="delete from tbl_district where district_id=".$_GET['did'];
	if($conn->query($del_qry))
	{
	?>
     <script>
	 alert("deleted")
	 window.location="district.php"
	 </script>
	 <?php 
	}
		 else
		 {
	?>
     <script>
	 alert("failed")
	 window.location="district.php"
	 </script>
	 <?php   
}
}
if(isset($_GET['eid']))
{
	$selQryE="select * from tbl_district where district_id=".$_GET['eid'];
	$resE=$conn->query($selQryE);
	$rowE=$resE->fetch_assoc();
	$distid=$rowE['district_id'];
	$distname=$rowE['district_name'];
}
?>
         
<title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="3" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>District</td>
      <td><label for="txtdist"></label>
      <input type="text" name="txtdist" id="txtdist" value="" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
      </div></td>
    </tr>
  </table>
<br>
  <table border="1" align="center" cellpadding="10">
    <tr>
      <td>Sl.No</td>
      <td>District</td>
      <td>Action</td>
    </tr>
    <?php
	$selQry="select * from tbl_district";
	$res=$conn->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		?>
		<tr>
      <td><?php echo ++$i ?></td>
      <td><?php echo $row['district_name'] ?></td>
      <td><a href="district.php?did=<?php echo $row['district_id']?>">Delete</a>
      <a href="district.php?eid=<?php echo $row['district_id']?>">Edit</a></td>
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