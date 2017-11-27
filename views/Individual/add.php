<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<body>
<div class="container">
<div class="row">
 
   <script type="text/javascript">
     
//window.setTimeout(function() { $(".alert-danger").slideUp(2000); }, 2000);
window.setTimeout(function() { $(".alert-danger").alert('close'); }, 2000);

   </script>

   <?php if($this->session->flashdata('success')){ ?><div class="alert alert-success" role="alert" style="font-family: verdana;"> <button type="button" class="close" data-dismiss="alert">x</button><?php echo $this->session->flashdata('success'); ?></div> <?php } ?>

    <?php if(validation_errors()) { ?><div class="alert alert-danger" role="alert" style="font-family: verdana;"> <button type="button" class="close" data-dismiss="alert">x</button><?php echo validation_errors(); ?></div> <?php } ?>
    <label class="control-label">Individual Registration </label><hr>
    <form class="form-horizontal" action="<?php echo $action;?>" method="post">
     
      <div class="form-group">
        <label class="control-label col-sm-4">Name <span style="color:red;">*</span> </label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>" placeholder="Name">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4">Mobile <span style="color:red;">*</span> </label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>" placeholder="Mobile">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4">Email <span style="color:red;">*</span></label>
        <div class="col-sm-4"> 
          <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>" placeholder="Email">
        </div>
      </div>
      
      
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


			