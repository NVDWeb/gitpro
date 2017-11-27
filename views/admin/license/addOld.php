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
                            <h2>License And Certificate <?php  echo 'Add'; ?></h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                          	<div class="profile_form_update edu_update01">
                            <span style="color:red;"><?php echo validation_errors(); ?></span>
                              <?php
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>
                            
                              <div class="row form-group">
                              		<div class="col-md-8 col-sm-8 col-xs-12">
                                    	<label class="" for="License">License And Certificate</label>
                                        <textarea class="" row="10" cols="5" name="License" placeholder="License And Certificate"></textarea>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    	<div class="profo_edi_sub">
                                        	<label class="" for="">&nbsp;</label>
                                          <input type="submit" class="btn btn-success" value="<?php echo $submit_btn_value; ?>">
                                        </div>
                                    </div>
                                
                                
                              </div>
        
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                
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
