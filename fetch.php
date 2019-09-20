<?php


include ("connectdb.php");
		$id=$_POST['id'];
		//$id=$_GET['id'];
		$sql = "select subject_id,subject_name,credit,subject_group,ctgy from subject where subject_id = $id";
		$query = mysqli_query($objCon,$sql);

		$row=mysqli_fetch_array($query);
		echo json_encode($row);


?>