<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- sidebar menu -->
        <?php //$this->load->view('admin/left-sidebar parmarvarsha469@gmail.com');?>
        <!-- /sidebar menu -->
        <!-- top navigation -->
        <?php $this->load->view('admin/top-navigation');?>
        <!-- /top navigation -->

        <div class="boday_main">
          <div class="top_bradcum">
              <div class="containernew">
                <div class="title_brad">My Projects</div>
              </div>
            </div>
           
          <div class="main_container01">
              <!-- page content -->
             <?php //echo '<pre>';print_r($$bidDetails); ?>
            <div class="right_col" role="main">
              <div class="macth_project_view">
                <div class="containernew">
                  <div class="row">
                    <div class="col-md-12">
                      
                    </div>
                  </div>
                  <div class="row">  
                  
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="project_view_left">
                        <div class="project_view_new"><?php echo $leadDetail[0]->project_name;?></div>
                        <div class="project_view_ul">
                          <ul>
                            <li><span>Project posted</span><?php echo date('d M Y',strtotime($leadDetail[0]->created_date));?></li>
                            <li><span>Project duration (approx.)</span><?php echo $leadDetail[0]->no_of_hours;
							//echo $days = $leadDetail[0]->no_of_hours/24;	?> Hours</li>
                            <li><span>Budget (approx.)</span><?php if($leadDetail[0]->bidamounthire && $leadDetail[0]->bidclosingamount==0){
								echo '$'.$leadDetail[0]->bidamounthire;}else{ echo '$'.$leadDetail[0]->bidclosingamount;}?> / <?php echo $leadDetail[0]->paytype;?></li>
                            <li><span>Category</span><?php echo $leadDetail[0]->category_name;?></li>
                            <li><span>Sub-Category</span><?php echo $leadDetail[0]->category_name;?></li>
                            <!--<li><span>Area of expertise</span>Marketing & PR</li>-->
                            <li><span>Consultant location</span><?php echo $leadDetail[0]->prefered_mode;?></li>
                            <?php if($leadDetail[0]->location){echo '<li><span>Location</span>'.$leadDetail[0]->location.'</li>';}?>
                            
                          </ul>
                        </div>
                        <div class="project_work_view">
                          <h3>Objectives and Key Deliverables</h3>
                          <?php echo $leadDetail[0]->work_detail;?>                          
                        </div>
                       
                        <?php if($leadDetail[0]->comment){?>                        
                        <div class="project_work_view">
                          <h3>Additional Comments</h3>
                          <?php echo $leadDetail[0]->comment;?>                          
                        </div>
                        <?php }?>
                      </div>
                      <?php //echo '<pre>';print_r($bidDetails[0]);die;?>
                        <?php if(isset($bidDetails[0]->id) && $bidDetails[0]->id){?>
						<div class="bid_02">
                        <div class="bid_01_half"><button class="btn btn-primary btn-xs bid02" onClick="showDiv(<?php echo $bidDetails[0]->id;?>);">Show message thread</button></div>
                       <div style="display:none;" class="bid_meg" id="divT_<?php echo $bidDetails[0]->id;?>" >
                       <div class="x_title">
                      <h2>Message Thread</h2>

                      <div class="clearfix"></div>
                    </div>
					<?php 
                    $messageThread = $this->quotation_model->messageThread($bidDetails[0]->quotation_id,$bidDetails[0]->business_id);
                        if($messageThread){
                            foreach($messageThread as $mess){	
                            $dat = date_format(date_create($mess->created_date),"Y-m-d ");  
                            $tim = date_format(date_create($mess->created_date),"H:i:s");                        
                                if($mess->created_by==$this->session->userdata('adminId')){?>		
                                <div class="mess_chat_on_pro_me">
                                <div class="mess_chat_on_pro_photo">
                                    <?php if($mess->businessLogo){?> 
                                        <img src="<?php echo base_url();?>uploads/business/<?php echo $mess->businessLogo;?>">                      
                                    <?php }else {?>
                                        <img src="<?php echo base_url();?>admin-assets/images/img.jpg">
                                    <?php }?>			
                                </div>                        
                                <div class="mess_chat_on_pro_text">
                                    <h3><?php  echo 'Me';?><span><b><?php echo $dat;?></b> <?php echo $tim;?></span></h3>
                                    <?php echo $mess->message;?><br>
                                </div>
                                </div>                      
                                <?php } else{ ?>
                                    <div class="mess_chat_on_pro_client">
                                    <div class="mess_chat_on_pro_cleint_photo"><img src="<?php echo base_url();?>admin-assets/images/img.jpg"></div>
                                    <div class="mess_chat_on_pro_cleint_text"><h3><?php echo '<strong>'.$mess->name.'</strong>';?><span><b><?php echo $dat;?></b> <?php echo $tim;?></span></h3>
                                    <?php echo $mess->message;?>
                                    </div>
                                    </div>            
                                <?php }
                                }
                            }else{ 
                                echo 'No message'; 
                    		}?>
                     </div>
                     <?php if($this->session->userdata('admin_user_type')==2){?>
                      <button data-toggle="modal" class="send_mesg_bider_chat" onClick="sendMessage(<?php echo $bidDetails[0]->quotation_id;?>,<?php echo $bidDetails[0]->business_id;?>);">SEND MESSAGE</button>
                      <?php } ?>
                      </div> 
                      <?php }?>                     
                    </div>
                    

                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <div class="project_view_right">
                      
                        <!--<p>You will be required to submit a brief proposal outlining your approach and deliverables.</p>
                        <button><i class="fa fa-envelope" aria-hidden="true"></i> Submit proposal</button>-->
                        
                        <?php                   
                    if($bidDetails && $this->session->userdata('adminId')==$bidDetails[0]->business_id){                  
                      foreach($bidDetails as $row){?>
                      <div class="bid_01 ne-project-view"><div class="bid_01_half"><label>Client's Name  </label></div>
                      <?php if($leadDetail[0]->confedential ==1 ) { echo 'Confedential';} else { ?><a href="<?php echo base_url();?>admin/business/view/<?php echo $row->business_id;?>"><?php echo $row->business_name;?></a> <?php } ?></div>

                      <div class="bid_02 ne-project-view"><div class="bid_01_half"><label>Bidding Date/Time  </label></div> <?php echo date('d-M-Y H:i A',strtotime($row->created_date));?></div>

                      <div class="bid_02 ne-project-view">
                         <div class="bid_01_half">Best Price</div>
                              <?php if($row->business_id==$row->assignedbusiness_id || $row->bidamountindividual){ ?>
                          Client's best price for this Job is <strong><span class="best_price_client"><?php echo $row->bidamountindividual;?> AUD ($)</span></strong>
                          <?php } ?>
                      </div>
                      <?php //echo '<pre>';print_r($row);?>
                      <div class="bid_02 ne-project-view">
                        <div class="bid_01_half"><label>BID Status</label></div>
                        <?php if($row->status==1){
                          echo '<span style="color:#565555;">BID is closed & </span> ';
                           if($this->session->userdata('adminId')==$row->assignedbusiness_id) {
                              echo '<span style="color:#565555;">Project is Assigned to You.   <br> BID closing amount is <strong class="best_price_client">   '.$row->bidclosingamount.' AUD ($)</strong></span>';
                echo '<a href="'.base_url().'admin/milestone/view/'.$row->assignedbusiness_id.'/'.$row->quotation_id.'" class="create-mile">Create Milestone</a>';
                            }
                          }else{
                            echo 'BID is open';
                          }
                        ?>
                        <?php //echo '<a href="javascript:void();" class="btn btn-success bid01" onclick="cancelBidWithProfessional('.$row->quotation_id.');">Click to Cancel</a>'; ?>
                      </div>

                      <div class="bid_02 ne-project-view">
                        <div class="bid_01_half"><label>Your BID Amount  </label></div>
                        <?php //echo '<pre>';print_r($this->session->userdata);?>                        
                      <button  class="bid_amount"
                      <?php if($row->status==0 && $this->session->userdata('admin_user_type')==3){?>
                      title="click to confirm/close BID" onClick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->bidamount;?>,1)" <?php } ?>><?php echo $row->bidamount;?> AUD ($)</button>

                      <?php if($row->updatebidamount!=0){ ?>
                      <button  class="bid_amount"
                      <?php if($row->status==0 && $this->session->userdata('admin_user_type')==3){?>
                        title="click to confirm/close BID" onClick="closeBid(<?php echo $row->business_id;?>,<?php echo $row->quotation_id;?>,<?php echo $row->updatebidamount;?>,1)" <?php } ?>><?php echo $row->updatebidamount;?> AUD ($)</button>



                      <?php } if($row->updatebidamountsecond!=0){ ?>
                      <button  class="bid_amount"
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
                      	<?php if($row->bidcount < 3){?>
                       <button class="place_another_bid_amount" onClick="placeAmount(<?php echo $row->id;?>,<?php echo $row->bidcount;?>);">Place another BID Amount</button>
<?php }?>


                        <?php } ?>
                        </div>
                        <?php if($milestoneData){ ?>
                          <div class="bid_02 ne-project-view">
                             <div class="bid_01_half">Milestone Created</div>
                              <?php  echo '<a href="'.base_url().'admin/milestone/view/'.$row->assignedbusiness_id.'/'.$row->quotation_id.'" class="bid_amount">Click to view</a>';?>
                          </div>
                        <?php } ?>

                        <?php if($this->session->userdata('adminId') == $row->assignedbusiness_id){?>
                        <div class="bid_02 ne-project-view">
                           <div class="bid_01_half">Start Your Project</div>

                             <?php if($row->assignTeam==0){ ?>
                              You can start your project with your Team or Individually as freelancer | click <a href='<?php echo base_url();?>admin/projects/assignteam/<?php echo $row->quotation_id;?>' onClick="checkAndAssignTeam(<?php echo $row->quotation_id;?>)" class="start_team">here</a> to start with your team
                             <?php }else{ ?>
                               You have assinged this project to your <?php echo '<strong>'.$row->team_name.'</strong>';?> team
                             <?php } ?>

                        </div>
                        <?php } ?>
                      <hr>
                     <?php
                      } } else {
                      //echo '<pre>'; print_r($leadDetail);
                     ?>

                        <div class="bid_01 ne-project-view">
                          <div class="bid_01_half">Client's Name</div> <?php if($leadDetail[0]->confedential==1) { echo 'Confedential'; }else{ echo $leadDetail[0]->name; }?></div>
                        <!-- <div class="bid_01 ne-project-view">
                          <div class="bid_01_half">Work Details </div> <div class="work_div_detail"><?php echo $leadDetail[0]->work_detail;?></div>
                        </div> -->
                        <div class="bid_01 ne-project-view">
                          <div class="bid_01_half">Proposal Amount by client </div> <div class="best_price_client"><?php echo $leadDetail[0]->bidamounthire;?> AUD ($)</div></div>
                       
                      
                      <div class="bid_02 ne-project-view">
                               <div class="bid_01_half">Interview Details</div>

                        
                        <?php if(!empty($interviewData)){?>
              <?php echo 'Interview Date & Time : '.$interviewData[0]->schedule_date_time; ?> ( SYDNEY TIME )
               <?php  if($interviewData[0]->interviewBusinessId==$this->session->userdata('adminId') && $interviewData[0]->interview_accepted==0){?>
                              
                              <button class="btn btn-primary btn-xs accept_inter" onClick="acceptInterview(<?php echo $interviewData[0]->interviewId;?>);">Accept Interview Request</button>
                            <?php }else{
                              echo '<span class="interview_accepted">Interview Accepted by You.</span>';
                            }
                         }else{
              echo ' <span style="color:#615f5f">No Interview Scheduled</span>';
                        }
            ?>
             
                      </div>
                      
                       <?php
                      if(!empty($proposalData)){
                  foreach ($proposalData as $rows) {  
				  //echo '<pre>';print_r($rows);die;
                    if($this->session->userdata('adminId')==$rows->proposalBusinessId){
                          if($rows->proposal_accepted==0){ ?>                        
                            <div class="bid_02 ne-project-view">
                                <div class="bid_01_half"><button class="ne-send-proposal" onClick="postProposal(<?php echo $leadDetail[0]->id;?>);"><strong>Send Proposal</strong></button></div>
                            </div>
                           		
							  <?php }elseif($rows->proposal_accepted==2){?>
                
                            <div class="bid_02 ne-project-view">
                              <div class="bid_01_half">Proposal Status</div><button class="place_bid_amount"><span class="">Rejected</span></button>
                            </div>
                          <?php }elseif($rows->proposal_accepted==3){?>                             
                              <div class="bid_02 ne-project-view">
                              <div class="bid_01_half">Proposal Accepted</div>Client hired you for this job and closing amount is <?php echo '$'.$leadDetail[0]->bidclosingamount;?> (AUD)

                              <a href="<?php echo base_url();?>admin/milestone/view/<?php echo $leadDetail[0]->assignedbusiness_id;?>/<?php echo $leadDetail[0]->id;?>" class="create-mile">Create Milestone</a>
                            </div>
                                  
               <?php } else{ ?>
                          <div class="bid_02 ne-project-view">
                            <div class="bid_01_half">Proposal Accepted</div><button class="place_bid_amount" onClick="postBid(<?php echo $leadDetail[0]->id;?>);"><span class="">Place Your BID Amount</span></button>
                          </div>
                      <?php } } }}else{?>                     
                            <div class="bid_02 ne-project-view">
                                <div class="bid_01_half"><button class="ne-send-proposal" onClick="postProposal(<?php echo $leadDetail[0]->id;?>);"><strong>Send Proposal</strong></button>
                                    </div>
                        </div>
                      <?php }?>
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

<!--Proposal By Business-->
<div class="modal fade bs-example-modal-lgPostProposal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="closePostProposal1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Send your proposal to Client</h4>

      </div>
      <div class="modal-body">
        <div class="send_pro01">
          <form class="form-horizontal">
            <div class="form_pop">
            <input type="hidden" id="proposal_quotation_id" name="quotation_id" value="">
            <input type="hidden" id="bid_status" value="<?php echo $leadDetail[0]->bid_status;?>">
            <input type="hidden" id="proposal_count" value="<?php echo $leadDetail[0]->proposal_count;?>">
            
            <div class="row form-group">
                <div class="col-md-12">
                  <label class="" for="email">Project Name : </label>
                    <input type="text" class="" name="proposalprojectname" id="proposalprojectname">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label class="" for="email">Overview : </label>
                    <textarea class="" id="proposaloverview"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label class="" for="email">Project Summary : </label>
                    <textarea class="" id="proposalsummary"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="" for="email">Scope of work : </label>
                <textarea class="form-control" id="proposalscopeofwork"></textarea>
              </div>
            </div>
            
           

            <div class="row form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="" for="email">Time frame : </label>
                    <select id="proposaltime" class="form-control">
                      <option value="week">Week</option>
                      <option value="month">Month</option>
                    </select>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <label class="" for="email">&nbsp;</label>
                    <select id="proposaltimelimit" class="form-control">
            <?php for($i=1;$i<=12;$i++){ ?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            
            <div class="row form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <label class="" for="email">Project fee (AUD) : </label>
                    <input type="text" class="" name="proposalfee" id="proposalfee" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <label class="" for="email">Additional Details  : </label>
                    <textarea class="" id="proposaladditionaldetails"></textarea>
                </div>
                
            </div>  
            </div>        

          </form>
          </div>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <div id="errProposal" style="color: red;"></div>
          <div id="sucProposal" style="color: green;"></div>
        </div>
        <div id="loadingBid" style="display: none;">
           <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
        </div>
        <button type="button" class="pop_close" id="closePostProposal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="savePostProposal"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Proposal</button>
      </div>

    </div>
  </div>
</div>


<!--Ends Her-->
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
      
        <div class="send_pro01">
          <form class="form-horizontal">
            <div class="form_pop">
              <input type="hidden" id="quotation_id" name="quotation_id" value="">
              <input type="hidden" id="bid_status" value="<?php echo $leadDetail[0]->bid_status;?>">
              <input type="hidden" id="bid_count" value="<?php echo $leadDetail[0]->bid_count;?>">
              
               <div class="row form-group">
                <div class="col-md-12">
                <label  for="email">Amount : </label>
                <input type="text" class="numeric" id="bidamount" placeholder="BID Amount">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                <label for="email">Message : </label>
                <textarea  id="message"></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errH" style="color: red;"></span>
          <span id="sucH" style="color: green;"></span>
        </div>
        <div id="loadingBid" style="display: none;">
                <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
        </div>
        <button type="button" class="pop_close" id="closePostBid"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="savePostBid"><i class="fa fa-paper-plane" aria-hidden="true"></i> Place Your BID</button>
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
                          <h4 class="modal-title" id="myModalLabel">Place your bid</h4>

                        </div>
                        <div class="modal-body">
                        
                            <div class="send_pro01">

                              <form class="form-horizontal">
                                <div class="form_pop">
                                  <input type="hidden" id="quotation_id" name="quotation_id" value="">
                                  <input type="hidden" id="bidcount" name="bidcount" value="">
                                  <div class="row form-group">
                                    <div class="col-md-12">
                                      <label for="email">Bid Amount : </label>
                                      <input type="text" class="numeric" id="bidAmountIndividual" placeholder="BID Amount">
                                    </div>
                                  </div>
                                </div>
                              </form>
                          </div>
                        </div>
                        <div class="modal-footer" style="text-align: center;">
                          <div class="pop_mes">
                            <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                            <span id="errBid" style="color: red;"></span>
                            <span id="sucBid" style="color: green;"></span>
                          </div>
                          <div id="loadingBid" style="display: none;">
                                  <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
                          </div>
                          <button type="button" class="pop_close" id="close2"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                          <button type="button" class="pop_submit" id="save1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Place Your BID</button>
                        </div>

                      </div>
                    </div>
                  </div>
<!-- Ends here -->

<!--delete services script-->
<script type="text/javascript">

function postProposal(quotation_id){
  $(".bs-example-modal-lgPostProposal").modal();
  $("#proposal_quotation_id").val(quotation_id);
}

$("#closePostProposal").click(function() {
    $("#proposal_quotation_id").val('');
    $("#proposalmessage").val('');
    $("#err").html('');
    $("#suc").html('');
    $("#loading").hide();
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgPostProposal").modal('hide');
});
$("#closePostProposal1").click(function() {
   $("#proposal_quotation_id").val('');
    $("#proposalmessage").val('');
    $("#err").html('');
     $("#suc").html('');
    $("#loading").hide();
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgPostProposal").modal('hide');
});

$("#savePostProposal").click(function() {
  
  var error=0;
  $("#sucProposal").html();
  $("#errProposal").html();
    var quotation_id = $("#proposal_quotation_id").val();
    var proposalprojectname = $("#proposalprojectname").val();
    var proposaloverview = $("#proposaloverview").val();
    var message = $("#proposalsummary").val();
    var proposalscopeofwork = $("#proposalscopeofwork").val();
    var proposaltime = $("#proposaltime option:selected").val();
    var proposaltimelimit = $("#proposaltimelimit option:selected").val();
    var proposaladditionaldetails = $("#proposaladditionaldetails").val();
    var bid_status = $("#bid_status").val();
    var proposal_count = $("#proposal_count").val();
    var proposalfee = $("#proposalfee").val();


    if(proposalprojectname==''){
      $("#errProposal").html('Please Enter Project Name');
      error=1;
    }else{
      $("#errProposal").html('');
      error=0;
    }

    if(proposaloverview==''){
      $("#errProposal").html('Please Enter Project Overview');
      error=1;
    }else{
      $("#errProposal").html('');
      error=0;
    }

    if(proposalscopeofwork==''){
      $("#errProposal").html('Please Enter Scope of work');
      error=1;
    }else{
      $("#errProposal").html('');
      error=0;
    }

    if(message==''){
      $("#errProposal").html('Please Enter Summary.');
      error=1;
    }else{
      $("#errProposal").html('');
      error=0;
    }
    if(error==0){

      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postProposal",
        data: {quotation_id: quotation_id,proposalprojectname:proposalprojectname,proposaloverview:proposaloverview,message: message,proposalscopeofwork:proposalscopeofwork,proposaltime:proposaltime,proposaltimelimit:proposaltimelimit,proposaladditionaldetails:proposaladditionaldetails,proposalfee:proposalfee,bid_status:bid_status,proposal_count:proposal_count},
        success: function(data) {
          //alert(data);
          if (data=='success'){
            $("#sucProposal").html('Your proposal to Client has sent.');
            setTimeout(function(){location.reload(); }, 4000);
          }else{
            $("#errProposal").html(data);
            setTimeout(function(){location.reload();}, 4000);
          }
        }
      });
    }

  });

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
      $("#loadingBid").show();
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postBidAmountByBusinessToBid",
        data: {quotation_id: quotation_id,bidcount:bidcount,bidAmountIndividual: bidAmountIndividual},
        success: function(data) {
          $("#loadingBid").show();
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
}

function acceptInterview(interviewId){
  if(interviewId){
    $.ajax({
      type:"post",
      url: "<?php echo base_url();?>admin/quotation/acceptInterview",
      data:{interviewId:interviewId},
      success:function(data){
        if(data=='success'){
          alert('Interview accepted');
          location.reload();
        }else{
          alert('Something wrong');
          location.reload();
        }

      }
    });
  }
}

</script>