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
                              <h2>Search Team to join</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
            
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
            
                              <?php
                              $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
            
                              echo form_open_multipart($action='',$attributes); ?>
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Category <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <select name="category" id="category" class="form-control" onChange="getSubCategoriesByParentId(this.value);" required>
                                      <option>--Select Category--</option>
                                      <?php foreach($categoryList as $row){
                                        echo '<option value="'.$row->id.'" '.($cat==$row->id ? 'selected': '').'>'.$row->category_name.'</option>';
                                      }?>
                                    </select>
                                  </div>
                                </div>
            
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-6" for="first-name">Sub Category <span class="required">*</span>
                                  </label>
                                  <div class="col-md-3 col-sm-3 col-xs-3">
                                    <select name="sub_category" class="form-control" id="sub_category" onChange="getTeam(this.value);">
                                      <?php echo $subcat;?>
                                    </select>
                                  </div>
                                </div>
                                <table id="datatable" class="table table-striped table-bordered">
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
                                      if($row->team_name){
                                        echo '<tr><td>'.$row->team_name.'</td>';
                                        echo '<td><a href="javascript:void(0);" class="btn btn-success" onclick="teamJoinRequest('.$row->teamId.','.$this->session->userdata('adminId').')">Join</a></td></tr>';
                                      }
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
          //alert(res);
          if(res==1){
            $(".modal-body").html('Your request to join team has been submitted to the Team Admin.You will be the part of the team once confirmed by the Admin.');
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
