



<div class="modal fade" id="modaladmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">แก้ไข </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body"  >
        
        <form method="post" name="frmupdate" action="updateadmin.php" enctype="multipart/form-data">
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >รหัสวิชา</span>
    </div>      
        <input type="text" name='sid' id='sid' class="form-control" > 
    </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >ชื่อวิชา</span>
    </div> 
        <input type="text" name='sname' id='sname' class="form-control" > 
    </div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >หน่วยกิต</span>
    </div> 
        <input type="text" name='scd' id='scd' class="form-control" > 
        <br>
      </div>


<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >หมวดวิชา</span>
    </div> 
     <select class="custom-select" type="text" name="sgroup" >
        <option value="">เลือกหมวดวิชา </option>
       <option value="G11">เลือกเรียน : หมวดมนุษศาสตร์และสังคมศาสตร์ (G11)</option> <!-- เลือกเรียน 6 หน่วย มนุษศาสตร์ สังคมศาสตร์-->
       <option value="G12">กิจกรรมเสริมหลักสูตร (G12)</option> <!-- กิจกรรมเสริมหลักสูตร 1 หน่วยกิต-->
       <option value="G13">กิจกรรมพลศึกษา (G13)</option> <!-- กิจกรรมพลศึกษา 1 หน่วยกิต-->
       <option value="G14">วิชาเลือก : หมวดมนุษศาสตร์และสังคมศาสตร์ (G14)</option> <!-- วิชาเลือก 4 หน่วยกิต มนุษศาสตร์ สังคมศาสตร์ -->
       <option value="G21">เลือกเรียน : หมวดวิทยาศาสตร์และคณิตศาสตร์ (G21)</option> <!-- เลือกเรียน 3 หน่วย วิทยาศาส คณิตศาสตร์-->
       <option value="G22">วิชาเลือก : หมวดวิทยาศาสตร์และคณิตศาสตร์ (G22) </option> <!-- วิชาเลือก 3 หน่วยกิต วิทยาศาส คณิตศาสตร์ -->
       <option value="G31">เลือกเรียน : หมวดภาษา (G31)</option> <!-- เลือกเรียน 6 หน่วย ภาษา-->
       <option value="G32">วิชาเลือก : หมวดภาษา (G32)</option> <!-- วิชาเลือก 6 หน่วยกิต ภาษา -->
       <!-- ========================วิชาภาค=======================-->
       <option value="G41">วิชาแกน (G41)</option> <!-- วิชาแกน 9 หน่วยกิต-->
       <!-- วิชาเฉพาะด้าน 60 หน่วย-->
       <option value="G42">กลุ่มประเด็นด้านองค์การและระบบสารสนเทศ (G42)</option> <!-- 9 หน่วยกิต-->
       <option value="G43">กลุ่มเทคโนโลยีเพื่องานประยุกต์ (G43)</option> <!-- 33 หน่วยกิต-->
       <option value="G44">กลุ่มเทคโนโลยและวิธีการทางซอฟต์แวร์ (G44)</option> <!-- 12 หน่วยกิต-->
       <option value="G45">กลุ่มโครงสร้างพื้นฐานของระบบ (G45)</option> <!-- 6 หน่วยกิต-->
       <!-- วิชาเลือกเฉพาะด้าน 18 หน่วย-->
       <option value="G46">วิชาเลือกเฉพาะด้าน (G46)</option> <!-- 18 หน่วยกิต-->    
    </select>
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >กลุ่มวิชา</span>
    </div> 

     <select class="custom-select" type="text" name="ctgy" >
        <option value="">เลือกหมวดวิชา</option>
       <option value="general1">หมวดวิชามนุษย์ศาสตร์และสังคมศาสตร์</option> 
       <option value="general2">หมวดวิชาวิทยาศาสตร์และคณิตศาสตร์</option> 
       <option value="general3">หมวดวิชาภาษา</option>
       <option value="general4">หมวดวิชาเฉพาะ</option> 
    </select>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">     
    <span class="input-group-text" >รายละเอียดวิชา </span>
    </div>    
    <textarea rows="4" cols="50" class="form-control" name="detail" ></textarea>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
    </div> 
   <input type="file" name="image2" id="image2"><br>

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
<!-- Modal: modalCart -->
