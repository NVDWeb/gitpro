
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
  <div class="welcome_bottom01">
      <div class="container">
      <?php if(validation_errors()) { ?>
        <div class="alert alert-danger" role="alert" style="font-family: verdana;">
          <?php echo validation_errors(); ?>
       </div>
      <?php } ?>
          <form class="form-horizontal" action="<?php echo $action;?>" method="post" enctype= "multipart/form-data">

        <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="welcome_left" style="align:center;">
                      <h3>Personal Details</h3>
                        <ul>
                          <!-- <li>
                            <select name="title">
                              <option value="">Select Title </option>
                              <option value="Mr" <?php if($title=='Mr') { echo 'selected'; } ?>>Mr.</option>
                              <option value="Mrs" <?php if($title=='Mrs') { echo 'selected'; } ?>>Mrs.</option>
                            </select>
                          </li> -->
                          <li><input type="text" name="first_name" placeholder="First name*" value="<?php if(isset($sesData['contact_person_name'])) { echo $sesData['contact_person_name']; } else{ echo $first_name;}?>" /></li>
                          <li><input type="text" name="last_name" value="<?php echo $last_name;?>" placeholder="Last name*" /></li>
                          <li><input type="text" name="email" value="<?php if(isset($sesData['contact_person_name'])) {  echo $sesData['email']; } else{ echo $email; }?>"  placeholder="Email Address*" /></li>
                          <li><input type="password" placeholder="Password*" name="password" value="<?php echo $password;?>" /></li>
                          <li><input type="password" placeholder="Confirm Password*" name="cpassword" value="<?php echo $cpassword;?>" /></li>
                          <!-- <li class="welcome_haled">
                            <select name="phonecode" id="phonecode" onchange="getState(this.value)">
                              <option value="">Select Country*</option>
                              <?php foreach($countryList as $country){?>
                              <option value="<?php echo $country->phonecode;?>" <?php if($country->phonecode==$phonecode) { echo 'selected';} ?>><?php echo $country->name;?> +<?php echo $country->phonecode;?></option>
                              <?php } ?>
                            </select>
                          </li> -->
                          <!-- <li class="welcome">
                            <select name="country" id="country" onchange="getStateByCountryId(this.value)">
                              <option value="">Select Country*</option>
                              <?php foreach($countryList as $country){?>
                              <option value="<?php echo $country->id;?>" <?php if($country->id==$countryN) { echo 'selected';} ?>><?php echo $country->name;?> +<?php echo $country->phonecode;?></option>
                              <?php } ?>
                            </select>
                          </li>
                          <li class="welcome">
                            <select name="state" id="state" onchange="getCityByStateId(this.value)">
                              <option value="">Select State*</option>
                            </select>
                          </li>

                          <li class="welcome">
                            <select name="city" id="city">
                              <option value="">Select City*</option>
                            </select>
                          </li>
                          <li  class="welcome"><input type="text" name="mobile" value="<?php if(isset($sesData['mobile'])) { echo $sesData['mobile']; }else { echo $mobile ; } ?>" placeholder="Mobile Number*" /></li> -->

                          <!-- <li  class="welcome_haled2"><input type="text" name="mobile" value="<?php if(isset($sesData['mobile'])) { echo $sesData['mobile']; }else { echo $mobile ; } ?>" placeholder="Mobile Number*" /></li> -->
                            <li>
                                <select id="category" name="category" onchange="getCategoryByParentId(this.value);">
                                  <option value="">Select Category*</option>
                                  <?php $i=0;
                                    foreach($categoryList as $category){?>
                                      <option value="<?php echo $category->id;?>" <?php if(isset($sesData['category'])) { if($sesData['category']==$category->id) { echo  'selected' ; }} else{ if($category->id==$cat) { echo 'selected'; } } ?>><?php echo $category->category_name; ?></option>
                                  <?php } ?>
                                  </select>
                            </li>
                            <li>
                                <select id="subcategory" name="subcategory">
                                  <option value="">Select Sub category</option>
                                </select>
                            </li>
                            <!-- <li>
                              <li class="term5">
                                <label for="1"><span>Add you skills</span></label>
                              <textarea class="form-control" name="skills" placeholder="Add Your skills.Comma seperated" cols="10" rows="05"><?php echo @$bio;?></textarea>
                            </li> -->
                            <li class="term5">
                              <label for="1"><span>Upload Your Resume Pdf, Doc, Txt *</span></label>
                                <input class="form-control" type="file" name="resume" />
                            </li>

                            <!-- <li>
                              <li class="term5">
                                <label for="1"><span>Add you BIO *</span></label>
                              <textarea class="form-control" name="bio" placeholder="Add Your Bio" cols="10" rows="05"><?php echo @$bio;?></textarea>
                            </li> -->
                            <!-- <li>
                                <select id="hear_about_us" name="hear_about_us">
                                  <option value="">How did you hear about us</option>
                                  <option value="facebook" <?php if($hear_about_us=='facebook') { echo 'selected';}?>>Facebook</option>
                                  <option value="linkedin" <?php if($hear_about_us=='linkedin') { echo 'selected';}?>>Linkedin</option>
                                  <option value="twitter" <?php if($hear_about_us=='twitter') { echo 'selected';}?>>Twitter</option>
                                  <option value="search" <?php if($hear_about_us=='search') { echo 'selected';}?>>Internet Search Engine</option>
                                  <option value="referbyfriend" <?php if($hear_about_us=='referbyfriend') { echo 'selected';}?>>Refered By Friend</option>
                                  <option value="other" <?php if($hear_about_us=='other') { echo 'selected';}?>>Other</option>
                                </select>
                            </li> -->

                        </ul>




                      <div class="term5"><input id="c1" name="agreement" value="1" <?php if($agreement==1){ echo 'checked';}?> type="checkbox" ><label for="1"><span>I agree to terms and conditions and privacy policy *</span></div>
                      <div class="submit_form01"><input type="submit" placeholder="SUBMIT" /></div>
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


function getCategoryByParentId(parent_id){
      if(parent_id){
        $.ajax({
          type:"POST",
          url: "<?php echo base_url();?>business/getCategoryByParentId",
          data: {parent_id: parent_id},
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
      }
}

function getStateByCountryId(country_id){
  if(country_id){
    $.ajax({
      type:"POST",
      url: "<?php echo base_url();?>landing/getStateByCountryId",
      data: {country_id: country_id},
        success: function(data) {
            $("#state").html(data);
        }
    });
  }
}

function getCityByStateId(state_id){
  if(state_id){
    $.ajax({
      type:"POST",
      url: "<?php echo base_url();?>landing/getCityByStateId",
      data: {state_id: state_id},
        success: function(data) {
            $("#city").html(data);
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
              $("#subcategory").html(data);
          }
        });
      }

      var country_id = $("#country option:selected").val();
      var state = "<?php echo $this->input->post('state');?>";
      if(country_id){
        $.ajax({
           type:"POST",
           url: "<?php echo base_url();?>landing/getStateByCountryId",
           data: {country_id: country_id,state:state},
           success: function(data) {
               $("#state").html(data);
           }
         });
       }

       var state_id = "<?php echo $this->input->post('state');?>";
       var city = "<?php echo $this->input->post('city');?>";
       if(state_id){
           $.ajax({
            type:"POST",
            url: "<?php echo base_url();?>landing/getCityByStateId",
            data: {state_id: state_id,city:city},
            success: function(data) {
                $("#city").html(data);
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
