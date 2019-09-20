<?php
include ("connectdb.php");

//include ("search.php");
	session_start();
	if($_SESSION['std_id'] == "")
	{
		echo "Please Login!";
    echo "<meta http-equiv ='refresh'content='0;URL=index.html'>";
		exit();
	}

	if($_SESSION['status'] != "user")
	{
		echo "This page for User only!";
		exit();
	}	
	
	$sqlname = "SELECT name,year_structer from student WHERE std_id = '".$_SESSION['std_id']."' " ;
  $res = mysqli_query($objCon,$sqlname);
  while ($datares=mysqli_fetch_array($res)) {
    
    $name = $datares['name'];
    $year_structer = $datares['year_structer'];
  }


	
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet2" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.blockUI.js"></script>


    <title>Credit IT</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">


<script>
$(function() {
  
  $('button.bt-rate').click(function() {
    var item_id = $(this).attr('data-id');  
    var num_star = $(this).parent().find(':radio:checked').val();
    
    $.ajax({
      url:'rating.php',
      data:{'item_id':item_id, 'num_star':num_star},
      dataType:'html',
      type:'post',
      beforeSend:function() {
        $.blockUI();
      },
      success:function(result) {
        if(result.length == 0) {
          updateStar(item_id);
        }
        else {
          alert(result);
        }
      },
      complete:function() {
        $.unblockUI();
      }
    });
  });


});

function updateStar(item_id) {
  $.ajax({
    url:'update-star.php',
    data:{'item_id':item_id},
    dataType:'html',
    type:'post',
    success:function(result) {
      $('#star-img-' + item_id).html(result);
    }
  }); 
}
</script>

<style >
  
  
  
  .img-item {
    float: left;
    width: 60px;
    height: 60px;
    margin: 10px;
    border-radius: 5px;
  }
  .img-star {
    vertical-align: middle;
    margin-right: 2px;
  }
  .img-star:last-child {
    margin-right: 5px;
  }
  span.item-name {
    display: block;
    font-weight: bold;
    color: green; 
    margin-top: 10px;
  }
  div.rating {
    border-top: dotted 1px #aaa;
    display: inline-block;
    width: 100%;
  }
  div.rating > span:first-child {
    display: inline-block;
    padding: 3px 4px;
  }
  div.rating > span:last-child {
    display: inline-block;
    float: right;
    padding: 2px 4px;
    border-left: dotted 1px #aaa;
  }
  button.bt-rate {
    background: orange;
    border: solid 1px gray;
    border-radius: 3px;
    color: white;
    margin: 3px 0px 2px;
  }
  button.bt-rate:hover {
    color: aqua;
  }
</style>
</head>


  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="user_page.php">Check Credit</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="user_page.php">

        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <label class="input-group-text" for="inputGroupSelect01" data-toggle="modal" data-target="#modaluser"><?php echo $name; ?></label>

          
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

           </a>
          
      
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#"><?php echo $_SESSION['std_id']; ?></a>
    
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" >Logout</a>
            
          </div>
        </li>
      </ul>

    </nav>
<?php require 'modal.php'; ?>
<?php require 'modalreview.php'; ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="user_page.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>หน้าหลัก</span>
          </a>
        </li>
       
       
        <li class="nav-item">
          <a class="nav-link " data-toggle="modal" data-target="#myModal">
            <i class="fas fa-fw fa-arrow-alt-circle-up"></i>
            <span>เพิ่มรายวิชา</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " data-toggle="modal" data-target="#mysModalx">
            <i class="fas fa-fw fa-arrow-alt-circle-up"></i>
            <span>เพิ่มรายวิชา Excel</span></a>
        </li>

       
        <li class="nav-item">
          <a class="nav-link " data-toggle="modal" data-target="#mysModalCT45">
            <i class="fas fa-fw fa-arrow-alt-circle-up"></i>
            <span>บันทึกวิชาเทียบโอนปี2545</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link " data-toggle="modal" data-target="#mysModalCT57">
            <i class="fas fa-fw fa-arrow-alt-circle-up"></i>
            <span>บันทึกวิชาเทียบโอนปี2557</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#myModallistct">
            <i class="fas fa-clipboard-list"></i>
            <span>รายการเทียบโอน</span></a>
        </li>


      </ul>

<?php 
$CT_G11=0;
    $CT_G21=0;
    $CT_G31=0;
$ss = $_SESSION['std_id'];

    $sqlx = "Select credit,subject_group  from subject,subject_student where subject.subject_id=subject_student.subject_id  and subject_student.std_id = '".$_SESSION['std_id']."' and subject_student.subject_type = 'C' ";
    $sql4 = "SELECT subject_id,subject_name,credit,subject_group FROM subject WHERE NOT subject_id IN ( SELECT subject_id FROM subject_student WHERE std_id = '".$_SESSION['std_id']."')";
    $sqlstd = "SELECT year_structer FROM student WHERE std_id = '".$_SESSION['std_id']."' ";
    $rsstd = mysqli_query($objCon,$sqlstd);
    while ($datastd = mysqli_fetch_array($rsstd)) {
      $std_years = $datastd['year_structer'];     
  }

if($std_years == '2557'){

    $sqlct = "SELECT credit_transfer_57.credit,credit_transfer_57.subject_type FROM credit_transfer_57,credit_transfer_std57 WHERE credit_transfer_std57.subject_ct_id = credit_transfer_57.subject_ct_id57 and credit_transfer_std57.std_id = '".$_SESSION['std_id']."'";
    $sql3 = "SELECT g11,g12,g13,g14,g21,g22,g31,g32,g41,g42,g43,g44,g45,g46 FROM structerit_g ";
     $rsg = mysqli_query($objCon,$sql3);
    $ct = mysqli_query($objCon,$sqlct);
    while ($row2=mysqli_fetch_array($rsg)) {
          $ganeral1=$row2['g11']+$row2['g12']+$row2['g13']+$row2['g14'];
          $ganeral2=$row2['g21']+$row2['g22'];
          $ganeral3=$row2['g31']+$row2['g32'];
          $ganeral4=$row2['g41']+$row2['g42']+$row2['g43']+$row2['g44']+$row2['g45']+$row2['g46'];

         }
    
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
    $sql3 = "SELECT g11,g12,g13,g14,g21,g22,g31,g32,g41,g42,g43,g44,g45,g46 FROM structerit_g ";
     $rsg = mysqli_query($objCon,$sql3);
    $ct = mysqli_query($objCon,$sqlct);
    while ($row2=mysqli_fetch_array($rsg)) {
          $ganeral1=$row2['g11']+$row2['g12']+$row2['g13']+$row2['g14'];
          $ganeral2=$row2['g21']+$row2['g22'];
          $ganeral3=$row2['g31']+$row2['g32'];
          $ganeral4=$row2['g41']+$row2['g42']+$row2['g43']+$row2['g44']+$row2['g45']+$row2['g46'];

         }
     
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
    $rsx = mysqli_query($objCon,$sqlx);
    if (!$rsx) {
    printf("Error: %s\n", mysqli_error($objCon));
    exit();

  }
$sum = 0;
$g1=0;
$g2=0;
$g3=0;
$g4=0;

    while ($row=mysqli_fetch_array($rsx)){
      
       
        if($row['subject_group']=='G11'or$row['subject_group']=='G12'or$row['subject_group']=='G13'or$row['subject_group']=='G14'){
          
          $gg=$row['credit'];
        $g1=$g1+$gg;
      }
      else if($row['subject_group']=='G21'or$row['subject_group']=='G22'){
          
          $gg=$row['credit'];
        $g2=$g2+$gg;
      }
      else if($row['subject_group']=='G31'or $row['subject_group']=='G32'){
          
          $gg=$row['credit'];
        $g3=$g3+$gg;
      }
      else if($row['subject_group']=='G41'or$row['subject_group']=='G42'or$row['subject_group']=='G43'or$row['subject_group']=='G44'or$row['subject_group']=='G45'or$row['subject_group']=='G46'){
          
          $gg=$row['credit'];
        $g4=$g4+$gg;
      }
 
    }
?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalmanual">คู่มือการใช้งาน</button>

            </li>
            
            
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <span class="fas fa-fw fa-users"></span>
                    <br>
                    
                  </div>
                   <br>
                    <br>
                  <div class="mr-5">วิชามนุษศาสตร์และสังคมศาสตร์ </div>
                </div>
           <a class="card-footer text-white clearfix small z-1 view_data" id="<?php echo $gn = 'general1'?>">
                  <span class="float-left">ดูรายละเอียด</span>
                  <span class="float-right">
                    <?php 
                    $general1total = $ganeral1 - $CT_G11;
                    if($g1>=$general1total){
                      echo "ครบสมบูรณ์";
                    }
                    else{
                      echo $g1."/".$general1total;
                    } ?>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
               <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-globe"></i>
                  </div>
                   <br>
                    <br>
                  <div class="mr-4">วิทยาศาสตร์และคณิตศาสตร์</div>
                </div>
             <a class="card-footer text-white clearfix small z-1 view_data2" id="<?php echo $gn = 'general2'?>">
                  <span class="float-left">ดูรายละเอียด</span>
                  <span class="float-right">
                    <?php 
                    
                    $general2total = $ganeral2 - $CT_G21;
                    if($g2>=$general2total){
                      echo "ครบสมบูรณ์";
                    }
                    else{
                      echo $g2."/".$general2total;
                    }

                     ?>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
               <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-language"></i>
                  </div>
                   <br>
                    <br>
                    <br>
                  <div class="mr-4">กลุ่มวิชาภาษา </div>
                </div>
              <a class="card-footer text-white clearfix small z-1 view_data3" id="<?php echo $gn = 'general3'?>">
                  <span class="float-left">ดูรายละเอียด</span>
                  <span class="float-right">
                    <?php 
                    $general3total = $ganeral3 - $CT_G31;
                    if($g3>=$general3total){
                      echo "ครบสมบูรณ์";
                    }
                    else{
                      echo $g3."/".$general3total;
                    } ?>
                  </span>
                </a>
              </div>
            </div>

            <br>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-bug"></i>
                  </div>
                   
                   <br>
                    <br>
                    <br>
                  <div class="mr-5">หมวดวิชาเฉพาะ</div>
                </div>
            <a class="card-footer text-white clearfix small z-1 view_data4" id="<?php echo $gn = 'general4'?>">
                  <span class="float-left">ดูรายละเอียด</span>
                  <span class="float-right">
                    <?php 
                   
                    if($g4>=$ganeral4){
                      echo "ครบสมบูรณ์";
                    }
                    else{
                      echo $g4."/".$ganeral4;
                    }
                     ?>
                  </span>
                </a>
              </div>
            </div>

          </div>
          

<?php 
if(!isset($_POST['cdsrch']) or !isset($_POST['gsrch']) or !isset($_POST['search'])){

  $_POST['cdsrch'] = '';
  $_POST['gsrch'] = '';
  $_POST['search']= '';
  

}
?>
  

<div id="content-wrappers">
  <div class="container -fluid" >
    <form action="#" name="frmsrch" method="post">
    <table>
      
      <thead>        
        <tr>
        <td>
          <div class="input-group">
               <span class="input-group-text">ค้นหา</span>
              <input id="search" type="text" class="form-control" name="search" placeholder="Ex. 895101"
              value="<?php echo $_POST['search'];?>" >
          </div>
        </td>
        <td>
              <input type="submit" class="btn btn-info" value="ค้นหา">
        </td>
        </tr>
        <tr>
        <td>
            <div style="float:left">
            <div class="form-group" >
            หน่วยกิต
            <select class="form-control" name="cdsrch" style="width: 100%">
            <option value="" >ทั้งหมด</option>
            <option value="1"<?php if($_POST['cdsrch']=='1'){ echo "selected='selected'";}?>>1</option>
            <option value="2"<?php if($_POST['cdsrch']=='2'){ echo "selected='selected'";}?>>2</option>
            <option value="3"<?php if($_POST['cdsrch']=='3'){ echo "selected='selected'";}?>>3</option>
            </select>
            </div>
            </div>
            <div style="float:right">
            <div class="form-group">
            หมวดวิชา
          <select class="form-control" name="gsrch" style="width: 100%">
            <option value="">ทั้งหมด</option>
            <option value="general1"<?php if($_POST['gsrch']=='general1'){ echo "selected='selected'";}
            ?>>มนุษย์ศาสตร์สและสังคมศาสตร์</option>
            <option value="general2"<?php if($_POST['gsrch']=='general2'){ echo "selected='selected'";}?>>วิทยาศาสตร์และคณิตศาสตร์</option>
            <option value="general3"<?php if($_POST['gsrch']=='general3'){ echo "selected='selected'";}?>>ภาษา</option>
            <option value="general4"<?php if($_POST['gsrch']=='general4'){ echo "selected='selected'";}?>>วิชาเฉพาะ</option>
          </select>
            </div>
            </div>
          
        </td>
        </tr>
      </thead>



    </table>
  </form>

    <?php


Mysqli_set_charset($objCon, 'utf8');
  // Search By Name or Email

  $strSQL = "SELECT subject_id,subject_name,credit 
  FROM subject
  WHERE subject_id LIKE  '%".$_POST["search"]."%' 
  and credit LIKE '%".$_POST["cdsrch"]."%' 
  and ctgy LIKE '%".$_POST["gsrch"]."%' or subject_name LIKE  '%".$_POST["search"]."%' 
  and credit LIKE '%".$_POST["cdsrch"]."%' 
  and ctgy LIKE '%".$_POST["gsrch"]."%' ";
  $objQuery = mysqli_query($objCon,$strSQL);

  
  if (!$objQuery) {
    printf("Error: %s\n", mysqli_error($objCon));
    exit();
}
  ?> <div class="row">
   <div class='table table-responsive' align='center' >
         <table class='table' table-boardered>
          <thead class='thead-light'>
            <tr><th ><label>รหัสวิชา</label></th>
                       
                       <th scope='col' width="20%"><label>ชื่อวิชา</label></th>
                       <th scope='col'><label>หน่วยกิต</label></th>
                        <th scope='col'><label>รายละเอียด</label></th>
                         <th scope='col'><label>คะแนนรายวิชา</label></th>
                          <th scope='col'><label>ให้คะแนนรายวิชา</label></th>
                          
                             
                               
                       </tr></thead><?php
  
  
  while($objResult = mysqli_fetch_array($objQuery))
  {
    $sjid = $objResult['subject_id'];
    $sjname = $objResult['subject_name'];
    $cd = $objResult['credit'];
    $id = $objResult['subject_id'];

            
            $cutstr = substr($sjid,0,3);
            $cutstr2 = substr($sjid,3,6);
            $subjectID =$cutstr."-".$cutstr2;
    ?>
    </tr>
    </thead>
    <tr class='bg-light'>
        <td></a><?php echo $subjectID; ?></td> 
        <td><?php echo $sjname;?></td>  
        <td><?php echo $cd; ?> </td> 
        <td><input type="button" name="view" value="รายละเอียด" class="btn btn-info btn-xs view_review" 
          id="<?php echo $objResult['subject_id']; ?>"> </input></td>

        <td >
           
                <span class="star-img" id="star-img-<?php echo $id; ?>">
                <script> updateStar(<?php echo $id; ?>); </script>
                </span>
            
        </td>


        <td><?php 
        $sqldelrating = "SELECT subject_rating_id from rating_star where subject_rating_id = '".$objResult['subject_id']."' AND
        std_id = '".$_SESSION['std_id']."' ";
        $rsdelrating = mysqli_query($objCon,$sqldelrating);
        $subject_rating_id = '';
        while ( $datadelrating=mysqli_fetch_array($rsdelrating)) {
          

          $subject_rating_id = $datadelrating['subject_rating_id'];


        }
        if($subject_rating_id != $id)
        {
        
        ?>
         
         <span class="star-rate">
                <input type="radio" name="star_<?php echo $id; ?>" value="1"  checked>1
        <input type="radio" name="star_<?php echo $id; ?>" value="2">2
        <input type="radio" name="star_<?php echo $id; ?>" value="3">3
        <input type="radio" name="star_<?php echo $id; ?>" value="4">4
        <input type="radio" name="star_<?php echo $id; ?>" value="5">5
        <button class="bt-rate" data-id="<?php echo $id; ?>">ให้คะแนน</button>
      </span><?php }
        if($subject_rating_id == $id) {   ?>
      <a  class="btn btn-xs btn-danger" href="deleterating.php?subject_rating_id=<?php echo $subject_rating_id;?>">ยกเลิกการให้คะแนน</a>
      <?php

      }

       ?>
   
</td>
    </tr>




    <?php

  }
  

?>
 </table></div></div>
</div>
</div>


        <!-- Sticky Footer -->
        
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
<div class="modal fade" id="modaluser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xs " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">ข้อมูลผู้ใช้</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="ปิด">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
    

      <div class="modal-body" id="detail">


        <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >รหัสนักศึกษา</span>
    </div> 
    <input class="form-control"  type="text" name="std_id" value="<?php echo $_SESSION['std_id']; ?>" readonly >

    </div>

        <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >ชื่อ-นามสกุล </span>
    </div> 
    <input class="form-control"  type="text" name="name" value="<?php echo $name; ?>" >

    </div>

       <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >ปีที่เทียบโอนหลักสูตร(ปวส)</span>
    </div> 
    <input class="form-control"  type="text" name="year_structer" value="<?php echo $year_structer; ?>" >

    </div>
        
       
        
    
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>


 <!-- modal insert-->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <i class="fas fa-fw fa-arrow-alt-circle-up"></i>
          <h4 class="modal-title">เพิ่มรายวิชา</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>


  <form action="insertja.php" name="frmAdd" method="post">

    จำนวนแบบฟอร์ม : 
<select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
<?php
error_reporting(~E_NOTICE);
for($i=1;$i<=50;$i++)
{
  if($_GET["Line"] == $i)
  {
    $sel = "selected";
  }
  else
  {
    $sel = "";
  }
?>
  <option value="<?php echo $_SERVER["PHP_SELF"];?>?Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
<?php
}
?>
</select>
          <div class="table-responsive"> 
          <!-- insert -->         
   
    <!-- sj_id-->
    
   <table width="399"  >

    <?php
  $line = $_GET["Line"];
  if($line == 0){$line=1;}
  for($i=1;$i<=$line;$i++)
  {
$sql2 = "SELECT subject_id,subject_name,credit
FROM  subject
WHERE NOT subject_id 
IN ( SELECT subject_id FROM subject_student WHERE std_id = '".$_SESSION['std_id']."')";
    $rs1 = mysqli_query($objCon,$sql2);
  ?>  
    <tr>
      <td >
      <div class="input-group mb-3" >
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">รหัสวิชา - ชื่อวิชา</label>
    </div>
    <select class="custom-select" type="text" name="subject_std_id<?php echo $i;?>" >
    <?php while($row1 = mysqli_fetch_array($rs1)){
      $sgid = $row1['subject_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;?>
    <option value="<?php echo $row1["subject_id"];?>"><?php echo $subjectID; ?> : <?php echo $row1["subject_name"]; ?></option>
    <?php } ?> 
    </select>
     </div>
     </td>
     </tr>
    <!--end_sj_id -->
    <!--std_id -->
    <tr>
      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <?php 
      $std_id = $_SESSION["std_id"];

      ?>
    <span class="input-group-text" >รหัสนักศึกษา </span>
    </div> 
    <input class="form-control"  type="text" name="std_id<?php echo $i;?>" value="<?php echo $std_id;?>" readonly>

    </div>
    </td>
     </tr>
    <!--end std_id -->
    <!--grade -->
    <tr>

      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >เกรด</span>
    </div> 
    <select class="custom-select" type="text" name="Grade<?php echo $i;?>" >
        <option value="เลือกเกรด">เลือกเกรด</option>
       <option value="A">A</option>
       <option value="B">B</option>
       <option value="B+">B+</option>
       <option value="C">C</option>
       <option value="C+">C+</option>
       <option value="D">D</option>
       <option value="D+">D+</option> 
       
    </select>
    <!--<input class="form-control" pattern="[A,B+,B,C+,C,D,D+,E]{1,}" value="A" type="text" name="Grade" >-->
    </div>
    </td>
     </tr>
     <tr>
      <td>
     <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >ประเภทวิชา</span>
    </div>
    <select class="custom-select" type="text" name="subject_type<?php echo $i;?>" >
        <option value="">เลือกประเภทวิชา</option>
       <option value="C">C</option>
       <option value="A">A</option>
    
    </select>
    </div>
     </td>
      </tr>
      <tr><td  align="center" style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);" class="font-white"><font color="black">  </font></td></tr>
      <tr><td  align="center" style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);" class="font-white"><font color="black">  </font></td></tr>
      <tr>
      <td>
     <div class="input-group mb-3">
    <div class="input-group-prepend">
  
    </div>
   
    </div>
     </td>
      </tr>
        
    

      <?php
  }
  ?>
</table>
    <br>
    <!--endgrade -->
  <input type="submit" name="submit" value="บันทึก" class="btn btn-success"> 
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">

</form>  

<br>
 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div>
      </div>     
    </div>
  </div>

</div>



<div class="modal fade" id="modalmanual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">คู่มือการใช้งาน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" id="detail">

        
        
         <img src="manual/เพิ่มวิชา.png" alt="Nature" style=" width: 100%;height: auto;"><br>
         <img src="manual/เพิ่มวิชาex.png" alt="Nature" style=" width: 100%;height: auto;">
    
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>







  <div class="modal fade" id="mysModalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xs " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">รายวิชา</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" id="detail">



        <a class="btn btn-info btn-xs"  href="insertsub.xlsx">ดาวน์โหลดแบบฟอร์ม Excel</a><br><br>
        <form action = "insertex.php" method="post" name="frmexcel" enctype="multipart/form-data">
        <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >ไฟล์ Excel </span>
    </div> 
    <input class="form-control"  type="File" name="fileexcel"  >

    </div>
<input type="submit" name="submit" value="บันทึก" class="btn btn-success"> 
</form>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="mysModalCT45" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">รายวิชา</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" id="ct">
        <div class="container">
        <div class="row">      
   <div class='table table-responsive' align='center' >
         <table class='table' table-boardered>
          <thead class='thead-light'>
            
            <tr>
              <th class="text-center" >รายวิชาเทียบโอนหมวดทั่วไป ปี2545</th>                                 
            </tr>
          </thead>      
            <form action="insertct45.php" method="post" name="frmct">
          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มภาษาไทย</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1100" >
              <option value="x">เลือก</option>
              <option value="30001101">3000-1101 : ทักษะภาษาไทยเพื่ออาชีพ 1</option>
              <option value="30001102">3000-1102 : การใช้ภาษาไทยเชิงปฏิบัติการ 2</option>     
              <option value="30001103">3000-1103 : ภาษาไทยเชิงสร้างสรรค์ในงานอาชีพ 2</option>
              <option value="30001104">3000-1104 : ภาษาไทยเพื่อพัฒนาอาชีพและสังคม 2</option>  
              <option value="x">ไม่มี</option>  
          </select>
        </td>
      </tr>
          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มภาษาอังกฤษ</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1200" >
              <option value="x">เลือก</option>
              <option value="30001201">3000-1201 : ทักษะพัฒนาเพื่อการสื่อสารภาษาอังกฤษ 1</option>
              <option value="30001202">3000-1202 : ทักษะพัฒนาเพื่อการสื่อสารภาษาอังกฤษ 2</option> 
              <option value="x">ไม่มี</option>        
          </select>
        </td>
        </tr>
           
         


          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชาสังคมศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1300" >
               <option value="x">เลือก</option>
              <option value="30001301">3000-1301 : ชีวิตและวัฒนธรรมไทย</option>
              <option value="30001302">3000-1302 : ภูมิปัญญาท้องถิ่น</option>     
              <option value="30001303">3000-1303 : ภูมิฐานถิ่นไทย</option>
              <option value="30001304">3000-1304 : การเมืองการปกครองของไทย</option> 
              <option value="30001305">3000-1305 : ระบบภูมิสารสนเทศเพื่อการวางแผนและพัฒนา</option>
              <option value="30001306">3000-1306 : เศรษฐกิจพอเพียง</option>
              <option value="30001307">3000-1307 : ชีวิตกับสิ่งแวดล้อมและเทคโนโลยี</option>
              <option value="30001308">3000-1308 : มนุษย์กับการจัดสภาพแวดล้อม</option>
              <option value="30001309">3000-1309 : คุณภาพชีวิตกับเทคโนโลยีสะอาด</option>  
              <option value="x">ไม่มี</option> 
          </select>
        </td>
      </tr>

          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชามนุษยศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1600" >
               <option value="x">เลือก</option>
              <option value="30001601">3000-1601 : ห้องสมุดกับการรู้สารสนเทศ</option>
              <option value="30001602">3000-1602 : นันทนาการเพื่อพัฒนาคุณภาพชีวิต</option>     
              <option value="30001603">3000-1603 : กีฬาเพื่อพัฒนาสุขภาพและบุคลิกภาพ</option>
              <option value="30001604">3000-1604 : ทักษะชีวิต</option> 
              <option value="30001605">3000-1605 : พลศึกษา สุขศึกษาและนันทนาการ เพื่อสุขภาพและสังคม</option>
              <option value="30001606">3000-1606 : มนุษยสัมพันธ์ในการทำงาน</option>
              <option value="30001607">3000-1607 : สุขภาพชุมชน</option>
              <option value="30001608">3000-1608 : การวางแผนอาชีพตามหลักพุทธธรรม</option>
              <option value="30001609">3000-1609 : จิตวิทยามนุษย์เชิงธุรกิจ</option>  
              <option value="x">ไม่มี</option> 
          </select>
        </td>
      </tr>

       <tr class='bg-light'>
             <td colspan="4" align='center'>วิชาภาษาอังกฤษและภาษาอื่นๆ</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1220" >
               <option value="x">เลือก</option>
              <option value="30001220">3000-1220 : ภาษาอังกฤษพื้นฐาน</option>
              <option value="30001221">3000-1221 : ภาษาอังกฤษเฉพาะกิจ</option>
              <option value="30001222">3000-1222 : การอ่านภาษาอังกฤษทั่วไป</option>     
              <option value="30001223">3000-1223 : การเขียนตามรูปแบบ</option>
              <option value="30001224">3000-1224 : การใช้สื่อผสมในการเรียนภาษาอังกฤษ</option> 
              <option value="30001225">3000-1225 : ภาษาอังกฤษโครงงาน</option>
              <option value="30001226">3000-1226 : ภาษาอังกฤษสำหรับสถานประกอบการ</option>
              <option value="30001227">3000-1227 : ภาษาอังกฤษอินเตอร์เน็ต</option>
              <option value="30001228">3000-1228 : ภาษาอังกฤษธุรกิจ</option>
              <option value="30001229">3000-1229 : ภาษาอังกฤษเพื่อการออกแบบตัดเย็บเสื้อผ้า</option>  
              <option value="30001230">3000-1230 : ภาษาอังกฤษเทคโนโลยีสิ่งทอ</option> 
              <option value="30001231">3000-1231 : ภาษาอังกฤษธุรกิจคหกรรม</option>
              <option value="30001232">3000-1232 : ภาษาอังกฤษสำหรับงานอาหารโรงแรมและภัตตาคาร</option>     
              <option value="30001233">3000-1233 : ภาษาอังกฤษเทคโนโลยีอาหาร</option>
              <option value="30001234">3000-1234 : ภาษาอังกฤษสำหรับงานศิลปะและหัตถกรรม</option> 
              <option value="30001235">3000-1235 : ภาษาอังกฤษสมัครงาน</option>
              <option value="30001236">3000-1236 : ภาษาอังกฤษคอมพิวเตอร์</option>
              <option value="30001237">3000-1237 : ภาษาอังกฤษเทคโนโลยีสารสนเทศ</option>
              <option value="30001238">3000-1238 : ภาษาอังกฤษธุรกิจเกษตร</option>
              <option value="30001239">3000-1239 : ภาษาอังกฤษธุรกิจประมง</option>  
              <option value="30001240">3000-1240 : การศึกษาค้นคว้าภาษาอังกฤษโดยอิสระ</option> 
              <option value="30001241">3000-1241 : ภาษาอังกฤษเพื่อการใช้งานในเรือ 1</option>
              <option value="30001242">3000-1242 : ภาษาอังกฤษเพื่อการใช้งานในเรือ 2</option>     
              <option value="30001243">3000-1243 : ภาษาจีนเบื้องต้น</option>
              <option value="30001244">3000-1244 : ภาษาจีนเพื่อการสื่อสาร</option> 
              <option value="30001245">3000-1245 : ภาษาญี่ปุ่นเบื้องต้น</option>
              <option value="30001246">3000-1246 : ภาษาญี่ปุ่นเพื่อการสื่อสาร</option>
              <option value="30001247">3000-1247 : ภาษาฝรั่งเศสเบื้องต้น</option>
              <option value="30001248">3000-1248 : ภาษาฝรั่งเศสเพื่อการสื่อสาร</option>
              <option value="30001249">3000-1249 : ภาษาเยอรมันเบื้องต้น</option>  
              <option value="30001250">3000-1250 : ภาษาเยอรมันเพื่อการสื่อสาร</option>
              <option value="30001251">3000-1251 : ภาษาอังกฤษพื้นฐานเครื่องมือวัด 1</option>
              <option value="30001252">3000-1252 : ภาษาอังกฤษพื้นฐานเครื่องมือวัด 2</option>     
              <option value="30001253">3000-1253 : ภาอังกฤษเทคโนโลยีปิโตรเลียม 1</option>
              <option value="30001254">3000-1254 : ภาอังกฤษเทคโนโลยีปิโตรเลียม 2</option> 
              <option value="30001255">3000-1255 : ภาอังกฤษเทคโนโลยีปิโตรเลียม 3</option>
              <option value="30001256">3000-1256 : ภาอังกฤษเทคโนโลยีปิโตรเลียม 4</option>
              <option value="30001257">3000-1257 : ภาอังกฤษเทคโนโลยีปิโตรเลียม 5</option>
              <option value="30001258">3000-1258 : ภาษาอังกฤษสาหรับโลจิสติกส์</option>
              <option value="x">ไม่มี</option>
            
       
          </select>
        </td>
      </tr>

       <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชาวิทยาศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1400" >
               <option value="x">เลือก</option>
              <option value="30001421">3000-1421 : วิทยาศาสตร์ 1 (เกษตรกรรม - ประมง)</option>
              <option value="30001422">3000-1422 : วิทยาศาสตร์ 2 (เกษตรกรรม - ประมง)</option>     
              <option value="30001423">3000-1423 : วิทยาศาสตร์ 3 (ศิลปกรรม)</option>
              <option value="30001424">3000-1424 : วิทยาศาสตร์ 4 (บริหารธุรกิจ - คหกรรม)</option> 
              <option value="30001425">3000-1425 : วิทยาศาสตร์ 5 (บริหารธุรกิจ - คหกรรม)</option>
              <option value="30001426">3000-1426 : วิทยาศาสตร์ 6 (อุตสาหกรรม)</option>
              <option value="30001427">3000-1427 : วิทยาศาสตร์ 7 (อุตสาหกรรม)</option>
              <option value="30001428">3000-1428 : วิทยาศาสตร์ 8 (อุตสาหกรรม)</option>
              <option value="30001429">3000-1429 : โครงงานวิทยาศาสตร์</option> 
              <option value="x">ไม่มี</option>  
          </select>
        </td>
      </tr>

          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชาคณิตศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1500" >
               <option value="x">เลือก</option>
              <option value="30001520">3000-1520 : คณิตศาสตร์ 1 (บริหารธุรกิจ)</option>
              <option value="30001521">3000-1521 : คณิตศาสตร์ 2 (อุตสาหกรรม)</option>     
              <option value="30001522">3000-1522 : คณิตศาสตร์ 3 (คหกรรม-ศิลปกรรม)</option>
              <option value="30001523">3000-1523 : คณิตศาสตร์ 4 (เกษตรกรรม)</option> 
              <option value="30001524">3000-1524 : สถิติ</option>
              <option value="30001525">3000-1525 : แคลคูลัส 1</option>
              <option value="30001526">3000-1526 : แคลคูลัส 2</option> 
               <option value="x">ไม่มี</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="submit" value="บันทึก" class="btn btn-success btn-block">
        </td>
      </tr>

          
         
     </form>
        </table></div></div></div>


       
       
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mysModalCT57" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">รายวิชา</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" id="ct">
        <div class="container">
        <div class="row">      
   <div class='table table-responsive' align='center' >
         <table class='table' table-boardered>
          <thead class='thead-light'>
            
            <tr>
              <th class="text-center" >รายวิชาเทียบโอนหมวดทั่วไป ปี2557</th>                                 
            </tr>
          </thead>      
            <form action="insertct57.php" method="post" name="frmct">
          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มภาษาไทย</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1100" >
              <option value="x">เลือก</option>
              <option value="30001101">3000-1101 : ภาษาไทยเพื่อสื่อสารในงานอาชีพ</option>
              <option value="30001102">3000-1102 : การเขียนเชิงวิชาชีพ</option>     
              <option value="30001103">3000-1103 : ภาษาไทยเพื่อการนำเสนอ</option>
              <option value="30001104">3000-1104 : การพูดเพื่อสื่อสารงานอาชีพ</option>  
              <option value="30001105">3000-1105 : การเขียนรายงานการปฏิบัติงาน</option>
              <option value="x">ไม่มี</option>  
          </select>
        </td>
      </tr>
          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มภาษาอังกฤษ</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1200" >
              <option value="x">เลือก</option>
              <option value="30001201">3000-1201 : ภาษาอังกฤษเพื่อการสื่อสารทางธุรกิจและสังคม</option>
              <option value="30001206">3000-1206 : การสนทนาภาษาอังกฤษ 1</option> 
              <option value="30001207">3000-1207 : การสนทนาภาษาอังกฤษ 2</option> 
              <option value="30001208">3000-1208 : ภาษาอังกฤษธุรกิจในงานอาชีพ</option> 
              <option value="30001209">3000-1209 : ภาษาอังกฤษเทคโนโลยีช่างอุตสาหกรรม</option> 
              <option value="x">ไม่มี</option>        
          </select>
        </td>
        </tr>
           
         


          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชาวิทยาศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1300" >
               <option value="x">เลือก</option>
              <option value="30001301">3000-1301 : วิทยาศาสตร์เพื่องานไฟฟ้าและการสื่อสาร</option>
              <option value="30001305">3000-1305 : วิทยาศาสตร์เพื่องานธุรกิจและบริการ</option>     
              <option value="30001313">3000-1313 : วิทยาศาสตร์และเทคโนโลยีเพื่อชีวิต</option>
              <option value="30001314">3000-1314 : วิทยาศาสตร์เพื่อคุณภาพชีวิต</option> 
              <option value="30001315">3000-1315 : ชีวิตกับเทคโนโลยีสมัยใหม่</option>
              <option value="30001316">3000-1316 : วิทยาศาสตร์เพื่องานเทคนิคพลังงาน</option>
              <option value="30001317">3000-1317 : การวิจัยเบื้องต้น</option>            
              <option value="x">ไม่มี</option> 
          </select>
        </td>
      </tr>

          <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชามนุษยศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1600" >
               <option value="x">เลือก</option>
              <option value="30001601">3000-1601 : การพัฒนาทักษะชีวิตเพื่อสุขภาพและสังคม</option>
              <option value="30001602">3000-1602 : การบริหารจัดการสุขภาพเพื่อภาวะผู้นำ</option>     
              <option value="30001603">3000-1603 : พฤติกรรมนันทนาการกับการพัฒนาตน</option>
              <option value="30001604">3000-1604 : เทคนิคการพัฒนาสุขภาพในการทำงาน</option> 
              <option value="30001605">3000-1605 : สุขภาพชุมชน</option>
              <option value="30001606">3000-1606 : การคิดอย่างเป็นระบบ</option>
              <option value="30001607">3000-1607 : สารสนเทศเพื่อการเรียนรู้</option>
              <option value="30001608">3000-1608 : พลศึกษาเพื่องานอาชีพ</option>
              <option value="30001609">3000-1609 : ลีลาศเพื่อการสมาคม</option>  
              <option value="30001610">3000-1610 : คุณภาพชีวิตเพื่อการทำงาน</option> 
              <option value="x">ไม่มี</option> 
          </select>
        </td>
      </tr>

      <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชาสังคมศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1500" >
               <option value="x">เลือก</option>
              <option value="30001501">3000-1501 : ชีวิตกับสังคมไทย</option>
              <option value="30001502">3000-1502 : เศรษฐกิจพอเพียง</option>     
              <option value="30001503">3000-1503 : มนุษยสัมพันธ์กับปรัชญาของเศรษฐกิจพอเพียง</option>
              <option value="30001504">3000-1504 : ภูมิฐานถิ่นไทย</option> 
              <option value="30001505">3000-1505 : การเมืองการปกครองของไทย</option>
              <option value="30001506">3000-1506 : ปัจจัยมนุษย์และกฎหมายการเดินอากาศ</option>
               <option value="x">ไม่มี</option>
          </select>
        </td>
      </tr>


       <tr class='bg-light'>
             <td colspan="4" align='center'>กลุ่มวิชาคณิตศาสตร์</td>
          </tr>
          <tr>
            <td ><select class="custom-select" type="text" name="1400" >
               <option value="x">เลือก</option>
              <option value="30001401">3000-1401 : คณิตศาสตร์เพื่อพัฒนาทักษะการคิด</option>
              <option value="30001402">3000-1402 : คณิตศาสตร์อุตสาหกรรม</option>     
              <option value="30001403">3000-1403 : คณิตศาสตร์ธุกิจ</option>
              <option value="30001404">3000-1404 : คณิตศาสตร์และสถิติเพื่องานอาชีพ</option> 
              <option value="30001406">3000-1406 : แคลคูลัสพื้นฐาน</option>
              <option value="30001408">3000-1408 : สถิติและการวางแผนการทดลอง</option>
              <option value="30001409">3000-1409 : การคิดและการตัดสินใจ</option> 
              <option value="x">ไม่มี</option>  
          </select>
        </td>
      </tr>

          
      <tr>
        <td>
          <input type="submit" name="submit" value="บันทึก" class="btn btn-success btn-block">
        </td>
      </tr>

          
         
     </form>
        </table></div></div></div>


       
       
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>
  

  <div class="modal fade" id="myModallistct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">รายการเทียบโอน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->

      <div class="modal-body" id="listct">
<?php 


  $sqlstd = "SELECT year_structer FROM student WHERE std_id = '".$_SESSION['std_id']."' ";
    $rsstd = mysqli_query($objCon,$sqlstd);
    while ($datastd = mysqli_fetch_array($rsstd)) {
      $std_years = $datastd['year_structer'];     
  }

  if ($std_years =='2557') {
    # code...
  
        $listct = "SELECT credit_transfer_57.subject_ct_id57,credit_transfer_57.subject_ct_name,credit_transfer_57.credit,credit_transfer_57.year FROM credit_transfer_57,credit_transfer_std57 WHERE credit_transfer_std57.subject_ct_id = credit_transfer_57.subject_ct_id57 and credit_transfer_std57.std_id='".$_SESSION['std_id']."' ";
        $listct = mysqli_query($objCon,$listct);
        ?><div class="container">
    <div class="row">
   <div class='table table-responsive' align='center' >
         <table class='table' table-boardered>
          <tr>
<th scope='col'>รหัสวิชา</th>
<th scope='col'>ชื่อวิชา</th>
<th scope='col'>หน่วยกิต</th>
<th scope='col'>ปีของหลักสูตร</th>
<th scope='col'>ลบ</th>
</tr><?php 
$i=0;
while($row = mysqli_fetch_array($listct)){
  $i++;
  $sgid = $row['subject_ct_id57'];
  $cutstr = substr($sgid,0,4);
            $cutstr2 = substr($sgid,4,7);
            $subjectID =$cutstr."-".$cutstr2;
?> <tr class='bg-light'>
  <td><?php echo $subjectID; ?></td>
   <td><?php echo $row['subject_ct_name']; ?></td>
    <td><?php echo $row['credit']; ?></td>
     <td><?php echo $row['year']; ?></td>
     <td><a  class="btn btn-xs btn-danger" href="deletelist.php?subject_ct_id57=<?php echo $row["subject_ct_id57"];?>">ลบ</a></td> 
   </tr>

<?php 
}
?>
</table></div></div></div>


<?php
}



else if ($std_years =='2545'){
  $listct = "SELECT credit_transfer.subject_ct_id45,credit_transfer.subject_ct_name,credit_transfer.credit,credit_transfer.year FROM credit_transfer,credit_transfer_std WHERE credit_transfer_std.subject_ct_id_std = credit_transfer.subject_ct_id45 and credit_transfer_std.std_id='".$_SESSION['std_id']."' ";
        $listct = mysqli_query($objCon,$listct);
        ?><div class="container">
    <div class="row">
   <div class='table table-responsive' align='center' >
         <table class='table' table-boardered>
          <tr>
<th scope='col'>รหัสวิชา</th>
<th scope='col'>ชื่อวิชา</th>
<th scope='col'>หน่วยกิต</th>
<th scope='col'>ปีของหลักสูตร</th>
<th scope='col'>ลบ</th>
</tr><?php 
$i=0;
while($row = mysqli_fetch_array($listct)){
  $i++;
  $sgid = $row['subject_ct_id_std'];
  $cutstr = substr($sgid,0,4);
            $cutstr2 = substr($sgid,4,7);
            $subjectID =$cutstr."-".$cutstr2;
?> <tr class='bg-light'>
  <td><?php echo $subjectID; ?></td>
   <td><?php echo $row['subject_ct_name']; ?></td>
    <td><?php echo $row['credit']; ?></td>
     <td><?php echo $row['year']; ?></td>
     <td><a  class="btn btn-xs btn-danger" href="deletelist45.php?subject_ct_id45=<?php echo $row["subject_ct_id45"];?>">ลบ</a></td> 
   </tr>

<?php 
}
?>
</table></div></div></div>


<?php



}


?>
       
  
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModalinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">รายการเทียบโอน</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->

      <div class="modal-body" id="listct">
<form action="insertja.php" name="frmAdd" method="post"> 
    <!-- sj_id-->
    <?php $sql2 = "SELECT subject_id,subject_name from subject";
    $rs1 = mysqli_query($objCon,$sql2);
    ?>
   <table width="399" >
    <tr>
      <td >
      <div class="input-group mb-3">
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">รหัสวิชา - ชื่อวิชา</label>
    </div>
    <select class="custom-select" type="text" name="subject_std_id" >
    <?php while($row1 = mysqli_fetch_array($rs1)){
      $sgid = $row1['subject_id'];
            
            $cutstr = substr($sgid,0,3);
            $cutstr2 = substr($sgid,3,6);
            $subjectID =$cutstr."-".$cutstr2;?>
    <option value="<?php echo $row1["subject_id"];?>"><?php echo $subjectID; ?> : <?php echo $row1["subject_name"]; ?></option>
    <?php } ?> 
    </select>
     </div>
     </td>
     </tr>
    <!--end_sj_id -->
    <!--std_id -->
    <tr>
      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <?php 
      $std_id = $_SESSION["std_id"];

      ?>
    <span class="input-group-text" >รหัสนักศึกษา </span>
    </div> 
    <input class="form-control"  type="text" name="std_id" value="<?php echo $std_id;?>" >

    </div>
    </td>
     </tr>
    <!--end std_id -->
    <!--grade -->
    <tr>

      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >เกรด</span>
    </div> 
    <select class="custom-select" type="text" name="Grade" >
        <option value="เลือกเกรด">เลือกเกรด</option>
       <option value="A">A</option>
       <option value="B">B</option>
       <option value="B+">B+</option>
       <option value="C">C</option>
       <option value="C+">C+</option>
       <option value="D">D</option>
       <option value="D+">D+</option> 
       
    </select>
    <!--<input class="form-control" pattern="[A,B+,B,C+,C,D,D+,E]{1,}" value="A" type="text" name="Grade" >-->
    </div>
    </td>
     </tr>
     <tr>
      <td>
     <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >ประเภทวิชา</span>
    </div>
    <select class="custom-select" type="text" name="subject_type" >
        <option value="">เลือกประเภทวิชา</option>
       <option value="C">C</option>
       <option value="A">A</option>
    
    </select>
    </div>
     </td>
      </tr>
</table>
    <br>
    <!--endgrade -->
  <input type="submit" name="submit" value="บันทึก" class="btn btn-success"> 

</form>  

<br>
 

        </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ปิด</button>
        
      </div>
    </div>
  </div>
</div>




   
  
  





<!-- Bootstrap core JavaScript-->
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


   
    


  </body>
  
  <script >
    $(document).ready(function(){
      $('.view_data').click(function(){
        var gid="general1";
        $.ajax({
          url:"selecttest1.php",
          method:"post",
          data:{gid},
          success:function(data){
            $('#detail').html(data)
            $('#modalCart').modal('show').css('overflow-y', 'auto');
          }
        });

      });
      $('.view_data2').click(function(){
        var gid="general2";
        $.ajax({
          url:"selecttest2.php",
          method:"post",
          data:{gid},
          success:function(data){
            $('#detail').html(data)
            $('#modalCart').modal('show').css('overflow-y', 'auto');
          }
        });

      });
      $('.view_data3').click(function(){
        var gid="general3";
        $.ajax({
          url:"selecttest3.php",
          method:"post",
          data:{gid},
          success:function(data){
            $('#detail').html(data)
            $('#modalCart').modal('show').css('overflow-y', 'auto');
          }
        });

      });
      $('.view_data4').click(function(){
        var gid="general4";
        $.ajax({
          url:"selecttest4.php",
          method:"post",
          data:{gid},
          success:function(data){
            $('#detail').html(data)
            $('#modalCart').modal('show').css('overflow-y', 'auto');
          }
        });

      });

      $('.view_review').click(function(){
        var gid=$(this).attr("id");
        $.ajax({
          url:"selecttest.php",
          method:"post",
          data:{id:gid},
          success:function(data){
            $('#review').html(data)
            $('#modalCart2').modal('show').css('overflow-y', 'auto');
            
          }
        });

      });


    });

    


  </script>

</html>

<?php
	mysqli_close($objCon);
?>