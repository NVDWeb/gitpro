<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- sidebar menu -->
      <!-- /sidebar menu -->
      <!-- top navigation -->
      <?php $this->load->view('admin/top-navigation');?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="boday_main">
        <div class="main_container01">
          <div class="right_col" role="main">
       <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Milestone Amount Details</h2>
                  <div class="clearfix"></div>
                </div>
                <?php //echo '<pre>';print_r($splitData);?>
                <div class="x_content">
                  <?php if(!empty($splitData)){?>
                    <div class="bid_01"><div class="bid_01_half"><label>Milestone Name</label></div>
                     <?php echo $splitData[0]->milestone_name;?>
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Milestone created By</label></div>
                     <?php if($this->session->userdata('admin_user_type')==2) { echo $splitData[0]->clientName; } else { echo $splitData[0]->first_name ; } ?>
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Project Name</label></div>
                     <?php echo $splitData[0]->project_name;?>
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Amount</label></div>
                     <?php echo $splitData[0]->amount;?>
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Proyourway Service Charge</label></div>
                     7.5 %
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Total Amount Recieved</label></div>
                     <?php $t= $splitData[0]->amount*7.5;  $ttt = $t/100 ; echo $splitData[0]->amount-$ttt.' AUD' ;?>
                    </div>



                    <div class="bid_01"><div class="bid_01_half"><label>Your Action</label></div>
                     <button class="btn btn-primary" onClick="acceptSplitAmount(<?php echo $splitData[0]->id;?>,1);">Accept</button>  | <button class="btn btn-primary" onClick="acceptSplitAmount(<?php echo $splitData[0]->id;?>,2);">Reject</button>
                    </div>
                    <?php } else{ ?>
                    <div class="bid_01"><div class="bid_01_half"><label>No Data Found</label></div>
                     
                    </div>
                  <?php }?>
                  </div>
                  
              </div>

              </div>





                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<!--Ends Her-->
<!-- Acceptence popup Start here -->
<div class="modal fade bs-example-modal-lgAcceptMilestone" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1CancelMilestone"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Split Amount Accept</h4>
      </div>
      <div class="modal-body">
        Great, You have accepted the Amount a mail of confirmation has sent to the Team Admin about your Acceptence.
      </div>
      <div class="modal-footer" style="text-align: center;">

        <button type="button" class="btn btn-primary" id="ok">Ok</button>
      </div>

    </div>
  </div>
</div>
<!--Ends Here -->

<!-- Acceptence popup Start here -->
<div class="modal fade bs-example-modal-lgAcceptMilestoneError" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1CancelMilestoneError"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Split Amount Accept Error</h4>
      </div>
      <div class="modal-body">
        OOPS ! , You can not accept the Split Amount as the Milestone is Closed.
      </div>
      <div class="modal-footer" style="text-align: center;">

        <button type="button" class="btn btn-primary" id="okError">Ok</button>
      </div>

    </div>
  </div>
</div>
<!--Ends Here -->


<!-- Acceptence popup Start here -->
<div class="modal fade bs-example-modal-lgRejectMilestone" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close1" id="close1CancelMilestone"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Split Amount Reject</h4>
      </div>
      <div class="modal-body">
        OOPS ! , You have rejected the Split Amount, A mail of rejection has sent to the Team Admin.
      </div>
      <div class="modal-footer" style="text-align: center;">

        <button type="button" class="btn btn-primary" id="ok1">Ok</button>
      </div>

    </div>
  </div>
</div>
<!--Ends Here -->



<!--delete services script-->
<script type="text/javascript">
$(document).ready(function() {
  $("#close").click(function() {
    $(".bs-example-modal-lgAcceptMilestone").modal('hide');
   location.href="<?php echo base_url();?>admin/dashboard";
  });

  $("#ok").click(function() {
    $(".bs-example-modal-lgAcceptMilestone").modal('hide');
    location.href="<?php echo base_url();?>admin/dashboard";
  });

  $("#closeError").click(function() {
    $(".bs-example-modal-lgAcceptMilestoneError").modal('hide');
   location.href="<?php echo base_url();?>admin/dashboard";
  });

  $("#okError").click(function() {
    $(".bs-example-modal-lgAcceptMilestoneError").modal('hide');
    location.href="<?php echo base_url();?>admin/dashboard";
  });

  $("#close1").click(function() {
    $(".bs-example-modal-lgRejectMilestone").modal('hide');
    location.href="<?php echo base_url();?>admin/dashboard";
  });

  $("#ok1").click(function() {
    $(".bs-example-modal-lgRejectMilestone").modal('hide');
    location.href="<?php echo base_url();?>admin/dashboard";
  });

});

function acceptSplitAmount(splitId,status){
  if(status==1){
    $.ajax({
      type:"post",
      url: "<?php echo base_url();?>admin/milestone/acceptSplitAmount",
      data:{splitId:splitId,status:status},
      success:function(data){
        if(data=='success'){
          $(".bs-example-modal-lgAcceptMilestone").modal();
        }else{
          $(".bs-example-modal-lgAcceptMilestoneError").modal();
        }

      }
    });
  }else{
    $.ajax({
      type:"post",
      url: "<?php echo base_url();?>admin/milestone/acceptSplitAmount",
      data:{splitId:splitId,status:status},
      success:function(data){
        if(data=='success'){
          $(".bs-example-modal-lgRejectMilestone").modal();
        }
      }
    });
  }
}



</script>
