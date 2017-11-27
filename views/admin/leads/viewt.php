<style>
.demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
.demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
.demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
.demo-table ul{margin:0;padding:0;}
.demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
</style>
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
                  <div class="x_title">
                    <h2>Bids Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>

                    <?php
                    //echo '<pre>';print_r($leadDetail);
                    if($bidDetails && $this->session->userdata('adminId')==$bidDetails[0]->business_id){
                      //echo '<pre>';print_r($bidDetails);
                      foreach($bidDetails as $row)
                    //  echo '<pre>';print_r($this->session->userdata()); print_r($row);
                      {?>
                      <div class="bid_01"><div class="bid_01_half"><label>Job From  </label> </div><a href="<?php echo base_url();?>admin/business/view/<?php echo $row->business_id;?>"><?php echo $row->business_name;?></a></div>

                      <div class="bid_02"><div class="bid_01_half"><label>Bidding Date/Time  </label></div> <?php echo date('d-M-Y H:i A',strtotime($row->created_date));?></div>

                      <div class="bid_02">
                      	 <div class="bid_01_half">Best Price</div>
					                    <?php if($row->business_id==$row->assignedbusiness_id || $row->bidamountindividual){ ?>
                          <strong>Client's best price for this Job is <span><?php echo '$'.$row->bidamountindividual;?>(AUD)</span></strong>
                          <?php } ?>
                      </div>

                      <div class="bid_02">
                        <div class="bid_01_half"><label>BID Status</label></div>
                        <?php if($row->status==1){
                          echo '<span style="color:green;"><strong>BID Is Closed </strong></span>';
                           if($this->session->userdata('adminId')==$row->assignedbusiness_id) {
                              echo '<span style="color:green;"><strong>  Assigned to '.$row->business_name .'  </strong></span><a href="javascript:void();" class="btn btn-success bid01" onclick="cancelBidWithProfessional('.$row->quotation_id.');">Click to Cancel</a>';
                            }
                          }else{
                            echo 'BID is open';
                          }
                        ?>
                      </div>

                      <div class="bid_02">
                      	<div class="bid_01_half"><label>Your BID Amount  </label></div>
                      <button  class="btn btn-success bid01"
                      <?php if($row->status==0 && $this->session->userdata('admin_user_type')==3){?>
                      title="click to confirm/close BID" onClick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->bidamount;?>,1)" <?php } ?>><?php echo $row->bidamount;?> AUD ($)</button>

                      <?php if($row->updatebidamount!=0){ ?>
                      <button  class="btn btn-success bid01"
                      <?php if($row->status==0 && $this->session->userdata('admin_user_type')==3){?>
                        title="click to confirm/close BID" onClick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->updatebidamount;?>,1)" <?php } ?>><?php echo $row->updatebidamount;?> AUD ($)</button>



                      <?php } if($row->updatebidamountsecond!=0){ ?>
                      <button  class="btn btn-success bid01"
                      <?php if($row->status==0 && $this->session->userdata('admin_user_type')==3){?>
                      title="click to confirm/close BID" onClick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->updatebidamountsecond;?>,1)" <?php  }?>><?php echo $row->updatebidamountsecond ;?> AUD ($)</button> <?php } ?>




                      <?php if($row->status==1){?>

                       <?php if($leadDetail[0]->nda!='' && $leadDetail[0]->ndap==''){ ?>
                         <a href="<?php echo base_url();?>admin/leads/nda/<?php echo $row->quotation_id;?>" class="btn btn-success">Client has sent you an NDA. Click to Upload </a>|
                         <?php }else if($leadDetail[0]->ndap!=''){
                            echo '<a href="'.base_url().'admin/leads/download/'.$leadDetail[0]->ndap.'" class="btn btn-success">Download Your NDA</a>'; }
                            else{ echo '';}
                         }?>


                      <?php if($row->status!=1 && $this->session->userdata('admin_user_type')==2){?>
                       <button class="btn btn-primary btn-xs bid01" onClick="placeAmount(<?php echo $row->id;?>,<?php echo $row->bidcount;?>);">Place Your BID Amount</button>



                        <?php } ?>
                      </div>

                      <div class="bid_02">
                      	<div class="bid_01_half"><button class="btn btn-primary btn-xs bid02" onClick="showDiv(<?php echo $row->id;?>);">Show message thread</button></div>
                       <div style="display:none;" class="bid_meg" id="divT_<?php echo $row->id;?>" >
                       <div class="x_title">
                      <h2>Message Thread</h2>

                      <div class="clearfix"></div>
                    </div>
                    <?php

                     $messageThread = $this->quotation_model->messageThread($row->quotation_id,$row->business_id);
                    if($messageThread){
                      foreach($messageThread as $mess){
                        //echo '<pre>';print_r($mess);
                          if($mess->created_by!=$this->session->userdata('adminId')){
                    ?>

                      <?php echo '<strong>'.$mess->name.'</strong>';?> <?php echo $mess->created_date;?><br>
                      <?php } else{ ?>
                      <strong><?php  echo 'Me';?> </strong> <?php echo $mess->created_date;?><br>
                      <?php }?>
                      <?php echo $mess->message;?><br><hr>

                     <?php } }else{ echo 'No message'; } ?>
                     </div>
                     <?php if($this->session->userdata('admin_user_type')==2){?>
                      <button data-toggle="modal" class="btn btn-primary btn-xs bid01" onClick="sendMessage(<?php echo $row->quotation_id;?>,<?php echo $row->business_id;?>);">SEND MESSAGE</button>
                      <?php } ?>
                      </div>
                      <hr>
                     <?php
                      } } else {
                      //  print_r($leadDetail);
                     ?>

                        Consumer Name : <?php echo $leadDetail[0]->name;?><br/>
                        <?php if($leadDetail[0]->assignedbusiness_id==$this->session->userdata('adminId')){
                              echo '<strong>Client hired you for this job Please BID Your amount.</strong><br>';
                          }?>
                          <?php if($leadDetail[0]->assignedbusiness_id==$this->session->userdata('adminId') && $leadDetail[0]->bidamounthire!=0){
                                echo '<strong>Client\'s BID Amount for the project is '.$leadDetail[0]->bidamounthire.' AUD.</strong><br>';
                            }?>

                        Work Details : <?php echo $leadDetail[0]->work_detail;?><br>
                        Proposal Amount by client : <?php echo '$'. $leadDetail[0]->bidamounthire;?> (AUD)<br>
                      <button class="btn btn-primary btn-xs" onClick="postBid(<?php echo $leadDetail[0]->id;?>);"><strong>Place Your BID Amount</strong></button>
                      <?php }?>


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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Send Message to the Bidder</h4>
      </div>
      <div class="modal-body">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="err" style="color: red;"></span>
          <span id="suc" style="color: green;"></span>
          <form class="form-horizontal">
            <input type="hidden" id="quotationId" name="quotationId" value="">
            <input type="hidden" id="businessId" name="businessId" value="">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Message : </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="message"></textarea>
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-default" id="close">Close</button>
        <button type="button" class="btn btn-primary" id="save">Send Message</button>
      </div>

    </div>
  </div>
</div>
<!--POSTBID By Business-->
<div class="modal fade bs-example-modal-lgPostBid" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="closePostBid1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Send Message to the Bidder</h4>

      </div>
      <div class="modal-body">
      <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errH" style="color: red;"></span>
          <span id="sucH" style="color: green;"></span>

          <form class="form-horizontal">
            <input type="hidden" id="quotation_id" name="quotation_id" value="">
            <input type="hidden" id="bid_status" value="<?php echo $leadDetail[0]->bid_status;?>">
            <input type="hidden" id="bid_count" value="<?php echo $leadDetail[0]->bid_count;?>">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Amount : </label>
              <div class="col-sm-4">
               <input type="text" class="form-control numeric" id="bidamount" placeholder="BID Amount">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Message : </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="message"></textarea>
              </div>
            </div>

          </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div id="loadingBid" style="display: none;">
                <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
              </div>
        <button type="button" class="btn btn-default" id="closePostBid">Close</button>
        <button type="button" class="btn btn-primary" id="savePostBid">Place Your BID</button>
      </div>

    </div>
  </div>
</div>


<!--Ends Her-->
<!--Place you BID AMOUNT popup-->
<div class="modal fade bs-example-modal-lgplaceAmount" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Place your bid</h4>

                        </div>
                        <div class="modal-body">
                        <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                            <span id="errBid" style="color: red;"></span>
                            <span id="sucBid" style="color: green;"></span>

                            <form class="form-horizontal">
                              <input type="hidden" id="quotation_id" name="quotation_id" value="">
                              <input type="hidden" id="bidcount" name="bidcount" value="">


                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Bid Amount : </label>
                                <div class="col-sm-4">
                                 <input type="text" class="form-control numeric" id="bidAmountIndividual" placeholder="BID Amount">
                                </div>
                              </div>

                            </form>
                        </div>
                        <div class="modal-footer" style="text-align: center;">
                          <button type="button" class="btn btn-default" id="close2">Close</button>
                          <button type="button" class="btn btn-primary" id="save1">Place Your BID</button>
                        </div>

                      </div>
                    </div>
                  </div>
<!-- Ends here -->

<!--Close Bid PopUp-->
<div class="modal fade bs-example-modal-lgCloseAmount" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" id="closeBid2"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">You will redirect to the PAYPAL to pay amount.</h4>

                        </div>
                        <div class="modal-body">
                        <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                            <span id="errBid" style="color: red;"></span>
                            <span id="sucBid" style="color: green;"></span>

                            <form class="form-horizontal" >
                              <input type="hidden" id="quot_id" name="quotation_id" value="">
                              <input type="hidden" id="business_id" name="business_id" value="">
                              <input type="hidden" id="amount" name="amount" value="">
                              <input type="hidden" id="status" name="status" value="">

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Total Amount to pay : </label>
                                <div class="col-sm-4">
                                  <span id="totAmount"></span>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Payment Type : </label>
                                <div class="col-sm-4">
                                  <input type="radio" id="partially" name="radio" value="partially">Partially Payment
                                  <input type="radio" id="fully" name="radio" value="fully">Full Payment
                                </div>
                              </div>




                              <div class="form-group rel" style="display: none;">
                                <label class="control-label col-sm-4" for="email">Amount : </label>
                                <div class="col-sm-4">
                                 <input type="text" class="form-control numeric" id="bidCloseAmount" placeholder="BID Amount">
                                </div>
                              </div>
                              </form>


                        </div>
                        <div class="modal-footer" style="text-align: center;">
                        <div id="loading" style="display: none;">
                                <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
                              </div>
                          <button type="button" class="btn btn-default" id="closeBid1">Close</button>
                          <button type="button" class="btn btn-primary" id="saveCloseBid">Make Payment</button>

                        </div>

                      </div>
                    </div>
                  </div>

<!--Complete payment popup-->
<div class="modal fade bs-example-modal-lgCompletePaymentPopUp" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" id="closeCompleteBid2"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">You will redirect to the PAYPAL to pay amount.</h4>

                        </div>
                        <div class="modal-body">
                            <span id="errBid" style="color: red;"></span>
                            <span id="sucBid" style="color: green;"></span>

                            <form class="form-horizontal" >
                              <input type="hidden" id="quot_id" name="quotation_id" value="">
                              <input type="hidden" id="business_id" name="business_id" value="">
                              <input type="hidden" id="amount" name="amount" value="">
                              <input type="hidden" id="status" name="status" value="">

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Complete Payment : </label>
                                <div class="col-sm-4">
                                  <span id="totAmountForFullPayment"></span>
                                </div>
                              </div>



                              <div class="form-group rel">
                                <label class="control-label col-sm-4" for="email">Amount : </label>
                                <div class="col-sm-4">
                                 <input type="text" class="form-control numeric" id="bidCloseAmountFullPayment" placeholder="BID Amount">
                                </div>
                              </div>
                              </form>


                        </div>
                        <div class="modal-footer" style="text-align: center;">
                        <div id="loading" style="display: none;">
                                <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
                              </div>
                          <button type="button" class="btn btn-default" id="closeCompleteBid1">Close</button>
                          <button type="button" class="btn btn-primary" id="saveCloseCompleteBid">Make Payment</button>

                        </div>

                      </div>
                    </div>
                  </div>
<!--Ends Here-->

<!--delete services script-->
<script type="text/javascript">

function postBid(quotation_id){
  $(".bs-example-modal-lgPostBid").modal();
  $("#quotation_id").val(quotation_id);
}

$("#savePostBid").click(function() {
  $("#sucH").html();
  $("#errH").html();
    var quotation_id = $("#quotation_id").val();
    var bidamount = $("#bidamount").val();
    var message = $("#message").val();
    var bid_status = $("#bid_status").val();
    var bid_count = $("#bid_count").val();
    if(bidamount==''){
      $("#errH").html('Please Enter Amount');
    }else{
      //$("#loadingBid").show();
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postBid",
        data: {quotation_id: quotation_id,bidamount: bidamount,message: message,bid_status:bid_status,bid_count:bid_count},
        success: function(data) {
          //alert(data);
          if (data=='success'){
            $("#sucH").html('Your Message To Bidder is successfully Send.');
            setTimeout(function(){location.reload(); }, 4000);
          }else{
            $("#errH").html(data);
            setTimeout(function(){location.reload();}, 4000);
          }
        }
      });
    }

  });

$("#closePostBid").click(function() {
    $("#quotation_id").val('');
    $("#bidamount").val('');
    $("#err").html('');
    $("#suc").html('');
    $("#loading").hide();
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgPostBid").modal('hide');
});
$("#closePostBid1").click(function() {
   $("#quotation_id").val('');
    $("#bidamount").val('');
    $("#err").html('');
     $("#suc").html('');
    $("#loading").hide();
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgPostBid").modal('hide');
});



function closeBid(business_id,quotation_id,amount,status){
  //alert(quotation_id);
  $(".bs-example-modal-lgCloseAmount").modal();
  $("#quot_id").val(quotation_id);
  $("#business_id").val(business_id);
  $("#totAmount").html(amount+' AUD ($)');
  $("#amount").val(amount);
  $("#status").val(status);

}

$("#saveCloseBid").click(function(){
  var quotation_id = $("#quot_id").val();
  var business_id =  $("#business_id").val();
  var amount =  $("#bidCloseAmount").val();
  var status =  $("#status").val();
  if($("#partially").is(":checked") || $("#fully").is(":checked")) {
    var paymentType = $("input[name='radio']:checked").val();
    $("#loading").show();
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/quotation/payment",
      data:{business_id:business_id,quotation_id:quotation_id,status:status,amount:amount,paymentType:paymentType},
      success:function(data){
        if (data=='success'){
          $("#loading").hide();
          setTimeout(function(){$('#successMsg').hide()}, 4000);
        }else{
        }
      }
    });
  }else{
    alert('please select one of payment mode');
  }
});

$("#partially").click(function(){
  var realAmount = $("#amount").val();
  var amounttopay = realAmount/2;
  $("#paypalamount").val(amounttopay);
  $(".rel").show();
  $("#bidCloseAmount").val(amounttopay);
  $("#bidCloseAmount").attr("disabled", "disabled");
});

$("#fully").click(function(){
  var amounttopay = $("#amount").val();
  $("#paypalamount").val(amounttopay);
  $(".rel").show();
  $("#bidCloseAmount").val(amounttopay);
  $("#bidCloseAmount").attr("disabled", "disabled");
});

$("#closeBid1").click(function() {
  $("#quotation_id").val('');
  $("#business_id").val('');
  $("#amount").val('');
  $("#status").val('');
  $("#paypalamount").val('');
  $("#err").html('');
  $('#partially').prop('checked', false);
  $('#fully').prop('checked', false);
  $("#loading").hide();
  $("#bidCloseAmount").val();
  $(".rel").hide();
  $(".errorNumeric").hide();
  $(".bs-example-modal-lgCloseAmount").modal('hide');
});

$("#closeBid2").click(function() {
  $("#quotation_id").val('');
  $("#business_id").val('');
  $("#amount").val('');
  $("#paypalamount").val('');
  $("#status").val('');
  $("#suc").html('');
  $("#err").html('');
  $('#partially').prop('checked', false);
  $('#fully').prop('checked', false);
  $("#bidCloseAmount").val();
  $(".rel").hide();
  $("#loading").hide();
  $(".errorNumeric").hide();
  $(".bs-example-modal-lgCloseAmount").modal('hide');
});

function makeFullPayment(business_id,quotation_id,amount,status){
  $(".bs-example-modal-lgCompletePaymentPopUp").modal();
  $("#quot_id").val(quotation_id);
  $("#business_id").val(business_id);
  $("#totAmountForFullPayment").html(amount+' AUD ($)');
  $("#amount").val(amount);
  $("#status").val(status);
  $("#paypalamount").val(amount);
  $("#bidCloseAmountFullPayment").val(amount);
  $("#bidCloseAmountFullPayment").attr("disabled", "disabled");
}

$("#saveCloseCompleteBid").click(function(){
  var quotation_id = $("#quot_id").val();
  var business_id =  $("#business_id").val();
  var amount =  $("#bidCloseAmountFullPayment").val();
  var status =  $("#status").val();
  if(amount) {
      $("#loading").show();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/quotation/payment",
        data:{business_id:business_id,quotation_id:quotation_id,status:status,amount:amount,paymentType:'fully'},
          success:function(data){
             $("#loading").hide();
             $("#order_id").val(data);
             $( "#pay" ).submit();
        }
      });
  }
});

$("#closeCompleteBid1").click(function() {
  $("#quotation_id").val('');
  $("#business_id").val('');
  $("#amount").val('');
  $("#status").val('');
  $("#paypalamount").val('');
  $("#err").html('');
  $('#partially').prop('checked', false);
  $('#fully').prop('checked', false);
  $("#loading").hide();
  $("#bidCloseAmount").val();
   $(".rel").hide();
  $(".errorNumeric").hide();
  $(".bs-example-modal-lgCompletePaymentPopUp").modal('hide');
});

$("#closeCompleteBid2").click(function() {
  $("#quotation_id").val('');
  $("#business_id").val('');
  $("#amount").val('');
  $("#paypalamount").val('');
  $("#status").val('');
  $("#suc").html('');
  $("#err").html('');
  $('#partially').prop('checked', false);
  $('#fully').prop('checked', false);
  $("#bidCloseAmount").val();
  $(".rel").hide();
  $("#loading").hide();
  $(".errorNumeric").hide();
  $(".bs-example-modal-lgCompletePaymentPopUp").modal('hide');
});
function showDiv(id){
  $("#divT_"+id).toggle();
}
function sendMessage(quotation_id,businessId){
    $(".bs-example-modal-lg").modal();
    $("#quotationId").val(quotation_id);
    $("#businessId").val(businessId);
}

function placeAmount(quotation_id,bidcount){
  $(".bs-example-modal-lgplaceAmount").modal();
  $("#quotation_id").val(quotation_id);
  $("#bidcount").val(bidcount);
}


$(document).ready(function() {
  $("#save").click(function() {
    var quotation_id = $("#quotationId").val();
    var businessId = $("#businessId").val();
    var message = $("#message").val();
    $("#suc").html();
    $("#err").html();
    if(message==''){
      $("#err").html('Please fill Message');
    }else{
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postMessageOnBid",
        data: {quotation_id: quotation_id,businessId: businessId,message: message},
        success: function(data) {
          if (data=='success'){
            $("#suc").html('Your Message To Bidder is successfully Send.');
            setTimeout(function(){$('#suc').html('');location.reload()}, 4000);
          }else{
            $("#err").html('Sorry something went wrong.');
            setTimeout(function(){$('#err').html('');location.realod()}, 4000);
          }
        }
      });
    }
  });

  $("#close").click(function() {
    $("#quotationId").val('');
    $("#businessId").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });

  $("#close1").click(function() {
    $("#quotationId").val('');
    $("#businessId").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });

/*Bid amount by individual*/
$("#save1").click(function() {
    var quotation_id = $("#quotation_id").val();
    var bidcount = $("#bidcount").val();
    var bidAmountIndividual = $("#bidAmountIndividual").val();
    $("#sucBid").html();
    $("#errBid").html();

    if(bidAmountIndividual==''){
      $("#errBid").html('Please Enter BID Amount');
    }else if(bidcount>=3){
      $("#errBid").html('You can not bid more than 3 times.');
    }else{
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postBidAmountByBusinessToBid",
        data: {quotation_id: quotation_id,bidcount:bidcount,bidAmountIndividual: bidAmountIndividual},
        success: function(data) {
          //alert(data);
          if (data=='success'){
            $("#sucBid").html('Your Message To Bidder is successfully Send.');
            setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
          }else{
            $("#errBid").html('Bidings are not allowed.');
            setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
          }
        }
      });
    }
  });
  $("#close2").click(function() {
    //event.preventDefault();
    $("#bidAmountIndividual").val('');
    $("#quotation_id").val('');
    $("#sucBid").html('');
    $("#errBid").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgplaceAmount").modal('hide');
  });

  $("#close3").click(function() {
    //event.preventDefault();
    $("#bidAmountIndividual").val('');
    $("#quotationId").val('');
    $("#businessId").val('');
    $("#message").val('');
    $("#sucBid").html('');
    $("#errBid").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgplaceAmount").modal('hide');
  });
});
</script>
<script type="text/javascript">
  var specialKeys = new Array();
  specialKeys.push(8); //Backspace
  $(function () {
    $(".numeric").on("keypress", function (e) {
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
       $(".errorNumeric").css("display", ret ? "none" : "inline");
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
<script>
function highlightStar(obj,id) {
	removeHighlight(id);
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;
		}
	});
}

function removeHighlight(id) {
	$('.demo-table #tutorial-'+id+' li').removeClass('selected');
	$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
}

function addRating(obj,id) {
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('selected');
		$('#tutorial-'+id+' #rating').val((index+1));
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;
		}
	});
	$.ajax({
	url: "add_rating.php",
	data:'id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
	type: "POST"
	});
}

function resetRating(id) {
	if($('#tutorial-'+id+' #rating').val() != 0) {
		$('.demo-table #tutorial-'+id+' li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $('#tutorial-'+id+' #rating').val()) {
				return false;
			}
		});
	}
} </script>
