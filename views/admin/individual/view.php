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
                            <h2>Individual User</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                                                   
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <?php //echo '<pre>';print_r($individualDetail); die;				  
                            if($individualDetail[0]->organization_type =='govt'){
                                 $organization_type = 'Govt Firm';					
                                }elseif($individualDetail[0]->organization_type =='it'){
                                    $organization_type = 'IT Firm';
                                }elseif($individualDetail[0]->organization_type =='industry'){
                                    $organization_type = 'Industry';
                                }else{
                                    $organization_type ='';
                                }
                                
                                 if($individualDetail[0]->industry_type =='govt'){
                                 $industry_type = 'Govt Firm';					
                                }elseif($individualDetail[0]->industry_type =='it'){
                                    $industry_type = 'IT Firm';
                                }elseif($individualDetail[0]->industry_type =='industry'){
                                    $industry_type = 'Industry';
                                }else{
                                    $industry_type ="";
                                }
                          ?>
                          <div class="x_content">                   	
                            <div  id="updateFormDiv">                      
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">First name*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="first_name" name="first_name" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->name)) { echo $individualDetail[0]->name; } ?>">
                                </div>
                              </div>
                             
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Last name*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="client_last_name" name="client_last_name" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->last_name)) { echo $individualDetail[0]->last_name; } ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="email" name="email" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->email)) {  echo $individualDetail[0]->email; }?>" disabled="disabled">
                                </div>
                              </div>                      
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Business Registration Number*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="business_registration_number" name="business_registration_number" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->business_registration_number)) {  echo $individualDetail[0]->business_registration_number; }?>" >
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Company Name*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="company_name" name="company_name" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->company_name)) {  echo $individualDetail[0]->company_name; }?>" >
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Role at Company*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="designation" name="designation" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->designation)) {  echo $individualDetail[0]->designation; }?>" >
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Organization Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="designation" name="designation" required class="form-control col-md-7 col-xs-12" value="<?php echo $organization_type;?>" >
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Number of employees*</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">                          
                                   <input type="text" id="designation" name="designation" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->no_of_employee)) {  echo $individualDetail[0]->no_of_employee; }?>" >
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Industry Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input type="text" id="designation" name="designation" required class="form-control col-md-7 col-xs-12" value="<?php echo $industry_type;?>" >      
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Company Location</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="location" name="location" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->location)) {  echo $individualDetail[0]->location; }?>" >
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Web URl</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="web_url" name="web_url" required class="form-control col-md-7 col-xs-12" value="<?php if(isset($individualDetail[0]->web_url)) {  echo $individualDetail[0]->web_url; }?>" >
                                </div>
                              </div>
                    </div> 
        
                            
                          </div>
                          
                          <?php echo ($individualDetail[0]->verified==0 ? '<a id="verified_'.$individualDetail[0]->id.'" href="javascript:void(0);" onclick="updateStatus('.$individualDetail[0]->id.',1);" title="Click to Activate Account" class="btn btn-primary">Verify Account</a>':'<a id="verified_'.$individualDetail[0]->id.'" href="javascript:void(0);" class="btn btn-success">Verified</a>');?>
                          
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
function updateStatus(individualId,verified){
  alert(individualId);alert(verified);
  if(individualId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/individual/verified",
      data:{individualId:individualId,verified:verified},
      success:function(data){
        location.reload();
        /*if(data==0){
          $("#status_"+businessId).html('Inactive');
        }else{
          $("#status_"+businessId).html('Active');
        }
        window.reload();*/
        
      }
    });
  }

}

</script>        