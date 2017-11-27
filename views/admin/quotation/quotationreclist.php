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
                    <h2>Quotation Recommendations</h2>
                    <div class="thanks01" style="float: right;"><h2>thanks</h2></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="tutorial_list">
                      <?php 
					  //echo '<pre>';print_r($this->session->userdata);
                      if(count($quorecomendationlist) > 0){						  
                      foreach ($quorecomendationlist as $row) { //echo '<pre>';print_r($row);  ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-xs-7">
                              <h2><?php echo $row->businessName;?></h2>
                              <p><strong>About: </strong><?php echo @$row->profile_name;?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php  if(isset($row->country_name)) {
                                  echo $row->country_name; } echo ','; if(isset($row->state_name)) {
                                  echo $row->state_name; } echo ','; if(isset($row->city_name)) {
                                  echo $row->city_name; } ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">                              
                          <?php if($row->businessLogo!='' ) { ?>
                            <img class="img-circle img-responsive" src="<?php echo base_url();?>uploads/business/<?php echo $row->businessLogo ;?>" alt="Avatar">
                          <?php }else { ?>
                          <img class="img-circle img-responsive" src="<?php echo base_url();?>admin-assets/images/img.jpg" alt="Avatar">                      
                            <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                          <?php } ?>
                            </div>
                         </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-12 emphasis">
                              <p class="ratings">
                               <?php
                              if(isset($row->rating)){ ?>
                                  <a><?php echo $row->rating;?>/5</a>
                                    <?php for($i=1 ; $i<=$row->rating; $i++){
                                      $selected = "-o";
                                      if(!empty($row->rating) && $i<=$row->rating) {
                                      $selected = "";
                                    } ?>
                                  <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                  <?php }
                                  $relC = 5-$row->rating;
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
                            <div class="col-xs-12 bottom text-center">
                              <p class="checkbox">
                              <div class="col-xs-6 col-sm-6 emphasis">
                              <a href="<?php echo base_url();?>admin/professionals/index/<?php echo $row->business_id;?>"><button class="btn btn-primary">View</button></a>
                              </div>
                              <div class="col-xs-6 col-sm-6 emphasis">
                              <button class="btn btn-primary" id="user_<?php echo $row->id;?>" onClick="sendRequest(<?php echo $row->business_id;?>,<?php echo $this->session->userdata('adminId');?>,<?php echo $this->session->userdata('quotationId');?>)">Invite to Project</button>
                              </div>
                              </p>
                            </div>
                                                  
                          </div>
                        </div>
                      </div>    
                        <?php } ?>
                      <?php } ?>
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
      </div>
    </div>
        <!-- /page content -->

    <div class="modal fade bs-example-modal-quotationRecc" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="quotationReccclose"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Send Project Invitation</h4>
          </div>
          <div class="modal-body">
              <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
              <span id="quotationReccerr" style="color: red;"></span>
              <span id="quotationReccsuc" style="color: green;"></span>
              <form class="form-horizontal">
                <input type="hidden" id="bussinessId" name="bussinessId" value="">
                <input type="hidden" id="clientId" name="clientId" value="">
                <input type="hidden" id="quotationId" name="quotationId" value="">                                          
                <div class="form-group">
                  <label class="control-label col-sm-4" for="email">Message : </label>
                  <div class="col-sm-4">
                    <textarea class="form-control" id="message"></textarea>
                  </div>
                </div>
              </form>
          </div>
          <div class="modal-footer" style="text-align: center;">
            <button type="button" class="btn btn-default" id="quotationReccclose1">Close</button>
            <button type="button" class="btn btn-primary" id="save">Send Message</button>
          </div>
    
        </div>
      </div>
    </div>

<script type="text/javascript">

function sendRequest(bussinessId,clientId,quotation_id){
    $(".bs-example-modal-quotationRecc").modal();
    $("#bussinessId").val(bussinessId);
	$("#clientId").val(clientId);
	$("#quotationId").val(quotation_id);	   
}
$(document).ready(function() {
  $("#quotationReccclose").click(function() {
	$("#message").val('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-quotationRecc").modal('hide');
  });

  $("#quotationReccclose1").click(function() {
	$("#message").val('');  
    $(".errorNumeric").hide();
    $(".bs-example-modal-quotationRecc").modal('hide');
  });
	$("#save").click(function() {
		var bussinessId = $("#bussinessId").val();
		var clientId = $("#clientId").val();
		var quotationId = $("#quotationId").val();				   
		var message = $("#message").val();
		$("#quotationReccsuc").html();
		$("#quotationReccerr").html();
		if(message==''){
		  $("#quotationReccerr").html('Please fill Message');
		}else{
		  jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url();?>admin/quotation/quotationInvite",
			data: {bussinessId: bussinessId,clientId: clientId,quotationId:quotationId,message:message},
			success: function(data) {
			  if (data=='success'){
				$("#quotationReccsuc").html('Your Quotation invite Message Send To Professional is successfully .');
				setTimeout(function(){$('#message').val('');$('#quotationReccsuc').html('');$(".bs-example-modal-quotationRecc").modal('hide');}, 4000);
			  }else if (data=='already'){
				$("#quotationReccsuc").html('Already invitation send.');
				setTimeout(function(){$('#message').val('');$('#quotationReccsuc').html('');$(".bs-example-modal-quotationRecc").modal('hide');}, 4000);
			  }else{
				$("#quotationReccerr").html('Sorry something went wrong.');
				setTimeout(function(){$('#message').val('');$('#quotationReccerr').html('');$(".bs-example-modal-quotationRecc").modal('hide');}, 4000);
			  }
			}
		  });
		}
	  });  
  
  
});
</script>
