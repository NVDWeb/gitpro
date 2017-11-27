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
                    <h2>Card <?php if($card_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="profile_form_update edu_update01">
                    <span style="color:red;"><?php echo validation_errors(); ?></span>

                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                    echo form_open_multipart($action,$attributes); ?>

                    <input type="hidden" name="card_id" value="<?php echo $card_id;?>">
                      <div class="row form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="first-name">Card Type<span class="required">*</span></label>
                          <select name="card_type" id="card_type">
                              <option value="">Select Card Type</option>
                              <option value="1" <?php if($card_type==1){ echo 'selected';}?>>Visa Card</option>
                              <option value="2" <?php if($card_type==2){ echo 'selected';}?>>Master Card</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="first-name">Card Holder Name<span class="required">*</span></label>
                          <input type="text" id="card_holder_name" name="card_holder_name" required class="form-control col-md-6 col-xs-6" value="<?php echo $card_holder_name;?>">
                        </div>
                      </div>


                      <div class="row form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="first-name">Card Number<span class="required">*</span></label>
                          <input type="text" id="card_no" name="card_no" required value="<?php echo $card_no;?>">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="first-name">CCV Number<span class="required">*</span></label>
                          <input type="text" id="ccv" name="ccv" required value="<?php echo $ccv;?>">
                        </div>
                      </div>

                      
                      <div class="row form-group">
                        <div class="profo_edi_sub">
                          <input type="submit"   value="<?php echo $submit_btn_value; ?>">
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
