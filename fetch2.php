<?php


include ("connectdb.php");
session_start();
	if($_SESSION['std_id'] == "")
	{
		echo "Please Login!";
    echo "<meta http-equiv ='refresh'content='0;URL=index.html'>";
		exit();
	}

	if($_SESSION['status'] != "user")
	{
		echo "This page for User only!";
		exit();
	}	

		$id=$_POST['id'];
		//$id=$_GET['id'];
		$sql = "SELECT subject_std_id,subject_id,Grade,subject_type FROM subject_student WHERE subject_std_id = $id and std_id = '".$_SESSION['std_id']."'";
		$query = mysqli_query($objCon,$sql);

		$row=mysqli_fetch_array($query);
		echo json_encode($row);


?>