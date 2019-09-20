<html>
<head>
<title>DELETE</title>
</head>
<body>
<?php
include ("connectdb.php");

session_start();
	if($_SESSION['std_id'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['status'] != "user")
	{
		echo "This page for User only!";
		exit();
	}	
	ini_set('display_errors', 1);
	error_reporting(~0);

	

	$subject_rating_id = $_GET["subject_rating_id"];

	
	$sql = "DELETE FROM rating_star
			WHERE subject_rating_id = '".$subject_rating_id."' and std_id = '".$_SESSION["std_id"]."'";

	$query = mysqli_query($objCon,$sql);


	if(mysqli_affected_rows($objCon)) {
		
		echo "<meta http-equiv ='refresh'content='0;URL=user_page.php'>";
	}

	


	mysqli_close($objCon);
?>
</body>
</html>