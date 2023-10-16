<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
if(isset($_POST['btnsave']))
{
	
		$updQry="update tbl_complaint set complaint_replay='".$_POST["txtreply"]."', complaint_status=1 where complaint_id=".$_GET["aid"];
		if($conn->query($updQry))
		{
			?>
		 <script>
		 alert("Updated")
		 window.location="Complaints.php"
		 </script>
		 <?php   
		}
		else
		{
			?>
		 <script>
		 alert("failed")
		 window.location="Complaints.php"
		 </script>	
		 <?php
		 }
	
}
         
?>
<title>Reply</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="3" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Reply</td>
      <td><label for="txtreply"></label>
      <input type="text" name="txtreply" id="txtreply" value="" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
      </div></td>
    </tr>
  </table>
</form>
<?php
include('foot.php');
ob_flush();
?>
</body>
</html>