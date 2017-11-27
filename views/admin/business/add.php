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
                    <h2>Business <?php if($business_id){ echo 'Edit'; } else { echo 'Add';} ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <span style="color:red;"><?php echo validation_errors(); ?></span>
                    <?php if(isset($resume)){ ?>
                    <a class="btn btn-success" href=" <?php echo base_url();?>uploads/resume/<?php echo $resume; ?>" target="_blank"> See Resume </a><?php } else{ echo '';}?>
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                    echo form_open_multipart($action,$attributes); ?>
                    <input type="hidden" name="business_id" value="<?php echo $business_id;?>">


                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose Plan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="plan_id" class="form-control" >
                            <option value="0">--Select Plan--</option>
                            <option value="1" <?php if($plan==1){ echo 'selected'; } ?>>Free</option>
                            <option value="2" <?php if($plan==2){ echo 'selected'; } ?>>Premium</option>
                          </select>
                        </div>
                      </div> -->

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose Business Category<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php $i=0;
                            foreach($categoryList as $category){ ?>
                            <input class="ipchk" onClick="getSubCategory();" type="checkbox" value="<?php echo $category->id;?>" name="category[]" <?php if(in_array($category->id,$businessCategory)){ echo 'checked';} ?>><?php echo $category->category_name;?>

                          <?php } $i++;?>
                        </div>
                      </div>

                      <div class="form-group" >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose Business Sub Category<span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12" id="subC">
                            <?php $i=0;
                            foreach($subCategoryList as $category){
                            ?>
                            <input type="checkbox" value="<?php echo $category->id;?>" name="sub_cat[<?php echo $category->parent_id;?>][]" <?php if(in_array($category->id,$sub_category)) { echo 'checked=checked';} ?>><?php echo $category->category_name;?>

                          <?php } $i++;?>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="business_name" name="business_name" required class="form-control col-md-7 col-xs-12" value="<?php echo $business_name;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" required class="form-control col-md-7 col-xs-12" value="<?php echo $email;?>" <?php if($business_id) { echo 'disabled'; } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Business Contact <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mobile" name="mobile" required class="form-control col-md-7 col-xs-12" value="<?php echo $mobile;?>">
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

<script type="text/javascript">
function getSubCategory()
{
   var matches = [];
  $(".ipchk:checked").each(function() {
    matches.push(this.value);
  });

  //  var matches1 = [];
  // $(".brandchk:checked").each(function() {
  //   matches1.push(this.value);
  // });

  // var matches2 = [];
  // $(".pricechk:checked").each(function() {
  //   matches2.push(this.value);
  // });
  jQuery("#subC").html("<center>Loading...</center>");
      jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/business/getSubCategory",
      data: {'ipchk': matches},
        success: function(theResponse)
        {
          //alert(theResponse);
          jQuery("#subC").html(theResponse);
          }
      });
}
</script>
