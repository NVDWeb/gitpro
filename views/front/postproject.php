<?php $sesData = $this->session->userdata('postData'); ?>
<div class="welcome_top">
  <div class="welcome_top1">
      <div class="container">
          <div class="welcome_top_head">
              <h3>Welcome!</h3>
                <p>Post Your Project With ProYourWay</p>
            </div>
        </div>
    </div>
</div>
<div class="welcome_bottom">
  <div class="welcome_bottom01">
      <div class="container">
        <?php if(! validation_errors()) { ?>
        <div id="bt" class="post_sign02">
        	<img src="<?php echo base_url();?>assets/common/images/projectpost.png" alt="Post Project" />
          <button id="signin" class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i> Sign In</button>
          <button id="signup" class="btn btn-success"><i class="fa fa-user" aria-hidden="true"></i> Sign Up</button>
        </div>
        <?php } ?>

      <!-- <?php if(validation_errors()) { ?>
        <div class="alert alert-danger" role="alert" style="font-family: verdana;">
          <?php //echo validation_errors(); ?>
       </div>
      <?php } ?> -->
          <form class="form-horizontal" action="<?php echo $action;?>" method="post" enctype= "multipart/form-data">
            <?php if(validation_errors()){
              $style=  "display:block;";

            }else{

              $style="display:none;";
            }

            if(form_error('category')){
              $errorStyleCategory="border:2px solid red";
            }else{
              $errorStyleCategory="";
            }

            if(form_error('sub_category')){
              $errorStyleSubCategory="border:2px solid red";
            }else{
              $errorStyleSubCategory="";
            }

            if(form_error('project_name')){
              $errorStyleProjectName="border:2px solid red";
            }else{
              $errorStyleProjectName="";
            }

            if(form_error('work_detail')){
              $errorStyleWorkDetail="border:2px solid red";
            }else{
              $errorStyleWorkDetail="";
            }

            if(form_error('type_of_project')){
              $errorStyleTypeOfProject="border:2px solid red";
            }else{
              $errorStyleTypeOfProject="";
            }

            if(form_error('prefered_mode')){
              $errorStylePreferedMode="border:2px solid red";
            }else{
              $errorStylePreferedMode="";
            }
            if(form_error('no_of_hours')){
              $errorStyleHours="border:2px solid red";
            }else{
              $errorStyleHours="";
            }

            if(form_error('bidamounthire')){
              $errorStyleBidAmountHire="border:2px solid red";
            }else{
              $errorStyleBidAmountHire="";
            }

            if(form_error('paytype')){
              $errorPaytype="border:2px solid red";
            }else{
              $errorPaytype="";
            }

            if(form_error('company_name')){
              $errorStyleCompanyName="border:2px solid red";
            }else{
              $errorStyleCompanyName="";
            }

            if(form_error('first_name')){
              $errorStyleFirstName="border:2px solid red";
            }else{
              $errorStyleFirstName="";
            }

            if(form_error('last_name')){
              $errorStyleLastName="border:2px solid red";
            }else{
              $errorStyleLastName="";
            }

            if(form_error('email')){
              $errorStyleEmail="border:2px solid red";
            }else{
              $errorStyleEmail="";
            }

            if(form_error('mobile')){
              $errorStyleMobile="border:2px solid red";
            }else{
              $errorStyleMobile="";
            }
            if(form_error('location')){
              $errorStyleLocation="border:2px solid red";
            }else{
              $errorStyleLocation="";
            }
            if(form_error('designation')){
              $errorStyleDesignation="border:2px solid red";
            }else{
              $errorStyleDesignation="";
            }
            if(form_error('no_of_employee')){
              $errorStyleNoOfEmp="border:2px solid red";
            }else{
              $errorStyleNoOfEmp="";
            }
            if(form_error('turnover')){
              $errorStyleTurnOver="border:2px solid red";
            }else{
              $errorStyleTurnOver="";
            }

            if(form_error('password')){
              $errorStylePassword="border:2px solid red";
            }else{
              $errorStylePassword="";
            }

            if(form_error('cpassword')){
              $errorStyleCPassword="border:2px solid red";
            }else{
              $errorStyleCPassword="";
            }
            if(form_error('hiretype')){
              $errorHireType="border:2px solid red";
            }else{
              $errorHireType="";
            }

            ?>
        <div class="row" id="pro" style="<?php echo $style;?>">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="welcome_left">
                      <h3>Project Details</h3>
                        <ul>

                          <li>
                            <select style ="<?php echo $errorStyleCategory;?>" name="category" class="form-control" onchange="getSubCategoriesByParentId(this.value);" required>
                              <option>Select Category *</option>
                              <?php foreach($categoryList as $row){
                                echo '<option value="'.$row->id.'" '.($category== $row->id ? "selected" : '').'>'.$row->category_name.'</option>';
                              }?>
                            </select>
                          </li>
                          <li>

                            <select style ="<?php echo $errorStyleSubCategory;?>" name="sub_category" class="form-control" id="sub_category">
                              <option>Select Sub Category *</option>
                              <?php echo $subCategoryOptionsList;?>
                              </select>
                          </li>
                          <li><input type="text" style="<?php echo $errorStyleProjectName;?>" name="project_name" id="project_name" value="<?php echo $project_name;?>" class="form-control" placeholder="Project Name *"></li>
                            <li><textarea style="<?php echo $errorStyleWorkDetail;?>" class="form-control" placeholder="Work Details *" name="work_detail"><?php echo $work_detail;?></textarea></span></li>
                            <li><select style="<?php echo $errorStyleTypeOfProject;?>" name="type_of_project" id="type_of_project" class="form-control">
                              <option value="">Type of Project *</option>
                              <option value="ongoing" <?php if($type_of_project=='ongoing'){ echo 'selected';};?>>Ongoing</option>
                              <option value="onetime" <?php if($type_of_project=='onetime'){ echo 'selected';};?>>Onetime</option>
                            </select></li>
                            <li><select style="<?php echo $errorHireType;?>" name="hiretype" id="hiretype" class="form-control">
                              <option value="">Hire  *</option>
                              <option value="contract" <?php if($hiretype=='contract'){ echo 'selected';};?> >Contract work</option>
                              <option value="project" <?php if($hiretype=='project'){ echo 'selected';};?>>Project Work</option>
                            </select></li>
                            <li><select style="<?php echo $errorStylePreferedMode;?>" name="prefered_mode" id="prefered_mode" class="form-control">
                              <option value="">Prefered Mode *</option>
                              <option value="Onsite" <?php if($prefered_mode=='Onsite'){ echo 'selected';};?>>Onsite</option>
                              <option value="Offsite" <?php if($prefered_mode=='Offsite'){ echo 'selected';};?>>Offsite</option>
                            </select></li>
                            <li><select style="<?php echo $errorStyleHours;?>" name="no_of_hours" id="no_of_hours" class="form-control">
                              <option value="">Number of Hours Required *</option>
                              <option value="10" <?php if($no_of_hours=='10'){ echo 'selected';};?> >0-10</option>
                              <option value="25" <?php if($no_of_hours=='25'){ echo 'selected';};?>>10-25</option>
                              <option value="35" <?php if($no_of_hours=='35'){ echo 'selected';};?>>25-35</option>
                              <option value="45" <?php if($no_of_hours=='45'){ echo 'selected';};?>>35-45</option>
                              <option value="46" <?php if($no_of_hours=='46'){ echo 'selected';};?>>45+</option>
                            </select></li>
                            <li><input type="text" style="<?php echo $errorStyleBidAmountHire;?>" class="form-control numeric" name="bidamounthire" id="bidamounthire" placeholder="Budget Amount *" value="<?php echo $bidamounthire;?>"></li>
                            <li><select style="<?php echo $errorPaytype;?>" name="paytype" id="paytype" class="form-control">
                              <option value="">Select Payment Option *</option>
                              <option value="hourly" <?php if($paytype=='hourly'){ echo 'selected';};?> >Hourly</option>
                              <option value="daily" <?php if($paytype=='daily'){ echo 'selected';};?>>Daily</option>
                              <option value="weekly" <?php if($paytype=='weekly'){ echo 'selected';};?>>Weekly</option>
                              <option value="monthly" <?php if($paytype=='monthly'){ echo 'selected';};?>>Monthly</option>
                              <option value="fixed" <?php if($paytype=='fixed'){ echo 'selected';};?>>Fixed</option>
                            </select></li>
                            <li><textarea class="form-control" id="comment" placeholder="Additional Comment" name="comment"><?php echo $comment;?></textarea></li>
                            <li><select name="confedential" id="confedential" class="form-control">
                              <option value="">Do you want company name to be confidential</option>
                              <option value="1" <?php if($confedential=='1'){ echo 'selected';};?>>Yes</option>
                              <option value="0" <?php if($confedential=='0'){ echo 'selected';};?>>No</option>
                              </select></li>
                        </ul>
                    </div>
                    <?php //print_r($this->session->userdata());?>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="welcome_left">
                      <h3>Company Details</h3>
                      <ul>
                        <li><input style="<?php echo $errorStyleCompanyName;?>" type="text" id="company_name" name="company_name" class="form-control col-md-7 col-xs-12" value="<?php echo $company_name;?>" placeholder="Company Name *"></li>
                        <li><input style="<?php echo $errorStyleFirstName;?>"type="text" id="first_name" name="first_name" class="form-control col-md-7 col-xs-12" value="<?php echo $first_name;?>" placeholder="First Name *"></li>
                        <li><input style="<?php echo $errorStyleLastName;?>" type="text" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12" value="<?php echo $last_name;?>" placeholder="Last Name *"></li>
                        <li><input style="<?php echo $errorStyleEmail;?>" type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $email;?>" placeholder="Email *"></li>
                        <li><input style="<?php echo $errorStyleMobile;?>" type="text" id="mobile" name="mobile" class="form-control col-md-7 col-xs-12" value="<?php echo $mobile;?>" placeholder="Mobile *"></li>
                        <!-- <li><input style="<?php echo $errorStylePassword;?>" type="text" id="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $password;?>" placeholder="Password *"></li>
                        <li><input style="<?php echo $errorStyleCPassword;?>" type="text" id="cpassword" name="cpassword" class="form-control col-md-7 col-xs-12" value="<?php echo $cpassword;?>" placeholder="Confirm Password *"></li> -->
                        <li><input style="<?php echo $errorStyleLocation;?>" type="text" id="location" name="location" class="form-control col-md-7 col-xs-12" value="<?php echo $location;?>" placeholder="Location *"></li><br>
                        <li><input style="<?php echo $errorStyleDesignation;?>" type="text" id="designation" name="designation" class="form-control col-md-7 col-xs-12" value="<?php echo $designation;?>" placeholder="Your Role at the Company *"></li><br>
                        <li><select style="<?php echo $errorStyleNoOfEmp;?>"name="no_of_employee" id="no_of_employee" class="form-control">
                          <option value="">Select No of employees *</option>
                          <option value="4" <?php if($no_of_employee=='4'){ echo 'selected';};?>>1-4</option>
                          <option value="12" <?php if($no_of_employee=='12'){ echo 'selected';};?>>5-12</option>
                          <option value="20" <?php if($no_of_employee=='20'){ echo 'selected';};?>>12-20</option>
                          <option value="50" <?php if($no_of_employee=='50'){ echo 'selected';};?>>20-50</option>
                          <option value="51" <?php if($no_of_employee=='51'){ echo 'selected';};?> >50</option>
                        </select></li><br>
                        <li><input style="<?php echo $errorStyleTurnOver;?>" type="text" id="turnover" name="turnover" class="form-control col-md-7 col-xs-12" value="<?php echo $turnover;?>" placeholder="Company Turnover *"> </li><br>
                      <div class="submit_form01"><input type="submit" placeholder="SUBMIT" /></div>
                      </ul>
                        </form>
                    </div>
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
  $("#signup").click(function() {
    window.location = "<?php echo base_url();?>register";
    //$("#pro").show();
    //$("#bt").hide();
  });
  $("#signin").click(function() {
    window.location.href="<?php echo base_url();?>login"
  });
})
</script>
