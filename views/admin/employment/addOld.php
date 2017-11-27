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
                    <h2>Employment <?php  echo 'Add'; ?></h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <span style="color:red;"><?php echo validation_errors(); ?></span>
                      <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                    echo form_open_multipart($action,$attributes); ?>
                    	
                        <div class="profile_form_update edu_update01">
                        
                        	<div class="row form-group">
                            	<div class="col-md-4 col-sm-4 col-xs-12">
                                	<label class="" for="first-name">Organisation Name<span class="required">*</span></label>
                                	<input type="text" id="EmployerOrgName" name="EmployerOrgName" placeholder="Organisation Name" required class="" value="<?php echo $EmployerOrgName;?>">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                	<label class="" for="first-name">Current Employer<span class="required">*</span></label>
                                	<select name="CurrentEmplyor" class="form-control" >
                                       <option value="True" <?php if($CurrentEmplyor=='True'){ echo 'selected'; } ?>>Yes</option>
                                       <option value="False" <?php if($CurrentEmplyor=='False'){ echo 'selected'; } ?>>No</option>
                                     </select>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                	<label class="" for="first-name">Job Title<span class="required">*</span></label>
                                	<input type="text" id="Title" name="Title" placeholder="Job Title" required class="" value="<?php echo $Title;?>">
                                </div>
                            </div>
                            
                            <div class="row form-group">
                            	<div class="col-md-4 col-sm-4 col-xs-12">
                                	<label class="" for="first-name">Employment Description</label>
                                    <textarea class="" row="10" cols="5" name="Description" placeholder="Education Description"><?php echo $Description;?></textarea>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                	<label class="" for="first-name">Start Date<span class="required">*</span></label>
                                    <input type="text" id="single_cal1" name="startdate" required class="" value="<?php echo $startdate;?>">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                	<label class="" for="first-name">End Date<span class="required">*</span></label>
                                    <input type="text" id="single_cal4" name="endDate" required class="" value="<?php echo $endDate;?>">
                                </div>
                            </div>
                        
                       
                      <div class="row form-group">
                        <div class="profo_edi_sub">
                          <input type="submit" class="" value="<?php echo $submit_btn_value; ?>">
                        </div>
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
