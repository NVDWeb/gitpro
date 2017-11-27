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
                 
                    <h2>Completed Project</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div class="macth_pro">
                  <div class="">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="match_pro_list">
                          <ul>
                           <?php  foreach ($completelist as $row) {							  
								  if($row->assignedbusiness_id == $this->session->userdata('adminId') || $this->session->userdata('admin_user_type')==1){?>
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
                                          <p><a href="<?php echo base_url().'admin/projects/view/'.$row->id;?>">View full details ›</a>
                                          <a href="javascript:void();">Completed ›</a>
                                          </p>
                                        </div>
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
