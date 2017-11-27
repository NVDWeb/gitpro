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
                    <h2>Leads</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div class="profile_form_update edu_update01 lead_box"> 
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                    <table id="datatable" class="table table-striped">
                      <thead>
                        <tr>

                          <th>Lead From</th>
                          <?php if($this->session->userdata('admin_user_type')==1){?>
                          <th>Lead Type</th>
                          <?php } ?>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Work Detail</th>
                          <th>Action</th>

                        </tr>
                      </thead>


                      <tbody>

                        <?php
                          foreach ($leadsList as $row) {
                            if($row->business_id != $this->session->userdata('adminId') || $this->session->userdata('admin_user_type')==1){
                          echo '<tr>';

                            echo '<td>'.($row->business_id !='0' ? $row->business_name : $row->name).'</td>';

                          if($this->session->userdata('admin_user_type')==1){
                            echo '<td>'.($row->business_id !='0' ? 'Business' : 'Individual').'</td>';
                          }

                          echo '<td>'.$row->category_name.'</td>';
                          echo '<td>'.$row->sub_category.'</td>';
                          echo '<td>'.$row->work_detail.'</td>';
                          echo '<td><a href="'.base_url().'admin/projects/view/'.$row->id.'" class="tabl_link"><i class="fa fa-eye"></i> view</a></td> </tr>';
                         } }
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
