<html>
<head>
<title></title>
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

	if($_SESSION['status'] != "admin")
	{
		echo "This page for User only!";
		exit();
	}	
	
	$ext = pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
	$new_image_name = 'img_'.uniqid().".".$ext;
	$image_path = '/images/';
	$upload_path = $_SERVER['DOCUMENT_ROOT'].'/images/'.$new_image_name;
	$suc = move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
	if(!$suc){
		echo "<script language='javascript'> alert('อัพโหลดรูปภาพไม่สำเร็จ'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
	}

	$image = $new_image_name;
  


  
Mysqli_set_charset($objCon, 'utf8');

	$sql2 = "INSERT INTO subject (subject_id,subject_name,credit,subject_group,ctgy,detail,FilesName) 
		VALUES ('".$_POST["subject_id"]."','".$_POST["subject_name"]."','".$_POST["credit"]."','".$_POST["subject_group"]."','".$_POST["ctgy"]."','".$_POST["detail"]."','$image')";
	
		
  

	$query = mysqli_query($objCon,$sql2);
	
	



		
		if($query) {
		echo "<meta http-equiv ='refresh'content='0;URL=admin_page.php'>";
	

	
}


	mysqli_close($objCon);
?>
</body>
</html>


