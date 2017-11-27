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
                            <h2>Team Details</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
        
                          <?php //echo '<pre>';print_r($teamData);?>
                          <p>Team Admin : <?php echo $teamData[0]->first_name;?></p>
                          <p>Team name : <?php echo $teamData[0]->team_name;?></p>                  
                            <?php foreach($member_data as $row){ ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="well profile_view">
                                  <div class="col-sm-12">
                                    <h4 class="brief"><i>Team Member</i></h4>
                                    <div class="left col-xs-7">
                                      <h2><?php echo $row[0]->first_name;?></h2>
                                      <p><strong>About: </strong>About the member</p>
                                      <ul class="list-unstyled">
                                        <li><i class="fa fa-building"></i> Address: <?php  if(isset($row['country'][0]->countryName)) {
                                          echo $row['country'][0]->countryName; } echo ','; if(isset($row['state'][0]->stateName)) {
                                          echo $row['state'][0]->stateName; } echo ','; if(isset($row['city'][0]->cityName)) {
                                          echo $row['city'][0]->cityName; } ?> </li>
        
                                      </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                      <?php if($row[0]->picture!=0 || $row[0]->picture ) { ?>
                                    <img class="img-circle img-responsive" src="<?php echo $row[0]->picture ;?>" alt="Avatar">
                                  <?php } else if($row[0]->businessLogo!='' ) { ?>
                                    <img class="img-circle img-responsive" src="<?php echo base_url();?>uploads/business/<?php echo $row[0]->businessLogo ;?>" alt="Avatar">
                                  <?php }else { ?>
                                    No Image Available
                                    <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                                  <?php } ?>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                      <p class="ratings">
                                       <?php
                                      if(isset($row['rating'][0]->rating)){ ?>
                                          <a><?php echo $row['rating'][0]->rating;?>/5</a>
                                            <?php for($i=1 ; $i<=$row['rating'][0]->rating; $i++){
                                              $selected = "-o";
                                              if(!empty($row['rating'][0]->rating) && $i<=$row['rating'][0]->rating) {
                                              $selected = "";
                                            } ?>
                                          <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                          <?php }
                                          $relC = 5-$row['rating'][0]->rating;
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
        
                                  </div>
                                </div>
                              </div>
        
                              <?php } ?>
        
        
                          </div>
                          
         <a href="javascript:void(0);" class="btn btn-success" onClick="teamJoinRequest(<?php echo $teamData[0]->teamId;?>,<?php echo $this->session->userdata('adminId');?>)">Request to Join</a>
        
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
        <div class="modal fade bs-example-modal-lgteamRequest" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Requested to Join Team</h4>

      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-success" id="close2">Ok</button>
      </div>

    </div>
  </div>
</div>
        
<script>

$(document).ready(function(){
  $("#close2").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });
  $("#close3").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });
});

function teamJoinRequest(teamId,member_id){
  if(teamId){
    $.ajax({
       type:"POST",
        url:"<?php echo base_url();?>admin/team/teamJoinRequest",
        data:{teamId:teamId,member_id:member_id},
        success:function(res){
          if(res==1){
            $(".modal-body").html('Your request to join team has been submitted to the Team Admin.You will be the part of the team once confirmed by the Admin.');
            $(".bs-example-modal-lgteamRequest").modal('show');
          }else if(res==2){
			   $(".modal-body").html('You have already joined this team.');
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


