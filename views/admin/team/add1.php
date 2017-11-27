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
                    <h2>Team <?php  echo 'Add'; ?></h2>
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

                    <input type="hidden" name="team_id" value="<?php echo $team_id;?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Team Name<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <input type="text" id="team_name" name="team_name"  class="form-control col-md-7 col-xs-12" value="<?php echo $team_name;?>">
                        </div>
                      </div>
                      <?php if(!$team_id){ ?>
                      <!-- <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recommendation Prefrence<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-6">
                            <select class="form-control" name="tstt" id ="testselector">
                            <option value="">Choose option</option>
                                <option value="1" <?php if($tstt==1) { echo 'selected'; } ?>>Add by your self</option>
                                <option value="2" <?php if($tstt==2) { echo 'selected'; } ?>>Select from Our Platform</option>
                            </select>
                          </div>                          
                        </div> -->
                      <!-- <div class="selectmail form-group" id="selectmail" style="display:none;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Member's Email<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-6">
                            <textarea class="form-control" name="member_email"  placeholder="Comma seperated emails"><?php echo $member_email;?></textarea>
                          </div>
                        </div> -->
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Team Category<span class="required">*</span>
                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-6">
                            <select class="form-control" name="category">
                            <option value="0">Choose option</option>
                            <?php foreach($categoryList as $row){
								
                                echo '<option value="'.$row->id.'" '.($category== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
                              }?>
                            </select>
                          </div>                          
                        </div>                        
                        <div id="team_catdetails"></div>
                      <?php } ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Team Profile<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <textarea name="team_profile" class="form-control"><?php echo $team_profile;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Get Recommendations from<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                          <?php foreach ($mainCategoryList as $cat) { ?>
                           <input type="radio" class="flat"  style="position: absolute; opacity: 0;" name="main_cat[]" value="<?php echo $cat->id;?>" <?php if(in_array($cat->id,$main_cat)) { echo 'checked'; } ?> > <?php echo $cat->category_name;?> <br/><br/>
                          <?php } ?>
                          
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
<?php if(validation_errors('member_email')){ ?>
<script>
	$(window).load(function() {
		$('#selectmail').show();
	});
</script>
<?php } ?>
<script>
$('#testselector').bind('change', function(event) {
           var i= $('#testselector').val();		  
            if(i=="1"){
                 $('#selectmail').show();
				 $("#team_catdetails").hide();
             }else if(i=="2" ){
               $('#selectmail').hide(); // hide the first one
               $('#team_catdetails').show(); // show the other one

              }
});

function getTeamCategoriesById(team_cat_id){
  if(team_cat_id){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/getTeamCategoriesBusiness",
      data:{team_cat_id:team_cat_id},
      success: function(data){
		  var test = $("#testselector option:selected").val();
		  if(test==2){
			  $("#team_catdetails").html(data);
		  }
        
      }
    });
  }
}
</script>