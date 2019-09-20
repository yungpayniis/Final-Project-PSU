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
	$exts = pathinfo(basename($_FILES['image2']['name']),PATHINFO_EXTENSION);
	$new_image_name = 'img_'.uniqid().".".$exts;
	$image_path = '/index/images/';
	$upload_path = $_SERVER['DOCUMENT_ROOT'].'/index/images/'.$new_image_name;
	$suc = move_uploaded_file($_FILES['image2']['tmp_name'], $upload_path);
	if(!$suc){
		echo "<script language='javascript'> alert('อัพโหลดรูปภาพไม่สำเร็จ'); </script>";
		echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
	}

	$image = $new_image_name;


	Mysqli_set_charset($objCon, 'utf8');
	

	if($_POST["sid"]==''or $_POST["sname"]==''or $_POST["scd"]==''or $_POST["sgroup"]==''or $_POST["ctgy"]==''or $_POST["detail"]==''or $image=='')
{
	echo "<script language='javascript'> alert('กรุณากรอกข้อมูลให้ครบ'); </script>";
echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
}
else{
	
	
	$strSQL = "UPDATE subject SET ";
$strSQL .="subject_id = '".mysqli_real_escape_string($objCon,$_POST["sid"])."' ";
$strSQL .=",subject_name = '".mysqli_real_escape_string($objCon,$_POST["sname"])."' ";
$strSQL .=",credit = '".mysqli_real_escape_string($objCon,$_POST["scd"])."' ";
$strSQL .=",subject_group = '".mysqli_real_escape_string($objCon,$_POST["sgroup"])."' ";
$strSQL .=",ctgy = '".mysqli_real_escape_string($objCon,$_POST["ctgy"])."' ";
$strSQL .=",detail = '".mysqli_real_escape_string($objCon,$_POST["detail"])."' ";
$strSQL .=",Filesname = '$image' ";
$strSQL .="WHERE subject_id = '".mysqli_real_escape_string($objCon,$_POST["sid"])."' ";

	$query = mysqli_query($objCon,$strSQL);
	

	if($query) {
		echo "<script language='javascript'> alert('แก้ไขเรียบร้อย'); </script>";
echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
	
}
}
	mysqli_close($objCon);
?>
</body>
</html>