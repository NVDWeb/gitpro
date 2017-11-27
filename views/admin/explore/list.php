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
                              <?php if($this->session->userdata('admin_user_type')==2){ ?>
                              <h2>Search Team to join</h2> 
                              <?php } else{ ?>
                              <h2>Search Team to Hire</h2> 
                                <?php }?>                             
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            
                            <div class="profile_form_update edu_update01 lead_box">
            
                              <?php
                              $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
            
                              echo form_open_multipart($action='',$attributes); ?>
                              	
                                
                                <div class="row form-group">
                                	<div class="col-md-offset-3 col-md-2 col-sm-3 col-xs-12">
                                    	<label class="" for="first-name">CATEGORY  <span class="required">*</span></label>
                                    </div>
                                  
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="category" id="category" class="" onChange="getTeam(this.value);" required>
                                      <option>--Select Category--</option>
                                      <?php foreach($categoryList as $row){
                                        echo '<option value="'.$row->id.'" '.($cat==$row->id ? 'selected': '').'>'.$row->category_name.'</option>';
                                      }?>
                                    </select>
                                  </div>
                                </div>
            
                                <!--<div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Sub Category <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <select name="sub_category" class="form-control" id="sub_category" onChange="getTeam(this.value);">
                                      <?php //echo $subcat;?>
                                    </select>
                                  </div>
                                </div>-->
                                <table id="datatable" class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Team Name</th>
                                      <th>Action</th>
            
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    //print_r($getTeamArray);
                                    foreach ($getTeamArray as $row) {
                                        //echo '<pre>';print_r($row);                          
                                        echo '<tr><td>'.$row->team_name.'</td>';                            
                                        echo '<td><a href="'.base_url().'admin/explore/team/'.$row->teamId.'" class=""><button type="button" class="tabl_link"><i class="fa fa-eye"></i> View</button></a></td>
                                        </tr>';
                                  } ?>
            
            
            
                                </tbody>
                              </table>
            
                                <div class="ln_solid"></div>
            
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
<!--Place you BID AMOUNT popup-->
<div class="modal fade bs-example-modal-lgteamRequest" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Requested to Join Team</h4>

      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-success" id="close2">Ok</button>
      </div>

    </div>
  </div>
</div>
      <!-- Ends here -->

<script>
$(document).ready(function(){
  $("#close2").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });
  $("#close3").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });
});

function getSubCategoriesByParentId(categoryId){
  if(categoryId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/getSubCategoriesByParentId",
      data:{categoryId:categoryId},
      success: function(data){
        $("#sub_category").html(data);
      }
    });
  }
}

function getTeam(sub_category){
  $("#demo-form2").submit();
  // var category = $("#category option:selected").val();
  // if(category){
  //   $.ajax({
  //     type:"POST",
  //     url:"<?php echo base_url();?>admin/team/getTeamByCategoryAndSubcategory",
  //     data:{category:category,sub_category:sub_category},
  //     success:function(res){
  //       alert(res);
  //       $("#result").html(res);
  //     }
  //   });
  // }
}

function teamJoinRequest(teamId,member_id){
  if(teamId){
    $.ajax({
       type:"POST",
        url:"<?php echo base_url();?>admin/team/teamJoinRequest",
        data:{teamId:teamId,member_id:member_id},
        success:function(res){
          if(res==1){
            $(".modal-body").html('Your request to join team has been submitted to the Team Admin.You will be the part of the team once confirmed by the Admin.');
            $(".bs-example-modal-lgteamRequest").modal('show');
          }else if(res==2){
			   $(".modal-body").html('You have already joined this team.');
            	$(".bs-example-modal-lgteamRequest").modal('show');
			 
			}else{
            $(".modal-body").html('You have already sent a request to join this team.');
            $(".bs-example-modal-lgteamRequest").modal('show');
          }
          //$("#result").html(res);
        }
      });
  }
}
</script>
