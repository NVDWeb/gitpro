<script type="text/javascript">
//window.setTimeout(function() { $(".alert-danger").slideUp(2000); }, 2000);
window.setTimeout(function() { $(".alert-danger").alert('close'); }, 2000);
window.setTimeout(function() { $(".alert-success").alert('close'); }, 2000);
</script>

<div class="grab_box">
	<div class="container">
    	<div class="col-md-7 col-sm-7 col-xs-12">
        	<div class="grab_left">
            	<img src="<?php echo base_url();?>assets/images/grab_before.png" /><br />
                <img src="<?php echo base_url();?>assets/images/gone_icon.png" />
                <h3>Early Bird Registration </h3>
                <h4>Free basic plan worth <span>$149 for 1 year</span></h4>
                <p><a href="#2" id="ed">Register Now <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
				<p><span>*For limited period only</span></p>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
        	<div class="grab_right"><img src="<?php echo base_url();?>assets/images/earky_rocket.png" /></div>
        </div>
    </div>
</div>

<div class="video_grab">
	<div class="video_grab1">
		<div class="container">
        	<div class="video_grab02">
            	<div class="video_box_slide_left">
                     <h3><strong>"</strong>The <span>Cherryon</span></h3>
                     <h4>the Cake</h4>
                     <p>With the excellent services, these features add more to the portal.</p>
                </div>
            	<div class="video_box_slide_right">
                    <ul id="flexiselDemo8">
                        <li><div class="video_box_02"><img src="<?php echo base_url();?>assets/images/slider-0001.jpg" /></div></li>
                        <li><div class="video_box_02"><img src="<?php echo base_url();?>assets/images/slider-0002.jpg" /></div></li>
                        <li><div class="video_box_02"><img src="<?php echo base_url();?>assets/images/slider-0003.jpg" /></div></li>
                        <li><div class="video_box_02"><img src="<?php echo base_url();?>assets/images/slider-0004.jpg" /></div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="benifit_grab">
	<img src="<?php echo base_url();?>assets/images/benifit_circle.png" />
</div>

<div class="cat_grab">
	<div class="container">
    	<div class="cat_grab_01">
        	<img src="<?php echo base_url();?>assets/images/cat_img.png" />
            <h3><strong>"</strong><br />Our<br /><span>Categories</span></h3>
        </div>
    </div>
</div>
<a name="2"></a>
<div class="register_grab">
	<div class="container">
    	<div class="col-md-5 col-sm-5 col-xs-12">
        	<div class="register_grab_left">
            	<div class="register_form_step1 register_form_step3 ">
            	<?php if(validation_errors()) { ?>
					<div class="alert alert-danger" role="alert" style="font-family: verdana;">
						<?php echo validation_errors(); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success" role="alert" style="font-family: verdana;">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php } ?>
            		<form class="form-horizontal" action="<?php echo $action;?>" method="post" enctype= "multipart/form-data">
                          <div class="register_form111" id="planDiv">
                          	<div class="register_form111"><label>Select Category</label>   
                                       <select id="category" name="category" onchange="getSubCategory(this.value);">
                                       <option value="">--Select Category--</option>
                                        <?php $i=0;

                        foreach($categoryList as $category){?>
                                        
                                          <option value="<?php echo $category->id;?>" <?php if($Postcategory==$category->id) { echo 'selected'; } ?>><?php echo $category->category_name; ?></option>
                                         
                                        
                                        <?php } ?>
                                        </select>
                            </div>
                            <div class="register_form_sub_02" id="subC">
        
                           </div>

                            <!-- <div class="register_form_sub_02">
                            	<p>Sub Category</p>
                                <label><input type="checkbox" /> Category01</label>
                                <label><input type="checkbox" /> Category02</label>
                                <label><input type="checkbox" /> Category03</label>
                                <label><input type="checkbox" /> Category04</label>
                                <label><input type="checkbox" /> Category05</label>
                            </div> -->
                            
                          <div class="register_form111"><label class="planRadio">Select Plan Type:</label>
                <div class="planRadioOther"><input type="radio" name="plan_type" value="1" checked="">Monthly
                <input type="radio" name="plan_type" value="2">Yearly</div>
                </div><div class="register_form111"><label>Plan Name:</label>

                <select class="form-control" id="plan_id" name="plan_id">
                <option value="Free">Free (Anually - $0 Monthly - $0 )</option> <option value="Start - Up">Start - Up (Anually - $99 Monthly - $9.99 )</option> <option value="Basic">Basic (Anually - $149 Monthly - $14.95 )</option> <option value="Premium">Premium (Anually - $299 Monthly - $29.95 )</option>  </select></div></div>


                      	<div class="register_form111">
							<input type="text" class="form-control" placeholder="Business Name *" id="business_name" name="business_name" value="<?php echo $business_name;?>">
                     	</div>

                         <!--  <div class="register_form111">
                          <input type="text" class="form-control" placeholder="Business Registration Number *" id="business_registration_number" name="business_registration_number" value="" ></div> -->

                          <div class="register_form111">
                           <input type="text" class="form-control" placeholder="Business Contact Person Name *" id="contact_person_name" name="contact_person_name" value="<?php echo $contact_person_name;?>" ></div>

                          
                           
                            <div class="register_form111">

                           		<div class="pohne_con">
                                	<select name="phonecode">
            									<?php foreach($countryList as $country){?>
            										<option value="<?php echo $country->phonecode;?>"><?php echo $country->nicename;?> +<?php echo $country->phonecode;?></option>
            									<?php } ?>
                                     
                                    </select>
                                    <input type="text" class="form-control" placeholder="Mobile *" id="mobile" name="mobile" value="<?php echo $mobile;?>" >
                                </div>
                           
                           </div>

                          <div class="register_form111">

                          <input type="text" class="form-control" placeholder="Email *" id="email" name="email" value="<?php echo $email;?>" >

                          </div>
                           <div class="register_form111">

                          <input type="password" class="form-control" placeholder="Password *" id="password" name="password" value="<?php echo $password;?>">

                          </div>
                           <div class="register_form111">

                         <input type="password" class="form-control" placeholder="Confirm Password *" id="cpassword" name="cpassword" value="" >

                          </div>
                         <div class="register_form111">
                         <select name="country">
                         <option value="">--Select Country *--</option>
                           <?php foreach ($countryList as $countryl) {?>
                            <option value="<?php echo $countryl->nicename;?>" <?php if($country==$countryl->nicename) { echo "selected=selected"; } ?>><?php echo $countryl->nicename;?></option>
                           <?php } ?>
 
                         </select>
                           <!-- <input type="text" class="form-control" placeholder="Country *" id="country" name="country" value="" > -->
                           </div>
                           
                         <!--  <div class="register_form111">
                           <label>Upload Your Logo ( only png,jpg,jpeg and 80 * 43 in size) </label>
                            <input type="file" class="form-control" placeholder="Logo" id="business_logo" name="business_logo">

                          </div> -->
                          <div class="register_form111 terms_001">
                           <input id="c1" name="agreement" value="1" <?php if($agreement==1){ echo 'checked';}?> type="checkbox" ><label for="1"><span>I agree to terms and conditions and privacy policy</span>

                          </label></div>
                          <div class="error" style="color:red;"><strong><?php if($this->session->flashdata('flashSuccess')) { echo $this->session->flashdata('flashSuccess'); } ?></strong></div>
                          
                          <div class="register_form111">
                            <div class="g-recaptcha" data-sitekey="6LeKCh4UAAAAAHkC8xIFTDd0vNUr0h0-VCUD5dpi"></div>
                          </div>

                          <div class="register_form111">

                          <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> <?php echo $submit_btn_value;?></button>

                           <p></p>
                          <p>( NOTE : As per the selected plan there would be no charge for now.)</p>


                          </div>
                          </form>
                      </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
        	<div class="register_grab_right">
            	<img src="<?php echo base_url();?>assets/images/register_grab_rocket.png" />
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">
$(window).load(function() {
    $("#flexiselDemo8").flexisel({
        visibleItems: 1,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 1
            },
            tablet: { 
                changePoint:768,
                visibleItems: 1
            }
        }
    });
	
});
</script>
<script type="text/javascript">

function setSessionForEachCategory(){

  var matches = [];

  $(".ipchk:checked").each(function() {

    matches.push(this.value);

      jQuery.ajax({  

      type: "POST",  

      url: "<?php echo base_url();?>earlybirdregistration/setSessionForEachCategory",  

      data: {'ipchk': matches},  

        /*success: function(theResponse)

        {

          //alert(theResponse);

            //jQuery("#subC").html(theResponse); 

            jQuery("#me-select-list").html(theResponse); 

          }*/  

      }); 

  });

}



function getSubCategory(matches)
{
  //alert(matches);
  /* var matches = [];
  $(".ipchk:checked").each(function() {
    matches.push(this.value);
  });*/
  
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
      url: "<?php echo base_url();?>earlybirdregistration/getSubCategory",  
      data: {'ipchk': matches},  
        success: function(theResponse)
        {
          //alert(theResponse);
          jQuery("#subC").html(theResponse);  
          }  
      }); 
}
</script>
 <?php if(validation_errors()) { ?>
 <script type="text/javascript">

    jQuery("#ed").click();
   $(window).load(function() {
    var category = $("#category option:selected").val();
    if(category){
      jQuery.ajax({  
      type: "POST",  
      url: "<?php echo base_url();?>earlybirdregistration/getSubCategory",  
      data: {'ipchk': category},  
        success: function(theResponse)
        {
          //alert(theResponse);
          jQuery("#subC").html(theResponse);  

          }  
      }); 
    }
});
 </script>

 <?php } ?>