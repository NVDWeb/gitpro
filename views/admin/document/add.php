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
                          <div class="x_title page_tit">
                            <h2>Create Agreement</h2>
                            <div class="clearfix"></div>
                          </div>
                          <iframe src='https://docs.google.com/viewer?url=https://www.proyourway.com/beta/uploads/agreement/<?php echo $this->session->userdata('legalFile');?>&embedded=true' style='width:1300px; height:450px;' frameborder='0'></iframe>
                          <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://www.proyourway.com/beta/uploads/agreement/<?php echo $this->session->userdata('legalFile');?>' style="width:1300px; height:450px;" frameborder='0'></iframe>
 -->

                         
                          <div class="x_content">
                          	<div class="profile_form_update edu_update01 client_log">
                            <span style="color:red;"><?php echo validation_errors(); ?></span>
                              
                            <?php
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                                    echo form_open_multipart($action,$attributes); ?>
        
                            <div class="row form-group">
                                                                     
                            
        
                            <?php

                            
                              if(form_error('company_name')){
                              
                                  $errorStylecompany_name="border:1px solid red";
                              }else{
                                  $errorStylecompany_name="";
                              }

                              
                              
                            ?>
                            
                              <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                <label class="" for="first-name">Project <span class="required">*</span></label>
                                <select name="quotation_id" class="form-control" style="<?php echo $errorStylequotation_id;?>">
                                    <option value="0">--Select Project--</option>
                                    <?php foreach($quotationList as $row){
                                      echo '<option value="'.$row->id.'" '.($quotation_id== $row->id ? "selected" : '').'>'.$row->project_name.'</option>';
                                    }?>
                                  </select>
                                 
                                  <span style="color:red;"><?php echo form_error('quotation_id');?></span>
                              </div> -->
                              <input type="hidden" name="quotation_id" value="<?php echo $quotation_id;?>">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Name as Signature* </label>
                                <input type="text" name="company_name" id="company_name" value="<?php echo $company_name;?>" style="<?php echo $errorStylecompany_name;?>">
                                <span style="color:red;"><?php echo form_error('company_name');?></span>
                              </div>
                               
                              <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Contractor Name* </label>
                                <input type="text" name="contractor_name" id="contractor_name" value="<?php echo $contractor_name;?>" style="<?php echo $errorStylecontractor_name;?>">
                                <span style="color:red;"><?php echo form_error('contractor_name');?></span>
                              </div> -->

                             <!--  <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="" for="email">Aggrement can be executed from* </label>
                                 <input type="text" style="width: 270px" name="reservation" id="single_cal4" class="form-control" value="">
                                <span style="color:red;"><?php echo form_error('contractor_name');?></span>
                              </div> -->

                              <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                              <label class="" for="first-name">Upload Signature</label>
                              <div class="text_box_icon"><i class="fa fa-upload" aria-hidden="true"></i></div>
                                <input type="file" id="file" name="signature">
                                <span style="color:red;"><?php echo form_error('signature');?></span>
                            </div> -->
                             
                            </div>
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="profile_edit0">
                                  <input type="submit" class="btn btn-primary" value="<?php echo $submit_btn_value; ?>">
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
            </div>
          </div>
        </div>
        <!-- /page content -->

<script>
function showDiv(hireda){
    if(hireda==1){
      $("#showTeamCat").show();
      $("#showCat").hide();
    }else{
      $("#showTeamCat").hide();
      $("#showCat").show();
    }
}
  function getSubCategoriesByParentId(categoryId){
    //alert(categoryId);
    if(categoryId){
      if(categoryId==1){
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
</script>
