<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- sidebar menu -->
      <!-- /sidebar menu -->
      <!-- top navigation -->
      <?php $this->load->view('admin/top-navigation');?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="boday_main">
        <div class="main_container01">
          <div class="right_col" role="main">
       <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Team request Details</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                           
                   <?php //echo '<pre>';print_r($teamDetails[0]); die;?>
                  <input type="hidden" id="teamAdminEmail" value="<?php echo $teamDetails['team_admin_details'][0]->email;?>">
                  <input type="hidden" id="teamAdminId" value="<?php echo $teamDetails['team_admin_details'][0]->id;?>">
                    <div class="bid_01"><div class="bid_01_half"><label>Team Name</label></div>
                     <?php echo $teamDetails[0]->team_name;?>
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>No.of Members</label></div>
                     <?php echo count(explode(",",$teamDetails[0]->member_email));?>
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Team Admin Name</label></div>
                     <?php echo $teamDetails['team_admin_details'][0]->first_name;?>
                    </div>
                    

                    <div class="prifile_form">
                      <div class="admin_profile zebra-style">

                        <hr>

                        <div class="overview">
                          <h2><i class="fa fa-info-circle" aria-hidden="true"></i>Team Amin Details</h2>
                          <div class="ove_view01">
                              <ul>
                                  
                                 <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php  if(! empty($teamDetails['executiveSummary']->executiveSummary)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Executive Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php
                                     
                                         echo '<tr><td><textarea id="executive" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly>'.$teamDetails['executiveSummary']->executiveSummary.'</textarea></td>';
                                         ?>
                                         

                                        <?php echo '</tr>'; ?>
                                    </table>
                                  <?php } ?>
                                    

                                  </div>
                                </div>
                              </li>

                              

                              <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php if(! empty($teamDetails['objectiveSummary']->objectiveSummary)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Objective Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php
                                      
                                         echo '<tr><td><textarea id="objective" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly>'.$teamDetails['objectiveSummary']->objectiveSummary.'</textarea></td>'; ?>
                                          
                                          <?php echo '</tr>'; ?>
                                    </table>
                                  <?php } ?>
                                    

                                  </div>
                                </div>
                              </li>

                              <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="btn btn-success bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php if(! empty($teamDetails['managementSummary']->managementSummary)) {?>
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Management Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                     
                                         echo '<tr><td><textarea id="management" style="margin: 0px; min-height: 200px; max-height:200px; width: 1172px;" readonly>'.$teamDetails['managementSummary']->managementSummary.'</textarea></td>';?>
                                          
                                          <?php echo '</tr>';

                                        ?>
                                    </table>
                                  <?php } ?>
                                    

                                  </div>
                                </div>
                              </li> 
                                 
                              <li>
                                  <div class="form-group">
                                    
                                    <div class="tabel_div">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>University  Name / College Name</th>
                                            <th>Degree Name</th>
                                            <th>&nbsp;</th>

                                          </tr>
                                        </thead>
                                        <?php if(! empty($teamDetails['education'])) {
                                            $i=1;
                                            foreach($teamDetails['education'] as $edu){ ?>
                                            

                                          <tr>
                                          <td><?php echo $edu->school_name;?></td>
                                          
                                          <td><?php echo $edu->DegreeName;?></td>
                                          <td>
                                         
                                          </td>
                                        </tr>
                                        <?php $i++; } } else{
                                          echo '<tr><td>No Record Found</td></tr>';
                                        } ?>
                                      </table>

                                    </div>
                                  </div>
                              </li>

                              <li>
                                  <div class="form-group">
                                    
                                    <div class="tabel_div">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>Organization Name</th>
                                            <th>Current Employer</th>
                                            <th>Job Title</th>
                                            <th>Job Description</th>
                                            <th class="strt_date">Start Date</th>
                                            <th>End Date</th>
                                            <th class="table_action">&nbsp;</th>

                                          </tr>
                                        </thead>
                                        <?php 
                                        if(! empty($teamDetails['workexp'])) {
                                          foreach($teamDetails['workexp'] as $emp){                      
                                            if($emp->endDate == "1970-01-01"){
                                              if(!empty($emp->JobPeriod)){                                  
                                                $till = substr($emp->JobPeriod,-4);
                                                $period = explode('-',$emp->JobPeriod); 
                                                if($till =='till'){
                                                  $EndDate ="Currently Working";
                                                }else if($period){
                                                  $EndDate = date('Y-m-d',strtotime($period[1]));
                                                }                                                             
                                              }
                                            }else{
                                              $EndDate = $emp->endDate;
                                            }
                      
                                           ?>

                                            

                                          <tr>
                                          <td><?php echo $emp->EmployerOrgName;?></td>
                                          <td><?php if($emp->CurrentEmplyor=='True'){ echo 'Current Employer';}else{ echo 'Previous Employer';}?></td>
                                          <td><?php echo $emp->Title;?></td>
                                          <td><?php if(strlen($emp->Description) > 50){
                                            $pos=strpos($emp->Description, ' ',50);
                                          echo substr($emp->Description,0,$pos ).'...'; }else{ echo $emp->Description; }

                                          ?></td>
                                          <td><?php echo $emp->startDate;?></td>
                                         
                                           <td><?php echo  $EndDate ;?></td>
                                          <td>
                                          
                                          </td>
                                        </tr>
                                        <?php } } else{
                                          echo '<tr><td>No Record Found</td></tr>';
                                        } ?>

                                      </table>

                                    </div>
                                  </div>
                              </li>
                              <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="btn btn-success bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php if(!empty($teamDetails['achivement'])) {?>
                                      <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th class="acho">Achivement</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php 
                                        foreach($teamDetails['achivement'] as $ach){  ?>
                                        <tr>
                                        <td><textarea id="achivment" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly><?php echo $ach->achivement;?></textarea></td>
                                        
                                        </tr>
                                      <?php } ?>
                                    </table>
                                  <?php } ?>
                                    

                                  </div>
                                </div>
                              </li>

                              

                              <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="btn btn-success bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php if(! empty($teamDetails['license'])) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>License and Certification</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                      
                      
                                         echo '<tr><td>'.$teamDetails['license'].'</td>';
                                         ?>
                                         
                                         <?php echo '</tr>'; ?>
                                    </table>                                 
                                  <?php } ?> 
                                  </div>
                                </div>
                              </li>

                              <li>
                                <div class="form-group">                                 
                                  <div class="tabel_box">
                                  <?php if(! empty($teamDetails['languageKnown']->languageKnown)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Language Known</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                     
                      
                                         echo '<tr><td>'.$teamDetails['languageKnown']->languageKnown.'</td>';?>
                                          
                                          <?php echo '</tr>';  ?>
                                    </table>
                                  <?php } ?>
                                    

                                  </div>
                                </div>
                              </li>

                              <li>
                                <div class="form-group">
                                    <div class="tabel_box">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Skills</th>
                                          <th>Experience</th>
                                          
                                        </tr>
                                      </thead>
                                      <?php
                                        $skillArray = $teamDetails['skills'];
                                       
                                        if(! empty($skillArray)) {
                                          foreach($skillArray as $ski){ 
                                        ?>
                                        <tr>
                                        <td><?php echo $ski->skills;?></td>
                                         <td><?php echo $ski->ExperienceInMonths;?> Months</td>
                                                                 
                                        </tr>                                        
                                      <?php } }else{
                                        echo '<tr><td>No Record Found</td></tr>';
                                      } ?>
                                      
                                    </table>
                                   

                                  </div>
                                </div>
                              </li>
                            </ul>
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                  </div>
                  <hr>
                                     
                    <div class="bid_01" id="acti"><div class="bid_01_half"><label>Your Action</label></div>
                     <button class="btn btn-primary" id="request" onClick="acceptTeamRequest(<?php echo $teamDetails[0]->id;?>,1);">Accept Team Request</button> | <button class="btn btn-danger" id="request1" onClick="acceptTeamRequest(<?php echo $teamDetails[0]->id;?>,2);">Reject Team Request</button>
                    </div>

                  </div>
              </div>

              </div>
               <div class="teamtessagethread">
              <?php if($teamtessagethread){
				  //echo '<pre>';print_r($teamtessagethread);				 
				  foreach($teamtessagethread as $teamtessageth){
					  if($teamtessageth->member_id == $this->session->userdata('adminId')){
					  		echo 'Me';
					  }elseif($teamtessageth->team_admin_id ==  $teamtessageth->send_from) {
						  echo 'Team Admin';
					  }
					  echo '<p>'.$teamtessageth->message.'</p>';					  
				  }
			  }else{
              echo 'Not Found Message thread.';
               }
			   ?>
				</div> 
              
              
            
                <div class="form-group">
                <form action="" method="post" id="teamsmsthread-form" class="form-horizontal form-label-left">
                    <div class="row form-group">
                        <div class="col-md-12">
                        <input type="hidden" name="teamId" id="teamId" value="<?php echo $teamDetails[0]->id;?>"/>                       
                        <input type="hidden" name="memberId" id="memberId" value="<?php echo $this->session->userdata('adminId');?>"/>
                        <input type="hidden" name="teamadmin_id" id="teamadmin_id" value="<?php echo $teamDetails['team_admin_details'][0]->id;?>"/>
                        <label for="first-name">Message :<span class="required">*</span></label>                   
                       	<textarea name="message" id="message"  placeholder="message" required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="profo_edi_sub">
                    	<input type="submit" value="<?php echo 'Send'; ?>">
                    </div>
                    </div>
                </form>                                    
                </div>





                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<!--Ends Her-->
<!-- Acceptence popup Start here -->
<div class="modal fade bs-example-modal-lgAcceptRequest" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1CancelMilestone"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Team Request Accept</h4>
      </div>
      <div class="modal-body">
        Great, You have accepted the Team Request.
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-primary" id="ok">Ok</button>
      </div>

    </div>
  </div>
</div>
<!--Ends Here -->

<script>
    $(document).ready(function(){
        $("#teamsmsthread-form").submit(function(e){
            e.preventDefault();
			var teamId = $("#teamId").val();			
			var memberId = $("#memberId").val();;
			var message= $("#message").val();
			var teamadmin_id = $("#teamadmin_id").val();			 
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>admin/team/insertTeamMessageThread',
                data: {teamId:teamId,teamadmin_id,teamadmin_id,memberId:memberId,message:message},
                success:function(data) {
                   location.reload();
                },
                error:function(){
                    alert('fail');
                }
            });
        });
    });
</script>



<!--delete services script-->
<script type="text/javascript">
$(document).ready(function() {
  $("#close1CancelMilestone").click(function() {
    $(".bs-example-modal-lgAcceptRequest").modal('hide');
    location.reload();
  });

  $("#ok").click(function() {
    $(".bs-example-modal-lgAcceptRequest").modal('hide');
    location.href="<?php echo base_url();?>admin/dashboard";
  });

  

});
function acceptTeamRequest(team_id,type){
  var teamAdminEmail = $("#teamAdminEmail").val();
  var teamAdminId = $("#teamAdminId").val();
  if(team_id){
    $("#request").attr('disabled',true);
    $("#request1").attr('disabled',true);
    $.ajax({
      type:"post",
      url: "<?php echo base_url();?>admin/team/acceptTeamRequest",
      data:{team_id:team_id,type:type,teamAdminEmail:teamAdminEmail,teamAdminId:teamAdminId},
      success:function(data){
        if(data=='success'){
          $(".modal-body").html('Congratulations! You have successfully join this team.A Notification has sent to the team admin');
          $(".bs-example-modal-lgAcceptRequest").modal('show');
        }else{
          $(".modal-body").html('OOPs! You have successfully reject to join this team.A Notification has sent to the team admin');
          $(".bs-example-modal-lgAcceptRequest").modal('show');
        }
        //$("#request").attr('disabled',false);
      }
    });
  }
}
</script>
