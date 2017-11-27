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
                            <h2>Individual User <?php if($individual_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
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
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>
                            
                            <input type="hidden" name="individual_id" value="<?php echo $individual_id;?>">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="name" name="name" required class="form-control col-md-7 col-xs-12" value="<?php echo $name;?>">
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="email" name="email" required class="form-control col-md-7 col-xs-12" value="<?php echo $email;?>" <?php if($individual_id){ echo 'disabled'; } ?>>
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="mobile" name="mobile" required class="form-control col-md-7 col-xs-12" value="<?php echo $mobile;?>">
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

        