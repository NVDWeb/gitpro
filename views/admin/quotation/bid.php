<style>
/****** Rating Starts *****/
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating {
                border: none;
                float: left;
            }

            .rating > input { display: none; }
            .rating > label:before {
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before {
                content: "\f089";
                position: absolute;
            }

            .rating > label {
                color: #ddd;
                float: right;
            }

            .rating > input:checked ~ label,
            .rating:not(:checked) > label:hover,
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover,
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label,
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

            .demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
            .demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
            .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
            .demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
            .demo-table ul{margin:0;padding:0;}
            .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
            .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}

</style><body class="nav-md">
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
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                    <?php if($bidDetails){
                      $i=0;
                      foreach($bidDetails as $row){
                    ?>
                      <input type="hidden" id="b_id" value="<?php echo $row->business_id;?>">
                    <?php if($this->session->userdata('admin_user_type')==3){?>
                    <table class="demo-table bid_star01">
                      <tbody>
                      <tr>
                      </tr>
                      <tr>
                      <td valign="top">
                      <div id="tutorial-<?php echo $row->business_id; ?>">
                      <input type="hidden" name="rating" id="rating" value="<?php echo $row->rating; ?>" />
                      <ul onMouseOut="resetRating(<?php echo $row->ratingId; ?>);">
                        <?php
                        for($i=1;$i<=5;$i++) {
                        $selected = "";
                        if(!empty($row->rating) && $i<=$row->rating) {
                      	$selected = "selected";
                        }
                        ?>
                        <?php if($row->rating){ ?>
                          <li class='<?php echo $selected; ?>' onMouseOver="highlightStar(this,<?php echo $row->ratingId; ?>);" onMouseOut="removeHighlight(<?php echo $row->ratingId; ?>);" onClick="updateRating(this,<?php echo $row->business_id; ?>);">&#9733;</li>
                        <?php  }else{?>
                          <li class='<?php echo $selected; ?>' onMouseOver="highlightStar(this,<?php echo $row->ratingId; ?>);" onMouseOut="removeHighlight(<?php echo $row->ratingId; ?>);" onClick="addRating(this,<?php echo $row->business_id; ?>);">&#9733;</li>
                        <?php } ?>
                        <?php }  ?>
                      <ul>
                      </div>
                      </td>
                      </tr>

                      </tbody>
                    </table>
                    <?php } ?>

                      <!--Ends Here-->
                      <div class="bid_01">
                      	<div class="bid_01_half"><label>BID From </label></div>
                        <a href="<?php echo base_url();?>admin/business/view/<?php echo $row->business_id;?>"><strong><span style="color:green;"><?php echo $row->business_name;?></span></strong></a>
                      </div>

                      <div class="bid_02">
                      	<div class="bid_01_half"><label>Bidding Date/Time  </label></div>
                        <?php echo date('d-M-Y H:i A',strtotime($row->created_date));?>
                      </div>

                      <div class="bid_02">
                        <div class="bid_01_half"><label>BID Status</label></div>
                        <?php if($row->status==1){
                          echo '<span style="color:green;"><strong>BID Is Closed </strong></span>';
                           if($row->business_id==$row->assignedbusiness_id) {
                              echo '<span style="color:green;"><strong>  Assigned to '.$row->business_name .'  </strong></span><a href="javascript:void();" class="btn btn-success bid01" onclick="cancelBidWithProfessional('.$row->quotation_id.');">Click to Cancel</a>';
                              echo '<a href="'.base_url().'admin/milestone/index/'.$row->assignedbusiness_id.'/'.$row->quotation_id.'" class="btn btn-success bid01">Create Milestone</a>';
                            }
                          }else{
                            echo 'BID is open';
                          }
                        ?>
                      </div>

                      <div class="bid_02">
                      	<div class="bid_01_half"><label>BID Amount  </label></div>
                        <button title="click to confirm/close BID" class="btn btn-success bid01"
                      <?php if($this->session->userdata('admin_user_type')==3 && $row->status==0){?>
                      onclick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->bidamount;?>,1)"
                       <?php } ?>
                       ><?php echo $row->bidamount;?> AUD ($)</button>

                       <?php if($row->updatebidamount!=0){ ?>
                      <button title="click to confirm/close BID" class="btn btn-success bid01"
                      <?php if($this->session->userdata('admin_user_type')==3 && $row->status==0){?>
                      onclick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->updatebidamount;?>,1)" <?php } ?>><?php echo $row->updatebidamount;?> AUD ($)</button>

                      <?php } if($row->updatebidamountsecond!=0){ ?>
                      <button title="click to confirm/close BID" class="btn btn-success bid01"
                      <?php if($this->session->userdata('admin_user_type')==3 && $row->status==0){?>
                      onclick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->updatebidamountsecond;?>,1)" <?php  }?>><?php echo $row->updatebidamountsecond ;?> AUD ($)</button> <?php } ?>

                      <?php
                        if($row->business_id==$row->assignedbusiness_id && $row->status==1){?>
                         | <?php if($row->nda==''){ ?>
                           <a href="<?php echo base_url();?>admin/quotation/nda/<?php echo $row->assignedbusiness_id;?>/<?php echo $row->quotation_id;?>" class="btn btn-success bid01">Send NDA</a>
                         <?php } elseif($row->ndap!=''){
                            echo '<a href="'.base_url().'admin/leads/download/'.$row->ndap.'" class="btn btn-success">Download NDA</a>';
                          }else{ echo 'You have send NDA to professional to SIGN';}?>
                         <?php if($row->paymenttype=='fully'){ ?> | <strong>You have made full payment of <?php echo $row->paidamount;?> AUD ($) to this business for your work</strong><?php } ?>

                      <?php }
                        if($row->status!=1 && $row->bidamountindividual==0){?>
                        <button class="btn btn-primary btn-xs bid01" onClick="placeAmount(<?php echo $row->id;?>);">Place Your BID Amount</button>
                        </div>


                            <?php } else { ?> <div class="bid_02">
                            <div class="bid_01_half"><label>Best Price  </label></div> <?php if($this->session->userdata('admin_user_type')==1 || $this->session->userdata('admin_user_type')==2){ echo '<strong>Client\'s Best Price to this bid is '.$row->bidamountindividual.' AUD ($) </strong>'; ;}else{ echo '<strong>Your Best Price to this bid is '.$row->bidamountindividual.' AUD ($) </strong>';
							}
							}?>
                                  </div>


                         <div class="bid_02">
                         	<div class="bid_01_half"><button class="btn btn-primary btn-xs bid02" onClick="showDiv(<?php echo $row->id;?>);">Show message thread</button></div>



                      <?php //echo '<pre>';print_r($row);?>

                       <div style="display:none;" class="bid_meg" id="divT_<?php echo $row->id;?>" >
                       <div class="x_title">
                      <h2>Message Thread</h2>
                      <div class="clearfix"></div>
                    </div>
                    <?php
                     $messageThread = $this->quotation_model->messageThread($row->quotation_id,$row->business_id);
                     //print_r($this->session->userdata());
                    if($messageThread){
                      foreach($messageThread as $mess){
                            if($mess->created_by!=$this->session->userdata('adminId')){?>

                      <?php echo '<strong>'.$mess->name.'</strong>';?> <?php echo $mess->created_date;?><br>
                      <?php } else{ ?>
                      <strong><?php if($this->session->userdata('admin_user_type')==3){ echo 'Me';} else { echo 'Client\'s';} ?> </strong> <?php echo $mess->created_date;?><br>
                      <?php }?>
                      <?php echo $mess->message;?><br><hr>

                     <?php } }else{ echo 'No message'; } ?>
                     </div>
                     <?php if($this->session->userdata('admin_user_type')==2 || $this->session->userdata('admin_user_type')==3){?>

                     <div><button data-toggle="modal" class="btn btn-primary btn-xs bid01" onClick="sendMessage(<?php echo $row->quotation_id;?>,<?php echo $row->business_id;?>);">SEND MESSAGE</button></div>
                     </div>
                      <?php } ?>
                      <hr>
                     <?php

                     $i++;
                     } } else { echo 'No Data Found';}?>

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

<!--Place you BID AMOUNT popup-->
<div class="modal fade bs-example-modal-lgplaceAmount" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Please Put Your Best Price</h4>

                        </div>
                        <div class="modal-body">
                        <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                            <span id="errBid" style="color: red;"></span>
                            <span id="sucBid" style="color: green;"></span>

                            <form class="form-horizontal">
                              <input type="hidden" id="quotation_id" name="quotation_id" value="">


                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Best Price : </label>
                                <div class="col-sm-4">
                                 <input type="text" class="form-control numeric" id="bidAmountIndividual" placeholder="Best Price">
                                </div>
                              </div>

                            </form>
                        </div>
                        <div class="modal-footer" style="text-align: center;">
                          <button type="button" class="btn btn-default" id="close2">Close</button>
                          <button type="button" class="btn btn-primary" id="save1">Submit</button>
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
                          <h4 class="modal-title" id="myModalLabel">You are going to close the bid with the professional.</h4>

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

                              <!-- <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Payment Type : </label>
                                <div class="col-sm-4">
                                  <input type="radio" id="partially" name="radio" value="partially">Partially Payment
                                  <input type="radio" id="fully" name="radio" value="fully">Full Payment
                                </div>
                              </div> -->




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
                          <button type="button" class="btn btn-primary" id="saveCloseBid">Assign BID</button>

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

<!-- Ends here -->
<div id="paypal" style="display: none">
<form id="pay" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="love4u_1352373210_biz@yahoo.co.in">
<input type="hidden" name="undefined_quantity" value="1">
<input type="hidden" name="item_name" value="Pro your way">
<input type="hidden" name="item_number" value="dd01">
<input type="hidden" name="amount" id="paypalamount" value="">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="custom" id="order_id" value="">
<input type="hidden" name="return" value="<?php echo base_url();?>admin/quotation/notify">
<input type="hidden" name="cancel_return" value="<?php echo base_url();?>admin/quotation/cancel">
<input type="hidden" name="notify_url" value="<?php echo base_url();?>admin/quotation/notify">
<input type="image" border="0" name="submit" src="http://images.paypal.com/images/x-click-but5.gif" alt="Buy doodads with PayPal">
</form>
</div>

 <!--delete services script-->
<script type="text/javascript">
function closeBid(business_id,quotation_id,amount,status){
  //alert(quotation_id);
  $(".bs-example-modal-lgCloseAmount").modal();
  $("#quot_id").val(quotation_id);
  $("#business_id").val(business_id);
  $("#totAmount").html(amount+' AUD ($)');
  $("#amount").val(amount);
  $("#bidCloseAmount").val(amount);
  $("#status").val(status);

}

$("#saveCloseBid").click(function(){
  var quotation_id = $("#quot_id").val();
  var business_id =  $("#business_id").val();
  var amount =  $("#bidCloseAmount").val();
  var status =  $("#status").val();

    $("#loading").show();
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/quotation/closeBidWithProfessional",
      data:{business_id:business_id,quotation_id:quotation_id,status:status,amount:amount},
      success:function(data){
        if (data=='success'){
          $("#sucBid").html('Your Message To Bidder is successfully Send.');
          setTimeout(function(){$('#sucBid').html(''); location.reload();}, 4000);
        }else{
          $("#errBid").html('Bidings are not allowed.');
          setTimeout(function(){$('#errBid').html(''); location.reload();}, 4000);
        }
      }
    });
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
  //alert(quotation_id);
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
            //alert(data);
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

function placeAmount(quotation_id){
  $(".bs-example-modal-lgplaceAmount").modal();
  $("#quotation_id").val(quotation_id);
}

function cancelBidWithProfessional(qId){
  if(qId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/quotation/cancelBidWithProfessional",
      data:{quotation_id:qId},
        success:function(data){
          location.reload();
      }
    });
  }
}


$(document).ready(function() {
  $("#save").click(function() {
   // alert('click');
    //event.preventDefault();
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
            setTimeout(function(){$('#err').html('');location.reload()}, 4000);
          }
        }
      });
    }

  });

  $("#close").click(function() {

    //event.preventDefault();
    //$("#quotation_id").val('');
    $("#quotationId").val('');
    $("#businessId").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');


  });

  $("#close1").click(function() {

    //event.preventDefault();
    //$("#quotation_id").val('');
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
    //event.preventDefault();
    var quotation_id = $("#quotation_id").val();
    var bidAmountIndividual = $("#bidAmountIndividual").val();
    $("#sucBid").html();
    $("#errBid").html();

    if(bidAmountIndividual==''){
      $("#errBid").html('Please Enter BID Amount');
    }else{
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postBidAmountToBid",
        data: {quotation_id: quotation_id,bidAmountIndividual: bidAmountIndividual},
        success: function(data) {
          if (data=='success'){
            $("#sucBid").html('Your Message To Bidder is successfully Sent.');
            setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
          }else{
            $("#errBid").html('Sorry something went wrong.');
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
    $("#suc").html('');
    $("#err").html('');
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
    <!-- <script>
    $(document).ready(function () {
        $("#demo1 .stars").click(function () {
          var b_id = $(this).data('id');
          var rate = $(this).val();
          $.post('<?php echo base_url();?>admin/quotation/addRatings',{rate:$(this).val(),b_id:b_id},function(d){
                if(d=='Error'){
                  alert('You already rated');
                  location.reload();
                }else{
                    alert('Thanks For Rating');
                    location.reload();
                }
            });
            //$(this).attr("checked");
        });
    });
    </script> -->
    <script>function highlightStar(obj,id) {
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
    	url: "<?php echo base_url();?>admin/quotation/addRatings",
    	data:'b_id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
    	type: "POST",
      success:function(d){
        if(d=='Error'){
          alert('You already rated');
          location.reload();
        }else{
            alert('Thanks For Rating');
            location.reload();
        }
      }
    	});
    }

    function updateRating(obj,id) {
    	$('.demo-table #tutorial-'+id+' li').each(function(index) {
    		$(this).addClass('selected');
    		$('#tutorial-'+id+' #rating').val((index+1));
    		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
    			return false;
    		}
    	});
    	$.ajax({
    	url: "<?php echo base_url();?>admin/quotation/updateRatings",
    	data:'b_id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
    	type: "POST",
      success:function(d){
        if(d=='Error'){
          alert('You already rated');
          location.reload();
        }else{
            alert('Thanks For Rating');
            location.reload();
        }
      }
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
