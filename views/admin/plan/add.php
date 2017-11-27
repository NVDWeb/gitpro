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
                    <h2>Plan <?php if($plan_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
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
                    
                    <input type="hidden" name="plan_id" value="<?php echo $plan_id;?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan Name<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" id="plan_name" name="plan_name" required class="form-control col-md-6 col-xs-6" value="<?php echo $plan_name;?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Support <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" id="email_support" name="email_support" required class="form-control col-md-6 col-xs-6" value="<?php echo $email_support;?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Social Login <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="social_login" <?php if($social_login !='' && $social_login==1){ echo 'checked=checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="social_login" <?php if($social_login !='' && $social_login==0){ echo 'checked=checked';} ?>>No
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Number of booking<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" id="no_of_booking" name="no_of_booking" required class="form-control col-md-6 col-xs-6" value="<?php echo $no_of_booking;?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Number of free Quotes<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" id="no_of_free_quotes" name="no_of_free_quotes" required class="form-control col-md-6 col-xs-6" value="<?php echo $no_of_free_quotes;?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Document Upload<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" id="document_upload" name="document_upload" required class="form-control col-md-7 col-xs-12" value="<?php echo $document_upload;?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Access to Blog<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="access_to_blog" <?php if($access_to_blog !='' && $access_to_blog==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="access_to_blog" <?php if($access_to_blog !='' && $access_to_blog==0){ echo 'checked';} ?>>No
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Front Page Listed Business<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="front_page_listed_business" <?php if($front_page_listed_business !='' && $front_page_listed_business==1){ echo 'checked';} ?> >Yes
                          <input class="flat"  type="radio" value="0" name="front_page_listed_business" <?php if($front_page_listed_business !='' &&  $front_page_listed_business==0){ echo 'checked';} ?>>No
                        </div>
                      </div>    

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Access to create Coupon<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="access_to_create_coupons" <?php if($access_to_create_coupons !='' &&  $access_to_create_coupons==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="access_to_create_coupons" <?php if($access_to_create_coupons !='' && $access_to_create_coupons==0){ echo 'checked';} ?>>No
                        </div>
                      </div> -->   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SEO Optimization<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="seo_optimization" <?php if($seo_optimization !='' && $seo_optimization==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="seo_optimization" <?php if($seo_optimization !='' && $seo_optimization==0){ echo 'checked';} ?>>No
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Keywords Optimization<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="meta_keyword_optimization" <?php if($meta_keyword_optimization !='' && $meta_keyword_optimization==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="meta_keyword_optimization" <?php if($meta_keyword_optimization !='' && $meta_keyword_optimization==0){ echo 'checked';} ?>>No
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Social Media Marketing <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="social_media_marketing" <?php if($social_media_marketing !='' && $social_media_marketing==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="social_media_marketing" <?php if($social_media_marketing !='' && $social_media_marketing==0){ echo 'checked';} ?>>No
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email Reminders For Clients<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="email_reminders" <?php if($email_reminders !='' && $email_reminders==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="email_reminders" <?php if($email_reminders !='' && $email_reminders==0){ echo 'checked';} ?>>No
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Access To Block Certain Dates<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="block_certain_dates" <?php if($block_certain_dates !='' && $block_certain_dates==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="block_certain_dates" <?php if($block_certain_dates !='' && $block_certain_dates==0){ echo 'checked';} ?>>No
                        </div>
                      </div>  -->

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Access To Special Price For Certain Dates<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="special_price_certain_dates" <?php if($special_price_certain_dates !='' && $special_price_certain_dates==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="special_price_certain_dates" <?php if($special_price_certain_dates !='' && $special_price_certain_dates==0){ echo 'checked';} ?>>No
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dedicated Account Manager<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="dedicated_accout_manager" <?php if($dedicated_accout_manager !='' && $dedicated_accout_manager==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="dedicated_accout_manager" <?php if($dedicated_accout_manager !='' && $dedicated_accout_manager==0){ echo 'checked';} ?>>No
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">API Integration On Your Website To Link The Business<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="api_integration" <?php if($api_integration !='' && $api_integration==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="api_integration" <?php if($api_integration !='' && $api_integration==0){ echo 'checked';} ?>>No
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Billed Monthly
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" id="billed_monthly" name="billed_monthly" class="form-control col-md-6 col-xs-6" value="<?php echo $billed_monthly;?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Billed Annually
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" id="billed_annually" name="billed_annually"  class="form-control col-md-6 col-xs-6" value="<?php echo $billed_annually;?>">
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video Chat Enabled
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input class="flat"  type="radio" value="1" name="video_chat" <?php if($video_chat !='' && $video_chat==1){ echo 'checked';} ?>>Yes
                          <input class="flat"  type="radio" value="0" name="video_chat" <?php if($video_chat !='' && $video_chat==0){ echo 'checked';} ?>>No
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

        