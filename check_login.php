<?php
	session_start();
	include("connectdb.php");
	if($_POST["txtUsername"]==''or $_POST["txtPassword"]=='')
{
	echo "<script language='javascript'> alert('กรุณากรอก Username หรือ Password'); </script>";
echo "<meta http-equiv='refresh' content='0; url=index.html'>";
}
	else{
		$encodepass = $_POST["txtPassword"];
		$passEC = md5($encodepass.'x');
	$strSQL = "SELECT * FROM student WHERE std_id = '".mysqli_real_escape_string($objCon,$_POST['txtUsername'])."' 
	and Password = '".mysqli_real_escape_string($objCon,$passEC)."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
		{
			echo "<script language='javascript'> alert('Username and Password Incorrect!'); </script>";
echo "<meta http-equiv='refresh' content='0; url=index.html'>";
			
		}

	

		
	

	
	else
	{
			$_SESSION["std_id"] = $objResult["std_id"];
			$_SESSION["status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "admin")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:user_page.php");
			}
	}
	mysqli_close($objCon);
}
?>