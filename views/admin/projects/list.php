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
                 
                    <h2>Active Project</h2> 
                  
                    <div style="float: right;font-size: 18px;color: #48c7ec;font-family: -webkit-body;">Total Working Hours:
                    <?php 
					$total = 0;
					$i =0;
					foreach ($leadsList as $row) {
                   			if($this->session->userdata('adminId') == $row->assignedbusiness_id && $row->project_status !=1 ){
								 $total = $total + $row->no_of_hours;
							}
					 $i++;}
					 echo $total;
					 ?>
                    </div> 
                                      
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="macth_pro">
                  <div class="">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="match_pro_list">
                          <ul>
                           <?php  foreach ($leadsList as $row) {
                           if(($row->assignedbusiness_id == $this->session->userdata('adminId') || $this->session->userdata('admin_user_type')==1) && $row->project_status !=1){?>
                            <li>
                                <div class="mact_lit01 activepro_lsit">
                                  <div class="row">
                                        <div class="col-md-12">
                                          <h3>Project posted <?php echo date('d/m/Y',strtotime($row->created_date));?></h3>
                                          <h4><a href="#"><?php echo $row->project_name;?></a></h4>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                          <p>Client Name <b><?php echo $row->business_id !='0' ? $row->business_name : $row->name;?></b></p>
                                          <p>Category  <b><?php echo $row->category_name;?></b></p>
                                          <p>Sub Category <b><?php echo $row->sub_category;?></b></p>
                                          <p>Working hours  <b><?php echo $row->no_of_hours;?></b></p>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                          <p><?php echo $row->work_detail;?></p>
                                         
                                        </div>
                                      </div>

                                  <div class="act_list_bottom">
                                    
                                       <p><a  class="btn" href="<?php echo base_url().'admin/projects/view/'.$row->id;?>">View Project </a>
                                          <?php  if($row->project_status == 0){?>
                                          <a  class="btn" href="javascript:void();" onClick="projectStatus('<?php echo $row->id;?>','<?php echo $row->individual_id ;?>',2)">Request to close </a>
                                           <?php }elseif($row->project_status == 2){
                         echo '<a href="javascript:void();">Project status pending</a>';
                          }else{?>
                            <a href="javascript:void();">Project status Complate</a>
                         <?php }?>
                      </p>

                                  </div>



                                </div>
                            </li>
							<?php }
							}?>
                          </ul>
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
            <input type="hidden" id="individualId" name="individualId" value="">
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
//function projectStatus(quotation_id,individual_id,type){
//	if(type==2 && quotation_id){
//		jQuery.ajax({
//        type: "POST",
//        url: "<?php echo base_url();?>admin/projects/projectStaus",
//        data: {quotation_id: quotation_id,individualId: individualId,message: message,type:type},
//        success: function(data) {
//          if (data=='success'){
//            $("#suc").html('Your Project Status Message Send To Client is successfully .');
//            setTimeout(function(){$('#suc').html('');location.reload()}, 4000);
//          }else{
//            $("#err").html('Sorry something went wrong.');
//            setTimeout(function(){$('#err').html('');location.realod()}, 4000);
//          }
//        }
//      });
//		
//		
//    $(".bs-example-modal-lg").modal();
//    $("#quotationId").val(quotation_id);
//    $("#individualId").val(individual_id);
//	}
//}




function projectStatus(quotation_id,individual_id,type){
    $(".bs-example-modal-lg").modal();
	$("#type").val(type);
    $("#quotationId").val(quotation_id);
    $("#individualId").val(individual_id);
}
$(document).ready(function() {
  $("#close").click(function() {
    $("#quotationId").val('');
    $("#individualId").val('');
	$("#type").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });

  $("#close1").click(function() {
    $("#quotationId").val('');
    $("#individualId").val('');
	$("#type").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');
  });
  
    $("#save").click(function() {
    var quotation_id = $("#quotationId").val();
    var individualId = $("#individualId").val();
	var type = $("#type").val();
    var message = $("#message").val();
    $("#suc").html();
    $("#err").html();
    if(message==''){
      $("#err").html('Please fill Message');
    }else{
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/projects/projectStaus",
        data: {quotation_id: quotation_id,individualId: individualId,message: message,type:type},
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
  $(".delete").click(function() {
    event.preventDefault();
    var deleteid = $(this).data('id');
    var parent = $(this).parent("td").parent("tr");
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/business/deleteBusiness",
      data: {business_id: deleteid},
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
