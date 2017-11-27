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
                    <h2>Business</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php echo base_url();?>admin/business/add"> <i class="fa fa-plus-circle"></i> Add Business</a></li>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Action</th>

                        </tr>
                      </thead>


                      <tbody>

                          <?php foreach ($businessList as $row) {
							  //echo '<pre>';print_r($row);
                          echo '<tr><td>'.$row->contact_person_name.'</td>';
                          echo '<td>'.$row->email.'</td>';
                          echo '<td>'.$row->mobile.'</td>';
                          echo '<td><a href="'.base_url().'admin/business/edit/'.$row->id.'"><i class="fa fa-edit"></i></a> | <a href="javascript:void(0);" class="delete" id="delete_'.$row->id.'" data-id="'.$row->id.'"><button class="btn btn-danger">Reject</button></a> | '.($row->status==0 ? '<a id="status_'.$row->id.'" href="javascript:void(0);" onclick="updateStatus('.$row->id.',1);" title="Click to Activate Account"><button class="btn btn-primary">Inactive</button></a>': '<a id="status_'.$row->id.'" href="javascript:void(0);"><button class="btn btn-success">Active</button></a>|<a href="'.base_url().'admin/professionals/index/'.$row->id.'"><button class="btn btn-success">View Profile</button></a>').'</td> </tr>';
                        } ?>



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
        //location.reload();
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
