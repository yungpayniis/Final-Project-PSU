<?php
	session_start();
	include("connectdb.php");

	if($_POST["txtUsername"]==''or $_POST["txtPassword"]==''or $_POST["name"]==''or$_POST["year_structer"]=='')
{
	echo "<script language='javascript'> alert('กรุณากรอก Username หรือ Password'); </script>";
echo "<meta http-equiv='refresh' content='0; url=index.html'>";
}
	else{
	$strSQL = "SELECT * FROM student WHERE std_id = '".mysqli_real_escape_string($objCon,$_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
		{
			echo "<script language='javascript'> alert('มีชื่อผู้ใช้นี้ในระบบแล้ว'); </script>";
echo "<meta http-equiv='refresh' content='0; url=register.html'>";
			
		}

	

		
	

	
	else
	{
		$encodepass = $_POST["txtPassword"];
		$passEC = md5($encodepass.'x');
			$sql = "INSERT INTO student (std_id,password,name,status,year_structer) 
		VALUES ('".$_POST["txtUsername"]."','".$passEC."','".$_POST["name"]."','user','".$_POST["year_structer"]."') ";

	$query = mysqli_query($objCon,$sql);
	if($query) {
		echo "<script language='javascript'> alert('สมัครสมาชิกเรียบร้อยแล้ว'); </script>";
		echo "<meta http-equiv ='refresh'content='0;URL=index.html'>";
	}
	}
	mysqli_close($objCon);
}
?>