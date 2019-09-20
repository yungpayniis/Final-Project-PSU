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

	if($_SESSION['status'] != "user")
	{
		echo "This page for User only!";
		exit();
	}
	


	Mysqli_set_charset($objCon, 'utf8');
	

	if($_POST["sid"]==''or $_POST["sgrade"]==''or $_POST["stype"]=='')



{
	echo "<script language='javascript'> alert('กรุณากรอกข้อมูลให้ครบ'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}
else{

	if($_POST["sgrade"]=='A' or $_POST["sgrade"]=='B' or $_POST["sgrade"]=='B+' or $_POST["sgrade"]=='C' or $_POST["sgrade"]=='C+' or $_POST["sgrade"]=='D' or $_POST["sgrade"]=='D+'){

	
	
	$strSQL = "UPDATE subject_student SET ";
$strSQL .="subject_std_id = '".mysqli_real_escape_string($objCon,$_POST["sid"])."' ";
$strSQL .=",std_id = '".mysqli_real_escape_string($objCon,$_SESSION['std_id'])."' ";
$strSQL .=",subject_id = '".mysqli_real_escape_string($objCon,$_POST["sid"])."' ";
$strSQL .=",Grade = '".mysqli_real_escape_string($objCon,$_POST["sgrade"])."' ";
$strSQL .="WHERE subject_std_id = '".mysqli_real_escape_string($objCon,$_POST["sid"])."' ";
//}
//else {
	//$sql = "INSERT INTO subject (subject_id,subject_name,credit,subject_type,subject_group) 
	//	VALUES ('".$_POST["sid"]."','".$_POST["sname"]."','".$_POST["scd"]."',
	//	'".$_POST["stype"]."','".$_POST["sgroup"]."')";


//}
	$query = mysqli_query($objCon,$strSQL);
	

	if($query) {
		echo "<script language='javascript'> alert('แก้ไขเรียบร้อย'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
	
}

}else {echo "<script language='javascript'> alert('กรุณากรอกเกรดให้ถูกต้อง'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";}
}
	mysqli_close($objCon);
?>
</body>
</html>