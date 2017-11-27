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
                              <h2>Assign project to a team</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
            
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <?php if($team_list){ ?>
                                <span style="color:red;"><?php echo validation_errors(); ?></span>
                                <?php
                                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                                echo form_open_multipart($action,$attributes); ?>
            
                                <input type="hidden" name="quotation_id" value="<?php echo $quotation_id;?>">
            
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Select Team<span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                      <select name="team_id" class="form-control" onChange="">
                                        <option value="">--Select Team--</option>
                                        <?php foreach($team_list as $row){
                                          echo '<option value="'.$row->id.'" '.($team_id== $row->id ? "selected" : '').'>'.$row->team_name.'</option>';
                                        }?>
                                      </select>
                                    </div>
                                  </div>
            
            
                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                      <input type="submit" class="btn btn-success" value="<?php echo $submit_btn_value; ?>">
                                    </div>
                                  </div>
            
                                </form>
                              <?php }else{
                                echo "You don't have any team yet , Click <a href='".base_url()."/admin/team/add'><strong>here</strong></a> to create a team";
                              }?>
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
