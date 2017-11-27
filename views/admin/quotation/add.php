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
                            <h2><?php if($quotation_id){ echo 'Edit Your Project'; } else { echo 'Post a Project';} ?></h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                          	<div class="profile_form_update edu_update01 client_log">
                            <!-- <span style="color:red;"><?php echo validation_errors(); ?></span> -->
                              <?php 
                              if(form_error('hireda')){
                                  $errorStyleHireda="border:1px solid red";
                              }else{
                                  $errorStyleHireda="";
                              }
                              ?>
        
                            <?php
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>
        
                            <input type="hidden" name="quotation_id" value="<?php echo $quotation_id;?>">
        
                            <div class="row form-group">
                            	<div class="col-md-4 col-sm-4 col-xs-12">
                                	<label class="" for="first-name">Hire Professional<span class="required">*</span></label>
                                  <select name="hireda" class="form-control" style="<?php echo $errorStyleHireda;?>">
                                      <option value="2" <?php if($hireda==2) { echo 'selected=selected'; } ?>>Professional</option>
                                    </select>

                                    <!-- <select name="hireda" class="form-control" onChange="showDiv(this.value);" style="<?php echo $errorStyleHireda;?>">
                                      <option value="">--Select--</option>
                                     <option value="1" <?php if($hireda==1) { echo 'selected=selected'; } ?>>Team</option>
                                      <option value="2" <?php if($hireda==2) { echo 'selected=selected'; } ?>>Professional</option>
                                    </select> -->
                                </div>
                               
                                             
                            
        
                            <?php

                            if(form_error('team_category')){
                              echo 'yes';
                                  $errorStyleTeamCategory="border:1px solid red";
                              }else{
                                  $errorStyleTeamCategory="";
                              }

                            if($hireda==1){
                              $style="display:block";
                            }else{
                              $style="display:none";
                            }?>
                            <div id="showTeamCat" style="<?php echo $style;?>">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="first-name">Category <span class="required">*</span></label>
                                <select name="team_category" class="form-control" style="<?php echo $errorStyleTeamCategory;?>">
                                    <option value="0">--Select Category--</option>
                                    <?php foreach($categoryTeamList as $row){
                                      echo '<option value="'.$row->id.'" '.($categoryTeam== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
                                    }?>
                                  </select>
                                  <span style="color:red;"><?php echo form_error('team_category');?></span>
                              </div>
                            </div>
        
                            <?php

                            if(form_error('category')){
                                  $errorStyleCategory="border:1px solid red";
                            }else{
                                $errorStyleCategory="";
                            }

                            if($hireda==2){
                              $style1="display:block";
                            }else{
                              $style1="display:block";
                            }?>
                            <div id="showCat" style="<?php echo $style1;?>">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="first-name">Category <span class="required">*</span></label>
                                  <select name="category" style="<?php echo $errorStyleCategory;?>" onChange="getSubCategoriesByParentId(this.value);">
                                    <option value="0">-- Select Category --</option>
                                    <?php foreach($categoryList as $row){
                                      echo '<option value="'.$row->id.'" '.($category== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
                                    }?>
                                  </select>
                                  <span style="color:red;"><?php echo form_error('category');?></span>
                              </div>
                            <?php 
                            if(form_error('sub_category')){
                                  $errorStyleSubCategory="border:1px solid red";
                            }else{
                                $errorStyleSubCategory="";
                            }?>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="first-name">What Services do you want ? <span class="required">*</span></label>
                                  <select name="sub_category" class="form-control" id="sub_category" style="<?php echo $errorStyleSubCategory;?>">
                                    <?php echo $subCategoryOptionsList;?>
        
                                  </select>
                                  <span style="color:red;"><?php echo form_error('sub_category');?></span>
                              </div>
                            </div>
                              <?php
                                if(($quotation_id && $category==1)|| (validation_errors() && $this->input->post('category')==1)){
                                    $style = 'display:block;';
                                }else{
                                    $style = 'display:none;';
                                }
                              ?>
                              <div class="col-md-4 col-sm-4 col-xs-12" id="software" style="<?php echo $style;?>">
                                <label class="" for="first-name">Accounting Software Used <span class="required">*</span></label>
                               
                                  <input type="text" id="software_used" name="software_used"  class="" value="<?php echo @$software_used;?>">
                                
                              </div>
                              <?php //if($this->session->userdata('admin_user_type')==3){?>
                              <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="first-name">Business Turnover <span class="required">*</span></label>
                                <input type="text" id="turnover" name="turnover" required class="" value="<?php echo $turnover;?>">
                              </div> -->
                              <?php //} ?>
                            </div>
                            <div class="row form-group">
                              <?php 
                            if(form_error('project_name')){
                                  $errorStyleProjectName="border:1px solid red";
                            }else{
                                $errorStyleProjectName="";
                            }?>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Project Name* </label>
                                <input type="text" name="project_name" id="project_name" value="<?php echo $project_name;?>" style="<?php echo $errorStyleProjectName;?>">
                                <span style="color:red;"><?php echo form_error('project_name');?></span>
                              </div>

                              <?php 
                            if(form_error('type_of_project')){
                                  $errorStyletype_of_project="border:1px solid red";
                            }else{
                                $errorStyletype_of_project="";
                            }?>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Type of Project * </label>
                                <select name="type_of_project" id="type_of_project" class="form-control" style="<?php echo $errorStyletype_of_project;?>">
                                    <option value="">Type of Project</option>
                                    <option value="1" <?php if($type_of_project=='1'){ echo 'selected';};?>>Ongoing</option>
                                    <option value="0" <?php if($type_of_project=='0'){ echo 'selected';};?>>Onetime</option>
                                  </select>
                                  <span style="color:red;"><?php echo form_error('type_of_project');?></span>
                              </div>
                            </div>
                            
                            <?php 
                            if(form_error('work_detail')){
                                  $errorStylework_detail="border:1px solid red !important";
                            }else{
                                $errorStylework_detail="";
                            }?>
                            <div class="row form-group">  
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <label class="" for="first-name">Project Details <span class="required">*</span></label>
                                <textarea class="form-control" name="work_detail" style="<?php echo $errorStylework_detail; ?>"><?php echo $work_detail;?></textarea>
                                 <span style="color:red;"><?php echo form_error('work_detail');?></span>
                              </div>
                            </div>
        
                              
                            <?php 
                            if(form_error('hiretype')){
                                  $errorStylehiretype="border:1px solid red";
                            }else{
                                $errorStylehiretype="";
                            }?>

                            <div class="row form-group">  
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="email">Hire * </label>
                                <select name="hiretype" id="hiretype" style="<?php echo $errorStylehiretype;?>">
                                    <option value="">Hire  *</option>
                                    <option value="contract" <?php if($hiretype=='contract'){ echo 'selected';};?> >Contract work</option>
                                    <option value="project" <?php if($hiretype=='project'){ echo 'selected';};?>>Project Work</option>
                                  </select>
                                <span style="color:red;"><?php echo form_error('hiretype');?></span>
                              </div>
        
        
                            <?php 
                            if(form_error('prefered_mode')){
                                  $errorStyleprefered_mode="border:1px solid red";
                            }else{
                                $errorStyleprefered_mode="";
                            }?>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="email">Prefered Mode Of Consultant *  </label>
                                <select name="prefered_mode" id="prefered_mode" style="<?php echo $errorStyleprefered_mode;?>">
                                    <option value="">Prefered Mode</option>
                                    <option value="1" <?php if($prefered_mode=='1'){ echo 'selected';};?>>Onsite</option>
                                    <option value="0" <?php if($prefered_mode=='0'){ echo 'selected';};?>>Offsite</option>
                                  </select>
                                  <span style="color:red;"><?php echo form_error('prefered_mode');?></span>
                              </div>
                              
                               <?php 
                            if(form_error('no_of_hours')){
                                  $errorStyleno_of_hours="border:1px solid red";
                            }else{
                                $errorStyleno_of_hours="";
                            }?>

                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="email">Number of hours required *</label>
                                <select name="no_of_hours" id="no_of_hours" style="<?php echo $errorStyleno_of_hours;?> ">
                                    <option value="">Number of Hours Required</option>
                                    <option value="10" <?php if($no_of_hours=='10'){ echo 'selected';};?> >0-10</option>
                                    <option value="25" <?php if($no_of_hours=='25'){ echo 'selected';};?>>10-25</option>
                                    <option value="35" <?php if($no_of_hours=='35'){ echo 'selected';};?>>25-35</option>
                                    <option value="45" <?php if($no_of_hours=='45'){ echo 'selected';};?>>35-45</option>
                                    <option value="46" <?php if($no_of_hours=='46'){ echo 'selected';};?>>45+</option>
                                  </select>
                                  <span style="color:red;"><?php echo form_error('no_of_hours');?></span>
                              </div>
                            </div>
        
                            <div class="row form-group">  
                              
                               <?php 
                            if(form_error('bidamounthire')){
                                  $errorStylebidamounthire="border:1px solid red";
                            }else{
                                $errorStylebidamounthire="";
                            }?>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Budget for the Project (AUD) *  </label>
                                <input type="text" class="form-control numeric" name="bidamounthire" id="bidamounthire" placeholder="Budget Amount" value="<?php echo $bidamounthire;?>">
                                  <span style="color:red;"><?php echo form_error('bidamounthire');?></span>
                                  <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>

                              </div>
                              
                               <?php 
                            if(form_error('paytype')){
                                  $errorStylepaytype="border:1px solid red";
                            }else{
                                $errorStylepaytype="";
                            }?>

                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Payment Option *  </label>
                                <select  name="paytype" id="paytype" style="<?php echo $errorStylepaytype;?>">
                                    <option value="">Select Payment Option *</option>
                                    <option value="hourly" <?php if($paytype=='hourly'){ echo 'selected';};?> >Hourly</option>
                                    <option value="daily" <?php if($paytype=='daily'){ echo 'selected';};?>>Daily</option>
                                    <option value="weekly" <?php if($paytype=='weekly'){ echo 'selected';};?>>Weekly</option>
                                    <option value="monthly" <?php if($paytype=='monthly'){ echo 'selected';};?>>Monthly</option>
                                    <option value="fixed" <?php if($paytype=='fixed'){ echo 'selected';};?>>Fixed</option>
                                  </select>
                                  <span style="color:red;"><?php echo form_error('paytype');?></span>
                              </div>
                            </div>
        
                            <div class="row form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <label class="" for="email">Additional Comment </label>
                                <textarea class="" id="comment" name="comment"><?php echo $comment;?></textarea>
                              </div>
                            </div>
        
                            <div class="row form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Do you want company name to be select?  </label>
                                <select name="confedential" id="confedential" class="">
                                    <option value="">Confidential</option>
                                    <option value="1" <?php if($confedential=='1'){ echo 'selected';};?>>Yes</option>
                                    <option value="0" <?php if($confedential=='0'){ echo 'selected';};?>>No</option>
        
                                  </select>
                              </div>
                              <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Your Location <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" id="location" name="location" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $location;?>">
                                </div>
                              </div> -->
        
                              <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Do You want to get quotes globally?  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="radio" class="flat" name="quotes_globally" value="1" <?php if($quotes_globally ==1 ){echo 'checked';} ?>>Yes
                                  <input type="radio" class="flat" name="quotes_globally" value="0" <?php if($quotes_globally ==0 ){echo 'checked';} ?>>No
                                </div>
                              </div> -->
        
        
        
                              
                              <div class="col-md-12">
                                <div class="profo_edi_sub">
                                  <input type="submit" class="" value="<?php echo $submit_btn_value; ?>">
                                </div>
                              </div>
        
                            </form>
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

<script>
function showDiv(hireda){
    if(hireda==1){
      $("#showTeamCat").show();
      $("#showCat").hide();
    }else{
      $("#showTeamCat").hide();
      $("#showCat").show();
    }
}
  function getSubCategoriesByParentId(categoryId){
    //alert(categoryId);
    if(categoryId){
      if(categoryId==1){
        $("#software").show();
      }else{
        $("#software").hide();
        $("#software_used").val('');
      }

      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/quotation/getSubCategoriesByParentId",
        data:{categoryId:categoryId},
        success: function(data){
          $("#sub_category").html(data);
        }
      });

    }
  }
</script>
