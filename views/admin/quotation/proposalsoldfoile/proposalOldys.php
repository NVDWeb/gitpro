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
                            <h2>Proposal Details</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                          <?php //echo '<pre>';print_r($proposalData);?>
                          <p>Proposal By : <?php echo $proposalData[0]->first_name;?></p>
                          <?php if($proposalData[0]->teamId){ ?>
                          <p>Team name : <?php echo $proposalData[0]->team_name;?></p>
                          <?php  }?>
                          <p>Proposal Overview: <?php echo $proposalData[0]->proposaloverview;?></p>
                          <p>Proposal Summary: <?php echo $proposalData[0]->proposal_text;?></p>
                          <p>Proposal Scope of work : <?php echo $proposalData[0]->proposalscopeofwork;?></p>
                          <p>Proposal Time Limit : <?php echo $proposalData[0]->proposaltimelimit .' '. ucfirst($proposalData[0]->proposaltime);?></p>
                          <p>Proposal Additional details: <?php echo $proposalData[0]->proposaladditionaldetails;?></p>
                          <p>Proposed Fee: <?php echo $proposalData[0]->proposalfee;?></p>
                            <?php foreach($member_data as $row)
                            { ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="well profile_view">
                                  <div class="col-sm-12">
                                    <h4 class="brief"><i>Team Member</i></h4>
                                    <div class="left col-xs-7">
                                      <h2><?php echo $row[0]->first_name;?></h2>
                                      <p><strong>About: </strong>About the member</p>
                                      <ul class="list-unstyled">
                                        <li><i class="fa fa-building"></i> Address: <?php  if(isset($row['country'][0]->countryName)) {
                                          echo $row['country'][0]->countryName; } echo ','; if(isset($row['state'][0]->stateName)) {
                                          echo $row['state'][0]->stateName; } echo ','; if(isset($row['city'][0]->cityName)) {
                                          echo $row['city'][0]->cityName; } ?> </li>

                                      </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                      <?php if($row[0]->picture!=0 || $row[0]->picture ) { ?>
                                    <img class="img-circle img-responsive" src="<?php echo $row[0]->picture ;?>" alt="Avatar">
                                  <?php } else if($row[0]->businessLogo!='' ) { ?>
                                    <img class="img-circle img-responsive" src="<?php echo base_url();?>uploads/business/<?php echo $row[0]->businessLogo ;?>" alt="Avatar">
                                  <?php }else { ?>
                                    No Image Available
                                    <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                                  <?php } ?>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                      <p class="ratings">
                                       <?php
                                      if(isset($row['rating'][0]->rating)){ ?>
                                          <a><?php echo $row['rating'][0]->rating;?>/5</a>
                                            <?php for($i=1 ; $i<=$row['rating'][0]->rating; $i++){
                                              $selected = "-o";
                                              if(!empty($row['rating'][0]->rating) && $i<=$row['rating'][0]->rating) {
                                              $selected = "";
                                            } ?>
                                          <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                          <?php }
                                          $relC = 5-$row['rating'][0]->rating;
                                          for($k=1; $k<=$relC; $k++){
                                            echo '  <a href="#"><span class="fa fa-star-o"></span></a>';
                                          }?>
                                    <?php } else{ ?>
                                      <a>0/5</a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                    <?php }?>
                                      </p>
                                    </div>

                                  </div>
                                </div>
                              </div>

                              <?php } ?>


                          </div>
                          <?php //echo '<pre>'; print_r($proposalData);?>
                           <?php //echo '<pre>'; print_r($this->session->userdata);?>
                          <?php if($proposalData[0]->proposal_accepted==2){?>
                          	<button class="btn btn-primary">Rejected</button>
                          <?php }else {?>

                          	<?php if($proposalData[0]->proposal_accepted==0){ ?>
                          <button class="btn btn-primary" onClick="showInterest(<?php echo $proposalData[0]->id;?>,<?php echo $proposalData[0]->b_id;?>,<?php echo $proposalData[0]->q_id;?>,<?php echo $proposalData[0]->proposalfee;?>)">Show Interest</button>
                          <button class="btn btn-primary" onClick="bargening(<?php echo $proposalData[0]->id;?>,<?php echo $proposalData[0]->b_id;?>)">Bargening</button>
                          <button class="btn btn-danger" onClick="reject(<?php echo $proposalData[0]->id;?>,<?php echo $proposalData[0]->b_id;?>)">Reject</button>
						  <?php }else{
							  		if($proposalData[0]->proposal_accepted==1){
										echo '<strog><span style="color:green">You have requested to bargening.</span></strong>';?>
                                        <?php if(empty($proposalData[0]->bidclosingamount)){?>
										<button class="btn btn-danger" onClick="reject(<?php echo $proposalData[0]->id;?>,<?php echo $proposalData[0]->b_id;?>)">Reject</button>

									<?php }}else {
						  		echo '<strog><span style="color:green">Your Interest is already shown to the Professional.</span></strong>';
								//echo '<br> <a href="'.base_url().'admin/milestone/view/'.$proposalData[0]->assignedbusiness_id.'/'.$proposalData[0]->q_id.'" class="btn btn-primary">Create Milestone</a>';
								}} ?>
                      



                      <?php if($proposalData[0]->proposal_accepted==0){ 
                        if($interviewData[0]->interview_accepted==0 && ($interviewData[0]->b_id== $proposalData[0]->b_id)){
                            echo 'Interview has Scheduled but not Accepted by Professional';
                        }elseif($interviewData[0]->interview_accepted==1 && ($interviewData[0]->b_id== $proposalData[0]->b_id)){ 'Interview has Scheduled and Accepted by Professional';
                        }else{?>
                          <button class="btn btn-primary" onClick="scheduleInterview(<?php echo $proposalData[0]->q_id;?>,<?php echo $proposalData[0]->b_id;?>)">Schedule an Interview</button>
                        <?php } 
                     }?>
                          <?php if($proposalData['bid'] && ($proposalData[0]->assignTeam==0 && $proposalData[0]->assignedbusiness_id==0)){
                            echo 'Professional has BID on this project click to confirm';?>
                            <?php if($proposalData['bid'][0]->bidamount){ echo '

                            <button class="btn btn-primary bid01 " onclick="closeBid('.$proposalData[0]->b_id.','.$proposalData[0]->q_id.','.$proposalData['bid'][0]->bidamount.',1,'.$proposalData[0]->teamId.')">  '.$proposalData['bid'][0]->bidamount.' AUD ($)</button>';
                          } ?>

                            <?php if($proposalData['bid'][0]->updatebidamount){
                              echo '<button class="btn btn-primary bid01 " onclick="closeBid('.$proposalData[0]->b_id.','.$proposalData[0]->q_id.','.$proposalData['bid'][0]->updatebidamount.',1,'.$proposalData[0]->teamId.')">  '.$proposalData['bid'][0]->updatebidamount.' AUD ($)</button>'; } ?>

                            <?php if($proposalData['bid'][0]->updatebidamountsecond){
                              echo '<button class="btn btn-primary bid01 " onclick="closeBid('.$proposalData[0]->b_id.','.$proposalData[0]->q_id.','.$proposalData['bid'][0]->updatebidamountsecond.',1,'.$proposalData[0]->teamId.')">  '.$proposalData['bid'][0]->updatebidamountsecond.' AUD ($)</button>';
                            }

                          }else{
                            if(!empty($proposalData[0]->bidclosingamount)){
                              echo '<br/>The BID is assign to this '.($proposalData[0]->assignTeam==1 ? 'Team' : 'Professional').' and closing BID Amount is '.@$proposalData[0]->bidclosingamount.' AUD ($)';
                              echo '<br> <a href="'.base_url().'admin/milestone/view/'.$proposalData[0]->assignedbusiness_id.'/'.$proposalData[0]->q_id.'" class="btn btn-primary">Create Milestone</a>';
                            }

                          }?>

						<?php }?>
                        </div>
                        <!--//10/11/2017 -->

                     <?php //echo '<pre>';print_r($messageThread);?>

                     <?php

					  $messageThread = $this->quotation_model->messageThread($q_id,$b_id);
					 if($messageThread){ ?>
						 <div class="bid_01_half"><button class="btn btn-primary btn-xs bid02" onClick="showDiv(<?php echo $messageThread[0]->id;?>);">Show message thread</button></div>
						<?php $i =0;
								 foreach($messageThread as $mess){
                        	//echo '<pre>';print_r($row);
						 ?>
                         <div class="bid_02">


                         <div style="display:none;" class="bid_meg" id="divT_<?php echo $mess->id;?>" >
                       <div class="x_title">
                      <h2>Message Thread</h2>
                      <div class="clearfix"></div>
                    </div>
							 <?php

							 //echo '<pre>'; print_r($messageThread);
							 if($messageThread){
								 foreach($messageThread as $mess){
									  $dat = date_format(date_create($mess->created_date),"Y-m-d ");
						  			  $tim = date_format(date_create($mess->created_date),"H:i:s");
									if($mess->created_by !=$this->session->userdata('adminId')){?>
                                        <div class="mess_chat_on_pro_me">
                                            <div class="mess_chat_on_pro_photo">
                                            <?php if(isset($mess->businessLogo)){?>
                                            	<img src="<?php echo base_url();?>uploads/business/<?php echo $mess->businessLogo;?>">
                                            <?php }else {?>
                                            	<img src="<?php echo base_url();?>admin-assets/images/img.jpg">
                                            <?php }?>

                                            </div>
                                            <div class="mess_chat_on_pro_text">
                                                <h3><?php echo '<strong>'.$mess->business_name.'</strong>';?><span><b><?php echo $dat;?></b> <?php echo $tim;?></span></h3>
                                                <?php echo $mess->message;?><br>
                                            </div>
                                        </div>

							<?php } else{ ?>
                                    <div class="mess_chat_on_pro_client">
                      	<div class="mess_chat_on_pro_cleint_photo"><img src="<?php echo base_url();?>admin-assets/images/img.jpg"></div>
                        <div class="mess_chat_on_pro_cleint_text"><h3><?php  echo 'Me';?><span><b><?php echo $dat;?></b> <?php echo $tim;?></span></h3>
                        <?php echo $mess->message;?>
                        </div>
                   </div>



							<?php }?>

								 <?php }
							 }
					$i++;
						 }}else {
						 echo 'No Data Found';
					 }
					 ?>
                     </div>
                        <?php if($this->session->userdata('admin_user_type')==2 || $this->session->userdata('admin_user_type')==3){?>

                     <div><button data-toggle="modal" class="btn btn-primary btn-xs bid01" onClick="sendMessage(<?php echo $q_id;?>,<?php echo $b_id;?>);">SEND MESSAGE</button></div>
                     </div>
                      <?php } ?>
                      <hr>





                       <!--//10/11/2017 -->

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
        <!--Close Bid PopUp-->
        <div class="modal fade bs-example-modal-lgCloseAmount" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">

                                <div class="modal-header">
                                  <button type="button" class="close" id="closeBid2"><span aria-hidden="true">×</span>
                                  </button>
                                  <h4 class="modal-title" id="myModalLabel">You are going to close the bid with the Team.</h4>

                                </div>
                                <div class="modal-body">
                                <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                                    <span id="errBid" style="color: red;"></span>
                                    <span id="sucBid" style="color: green;"></span>

                                    <form class="form-horizontal" >
                                      <input type="hidden" id="quot_id" name="quotation_id" value="">
                                      <input type="hidden" id="assignTeam" name="assignTeam" value="">
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
								  <button type="button" class="btn btn-primary" id="bidagain">Bid Again</button>
                                </div>

                              </div>
                            </div>
                          </div>

        <!--Complete payment popup-->


<!--Close Bid PopUp-->
<div class="modal fade bs-example-modal-lgScheduleInterview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="closeInterviewModal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Interview Schedule</h4>

      </div>
      <div class="modal-body">
          <form class="form-horizontal" >
            <input type="hidden" id="quotation_id_interview" name="quotation_id_interview" value="">
            <input type="hidden" id="business_id_interview" name="business_id_interview" value="">
             <span id="errInterview" style="color:red"></span>
              <span id="sucInterView" style="color:green"></span>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Select Interview Date / Time: </label>
              <div class='input-group date' id='datetimepicker1'>
                   <input type='text' id="schedule_date_time" value="" class="form-control" />

                   <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                   </span>

               </div>

            </div>
          </form>
      </div>

      <div class="modal-footer" style="text-align: center;">

      <div id="loadingInterview" style="display: none;">
              <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
            </div>
        <button type="button" class="btn btn-default" id="closeInterviewModal1">Close</button>
        <button type="button" class="btn btn-primary" id="saveInterviewScheduled">Schedule Interview</button>

      </div>

    </div>
  </div>
</div>




<div class="modal fade bs-example-modal-lgReject" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close17"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Reject Proposal</h4>
      </div>
      <div class="modal-body">
      <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
      <span id="errReject" style="color: red;"></span>
      <span id="sucReject" style="color: green;"></span>
      <form class="form-horizontal">
        <input type="hidden" id="rejectid" name="rejectid" value="">
         <input type="hidden" id="businessid" name="businessid" value="">
        <div class="form-group">
          <label class="control-label col-sm-4" for="email">Short Note : </label>
          <div class="col-sm-4">
          	<!--<input type="text" name="shortnote" id="shortnote"/> -->
            <textarea name="shortnote" id="shortnote" ></textarea>
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
      <button type="button" class="btn btn-default" id="close18">Close</button>
      <button type="button" class="btn btn-danger" id="reject">Reject</button>
      </div>

    </div>
  </div>
</div>








<script type="application/javascript">
function showDiv(id){
  jQuery("#divT_"+id).toggle();
}

function sendMessage(quotation_id,businessId){
    jQuery(".bs-example-modal-lg").modal();
    jQuery("#quotationId").val(quotation_id);
    jQuery("#businessId").val(businessId);
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
  });


</script>








<!--Complete payment popup-->

 <!--delete services script-->
<script type="text/javascript">
function closeBid(business_id,quotation_id,amount,status,assignTeam){
  $(".bs-example-modal-lgCloseAmount").modal();
  $("#quot_id").val(quotation_id);
  $("#assignTeam").val(assignTeam);
  $("#business_id").val(business_id);
  $("#totAmount").html(amount+' AUD ($)');
  $("#amount").val(amount);
  $("#bidCloseAmount").val(amount);
  $("#status").val(status);
}

$("#closeBid1").click(function() {
  $("#quotation_id").val('');
  $("#assignTeam").val('');
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
  $("#assignTeam").val('');
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

  $("#saveCloseBid").click(function(){
    var quotation_id = $("#quot_id").val();
    var assignTeam = $("#assignTeam").val();
    var business_id =  $("#business_id").val();
    var amount =  $("#bidCloseAmount").val();
    var status =  $("#status").val();

      $("#loading").show();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/quotation/closeBidWithProfessionalandTeam",
        data:{business_id:business_id,quotation_id:quotation_id,status:status,amount:amount,assignTeam:assignTeam},
        success:function(data){
          $("#loading").hide();
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

   $("#bidagain").click(function(){
    var quotation_id = $("#quot_id").val();
    var assignTeam = $("#assignTeam").val();
    var business_id =  $("#business_id").val();
    var amount =  $("#bidCloseAmount").val();
      $("#loading").show();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/quotation/againBidWithProfessionalandTeam",
        data:{business_id:business_id,quotation_id:quotation_id,amount:amount,assignTeam:assignTeam},
        success:function(data){
          $("#loading").hide();
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

function showInterest(proposalId,b_id,q_id,amount){
  if(proposalId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/quotation/showInterest",
      data:{proposalId:proposalId,b_id:b_id,q_id:q_id,amount:amount},
      success:function(data){
        location.reload();
      }
    });
  }

}

function bargening(proposalId,b_id){
  if(proposalId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/quotation/bargening",
      data:{proposalId:proposalId,b_id:b_id},
      success:function(data){
        location.reload();
      }
    });
  }

}


/*Proposal Rejected process start here*/

function reject(proposalId,b_id){
  var rejectid = $("#reject_id").val();
  var businessid = $("#business_id").val();
  $("#rejectid").val(proposalId);
  $("#businessid").val(b_id);
  $("#rejectid").val(proposalId);
  $(".bs-example-modal-lgReject").modal();
}
$("#close17").click(function() {
  $("#reject_id").val('');
  $("#business_id").val('');
  $(".bs-example-modal-lgReject").modal('hide');
});

$("#close18").click(function() {
  $("#reject_id").val('');
  $("#business_id").val('');
  $(".bs-example-modal-lgReject").modal('hide');
});

$("#reject").click(function(){
  var rejectid = $("#rejectid").val();
  var businessid =   $("#businessid").val();
   var shortnote =   $("#shortnote").val();
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/quotation/reject",
    data: {rejectid:rejectid,businessid:businessid,shortnote:shortnote},
    success: function(data) {
		
      if (data=='success'){
        $("#sucReject").html('Proposal Rejected.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errReject").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Proposal Rejected process Ends Here*/



function scheduleInterview(q_id,b_id){
  $("#quotation_id_interview").val(q_id);
  $("#business_id_interview").val(b_id);
  $(".bs-example-modal-lgScheduleInterview").modal('show');
}

$("#saveInterviewScheduled").click(function(){
  //alert('clic');
  var error=0;
  var quotation_id = $("#quotation_id_interview").val();
  var business_id =  $("#business_id_interview").val();
  var schedule_date_time =  $("#schedule_date_time").val();
  if(schedule_date_time==''){
    $("#errInterview").html('Please select Interview Date/Time');
    error=1;
  }else{
    $("#errInterview").html('');
    error=0;
  }
  if(error==0){
    $("#loadingInterview").show();
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/quotation/scheduleInterView",
      data:{business_id:business_id,quotation_id:quotation_id,schedule_date_time:schedule_date_time},
      success:function(data){
        $("#loadingInterview").hide();
        if (data=='success'){
          $("#sucInterView").html('Interview Scheduled successfully.');
          setTimeout(function(){$('#sucInterView').html(''); location.reload();}, 4000);
        }else{
          $("#errInterView").html('Something wrong. Interview not Scheduled');
          setTimeout(function(){$('#errInterView').html(''); location.reload();}, 4000);
        }
      }
    });
  }

});
</script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                  minDate: new Date(),
                });
            });
        </script>
