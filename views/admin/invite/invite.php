  <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
  <script>
  	$(function(){
	  new Clipboard('.copy-text');
	});
  </script>
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
                            <h2>Invite Friends </h2>                            
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                          	<div class="profile_form_update edu_update01 lead_box">
                            <span style="color:red;"><?php echo validation_errors(); ?></span>
        
                            <?php
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>  
                            
                            <div class="refer_01">
                            	<div class="row">
                                	<div class="col-md-12">
                                    	<div class="refer_head2">
                                            <h2>Invite your friends and earn $35!</h2>
                                            <p>You will now earn $35 each time you invite a friend and they start their first project on PROYOURWAY*. Plus you get a cool badge for your profile, and your friend will get a $35 discount voucher too – it’s a win-win !</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                	<div class="refer_by_email">
                                    	<label class="" for="first-name">Invite by email <span class="required">*</span></label>
                                        <input type="text"placeholder="Friends Email"><?php echo $member_email;?>
                                        <textarea class=""  placeholder="Message"></textarea>
                                        <input type="submit" class="" value="<?php echo $submit_btn_value; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                	<div class="refer_by_link">
                                    	<label class="" for="first-name">Invite by link <span class="required">*</span></label>
                                        <div class="invite_copy">
                                        	<span>Short URL : </span> <div id="content">https://www.proyourway.com/</div><a class="copy-text" data-clipboard-target="#content" href="#">Copy</a>
                                        </div>                                        
                                    </div>
                                    <div class="refer_by_link">
                                    	<label class="" for="first-name">Invite by Social <span class="required">*</span></label>
                                        <div class="invite_socail">
                                        	<ul>
                                                <li><a href="https://www.facebook.com/proyourway/" target="_blank"><img src="https://www.proyourway.com/beta/assets/common/images/facebook0061.png"></a></li>
                                                <li><a href="https://twitter.com/proyourway" target="_blank"><img src="https://www.proyourway.com/beta/assets/common/images/twitter0062.png"></a></li>
                                                <li><a href="https://www.linkedin.com/company-beta/17951491/" target="_blank"><img src="https://www.proyourway.com/beta/assets/common/images/linkdin_0064.png"></a></li>
                                                <li><a href="https://plus.google.com/collection/g1rVmB" target="_blank"><img src="https://www.proyourway.com/beta/assets/common/images/google_plus0063.png"></a></li>
                                             </ul>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                	<div class="refer_image">
                                    	<img src="<?php echo base_url();?>admin-assets/images/refer_image01.jpg">
                                    </div>
                                </div>
                                
                            </div>
                            
                                                 
                                <div class="form-group">
                                  
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                    
                                  </div>
                                </div>            
                            <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  
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
