
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<style >
  .modal_update_std{
    position: relative;
  }

</style>
<div class="modal fade" id="modalupdatestd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">


  <div class="modal-dialog modal-xs " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายวิชา 
        </h4>
       
    
      </div>
      <!--Body-->
      <div class="modal-body" id="update">

        <form method="post" name="frmedite" action="edit_subject.php" >
<div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >รหัสวิชา</span>
    </div>      
        <input type="text" name='sid' id='sid' class="form-control" readonly > 
    </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >เกรด</span>
    </div>      
        <input type="text" name='sgrade' id='sgrade' class="form-control" > 
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" >ประเภทวิชา</span>
    </div>      
        <input type="text" name='stype' id='stype' class="form-control" > 
    </div>
    <input type="submit" name="submit" value="submit" class="btn btn-success"> 

</form>


      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-number="2">Close</button>
        
      </div>
    </div>
  </div>
</div>


 
<script>
   $("button[data-number=2]").click(function(){
    $('#modalupdatestd').modal('hide');
});
   
 </script>


