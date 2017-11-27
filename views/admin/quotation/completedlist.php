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
                            <h2>Completed Quotation</h2>
                            <div class="clint_right_link">
                                 <a href="<?php echo base_url();?>admin/quotation/add"> <i class="fa fa-plus-circle"></i> Add Quotation</a>
                            </div>                            
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                          	<div class="profile_form_update edu_update01 lead_box">
                            <div id="errorMsg" style="color:red"></div>
                            <div id="successMsg" style="color:green"></div>
                            <table id="datatable" class="table table-striped">
                              <thead>
                                <tr>
                                 <th>Project Name</th> 
                                  <th>Completed by </th>                                 
                                  <th>Completed Date</th>
                                  <th>Amount</th>        
                                </tr>
                              </thead>       
                              <tbody>        
                                  <?php
                                 //echo '<pre>';  print_r($allProposal);
								  if(!empty($allCompletdlist)){
                                  foreach ($allCompletdlist as $row) {
        
                                  echo '<tr>';
								  echo '<td>'.$row->project_name.'</td>';
                                  echo '<td>'.$row->first_name.'</td>';
                                  echo '<td>'.date('Y-m-d',strtotime($row->completed_date)).'</td>';
                                  echo '<td>'.$row->bidclosingamount.'</td>';									
                                  echo '</tr>';
                                }}else{ 
                                      echo '<tr>';
									  echo '<td colspan="1">';
									  echo 'Data Not Found!!!';
									  echo '</td>';
									  echo '</tr>';
        							 }?>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Send Project Status</h4>
      </div>
      <div class="modal-body">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="err" style="color: red;"></span>
          <span id="suc" style="color: green;"></span>
          <form class="form-horizontal">
            <input type="hidden" id="quotationId" name="quotationId" value="">
            <input type="hidden" id="type" name="type" value="">              
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

<script>
function projectStatus(quotation_id,type){
    $(".bs-example-modal-lg").modal();
    $("#quotationId").val(quotation_id);
	$("#type").val(type);
    
}
$(document).ready(function() {
  $("#close").click(function() {
    $("#quotationId").val(''); 
	$("#type").val('');   
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });

  $("#close1").click(function() {
    $("#quotationId").val(''); 
	$("#type").val('');  
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });
  
    $("#save").click(function() {
    var quotation_id = $("#quotationId").val();
	var type = $("#type").val();	   
    var message = $("#message").val();
    $("#suc").html();
    $("#err").html();
    if(message==''){
      $("#err").html('Please fill Message');
    }else{
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/projectStaus",
        data: {quotation_id: quotation_id,message: message,type:type},
        success: function(data) {
          if (data=='success'){
            $("#suc").html('Your Project Status Message Send To Client is successfully .');
            setTimeout(function(){$('#suc').html('');location.reload()}, 4000);
          }else{
            $("#err").html('Sorry something went wrong.');
            setTimeout(function(){$('#err').html('');location.realod()}, 4000);
          }
        }
      });
    }
  });
});

</script>





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
</script>
