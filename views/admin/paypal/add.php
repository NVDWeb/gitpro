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
                            <h2>Paypal Account <?php if($paypal_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>                            
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <div class="profile_form_update edu_update01">
                            <span style="color:red;"><?php echo validation_errors(); ?></span>        
                            <?php
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>
        
                            <input type="hidden" name="paypal_id" value="<?php echo $paypal_id;?>">
                              <div class="row form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label for="first-name">Paypal Account Business Email<span class="required">*</span></label>
                                  <input type="text" id="paypal_email" name="paypal_email" required  value="<?php echo $paypal_email;?>">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label> <br></label>
                                  <div class="profo_edi_sub">
                                    <input type="submit" value="<?php echo $submit_btn_value; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row form-group">
                                
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
