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
                            <h2>Sub Category <?php if($category_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
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
                            
                            <input type="hidden" name="category_id" value="<?php echo $category_id;?>">
                              
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Select</label>
                                  <div class="col-md-3 col-sm-3 col-xs-6">
                                    <select class="form-control" name="parent_id" required="required">
                                    <option value="">Choose option</option>
                                    <?php foreach($categoryDetail as $row){
                                        echo '<option value="'.$row->id.'" '.($parent_id== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
                                      }?>
                                    </select>
                                  </div>
                              </div>
        
        
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Name <span class="required">*</span>
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <input type="text" id="category_name" name="category_name" required class="form-control col-md-7 col-xs-12" value="<?php echo $category_name;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Title
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="meta_title" name="meta_title" class="form-control col-md-7 col-xs-12" value="<?php echo $meta_title;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Keywords
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="meta_keys" name="meta_keys" class="form-control col-md-7 col-xs-12" value="<?php echo $meta_keys;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Meta Description
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea  id="meta_des" name="meta_des" class="form-control col-md-7 col-xs-12"><?php echo $meta_des;?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contents
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea  id="contents" name="contents" class="form-control col-md-7 col-xs-12"><?php echo $contents;?></textarea>
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

        