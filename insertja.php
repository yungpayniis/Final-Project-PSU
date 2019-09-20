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
	
 $hdnLine=$_POST["hdnLine"]-1;




	
for($i=1;$i<=$hdnLine;$i++)
	{
		    


		$strSQL = "SELECT subject_std_id FROM subject_student WHERE subject_std_id = '".$_POST["subject_std_id$i"]."' and std_id = '".$_POST["std_id$i"]."' ";
$res = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res);

if($_POST["Grade$i"]=='เลือกเกรด'or $_POST["std_id$i"]==''or $_POST["subject_type$i"]=='')
{
	echo "<script language='javascript'> alert('กรุณากรอกข้อมูลให้ครบ'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}
else if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$_POST["subject_std_id$i"]." มีอยู้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}

	else{

		$SQLgroup = "SELECT subject_group FROM subject WHERE subject_id = '".$_POST["subject_std_id$i"]."' ";
$resgroup = mysqli_query($objCon,$SQLgroup);
$datagroup = mysqli_fetch_array($resgroup);
	

	

	$sql = "INSERT INTO subject_student (subject_std_id,std_id,subject_id,Grade,subject_type) 
		VALUES ('".$_POST["subject_std_id$i"]."','".$_POST["std_id$i"]."','".$_POST["subject_std_id$i"]."','".$_POST["Grade$i"]."','".$_POST["subject_type$i"]."')";

	$query = mysqli_query($objCon,$sql);

	if($query) {
		
		echo "<meta http-equiv ='refresh'content='0;URL=user_page.php'>";
	}
}

}
	mysqli_close($objCon);
?>
</body>
</html>