<script src="assets/common/js/jquery.easing.min.js" type="text/javascript"></script>

<script src="assets/common/js/script.js" type="text/javascript"></script>


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
      <!-- <?php if(validation_errors()) { ?>
        <div class="alert alert-danger" role="alert" style="font-family: verdana;">
          <?php echo validation_errors(); ?>
       </div>
      <?php } ?> -->

          <div class="row" >
          	<form id="msform" class="form-horizontal" action="<?php echo $action;?>" method="post" enctype= "multipart/form-data">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">Account Setup</li>
                    <li>Personal Details</li>
                    <li>Work Profile</li>
                </ul>
                <!-- fieldsets -->
                    <fieldset>
                    <h2 class="fs-title">Create your account</h2>
                    <h3 class="fs-subtitle">Account Setup</h3>
                    <?php if($this->session->flashdata('error')){
                        echo '<span style="color:red">'.$this->session->flashdata('error').'</span>';
                    }?>
                    <?php if(validation_errors()) { ?><span style="color:red"><?php echo validation_errors(); ?> </span><?php } ?>
                    <div class="fs-error"></div>
                    <input type="text" name="email" id="email" placeholder="Email*" value="<?php echo $email;?>"/>
                    <input type="password" name="password"  id="pass" placeholder="Password*" value="<?php echo $password;?>"/>
                    <input type="password" name="cpassword"  id="cpass" placeholder="Confirm Password*" value="<?php echo $cpassword;?>" />
                    <input type="button" name="next" class="next action-button" value="Next" /> <?php
if(!empty($authUrl) && empty($this->session->userdata('teamEmail'))){
  echo '<a href="'.$authUrl.'"><img class="resource-paragraph-image lazy-load lazy-load-src" alt="Sign in with LinkedIn" src="'.base_url().'assets/images/signin-button.png" pagespeed_url_hash="1811720327"></a>';
	//echo '<div class="linkedin_btn"><a href="'.$authUrl.'">login with linkedin</a></div>';
}
?>
                </fieldset>
                <fieldset>

                    <h2 class="fs-title">Personal details</h2>
                    <h3 class="fs-subtitle">We will never sell it</h3>
                    <div class="fs-error2"></div>
                    <input type="text" name="first_name" id="fname" placeholder="First Name*" value="<?php echo $first_name;?>" />
                    <input type="text" name="last_name" id="lname" placeholder="Last Name*" value="<?php echo $last_name;?>"/>
                    <select name="country">Select Country
					<?php foreach ($countryList as $value) { ?>
                      <option value="<?php echo $value->id;?>" <?php if($value->id==$countryN){ echo 'selected';} ?>><?php echo $value->name .'(+ '.$value->phonecode.')';?></option>
                    <?php } ?>
                    </select>
                    <input type="text" name="mobile" id="phone" placeholder="Mobile*"value="<?php echo $mobile;?>" />
                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="button" name="next" id="n" class="nextc action-button" value="Next" />
                </fieldset>
                <fieldset>

                    <h2 class="fs-title">Select work industry</h2>
                    <h3 class="fs-subtitle">Choose select your profile</h3>
                        <div class="fs-error"></div>
                        <select id="profiletype" name="profiletype">
                            <option value="">Select Profile Type*</option>
                            <option value="Management Consultant">Management Consultant</option>
                            <option value="Finance Investment Professional">Finance Investment Professional</option>
                            <option value="Change Manager">Change Manager</option>
                            <option value="Program/Project Manager">Program / Project Manager</option>
                            <option value="Transformation Manager">Transformation Manager</option>
                            <option value="Digital Marketer">Digital Marketer</option>
                            <option value="Supply Chain Manager">Supply Chain Manager</option>
                            <option value="Financial Controller/Officer">Financial Controller / Officer</option>
                            <option value="HR Manager">HR Manager</option>
                            <option value="CTO/CIO">CTO / CIO</option>
                            <option value="Data Analyst">Data Analyst</option>                            
                        </select>
                        <select id="category" name="category" onchange="getCategoryByParentId(this.value);">
                          <option value="">Select Category*</option>
                          <?php $i=0;
                            foreach($categoryList as $category){?>
                              <option value="<?php echo $category->id;?>" <?php if(isset($sesData['category'])) { if($sesData['category']==$category->id) { echo  'selected' ; }} else{ if($category->id==$cat) { echo 'selected'; } } ?>><?php echo $category->category_name; ?></option>
                          <?php } ?>
                          </select>
                          <!--<select id="subcategory" name="subcategory" onchange="checkOther(this.value);">
                            <option value="">Select Sub category*</option>
                          </select>-->
                          <?php /*?><?php echo form_error('other');?>
                          <?php if(form_error('other') || $this->input->post('other')!=''){
                            $style = "display:block";
                          }else{
                            $style = "display:none";
                          }
                          ?><?php */?>
                          <!--<input type="text" name="other" id="other" placeholder="Other*" value="<?php echo $other;?>" style="<?php echo $style;?>" />-->

                    <div class="term5">
                       <label for="1"><span>Upload Resume Pdf, Doc, Txt, Docx <input type="button" class="action-button" id="allow" Value="NOW">   <input type="button" class="action-button" id="later" value="LATER"></span></label>
                       <input class="re" type="file" name="resumecontent" id="re" style="display:none;">
                    </div>
                    <div class="term5"><input id="c1" name="agreement" value="1" <?php if($agreement==1){ echo 'checked';}?> type="checkbox" ><label for="1"><span id="check">I agree to <a href="<?php echo base_url();?>/terms" target="_blank">Terms & Conditions</a> | <a href="<?php echo base_url();?>/privacy" target="_blank"> Privacy Policy</a> *</span></div>
                    <input type="button" name="previous" id="p" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="submit action-button" value="Submit" />

                </fieldset>

            </form>
          </div>

        <?php /*?><div class="row">

                <div class="col-md-12">

                    <div class="welcome_left">
                    	<h3>Personal Details</h3>
                    <div class="prog_test01"><div class="prog_test-'+ options.position +'" id="progress-bar-wrap"><div class="prog_test02"><div class="progress"><div id="form-progress" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span class="pro">0% Complete</span></div></div></div></div></div>

                    <div class="form_field05_pro">
      	<form id="test_form" action="/" method="post" role="form">
	        <fieldset>
	            <div class="section row">
	                <fieldset>
	                	<div class="form-group col-md-6">
	                	    <input class="text_ed01" id="first-name-1" name="pt_first" placeholder="First Name" value="" type="text" required />
	                	</div>

	                	<div class="form-group col-md-6">
	                	    <input class="text_ed01" id="last-name-1" name="pt_last" placeholder="Last Name" value="" type="text" maxlength="50" required />
	                	</div>
                        <div class="form-group col-md-6">
	                	    <input class="text_ed01" placeholder="Email" value="" type="email" required />
	                	</div>

                        <div class="form-group col-md-6">
	                	    <input class="text_ed01" placeholder="Phone" value="" type="text" required />
	                	</div>

                        <div class="form-group col-md-6">
	                	    <input class="text_ed01" placeholder="Password" value="" type="password" required />
	                	</div>

                        <div class="form-group col-md-6">
	                	    <input class="text_ed01" placeholder="Confirm Password" value="" type="password" required />
	                	</div>
                        <div class="form-group col-md-6">
	                	    <select class="text_ed01" id="category" name="category" required>
                                  <option value="">Select Category*</option>
                                                                        <option value="1">Accounting &amp; Finance</option>
                                                                        <option value="5">IT &amp; Web Services</option>
                                                                        <option value="6">Human Resource</option>
                                                                        <option value="120">Consultants</option>
                                                                        <option value="124">Lawyers &amp; Solicitors</option>
                                                                        <option value="125">Marketing</option>
                                                                    </select>
	                	</div>

                        <div class="form-group col-md-6">
	                	    <select class="text_ed01" id="category" name="category" required>
                                  <option value="">Select Sub Category*</option>
                                                                        <option value="1">Accounting &amp; Finance</option>
                                                                        <option value="5">IT &amp; Web Services</option>
                                                                        <option value="6">Human Resource</option>
                                                                        <option value="120">Consultants</option>
                                                                        <option value="124">Lawyers &amp; Solicitors</option>
                                                                        <option value="125">Marketing</option>
                                                                    </select>
	                	</div>
                        <div class="text_ed02 col-md-6">
                    		<label>Upload Your Resume Pdf, Doc, Txt *</label>
	                	    <input class="text_ed03"  value="" type="file" required />
	                	</div>

                        <div class="form-group col-md-5">
	                	    <div class="term5"><input id="c1" name="agreement" value="1" type="checkbox" required><label for="1"><span>I agree to terms and conditions and privacy policy *</span></label></div>
	                	</div>
	                </fieldset>
	            </div>


	        </fieldset>
	        <div class="form-group">
            	<div class="submit_form01"><input type="submit" placeholder="SUBMIT"></div>
	        </div>
	    </form>
      </div>

                    </div>

                </div>


            </div><?php */?>



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
  $("#other").hide();
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

function checkOther(id){
  var other = $("#subcategory option:selected").text();
  if(other=='Other'){
      $("#other").show();
  }else{
    $("#other").val('');
    $("#other").hide();
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

  $("#allow").click(function(){
    $("#re").show();
  });

  $("#later").click(function(){
    $("#re").hide();
  });
})
</script>
<?php
if($this->session->userdata('userInfo') && ! validation_errors()){ ?>
  <script>
    $(function() {
      //alert('n');
      $('.next').trigger('click');
      $('.nextc').trigger('click');
      $("#p").attr('disabled',true);
  })
  </script>

  <?php } ?>

<?php /*?><script src="assets/common/js/jq.progress-bar.js"></script>
    <script>
    	$(document).ready(function() {
			$('#test_form').showProgress();
		});
    </script><?php */?>
