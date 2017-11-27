  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
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
                    <h2>Quotation View</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="profile_form_update edu_update01">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                   
                    <?php foreach($quotationView as $list){ //echo '<pre>';print_r($list);?>                    
                        <div class="bid_01">
                            <div class="bid_01_half">Client's Name</div> 
                            <?php echo $name; ?>
                        </div>
                    	<?php if(!empty($parentcat)){?>
                        <div class="bid_01">
                            <div class="bid_01_half">Category</div> 
                            <?php echo $parentcat; ?>
                        </div>
                    	<?php }?>
                        <?php if(!empty($subcat)){?>
                        <div class="bid_01">
                            <div class="bid_01_half"> Sub Category</div> 
                            <?php echo $subcat; ?>
                        </div>
                        <?php }?>
                        <div class="bid_01">
                            <div class="bid_01_half">Project Name</div> 
                            <?php echo $list->project_name; ?>
                        </div>
                        
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Work Details</div> 
                            <div class="work_div_detail"><?php echo $list->work_detail; ?></div>
                        </div>
                        
                        
                        <div class="bid_01">
                            <div class="bid_01_half"> Type of Project</div> 
                            <?php echo $list->type_of_project; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Hire Type</div> 
                            <?php echo $list->hiretype; ?>
                        </div>
                    	
                        <div class="bid_01">
                            <div class="bid_01_half"> Prefered Mode</div> 
                            <?php echo $list->prefered_mode; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">No of Hours</div> 
                            <?php echo $list->no_of_hours; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Comment</div> 
                            <div class="work_div_detail"><?php echo $list->comment; ?></div>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Bid Closing Amount</div> 
                            <?php echo $list->bidclosingamount; ?>
                        </div>
                    	
                        <div class="bid_01">
                            <div class="bid_01_half">Bid Amount Hire</div> 
                            <?php echo $list->bidamounthire; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Pay Type</div> 
                            <?php echo $list->paytype; ?>
                        </div>
                        <?php if($list->is_verifed==1){?>
                        	<button class="btn btn-primary">Verified</button>
                        <?php }else {?>
                            <button class="btn btn-primary" onClick="verified(<?php echo $list->id;?>,<?php echo $list->created_by;?>)">Verify</button>
                            <button class="btn btn-danger" onClick="reject(<?php echo $list->id;?>,<?php echo $list->created_by;?>)">Reject</button>
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
        </div>
        <!-- /page content -->
        
        <!--Verify Modol Popup start-->
	<div class="modal fade bs-example-modal-lgVerify" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="closeV"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Verify Proposal</h4>
      </div>
      <div class="modal-body">
      <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
      <span id="errVerify" style="color: red;"></span>
      <span id="sucVerify" style="color: green;"></span>
      <form class="form-horizontal">
        <input type="hidden" id="verifyid" name="verifyid" value="">
         <input type="hidden" id="created_by" name="created_by" value="">
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
      <button type="button" class="btn btn-default" id="closeVe">Close</button>
      <button type="button" class="btn btn-danger" id="verify">Verify</button>
      </div>

    </div>
  </div>
</div>
<!--Verify Modol Popup End-->
        
	<!--Reject Modol Popup start-->
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
         <input type="hidden" id="individualid" name="individualid" value="">
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
<!--Reject Modol Popup End-->




 <!--delete services script-->
<script type="text/javascript">
// Ajax post
$(document).ready(function() {
  $(".delete").click(function(event) {
    event.preventDefault();
    var deleteid = $(this).data('id');
    var parent = $(this).parent("td").parent("tr");
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/quotation/deleteQuotation",
      data: {quotation_id: deleteid},
      success: function(data) {
        if (data=='success'){
           parent.fadeOut('slow');
           $("#successMsg").html('Deleted.');
          setTimeout(function(){$('#successMsg').hide()}, 4000);
        }else{
          $("#errorMsg").html('Some error to delete Business.');
          setTimeout(function(){$('#errorMsg').hide()}, 4000);

        }
      }
    });
  });

  $(".open").click(function(event) {
    //alert('open');
    event.preventDefault();
    var quotationId = $(this).data('id');
    var bid_count = $("#quotation_"+quotationId).val();
    //alert(quotationId);
  //  alert(bid_count);
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/quotation/updateQuotationBidStatus",
      data: {quotation_id: quotationId,bid_count:bid_count},
      success: function(data) {
        location.reload();
      }
    });
  });


});

function updateStatus(businessId,status){
  //alert(businessId);
  //alert(status);
  if(businessId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/business/updateStatus",
      data:{businessId:businessId,status:status},
      success:function(data){
        location.reload();
        /*if(data==0){
          $("#status_"+businessId).html('Inactive');
        }else{
          $("#status_"+businessId).html('Active');
        }
        window.reload();*/

      }
    });
  }

}

//function verified(quotationId,created_by){
//  if(quotationId){
//    $.ajax({
//      type:"POST",
//      url:"<?php echo base_url();?>admin/quotation/verified",
//      data:{quotationId:quotationId,created_by:created_by},
//      success:function(data){
//       location.reload();
//      }
//    });
//  }
//}

function verified(qutationId,created_by){   
  $("#verifyid").val(qutationId);
  $("#created_by").val(created_by);
  $("#verifyid").val(qutationId); 
  $(".bs-example-modal-lgVerify").modal();
}
$("#closeV").click(function() {   
  $("#verify_id").val('');
  $("#created_by").val('');
  $(".bs-example-modal-lgVerify").modal('hide');
});

$("#closeVe").click(function() {
  $("#verify_id").val('');
  $("#created_by").val('');
  $(".bs-example-modal-lgVerify").modal('hide');
});

$("#verify").click(function(){		
  var verifyid = $("#verifyid").val();  
  var created_by =   $("#created_by").val();
   var shortnote =   $("#shortnote").val();   
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/quotation/verified",
    data: {verifyid:verifyid,created_by:created_by,shortnote:shortnote},	
    success: function(data) {
		//alert(data);
      if (data=='success'){
        $("#sucVerify").html('Qutation Post Verified.');
        setTimeout(function(){$('#suc').html(''); window.location.href = "<?php echo base_url();?>admin/quotation";}, 4000);
      }else{
        $("#errVerify").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
  });

//function reject(quotationId,created_by){
//  if(quotationId){
//    $.ajax({
//      type:"POST",
//      url:"<?php echo base_url();?>admin/quotation/delete",
//      data:{quotationId:quotationId,created_by:created_by},
//      success:function(data){
//        //location.reload();
//		 window.location.href = "<?php echo base_url();?>admin/quotation"
//      }
//    });
//  }
//}


/*Qutation Rejected process start here*/

function reject(qutationId,individualid){   
  $("#rejectid").val(qutationId);
  $("#individualid").val(individualid);
  $("#rejectid").val(qutationId); 
  $(".bs-example-modal-lgReject").modal();
}
$("#close17").click(function() {   
  $("#reject_id").val('');
  $("#individual_id").val('');
  $(".bs-example-modal-lgReject").modal('hide');
});

$("#close18").click(function() {
  $("#reject_id").val('');
  $("#individual_id").val('');
  $(".bs-example-modal-lgReject").modal('hide');
});

$("#reject").click(function(){		
  var rejectid = $("#rejectid").val();  
  var individualid =   $("#individualid").val();
   var shortnote =   $("#shortnote").val();   
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/quotation/delete",
    data: {rejectid:rejectid,individualid:individualid,shortnote:shortnote},	
    success: function(data) {
		//alert(data);
      if (data=='success'){
        $("#sucReject").html('Qutation Post Rejected.');
        setTimeout(function(){$('#suc').html(''); window.location.href = "<?php echo base_url();?>admin/quotation";}, 4000);
      }else{
        $("#errReject").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Qutation Rejected process Ends Here*/



</script>
