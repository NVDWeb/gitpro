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
                            <h2>Profile <?php if($doctor_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                                                   
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <span style="color:red;"><?php echo validation_errors(); ?></span>
        
                            <?php 
                            //print_r($postServices);
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>
                            
                            <input type="hidden" name="doctor_id" value="<?php echo $doctor_id;?>">
                              
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Select Categories</label>
                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                    
                                    <?php $i=0;
                                    foreach($categoryList as $category){
                                      
                                    ?>
                                    <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="category[]" class="flat" value="<?php echo $category->id;?>" <?php if(in_array($category->id, $postCategory[$i])){ echo 'checked="checked"'; }?>><?php echo $category->category_name;?>
                                   
                                    </label>
                                  </div>
                                   <?php } $i++;?>
                                  </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Select Services</label>
                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                    
                                    <?php $i=0;
                                      foreach($servicesList as $service){
                                      ?>
                                      <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="services[]" class="flat" value="<?php echo $service->id;?>" <?php if(in_array($service->id, $postServices[$i])){ echo 'checked="checked"'; }?>><?php echo $service->service_name;?>
                                   
                                    </label>
                                  </div>
                                   <?php } $i++;?>
                                  </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Select Hospital</label>
                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                   
                                    <?php $i=0;
                                    foreach($hospitalList as $hospital){
                                      
                                    ?>
                                     <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="hospital[]" class="flat" value="<?php echo $hospital->id;?>" <?php if(in_array($hospital->id, $postHospital[$i])){ echo 'checked="checked"'; }?>><?php echo $hospital->hospital_name;?>
                                   
                                    </label>
                                  </div>
                                   <?php } $i++;?>
                                  </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Select Clinic</label>
                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                    
                                    
                                    <?php $i=0;
                                    foreach($clinicList as $clinic){
                                      
                                    ?>
                                    <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="clinic[]" class="flat" value="<?php echo $clinic->id;?>" <?php if(in_array($clinic->id, $postClinic[$i])){ echo 'checked="checked"'; }?>><?php echo $clinic->clinic_name;?>
                                    
                                    </label>
                                  </div>
                                  <?php } $i++;?>
                                  </div>
                              </div>
        
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <input type="text" id="first_name" name="first_name" required class="form-control col-md-7 col-xs-12" value="<?php echo $first_name;?>">
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <input type="text" id="last_name" name="last_name" required class="form-control col-md-7 col-xs-12" value="<?php echo $last_name;?>">
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <input type="text" id="email" name="email" required class="form-control col-md-7 col-xs-12" value="<?php echo $email;?>">
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile<span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <input type="text" id="mobile" name="mobile" required class="form-control col-md-7 col-xs-12" value="<?php echo $mobile;?>">
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone<span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <input type="text" id="phone" name="phone" required class="form-control col-md-7 col-xs-12" value="<?php echo $phone;?>">
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address<span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                <textarea id="address" name="address" required class="form-control col-md-7 col-xs-12"><?php echo $address;?></textarea>
                                  
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Select</label>
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                    <select class="form-control" id="state" name="state" required="required" onChange="getCityByState(this.value);">
                                       <?php echo $stateOptionList; ?>
        
        
                                    <!-- <option value="">Choose option</option>
                                    <?php foreach($stateList as $row){
                                        echo '<option data-id="'.$row->state.'" value="'.$row->state.'" '.($state== $row->state ? "selected" : '').'>'.$row->state.'</option>';
                                      }?> -->
                                    </select>
                                  </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Select</label>
                                  <div class="col-md-3 col-sm-3 col-xs-6" id="city">
                                      <select class="form-control" id="city" name="city" required="required">
                                     <?php echo $cityOptionList; ?>
                                      </select>
                                  </div>
                              </div>
        
        
                              <?php if(isset($image)){
                                  ?>
                               <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Profile Image 
                                </label>
                                
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                  <img src="<?php echo base_url();?>uploads/doctors/<?php echo $image;?>">
                                  </div>
                                  
                              </div>
                              <?php
                                  }?>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Update Profile Image <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <input type="file" id="image" name="image"  class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
        
                             
                                               
                              
                              
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <input type="submit" class="btn btn-success" value="<?php echo $submit_btn_value; ?>">
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
        <!-- /page content -->
<script>
  
    function getCityByState(state){
      //alert(state);
      if(state){
        $.ajax({
          type:"POST",
          url: "<?php echo base_url();?>admin/profile/getCityByState",
          data: {state: state},
            success: function(data) {
                $("#city").html(data);
            }
        });
      }
    }

    /*$(window).load(function(){
      var parent_id = $( "#state" ).val();
      if(parent_id){
        $.ajax({
          type:"POST",
          url: "<?php echo base_url();?>admin/doctors/getCityByState",
          data: {parent_id: parent_id},
            success: function(data) {
                $("#city").html(data);
            }
        });
      }
    });*/
  
</script>

        