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
                    <h2>Service <?php if($service_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
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
                    
                    <input type="hidden" name="service_id" value="<?php echo $service_id;?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Select</label>
                          <div class="col-md-3 col-sm-3 col-xs-6">
                            <select class="form-control" id="category_id" name="category_id" required="required" onChange="getSubCategory(this.value);">
                            <option value="">Choose option</option>
                            <?php foreach($categoryDetails as $row){
                                echo '<option data-id="'.$row->id.'" value="'.$row->id.'" '.($parent_id== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
                              }?>
                            </select>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Select</label>
                          <div class="col-md-3 col-sm-3 col-xs-6" id="subCategory">
                              <select class="form-control" id="category_id" name="category_id" required="required">
                              <option value="">Choose option</option>
                              </select>
                          </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Name <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <input type="text" id="clinic_name" name="service_name" required class="form-control col-md-7 col-xs-12" value="<?php echo $service_name;?>">
                        </div>
                      </div>
                      <?php if(isset($image)){
                          ?>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Image 
                        </label>
                        
                          <div class="col-md-3 col-sm-3 col-xs-6">
                          <img src="<?php echo base_url();?>uploads/services/<?php echo $image;?>">
                          </div>
                          
                      </div>
                      <?php
                          }?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Update Service Image <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <input type="file" id="image" name="image"  class="form-control col-md-7 col-xs-12">
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

        