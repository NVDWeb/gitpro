
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
                  <div class="welcome_left">
                      <h3>Personal Details</h3>
                        <ul>
                          <li>
                                <select name="title">
                                  <option value="">Select Title </option>
                                  <option value="Mr" <?php if($title=='Mr') { echo 'selected'; } ?>>Mr.</option>
                                  <option value="Mrs" <?php if($title=='Mrs') { echo 'selected'; } ?>>Mrs.</option>
                                </select>
                            </li>
                          <li><input type="text" name="first_name" placeholder="First name*" value="<?php if(isset($sesData['contact_person_name'])) { echo $sesData['contact_person_name']; } else{ echo $first_name;}?>" /></li>
                            <li><input type="text" name="last_name" value="<?php echo $last_name;?>" placeholder="Last name*" /></li>
                            <li><input type="text" name="email" value="<?php if(isset($sesData['contact_person_name'])) {  echo $sesData['email']; } else{ echo $email; }?>"  placeholder="Email Address*" /></li>
                            <li><input type="password" placeholder="Password*" name="password" value="<?php echo $password;?>" /></li>
                            <li><input type="password" placeholder="Confirm Password*" name="cpassword" value="<?php echo $cpassword;?>" /></li>
                            <li class="welcome_haled"><select name="phonecode" id="phonecode">
                            <option value="">Select Country*</option>
                              <?php foreach($countryList as $country){?>
                                <option value="<?php echo $country->phonecode;?>" <?php if($country->phonecode==$phonecode) { echo 'selected';} ?>><?php echo $country->nicename;?> +<?php echo $country->phonecode;?></option>
                              <?php } ?>

                                    </select></li>
                            <li  class="welcome_haled2"><input type="text" name="mobile" value="<?php if(isset($sesData['mobile'])) { echo $sesData['mobile']; }else { echo $mobile ; } ?>" placeholder="Mobile Number*" /></li>
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

                        </ul>
                    </div>
                    <?php //print_r($this->session->userdata());?>
                    <div class="welcome_left">
                      <h3>Education Details</h3>
                        <ul>
                          <li><p id="rowCount">
                                <select name="education_level[]">
                                  <option value="">Level of Education</option>
                                  <option value="bachelor"
                                  <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[0]=='bachelor') { echo 'selected';} } ?>>Bachelor Degree</option>
                                  <option value="bachelorhons"
                                  <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[0]=='bachelorhons') { echo 'selected';} } ?>
                                    >Bachelor degree (hons)</option>
                                  <option value="doubledegree"
                                  <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[0]=='doubledegree') { echo 'selected';} } ?>>Double Degree </option>
                                  <option value="masters"
                                  <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[0]=='masters') { echo 'selected';} } ?>>Masters</option>
                                  <option value="phd"
                                  <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[0]=='phd') { echo 'selected';} } ?>>PHD</option>
                                </select>
                                </p>
                            </li>
                            <li><input type="text" name="more_education[]" placeholder="Add Course Details"  value="<?php if($this->session->userdata('more_edu')) {
                              $more_edu = $this->session->userdata('more_edu');
                              echo $more_edu[0];
                              } ?>" /></li>
                            <?php if(validation_errors()){
                            for ($i = 0; $i < count($this->session->userdata('edu_level'))-1; $i++) {  ?>
                             <li id="addedRowss"><p id="rowCount<?php echo $i+1;?>">
                             <td><select name="education_level[]">
                             <option value="">Level of Education</option>
                             <option value="bachelor"
                              <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[$i+1]=='bachelor') { echo 'selected';} } ?>>Bachelor Degree</option>
                             <option value="bachelorhons"
                             <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[$i+1]=='bachelorhons') { echo 'selected';} } ?>>Bachelor degree (hons)</option>
                             <option value="doubledegree"
                             <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[$i+1]=='doubledegree') { echo 'selected';} } ?>>Double Degree </option>
                             <option value="masters"
                             <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[$i+1]=='masters') { echo 'selected';} } ?>>Masters</option>
                             <option value="phd"
                             <?php if($this->session->userdata('edu_level')) {
                                    $edu_level = $this->session->userdata('edu_level');
                                   if( $edu_level[$i+1]=='phd') { echo 'selected';} } ?>>PHD</option>
                             </select></td>
                             <td><input type="text"  placeholder="Add Course Details" name="more_education[]" value="<?php if($this->session->userdata('more_edu')) {
                              $more_edu = $this->session->userdata('more_edu');
                              echo $more_edu[$i+1];
                              } ?>" /></td>
                             <a href="javascript:void(0);" onclick="removeRow(<?php echo $i+1;?>);">Delete</a></p></li>
                            <?php } }?>


                            <li>
                              <div class="input_box1_insert">
                                      <div id="rowId"></div>
                        <div id="addedRowss"></div>
                                    </div>
                              <div class="input_box1">

                                        <span onclick="addMoreRowss(this.form);" id="addMoreRowss"><input id="exp_add" type="button" value="ADD" /></span>
                                    </div>
                            </li>
                            <!-- <li>
                                <select>
                                  <option value="volvo">select form categories  </option>
                                  <option value="saab">Consultant</option>
                                  <option value="mercedes">Mercedes</option>
                                  <option value="audi">Audi</option>
                                </select>
                            </li> -->
                            <!-- <li>
                               <div class="input_box1_insert">
                                      <div id="rowId"></div>
                        <div id="addedRowsss"></div>
                                    </div>
                               <div class="input_box1">
                                      <input type="text"  placeholder="Add more Education" />
                                        <span onclick="addMoreRowsss(this.form);"><input type="button" value="ADD" /></span>
                                    </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="welcome_right">
                      <h3>Employment history</h3>
                      <select name="employement_type" id="employement_type" onchange="changeEmpType(this.value)">
                        <option value="">Select Employment Type</option>
                        <option value="1" <?php if($employement_type==1) { echo 'selected';}?>>Working in a Company</option>
                        <option value="2" <?php if($employement_type==2) { echo 'selected';}?>>Own a Company</option>
                      </select>
                            <section id="workingC" style="display: none;">
                              <div class="welcome_emp">
                                  <select name="employement_status" id="employement_status" onchange="setEmpl(this.value);">
                                      <option value="">Select Employment Status* </option>
                                      <option value="1" <?php if($employement_status==1) { echo 'selected';}?>>Currently Employed </option>
                                      <option value="2" <?php if($employement_status==2) { echo 'selected';}?>>No Previous Employment </option>
                                      <option value="3" <?php if($employement_status==3) { echo 'selected';}?>>Work as freelance </option>
                                    </select>
                                    <input type="text" value="<?php echo $company_name;?>" placeholder="Company Name*" name="company_name" id="company_name" />
                                    <select name="year_exp" id="year_exp" class="year_exp">
                                      <option value="">Work Experience (Years)* </option>
                                      <?php for($i=1; $i<=20;$i++){?>
                                      <option value="<?php echo $i;?>" <?php if($year_exp==$i) { echo 'selected';}?>><?php echo $i;?></option>
                                      <?php } ?>

                                    </select>
                                    <!--<div class="up_res">
                                      <input name="resume" type="file" id="imageupl" class="file" />
                                      <label class="labelfile" id="labelfile"><i class="fa fa-upload" aria-hidden="true"></i> Upload Your Resume Pdf, Doc, Txt*</label>
                                    </div>-->
                                    <div class="form_uplo">
                                    	<label>Upload Your Resume Pdf, Doc, Txt*</label>
                                    	<input type="file" name="resume" />
                                    </div>

                                    <div class="input_box1_insert">
                                       <div id="rowId"></div>
                                       <div id="addedRows"></div>
                                    </div>
                                    <?php //echo'<pre>';print_r($this->session->userdata('work_place'));?>
                                    <div class="input_box1">

                                    <?php if($this->session->userdata('work_place'))

                                    {
                                       $work_place = $this->session->userdata('work_place');
                                      ?>
                                    <input type="text" style="opacity:0"  />
                                      <?php if(validation_errors()){
                                        for ($i = 0; $i < count($this->session->userdata('work_place')); $i++) {  ?>
                                        <p id="Edurowcount<?php echo $i;?>"><td><input type="text"  name="work_place[]" placeholder="add more workplace" value="<?php echo $work_place[$i];?>" /></td> <a href="javascript:void(0);" onclick="removeRowedu(<?php echo $i ; ?>);">Delete</a></p>
                                      <?php }  } } else { ?>
                                         <input type="text"  name="work_place[]" placeholder="add more workplace"  />

                                     <?php } ?>

                                        <span onclick="addMoreRows(this.form);"><input id="work_add" type="button" value="ADD" class="add_work_place" /></span>
                                    </div>
                              </div>

                          </section>
                            <section id="ownC" style="display: none;">
                              <div class="welcome_emp_next">
                                    <!-- <textarea name="company_details" placeholder="Company Details"> <?php echo $company_details;?></textarea> -->
                                    <input type="text" placeholder="Company name*" name="business_name" value="<?php echo $company_name;?>"/>
                                    <input type="text" placeholder="Company ABN or Business Registration Number*" name="business_registration_number" value="<?php echo $business_registration_number;?>" />
                                    <input type="text" placeholder="Work Position*" name="designation" value="<?php echo $designation;?>" />
                                    <select name="industry_exp" id="industry_exp">
                                      <option value="">Industry experience*</option>
                                      <option value="1-3" <?php if($industry_exp=='1-3') { echo 'selected';}?>>1-3 years</option>
                                      <option value="3-6" <?php if($industry_exp=='3-6') { echo 'selected';}?>>3- 6 years </option>
                                      <option value="6-9" <?php if($industry_exp=='6-9') { echo 'selected';}?>>6-9 years</option>
                                      <option value="more" <?php if($industry_exp=='more') { echo 'selected';}?>>More</option>
                                      <option value="no" <?php if($industry_exp=='no') { echo 'selected';}?>>No experience</option>
                                    </select>
                              </div>
                            </section>
                             </ul>

                        <div class="term5"><input id="c1" name="agreement" value="1" <?php if($agreement==1){ echo 'checked';}?> type="checkbox" ><label for="1"><span>I agree to terms and conditions and privacy policy *</span></div>
                        <div class="submit_form01"><input type="submit" placeholder="SUBMIT" /></div>
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


});

</script>
<script>
  $(function() {
  $("#labelfile").click(function() {
    $("#imageupl").trigger('click');
  });
})
</script>
