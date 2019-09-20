<?php
sleep(2);

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


$item_id = $_POST['item_id'];
$star = $_POST['num_star'];

$ip = $_SESSION['std_id']; //$_SERVER['REMOTE_ADDR'];

$strSQL = "SELECT std_id,subject_rating_id FROM rating_star WHERE subject_rating_id = '".$_POST["item_id"]."' and std_id = '".$_SESSION['std_id']."' ";

$res = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res);
if($objResult)
{
	echo "ท่านได้บันทึกคะแนนวิชานี้ไปแล้ว";

}

	else{

$sql = "INSERT INTO rating_star(subject_rating_id,std_id,star) VALUES
			('".$_POST['item_id']."', '$ip', '".$_POST['num_star']."')";

$rs = mysqli_query($objCon, $sql);
if(mysqli_affected_rows($objCon) == 0) {
	echo "ข้อมูลไม่ถูกบันทึก เนื่องจากท่านเคยให้ดาวรายการนี้ไปแล้ว";
}

}
mysqli_close($objCon);
//echo "$item_id + $star ";

//-------------------------------------------------------------------------

?>