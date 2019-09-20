<?php
	include("connectdb.php");
   
    
	session_start();
	if($_SESSION['std_id'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['status'] != "admin")
	{
		echo "This page for Admin only!";
		exit();
	}	
	
	

	$strSQL = "SELECT structerit_g.* ,subject.* FROM structerit_g,subject ";
	$objQuery = mysqli_query($objCon,$strSQL);
	if(!$objQuery  ){

          echo mysqli_error($objCon);
         }
         		         	
        
?>
<html>
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
  <link rel="stylesheet2" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<title>Admin</title>


<!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
     div#content {
  margin: 5px;
  padding: 10px;
  background-color: lightgrey;
} 
label {
    display: block;
    text-align: center;
    
}
#chart_wrap {
    position: relative;
    padding-bottom: 100%;
    height: 0;
    overflow:hidden;
}

#piechart {
    position: absolute;
    top: 0;
    left: 0;
    width:100%;
    height:500px;
}

    </style>
</head>
<body>

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="admin_page.php">Check Credit Admins</a>

      
      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
          
          </div>
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

<?php require 'modaladmin.php'; ?>
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalmanual">คู่มือการใช้งาน</button>

            </li>
            
            
          </ol>
</div></div>


<div class="container">
  <div class="row">
   <div class='table table-responsive' align='center' >
         <table class='table' table-boardered><thead class='thead-light'><tr><th width='30%'><label>รหัสวิชา</label></th>
                       
                       <th scope='col'><label>ชื่อวิชา</label></th>
                       <th scope='col'><label>หน่วยกิต</label></th>
                          
                             <th scope='col'><label>หมวดวิชา</label></th>
                                <th scope='col'><label>แก้ไข</label></th>
                       <th scope='col'><label>ลบ</label></th>
                       
                      
                       </tr></thead>
                       <?php
            
  while ($data = mysqli_fetch_array($objQuery)) {
            $g11=$data['g11'];
            $g12=$data['g12'];
            $g13=$data['g13'];
            $g14=$data['g14'];
            $g21=$data['g21'];
            $g22=$data['g22'];
            $g31=$data['g31'];
            $g32=$data['g32'];
            $g41=$data['g41'];
            $g42=$data['g42'];
            $g43=$data['g43'];
            $g44=$data['g44'];
            $g45=$data['g45'];
            $g46=$data['g46'];
           $gg=$data["subject_id"];
            ?></tr></thead><tr class='bg-light'>
        <td><?php echo $data["subject_id"]; ?></td> 
        <td><?php echo $data["subject_name"];?></td>  
        <td><?php echo $data["credit"]; ?> </td> 
       
         <td><?php echo $data["subject_group"]; ?></td> 
 
        <td><a  class="btn btn-xs btn-warning" href="deleteadmin.php?subject_id=<?php echo $data["subject_id"];?>" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">ลบ</a></td> 
  
 
<td>
  <input type="button" name="edit" value="แก้ไขวิชา" class="btn btn-info btn-xs edit_data" id ="<?php echo $data["subject_id"];?>"/></td>



</tr>



<?php

         } 
 ?>
 </table></div></div>
<div class="container">
 <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">เพิ่มรายวิชา</button><br>
<!--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#mysModalx">เพิ่มรายวิชา</button> -->
</div>



          
             
</div> 
          
<br>
<div id="content">
  <label align="center">โครงสร้างหลักสูตรหมวดวิชาทั่วไป (หน่วยกิต)</label>
  <div class='table table-responsive'  >
  <table class="table table-striped" style='font-size:90%' >
  	<thead >
    <tr >
      <th scope="col" >บังคับ มนุษย์ศาสตร์-สังคมศาสตร์</th>
      <th scope="col" >กิจกรรมเสริมหลักสูตร</th>
      <th scope="col">กิจกรรมพลศึกษา</th>
      <th scope="col">วิชาเลือก มนุษย์ศาสตร์-สังคมศาสตร์</th>
      <th scope="col" >บังคับ วิทยาศาสตร์-คณิตศาสตร์</th>
      <th scope="col" >วิชาเลือก วิทยาศาสตร์-คณิตศาสตร์</th>
      <th scope="col" >บังคับ ภาษา</th>
      <th scope="col" >วิชาเลือก ภาษา</th>
      </tr>
      
  </thead>
    <tbody>
      <tr>
        <td width="200"><?php echo $g11;?> หน่วยกิต</td>
        <td width="197"><?php echo $g12;?> หน่วยกิต</td>
        <td width="197"><?php echo $g13;?> หน่วยกิต</td>
        <td width="197"><?php echo $g14;?> หน่วยกิต</td>
        <td width="197"><?php echo $g21;?> หน่วยกิต</td>
        <td width="197"><?php echo $g22;?> หน่วยกิต</td>
        <td width="197"><?php echo $g31;?> หน่วยกิต</td>
        <td width="197"><?php echo $g32;?> หน่วยกิต</td>
      </tr>
      <tr>
        <td colspan="9"><button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal2" >แก้ไขโครงสร้างหมวดวิชาทั่วไป</button></td>
      </tr>

    </tbody>
  </table>
   <label align="center">โครงสร้างหลักสูตรหมวดวิชาเฉพาะ (หน่วยกิต)</label>
  <div class='table table-responsive'  >
  <table class="table table-striped" style='font-size:90%' >
      <thead>
        
        <tr>
     
      <th scope="col" >วิชาแกน</th>
      <th scope="col" >กลุ่มประเด็นด้านองค์การและระบบสารสนเทศ</th>
      <th scope="col" >กลุ่มเทคโนโลยีเพื่องานประยุกต์</th>
      <th scope="col" >กลุ่มเทคโนโลยและวิธีการทางซอฟต์แวร์</th>
      <th scope="col" >กลุ่มโครงสร้างพื้นฐานของระบบ</th>
      <th scope="col" >วิชาเลือกหมวดวิชาเฉพาะ</th>
    </tr>
      </thead>
       <tbody>
      <tr>
        

        <td width="197"><?php echo $g41;?> หน่วยกิต</td>
        <td width="197"><?php echo $g42;?> หน่วยกิต</td>
        <td width="197"><?php echo $g43;?> หน่วยกิต</td>
        <td width="197"><?php echo $g44;?> หน่วยกิต</td>
        <td width="197"><?php echo $g45;?> หน่วยกิต</td>
        <td width="197"><?php echo $g46;?> หน่วยกิต</td>
      </tr>
      <tr>
        <td colspan="9"><button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal3" >แก้ไขโครงสร้างหมวดวิชาเฉพาะ</button></td>
      </tr>
   
    </tbody>
  </table>
</div>
<div id="chart_wrap">
    <div id="piechart"></div>
</div>
<div class="modal fade" id="mymodal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-m " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">แก้ไขโครงสร้างหมวดวิชาทั่วไป</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" id="detail">

       <form method="post" name="frmupdate1" action="updatestructer.php">
        

        <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >บังคับ มนุษย์ศาสตร์-สังคมศาสตร์</span>
    </div>      
        <input type="text" name='g11' id='g11' class="form-control" placeholder="<?php echo $g11;?>" > 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กิจกรรมเสริมหลักสูตร</span>
    </div>      
        <input type="text" name='g12' id='g12' class="form-control" placeholder="<?php echo $g12;?>" > 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กิจกรรมพลศึกษา</span>
    </div> 
        <input type="text" name='g13' id='g13' class="form-control" placeholder="<?php echo $g13;?>" >
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div>  
    </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >วิชาเลือก มนุษย์ศาสตร์-สังคมศาสตร์</span>
    </div> 
        <input type="text" name='g14' id='g14' class="form-control" placeholder="<?php echo $g14;?>">   
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div>    
      </div>
      <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >บังคับ มนุษย์ศาสตร์-สังคมศาสตร์</span>
    </div>      
        <input type="text" name='g21' id='g21' class="form-control" placeholder="<?php echo $g21;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >วิชาเลือก วิทยาศาสตร์-คณิตศาสตร์</span>
    </div>      
        <input type="text" name='g22' id='g22' class="form-control" placeholder="<?php echo $g22;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >วิชาบังคับ ภาษา</span>
    </div>      
        <input type="text" name='g31' id='g31' class="form-control" placeholder="<?php echo $g31;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >วิชาเลือก ภาษา</span>
    </div>      
        <input type="text" name='g32' id='g32' class="form-control" placeholder="<?php echo $g32;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
     <input type="submit" name="submit" value="submit" class="btn btn-success"> 
</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        
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

        
        
         <img src="manual/gadmin.png" alt="Nature" style=" width: 100%;height: auto;"><br>
        
    
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="mymodal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-m " role="document">
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
  <form method="post" name="frmupdate2" action="updatestructer.php">
        <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >วิชาแกน</span>
    </div>      
        <input type="text" name='g41' id='g41' class="form-control" placeholder="<?php echo $g41;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
            <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กลุ่มประเด็นด้านองค์การและระบบสารสนเทศ</span>
    </div>      
        <input type="text" name='g42' id='g42' class="form-control" placeholder="<?php echo $g42;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
        <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กลุ่มเทคโนโลยีเพื่องานประยุกต์</span>
    </div>      
        <input type="text" name='g43' id='g43' class="form-control" placeholder="<?php echo $g43;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
        <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กลุ่มเทคโนโลยและวิธีการทางซอฟต์แวร์</span>
    </div>      
        <input type="text" name='g44' id='g44' class="form-control" placeholder="<?php echo $g44;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
        <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กลุ่มโครงสร้างพื้นฐานของระบบ</span>
    </div>      
        <input type="text" name='g45' id='g45' class="form-control" placeholder="<?php echo $g45;?>"> 
        <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
        <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >วิชาเลือกหมวดวิชาเฉพาะ</span>
    </div>      
        <input type="text" name='g46' id='g46' class="form-control" placeholder="<?php echo $g46;?>"> 
         <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
    </div>
     <input type="submit" name="submit" value="submit" class="btn btn-success"> 
</form>


      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        
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
        <form action = "insertexadmin.php" method="post" name="frmexcel" enctype="multipart/form-data">
        <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >ไฟล์ Excel </span>
    </div> 
    <input class="form-control"  type="File" name="fileexcel"  >

    </div>
<input type="submit" name="submit" value="submit" class="btn btn-success"> 
</form>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        
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

          <form action="insertAdmin.php" name="frmAdd" method="post" enctype="multipart/form-data">
          <div class="table-responsive"> 
          <!-- insert -->         
     
    <!-- sj_id-->
    
   <table width="399" >
    <tr>
      <td >
      <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >รหัสวิชา </span>
    </div> 
    <input class="form-control"  type="text" name="subject_id"  >

    </div>
     </td>
     </tr>


    <tr>
      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >ชื่อวิชา </span>
    </div> 
    <input class="form-control"  type="text" name="subject_name"  >

    </div>
    </td>
     </tr>


    <tr>

      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต </span>
    </div> 
    <select class="custom-select" type="text" name="credit" >
        <option value="เลือกเกรด">เลือกหน่วยกิต</option>
       <option value="3">3</option>
       <option value="2">2</option>
       <option value="1">1</option>
       
    </select>
    </div>
    </td>
     </tr>
     
     <tr>
      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >หมวดวิชา</span>
    </div> 

    <select class="custom-select" type="text" name="subject_group" >
        <option >เลือกหมวดวิชา</option>
       <option value="G11">เลือกเรียน : หมวดมนุษศาสตร์และสังคมศาสตร์ (G11)</option>
       <option value="G12">กิจกรรมเสริมหลักสูตร (G12)</option>
       <option value="G13">กิจกรรมพลศึกษา (G13)</option>
       <option value="G14">วิชาเลือก : หมวดมนุษศาสตร์และสังคมศาสตร์ (G14)</option>
       <option value="G21">เลือกเรียน : หมวดวิทยาศาสตร์และคณิตศาสตร์ (G21)</option>
       <option value="G22">วิชาเลือก : หมวดวิทยาศาสตร์และคณิตศาสตร์ (G22) </option>
       <option value="G31">เลือกเรียน : หมวดภษา (G31)</option>
       <option value="G32">วิชาเลือก : หมวดภาษา (G32)</option>
       <option value="G41">วิชาแกน (G41)</option>
       <option value="G42">กลุ่มประเด็นด้านองค์การและระบบสารสนเทศ (G42)</option>
       <option value="G43">กลุ่มเทคโนโลยีเพื่องานประยุกต์ (G43)</option>
       <option value="G44">กลุ่มเทคโนโลยและวิธีการทางซอฟต์แวร์ (G44)</option>
       <option value="G45">กลุ่มโครงสร้างพื้นฐานของระบบ (G45)</option>
       <option value="G46">วิชาเลือกเฉพาะด้าน (G46)</option>
    </select>
    </div>
    </td>
     </tr>
     <tr>
     <td>
     
     
     <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กลุ่มวิชา</span>
    </div> 
     <select class="custom-select" type="text" name="ctgy" >
        <option value="">เลือกหมวดวิชา</option>
       <option value="general1">หมวดมนุษย์ศาสตร์และสังคมศาสตร์</option> 
       <option value="general2">หมวดวิทยาศาสตร์และคณิตศาสตร์</option> 
       <option value="general3">หมวดภาษา </option>
       <option value="general4">หมวดวิชาเฉพาะ</option> 
    </select>
    </div>
     </td>
     </tr>
  
     <tr>
      <td >
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      
    <span class="input-group-text" >รายละเอียดวิชา </span>
    </div> 
    
    <textarea rows="4" cols="50" class="form-control" name="detail" ></textarea>

    </div>
    </td>
     </tr>
     <tr>
      <td >
    <div class="input-group mb-3">
           <span class="input-group-text" >รูปภาพ </span>
    <div class="input-group-prepend">
      

    </div> 

   <input type="file" name="image"><br>

    </div>
    </td>
     </tr>
     
</table>

     <!--<button type="button" class="btn btn-outline-primary btn-l btn-block" name="upload">เพิ่มเติม</button><br>-->
  
    <!--endgrade -->
  <input type="submit" name="submit" value="submit" class="btn btn-success"> 
</form>  





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>     
    </div>
  </div>


  





  <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
 <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  
  <!--  Plugins -->
  <script src="assets/js/ct-paper-checkbox.js"></script>
  <script src="assets/js/ct-paper-radio.js"></script>
  <script src="assets/js/bootstrap-select.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  
  <script src="assets/js/ct-paper.js"></script>    



</body>
<?php 

$chartsql = " SELECT  subject_student.subject_std_id,COUNT(subject_student.subject_std_id) AS sj_std_id ,subject.subject_name FROM subject_student,subject where subject_student.subject_std_id = subject.subject_id GROUP BY subject_student.subject_std_id HAVING (COUNT(subject_student.subject_std_id) >=1 ) ORDER BY COUNT(subject_student.subject_std_id) DESC LIMIT 5 ";

$chartrs = mysqli_query($objCon,$chartsql);

?>

           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['subject_std_id', 'sj_std_id'],  
                          <?php  
                          while($row = mysqli_fetch_array($chartrs))  
                          {  
                               echo "['".$row["subject_name"]."', ".$row["sj_std_id"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  


                      title: "กราฟแสดง 5อันดับ ที่มีการลงทะเบียนมากที่สุด",  
                      colors: ['#FF5F84', '#36A2EB', '#FFD056', '#41f44f','#41e8f4'],
                      pieHole: 0.4 ,
                      width: '100%',
                      height: '500px' ,
                      chartArea: {
            left: "6%",
            top: "6%",
            height: "60%",
            width: "60%"
        }
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
          
           </script> 
<script>

$(document).ready(function(){
      $('.edit_data').click(function(){
        var gid=$(this).attr("id");
        $.ajax({
          url:"fetch.php",
          method:"post",
          data:{id:gid},
          dataType:"json",
          success:function(data){
            $('#sid').val(data[0]);
            $('#sname').val(data[1]);
            $('#scd').val(data[2]);
           
            $('#sgroup').val(data[3]);
            $('#modaladmin').modal('show');

          }
        });
      });
 });




 </script>

</html>
<?php
	mysqli_close($objCon);
?>