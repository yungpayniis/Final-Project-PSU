
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
	


	
	if(isset($_POST["g11"]) or isset($_POST["g12"]) or isset($_POST["g13"]) or isset($_POST["g14"]) or isset($_POST["g21"]) or isset($_POST["g22"]) or isset($_POST["g31"]) or isset($_POST["g32"])){

	if($_POST["g11"]==''or $_POST["g12"]==''or $_POST["g13"]==''or $_POST["g14"]==''
		or $_POST["g21"]==''or $_POST["g22"]==''or $_POST["g31"]==''or $_POST["g32"]=='')
{
	echo "<script language='javascript'> alert('กรุณากรอกข้อมูลให้ครบ'); </script>";
 echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
}
else{
	
	
	$strSQL = "UPDATE structerit_g SET ";
$strSQL .="g11 = '".mysqli_real_escape_string($objCon,$_POST["g11"])."' ";
$strSQL .=",g12 = '".mysqli_real_escape_string($objCon,$_POST["g12"])."' ";
$strSQL .=",g13 = '".mysqli_real_escape_string($objCon,$_POST["g13"])."' ";
$strSQL .=",g14 = '".mysqli_real_escape_string($objCon,$_POST["g14"])."' ";
$strSQL .=",g21 = '".mysqli_real_escape_string($objCon,$_POST["g21"])."' ";
$strSQL .=",g22 = '".mysqli_real_escape_string($objCon,$_POST["g22"])."' ";
$strSQL .=",g31 = '".mysqli_real_escape_string($objCon,$_POST["g31"])."' ";
$strSQL .=",g32 = '".mysqli_real_escape_string($objCon,$_POST["g32"])."' ";


//}
//else {
	//$sql = "INSERT INTO subject (subject_id,subject_name,credit,subject_type,subject_group) 
	//	VALUES ('".$_POST["sid"]."','".$_POST["sname"]."','".$_POST["scd"]."',
	//	'".$_POST["stype"]."','".$_POST["sgroup"]."')";


//}
	$query = mysqli_query($objCon,$strSQL);
	

	if($query) {
		echo "<script language='javascript'> alert('แก้ไขเรียบร้อย'); </script>";
echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
	
}
}
	mysqli_close($objCon);
}
else {
	if($_POST["g41"]==''or $_POST["g42"]==''or $_POST["g43"]==''or $_POST["g44"]==''or $_POST["g45"]==''or $_POST["g46"]=='')
{
	echo "<script language='javascript'> alert('กรุณากรอกข้อมูลให้ครบ'); </script>";
 echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
}
else{
	
	
	$strSQL = "UPDATE structerit_g SET ";
$strSQL .="g41 = '".mysqli_real_escape_string($objCon,$_POST["g41"])."' ";
$strSQL .=",g42 = '".mysqli_real_escape_string($objCon,$_POST["g42"])."' ";
$strSQL .=",g43 = '".mysqli_real_escape_string($objCon,$_POST["g43"])."' ";
$strSQL .=",g44 = '".mysqli_real_escape_string($objCon,$_POST["g44"])."' ";
$strSQL .=",g45 = '".mysqli_real_escape_string($objCon,$_POST["g45"])."' ";
$strSQL .=",g46 = '".mysqli_real_escape_string($objCon,$_POST["g46"])."' ";


//}
//else {
	//$sql = "INSERT INTO subject (subject_id,subject_name,credit,subject_type,subject_group) 
	//	VALUES ('".$_POST["sid"]."','".$_POST["sname"]."','".$_POST["scd"]."',
	//	'".$_POST["stype"]."','".$_POST["sgroup"]."')";


//}
	$query = mysqli_query($objCon,$strSQL);
	

	if($query) {
		echo "<script language='javascript'> alert('แก้ไขเรียบร้อย'); </script>";
echo "<meta http-equiv='refresh' content='0; url=admin_page.php'>";
	
}
}
	mysqli_close($objCon);
}
?>
