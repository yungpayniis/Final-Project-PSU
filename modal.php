
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/style.css">



<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">


  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">รายวิชา 
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" id="detail">
<?php require 'modalreview2.php'; ?>
<?php require 'modal_update_std.php'; ?>


      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-number="1">Close</button>
        
      </div>
    </div>
  </div>
</div>
 <script src="js/index.js"></script>

 <script>
   $("button[data-number=1]").click(function(){
    $('#modalCart').modal('hide');
});

 </script>
 


<?php //require 'selecttest1.php'; ?>
<div class="modal fade" id="modalCart5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
      <div class="modal-body" id="detail">

      

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

