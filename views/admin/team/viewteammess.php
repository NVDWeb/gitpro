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
                  <h2>Team Member Details</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                           
                   <?php //echo '<pre>';print_r($teamDetails[0]); die;?>
                    <div class="bid_01"><div class="bid_01_half"><label>Team Member Name</label></div>
                     <?php echo $bussdestails[0]->first_name;?>
                    </div>
                    

                    <div class="prifile_form">
                      <div class="admin_profile zebra-style">

                        <hr>

                        <div class="overview">
                          <h2><i class="fa fa-info-circle" aria-hidden="true"></i>Team Member Details</h2>
                          <div class="ove_view01">
                              <ul>
                                  
                                 <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php  if(! empty($bussdestails['executiveSummary'][0]->executiveSummary)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Executive Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php
                                     
                                         echo '<tr><td><textarea id="executive" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly>'.$bussdestails['executiveSummary'][0]->executiveSummary.'</textarea></td>';
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
                                  <?php if(! empty($bussdestails['objectiveSummary'][0]->objectiveSummary)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Objective Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php
                                      
                                         echo '<tr><td><textarea id="objective" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly>'.$bussdestails['objectiveSummary'][0]->objectiveSummary.'</textarea></td>'; ?>
                                          
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
                                  <?php if(! empty($bussdestails['managementSummary'][0]->managementSummary)) {?>
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Management Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                     
                                         echo '<tr><td><textarea id="management" style="margin: 0px; min-height: 200px; max-height:200px; width: 1172px;" readonly>'.$bussdestails['managementSummary'][0]->managementSummary.'</textarea></td>';?>
                                          
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
                                        <?php if(! empty($bussdestails['education'])) {
                                            $i=1;
                                            foreach($bussdestails['education'] as $edu){ ?>
                                            

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
                                        if(! empty($bussdestails['workexp'])) {
                                          foreach($bussdestails['workexp'] as $emp){                      
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
                                  <?php if(!empty($bussdestails['achivement'])) {?>
                                      <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th class="acho">Achivement</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php 
                                        foreach($bussdestails['achivement'] as $ach){  ?>
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
                                  <?php if(! empty($bussdestails['license'])) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>License and Certification</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                      
                      
                                         echo '<tr><td>'.$bussdestails['license'].'</td>';
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
                                  <?php if(! empty($bussdestails['languageKnown']->languageKnown)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Language Known</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                     
                      
                                         echo '<tr><td>'.$bussdestails['languageKnown']->languageKnown.'</td>';?>
                                          
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
                                        $skillArray = $bussdestails['skills'];
                                       
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
                  </div>
              </div>

              </div>
               <div class="teamtessagethread">
              <?php if($teammessthread){
				  	//echo '<pre>';print_r($this->session->userdata);				 
				  foreach($teammessthread as $teamtessageth){
					  if($teamtessageth->team_admin_id == $teamtessageth->send_from && $teamtessageth->send_to ==$this->session->userdata('memberId')){
					  		echo 'Me';
							 echo '<p>'.$teamtessageth->message.'</p>';	
					  }elseif($teamtessageth->send_to ==$this->session->userdata('adminId') && $teamtessageth->member_id ==$this->session->userdata('memberId')) {
						 echo $bussdestails[0]->first_name;
						  echo '<p>'.$teamtessageth->message.'</p>';	
					  }					 				  
				  }
			  }else{
              echo 'Not Found Message thread.';
               }
			   ?>
				</div> 
              
              
            
                <div class="form-group">
                <form action="" method="post" id="teamsms-form" class="form-horizontal form-label-left">
                    <div class="row form-group">
                        <div class="col-md-12">
                        <input type="hidden" name="teamId" id="teamId" value="<?php echo $this->session->userdata('teamId');?>"/>                       
                        <input type="hidden" name="memberId" id="memberId" value="<?php echo $bussdestails[0]->id;?>"/>
                        <input type="hidden" name="teamadmin_id" id="teamadmin_id" value="<?php echo $this->session->userdata('adminId');?>"/>
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
<script>
    $(document).ready(function(){
        $("#teamsms-form").submit(function(e){
            e.preventDefault();
			var teamId = $("#teamId").val();			
			var memberId = $("#memberId").val();;
			var message= $("#message").val();
			var teamadmin_id = $("#teamadmin_id").val();	
			//alert(teamId);alert(memberId);alert(message);alert(teamadmin_id);		 
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
