<style>
/****** Rating Starts *****/
@import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
h1 { font-size: 1.5em; margin: 10px; }

.rating {
    border: none;
    float: left;
}

.rating > input { display: none; }
.rating > label:before {
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}

.rating > .half:before {
    content: "\f089";
    position: absolute;
}

.rating > label {
    color: #ddd;
    float: right;
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label {}
/*.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }*/

.demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
.demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
.demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
.demo-table ul{margin:0;padding:0;}
.demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}


 


</style>


 <script src="<?php echo base_url();?>admin-assets/js/script.js"></script>
 <script src="<?php echo base_url();?>admin-assets/js/jquery.popupoverlay.js"></script>

 <script src='<?php echo base_url();?>admin-assets/js/jquery.tabs.js'></script>
<script>
  $(document).ready( function() {
    tabify( '#tabs' );
  });
</script>



<body class="nav-md">
    <div class="container body">
      <div class="main_container">      
              <!-- top navigation -->
        <?php $this->load->view('admin/top-navigation');
                ?>
                <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <?php if($this->session->userdata('admin_user_type')==1){?>
          <div class="row tile_count" style="text-align: center;">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Professionals</span>
              <div class="count"><?php $getAllProfessionals = getAllProfessionals(); echo $count  = count($getAllProfessionals); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Business</span>
              <div class="count"><?php $getAllBusiness = getAllBusiness(); echo $count  = count($getAllBusiness); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total active Projects</span>
              <div class="count"><?php $totalRunningProjects = totalRunningProjects(); echo $count  = count($totalRunningProjects); ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Completed Projects</span>
              <div class="count"><?php $totalClosedProjects = totalClosedProjects(); echo $count  = count($totalClosedProjects); ?></div>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Unverified Projects</span>
              <div class="count"><?php $totalUnverifiedProjects = totalUnverifiedProjects(); echo $count  = count($totalUnverifiedProjects); ?></div>
            </div>
          </div>
          <?php } ?>
          <!-- /top tiles -->


		<?php if($this->session->userdata('admin_user_type')==2){?>
            <div class="new_dashboard">
            <div class="top_bradcum">
                <div class="containernew">
                	<div class="title_brad">My Dashboard</div>
                </div>
            </div>
                <div class="dashboard_page">
                    <div class="containernew">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard_tabing">
                                    <div id='tabs'>
                                        <ul>
                                            <li>Active projects </li>
                                            <li>Completed projects</li>
                                            <li>Open Proposals</li>
                                            <li>Rejected proposals</li>
                                            <li>Interview Request</li>
                                        </ul>
                                        <div class="tabs-panel">
                                        <?php if($adminData[0]->resume_status!=1){?>
                                                <div class="welcome_dash">                                          
                                                    <h2>Welcome to Proyourway.</h2>
                                                    <h3>The home of independent business talent. </h3>
                                                    <h3>Let's get started...</h3>
                                                </div>
                                                <div class="welcome_dash2">
                                                    <h3><i class="fa fa-picture-o" aria-hidden="true"></i></h3>
                                                    <h4>Ensure your Proyourway profile is complete and up to date</h4>
                                                    <p>Before submitting a proposal it is important that you have a complete profile.</p> 
                                                    <p>The more detail it has, the more potential clients can learn about you.</p>
                                                    <p><a href="<?php echo base_url();?>admin/profiles">Edit Profile</a></p>
                                                </div>
                                                <div class="welcome_dash2">
                                                    <h3><i class="fa fa-search" aria-hidden="true"></i></h3>
                                                    <h4>Search for suitable projects</h4>
                                                    <p>Search and submit proposals for projects that match your experience.</p>
                                                    <p><a href="#">View projects matched to your profile</a></p>
                                                    <p><a href="#">Search all projects</a></p>
                                                </div>
										<?php }else {?>
                                            <div class="x_content">
                                            <div class="macth_pro">
                                            <div class="">
                                            <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="match_pro_list">
                                            <ul>
												<?php  foreach ($leadsList as $row) {
													if(($row->assignedbusiness_id == $this->session->userdata('adminId') || $this->session->userdata('admin_user_type')==1) && $row->project_status !=1){?>
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
                                                        <p><a href="<?php echo base_url().'admin/projects/view/'.$row->id;?>">View full details ›</a></p>
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
                                        
                                        <?php }?>                                            
                                        </div>
                                    <div class="tabs-panel">
										<?php if($adminData[0]->resume_status ==1){?>
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
                                        <?php }else{
                                        	echo 'Data Not Found';
                                        }?>
                                    </div>
                                    <div class="tabs-panel">
                                    	tabing 03
                                    </div>
                                    <div class="tabs-panel">
                                    	tabing 04
                                    </div>
                                    <div class="tabs-panel">
                                    	tabing 05
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>            
            </div>
        <?php }?>






        
            <div class="boday_main">
            <div class="main_container01">
            <!-- page content -->
            <div class="right_col" role="main">            
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="">
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">    
                <?php
                // print_r($this->session->userdata());
                if($this->session->userdata('admin_user_type')==2){} else { ?>
                    <div class="profile_form_update edu_update01">
                    <span style="color:red;"><?php echo validation_errors(); ?></span>
                    <?php 
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    echo form_open_multipart($action,$attributes);
                    $role = $this->session->userdata('admin_user_type');?>
                    <input type="hidden" name="email_id" value="<?php echo $email;?>">
                    <input type="hidden" name="role" value="<?php echo $role;?>">
                    <div class="x_title page_tit">
                        <h2>Dashboard</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="first-name">First name*</label>
                        <input type="text" id="first_name" name="first_name" required value="<?php if($role==1) { echo $adminData[0]->first_name; } else{ echo $adminData[0]->name;}?>">
                        </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
						<?php if($role==3){?>
                            <label for="first-name">Last name*</label>
                            <input type="text" id="client_last_name" name="client_last_name" required class="form-control col-md-7 col-xs-12" value="<?php  echo $adminData[0]->last_name;?>">
                        <?php } ?>
                    </div>
                    </div>           
                    <div class="row form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Email</label>
                            <input type="text" id="email" name="email" required value="<?php if(isset($adminData[0]->email)) {  echo $adminData[0]->email; }else{
                            echo $email;
                            } ?>" disabled="disabled">
                        </div>
						<?php if($role==3){?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Business Registration Number*</label>
                            <input type="text" id="business_registration_number" name="business_registration_number" required value="<?php echo @$adminData[0]->business_registration_number;?>" >
                            </div>
                        </div>
                            <div class="row form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Company Name*</label>
                            <input type="text" id="company_name" name="company_name" required class="form-control col-md-7 col-xs-12" value="<?php echo $adminData[0]->company_name;?>" >
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Role at Company*</label>
                            <input type="text" id="designation" name="designation" required value="<?php echo $adminData[0]->designation;?>" >
                            </div>
                            </div>                        
                        
                            <div class="row form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Organization Type</label>
                            <select name="organization_type">
                            <option value="govt">Govt Firm</option>
                            <option value= "it">IT Firm</option>
                            <option value= "industry">Industry</option>
                            </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Number of employees*</label>
                            <select name="no_of_employee">
                            <option value="10" <?php if($adminData[0]->no_of_employee==10) { echo 'selected';} ?>>micro (2-10) </option>
                            <option value="50" <?php if($adminData[0]->no_of_employee==50) { echo 'selected';} ?>>small ( 11-50) </option>
                            <option value="400" <?php if($adminData[0]->no_of_employee==400) { echo 'selected';} ?>>medium ( 51-400)</option>
                            <option value="401" <?php if($adminData[0]->no_of_employee==401) { echo 'selected';} ?>>large 400+</option>
                            </select>
                            </div>
                            </div>                      
                        
                        
                            <div class="row form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Industry Type</label>
                            <select name="industry_type">
                            <option value="govt">Govt Firm</option>
                            <option value= "it">IT Firm</option>
                            <option value= "industry">Industry</option>
                            </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Company Location</label>
                            <input type="text" id="location" name="location" required value="<?php echo $adminData[0]->location;?>" >
                            </div>
                            </div>               
                        
                            <div class="row form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="first-name">Web URl</label>
                            <input type="text" id="web_url" name="web_url" required value="<?php echo $adminData[0]->web_url;?>" >
                            </div>
                            </div>
                        
                        <?php } ?>
                    <div class="row form-group" id="submitButtonId">
                    <div class="profo_edi_sub">
                    <input type="submit" class="" value="<?php echo $submit_btn_value; ?>">
                    </div>
                    </div>
                    </div>
                </form>
                </div>
            <?php }?>
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

<!--Edit education popup-->

<!-- Ends here -->

<!--Edit Employment popup-->

<!-- Ends here -->


<!--Edit Achivment popup-->

<!-- Ends here -->

<!--Edit Executive Summary popup-->

<!-- Ends here -->

<!--Edit Objective Summary popup-->

<!-- Ends here -->

<!--Edit Management Summary popup-->

<!-- Ends here -->

<!--Edit Language popup-->

<!-- Ends here -->

<!--Edit License popup-->

<!-- Ends here -->

<!--Edit Skill popup-->

<!-- Ends here -->



<!--Edit Update Profile Picture  popup-->

<!-- Ends here -->





<script>
$("#up").click(function(){
  $("#updateFormDiv").toggle();
});
</script>
<script>
function getStateByCountryId(country_id){}
function getCityByStateId(state_id){}
function editEdu(eduId){}
function editEmp(empId){}
function editAchivement(achivmentId){}
function editExecutive(executiveId){}
function editObjectiveSummary(objectiveId){}
function editManagementSumm(managementId){}
function editLanguage(languageId){}
function editLicenseAndCertificate(licenseId){}
function changeprofilepopup(bus_id){}
function editSkill(skillid){}
$(window).load(function() {});
/*Educatin process start here*/
$("#close").click(function() {});
$("#close2").click(function() {});
$("#save").click(function(){});
/*Education process Ends Here*/
/*Employement process start here*/
$("#close3").click(function() {});
$("#close4").click(function() {});
$("#save1").click(function(){});
/*ends here*/
/*Achivment process start here*/
$("#close5").click(function() {});
$("#close6").click(function() {});
$("#save2").click(function(){});
/*Achivment process Ends Here*/
/*Executive Summary process start here*/
$("#close7").click(function() {});
$("#close8").click(function() {});
$("#save3").click(function(){});
/*Executive Summary process Ends Here*/
/*Objective Summary process start here*/
$("#close9").click(function() {});
$("#close10").click(function() {});
$("#save4").click(function(){});
/*Objective Summary process Ends Here*/
/*Management Summary process start here*/
$("#close11").click(function() {});
$("#close12").click(function() {});
$("#save5").click(function(){});
/*Management Summary process Ends Here*/
/*Language Known process start here*/
$("#close13").click(function() {});
$("#close14").click(function() {});
$("#save6").click(function(){});
/*Language Known process Ends Here*/
/*License And Certificate process start here*/
$("#close15").click(function() {});
$("#close16").click(function() {});
$("#save7").click(function(){});
/*License And Certificate process Ends Here*/
/*Skill process start here*/
$("#close17").click(function() {});
$("#close18").click(function() {});
$("#save8").click(function(){});
/*Skill process Ends Here*/
/*Update Profile Picture start here*/
$("#close151").click(function() {});
$("#close152").click(function() {});
/*Education Delete start Here*/
function deleteEdu(eduid) {}
/*Education process Ends Here*/
/*Employment Delete start Here*/
function deleteEmp(empid) {}
/*Education process Ends Here*/
/*Skill Delete start Here*/
function deleteSkill(skillid) {}
/*Skill process Ends Here*/
</script>
<script type="text/javascript">
var specialKeys = new Array();
specialKeys.push(8); //Backspace
$(function () {
    $(".numeric").on("keypress", function (e) {
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
       $(".errorNumeric").css("display", ret ? "none" : "inline");
        //setTimeout(function(){$('#err').html('');}, 4000);
        return ret;
    });
    $(".numeric").bind("paste", function (e) {
        return false;
    });
    $(".numeric").bind("drop", function (e) {
        return false;
    });
});
</script>

<script>
$(function () {
    $(".boxload").slice(0, 6).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".boxload:hidden").slice(0, 6).slideDown();
        if ($(".boxload:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }        
    });
});
</script>
