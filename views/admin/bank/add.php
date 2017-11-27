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
                            <h2>Bank Account <?php if($bank_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>                            
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <div class="profile_form_update edu_update01">
                            <span style="color:red;"><?php echo validation_errors(); ?></span>
        
                            <?php
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>
        
                            <input type="hidden" name="bank_id" value="<?php echo $bank_id;?>">
                              <div class="row form-group">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label for="first-name">Bank Name<span class="required">*</span></label>
                                  <input type="text" id="bank_name" name="bank_name" required value="<?php echo $bank_name;?>">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label for="first-name">Bank State Branch (BSB)<span class="required">*</span></label>
                                    <input type="text" id="bsb" name="bsb" required value="<?php echo $bsb;?>">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label for="first-name">Account Number<span class="required">*</span></label>
                                  <input type="text" id="account_no" name="account_no" required value="<?php echo $account_no;?>">
                                </div>
                              </div>
        
                             
                              <div class="row form-group">
                                <div class="profo_edi_sub">
                                  <input type="submit" value="<?php echo $submit_btn_value; ?>">
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
