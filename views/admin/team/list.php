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
                          <th>Member's Email</th>
                          <th>Team Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <!-- <a href="javascript:void(0);" class="delete" id="delete_'.$row->id.'" data-id="'.$row->id.'" >Delete</a> -->
                      <tbody>
                          <?php foreach ($teamList as $row) {
                           echo '<tr><td><a href="'.base_url().'admin/team/requestteamview/'.$row->id.'">'.$row->team_name.'</a></td>';
                          if(strlen($row->member_email) > 100){
                            $content = $row->member_email;
																$short = substr($content, 0, 100);
																$short = explode(',', $short);
																array_pop($short);
																$short = implode(',', $short);
																print '<td>'.$short.'...</td>'; ;
                          }else{
                            echo '<td>'.$row->member_email.'</br></td>';
                          }
                            echo '<td>'.$row->team_cateogry.'</td>';
                          echo '<td><a href="'.base_url().'admin/team/edit/'.$row->id.'" class="tabl_link"><i class="fa fa-edit"></i></a> | <a href="javascript:void(0)" class="tabl_link" onclick="addMoreMembers('.$row->id.');">Add Member</a> | <a href="javascript:void(0);" class="tabl_link" onclick="getJoinMembers('.$row->id.');">View</a> | <a href="javascript:void(0);" class="tabl_link" onclick="getJoinMembersToDelete('.$row->id.');">Delete Members</a></td>';
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
      <h4 class="modal-title" id="myModalLabel">Member's who joined your Team.</h4>
      </div>
      <div class="modal-body1">

      </div>
      <div class="modal-footer" style="text-align: center;">
      <button type="button" class="btn btn-success" id="close">Ok</button>
      </div>
    </div>
  </div>
</div>
<!--ends here-->

<!--addmoremembermodal-->
<div class="modal fade bs-example-modal-lgaddMoreModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add More Member to this Team.  <button type="button" class="close" id="closeMemberAdd1"><span aria-hidden="true">×</span>
        </button></h4>

          </div>
          <div class="modal-body">
            <form class="form-horizontal">
              
            <input type="hidden" id="team_id_add_more" value="">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Member's Email: </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="members_email" placeholder="Comma seperated"></textarea>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Short Note: </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="shortnote" name="shortnote" placeholder="Short note"></textarea>
              </div>
            </div>
            
          </form>
          </div>
          <div class="modal-footer" style="text-align: center;">
            <span id="error" style="color:red"></span>
            <div id="loading" style="display: none;">Please Wait...</div></br>
            <button type="button" class="btn btn-success" id="add">Submit</button>
            <button type="button" class="btn btn-success" id="closeMemberAdd" style="display:none;">Ok</button>
          </div>
    </div>
  </div>
</div>

<!--ends here-->
<!--Delete member modal-->
<div class="modal fade bs-example-modal-lgmemberListModalDelet" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Delete Members</h4>
      </div>
      <input type="hidden" id="team_id_delete" value="">
      <div class="modal-body2">

      </div>

      <div class="modal-footer" style="text-align: center;">
        <div id="loading" style="display: none;">Please Wait...</div></br>
      <div id="error" style="color:red"></div>
      <button type="button" class="btn btn-success" id="closeDelete">Close</button>
      <button type="button" class="btn btn-primary" id="delete_records">Delete</button>
      </div>


    </div>
  </div>
</div>
<!--Ends here-->

 <!--delete services script-->
<script type="text/javascript">
// Ajax post
$(document).ready(function() {

  $('#delete_records').on('click', function(e) {
    var team_id = $("#team_id_delete").val();
    var employee = [];
    $(".emp_checkbox:checked").each(function() {
      employee.push($(this).data('emp-id'));
    });
    if(employee.length <=0){
       $("#error").html('Please select Members to delete.')
    }else{
      WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";
      var checked = confirm(WRN_PROFILE_DELETE);
      if(checked == true) {
        var selected_values = employee.join(",");
        $("#loading").show();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>admin/team/deleteTeamMember",
          cache:false,
          data: 'member_id='+selected_values+'&team_id='+team_id,
          success: function(response) {
            //alert(response);
            $("#loading").html('');
            $("#loading").hide();
            if(response==1){
              location.reload();
              // var emp_ids = response.split(",");
              // for (var i=0; i < emp_ids.length; i++ ) {
              //   	$("#"+emp_ids[i]).remove();
              //   }
            }else{
              $("#error").html('You can not delete Members as they have a open project to work.');
            }

            }

        });
      }
    }
  });

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



  $("#closeMemberAdd").click(function(){
    $("#members_email").val();
    $("#loading").html();
    $("#error").html();
    $("#add").attr('disabled',false);
    $("#closeMemberAdd").hide();
    $("#loading").hide();
    $(".bs-example-modal-lgaddMoreModal").modal('hide');
  });

$("#closeMemberAdd1").click(function(){
    $("#members_email").val();
    $("#loading").html();
    $("#error").html('');
    $("#add").attr('disabled',false);
    $("#closeMemberAdd").hide();
    $("#loading").hide();
    $(".bs-example-modal-lgaddMoreModal").modal('hide');
  });

  $("#closeDelete").click(function(){
    $("#loading").html('');
    $("#loading").hide();
    $("#error").html('');
    $(".bs-example-modal-lgmemberListModalDelet").modal('hide');
  });


  $("#add").click(function(){
    var myarray = [];
    var error=0;
    var team_id_add_more = $("#team_id_add_more").val();
    var shortnote = $("#shortnote").val();
    var members_email = $("#members_email").val();
    var emails=members_email;
    var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var result = emails.replace(/\s/g, "").split(",");

    if(! members_email.length){
      $("#error").html('Please provide at least one valid email address.');
      var error=1;
    }else{
      for(var i = 0;i < result.length;i++) {
          if(!regex.test(result[i])) {
            $("#error").html('One of the email is not valid');
            var error=1;
          }else{
            $("#error").html('');
            var error=0;
          }
      }
    }

    if(error==0){
      $("#loading").show();
      //$("#add").attr('disabled',true);
      $.ajax({
        dataType:"json",
        type:"POST",
        url:"<?php echo base_url();?>admin/team/addMoreMembers",
        data:{team_id:team_id_add_more,members_email:members_email,shortnote:shortnote},
        success:function(res){
          $.each(res, function(k,v) {
              if(v=='success'){
                $("#loading").hide();
                $("#closeMemberAdd").show();
                $("#add").hide();
                $(".modal-body").html('Your request has send to the Members.');
                location.reload();
              }else{
                myarray.push(v);
                $("#loading").html('These emails are already in your team : '+myarray);
                $("#closeMemberAdd").show();
              }

          });
          // if(res=='success'){
          //   $("#loading").hide();
          //   $("#closeMemberAdd").show();
          //   $("#add").hide();
          //   $(".modal-body").html('Your request has send to the Members.');
          // }else{
          //   //$("#loading").html();
          //   $("#closeMemberAdd").show();
          //   $("#loading").html('Professional is already in your team.');
          // }

        }
      });
    }

  });

});

function addMoreMembers(team_id){
  //alert('click');
  $("#team_id_add_more").val(team_id);
  $(".bs-example-modal-lgaddMoreModal").modal('show');
}

function getJoinMembers(team_id){
  if(team_id){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/getJoinMembers",
      data:{team_id:team_id},
      success:function(res){
        $(".bs-example-modal-lgmemberListModal").modal('show');
        $(".modal-body1").html(res);
      }
    });
  }
}





function getJoinMembersToDelete(team_id){
  $("#team_id_delete").val(team_id);
  if(team_id){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/getJoinMembersToDelete",
      data:{team_id:team_id},
      success:function(res){
        $(".bs-example-modal-lgmemberListModalDelet").modal('show');
        $(".modal-body2").html(res);
      }
    });
  }
}

function test(team_id,memberId,status){
 if(team_id){
 $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/active",
      data:{team_id:team_id,memberId:memberId,status:status},
      success:function(data){
       location.reload();
      }
    });
 } 
}

</script>
