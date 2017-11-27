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
          <?php //echo '<pre>';print_r($this->session->userdata);?>
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
        <div class="pro_dashboard">
                        <div class="containernew">
                        <?php if($this->session->userdata('admin_user_type') == 2){?>
                      <div class="prfie">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="admin_profile_left">
                            <input type="hidden" id="bus_id" value="<?php echo $adminData[0]->id;?>"/>
                            <h2><a href="javascript:void()" class="" onClick="changeprofilepopup(<?php echo $adminData[0]->id;?>)">Change Picture</a></h2>
                            <?php //echo '<pre>';print_r($adminData[0]);?>
               <?php if(isset($adminData[0]->businessLogo) && $adminData[0]->businessLogo!=''){ ?>
                          <img src="<?php echo base_url();?>uploads/business/<?php echo $adminData[0]->businessLogo;?>">
                        <?php }else{ ?>
              <img src="<?php echo base_url();?>admin-assets/images/portfolio_image.jpg" alt="logo">
            <?php } ?>
            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="admin_profile_right">
                              <h2>
                <?php if(isset($adminData[0]->business_name)==''){ echo $adminData[0]->business_name; }else{
                  echo $adminData[0]->first_name;
                }?><div class="profile_edit0">
                       <button id="up" class="btn btn-success"><i class="fa fa-pencil"></i> Edit Profile</button>
                    </div></h2>
                                <div class="admi_right_half">
                                  <div class="admin_half_left">
                                    <?php 
                    if(!empty($adminData[0]->country_name)){
                      $country_name = $adminData[0]->country_name;
                    }else{
                      $country_name= $country;
                    }                   
                    if(!empty($adminData[0]->state_name)){
                      $state_name = $adminData[0]->state_name;
                    }else{
                      $state_name= $state;
                    }                   
                    if(!empty($adminData[0]->city_name)){
                      $city_name = $adminData[0]->city_name;
                    }else{
                      $city_name= $city;
                    }                 
                  ?>
                                      <ul>
                                          <li>
                                              <!--<ul>
                                                  <li>webdesign</li>
                                                    <li>creative_design</li>
                                                    <li>it_services</li>
                                                    <li>seo_service</li>
                                                </ul>-->
                                            </li>
                                            <!--<li>Category : <span >IT & Web Services</span></li>-->
                                            <!-- <li><i class="fa fa-users"></i> No of Hiring   <span>00</span></li> -->
                                            <?php //echo '<pre>';print_r($adminData);?>
                                            <li><i class="fa fa-mobile"></i> Mobile No.   <span >+<?php echo $adminData[0]->postcode;?> <?php echo $adminData[0]->mobile;?></span></li>
                                            <li><i class="fa fa-envelope"></i> Email   <span><?php echo $adminData[0]->email;?></span></li>
                                            <li><i class="fa fa-map-marker"></i> Location    <span><?php echo $city_name.' ,'.$state_name.' ,'.$country_name;?></span></li>
                                        </ul>
                                    </div>
                                    <div class="admin_half_right">
                                      <ul>
                                          <?php if($this->session->userdata('resume_status')==1){?>
                                         <li><img src="<?php echo base_url();?>admin-assets/images/admin_check.jpg" alt="check">Proyourway Verified</li>
                                        <?php }else {?>
                                        <li><img src="<?php echo base_url();?>admin-assets/images/admin_uncheck.jpg" alt="check">Proyourway Verified</li>
                                        <?php }?>
                                          <li><?php if($ratings){ ?>
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating" value="5" <?php if($ratings==5){ echo 'checked';} ?>/><label class = "full" for="star5" title="5 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4" <?php if($ratings==4){ echo 'checked';} ?>/><label class = "full" for="star4" title="4 stars"></label>
                                                <input type="radio" id="star3" name="rating" value="3" <?php if($ratings==3){ echo 'checked';} ?>/><label class = "full" for="star3" title="3 stars"></label>
                                                <input type="radio" id="star2" name="rating" value="2" <?php if($ratings==2){ echo 'checked';} ?>/><label class = "full" for="star2" title="2 stars"></label>
                                                <input type="radio" id="star1" name="rating" value="1" <?php if($ratings==2){ echo 'checked';} ?>/><label class = "full" for="star1" title="1 star"></label>
                                            </fieldset>

                                          <?php }else{ ?><button><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o" ></i>  <!--<i class="fa fa-star" aria-hidden="true"></i> 4.5--></button><?php } ?>
                                          </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php }?>
                        <div class="prifile_form">
<?php
      if($this->session->userdata('admin_user_type')==2){ $style="display:none;" ; }else{ $style="display:block;" ; } ?>
      <div  id="updateFormDiv" style="<?php echo $style;?>">
        <span style="color:red;"><?php echo validation_errors(); ?></span>

                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                    echo form_open_multipart($action,$attributes);
                    $role = $this->session->userdata('admin_user_type');
          //echo '<pre>';print_r($this->session->userdata());
                    ?>

                      <input type="hidden" name="email_id" value="<?php echo $email;?>">
                      <input type="hidden" name="role" value="<?php echo $role;?>">
                      <?php  if($role==2){ ?>
                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="plan_name" name="plan_name" required class="form-control col-md-7 col-xs-12" value="<?php echo $adminData[0]->plan_name;?>" disabled="disabled">
                        </div>
                      </div> -->


           <div class="profile_form_update">
                      <div class="row form-group">
                          <?php /*?><div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="" for="first-name">Business Registration Number</label>
                                <input type="text" id="business_registration_number" name="business_registration_number" required class="form-control col-xs-12" value="<?php echo $adminData[0]->business_registration_number;?>" >
                            </div><?php */?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="" for="first-name">Your Name</label>
                                <div class="text_box_icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" id="contact_person_name" name="contact_person_name" required class="form-control col-xs-12" value="<?php echo $adminData[0]->contact_person_name;?>" >
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="" for="first-name">Mobile</label>
                              <div class="text_box_icon"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                              <input type="text" id="mobile" name="mobile" required class="form-control col-xs-12" value="<?php echo $adminData[0]->mobile;?>" >
                            </div>                            
                        </div>
                        <div class="row form-group">
                          
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="" for="first-name">Email</label>
                              <div class="text_box_icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                              <input type="text" id="email" name="email" required class="form-control  col-xs-12" value="<?php echo $adminData[0]->email;?>" disabled="disabled">
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="" for="first-name">Upload Profile Picture</label>
                                <!--<?php if($adminData[0]->businessLogo){ ?>
                                  <img src="<?php //echo base_url();?>uploads/business/<?php //echo $adminData[0]->businessLogo;?>" height="120" width="120">
                                <?php }?>-->
                                <div class="text_box_icon"><i class="fa fa-upload" aria-hidden="true"></i></div>
                                <input type="hidden" name="oldImage" value="<?php echo $adminData[0]->businessLogo;?>">
                                <input type="file" id="file" name="business_logo" >
                            </div>                            
                        </div>
                       
                     
                     <div class="row form-group">
                      
                        <div class="col-md-4 col-sm-4 col-xs-12">
                              <label class="" for="first-name">Country</label>
                              <div class="text_box_icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                                <select name="country" id="country" class="form-control" onChange="getStateByCountryId(this.value)" >
                                 <option>Select Country</option>
                                   <?php foreach ($countryList as $countryl) {?>
                                    <option value="<?php echo $countryl->id;?>" <?php if($adminData[0]->country==$countryl->id) { echo "selected=selected"; } ?>><?php echo $countryl->name;?></option>
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="" for="first-name">State</label>
                            <div class="text_box_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <input type="hidden" id="adState" value="<?php echo $adminData[0]->state;?>">
                           <div class="pro_sel">
                             <select name="state" id="state" class="form-control" onChange="getCityByStateId(this.value)">
                               <option value="">Select State*</option>
                             </select>
                             <!-- <select name="state" id="state" class="form-control" onchange="getCityByStateId(this.value)" >
                              <option>Select State</option>
                                <?php foreach ($stateList as $statel) {?>
                                 <option value="<?php echo $statel->id;?>" <?php if($adminData[0]->state==$statel->id) { echo "selected=selected"; } ?>><?php echo $statel->name;?></option>
                                <?php } ?>
                              </select> -->
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label class="" for="first-name">City</label>
                            <div class="text_box_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <input type="hidden" id="adCity" value="<?php echo $adminData[0]->city;?>">
                            <div class="pro_sel">
                                <select name="city" id="city" class="form-control">
                                  <option value="">Select City*</option>
                                </select>
                                <!-- <select name="city" id="city" class="form-control">
                                   <option>Select City</option>
                                     <?php foreach ($cityList as $cityl) {?>
                                      <option value="<?php echo $cityl->id;?>" <?php if($adminData[0]->city==$cityl->id) { echo "selected=selected"; } ?>><?php echo $cityl->name;?></option>
                                     <?php } ?>
                                 </select> -->
        
                                  <!-- <input type="text" id="country" name="country" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $adminData[0]->country;?>"> -->
                             </div>
                        </div>
                        
                     </div> 

                     <div class="row form-group">
                       <div class="col-md-12 col-sm-12 col-xs-12">
                          <label class="" for="first-name">Overview</label>
                          <div class="text_box_icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                          <textarea id="additional_details" name="additional_details" required class=""><?php echo $adminData[0]->additional_details;?></textarea>
                        </div>
                     </div>
                     
                     <div class="form-group" id="submitButtonId">
                        <div class="profo_edi_sub">
                          <input type="submit" class="" value="<?php echo $submit_btn_value; ?>">
                        </div>
                      </div>
                      </div>
                                         
                      <?php } ?>
                      
                    </form>
      

                    </div>
                    </div>
                        </div>
                        </div>
                
        <div class="boday_main">
          <div class="main_container01">
<?php //echo '<pre>'; print_r($this->session->userdata());?>
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
                    if($this->session->userdata('admin_user_type')==2){?>
                  
                    <div id="status"></div>
                  
                  <div class="x_content">
                    
                    
                    <div class="prifile_form">
                      

                    <div class="admin_profile zebra-style">


                        <div class="overview">
                          <h2><i class="fa fa-street-view" aria-hidden="true"></i> Overview</h2>
                          <div class="ove_view01">
                              <ul>
                                    <li>
                                      <p><?php echo $adminData[0]->additional_details;?></p>
                                    </li>
                            </ul>
                            </div>
                        </div>
                        <hr>

                        <div class="overview">
                          <h2><i class="fa fa-info-circle" aria-hidden="true"></i> Additional Information </h2>
                          <div class="ove_view01">
                              <ul>
                                  
                                 <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php  if(! empty($getExecutiveSummaryDetails)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Executive Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php
                                     
                                         echo '<tr><td><textarea id="executive" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly>'.$getExecutiveSummaryDetails[0]->executiveSummary.'</textarea></td>';
                                         ?>
                                         <td class="last_act"><button id="editExecu" class="edit_back" onClick="editExecutive('<?php echo $getExecutiveSummaryDetails[0]->id;?>');"><i class="fa fa-pencil"></i></button></td>

                                        <?php echo '</tr>';
                   ?>
                                    </table>
                                  <?php }else {?>
                                   <label class="control-label col-md-6 col-sm-2 col-xs-12">
                                            <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/executiveSummary/add" class="bid01">Add Executive Summary</a> </label>
                      </label>                                  
                                        
                                  <?php }?>
                                    

                                  </div>
                                </div>
                              </li>

                              

                              <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php if(! empty($getObjectiveSummaryDetails)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Objective Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php
                                      
                                         echo '<tr><td><textarea id="objective" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly>'.$getObjectiveSummaryDetails[0]->objectiveSummary.'</textarea></td>'; ?>
                                          <td class="last_act"><button id="editObjSumm" class="edit_back" onClick="editObjectiveSummary('<?php echo $getObjectiveSummaryDetails[0]->id;?>');"><i class="fa fa-pencil"></i></button></td>
                                          <?php echo '</tr>';
                     ?>
                                    </table>
                                  <?php } else{?>
                                  <label class="control-label col-md-6 col-sm-2 col-xs-12">
                                            <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/objectiveSummary/add" class="bid01">Add Objective Summary</a> </label>
                      </label>
                                  <?php }?>
                                    

                                  </div>
                                </div>
                              </li>

                              <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="btn btn-success bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php if(! empty($managementSummaryDetails)) {?>
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Management Summary</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                     
                                         echo '<tr><td><textarea id="management" style="margin: 0px; min-height: 200px; max-height:200px; width: 1172px;" readonly>'.$managementSummaryDetails[0]->managementSummary.'</textarea></td>';?>
                                          <td class="last_act"><button id="editManSumm" class="edit_back" onClick="editManagementSumm('<?php echo $managementSummaryDetails[0]->id;?>');"><i class="fa fa-pencil"></i></button></td>
                                          <?php echo '</tr>';

                                        ?>
                                    </table>
                                  <?php }else {?>
                                      <div class="form-group">
                                       <label class="add_more_label">
                                            <span class="emp_text">Management Summary</span><a href="<?php echo base_url();?>admin/managementSummary/add" class="bid01"><i class="fa fa-plus"></i> Add Management Summary</a>
                                        </label>
                                      </div>
                                  <?php }?>
                                    

                                  </div>
                                </div>
                              </li> 
                                 
                              <li>
                                  <div class="form-group">
                                    <label class="add_more_label"><span class="emp_text"><i class="fa fa-university" aria-hidden="true"></i> University / College</span> <a href="<?php echo base_url();?>admin/education/add" class="bid01"><i class="fa fa-plus" ></i> Add More Education</a> </label>
                                    <div class="tabel_div">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>University  Name / College Name</th>
                                            <th>Degree Name</th>
                                            <th>&nbsp;</th>

                                          </tr>
                                        </thead>
                                        <?php if(! empty($getEducationDetails)) {
                                            $i=1;
                                            foreach($getEducationDetails as $edu){ ?>
                                            <input type="hidden" id="s_name<?php echo $edu->id;?>" value="<?php echo $edu->school_name;?>">
                                            <input type="hidden" id="s_location<?php echo $edu->id;?>" value="<?php echo $edu->SchoolLocation;?>">
                                            <input type="hidden" id="s_degree<?php echo $edu->id;?>" value="<?php echo $edu->IsHighestDegee;?>">
                                            <input type="hidden" id="s_degreeName<?php echo $edu->id;?>" value="<?php echo $edu->DegreeName;?>">
                                            <input type="hidden" id="s_percentage<?php echo $edu->id;?>" value="<?php echo $edu->MeasureSystem;?>">
                                            <input type="hidden" id="s_startdate<?php echo $edu->id;?>" value="<?php echo $edu->startdate;?>">
                                            <input type="hidden" id="s_endDate<?php echo $edu->id;?>" value="<?php echo $edu->endDate;?>">
                                            <input type="hidden" id="s_EducationDescription<?php echo $edu->id;?>" value="<?php echo $edu->EducationDescription;?>">

                                          <tr>
                                          <td><?php echo $edu->school_name;?></td>
                                          <!-- <td><?php //if($edu->IsHighestDegee=='True') { echo 'Yes';}else{ echo 'No';}?></td> -->
                                          <td><?php echo $edu->DegreeName;?></td>
                                          <td>
                                          <button id="editEdu" class="edit_back" onClick="editEdu('<?php echo $edu->id;?>');"><i class="fa fa-pencil" ></i></button>
                                          <button id="delteEdu" class="delete_back" onClick="deleteEdu('<?php echo $edu->id;?>');"><i class="fa fa-trash" ></i></button>
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
                                    <label class="add_more_label"><span class="emp_text"><i class="fa fa-user" aria-hidden="true"></i> Employment</span><a href="<?php echo base_url();?>admin/employment/add" class="bid01"><i class="fa fa-plus"></i> Add More Employment</a> </label>
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
                                        if(! empty($getEmploymentDetails)) {
                                          foreach($getEmploymentDetails as $emp){                      
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

                                            <input type="hidden" id="EmployerOrgName<?php echo $emp->id;?>" value="<?php echo $emp->EmployerOrgName;?>">
                                            <input type="hidden" id="CurrentEmplyor<?php echo $emp->id;?>" value="<?php echo $emp->CurrentEmplyor;?>">
                                            <input type="hidden" id="Title<?php echo $emp->id;?>" value="<?php echo $emp->Title;?>">
                                            <input type="hidden" id="Description<?php echo $emp->id;?>" value="<?php echo $emp->Description;?>">
                                            <input type="hidden" id="startDate<?php echo $emp->id;?>" value="<?php echo $emp->startDate;?>">
                                            <input type="hidden" id="endDate1<?php echo $emp->id;?>" value="<?php echo $emp->endDate;?>">

                                          <tr>
                                          <td><?php echo $emp->EmployerOrgName;?></td>
                                          <td><?php if($emp->CurrentEmplyor=='True'){ echo 'Current Employer';}else{ echo 'Previous Employer';}?></td>
                                          <td><?php echo $emp->Title;?></td>
                                          <td><?php if(strlen($emp->Description) > 50){
                                            $pos=strpos($emp->Description, ' ',50);
                                          echo substr($emp->Description,0,$pos ).'...'; }else{ echo $emp->Description; }

                                          ?></td>
                                          <td><?php echo $emp->startDate;?></td>
                                          <?php /*?><td><?php if($emp->CurrentEmplyor=='True'){ echo 'Currently Working';}else{ echo  $emp->endDate ;}?></td><?php */?>
                                           <td><?php echo  $EndDate ;?></td>
                                          <td>
                                          <button id="editEd" class="edit_back" onClick="editEmp('<?php echo $emp->id;?>');"><i class="fa fa-pencil"></i></button>
                                          <button id="delteEd" class="delete_back" onClick="deleteEmp('<?php echo $emp->id;?>');"><i class="fa fa-trash"></i></button>
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
                                  <?php if(!empty($getAchivmentDetails)) {?>
                                      <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th class="acho">Achivement</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php 
                                        foreach($getAchivmentDetails as $ach){  ?>
                                        <tr>
                                        <td><textarea id="achivment" style="margin: 0px; min-height: 100px; max-height:100px; width: 1172px;" readonly><?php echo $ach->achivement;?></textarea></td>
                                        <td class="last_act" ><button id="editAchi" class="edit_back" onClick="editAchivement('<?php echo $ach->id;?>');"> <i class="fa fa-pencil"></i></button></td>
                                        </tr>
                                      <?php } ?>
                                    </table>
                                  <?php } else{?>
                                      
                                        <div class="form-group">
                                            <label class="add_more_label"><span class="emp_text">Achivement</span><a href="<?php echo base_url();?>admin/achivement/add" class="bid01"><i class="fa fa-plus"></i> Add Achivement</a> </label>
                                        </div>   
                                        
                                  <?php }?>
                                    

                                  </div>
                                </div>
                              </li>

                              

                              <li>
                                <div class="form-group">
                                  <!-- <label class="control-label col-md-6 col-sm-2 col-xs-12"><a href="<?php echo base_url();?>admin/employment/add" class="btn btn-success bid01">Add More Employment</a> </label> -->
                                  <div class="tabel_box">
                                  <?php if(! empty($getLicenseDetails)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>License and Certification</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                      
                      echo '<input type="hidden" id="license_Id" value="'.$getLicenseDetails[0]->license.'" readonly';
                                         echo '<tr><td>'.$getLicenseDetails[0]->license.'</td>';
                                         ?>
                                         <td class="last_act"><button id="editLicDeta" class="edit_back" onClick="editLicenseAndCertificate('<?php echo $getLicenseDetails[0]->id;?>');"><i class="fa fa-pencil"></i></button></td>
                                         <?php echo '</tr>';

                                       ?>
                                    </table>                                 
                    <?php }else{?> 
                                            <label class="add_more_label"><span class="emp_text">License and Certificate</span> <a href="<?php echo base_url();?>admin/license/add" class="bid01"><i class="fa fa-plus"></i> Add License and Certificate</a> </label>
                    <?php }?> 
                                  </div>
                                </div>
                              </li>

                              <li>
                                <div class="form-group">                                 
                                  <div class="tabel_box">
                                  <?php if(! empty($getLanguageKnownDetails)) {?>
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Language Known</th>
                                          <th class="last_act">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php                                     
                      //echo '<pre>';print_r($getLanguageKnownDetails);                    
                      echo '<input type="hidden" id="language_Id" value="'.$getLanguageKnownDetails[0]->languageKnown.'" readonly/>';
                                         echo '<tr><td>'.$getLanguageKnownDetails[0]->languageKnown.'</td>';?>
                                          <td class="last_act"><button id="editLan" class="edit_back" onClick="editLanguage('<?php echo $getLanguageKnownDetails[0]->id;?>');"><i class="fa fa-pencil"></i></button></td>
                                          <?php echo '</tr>';

                                      ?>
                                    </table>
                                  <?php }else {?>
                                            <label class="add_more_label"><span class="emp_text">Language</span> <a href="<?php echo base_url();?>admin/language/add" class="bid01"><i class="fa fa-plus"></i> Add Language Known</a> </label>
                                  <?php }?>
                                    

                                  </div>
                                </div>
                              </li>

                              <li>
                                <div class="form-group">
                                   <label class="add_more_label"><span class="emp_text"><i class="fa fa-cubes" aria-hidden="true"></i> Skills</span><a href="<?php echo base_url();?>admin/skill/add" class="bid01"><i class="fa fa-plus"></i> Add More Skills</a> </label> 
                                  <div class="tabel_box">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Skills</th>
                                          <th class="act_tab_mod">&nbsp;</th>
                                        </tr>
                                      </thead>
                                      <?php
                                      //print_r($skills);
                                      $skillArray = $skills;
                                      if(! empty($skillArray)) {
                                        foreach($skillArray as $ski){ 
                                         echo '<input type="hidden" id="skill_id" value="'.$ski->skills.'" readonly/>';
                                          echo '<input type="hidden" id="experince_id" value="'.$ski->ExperienceInMonths.'" readonly/>';
                      ?>
                                        <tr class="boxload">
                                        <td><?php echo $ski->skills;?></td>
                                         <td class="act_tab_mod"><button id="editSkill" class="edit_back" onClick="editSkill('<?php echo $ski->id;?>');"><i class="fa fa-pencil"></i></button>  <button id="deleteskill" class="delete_back" onClick="deleteSkill('<?php echo $ski->id;?>');"><i class="fa fa-trash"></i></button></td>
                                         
                                        </tr>                                        
                                      <?php } }else{
                                        echo '<tr><td>No Record Found</td></tr>';
                                      } ?>
                                      
                                    </table>
                                    <div class="load_more_div"><a href="#" id="loadMore">Load More</a></div>

                                  </div>
                                </div>
                              </li>
                            </ul>
                            </div>
                        </div>
                        <hr>
                    </div>
                    
                  </div>

                  <?php } else { ?>
                  <div class="profile_form_update edu_update01">
                  <?php 
				  	$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    echo form_open_multipart($action,$attributes);
					$role = $this->session->userdata('admin_user_type');
				  
				  ?> <input type="hidden" name="email_id" value="<?php echo $email;?>">
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
                      
                       <?php if($role==2){?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name" name="last_name" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($adminData[0]->last_name)) { echo $adminData[0]->last_name; } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mobile" name="mobile" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($adminData[0]->mobile)) {  echo $adminData[0]->mobile; }else{
                              echo $this->session->userdata('mobile');
                            } ?>">
                        </div>
                      </div>
                      <?php } ?>
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
<div class="modal fade bs-example-modal-lgEditEdu" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close2"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your Education</h4>
      </div>
      <div class="modal-body">
      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="eduId" name="eduId" value="">

        <div class="row form-group">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label  for="email">Education Start Date : </label>
            <input type="text" class="has-feedback-left" id="single_cal1" placeholder="Start Date" aria-describedby="inputSuccess2Status">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="email">Education End Date : </label>
            <input type="text" class="has-feedback-left" id="single_cal4" placeholder="End Date" aria-describedby="inputSuccess2Status">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label  for="email">School/College Name: </label>
            <input type="text" class="" id="school_name" placeholder="School/College Name" value="">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label  for="email">School/College Location: </label>
            <input type="text" class="" id="SchoolLocation" placeholder="School/College Location" value="">
          </div>
        </div>

        

        <div class="row form-group">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <label  for="email">Highest Degree: </label>
            <select id="IsHighestDegee" class="">
                <option value="True">Yes</option>
                <option value="False">No</option>
              </select>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <label class="" for="email">Degree : </label>
            <input type="text" class="" id="DegreeName" placeholder="Degree" value="">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <label  for="email">Percentage Obtained : </label>
            <input type="text" class="numeric" id="MeasureSystem" placeholder="Percentage" value="">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-12">
            <label for="email">Education Description : </label>
            <textarea class="" id="EducationDescription" ></textarea>
          </div>
        </div>

      </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errBid" style="color: red;"></span>
          <span id="sucBid" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->

<!--Edit Employment popup-->
<div class="modal fade bs-example-modal-lgEditEmp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close3"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your Employment</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="empId" name="empId" value="">

        <div class="row form-group">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label  for="email">Employment Start Date : </label>
            <input type="text" class="has-feedback-left" id="single_cal2" placeholder="Start Date" aria-describedby="inputSuccess2Status" value="">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="email">Employment End Date : </label>
            <input type="text" class="has-feedback-left" id="single_cal3" placeholder="End Date" aria-describedby="inputSuccess2Status" value="">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <label  for="email">Organization Name: </label>
            <input type="text" class="form-control" id="EmployerOrgNameEmp" placeholder="Organization name" value="">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <label for="email">Current Employer: </label>
            <select id="CurrentEmplyorEmp" class="">
              <option value="True">Yes</option>
              <option value="False">No</option>
            </select>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <label for="email">Job Title: </label>
            <input type="text" class="" id="TitleEmp" placeholder="Job Title" value="">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <label for="email">Job Description : </label>
            <textarea class="form-control" id="DescriptionEmp"></textarea>
          </div>
        </div>

       </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span id="errBidEmp" style="color: red;"></span>
          <span id="sucBidEmp" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close4"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save1"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->


<!--Edit Achivment popup-->
<div class="modal fade bs-example-modal-lgEditAchivment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close5"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your Achivment</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="achivmentId" name="achivmentId" value="">
        <div class="row form-group">
          <div class="col-md-12">
          <label for="email">Achivment : </label>
          <textarea class="form-control" id="AchivmentDescription" name="AchivmentDescription"></textarea>
          </div>
        </div>
      </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errAch" style="color: red;"></span>
          <span id="sucAch" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close6"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save2"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->

<!--Edit Executive Summary popup-->
<div class="modal fade bs-example-modal-lgEditExecutiveSummary" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close7"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your Executive Summary</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="executiveId" name="executiveId" value="">
        <div class="form-group">
          <div class="col-md-12">
            <label  for="email">Executive Summary : </label>
            <textarea class="form-control" id="ExecutiveSummary" name="ExecutiveSummary" ></textarea>
          </div>
        </div>
        </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errExe" style="color: red;"></span>
          <span id="sucExe" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close8"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save3"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->

<!--Edit Objective Summary popup-->
<div class="modal fade bs-example-modal-lgEditObjectiveSummary" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close9"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your Objective Summary</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="objectiveId" name="objectiveId" value="">
        <div class="form-group">
          <label class="" for="email">Objective Summary : </label>
          <textarea class="form-control" id="ObjectiveSummary" name="ObjectiveSummary"></textarea>
        </div>
        </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errObj" style="color: red;"></span>
          <span id="sucObj" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close10"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save4"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->

<!--Edit Management Summary popup-->
<div class="modal fade bs-example-modal-lgEditManagementSummary" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close11"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your Management Summary</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="managementId" name="managementId" value="">
        <div class="row form-group">
          <div class="col-md-12">
            <label  for="email">Objective Summary : </label>
            <textarea class="" id="ManagementSummary" name="ManagementSummary"></textarea>
          </div>
        </div>
      </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errMan" style="color: red;"></span>
          <span id="sucMan" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close12"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save5"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->

<!--Edit Language popup-->
<div class="modal fade bs-example-modal-lgEditLanguage" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close13"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your Language</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="languageId" name="languageId" value="">
        <div class="col-md-12"><div class="pop_note"><b>Note : </b>Insert the multiple Language in comma sepration.</div></div>      
        <div class="row form-group">
          <div class="col-md-12">
            <label  for="email">Language : </label>
            <textarea class="" id="Language" name="Language"></textarea>
          </div>
        </div>
      </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errLan" style="color: red;"></span>
          <span id="sucLan" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close14"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save6"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->

<!--Edit License popup-->
<div class="modal fade bs-example-modal-lgEditLicense" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close15"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Your License</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="licenseId" name="licenseId" value="">
        <div class="row form-group">
          <div class="col-md-12">
            <label for="email">License : </label>
            <textarea class="" id="License" name="License"></textarea>
          </div>
        </div>
      </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errLic" style="color: red;"></span>
          <span id="sucLic" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close16"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save7"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->

<!--Edit Skill popup-->
<div class="modal fade bs-example-modal-lgEditSkill" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close17"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Update Skill</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal">
        <div class="form_pop">
        <input type="hidden" id="skillid" name="skillid" value="">
        <div class="row form-group">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="email">Skill : </label>
            <input type="text" name="skill" id="skill"/>            
          </div>
          <!-- <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="email">Experince : </label>
            <input type="number" name="experince" id="experince"/>     
          </div> -->
        </div>        
      </div>
      </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="errSkill" style="color: red;"></span>
          <span id="sucSkill" style="color: green;"></span>
        </div>
        <button type="button" class="pop_close" id="close18"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save8"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- Ends here -->



<!--Edit Update Profile Picture  popup-->
<div class="modal fade bs-example-modal-profileedit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="close151"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel">Change Profile Picture</h4>
      </div>
      <div class="modal-body">      
      <form class="form-horizontal" action="<?php echo base_url();?>admin/profiles/updateProfilepic" method="post" enctype="multipart/form-data">
        <div class="form_pop">
        <input type="hidden" id="bussiness_id" name="bussiness_id" value="">
        <div class="row form-group">
          <div class="col-md-12">
            <label  for="email">Upload picture </label>
            <input type="file" class="profile_pic_up" name="upload_picture" id="upload_picture">
          </div>
        </div>
        <div class="modal-footer" style="text-align: center;">
          <div class="pop_mes">
            <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
            <span id="errbuspic" style="color: red;"></span>
            <span id="sucbuspic" style="color: green;"></span>
          </div>
          <button type="button" class="pop_close" id="close152">Close</button>
          <input type="submit" class="pop_profile" name="saveupdatepic" value="Submit"/>
          <!--<button type="button" class="btn btn-primary" id="saveupdatepic" name="saveupdatepic">Submit</button>-->
        </div>
      </div>
      </form>
      </div>
      

    </div>
  </div>
</div>
<!-- Ends here -->





<script>
$("#up").click(function(){
  $("#updateFormDiv").toggle();
});
</script>
<script>
function getStateByCountryId(country_id){
  if(country_id){
    $.ajax({
      type:"POST",
      url: "<?php echo base_url();?>landing/getStateByCountryId",
      data: {country_id: country_id},
        success: function(data) {
            $("#state").html(data);
        }
    });
  }
}

function getCityByStateId(state_id){
  if(state_id){
    $.ajax({
      type:"POST",
      url: "<?php echo base_url();?>landing/getCityByStateId",
      data: {state_id: state_id},
        success: function(data) {
            $("#city").html(data);
        }
    });
  }
}

function editEdu(eduId){
    var s_name = $("#s_name"+eduId).val();
    var s_location = $("#s_location"+eduId).val();
    var s_degree = $("#s_degree"+eduId).val();
    var s_degreeName = $("#s_degreeName"+eduId).val();
    var s_percentage = $("#s_percentage"+eduId).val();
    var s_education_detail = $("#s_percentage"+eduId).val();
    var s_EducationDescription = $("#s_EducationDescription"+eduId).val();

    $("#eduId").val(eduId);
    $("#school_name").val(s_name);
    $("#SchoolLocation").val(s_location);
    $("#DegreeName").val(s_degreeName);
    $("#MeasureSystem").val(s_percentage);
    $("#EducationDescription").val(s_EducationDescription);
    $(".bs-example-modal-lgEditEdu").modal();

}

function editEmp(empId){
  var EmployerOrgName = $("#EmployerOrgName"+empId).val();
  var CurrentEmplyor = $("#CurrentEmplyor"+empId).val();
  var Title = $("#Title"+empId).val();
  var Description = $("#Description"+empId).val();
  var startDate = $("#startDate"+empId).val();
  var endDate = $("#endDate1"+empId).val();
  //alert(EmployerOrgName);
  $("#empId").val(empId);
  $("#EmployerOrgNameEmp").val(EmployerOrgName);
  $("#CurrentEmplyorEmp").val(CurrentEmplyor);
  $("#TitleEmp").val(Title);
  $("#DescriptionEmp").val(Description);
  $("#single_cal2").val(startDate);
  $("#single_cal3").val(endDate);
  $(".bs-example-modal-lgEditEmp").modal();
}

function editAchivement(achivmentId){
  var AchivmentDescription = $("#achivment").val();   
  $("#achivmentId").val(achivmentId); 
  $("#AchivmentDescription").val(AchivmentDescription);  
  $(".bs-example-modal-lgEditAchivment").modal();
}

function editExecutive(executiveId){
  var ExecutiveSummary = $("#executive").val();   
  $("#executiveId").val(executiveId); 
  $("#ExecutiveSummary").val(ExecutiveSummary);  
  $(".bs-example-modal-lgEditExecutiveSummary").modal();
}

function editObjectiveSummary(objectiveId){
  var ObjectiveSummary = $("#objective").val();   
  $("#objectiveId").val(objectiveId); 
  $("#ObjectiveSummary").val(ObjectiveSummary);  
  $(".bs-example-modal-lgEditObjectiveSummary").modal();
}

function editManagementSumm(managementId){
  var ManagementSummary = $("#management").val();   
  $("#managementId").val(managementId); 
  $("#ManagementSummary").val(ManagementSummary);  
  $(".bs-example-modal-lgEditManagementSummary").modal();
}

function editLanguage(languageId){
  var Language = $("#language_Id").val();   
  $("#languageId").val(languageId); 
  $("#Language").val(Language);  
  $(".bs-example-modal-lgEditLanguage").modal();
}

function editLicenseAndCertificate(licenseId){
  var License = $("#license_Id").val();   
  $("#licenseId").val(licenseId); 
  $("#License").val(License);  
  $(".bs-example-modal-lgEditLicense").modal();
}

function changeprofilepopup(bus_id){
  var bus_id = $("#bus_id").val();
  $("#bussiness_id").val(bus_id);
  $(".bs-example-modal-profileedit").modal();
}

function editSkill(skillid){
  var skill = $("#skill_id").val();
  var experince = $("#experince_id").val();  
  $("#skillid").val(skillid);
  $("#experince").val(experince);
  $("#skill").val(skill); 
  $(".bs-example-modal-lgEditSkill").modal();
}

$(window).load(function() {
      var country_id = $("#country option:selected").val();
      var state = $("#adState").val();
      if(country_id){
        $.ajax({
           type:"POST",
           url: "<?php echo base_url();?>landing/getStateByCountryId",
           data: {country_id: country_id,state:state},
           success: function(data) {
               $("#state").html(data);
           }
         });
       }

       var state_id = $("#adState").val();
       var city = $("#adCity").val();
       if(state_id){
           $.ajax({
            type:"POST",
            url: "<?php echo base_url();?>landing/getCityByStateId",
            data: {state_id: state_id,city:city},
            success: function(data) {
                $("#city").html(data);
            }
          });
        }

});

/*Educatin process start here*/
$("#close").click(function() {
  //var eduId = $("#eduId").val();
  $("#school_name").val();
  $("#SchoolLocation").val('');
  $("#DegreeName").val('');
  $("#MeasureSystem").val('');
  $("#EducationDescription").val('');
  $(".bs-example-modal-lgEditEdu").modal('hide');
});

$("#close2").click(function() {
  $("#school_name").val();
  $("#SchoolLocation").val('');
  $("#DegreeName").val('');
  $("#MeasureSystem").val('');
  $("#EducationDescription").val('');
  $(".bs-example-modal-lgEditEdu").modal('hide');
});

$("#save").click(function(){
  var eduId = $("#eduId").val();
  var school_name = $("#school_name").val();
  var SchoolLocation = $("#SchoolLocation").val();
  var IsHighestDegee = $("#IsHighestDegee option:selected").val();
  var DegreeName = $("#DegreeName").val();
  var MeasureSystem = $("#MeasureSystem").val();
  var EducationDescription = $("#EducationDescription").val();
  var startdate = $("#single_cal1").val();
  var endDate = $("#single_cal4").val();
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/education/updateSchool",
    data: {eduId:eduId,school_name:school_name,SchoolLocation:SchoolLocation,IsHighestDegee:IsHighestDegee,DegreeName:DegreeName,MeasureSystem:MeasureSystem,EducationDescription:EducationDescription,startdate:startdate,endDate:endDate},
    success: function(data) {
      if (data=='success'){
        $("#sucBid").html('School/College Detail Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errBid").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Education process Ends Here*/

/*Employement process start here*/
$("#close3").click(function() {
  $("#EmployerOrgNameEmp").val('');
  $("#CurrentEmplyorEmp").val('');
  $("#TitleEmp").val('');
  $("#DescriptionEmp").val('');
  $("#single_cal2").val('');
  $("#single_cal3").val('');
  $(".bs-example-modal-lgEditEmp").modal('hide');
});

$("#close4").click(function() {
  $("#EmployerOrgNameEmp").val('');
  $("#CurrentEmplyorEmp").val('');
  $("#TitleEmp").val('');
  $("#DescriptionEmp").val('');
  $("#single_cal2").val('');
  $("#single_cal3").val('');
  $(".bs-example-modal-lgEditEmp").modal('hide');
});

$("#save1").click(function(){
  var empId = $("#empId").val();
  var EmployerOrgName = $("#EmployerOrgNameEmp").val();
  var CurrentEmplyor = $("#CurrentEmplyorEmp option:selected").val();
  var Title = $("#TitleEmp").val();
  var Description = $("#DescriptionEmp").val();
  var startdate = $("#single_cal2").val();
  var endDate = $("#single_cal3").val();
  // alert(empId);
  // alert(EmployerOrgName);
  // alert(CurrentEmplyor);
  // alert(Title);
  // alert(Description);
  // alert(startdate);
  // alert(endDate);

  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/employment/updateEmployment",
    data: {empId:empId,EmployerOrgName:EmployerOrgName,CurrentEmplyor:CurrentEmplyor,Title:Title,Description:Description,startdate:startdate,endDate:endDate},
    success: function(data) {
      if (data=='success'){
        $("#sucBidEmp").html('Employment Updates Successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errBidEmp").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*ends here*/

/*Achivment process start here*/
$("#close5").click(function() {
  //var achivmentId = $("#achivmentId").val();  
  $("#AchivmentDescription").val('');
  $(".bs-example-modal-lgEditAchivment").modal('hide');
});

$("#close6").click(function() {
   $("#AchivmentDescription").val('');
  $(".bs-example-modal-lgEditAchivment").modal('hide');
});

$("#save2").click(function(){ 
  var achivmentId = $("#achivmentId").val();  
  var AchivmentDescription =  $("#AchivmentDescription").val();  
  //alert(achivmentId);alert(AchivmentDescription);
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/achivement/updateAchivment",
    data: {achivmentId:achivmentId,AchivmentDescription:AchivmentDescription},
  
    success: function(data) {
      if (data=='success'){
        $("#sucAch").html('Achivment Detail Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errAch").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Achivment process Ends Here*/


/*Executive Summary process start here*/
$("#close7").click(function() {   
  $("#ExecutiveSummary").val('');
  $(".bs-example-modal-lgEditExecutiveSummary").modal('hide');
});

$("#close8").click(function() {
   $("#ExecutiveSummary").val('');
  $(".bs-example-modal-lgEditExecutiveSummary").modal('hide');
});

$("#save3").click(function(){ 
  var executiveId = $("#executiveId").val();  
  var ExecutiveSummary =  $("#ExecutiveSummary").val();  
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/executiveSummary/updateExecutiveSummary",
    data: {executiveId:executiveId,ExecutiveSummary:ExecutiveSummary},
  
    success: function(data) {
      if (data=='success'){
        $("#sucExe").html('Executive Summary Detail Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errExe").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Executive Summary process Ends Here*/

/*Objective Summary process start here*/
$("#close9").click(function() {    
  $("#ObjectiveSummary").val('');
  $(".bs-example-modal-lgEditObjectiveSummary").modal('hide');
});

$("#close10").click(function() {
   $("#ObjectiveSummary").val('');
  $(".bs-example-modal-lgEditObjectiveSummary").modal('hide');
});

$("#save4").click(function(){ 
  var objectiveId = $("#objectiveId").val();  
  var ObjectiveSummary =  $("#ObjectiveSummary").val();  
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/objectiveSummary/updateObjectiveSummary",
    data: {objectiveId:objectiveId,ObjectiveSummary:ObjectiveSummary},
  
    success: function(data) {
      if (data=='success'){
        $("#sucObj").html('Objective Summary Detail Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errObj").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Objective Summary process Ends Here*/

/*Management Summary process start here*/
$("#close11").click(function() {   
  $("#ManagementSummary").val('');
  $(".bs-example-modal-lgEditManagementSummary").modal('hide');
});

$("#close12").click(function() {
   $("#ManagementSummary").val('');
  $(".bs-example-modal-lgEditManagementSummary").modal('hide');
});

$("#save5").click(function(){ 
  var managementId = $("#managementId").val();  
  var ManagementSummary =  $("#ManagementSummary").val();  
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/managementSummary/updateManagementSummary",
    data: {managementId:managementId,ManagementSummary:ManagementSummary},
  
    success: function(data) {
      if (data=='success'){
        $("#sucMan").html('Management Summary Detail Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errMan").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Management Summary process Ends Here*/



/*Language Known process start here*/
$("#close13").click(function() {   
  $("#Language").val('');
  $(".bs-example-modal-lgEditLanguage").modal('hide');
});

$("#close14").click(function() {
   $("#Language").val('');
  $(".bs-example-modal-lgEditLanguage").modal('hide');
});

$("#save6").click(function(){ 
  var languageId = $("#languageId").val();  
  var Language =  $("#Language").val();  
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/language/updateLanguage",
    data: {languageId:languageId,Language:Language},
  
    success: function(data) {
      if (data=='success'){
        $("#sucLan").html('Language Detail Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errLan").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Language Known process Ends Here*/

/*License And Certificate process start here*/
$("#close15").click(function() {   
  $("#License").val('');
  $(".bs-example-modal-lgEditLicense").modal('hide');
});
$("#close16").click(function() {
   $("#License").val('');
  $(".bs-example-modal-lgEditLicense").modal('hide');
});

$("#save7").click(function(){ 
  var licenseId = $("#licenseId").val();  
  var License =  $("#License").val();  
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/license/updateLicenseAndCertificate",
    data: {licenseId:licenseId,License:License},
  
    success: function(data) {
      if (data=='success'){
        $("#sucLic").html('License Detail Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errLic").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*License And Certificate process Ends Here*/

/*Skill process start here*/
$("#close17").click(function() {   
  $("#skill").val('');
  $("#experince").val('');
  $(".bs-example-modal-lgEditSkill").modal('hide');
});

$("#close18").click(function() {
  $("#skill").val('');
  $("#experince").val('');
  $(".bs-example-modal-lgEditSkill").modal('hide');
});

$("#save8").click(function(){   
  var skillid = $("#skillid").val();  
  var skill =   $("#skill").val();
  //var experince =   $("#experince").val();   
  $.ajax({
    type:"POST",
    url: "<?php echo base_url();?>admin/skill/updateSkill",
    data: {skillid:skillid,skill:skill},
  
    success: function(data) {
      if (data=='success'){
        $("#sucSkill").html('Skill Updated successfully.');
        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
      }else{
        $("#errSkill").html('Sorry something went wrong.');
        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
      }
    }
  });
});
/*Skill process Ends Here*/

/*Update Profile Picture start here*/

$("#close151").click(function() {   
  $("#profiel").val('');
  $(".bs-example-modal-profileedit").modal('hide');
});

$("#close152").click(function() {   
  $("#profiel").val('');
  $(".bs-example-modal-profileedit").modal('hide');
});

//$("#saveupdatepic").click(function(){ 
//  var bussiness_id = $("#bussiness_id").val();  
//  var upload_picture =  $("#upload_picture").val();  
//  $.ajax({
//    type:"POST",
//    url: "<?php echo base_url();?>admin/profiles/updateProfilepic",
//    data: {bussiness_id:bussiness_id,upload_picture:upload_picture},
//  

//    success: function(data) {
//      if (data=='success'){
//        $("#sucbuspic").html('License Detail Updated successfully.');
//        setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
//      }else{
//        $("#errbuspic").html('Sorry something went wrong.');
//        setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
//      }
//    }
//  });
//});


/*Update Profile Picture End here*/





/*Education Delete start Here*/
function deleteEdu(eduid) {
    if (confirm("Are you sure?")) {
        $.ajax({
            url:"<?php echo base_url();?>admin/education/deleteSchool",
            type: 'post',
            data: {eduid:eduid},
            success: function () {
               location.reload();
            },
            error: function () {
                alert('failure');
            }
        });
    } else {
        alert(" not deleted");
    }
}
/*Education process Ends Here*/

/*Employment Delete start Here*/
function deleteEmp(empid) {
    if (confirm("Are you sure?")) {
        $.ajax({
            url:"<?php echo base_url();?>admin/employment/deleteEmployment",
            type: 'post',
            data: {empid:empid},
            success: function () {
               location.reload();
            },
            error: function () {
                alert('failure');
            }
        });
    } else {
        alert(" not deleted");
    }
}
/*Education process Ends Here*/

/*Skill Delete start Here*/
function deleteSkill(skillid) {
    if (confirm("Are you sure?")) {
        $.ajax({
            url:"<?php echo base_url();?>admin/skill/deleteSkill",
            type: 'post',
            data: {skillid:skillid},
            success: function () {
               location.reload();
            },
            error: function () {
                alert('ajax failure');
            }
        });
    } else {
        alert(skillid + " not deleted");
    }
}
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
