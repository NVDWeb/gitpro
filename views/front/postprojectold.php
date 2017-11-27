
<?php $sesData = $this->session->userdata('postData'); ?>
<div class="welcome_top">
  <div class="welcome_top1">
      <div class="container">
          <div class="welcome_top_head">
              <h3>Welcome <?php echo $sesData['contact_person_name'];?>!</h3>
                <p>Please fill in all the details to complete the Sign Up process</p>
            </div>
        </div>
    </div>
</div>

<div class="welcome_bottom">
  <div class="welcome_bottom01 welcome_new_das01">
      <div class="container">
      <?php if(validation_errors()) { ?>
        <div class="alert alert-danger" role="alert" style="font-family: verdana;">
          <?php echo validation_errors(); ?>
       </div>
      <?php } ?>

      <?php
          if($this->session->flashdata('post_project_succ')){?>
            <div class="alert alert-success" role="alert" style="font-family: verdana;">
              <?php echo $this->session->flashdata('post_project_succ'); ?>
           </div>
      <?php } ?>
      <?php
      $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
      echo form_open_multipart($action,$attributes); ?>
        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Category <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="category" class="form-control" onchange="getSubCategoriesByParentId(this.value);" required>
              <option>--Select Category--</option>
              <?php foreach($categoryList as $row){
                echo '<option value="'.$row->id.'" '.($category== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
              }?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Sub Category <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="sub_category" class="form-control" id="sub_category">
              <?php echo $subCategoryOptionsList;?>

            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Project Name* : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="project_name" id="project_name" value="<?php echo $project_name;?>" class="form-control"><span id="errP" style="color:red;"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Work Details <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" name="work_detail"><?php echo $work_detail;?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Type of Project* : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="type_of_project" id="type_of_project" class="form-control">
              <option value="">Type of Project</option>
              <option value="ongoing" <?php if($type_of_project=='ongoing'){ echo 'selected';};?>>Ongoing</option>
              <option value="onetime" <?php if($type_of_project=='onetime'){ echo 'selected';};?>>Onetime</option>
            </select>
            <span id="errTP" style="color:red;"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Prefered Mode Of Consultant* : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="prefered_mode" id="prefered_mode" class="form-control">
              <option value="">Prefered Mode</option>
              <option value="Onsite" <?php if($prefered_mode=='Onsite'){ echo 'selected';};?>>Onsite</option>
              <option value="Offsite" <?php if($prefered_mode=='Offsite'){ echo 'selected';};?>>Offsite</option>
            </select>
            <span id="errPM" style="color:red;"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Number of approximate hours required per week for completion of project* : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="no_of_hours" id="no_of_hours" class="form-control">
              <option value="">Number of Hours Required</option>
              <option value="10" <?php if($no_of_hours=='10'){ echo 'selected';};?> >0-10</option>
              <option value="25" <?php if($no_of_hours=='25'){ echo 'selected';};?>>10-25</option>
              <option value="35" <?php if($no_of_hours=='35'){ echo 'selected';};?>>25-35</option>
              <option value="45" <?php if($no_of_hours=='45'){ echo 'selected';};?>>35-45</option>
              <option value="46" <?php if($no_of_hours=='46'){ echo 'selected';};?>>45+</option>
            </select>
            <span id="errWH" style="color:red;"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Budget for the Project (AUD) * : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control numeric" name="bidamounthire" id="bidamounthire" placeholder="Budget Amount" value="<?php echo $bidamounthire;?>">
            <span id="errBudget" style="color:red;"></span>
            <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Additional Comment : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea class="form-control" id="comment" name="comment"><?php echo $comment;?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Do you want company name to be confidential : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="confedential" id="confedential" class="form-control">
              <option value="">Confidential</option>
              <option value="1" <?php if($confedential=='1'){ echo 'selected';};?>>Yes</option>
              <option value="0" <?php if($confedential=='0'){ echo 'selected';};?>>No</option>

            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Company Name*<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="company_name" name="company_name" class="form-control col-md-7 col-xs-12" value="<?php echo $company_name;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">First name<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first_name" name="first_name" class="form-control col-md-7 col-xs-12" value="<?php echo $first_name;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Last Name<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12" value="<?php echo $last_name;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Email<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $email;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Phone<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="mobile" name="mobile" class="form-control col-md-7 col-xs-12" value="<?php echo $mobile;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Location<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="location" name="location" class="form-control col-md-7 col-xs-12" value="<?php echo $location;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Designation<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="designation" name="designation" class="form-control col-md-7 col-xs-12" value="<?php echo $designation;?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="email">Number of employees : </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="no_of_employee" id="no_of_employee" class="form-control">
              <option value="">Select No of employees</option>
              <option value="4" <?php if($no_of_employee=='4'){ echo 'selected';};?>>1-4</option>
              <option value="12" <?php if($no_of_employee=='12'){ echo 'selected';};?>>5-12</option>
              <option value="20" <?php if($no_of_employee=='20'){ echo 'selected';};?>>12-20</option>
              <option value="50" <?php if($no_of_employee=='50'){ echo 'selected';};?>>20-50</option>
              <option value="51" <?php if($no_of_employee=='51'){ echo 'selected';};?> >50</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Company Turnover<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="turnover" name="turnover" class="form-control col-md-7 col-xs-12" value="<?php echo $turnover;?>">
          </div>
        </div>

      <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
            <input type="submit" class="btn btn-success" value="<?php echo $submit_btn_value; ?>">
          </div>
        </div>

      </form>
                    </div>
                    <?php //print_r($this->session->userdata());?>

                </div>

            </div>



      </div>
    </div>
</div>



<?php if(validation_errors())
$count = count($this->session->userdata('edu_level'));{?>
<script>
window.onload = function(){
  var ll = "<?php echo $count;?>";
  var emp_type = "<?php echo $this->input->post('employement_type');?>";

  var employement_status = "<?php echo $this->input->post('employement_status');?>";

  changeEmpType(emp_type);
  setEmpl(employement_status);


};
</script>
<?php } ?>


<script>

function changeEmpType(type){
  //alert(type);
  if(type==2){
    $("#ownC").show();
    $("#workingC").hide();
  }else if(type==1){
    $("#workingC").show();
    $("#ownC").hide();
  }else{
    $("#ownC").hide();
    $("#workingC").hide();
  }
}


function setEmpl(emp_type){
  if(emp_type==2 || emp_type==3){
    $("#company_name").hide();
  }else{
    $("#company_name").show();
  }
}


function getSubCategoriesByParentId(parent_id){

      if(parent_id){

        $.ajax({
          type:"POST",
          url: "<?php echo base_url();?>business/getCategoryByParentId",
          data: {parent_id: parent_id},
            success: function(data) {
                $("#sub_category").html(data);
            }

        });

      }

    }

$(window).load(function() {
     var parent_id = $("#category option:selected").val();
     var subcategory = "<?php echo $this->input->post('subcategory');?>";
     if(parent_id){

        $.ajax({

          type:"POST",

          url: "<?php echo base_url();?>business/getCategoryByParentId",

          data: {parent_id: parent_id,subcategory:subcategory},

            success: function(data) {

                $("#sub_category").html(data);

            }

        });

      }


});

</script>
<script>
  $(function() {
  $("#labelfile").click(function() {
    $("#imageupl").trigger('click');
  });
})
</script>
