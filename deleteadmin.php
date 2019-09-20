<html>
<head>
<title>DELETE</title>
</head>
<body>
<?php
include ("connectdb.php");
	ini_set('display_errors', 1);
	error_reporting(~0);
	session_start();
	if($_SESSION['std_id'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['status'] != "admin")
	{
		echo "This page for Admin only!";
		exit();
	}	

	

	$subject_id = $_GET["subject_id"];
	$sql = "DELETE FROM subject
			WHERE subject_id = '".$subject_id."' ";

	$query = mysqli_query($objCon,$sql);
	

	if(mysqli_affected_rows($objCon)) {
		echo "<script language='javascript'> alert('ลบข้อมูลเรียบร้อย'); </script>";
		echo "<meta http-equiv ='refresh'content='0;URL=admin_page.php'>";
	}


	mysqli_close($objCon);
?>
</body>
</html>