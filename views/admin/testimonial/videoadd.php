  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- sidebar menu -->
            <?php $this->load->view('admin/left-sidebar');?>
            <!-- /sidebar menu -->

            

        <!-- top navigation -->
        <?php $this->load->view('admin/top-navigation');?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Video Testimonial <?php if($testimonial_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
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
                    
                    <input type="hidden" name="testimonial_id" value="<?php echo $testimonial_id;?>">
                      <?php if($testimonial_id && $url){?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video<span class="required"></span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <iframe title="YouTube video player" class="youtube-player" type="text/html" 
                            width="500" height="200" src="<?php echo $url;?>"
                            frameborder="0" allowFullScreen></iframe>
                        </div>
                      </div>
                  <?php }?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Embeded URL<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <input type="text" id="clinic_name" name="url" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $url;?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <textarea class="form-control" rows="3" name="description"><?php echo $description;?></textarea>
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
        <!-- /page content -->
<script>
  
    function getSubCategory(parent_id){
      //alert(parent_id);
      if(parent_id){
        $.ajax({
          type:"POST",
          url: "<?php echo base_url();?>admin/services/getCategoryByParentId",
          data: {parent_id: parent_id},
            success: function(data) {
                $("#subCategory").html(data);
            }
        });
      }
    }

    $(window).load(function(){
      var parent_id = $( "#category_id" ).val();
      if(parent_id){
        $.ajax({
          type:"POST",
          url: "<?php echo base_url();?>admin/services/getCategoryByParentId",
          data: {parent_id: parent_id},
            success: function(data) {
                $("#subCategory").html(data);
            }
        });
      }
    });
  
</script>

        