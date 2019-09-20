<html>
<head>
<title>DELETE</title>
</head>
<body>
<?php
include ("connectdb.php");
	ini_set('display_errors', 1);
	error_reporting(~0);

	

	$subject_std_id = $_GET["subject_std_id"];
	$sql = "DELETE FROM subject_student
			WHERE subject_std_id = '".$subject_std_id."' ";

	$query = mysqli_query($objCon,$sql);
	

	if(mysqli_affected_rows($objCon)) {
		echo "<script language='javascript'> alert('ลบข้อมูลเรียบร้อย'); </script>";
		echo "<meta http-equiv ='refresh'content='0;URL=user_page.php'>";
	}


	mysqli_close($objCon);
?>
</body>
</html>