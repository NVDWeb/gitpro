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
                    <h2>Milestone</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php echo base_url();?>admin/milestone/add/<?php echo $b_id;?>/<?php echo $q_id;?>"> <i class="fa fa-plus-circle"></i> Add Milestone</a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Project Name</th>
                          <th>Milestone Amount</th>
                          <?php if($this->session->userdata('admin_user_type')==3) { ?>
                          <th>Start/End date</th>
                            <th>Action</th>
                            <th>Milestone Status</th>
                            <th>Confirm</th>
                          <?php } else{ ?>
                            <th>Edit</th>
                            <th>Milestone Status</th>
                        <?php  } ?>

                        </tr>
                      </thead>


                      <tbody>
                      <?php
                      $i=0;
                      $j=0;
                      $te=0;
                      foreach ($milestoneList as $row) {
                        //echo '<pre>';print_r($row);
                        if($milestoneList[$i]->start_date=='0000-00-00'){
                          $te=$te+count($milestoneList[$i]->start_date=='0000-00-00');
                          $j=0;
                        }else{
                          $te=0;
                          $j=$j+1;
                        }
                        echo '<tr>';
                        echo '<td>'.$row->project_name.'</td>';
                        echo '<td>'.$row->amount.'</td>';
                        if($this->session->userdata('admin_user_type')==3) {
                          echo '<td>'.$row->start_date.' / '.$row->end_date.'</td>'; if($row->status==1 && $row->realeased_status==0) { ?>
                          <td><select id="" name="status" onChange="changeStatus('<?php echo $row->id;?>','<?php echo $row->milestone_name ; ?>','<?php echo $row->b_id;?>','<?php echo $row->amount;?>',this.value)">
                            <option value="0">What you want to do</option>
                            <option value="1">Released</option>
                            <option value="2">Dispute</option>
                            </select></td>
                          <?php } else if($row->status==1 && $row->realeased_status==1) {  echo '<td>Amount Released</td>';}else{ echo '<td>Wait for close the Milestone</td>' ; } echo '<td>'.($row->status==0 ? 'Open' : 'Done By Professional').'</td>'; ?>

                            <?php
                            if($this->session->userdata('admin_user_type')==3 && ($this->session->userdata('adminId') == $row->created_by)){
                            if($row->milestone_accepted_professional==0){ ?>
                            <td>Waiting for Approval</td>
                          <?php }else if($row->milestone_accepted_professional==2){ echo '<td>Cancelled</td>'; } else{?>
                            <td>Accepted By Professional</td>
                          <?php } } else{ ?>
                              <?php if($row->milestone_accepted==0){?>
                              <td>
                                <select id="" name="status" onChange="acceptMilestone('<?php echo $row->id;?>','<?php echo $row->milestone_name ; ?>','<?php echo $row->b_id;?>','<?php echo $row->amount;?>',this.value)">
                                  <option value="0">Select your Choice</option>
                                  <option value="1">Accept</option>
                                  <option value="2">Cancel</option>
                                </select>
                              </td>
                            <?php } else{ echo '<td>Approved By You</td>' ;}?>

                        <?php   }?>

                        <?php }else{
                            echo '<td>';
                            if($row->start_date!='0000-00-00'){
								echo $row->start_date .' | '.$row->end_date;
								if($row->id){
									$getSplitAmountByMilestoneIds = $this->milestone_model->getSplitAmountByMilestoneId($row->id);
									if(!empty($getSplitAmountByMilestoneIds)){
										if($getSplitAmountByMilestoneIds[0]->amount){//echo $getSplitAmountByMilestoneId->amount;?>                                        	<?php if($row->status==0 && ($row->milestone_accepted==1 || $row->milestone_accepted_professional==1 )){
												echo '<a href="javascript:void()" onclick="closeMilestone('.$row->id.')" title="Click to Close" class="btn btn-danger">Milestone is Open</a>' ;?>
												<?php if($row->hireda==2){ ?>
                            <a href="<?php echo base_url();?>admin/milestone/split/<?php echo $row->id;?>" class="btn btn-primary">Add Split Amount</a>
												<?php
												}
											}
										}
									}else{
									if($row->hireda==2){ ?>
                                    	<a href="<?php echo base_url();?>admin/milestone/split/<?php echo $row->id;?>" class="btn btn-primary">Add Split Amount</a>
										<?php }
									}
								}

								?>
                            <?php }else{
                              if($j==0 && $te==1 ){?>
                                <span id="startD">Set Start / End date</span>
                                <input type="hidden" id="milestoneId" value="<?php echo $row->id;?>">
                                <div id="hh" style="display:none;">
                                  <input type="text" style="width: 270px" name="reservation" id="reservation" class="form-control" value="">
                                  <button class="btn btn-success bid01" id="updateDateRange" onClick="updateDateRange();">Update</button>
                                </div>
                                <?php
                               }else{
                                 echo 'edit previous';
                               }
                            } ?>
                          <?php echo '</td>';
                          if($this->session->userdata('admin_user_type')==2 && ($this->session->userdata('adminId')== $row->created_by)){
                            if($row->milestone_accepted==0){
                              echo '<td>Waiting for Approval</td>';
                            }else if($row->milestone_accepted==2){
                              echo '<td>Cancelled by Client</td>';
                            }else{
                              echo '<td>Accepted by Client</td>';
                            }

                          }else{
                            if($row->milestone_accepted_professional==0){ ?>
                              <td>
                                <select id="" name="status" onChange="acceptMilestoneByProfessional('<?php echo $row->id;?>','<?php echo $row->milestone_name ; ?>','<?php echo $row->b_id;?>','<?php echo $row->amount;?>',this.value)">
                                  <option value="0">Select your Choice</option>
                                  <option value="1">Accept</option>
                                  <option value="2">Cancel</option>
                                </select>
                              </td>
                            <?php }else if($row->milestone_accepted_professional==2){
                              echo '<td>Cancelled by You</td>';
                            }else{
                              echo '<td>Accepted by You</td>';
                            }


                          }

                        }

                        echo '</tr>';

                      $i++;
                      $j++;
                      }
                      ?>

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
        <!-- /page content -->

<!-- Confirmation popup Start here -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Pay to Professional</h4>
      </div>
      <div class="modal-body" id="real">
        Realesed funds cannot be returned.Are you sure you want to continue?
      </div>
    <input type="hidden" id="amount" value="">
    <input type="hidden" id="milestoneId" value="">
    <input type="hidden" id="businessID" value="">


      <div class="modal-footer" style="text-align: center;">
        <div id="loading" style="display: none;">
            <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
        </div>
        <button type="button" class="btn btn-default" id="close">No</button>
        <button type="button" class="btn btn-primary" id="save">Yes</button>
      </div>

    </div>
  </div>
</div>
<!--Ends Here -->


<!-- Confirmation popup Start here -->
<div class="modal fade bs-example-modal-lgCancelMilestone" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1CancelMilestone"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Cancel</h4>
      </div>
      <div class="modal-body">
        Are you sure , You want to cancel the Milestone ?
      </div>
    <input type="hidden" id="milestoneIdCancelMilestone" value="">
    <input type="hidden" id="businessIDCancelMilestone" value="">


      <div class="modal-footer" style="text-align: center;">
        <div id="loading" style="display: none;">
            <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
        </div>
        <button type="button" class="btn btn-default" id="closeCancelMilestone">No</button>
        <button type="button" class="btn btn-primary" id="saveCancelMilestone">Yes</button>
      </div>

    </div>
  </div>
</div>
<!--Ends Here -->


<div id="paypal" style="display: none">
<form id="pay" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="love4u_1352373210_biz@yahoo.co.in">
<input type="hidden" name="undefined_quantity" value="1">
<input type="hidden" name="item_name" id="item_name" value="">
<input type="hidden" name="item_number" value="dd01">
<input type="hidden" name="amount" id="paypalamount" value="">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="custom" id="order_id" value="">
<input type="hidden" name="return" value="<?php echo base_url();?>admin/milestone/notify">
<input type="hidden" name="cancel_return" value="<?php echo base_url();?>admin/quotation/cancel">
<input type="hidden" name="notify_url" value="<?php echo base_url();?>admin/quotation/notify">
<input type="image" border="0" name="submit" src="http://images.paypal.com/images/x-click-but5.gif" alt="Buy doodads with PayPal">
</form>
</div>





<script type="text/javascript">
$(document).ready(function() {
  $("#startD").click(function(){
    $("#startD").hide();
    $("#hh").show();
  });

  $("#close").click(function() {
    $(".bs-example-modal-lg").modal('hide');
    location.reload();
  });

  $("#save").click(function() {
    var milestoneId = $("#milestoneId").val();
    //var amount = $("#amount").val();
    //var businessID = $("#businessID").val();
    if(amount) {
      $("#loading").show();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/milestone/updateReleasedStatus",
        data:{milestoneId:milestoneId},
          success:function(data){
              $("#loading").hide();
            if(data=='Success'){

              $("#real").html('Great ! , The amount has been released from your side.')
            }else{
                $("#real").html('OOPS ! , Something went Wrong.')
            }
        }
      });
    }
  });

  $("#close1CancelMilestone").click(function() {
    $(".bs-example-modal-lgDispute").modal('hide');
    location.reload();
  });

  /*Cancel the milestone*/
  $("#closeCancelMilestone").click(function() {
    $(".bs-example-modal-lgDispute").modal('hide');
    location.reload();
  });

  $("#saveCancelMilestone").click(function() {
    var milestoneId = $("#milestoneIdCancelMilestone").val();
    var businessID = $("#businessIDCancelMilestone").val();
    if(amount) {
      //$("#loading").show();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/milestone/cancelMilestone",
        data:{business_id:businessID,milestoneId:milestoneId},
        success:function(data){
             //$("#loading").hide();
             location.reload();
        }
      });
    }
  });

  $("#close1").click(function() {
    $(".bs-example-modal-lg").modal('hide');
    location.reload();
  });

});

function changeStatus(milestoneId,milestone_name,businessID,amount,type){
  if(type==1){
    $("#item_name").val(milestone_name);
    $("#amount").val(amount);
    $("#paypalamount").val(amount);
    $("#milestoneId").val(milestoneId);
    $("#businessID").val(businessID);
    $(".bs-example-modal-lg").modal();
  }else if(type==2){

    $(".bs-example-modal-lgDispute").modal();
  }else{
    $(".bs-example-modal-lgCancel").modal();
  }
}

function updateDateRange(){
  var dateRange = $("#reservation").val();
  var milestoneId = $("#milestoneId").val();
  jQuery.ajax({
    type: "POST",
    url: "<?php echo base_url();?>admin/milestone/updateMilestoneDates",
    data: {dateRange: dateRange,milestoneId:milestoneId},
    success: function(data) {
      location.reload();
    }
  });
}

function closeMilestone(milestoneId){
  //alert(milestoneId);
  if(milestoneId){
    jQuery.ajax({
    type: "POST",
    url: "<?php echo base_url();?>admin/milestone/updateMilestoneStatus",
    data: {milestoneId:milestoneId},
    success: function(data) {
      location.reload();
    }
  });
  }
}

function acceptMilestone(milestoneId,milestone_name,businessID,amount,type){
  if(type==1 && milestoneId){
      jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/milestone/updateMilestoneAcceptedStatus",
      data: {milestoneId:milestoneId,milestone_name:milestone_name,businessID:businessID,amount:amount,type:type},
      success: function(data) {
        if(type==1){
          window.location.href="<?php echo base_url();?>admin/milestone/method";
        }
      }
    });
  }else{
    $("#milestoneIdCancelMilestone").val(milestoneId);
    $("#businessIDCancelMilestone").val(businessID);
    $(".bs-example-modal-lgCancelMilestone").modal();
  }
}

function acceptMilestoneByProfessional(milestoneId,milestone_name,businessID,amount,type){
  if(type==1 && milestoneId){
      jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/milestone/updateMilestoneAcceptedProfessionalStatus",
      data: {milestoneId:milestoneId,milestone_name:milestone_name,businessID:businessID,amount:amount,type:type},
      success: function(data) {
        if(type==1){
          location.reload();
        }
      }
    });
  }else{
    $("#milestoneIdCancelMilestone").val(milestoneId);
    $("#businessIDCancelMilestone").val(businessID);
    $(".bs-example-modal-lgCancelMilestone").modal();
  }
}
</script>
