<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


<script type="text/javascript">
//window.setTimeout(function() { $(".alert-danger").slideUp(2000); }, 2000);
window.setTimeout(function() { $(".alert-danger").alert('close'); }, 2000);
window.setTimeout(function() { $(".alert-success").alert('close'); }, 2000);
</script>

   
    <label class="control-label" style="text-align: center;">Business Registration </label><hr>
    <?php if($this->session->flashdata('success')){ ?><div class="alert alert-success" role="alert" style="font-family: verdana;"><?php echo $this->session->flashdata('success'); ?></div> <?php } ?>

    <?php if(validation_errors()) { ?><div class="alert alert-danger" role="alert" style="font-family: verdana;"><?php echo validation_errors(); ?></div> <?php } ?>
    <form class="form-horizontal" action="<?php echo $action;?>" method="post">
       
      

        <div class="form-group">
        <?php foreach ($plans as $plan){ ?>
          <div class="columns">
            <ul class="price">
              <li class="header"><?php echo $plan->plan_name;?></li>
              <li class="grey"><?php if($plan->plan_name=='Free') { echo 'No Charge' ; echo ' <br> No Charge' ; }else { echo '$ '.$plan->billed_annually ; echo ' / Year ' ;  echo '<br> $ '.$plan->billed_monthly ; echo ' / Month ' ;}?></li>
              <li><strong>Email Support : </strong> <?php echo $plan->email_support;?></li>
              <li><strong>Social Login : </strong> <?php if($plan->social_login==1) { echo 'Yes' ; } else{ echo 'No' ; }?></li>
              <li><strong>Booking : </strong> <?php echo $plan->no_of_booking;?></li>
              <li><strong>Free Quotes : </strong> <?php echo $plan->no_of_free_quotes;?></li>
              <li><strong>Video Chat : </strong> <?php if($plan->video_chat==1) { echo 'Yes' ; } else{ echo 'No' ; }?></li>
              <li class="grey">
              <input class="flat"  type="radio" value="<?php echo $plan->id;?>" name="plan_id">Select</li>
            </ul>
          </div>
          <?php } ?>
          
        </div>
      

       <div class="form-group">
        <label class="control-label col-sm-4">Choose Business Category </label>
        <div class="col-sm-6"> 
          <?php $i=0;
              foreach($categoryList as $category){ ?>
              <input class="ipchk" onClick="getSubCategory();" type="radio" value="<?php echo $category->id;?>" name="category[]"><?php echo $category->category_name;?>
              
               <?php } $i++;?>
        </div>
      </div>

      <div class="form-group" id="subC">
        
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4">Business Name <span style="color:red;">*</span> : </label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name" value="<?php echo $business_name;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Business Registration Number <span style="color:red;">*</span> : </label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="business_registration_number" name="business_registration_number" value="<?php echo $business_registration_number;?>" placeholder="Business Registration Number">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4">Business Contact Person Name <span style="color:red;">*</span> : </label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" value="<?php echo $contact_person_name;?>" placeholder="Business Contact Person Name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Mobile <span style="color:red;">*</span>: </label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>" placeholder="Mobile">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Email <span style="color:red;">*</span> :</label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>" placeholder="Email">
        </div>
      </div>
      <!--<div class="form-group">
        <label class="control-label col-sm-4">Business Adress</label>
        <div class="col-sm-4"> 
          <textarea class="form-control" placeholder="Address" name="business_address" id="business_address"><?php echo $business_address;?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Country</label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="country" name="country" value="<?php echo $country;?>" placeholder="Country">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Postcode</label>
        <div class="col-sm-4"> 
        <input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $postcode;?>" placeholder="Postcode">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Choose Business Category</label>
        <div class="col-sm-4"> 
        <select class="form-control" id="category" name="category" onchange="getCategoryByParentId(this.value);">
           <option>--Select Business Category--</option>
            <?php $i=0;
              foreach($categoryList as $category){ ?>
              <option value="<?php echo $category->id;?>"
              <?php if($Postcategory==$category->id){?> selected="selected" <?php } ?>><?php echo $category->category_name;?></option>
               <?php } $i++;?>
        </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4">Select Sub Category</label>
        <div class="col-sm-4"> 
            <select class="form-control" id="subcategory" name="subcategory" >
            <option value=''>--Select Sub Category--</option>
            </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4">Additional Details and Expertise</label>
        <div class="col-sm-4"> 
          <textarea class="form-control" placeholder="Additional Details and Expertise" name="additional_details" id="additional_details"><?php echo $additional_details;?></textarea>
        </div>
      </div>-->
      
      <div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-4">
          <button type="submit" class="btn btn-success"><?php echo $submit_btn_value;?></button>
        </div>
      </div>
    </form>
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
      url: "<?php echo base_url();?>business/getSubCategory",  
      data: {'ipchk': matches},  
        success: function(theResponse)
        {
          //alert(theResponse);
          jQuery("#subC").html(theResponse);  
          }  
      }); 
}
</script>

			