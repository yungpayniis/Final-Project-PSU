 <!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf8_general_ci " />
 
  <style>
    .blog-card {
  max-width: 900px;
  width:100%;
  height: 500px;
  position: absolute;
  font-family: 'Droid Serif', serif;
  color:#fff;
  top: 20%;
  right: 0;  
  left: -12px;
  margin: 0 auto;
  overflow: hidden;
  border-radius: 0px;
  box-shadow: 0px 10px 20px -9px rgba(0, 0, 0, 0.5);
  text-align: center;
  transition:all 0.4s;
  back
  
}

  </style>
</head>
<body>

</body>
</html>


<?php 
	include("connectdb.php");
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
		$id=$_POST['id'];
    $outp ='';
 
   /* if($_POST['gid']=='general1'){ $rd=4;}
    else if($_POST['gid']=='general2'){ $rd=2;}
    else if($_POST['gid']=='general3'){ $rd=2;}
    else if($_POST['gid']=='general4'){ $rd=6;}
*/Mysqli_set_charset($objCon, 'utf8');
	$sql2 = "SELECT
         subject.subject_id,
         subject.subject_name,
         subject.credit,
         subject.detail,
         subject.Filesname
         FROM 
         subject   
         WHERE subject_id=$id ";
         $sql3 = "SELECT COUNT(Grade) FROM subject_student WHERE subject_id=$id and Grade LIKE '%A' ";
         $sql4 = "SELECT COUNT(Grade) FROM subject_student WHERE subject_id=$id ";
         $rs1 = mysqli_query($objCon,$sql2);
         $rs2 = mysqli_query($objCon,$sql3);
         $rs3 = mysqli_query($objCon,$sql4);
        
        
         if (!$rs1) {
    printf("Error: %s\n", mysqli_error($objCon));
    exit();
}        



                        
                       
         $AVG_grade = '';
                       $i=0;
         while ($row=mysqli_fetch_array($rs1)) {

            $i++;
            $sgid = $row['subject_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
            while ($row2=mysqli_fetch_array($rs2)) {

                          $cnt_grade = $row2['COUNT(Grade)'];
                          
                          //A

                        }
            while ($row3=mysqli_fetch_array($rs3)) {

                          $grades = $row3['COUNT(Grade)'];
                          
                          //ALL
     
                        }
                        if($grades == 0){
                          $AVG_grade = 'none';
                        }
                        else{
        $AVG_grade = $cnt_grade * 100 / $grades ;
        if($AVG_grade == 0){ $AVG_grade = 'none';}

             }

                    $outp.='<div class="blog-card spring-fever" style="background: url(images/'.$row['Filesname'].') center no-repeat; background-size: 100% 100%;">
  <div class="title-content">
    <h3>'.$subjectID.'</h3>
    <div class="intro"> '.$row['subject_name'].' </div><br><br>
     <div class="intro">'.$row['detail'].'  </div>
  </div>
  
  <div class="utility-info">
    <ul class="utility-list">
      <li><span class="licon icon-com"></span>โอกาสการได้เกรด A : &nbsp;'.$AVG_grade.' %</a></li>
      <li><span class="licon icon-dat"></span>หน่วยกิต :&nbsp;  '.$row['credit'].'</li>
    
    </ul>
    
  </div>
  
  <div class="gradient-overlay"></div>
  <div class="color-overlay"></div>
</div>' ;   


  


           
}

 


echo $outp;

mysqli_close($objCon);
?>

