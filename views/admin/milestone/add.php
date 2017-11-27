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
                  <h2>Create Milestone</h2>

                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <span style="color:red;"><?php echo validation_errors(); ?></span>

                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                    echo form_open_multipart($action,$attributes); ?>

                    <input type="hidden" name="b_id" value="<?php echo $b_id;?>">
                    <input type="hidden" name="q_id" value="<?php echo $q_id;?>">
                      <input type="hidden" name="bidclosingamount" value="<?php echo $bidclosingamount;?>">

                      <?php if(!empty($getQuotation)){ ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Select Project * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select name="quotation_id" class="form-control">
                            <option value="0">--Select Quotation--</option>
                             <?php   foreach ($getQuotation as $value) { echo '' ?>
                                <option value="<?php echo $value->id;?>" <?php if($value->id==$quotation_id){ echo 'selected';} ?>><?php echo $value->project_name;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <?php } ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Milestone Name* : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" name="milestone_name" id="milestone_name" value="<?php echo $milestone_name;?>" class="form-control"><span id="errP" style="color:red;"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Amount* : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" name="amount" id="amount" value="<?php echo $amount;?>" class="form-control"><span id="errP" style="color:red;"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Milestone Start/End Date* : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                           <input type="text" style="width: 270px" name="reservation" id="reservation" class="form-control" value=""><span id="errSandE" style="color:red;"></span>
                        </div>
                      </div>

                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" name="description" id="description" value="<?php echo $description;?>" class="form-control"><span id="errP" style="color:red;"></span>
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
