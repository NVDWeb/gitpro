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
                            <h2>Quotation <?php if($quotation_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
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
                            
                            <input type="hidden" name="quotation_id" value="<?php echo $quotation_id;?>">
                              
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Category <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <select name="category" class="form-control" onChange="getSubCategoriesByParentId(this.value);" required>
                                    <option>--Select Category--</option>
                                    <?php foreach($categoryList as $row){
                                      echo '<option value="'.$row->id.'" '.($category== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
                                    }?>
                                  </select>
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Sub Category <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <select name="sub_category" class="form-control" id="sub_category" required>
                                    <?php echo $subCategoryOptionsList;?>
                                      
                                  </select>
                                </div>
                              </div>
        
                              <?php
                                if(($quotation_id && $category==3)|| (validation_errors() && $this->input->post('category')==3)){
                                    $style = 'display:block;';
                                }else{
                                    $style = 'display:none;';
                                }
                              ?>
                              <div class="form-group" id="software" style="<?php echo $style;?>">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Accounting Software Used <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" id="software_used" name="software_used"  class="form-control col-md-7 col-xs-12" value="<?php echo @$software_used;?>">
                                </div>
                              </div>
                              <?php if($this->session->userdata('admin_user_type')==2){?>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Turnover <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" id="turnover" name="turnover" required class="form-control col-md-7 col-xs-12" value="<?php echo $turnover;?>">
                                </div>
                              </div>
                              <?php } ?>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Work Details <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <textarea class="form-control" name="work_detail"><?php echo $work_detail;?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Your Location <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                  <input type="text" id="location" name="location" required class="form-control col-md-7 col-xs-12" value="<?php echo $location;?>">
                                </div>
                              </div>
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Do You want to get quotes globally?  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="radio" class="flat" name="quotes_globally" value="1" <?php if($quotes_globally ==1 ){echo 'checked';} ?>>Yes
                                  <input type="radio" class="flat" name="quotes_globally" value="0" <?php if($quotes_globally ==0 ){echo 'checked';} ?>>No
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
  function getSubCategoriesByParentId(categoryId){
    //alert(categoryId);
    if(categoryId){
      if(categoryId==3){
        $("#software").show();
      }else{
        $("#software").hide();
        $("#software_used").val('');
      }

      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/quotation/getSubCategoriesByParentId",
        data:{categoryId:categoryId},
        success: function(data){
          $("#sub_category").html(data);
        }
      });

    }
  }
</script>       