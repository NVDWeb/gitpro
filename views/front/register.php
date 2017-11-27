<?php $sesData = $this->session->userdata('postData'); ?>
<div class="welcome_top">
  <div class="welcome_top1">
      <div class="container">
          <div class="welcome_top_head">
              <h3>Welcome!</h3>
                <p>Register With ProYourWay as Business</p>
            </div>
        </div>
    </div>
</div>
<div class="welcome_bottom">
  <div class="welcome_bottom01">
      <div class="container">
			 
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

			if(form_error('condition')){
              $errorStyleCondition="border:2px solid red";
            }else{
              $errorStyleCondition="";
            }

            ?>
        <div class="row" id="pro">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="welcome_left">
                      <h3>Company Details</h3>
                      <span style="color: red;"><?php echo validation_errors(); ?></span>
                      <ul>
                        <li><input style="<?php echo $errorStyleCompanyName;?>" type="text" id="company_name" name="company_name" class="form-control col-md-7 col-xs-12" value="<?php echo $company_name;?>" placeholder="Company Name *"></li>
                        <li><input style="<?php echo $errorStyleFirstName;?>"type="text" id="first_name" name="first_name" class="form-control col-md-7 col-xs-12" value="<?php echo $first_name;?>" placeholder="First Name *"></li>
                        <li><input style="<?php echo $errorStyleLastName;?>" type="text" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12" value="<?php echo $last_name;?>" placeholder="Last Name *"></li>
                        <li><input style="<?php echo $errorStyleEmail;?>" type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $email;?>" placeholder="Email *"></li>
                         <li><input style="<?php echo $errorStylePassword;?>" type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $password;?>" placeholder="Password *"></li>
                        <li><input style="<?php echo $errorStyleCPassword;?>" type="password" id="cpassword" name="cpassword" class="form-control col-md-7 col-xs-12" value="<?php echo $cpassword;?>" placeholder="Confirm Password *"></li>
                        <li><input style="<?php echo $errorStyleDesignation;?>" type="text" id="designation" name="designation" class="form-control col-md-7 col-xs-12" value="<?php echo $designation;?>" placeholder="Your Role at the Company *"></li>
                        <input id="condition" name="condition" value="1" type="checkbox"  <?php if($condition==1){ echo 'checked';}?>><label for="1"><span id="check" style="<?php echo $errorStyleCondition;?>">I agree to <a href="<?php echo base_url();?>/terms" target="_blank">Terms & Conditions</a> | <a href="<?php echo base_url();?>/privacy" target="_blank"> Privacy Policy</a> *</span></label><br>                        
                      <div class="submit_form01"><input type="submit" placeholder="SUBMIT" value="<?php echo $submit_btn_value;?>" /></div>
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
    $("#pro").show();
    $("#bt").hide();
  });
  $("#signin").click(function() {
    window.location.href="<?php echo base_url();?>login"
  });
})
</script>
