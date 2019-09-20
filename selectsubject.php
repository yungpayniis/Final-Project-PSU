<?php 
	include("connectdb.php");
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
		

	$sql2 = "Select 
         subject_student.subject_std_id,
         subject.subject_name,
         subject.credit,
         subject_student.Grade,
         subject.subject_group 
         FROM subject_student,
         subject,
         student 
         WHERE subject_student.subject_id=subject.subject_id 
         and subject_student.std_id=student.std_id
         and student.std_id = '".$_SESSION['std_id']."' and subject.subject_group like '%general1'";

         $rs1 = mysqli_query($objCon,$sql2);
         $data1 = mysqli_fetch_assoc($rs1);
         $count = mysqli_num_rows($rs1);
         
         if(!$rs1  ){

         	echo mysqli_error($objCon);
         }
         else{


         }
       






?>

