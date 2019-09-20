<?php 
	include("connectdb.php");
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	
		$id=$_POST['gid'];
    $outp ='';
    $years = '';
    $CT_G11=0;
    $CT_G21=0;
    $CT_G31=0;

	$sql2 = "SELECT
         subject_student.subject_std_id,
         subject.subject_name,
         subject.credit,
         subject_student.Grade,
         subject.subject_group ,
         subject_student.subject_type ,
         subject.ctgy
         FROM subject_student,
         subject,
         student 
         WHERE subject_student.subject_id=subject.subject_id 
         and subject_student.std_id=student.std_id
         and student.std_id = '".$_SESSION['std_id']."' 
         and subject.ctgy like '%$id' 
         and subject_student.subject_type = 'C' 
         ORDER BY subject_student.subject_std_id ASC";
    $sql3 = "SELECT g11,g12,g13,g14 FROM structerit_g ";
    $sql4 = "SELECT AVG(rating_star.star),subject.subject_id,subject.subject_name,subject.credit,subject.subject_group 
FROM rating_star , subject
WHERE NOT subject.subject_id 
IN ( SELECT subject_id FROM subject_student WHERE std_id = '".$_SESSION['std_id']."')
and subject.subject_id=rating_star.subject_rating_id 
GROUP BY rating_star.subject_rating_id 
ORDER BY AVG(rating_star.star) DESC";

    $sqlstd = "SELECT year_structer FROM student WHERE std_id = '".$_SESSION['std_id']."' ";
    $rsstd = mysqli_query($objCon,$sqlstd);
    while ($datastd = mysqli_fetch_array($rsstd)) {
      $std_years = $datastd['year_structer'];     
  }

if($std_years == '2557'){

    $sqlct = "SELECT credit_transfer_57.credit,credit_transfer_57.subject_type FROM credit_transfer_57,credit_transfer_std57 WHERE credit_transfer_std57.subject_ct_id = credit_transfer_57.subject_ct_id57 and credit_transfer_std57.std_id = '".$_SESSION['std_id']."'";
    $ct = mysqli_query($objCon,$sqlct);
    
    while($datact = mysqli_fetch_array($ct)) 
    {

        $datacts=$datact['subject_type'];
       

        if($datacts=='G11'){
           $cd = $datact['credit'];
          $CT_G11 += $cd;
        }
         else if($datacts=='G21'){
           $cd = $datact['credit'];
          $CT_G21 += $cd;
        }
         else if($datacts=='G31'){
           $cd = $datact['credit'];
          $CT_G31 += $cd;
        }

    }
}
else if($std_years == '2545'){

    $sqlct = "SELECT credit_transfer.credit,credit_transfer.subject_type FROM credit_transfer,credit_transfer_std WHERE credit_transfer_std.subject_ct_id = credit_transfer.subject_ct_id45 and credit_transfer_std.std_id = '".$_SESSION['std_id']."'";
    $ct = mysqli_query($objCon,$sqlct);
     
    while ($datact = mysqli_fetch_array($ct)) {

      $datacts=$datact['subject_type'];
       

        if($datacts=='G11'){
           $cd = $datact['credit'];
          $CT_G11 += $cd;
        }
         else if($datacts=='G21'){
           $cd = $datact['credit'];
          $CT_G21 += $cd;
        }
         else if($datacts=='G31'){
           $cd = $datact['credit'];
          $CT_G31 += $cd;
        }

    }
}



    $rsnotsubj1 = mysqli_query($objCon,$sql4); $rsnotsubj2 = mysqli_query($objCon,$sql4);
         $rs1 = mysqli_query($objCon,$sql2);   $rsnotsubj3 = mysqli_query($objCon,$sql4);
         $rs2 = mysqli_query($objCon,$sql2);   $rsnotsubj4 = mysqli_query($objCon,$sql4);
         $rs3 = mysqli_query($objCon,$sql2); 
         $rs4 = mysqli_query($objCon,$sql2);
         $rs = mysqli_query($objCon,$sql3);
       
         $res = mysqli_num_rows($rs1);
         if (!$rs1) {
    printf("Error: %s\n", mysqli_error($objCon));
    exit();
}        


 $outp.="<div class='table table-responsive'>
         <table class='table' table-boardered> <thead class='thead-light' align='center'>
         <tr>
         <th colspan='7' align='center' ><label>เลือกเรียน หมวดวิชามนุษศาสตร์และสังคมศาสตร์ </label></th></tr>
         <tr ><th width='30%'><label>รหัสวิชา</label></th>
                       <th scope='col' ><label>ชื่อวิชา</label></th>
                       <th scope='col'><label>หน่วยกิต</label></th>
                       <th scope='col'><label>เกรด</label></th>
                       <th scope='col'><label>ประเภทวิชา</label></th>
                   
                       <th scope='col'><label>แก้ไข</label></th>
                       <th scope='col'><label>ลบ</label></th>
                       </tr></thead>";
                       
                       
         
 $credit=0;                      $i=0;
 while ($row2=mysqli_fetch_array($rs)) {
          $g11=$row2['g11']; $g12=$row2['g12']; $g13=$row2['g13']; $g14=$row2['g14'];}
         while ($row=mysqli_fetch_array($rs1)) {
            $i++;
            
            $sg = $row['subject_group'];
            $sgid = $row['subject_std_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;

             
            if ($sg =="G11") {
              $credit=$credit + $row['credit'];

             $outp.='<tr style = "background-image: radial-gradient(circle, #e7e5e6, #ebeaeb, #f0eff0, #f4f4f4, #f9f9f9, #f8f8f8, #f8f8f8, #f7f7f7, #f1f1f1, #eaeaea, #e4e4e4, #dedede);">
                        
                       <td width="70%" align="center">'.$subjectID.'</td>'
                       .'</td>
                       <td width="70%"align="center">'.$row['subject_name'].'</td>'
                       .'</td>
                       <td width="70%"align="center">'.$row['credit'].'</td>'
                       .'</td>
                       <td width="70%"align="center">'.$row['Grade'].'</td>
                       <td width="70%"align="center">'.$row['subject_type'].'</td>
             

                       <td align="center"><input type="button" name="edit" value="แก้ไขวิชา" class="btn btn-warning btn-xs edit_data" id="'.$row['subject_std_id'].'"  ></td>

                        <td align="center"><a class="btn btn-danger btn-xs" id="delete'.$i.'" class="various iframe" href="deleterecord.php?subject_std_id='.$row['subject_std_id'].'">ลบ</a></td>

                        
                        </tr>';   
   

}           
}
$gtotal = $g11 - $CT_G11;
if($credit>=$gtotal){
$outp.='</tr><tfoot><tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #F7971E, #FFD200);" class="font-white"><font color="black">หน่วยกิต : สมบูรณ์</font></td></tr></tfoot>';
}
else{$outp.='</tr><tfoot>

<tr ><td colspan="7" align="center">รายวิชาที่แนะนำ</td></tr>';

while ($rsnot=mysqli_fetch_array($rsnotsubj1)) { 
   $subject_group = $rsnot['subject_group'];
   $sgid = $rsnot['subject_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
  if($subject_group == 'G11'){

  $outp.='<tr><td  align="center" >'.$subjectID.' </td>
  <td  align="center" >'.$rsnot['subject_name'].' </td> 
  <td  align="center" >'.$rsnot['credit'].' </td>
  <td  align="center" colspan="3" ><a class= "btn btn-xs btn-info view_review2"  id="'.$rsnot['subject_id'].'">ดูรายละเอียด</a> </td></tr>';}
}   

$outp.='<tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #EAEAEA, #F2F2F2,#DBDBDB,#EAEAEA);" class="font-white"><font color="black">หน่วยกิต : '.$credit.'/'.$gtotal.'</font><br></td></tr></tfoot>';}



 $outp.="</table></div>";
 
     // 4. Release returned data
   



$outp.="<br>";

$outp.="<div class='table table-responsive'>
         <table class='table' table-boardered> <thead class='thead-light' align='center'>
         <tr><th colspan='7' align='center' ><label>กิจกรรมเสริมหลักสูตร</label></th></tr><tr><th width='30%'><label>รหัสวิชา</label></th>
                       <th scope='col' ><label>ชื่อวิชา</label></th>
                       <th scope='col'><label>หน่วยกิต</label></th>
                       <th scope='col'><label>เกรด</label></th>
                       <th scope='col'><label>ประเภทวิชา</label></th>
                       <th scope='col'><label>แก้ไข</label></th>
                       <th scope='col'><label>ลบ</label></th>
                       </tr></thead>";
$credit=0;
while ($row=mysqli_fetch_array($rs2)) {
            $i++;
            
            $sg = $row['subject_group'];
            $sgid = $row['subject_std_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
             
            if ($sg =="G12") {
              $credit=$credit + $row['credit'];
             $outp.='<tr style = "background-image: radial-gradient(circle, #e7e5e6, #ebeaeb, #f0eff0, #f4f4f4, #f9f9f9, #f8f8f8, #f8f8f8, #f7f7f7, #f1f1f1, #eaeaea, #e4e4e4, #dedede);">
                        
                       <td width="70%">'.$subjectID.'</td>'
                       .'</td>
                       <td width="70%">'.$row['subject_name'].'</td>'
                       .'</td>
                       <td width="70%">'.$row['credit'].'</td>'
                       .'</td>
                       <td width="70%">'.$row['Grade'].'</td>
                       <td width="70%">'.$row['subject_type'].'</td>
                       <td align="center"><input type="button" name="edit" value="แก้ไขวิชา" class="btn btn-warning btn-xs edit_data" id="'.$row['subject_std_id'].'"  ></td>
                         <td align="center"><a class="btn btn-danger btn-xs" id="delete'.$i.'" class="various iframe" href="deleterecord.php?subject_std_id='.$row['subject_std_id'].'">Delete</a></td>
                         
                        </tr>';   


}           
}


if($credit>=$g12){
$outp.='</tr><tfoot><tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #F7971E, #FFD200);" class="font-white"><font color="black">หน่วยกิต :  สมบูรณ์</font></td></tr></tfoot>';
}
else{$outp.='</tr><tfoot>

<tr ><td colspan="7" align="center">รายวิชาที่แนะนำ</td></tr>';

while ($rsnot=mysqli_fetch_array($rsnotsubj2)) { 
   $subject_group = $rsnot['subject_group'];
   $sgid = $rsnot['subject_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
  if($subject_group == 'G12'){

  $outp.='<tr><td  align="center" >'.$subjectID.' </td>
  <td  align="center" >'.$rsnot['subject_name'].' </td> 
  <td  align="center" >'.$rsnot['credit'].' </td>
  <td  align="center" colspan="3" ><a class= "btn btn-xs btn-info view_review2" id="'.$rsnot['subject_id'].'">ดูรายละเอียด</a> </td></tr>';}

}


$outp.='<tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #EAEAEA, #F2F2F2,#DBDBDB,#EAEAEA);" class="font-white"><font color="black">หน่วยกิต : '.$credit.'/'.$g12.'</font><br></td></tr></tfoot>';}


 $outp.="</table></div>";

$outp.="<br>";

$outp.="<div class='table table-responsive'>
         <table class='table' table-boardered> <thead class='thead-light' align='center'>
         <tr><th colspan='7' align='center' ><label>กิจกรรมพลศึกษา</label></th></tr><tr><th width='30%'><label>รหัสวิชา</label></th>
                       <th scope='col' ><label>ชื่อวิชา</label></th>
                       <th scope='col'><label>หน่วยกิต</label></th>
                       <th scope='col'><label>เกรด</label></th>
                       <th scope='col'><label>ประเภทวิชา</label></th>
                       <th scope='col'><label>แก้ไข</label></th>
                       <th scope='col'><label>ลบ</label></th>
                       </tr></thead>";
$credit=0;
while ($row=mysqli_fetch_array($rs3)) {
            $i++;
            
            $sg = $row['subject_group'];
            $sgid = $row['subject_std_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
             
            if ($sg =="G13") {
              $credit=$credit + $row['credit'];
             $outp.='<tr style = "background-image: radial-gradient(circle, #e7e5e6, #ebeaeb, #f0eff0, #f4f4f4, #f9f9f9, #f8f8f8, #f8f8f8, #f7f7f7, #f1f1f1, #eaeaea, #e4e4e4, #dedede);">
                        
                       <td width="70%">'.$subjectID.'</td>'
                       .'</td>
                       <td width="70%">'.$row['subject_name'].'</td>'
                       .'</td>
                       <td width="70%">'.$row['credit'].'</td>'
                       .'</td>
                       <td width="70%">'.$row['Grade'].'</td>
                       <td width="70%">'.$row['subject_type'].'</td>
                       <td align="center"><input type="button" name="edit" value="แก้ไขวิชา" class="btn btn-warning btn-xs edit_data" id="'.$row['subject_std_id'].'"  ></td>
                        <td align="center"><a class="btn btn-danger btn-xs" id="delete'.$i.'" class="various iframe" href="deleterecord.php?subject_std_id='.$row['subject_std_id'].'">Delete</a></td>
                        
                        </tr>';   


}           
}

if($credit>=$g13) {
  


$outp.='</tr><tfoot><tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #F7971E, #FFD200);" class="font-white"><font color="black">หน่วยกิต : สมบูรณ์</font></td></tr></tfoot>';
}
else{$outp.='</tr><tfoot>

<tr ><td colspan="7" align="center">รายวิชาที่แนะนำ</td></tr>';

while ($rsnot=mysqli_fetch_array($rsnotsubj3)) { 
   $subject_group = $rsnot['subject_group'];
   $sgid = $rsnot['subject_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
  if($subject_group == 'G13'){

  $outp.='<tr><td  align="center" >'.$subjectID.' </td>
  <td  align="center" >'.$rsnot['subject_name'].' </td> 
  <td  align="center" >'.$rsnot['credit'].' </td>
  <td  align="center" colspan="3" ><a class= "btn btn-xs btn-info view_review2" id="'.$rsnot['subject_id'].'">ดูรายละเอียด</a> </td></tr>';}

}


$outp.='<tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #EAEAEA, #F2F2F2,#DBDBDB,#EAEAEA);" class="font-white"><font color="black">หน่วยกิต : '.$credit.'/'.$g13.'</font><br></td></tr></tfoot>';}


 $outp.="</table></div>";

 $outp.="<br>";

$outp.="<div class='table table-responsive'>
         <table class='table' table-boardered> <thead class='thead-light' align='center'>
         <tr><th colspan='7' align='center' ><label>วิชาเลือก</label></th></tr><tr><th width='30%'><label>รหัสวิชา</label></th>
                       <th scope='col' ><label>ชื่อวิชา</label></th>
                       <th scope='col'><label>หน่วยกิต</label></th>
                       <th scope='col'><label>เกรด</label></th>
                       <th scope='col'><label>ประเภทวิชา</label></th>
                       <th scope='col'><label>แก้ไข</label></th>
                       <th scope='col'><label>ลบ</label></th>

                       </tr></thead>";
$credit=0;
 while ($row=mysqli_fetch_array($rs4)) {
            $i++;
            
            $sg = $row['subject_group'];
            $sgid = $row['subject_std_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
           
             
            if ($sg =="G14") {
              $credit=$credit + $row['credit'];
             $outp.='<tr style = "background-image: radial-gradient(circle, #e7e5e6, #ebeaeb, #f0eff0, #f4f4f4, #f9f9f9, #f8f8f8, #f8f8f8, #f7f7f7, #f1f1f1, #eaeaea, #e4e4e4, #dedede);">
                        
                       <td width="70%">'.$subjectID.'</td>'
                       .'</td>
                       <td width="70%">'.$row['subject_name'].'</td>'
                       .'</td>
                       <td width="70%">'.$row['credit'].'</td>'
                       .'</td>
                       <td width="70%">'.$row['Grade'].'</td>
                       <td width="70%">'.$row['subject_type'].'</td>
                        <td align="center"><input type="button" name="edit" value="แก้ไขวิชา" class="btn btn-warning btn-xs edit_data" id="'.$row['subject_std_id'].'"  ></td>
                         <td align="center"><a class="btn btn-danger btn-xs" id="delete'.$i.'" class="various iframe" href="deleterecord.php?subject_std_id='.$row['subject_std_id'].'">Delete</a></td>
                        
                        </tr>';   


}           
}



if($credit>=$g14){
$outp.='</tr><tfoot><tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #F7971E, #FFD200);" class="font-white"><font color="black">หน่วยกิต : สมบูรณ์</font></td></tr></tfoot>';
}
else{$outp.='</tr><tfoot>

<tr ><td colspan="7" align="center">รายวิชาที่แนะนำ</td></tr>';

while ($rsnot=mysqli_fetch_array($rsnotsubj4)) { 
   $subject_group = $rsnot['subject_group'];

   $sgid = $rsnot['subject_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
  if($subject_group == 'G14'){

  $outp.='<tr><td  align="center" >'.$subjectID.' </td>
  <td  align="center" >'.$rsnot['subject_name'].' </td> 
  <td  align="center" >'.$rsnot['credit'].' </td>
  <td  align="center" colspan="3" ><a class= "btn btn-xs btn-info view_review2" id="'.$rsnot['subject_id'].'">ดูรายละเอียด</a> </td></tr>';}

}


$outp.='<tr><td colspan="7" align="center" style="background-image: linear-gradient(-90deg, #EAEAEA, #F2F2F2,#DBDBDB,#EAEAEA);" class="font-white"><font color="black">หน่วยกิต : '.$credit.'/'.$g14.'</font><br></td></tr></tfoot>';}

 $outp.="</table></div>";

echo $outp;

mysqli_close($objCon);
?>
<?php require 'modal_update_std.php'; ?>
<script >
    $(document).ready(function(){
$('.view_review2').click(function(){
        var gid=$(this).attr("id");
        $.ajax({
          url:"selecttest.php",
          method:"post",
          data:{id:gid},
          success:function(data){
            $('#review').html(data)
            $('#modalCart2').modal('show');
            
          }
        });

      });
$('.edit_data').click(function(){
        var gid=$(this).attr("id");
        //const rect =$(this).attr("id").getBoundingClientRect();
        $.ajax({
          url:"fetch2.php",
          method:"post",
          data:{id:gid},
          dataType:"json",
          success:function(data){
            $('#stdid').val(data[0]);
            $('#sid').val(data[1]);
            $('#sgrade').val(data[2]);
            
            $('#stype').val(data[3]);
            $('#modalupdatestd').modal('show');

          }
        });
      });

       });
    


     </script>