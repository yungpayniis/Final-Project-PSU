<?php
include ("connectdb.php");
session_start();
	if($_SESSION['std_id'] == "")
	{
			echo "<script language='javascript'> alert('กรุณาเข้าสู่ระบบ'); </script>";
echo "<meta http-equiv='refresh' content='0; url=index.html'>";
	}

	if($_SESSION['status'] != "user")
	{
			echo "<script language='javascript'> alert('สำหรับนักศึกษาเท่านั้น'); </script>";
echo "<meta http-equiv='refresh' content='0; url=index.html'>";
	}	


	$sqlyear = " SELECT year_structer FROM student WHERE std_id = '".$_SESSION['std_id']."' ";
	$rsyear = mysqli_query($objCon,$sqlyear);
	while ($objResult = mysqli_fetch_array($rsyear)) {
		$years = $objResult['year_structer'];
	}
	if($years != "2545")
	{
		
		echo "<script language='javascript'> alert('สำหรับผู้ที่มีโครงสร้างหลักสูตร 2545 เท่านั้น'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
	}

	else if ($years != "2557") {
		# code...
	



if($_POST["1100"]!= 'x'){

	$strSQL = "SELECT subject_ct_id FROM credit_transfer_std WHERE subject_ct_id_std = '".$_POST["1100"]."' and std_id = '".$_SESSION['std_id']."'  ";
	

$res = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res);

 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["1100"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{
	

	

	$sql = "INSERT INTO credit_transfer_std (subject_ct_id_std,subject_ct_id,std_id,year) 
		VALUES ('".$_POST["1100"]."','".$_POST["1100"]."','".$_SESSION['std_id']."','2545')";

	$query = mysqli_query($objCon,$sql);

	
}
}

if($_POST["1200"]!= 'x'){

	$strSQL = "SELECT subject_ct_id FROM credit_transfer_std WHERE subject_ct_id_std = '".$_POST["1200"]."' and std_id = '".$_SESSION['std_id']."'  ";
	



$res2 = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res2);

 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["1200"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{
	

	

	$sql = "INSERT INTO credit_transfer_std (subject_ct_id_std,subject_ct_id,std_id,year) 
		VALUES ('".$_POST["1200"]."','".$_POST["1200"]."','".$_SESSION['std_id']."','2545')";

	$query = mysqli_query($objCon,$sql);

	
}
}

if($_POST["1300"]!= 'x'){

	$strSQL = "SELECT subject_ct_id FROM credit_transfer_std WHERE subject_ct_id_std = '".$_POST["1300"]."' and std_id = '".$_SESSION['std_id']."'  ";
	

$res3 = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res3);

 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["1300"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{
	

	

	$sql = "INSERT INTO credit_transfer_std (subject_ct_id_std,subject_ct_id,std_id,year) 
		VALUES ('".$_POST["1300"]."','".$_POST["1300"]."','".$_SESSION['std_id']."','2545')";

	$query = mysqli_query($objCon,$sql);

	
}
}

if($_POST["1600"]!= 'x'){

	$strSQL = "SELECT subject_ct_id FROM credit_transfer_std WHERE subject_ct_id_std = '".$_POST["1600"]."' and std_id = '".$_SESSION['std_id']."'  ";


$res4 = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res4);

 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["1600"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{
	

	

	$sql = "INSERT INTO credit_transfer_std (subject_ct_id_std,subject_ct_id,std_id,year) 
		VALUES ('".$_POST["1600"]."','".$_POST["1600"]."','".$_SESSION['std_id']."','2545')";

	$query = mysqli_query($objCon,$sql);

	
}
}

if($_POST["1220"]!= 'x'){

	$strSQL = "SELECT subject_ct_id FROM credit_transfer_std WHERE subject_ct_id_std = '".$_POST["1220"]."' and std_id = '".$_SESSION['std_id']."'  ";
	

$res5 = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res5);

 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["1220"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{
	

	

	$sql = "INSERT INTO credit_transfer_std (subject_ct_id_std,subject_ct_id,std_id,year) 
		VALUES ('".$_POST["1220"]."','".$_POST["1220"]."','".$_SESSION['std_id']."','2545')";

	$query = mysqli_query($objCon,$sql);

	
}
}

if($_POST["1400"] != 'x'){

	$strSQL = "SELECT subject_ct_id FROM credit_transfer_std WHERE subject_ct_id_std = '".$_POST["1400"]."' and std_id = '".$_SESSION['std_id']."'  ";
	

$res6 = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res6);

 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["1400"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{
	

	

	$sql = "INSERT INTO credit_transfer_std (subject_ct_id_std,subject_ct_id,std_id,year) 
		VALUES ('".$_POST["1400"]."','".$_POST["1400"]."','".$_SESSION['std_id']."','2545')";

	$query = mysqli_query($objCon,$sql);

	
}
}

if($_POST["1500"] != 'x'){

	$strSQL = "SELECT subject_ct_id FROM credit_transfer_std WHERE subject_ct_id_std = '".$_POST["1500"]."' and std_id = '".$_SESSION['std_id']."'  ";
	

$res7 = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res7);

 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["1500"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{
	

	

	$sql = "INSERT INTO credit_transfer_std (subject_ct_id_std,subject_ct_id,std_id,year) 
		VALUES ('".$_POST["1500"]."','".$_POST["1500"]."','".$_SESSION['std_id']."','2545')";

	$query = mysqli_query($objCon,$sql);

	
}
}
}

echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";

	mysqli_close($objCon);
?>