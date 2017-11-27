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
                            <h2>Team</h2>                            
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                          <div class="profile_form_update edu_update01 lead_box">
                            <div id="errorMsg" style="color:red"></div>
                            <div id="successMsg" style="color:green"></div>
                            <table id="datatable" class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Team Name</th>
                                  <th>Team Admin Name</th>
                                  
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($teamList as $row) {
                                  echo '<tr><td>'.$row->team_name.'</td>';
                                  echo '<td>'.$row->teamAdminName.'</td>';
                                  echo '<td><a href="javascript:void(0);" class="btn btn-success" onclick="getJoinMembersAcceptMine('.$row->team_id.');" >View Members</a></td>';
                                  echo '</tr>';
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
        </div>
        <!-- /page content -->
<!--membermodal-->
<div class="modal fade bs-example-modal-lgmemberListModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Other Member's who joined this team.</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer" style="text-align: center;">
      <button type="button" class="btn btn-success" id="close">Ok</button>
      </div>
    </div>
  </div>
</div>
<!--ends here-->
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
      url: "<?php echo base_url();?>admin/team/deleteTeamMember",
      data: {member_id: deleteid},
      success: function(data) {
        if (data=='success'){
           parent.fadeOut('slow');
           $("#successMsg").html('Deleted.');
          setTimeout(function(){$('#successMsg').hide()}, 4000);
        }else{
          $("#errorMsg").html('Some error to delete Clinic.');
          setTimeout(function(){$('#errorMsg').hide()}, 4000);

        }
      }
    });
  });

  $("#close").click(function(){
    $(".bs-example-modal-lgmemberListModal").modal('hide');
  });
});

function getJoinMembersAcceptMine(team_id){
  if(team_id){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/getJoinMembersAcceptMine",
      data:{team_id:team_id},
      success:function(res){
        $(".bs-example-modal-lgmemberListModal").modal('show');
        $(".modal-body").html(res);
      }
    });
  }
}
</script>
