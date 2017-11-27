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
                              <h2>Details for Request</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
            
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
            
                              <?php if($getAllDetails){?>
            
            
                                <div class="bid_01">
                                  <div class="bid_01_half"><label>Request From</label></div>
                                  <?php
                                  $nameArray = explode(" ",$getAllDetails[0]->contact_person_name);
                                  echo $nameArray[0];
                                  ?>
                                </div>
            
                                <div class="bid_01">
                                  <div class="bid_01_half"><label>Member's category</label></div>
                                  <?php echo $getAllDetails[0]->category_name ; ?>
            
                                </div>
            
                                <div class="bid_01">
                                  <div class="bid_01_half"><label>Member's sub category</label></div>
                                  <?php  echo  $getAllDetails['sub_cateogry'][0]->subCategoryName; ?>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-success" id="confirmJ" onClick="confirmTeamJoining(<?php echo $getAllDetails[0]->id;?>,<?php echo $getAllDetails[0]->team_id;?>,<?php echo $getAllDetails[0]->member_id;?>)">Confirm</a> <a href="javascript:void(0)" class="btn btn-success">Take an Interview before Confirm</a>
            
                              <?php } else{
                                echo 'No Data Found';
                              }?>
                              <div class="ln_solid"></div>
            
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
<!--Place you BID AMOUNT popup-->
<div class="modal fade bs-example-modal-lgconfirmjoining" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Member Joining</h4>

      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-success" id="close2">Ok</button>
      </div>

    </div>
  </div>
</div>
      <!-- Ends here -->

<script>
$(document).ready(function(){
  $("#close2").click(function() {
    window.location.href="<?php echo base_url();?>admin/team";
    //$(".bs-example-modal-lgconfirmjoining").modal('hide');
    //window.location.href="<?php echo base_url();?>admin/team";
  });
  $("#close3").click(function() {
    window.location.href="<?php echo base_url();?>admin/team";
    //$(".bs-example-modal-lgconfirmjoining").modal('hide');
  });
});

function confirmTeamJoining(requestId,team_id,member_id){
  if(requestId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/confirmTeamJoining",
      data:{requestId:requestId,team_id:team_id,member_id:member_id},
      success: function(data){
        if(data=='success'){
          $(".modal-body").html('User is now your team member.')
          $(".bs-example-modal-lgconfirmjoining").modal('show');
          $("#confirmJ").attr('disabled',true);
        }else{
          $(".modal-body").html('Something went wrong.')
          $(".bs-example-modal-lgconfirmjoining").modal('show');
        }
      }
    });
  }
}

function getTeam(sub_category){
  $("#demo-form2").submit();
  // var category = $("#category option:selected").val();
  // if(category){
  //   $.ajax({
  //     type:"POST",
  //     url:"<?php echo base_url();?>admin/team/getTeamByCategoryAndSubcategory",
  //     data:{category:category,sub_category:sub_category},
  //     success:function(res){
  //       alert(res);
  //       $("#result").html(res);
  //     }
  //   });
  // }
}

function teamJoinRequest(teamId,member_id){
  if(teamId){
    $.ajax({
       type:"POST",
        url:"<?php echo base_url();?>admin/team/teamJoinRequest",
        data:{teamId:teamId,member_id:member_id},
        success:function(res){
          //alert(res);
          if(res==1){
            $(".modal-body").html('Your request to join team has been submitted to the Team Admin.You will be the part of the team once confirmed by the Admin.');
            $(".bs-example-modal-lgteamRequest").modal('show');
          }else{
            $(".modal-body").html('You have already sent a request to join this team.');
            $(".bs-example-modal-lgteamRequest").modal('show');
          }
          //$("#result").html(res);
        }
      });
  }
}
</script>
