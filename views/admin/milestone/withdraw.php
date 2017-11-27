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
                  <h2>Withdraw Amount Details</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php
                  // /echo '<pre>';print_r($withdrawData);

                  $totalRealAmount = 0;
                  $totalDeductedAmount = 0;
                  foreach ($withdrawData as $value) {
                    $totalRealAmount = @$totalRealAmount + @$value->amount;
                    $totalDeductedAmount = @$totalDeductedAmount + @$value->accepted_amount;
                  }
                  ?>
                  <input type="hidden" id="is_admin" value="<?php echo $withdrawData['team_admin'];?>">
                    <!-- <div class="bid_01"><div class="bid_01_half"><label>Total Amount</label></div>
                     <?php echo $totalRealAmount;?>
                    </div> -->

                    <!-- <div class="bid_01"><div class="bid_01_half"><label>Proyourway Service Charge</label></div>
                     10%
                    </div> -->

                    <div class="bid_01"><div class="bid_01_half"><label>Payable Amount</label></div>
                     <?php if($withdrawData['team_admin']='no') {
                       $payable_amount = $totalDeductedAmount;
                     }else{
                       //$payable_amount = $totalRealAmount - $totalDeductedAmount;
                      $payable_amount = $totalDeductedAmount;
                     } echo $payable_amount; ?>
                     <input type="hidden" id="payable_amount" value="<?php echo $payable_amount;?>">
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Select Payment Method</label></div>
                     <select id="select_payment_method" onchange="getPaymentDetails(this.value);">
                       <option value="0">Choose Payment Method</option>
                       <option value="1">Paypal</option>
                       <option value="2">Bank Account</option>
                     </select>
                    </div>

                    <div class="bid_01" id="res">

                    </div>
                    <input type="hidden" id="paidT" value="">
                    <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('adminId');?>"
                    <div class="bid_01" id="acti" style="display:none;"><div class="bid_01_half"><label>Your Action</label></div>
                     <button class="btn btn-primary" id="request" onclick="requestWithdraw();">Request Withdraw</button>
                    </div>

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

function getPaymentDetails(payment_method){
  if(payment_method!=0){
    $("#paidT").val(payment_method);
    $.ajax({
      type:"post",
      url: "<?php echo base_url();?>admin/milestone/getPaymentDetails",
      data:{payment_method:payment_method},
      success:function(data){
        $("#res").html(data);
        $("#acti").show();
        // if(data=='success'){
        //   $(".bs-example-modal-lgAcceptMilestone").modal();
        // }else{
        //   $(".bs-example-modal-lgAcceptMilestoneError").modal();
        // }

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

function requestWithdraw(){
  var type = $("#paidT").val();
  var user_id = $("#user_id").val();
  var payable_amount = $("#payable_amount").val();
  var is_admin = $("#is_admin").val();
  if(type==1){
    var paypal_email = $("#paypal_email").val();
    if(paypal_email == undefined){
      alert('You must have a paypal account to withdraw amount.');
    }else{
      $("#request").attr('disabled',true);
      /*Request will send to proyourway to pay in Paypal*/
      $.ajax({
        type:"post",
        url: "<?php echo base_url();?>admin/milestone/requestWithdraw",
        data:{paypal_email:paypal_email,user_id:user_id,type:type,payable_amount:payable_amount,is_admin:is_admin},
        success:function(data){
          if(data=='Success'){
            window.location.href="<?php echo base_url();?>admin/dashboard";
          }else{
            $("#request").attr('disabled',false);
          }
        }
      });
    }
  }else{
    var bank_account = $("input[name='bank_account']:checked"). val();
    if(bank_account == undefined){
      alert("You must select / Have a Bank Account to withdraw amount.");
    }else{
      /*Request will send to proyourway to pay in Bank account*/
      $.ajax({
        type:"post",
        url: "<?php echo base_url();?>admin/milestone/requestWithdraw",
        data:{bank_account:bank_account,user_id:user_id,type:type,payable_amount:payable_amount,is_admin:is_admin},
        success:function(data){
          if(data=='Success'){
            window.location.href="<?php echo base_url();?>admin/dashboard";
          }
        }
      });
    }
  }
}


</script>
