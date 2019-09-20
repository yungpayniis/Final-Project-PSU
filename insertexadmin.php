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



/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';


$inputFileName = $_FILES["fileexcel"]["tmp_name"];  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  

/*
// for No header
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$r = -1;
$namedDataArray = array();
for ($row = 1; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        $namedDataArray[$r] = $dataRow[$row];
    }
}
*/

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}

$i = 0;
foreach ($namedDataArray as $result) {

	$strSQL = "SELECT subject_std_id FROM subject_student WHERE subject_std_id = '".$result["รหัสวิชา"]."' and std_id = '".$_SESSION['std_id']."' ";
$res = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($res);

if($result["รหัสวิชา"]=='เลือกเกรด'or $result["รหัสวิชา"]==''or $result["เกรด"]==''or $result["ประเภทวิชา"]=='')
{
	echo "<script language='javascript'> alert('กรุณาบันทึกค่าในไฟล์ให้เรียบร้อย'); </script>";
echo "<meta http-equiv='refresh' content='0; url=user_page.php'>";
}
 if($objResult)
{
	echo "<script language='javascript'> alert('รหัสวิชา ".$result["รหัสวิชา"]." มีอยู้ในระบบแล้ว'); </script>";

}
else {


		$i++;
		$strSQL = "";
		$strSQL .= "INSERT INTO subject_student ";
		$strSQL .= "(subject_std_id,std_id,subject_id,Grade,subject_type) ";
		$strSQL .= "VALUES ";
		$strSQL .= "('".$result["รหัสวิชา"]."','".$_SESSION['std_id']."' ";
		$strSQL .= ",'".$result["รหัสวิชา"]."','".$result["เกรด"]."' ";
		$strSQL .= ",'".$result["ประเภทวิชา"]."') ";
		$query = mysqli_query($objCon,$strSQL);
		
	

	}
}


			
		echo "<meta http-equiv ='refresh'content='0;URL=user_page.php'>";

mysqli_close($objCon);

?>




