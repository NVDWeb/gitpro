<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">

//window.setTimeout(function() { $(".alert-danger").slideUp(2000); }, 2000);

 window.setTimeout(function() { $(".alert-danger").alert('close'); }, 5000);

window.setTimeout(function() { $(".alert-success").alert('close'); }, 5000);

</script>

    <?php if(validation_errors()) { ?>

    <script type="text/javascript">

      $(function(){

        $("#formScheme").click();

       

      });

    </script>

    <?php } ?>



    <?php if($this->session->flashdata('success')) { ?>

    <script type="text/javascript">

      $(function(){

        $("#formSchemeSecond").click();

      });

    </script>

    <?php } ?>

    <form class="form-horizontal" action="<?php echo $action;?>" method="post" enctype= "multipart/form-data">



      <div class="schemes-group">

        <div class="register_free scheme" id="scheme1">

        <div class="container">

            <div class="register_free01">

                  <div class="step_page_main">
                  <div class="step_page001">
                      <div class="step_image1">
                      	 <div class="mobile"><img src="<?php echo base_url();?>assets/common/images/pro_business_banner.png" /></div>
                          <ul class="destop">
                              <li>
                                  <div class="step_icon wow fadeInUp" data-wow-delay=".1s"><img src="<?php echo base_url();?>assets/common/images/step001.png" /></div>
                                    <div class="step_arrow wow fadeInUp" data-wow-delay=".5s"><img src="<?php echo base_url();?>assets/common/images/step001_arrow.png" /></div>
                                </li>
                                <li>
                                  <div class="step_icon wow fadeInUp" data-wow-delay=".20s"><img src="<?php echo base_url();?>assets/common/images/step002.png" /></div>
                                    <div class="step_arrow wow fadeInUp" data-wow-delay=".30s"><img src="<?php echo base_url();?>assets/common/images/step002_arrow.png" /></div>
                                </li>
                                <li>
                                  <div class="step_icon wow fadeInUp" data-wow-delay=".40s"><img src="<?php echo base_url();?>assets/common/images/step003.png" /></div>
                                    <div class="step_arrow wow fadeInUp" data-wow-delay=".50s"><img src="<?php echo base_url();?>assets/common/images/step003_arrow.png" /></div>
                                </li>
                                <li>
                                  <div class="step_icon wow fadeInUp" data-wow-delay=".60s"><img src="<?php echo base_url();?>assets/common/images/step004.png" /></div>
                                    <div class="step_arrow wow fadeInUp" data-wow-delay=".70s"><img src="<?php echo base_url();?>assets/common/images/step004_arrow.png" /></div>
                                </li>
                                <li>
                                  <div class="step_icon wow fadeInUp" data-wow-delay=".80s"><img src="<?php echo base_url();?>assets/common/images/step005.png" /></div>
                                    <div class="step_arrow wow fadeInUp" data-wow-delay=".90s"><img src="<?php echo base_url();?>assets/common/images/step005_arrow.png" /></div>
                                </li>
                                <li>
                                  <div class="step_icon wow fadeInUp" data-wow-delay=".80s"><img src="<?php echo base_url();?>assets/common/images/step006.png" /></div>
                                </li>
                            </ul>
                            <div class="finaal_select wow fadeInUp" data-wow-delay=".94s"><img src="<?php echo base_url();?>assets/common/images/step001_final.png" /><br /><a href="#" class="wow fadeInUp"  set-scheme="#scheme2" data-wow-delay=".99s">Start Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="register_plan scheme" id="scheme2">

  <div class="container">

      <div class="row">
        <div type="button" class="slide-left but01" set-scheme="#scheme1"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Back</div>
      <h5>Choose your subscription plan</h5>

          <?php $i=0;

          foreach ($plans as $plan){ ?>

           <div class="col-md-3 col-sm-3 col-xs-12 wow bounceInLeft" data-wow-delay=".1s"> 

              <div class="plan_box">
                
          <h3><span>&nbsp;</span></h3>
                  <div class="plan_text"><?php echo $plan->plan_name;?></div>

                    <h4><?php if($plan->plan_name=='Free') { echo '<span><b>No</b> <br />Charge</span><span><b>No</b> <br />Credit card required</span>' ; }
					else { echo '<span><i class="fa fa-usd" aria-hidden="true"></i> <b>'.$plan->billed_annually ; echo '</b> <br />  Year </span>' ;  echo '<span><i class="fa fa-usd" aria-hidden="true"></i> <b> '.$plan->billed_monthly ; echo ' </b> <br /> Month </span>' ;}?> <div class="arrow01"></div></h4>

                    <ul>

                      <li><p><i class="fa fa-envelope" aria-hidden="true"></i><B>Email Support : </B> <span><?php echo $plan->email_support;?></span></p></li>

                        <li><p><i class="fa fa-share-square" aria-hidden="true"></i><B>Social Login : </B> <?php if($plan->social_login==1) { echo '<span>Yes</span>' ; } else{ echo '<span>No</span>' ; }?></p></li>

                        <li><p><i class="fa fa-check-circle" aria-hidden="true"></i><B>Booking : </B> <span><?php echo $plan->no_of_booking;?></span></p></li>

                        <li><p><i class="fa fa-commenting" aria-hidden="true"></i><B>Free Quotes : </B> <span><?php echo $plan->no_of_free_quotes;?></span></p></li>

                        <li><p><i class="fa fa-video-camera" aria-hidden="true"></i><B>Video Chat : </B><?php if($plan->video_chat==1) { echo '<span>Yes</span>' ; } else{ echo '<span>No</span>' ; }?></p></li>

                    </ul>

                    <h5><span><label set-scheme="#scheme3"><input class="flat" type="radio" value="<?php echo $plan->id;?>" name="plan_id" <?php if($this->session->userdata('plan_id')==$plan->id){ echo 'selected';}?>> Select</label></span></h5>

                </div>

            </div>

            <?php $i++; } ?>

        </div>

    </div>

</div>

        <!-- <div class="register_free scheme" id="scheme1" >

          <div class="container">

              <div class="register_free01">

                  <h3 class="wow fadeInUp"></h3>

                  <ul>

                      <li class="wow bounceIn" data-wow-delay=".1s"><img src="<?php echo base_url();?>assets/common/images/register_arrow.png" class="wow fadeInLeft" data-wow-delay=".3s" /><i class="fa fa-tasks" aria-hidden="true"></i><p>Browse jobs matching your skills</p></li>

                      <li class="wow bounceIn" data-wow-delay=".6s"><img src="<?php echo base_url();?>assets/common/images/register_arrow.png" class="wow fadeInLeft" data-wow-delay=".8s" /><i class="fa fa-address-card-o" aria-hidden="true"></i><p>Apply for <br />work</p></li>

                      <li class="wow bounceIn" data-wow-delay=".9s"><i class="fa fa-money" aria-hidden="true"></i><p>Get hired and earn money</p></li>

                  </ul>

                  <input type="button" set-scheme="#scheme2" value="Next" class="btn btn-success">

                  

              </div>

          </div>

      </div> -->





          <div class="register_skill">

            <div class="container">

                <?php /*?><div class="register_skill01 scheme" id="scheme3">

                    <ul>

                     <?php $i=0;

                        foreach($categoryList as $category){?>

                      

                        <li class="slide-right wow bounceIn" onClick="getSubCategory('<?php echo $category->id;?>');" id="category" data-id="<?php echo $category->id;?>" data-wow-delay=".<?php echo $i;?>s" set-scheme="#scheme4"><div class="skill_reg"><i class="<?php if($category->category_name=='IT & Web Services'){ ?>fa fa-desktop<?php } else if($category->category_name=='Marketing'){ ?>fa fa-line-chart <?php } else if($category->category_name=='Lawyers & Solicitors') { ?> fa fa-users <?php } else if($category->category_name=='Accountant') { ?> fa fa-user <?php } else if($category->category_name=='Financial Advisors') { ?>fa fa-user-secret <?php } else{?>fa fa-mobile <?php } ?>" aria-hidden="true"></i><p><?php echo $category->category_name;?></p></div></li>

                          <?php $i++;} ?>

                      </ul>

                  </div><?php */?>
          
          <div class="register_service_new scheme" id="scheme3">
          <div type="button" class="slide-left but01" set-scheme="#scheme2"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Back</div>
              <ul>
              <?php $i=0;

                        foreach($categoryList as $category){
                          if($category->category_name=='Accountants') {?>
              <li onClick="getSubCategory('<?php echo $category->id;?>');" id="category" data-id="<?php echo $category->id;?>" ><img src="<?php echo base_url();?>assets/common/images/accountant.png" class="wow bounceIn" data-wow-delay=".1s"  set-scheme="#scheme4"/></li>
              <?php } if($category->category_name=='Lawyers & Solicitors') {?>
              <li onClick="getSubCategory('<?php echo $category->id;?>');" id="category" data-id="<?php echo $category->id;?>" ><img src="<?php echo base_url();?>assets/common/images/lawyers.png" class="wow bounceIn" data-wow-delay=".5s" set-scheme="#scheme4"/></li>
              <?php } if($category->category_name=='Consultants') {?>
              <li onClick="getSubCategory('<?php echo $category->id;?>');" id="category" data-id="<?php echo $category->id;?>"><img src="<?php echo base_url();?>assets/common/images/consaltans.png" class="wow bounceIn" data-wow-delay=".9s" set-scheme="#scheme4"/></li><br />
              <?php } if($category->category_name=='Marketing') {?>
              <li onClick="getSubCategory('<?php echo $category->id;?>');" id="category" data-id="<?php echo $category->id;?>"><img src="<?php echo base_url();?>assets/common/images/marketing.png" class="wow bounceIn" data-wow-delay=".14s" set-scheme="#scheme4"/></li>
              <?php } if($category->category_name=='IT & Web Services') {?>
              <li onClick="getSubCategory('<?php echo $category->id;?>');" id="category" data-id="<?php echo $category->id;?>"><img src="<?php echo base_url();?>assets/common/images/it-web.png" class="wow bounceIn" data-wow-delay=".19s" set-scheme="#scheme4" /></li><br />
              <?php } if($category->category_name=='Financial Advisors') {?>
              <li onClick="getSubCategory('<?php echo $category->id;?>');" id="category" data-id="<?php echo $category->id;?>"><img src="<?php echo base_url();?>assets/common/images/finalcial.png" class="wow bounceIn" data-wow-delay=".24s"  set-scheme="#scheme4" /></li>
              <?php } } ?>
            </ul>
          </div>

              </div>

              

          </div>



      <div class="register_skill1">

          <div class="box scheme" id="scheme4">

            <div class="container">

                <div class="skill_select">

                   <div type="button" class="but01" set-scheme="#scheme5" id="formScheme">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></div> <div type="button" class="slide-left but01" set-scheme="#scheme3"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Back to Categories</div>

                   <div class="me-select">
                        <ul id="me-select-list">
                        </ul>
                   </div>

                </div>

             </div>

          </div>

     </div>





     <div class="register_form_step scheme"  id="scheme5">

            <div class="container">

              <?php if(validation_errors()) { ?>

              

                <div class="alert alert-danger" role="alert" style="font-family: verdana;">

                <!--  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->

                  <?php echo validation_errors(); ?>

                </div>

              <?php } ?>

              <!-- <?php if($this->session->flashdata('success')){ ?>

                <div class="alert alert-success" role="alert" style="font-family: verdana;">

                <?php echo $this->session->flashdata('success'); ?>

                </div>

              <?php } ?> -->

                <div class="col-md-6 col-sm-6 cool-xs-12">

                    <div class="register_form_step1">

                          <img src="<?php echo base_url();?>assets/common/images/free_quet.png" />

                      </div>

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="register_form_step1 register_form_step3 ">

                          <div class="register_form111" id="planDiv">

                          </div>


                          <div class="register_form111">

                          <input type="text" class="form-control" placeholder="Business Name *" id="business_name" name="business_name" value="<?php echo $business_name;?>"></div>

                         <!--  <div class="register_form111">
                          <input type="text" class="form-control" placeholder="Business Registration Number *" id="business_registration_number" name="business_registration_number" value="<?php echo $business_registration_number;?>" ></div> -->

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
                           <!-- <input type="text" class="form-control" placeholder="Country *" id="country" name="country" value="<?php echo $country;?>" > -->
                           </div>
                           
                         <!--  <div class="register_form111">
                           <label>Upload Your Logo ( only png,jpg,jpeg and 80 * 43 in size) </label>
                            <input type="file" class="form-control" placeholder="Logo" id="business_logo" name="business_logo">

                          </div> -->
                          <div class="register_form111 terms_001">
                           <input id="c1" name="agreement" value="1" <?php if($agreement==1){ echo 'checked';}?> type="checkbox" ><label for="1"><span>I agree to terms and conditions and privacy policy</span>

                          </div>
                          <div class="error" style="color:red;"><strong><?php if($this->session->flashdata('flashSuccess')) { echo $this->session->flashdata('flashSuccess'); } ?></strong></div>
                          <div class="register_form111">
                            <div class="g-recaptcha" data-sitekey="6LeKCh4UAAAAAHkC8xIFTDd0vNUr0h0-VCUD5dpi"></div>
                          </div>

                          <div class="register_form111">

                          <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> <?php echo $submit_btn_value;?></button>

                           <p></p>
                          <p>( NOTE : As per the selected plan there would be no charge for now.)</p>


                          </div>

                      </div>

                  </div>

              </div>

        </div>



        <div type="button" style="display:none;" class="but01" set-scheme="#scheme6" id="formSchemeSecond">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></div>



          

              <div class="register_plan scheme" id="scheme6">

                <div class="container">

                    <div class="row thnk_page" >
<div type="button" class="slide-left but01" set-scheme="#scheme1"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Back</div>
						 <img src="<?php echo base_url();?>assets/common/images/thank.png" /><br />
                         <?php 

                          $paymentSession = $this->session->userdata('paymentSession');

                      //    if($paymentSession['txn_amount']=0){

                              ?>

                         <?php /*?><div class="col-md-3 col-sm-3 col-xs-12 wow bounceInLeft" data-wow-delay=".1s"> 

                            <div class="plan_box">

                                <h3><?php echo strtoupper($paymentSession['plan_name']);?></h3>

                                  

                                  <ul>

                                    <li><p><B>Amount : </B><?php echo $paymentSession['txn_amount'];?></p></li>

                                    <li><button type="button" class="btn btn-primary" id="saveCloseBid">Make Payment</button></li>

                                  </ul>

                                 

                              </div>

                          </div><?php */?>

                          <?php

                      //    }else{

                            echo "Thanks for Registering Your Business with ProYourWay.<br>
What's Next? <br>
Get leads and Win quotes";

                     //     }

                          ?>

                         

                      </div>

                  </div>

            </div>

            <div id="loading" style="display: none;">

                                <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />

                              </div>

             

         



</div>

</form>



<div id="paypal" style="display: none">

<?php echo '<form id="pay" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_xclick">

<input type="hidden" name="business" value="love4u_1352373210_biz@yahoo.co.in">

<input type="hidden" name="undefined_quantity" value="1">

<input type="hidden" name="item_name" value="'.$paymentSession['plan_name'].'">

<input type="hidden" name="item_number" value="dd01">

<input type="hidden" name="amount" id="paypalamount" value="'.$paymentSession['txn_amount'].'">

<input type="hidden" name="custom" id="order_id" value="">

<input type="hidden" name="return" value="'.base_url().'business/notify">

<input type="hidden" name="cancel_return" value="'.base_url().'business/cancel">

<input type="hidden" name="notify_url" value="'.base_url().'business/notify">

<input type="image" border="0" name="submit" src="http://images.paypal.com/images/x-click-but5.gif" alt="Buy doodads with PayPal">

</form>';?>

</div>



<script>



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

</script>

<script type="text/javascript">



$(document).ready(function(){

   $(".flat").click(function(){

      var plan = $(this).val();

      jQuery.ajax({  

        type: "POST",  

        url: "<?php echo base_url();?>business/setSessionForPlan",  

        data: {'plan': plan},  

          success: function(theResponse){

            //alert(theResponse);

            jQuery("#planDiv").html(theResponse); 

          }  

        });

    });

  /*$("#category").click(function(){

      var catId = $(this).data("id") ;

      alert(catId)

  });*/

});





function setSessionForEachCategory(){

  var matches = [];

  $(".ipchk:checked").each(function() {

    matches.push(this.value);

      jQuery.ajax({  

      type: "POST",  

      url: "<?php echo base_url();?>business/setSessionForEachCategory",  

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



function getSubCategory(catId)

{

  //alert(catId);

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

  //jQuery("#subC").html("<center>Loading...</center>");

      jQuery.ajax({  

      type: "POST",  

      url: "<?php echo base_url();?>business/getSubCategory",  

      data: {'ipchk': catId},  

        success: function(theResponse)

        {

          //alert(theResponse);

            //jQuery("#subC").html(theResponse); 

            jQuery("#me-select-list").html(theResponse); 

          }  

      }); 

}





$("#saveCloseBid").click(function(){

    $("#loading").show();

    $.ajax({

        type:"POST",

        url:"<?php echo base_url();?>business/payment",

        success:function(data){

            $("#loading").hide();

             $("#order_id").val(data);

             $( "#pay" ).submit();

        }

      });

  

   

});

$(window).load(function() {
  var plan = "<?php echo $this->session->userdata('plan_id');?>";

      jQuery.ajax({  

        type: "POST",  

        url: "<?php echo base_url();?>business/setSessionForPlan",  

        data: {'plan': plan},  

          success: function(theResponse){

           jQuery("#planDiv").html(theResponse); 

          }  

        });
});


</script>



      