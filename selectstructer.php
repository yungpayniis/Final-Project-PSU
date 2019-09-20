<?php 
include("connectdb.php");
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
	$strSQL = "SELECT * FROM structerit_g ";
	$objQuery = mysqli_query($objCon,$strSQL);


?>