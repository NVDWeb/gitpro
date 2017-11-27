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
            <div class="page-title">
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <?php //echo '<pre>';print_r($businessDetails);?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Professional Profile<small>Activity report</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                            <?php if($businessDetails[0]->picture!=0 || $businessDetails[0]->picture ) { ?>
                            <img class="img-circle img-responsive" src="<?php echo $businessDetails[0]->picture ;?>" alt="Avatar">
                          <?php } else if($businessDetails[0]->businessLogo!='' ) { ?>
                            <img class="img-circle img-responsive" src="<?php echo base_url();?>uploads/business/<?php echo $businessDetails[0]->businessLogo ;?>" alt="Avatar">
                          <?php }else { ?>
                            No Image Available
                            <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                          <?php } ?>
                        </div>

                      </div>
                      <h3><?php echo $businessDetails[0]->first_name;?></h3>
                      <div class="col-xs-3 col-sm-12 emphasis">
                            <p class="ratings">
                              <?php
                              if(isset($ratings[0]->rating)){ ?>
                                  <a><?php echo $ratings[0]->rating;?>/5</a>
                                    <?php for($i=1 ; $i<=$ratings[0]->rating; $i++){
                                      $selected = "-o";
                                      if(!empty($ratings[0]->rating) && $i<=$ratings[0]->rating) {
                                    	$selected = "";
                                    } ?>
                                  <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                  <?php }
                                  $relC = 5-$ratings[0]->rating;
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
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php if(isset($city)) { echo $city[0]->name; } ?>, <?php if(isset($state)) {  echo $state[0]->name; } ?>, <?php if(isset($country)) { echo $country[0]->name; }?>
                        </li>
                        <li><i class="fa fa-briefcase user-profile-icon"></i> <?php if(isset($businessDetails['workexp'])) { echo $businessDetails['workexp'][0]->Title; } else { echo 'No Work Experience';}?></li>
                        <!-- <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li> -->
                      </ul>

                      <a href="javascript:void(0);" class="btn btn-primary mm" data-id="<?php echo $businessDetails[0]->email;?>">Request to join</a>

                      <br />

                      <!-- start skills -->
                      <!-- <h4>Skills</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Web Applications</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation & Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul> -->
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <!-- <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Projects Worked on</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                          </li> -->

                          <li role="presentation" class="active"><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Work Experience</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Education</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Achievment</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Executive Summary</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content8" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Language </a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content9" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Objective</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content10" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Certification</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content11" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Skills</a>
                          </li>

                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <!-- <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Project Name</th>
                                  <th>Client Company</th>
                                  <th class="hidden-phone">Hours Spent</th>
                                  <th>Contribution</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>New Company Takeover Review</td>
                                  <td>Deveint Inc</td>
                                  <td class="hidden-phone">18</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
                          </div> -->
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content4" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <?php //echo '<pre>';print_r($businessDetails);?>
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Company Name</th>
                                  <th>Designation</th>
                                  <th class="hidden-phone">Start / End Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;
                                if(isset($businessDetails['workexp'])){
                                foreach ($businessDetails['workexp'] as $value) {
                                ?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $value->EmployerOrgName;?></td>
                                  <td><?php echo $value->Title;?></td>
                                  <td><?php echo $value->startDate;?> / <?php if($value->CurrentEmplyor=='True') { echo 'Currently Working'; } else{ echo $value->endDate; }?></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Work Experience</td></tr>';}?>
                              </tbody>
                            </table>
                            <!-- end user projects -->
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>School / College Name</th>
                                  <th>Degree Name</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;
                                if(isset($businessDetails['education'])){
                                foreach ($businessDetails['education'] as $education) {
                                ?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $education->school_name;?></td>
                                  <td><?php echo $education->DegreeName;?></td>
                                  <td></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Education</td></tr>';}?>
                              </tbody>
                            </table>
                          </div>


                          <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Achiement</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                //echo '<pre>';print_r($businessDetails);
                                if(isset($businessDetails['achivement'])){
                                foreach ($businessDetails['achivement'] as $ach) {
                                ?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $ach->achivement;?></td>
                                  <td></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Achiement</td></tr>';}?>
                              </tbody>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Summary</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                //echo '<pre>';print_r($businessDetails);
                                if(isset($businessDetails['executiveSummary'])){
                                foreach ($businessDetails['executiveSummary'] as $ach) {
                                ?>
                                <tr>
                                  <td><?php echo $ach->executiveSummary;?></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Achiement</td></tr>';}?>
                              </tbody>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Language Known</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                //echo '<pre>';print_r($businessDetails);
                                if(isset($businessDetails['languageKnown'])){
                                foreach ($businessDetails['languageKnown'] as $ach) {
                                ?>
                                <tr>
                                  <td><?php echo $ach->languageKnown;?></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Data Found</td></tr>';}?>
                              </tbody>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content9" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Objective</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                //echo '<pre>';print_r($businessDetails);
                                if(isset($businessDetails['objectiveSummary'])){
                                foreach ($businessDetails['objectiveSummary'] as $ach) {
                                ?>
                                <tr>
                                  <td><?php echo $ach->objectiveSummary;?></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Data Found</td></tr>';}?>
                              </tbody>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content10" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Lincence and Certification</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                //echo '<pre>';print_r($businessDetails);
                                if(isset($businessDetails['license'])){
                                foreach ($businessDetails['license'] as $ach) {
                                ?>
                                <tr>
                                  <td><?php echo $ach->license;?></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Data Found</td></tr>';}?>
                              </tbody>
                            </table>
                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content11" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Skills</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                //echo '<pre>';print_r($businessDetails);
                                if(isset($businessDetails['skills'])){
                                    $skillArray = explode(",",$businessDetails['skills'][0]->skills);
                                foreach ($skillArray as $ach) {
                                ?>
                                <tr>
                                  <td><?php echo $ach;?></td>
                                </tr>
                              <?php $i++; } } else { echo '<tr><td>No Data Found</td></tr>';}?>
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

<!-- Request to join modal-->
<div class="modal fade bs-example-modal-lgteamRequest" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Requested to Join Team</h4>

      </div>
      <div class="modal-body">
        <form class="form-horizontal">

        <input type="hidden" id="member_email" value="">

        <div class="form-group">
          <label class="control-label col-sm-4" for="email">Select Your team: </label>
          <div class="col-sm-4">
            <select name="team_id" id="team_id" class="form-control">
              <option value="0">--Select Team--</option>
              <?php foreach($teamArray as $row){
                echo '<option value="'.$row->id.'">'.$row->team_name.'</option>';
              }?>
            </select>
          </div>
      </div>
        </form>

      <div class="modal-footer" style="text-align: center;">
          <span id="er" style="color:red"></span>
          <div id="loading" style="display: none;">Please Wait...</div></br>
        <button type="button" class="btn btn-success" id="sendRequest">Send Request</button>
      </div>

    </div>
  </div>
</div>
<!--Ends here-->
<script>
$(document).ready(function(){
  $(".mm").click(function() {
       var email = $(this).data('id');
      $("#member_email").val(email);
    $(".bs-example-modal-lgteamRequest").modal('show');
  });

  $("#sendRequest").click(function() {
       var myarray = [];
       var email = $("#member_email").val();
       var team_id = $("#team_id option:selected").val();
       var error = 0;
       if(team_id==0){
         $("#er").html('Please select Team.');
         error = 1;
       }else{
         $("#er").html('');
         error = 0;
       }
       if(error==0){
         $("#loading").show();
         $("#sendRequest").attr('disabled',true);
         $.ajax({
           dataType:"json",
           type:"POST",
           url:"<?php echo base_url();?>admin/team/addMoreMembers",
           data:{team_id:team_id,members_email:email},
           success:function(res){
             $.each(res, function(k,v) {
                 if(v=='success'){
                   $("#loading").html('Congratulation! Professional has added to your team and a mail has also sent to the professional');
                   setTimeout(function(){$('#loading').html(''); location.reload();}, 4000);
                 }else{
                   $("#sendRequest").attr('disabled',false);
                   myarray.push(v);
                   $("#loading").html('Professional is already in your team.');
                   setTimeout(function(){$('#loading').html(''); location.reload();}, 4000);
                 }
             });
           }
         });

       }
  });

  $("#close2").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });
  $("#close3").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });

});
</script>
