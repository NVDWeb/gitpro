<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- sidebar menu -->
          <?php //$this->load->view('admin/left-sidebar');?>
      <!-- /sidebar menu -->
      <!-- top navigation -->
      <?php $this->load->view('admin/top-navigation');?>
      <!-- /top navigation -->

      <div class="boday_main">
        <div class="main_container01">
            <!-- page content -->
           <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Split Amount</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <span style="color:red;"><?php echo validation_errors(); ?></span>

                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                    echo form_open_multipart($action,$attributes); ?>
                    <input type="hidden" name="milestone_id" value="<?php echo $milestone_id;?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Select Team * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                         <select name="team_id" class="form-control" onchange="getTeamById(this.value);">
                          <option value="0">Select Team</option>
                          <?php foreach ($teamList as $value) { ?>
                          <option value="<?php echo $value->id;?>" <?php if($value->id==$team_id) { echo 'selected'; } ?>><?php echo $value->team_name;?></option>
                          <?php } ?>
                          
                        </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Select Member * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                         <select name="member_id" class="form-control" id="result">
                          <option value="0">Select Member</option>
                         
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Amount* : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" name="amount" id="amount" value="<?php echo $amount;?>" class="form-control">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="<?php echo $submit_btn_value; ?>">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

              </div>





                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<script>
  function getSubCategoriesByParentId(categoryId){
    //alert(categoryId);
    if(categoryId){
      if(categoryId==3){
        $("#software").show();
      }else{
        $("#software").hide();
        $("#software_used").val('');
      }

      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/quotation/getSubCategoriesByParentId",
        data:{categoryId:categoryId},
        success: function(data){
          $("#sub_category").html(data);
        }
      });

    }
  }

  function getTeamById(team_id){
    if(team_id){
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/milestone/getTeamById",
        data:{team_id:team_id},
        success: function(data){
          $("#result").html(data);
        }
      });
    }
    
  }
</script>
