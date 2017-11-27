  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- sidebar menu -->
            <?php //$this->load->view('admin/left-sidebar');?>
            <!-- /sidebar menu -->
            <!-- top navigation -->
        <?php $this->load->view('admin/top-navigation');?>
        <!-- /top navigation -->

        <div class="boday_main">
        	<div class="main_container01">
            	<!-- page content -->
        		<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title page_tit">
                    <h2>Bank Accounts
                    <?php //echo '<pre>'; print_r($bankList);?>
                    <?php if(!empty($bankList[0]->account_type) != 2 && !empty($bankList[0]->created_by) != $this->session->userdata('adminId')){?>
                        <a href="<?php echo base_url();?>admin/account/bank/add"> <i class="fa fa-plus-circle"></i> Add Bank Account </a>
                    <?php }?>
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="profile_form_update edu_update01 lead_box">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                    
                    <?php 
						if($this->session->flashdata('msg')){
						echo '<div style="width: 50%;margin: auto;">
						<i class="fa fa-success"></i>
						'.$this->session->flashdata('msg') .'
						</div>';
                    } ?>
                    
                    
                    <table id="datatable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Bank Name</th>
                          <th>Bank State Branch(BSB)</th>
                          <th>Account Number</th>
                          <th>Action</th>

                        </tr>
                      </thead>


                      <tbody>

                          <?php foreach ($bankList as $row) {
                          echo '<tr><td>'.$row->bank_name.'</td>';
                          echo '<td>'.$row->bsb.'</td>';
                          echo '<td>'.$row->account_no.'</td>';
                          echo '<td><a href="'.base_url().'admin/account/bank/'.$row->id.'" class="tabl_link"><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" class="delete tabl_link" id="delete_'.$row->id.'" data-id="'.$row->id.'" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
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

<!--Add Transaction popup-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" id="close1"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Add Transaction Fee</h4>

                        </div>
                        <div class="modal-body">
                        <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                            <span id="err" style="color: red;"></span>
                            <span id="suc" style="color: green;"></span>

                            <form class="form-horizontal" >
                              <input type="hidden" id="planId" name="planId" value="">
                              <input type="hidden" id="planName" name="planName" value="">


                              <div class="form-group rel" id="freeDiv" style="display: none;">
                                <label class="control-label col-sm-4" for="email">Transaction Fee(%): </label>
                                <div class="col-sm-4">
                                 <input type="text" class="form-control numeric" id="txnFeeFree" placeholder="Transaction Fee %">
                                </div>
                              </div>

                              <div id="premiumDiv" style="display: none;">

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transaction Fee (%) <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" value="" class="form-control numeric" id="txnFeePremium" placeholder="Transaction Fee %">

                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" value="" class="form-control numeric" id="txnFeeAmount" placeholder="Transaction Fee Amount">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transaction Fee (%) <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                     <input type="text" value="" class="form-control numeric" id="txnFeePremiumSecond" placeholder="Transaction Fee %">
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" value="" class="form-control numeric" id="txnFeeAmountSecond" placeholder="Transaction Fee Amount">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transaction Fee (%) <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" value="" class="form-control numeric" id="txnFeePremiumThird" placeholder="Transaction Fee %">

                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" value="" class="form-control numeric" id="txnFeeAmountThird" placeholder="Transaction Fee Amount">
                                  </div>

                                </div>




                              </div>


                              </form>


                        </div>
                        <div class="modal-footer" style="text-align: center;">
                        <div id="loading" style="display: none;">
                                <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
                              </div>
                          <button type="button" class="btn btn-default" id="close">Close</button>
                          <button type="button" class="btn btn-primary" id="save">Add Transaction Fee</button>

                        </div>

                      </div>
                    </div>
                  </div>
<!--Ends Here-->

<!--Update Transaction popup-->
<div class="modal fade bs-example-modal-lgUpdate" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" id="close1Update"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Update Transaction Fee</h4>

                        </div>
                        <div class="modal-body">
                        <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                            <span id="errUpdate" style="color: red;"></span>
                            <span id="sucUpdate" style="color: green;"></span>

                            <form class="form-horizontal" >
                              <input type="hidden" id="planIdUpdate" name="planIdUpdate" value="">
                              <input type="hidden" id="planNameUpdate" name="planNameUpdate" value="">


                              <div class="form-group rel" id="freeDivUpdate" style="display: none;">
                                <label class="control-label col-sm-4" for="email">Transaction Fee(%): </label>
                                <div class="col-sm-4">
                                 <input type="text" class="form-control numeric" id="txnFeeFreeUpdate" placeholder="Transaction Fee %">
                                </div>
                              </div>

                              <div id="premiumDivUpdate" style="display: none;">

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transaction Fee (%) <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" value="" class="form-control numeric" id="txnFeePremiumUpdate" placeholder="Transaction Fee %">

                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" value="" class="form-control numeric" id="txnFeeAmountUpdate" placeholder="Transaction Fee Amount">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transaction Fee (%) <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                     <input type="text" value="" class="form-control numeric" id="txnFeePremiumSecondUpdate" placeholder="Transaction Fee %">
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" value="" class="form-control numeric" id="txnFeeAmountSecondUpdate" placeholder="Transaction Fee Amount">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transaction Fee (%) <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" value="" class="form-control numeric" id="txnFeePremiumThirdUpdate" placeholder="Transaction Fee %">

                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" value="" class="form-control numeric" id="txnFeeAmountThirdUpdate" placeholder="Transaction Fee Amount">
                                  </div>

                                </div>




                              </div>


                              </form>


                        </div>
                        <div class="modal-footer" style="text-align: center;">
                        <div id="loadingUpdate" style="display: none;">
                                <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
                              </div>
                          <button type="button" class="btn btn-default" id="closeUpdate">Close</button>
                          <button type="button" class="btn btn-primary" id="saveUpdate">Update Transaction Fee</button>

                        </div>

                      </div>
                    </div>
                  </div>
<!--Ends Here-->

 <!--delete services script-->
<script type="text/javascript">
// Ajax post
$(document).ready(function() {
  $(".delete").click(function() {
    event.preventDefault();
    var deleteid = $(this).data('id');
    var parent = $(this).parent("td").parent("tr");
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/account/deleteAccount",
      data: {id: deleteid},
      success: function(data) {
        if (data=='success'){
           parent.fadeOut('slow');
           $("#successMsg").html('Deleted.');
          setTimeout(function(){$('#successMsg').hide();}, 4000);
        }else{
          $("#errorMsg").html('Some error to delete Business.');
          setTimeout(function(){$('#errorMsg').hide()}, 4000);

        }
      }
    });
  });



  $(".add").click(function() {
    //event.preventDefault();
    var planId = $(this).data('id');
    var planName = $(this).data('plan');
    $("#planId").val(planId);
    $("#planName").val(planName);
    $(".bs-example-modal-lg").modal();
    if(planName=='Premium'){
      $("#freeDiv").hide();
      $("#premiumDiv").show();
    }else{
      $("#freeDiv").show();
      $("#premiumDiv").hide();
    }

  });

  $("#save").click(function(){

    var planId = $("#planId").val();
    var planName = $("#planName").val();
    var txnFeeFree = $("#txnFeeFree").val();
    var txnFeePremium = $("#txnFeePremium").val();
    var txnFeeAmount = $("#txnFeeAmount").val();
    var txnFeePremiumSecond = $("#txnFeePremiumSecond").val();
    var txnFeeAmountSecond = $("#txnFeeAmountSecond").val();
    var txnFeePremiumThird = $("#txnFeePremiumThird").val();
    var txnFeeAmountThird = $("#txnFeeAmountThird").val();

    if(planName=='Free' && txnFeeFree==''){
      $("#err").html('Please Enter Transaction Percentage');
    }else if(planName=='Premium' && (txnFeePremium=='' || txnFeeAmount=='' || txnFeePremiumSecond=='' || txnFeeAmountSecond=='' || txnFeePremiumThird=='' || txnFeeAmountThird=='')){
       $("#err").html('Please Fill All The Values');
    }else{
      $("#loading").show();
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/plan/addTxn",
        data: {planId: planId,planName:planName,txnFeeFree:txnFeeFree,txnFeePremium:txnFeePremium,txnFeeAmount:txnFeeAmount,txnFeePremiumSecond:txnFeePremiumSecond,txnFeeAmountSecond:txnFeeAmountSecond,txnFeePremiumThird:txnFeePremiumThird,txnFeeAmountThird:txnFeeAmountThird},
        success: function(data) {
          $("#loading").hide();
          if (data=='success'){
            $("#suc").html('Transaction Fee Added Successfully.');
            setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
          }else{
            $("#err").html('Sorry something went wrong.');
            setTimeout(function(){$('#err').html(''); location.reload();}, 4000);          }
        }
      });
    }
  });

/*Update Txn Fee */
  $(".update").click(function() {
    //event.preventDefault();
    var planId = $(this).data('id');
    var planName = $(this).data('plan');
    $("#planIdUpdate").val(planId);
    $("#planNameUpdate").val(planName);
    $(".bs-example-modal-lgUpdate").modal();
    if(planName=='Premium'){
      $("#freeDivUpdate").hide();
      $("#premiumDivUpdate").show();
    }else{
      $("#freeDivUpdate").show();
      $("#premiumDivUpdate").hide();
    }

  });

  $("#saveUpdate").click(function(){

    var planId = $("#planIdUpdate").val();
    var planName = $("#planNameUpdate").val();
    var txnFeeFree = $("#txnFeeFreeUpdate").val();
    var txnFeePremium = $("#txnFeePremiumUpdate").val();
    var txnFeeAmount = $("#txnFeeAmountUpdate").val();
    var txnFeePremiumSecond = $("#txnFeePremiumSecondUpdate").val();
    var txnFeeAmountSecond = $("#txnFeeAmountSecondUpdate").val();
    var txnFeePremiumThird = $("#txnFeePremiumThirdUpdate").val();
    var txnFeeAmountThird = $("#txnFeeAmountThirdUpdate").val();

    if(planName=='Free' && txnFeeFree==''){
      $("#errUpdate").html('Please Enter Transaction Percentage');
    }else if(planName=='Premium' && (txnFeePremium=='' || txnFeeAmount=='' || txnFeePremiumSecond=='' || txnFeeAmountSecond=='' || txnFeePremiumThird=='' || txnFeeAmountThird=='')){
       $("#errUpdate").html('Please Fill All The Values');
    }else{
      $("#loadingUpdate").show();
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/plan/updateTxn",
        data: {planId: planId,planName:planName,txnFeeFree:txnFeeFree,txnFeePremium:txnFeePremium,txnFeeAmount:txnFeeAmount,txnFeePremiumSecond:txnFeePremiumSecond,txnFeeAmountSecond:txnFeeAmountSecond,txnFeePremiumThird:txnFeePremiumThird,txnFeeAmountThird:txnFeeAmountThird},
        success: function(data) {
          $("#loadingUpdate").hide();
          if (data=='success'){
            $("#sucUpdate").html('Transaction Fee Updated Successfully.');
            setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
          }else{
            $("#errUpdate").html('Sorry something went wrong.');
            setTimeout(function(){$('#err').html(''); location.reload();}, 4000);          }
        }
      });
    }
  });
/*Ends Here*/

});

  $("#close").click(function() {
    $("#planId").val('');
    $("#planName").val('');
    $("#txnFeeFree").val('');
    $("#txnFeePremium").val('');
    $("#txnFeeAmount").val('');
    $("#txnFeePremiumSecond").val('');
    $("#txnFeeAmountSecond").val('');
    $("#txnFeePremiumThird").val('');
    $("#txnFeeAmountThird").val('');
    $("#planId").val('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });

  $("#close1").click(function() {
    $("#planId").val('');
    $("#planName").val('');
    $("#txnFeeFree").val('');
    $("#txnFeePremium").val('');
    $("#txnFeeAmount").val('');
    $("#txnFeePremiumSecond").val('');
    $("#txnFeeAmountSecond").val('');
    $("#txnFeePremiumThird").val('');
    $("#txnFeeAmountThird").val('');
    $("#loading").hide();
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });



  $("#closeUpdate").click(function() {
    $("#planId").val('');
    $("#planName").val('');
    $("#txnFeeFreeUpdate").val('');
    $("#txnFeePremiumUpdate").val('');
    $("#txnFeeAmountUpdate").val('');
    $("#txnFeePremiumSecondUpdate").val('');
    $("#txnFeeAmountSecondUpdate").val('');
    $("#txnFeePremiumThirdUpdate").val('');
    $("#txnFeeAmountThirdUpdate").val('');
    $("#loadingUpdate").hide();
    $(".errorNumeric").hide();
    $("#errUpdate").html('');
    $(".bs-example-modal-lgUpdate").modal('hide');
  });

  $("#close1Update").click(function() {
    $("#planId").val('');
    $("#planName").val('');
    $("#txnFeeFreeUpdate").val('');
    $("#txnFeePremiumThirdUpdate").val('');
    $("#txnFeeAmountUpdate").val('');
    $("#txnFeePremiumSecondUpdate").val('');
    $("#txnFeeAmountSecondUpdate").val('');
    $("#txnFeePremiumThirdUpdate").val('');
    $("#txnFeeAmountThirdUpdate").val('');
    $("#loadingUpdate").hide();
    $(".errorNumeric").hide();
    $("#errUpdate").html('');
    $(".bs-example-modal-lgUpdate").modal('hide');
  });




</script>
<script type="text/javascript">
    var specialKeys = new Array();
    specialKeys.push(8); //Backspace
    $(function () {
        $(".numeric").on("keypress", function (e) {



            var keyCode = e.which ? e.which : e.keyCode

            var ret = ((keyCode >= 45 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);

            $(".errorNumeric").css("display", ret ? "none" : "inline");
            //setTimeout(function(){$('#err').html('');}, 4000);
            return ret;
        });
        $(".numeric").bind("paste", function (e) {
            return false;
        });
        $(".numeric").bind("drop", function (e) {
            return false;
        });
    });
</script>
