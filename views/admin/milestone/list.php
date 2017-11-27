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
                    <h2>Milestone</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php echo base_url();?>admin/milestone/add/<?php echo $b_id;?>/<?php echo $q_id;?>"> <i class="fa fa-plus-circle"></i> Add Milestone</a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <?php if($this->session->userdata('admin_user_type')==3) { ?>
                            <th>Professional Name</th>
                          <?php } ?>
                          <th>Project  Name</th>
                          <th>Milestone Created</th>
                          <?php if($this->session->userdata('admin_user_type')==3) { ?>

                            <th>Action</th>
                          <?php } else{ ?>
                              <th>Edit</th>
                        <?php  } ?>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                      $i=0;
                      $j=0;
                      $te=0;
                      foreach ($milestoneList as $row) {
                        if(isset($row->business_name)){
                        if($this->session->userdata('admin_user_type')==3){
                          $b_id = $row->assignedbusiness_id;
                        }else{
                          $b_id = $this->session->userdata('adminId');
                        }
                        echo '<tr>';
                        if($this->session->userdata('admin_user_type')==3) {
                          echo '<td>'.$row->business_name.'</td>';
                        }
                        echo '<td>'.$row->project_name.'</td>';
                        echo '<td>'.$row->totalMilestone.'</td>';
                        echo '<td><a href="'.base_url().'admin/milestone/view/'.$b_id.'/'.$row->q_id.'">View</a></td>';
                        echo '</tr>';
                      }
                    }
                      ?>

                      </tbody>
                    </table>
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

<!-- Confirmation popup Start here -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Pay to Professional</h4>
      </div>
      <div class="modal-body">
        Realesed funds cannot be returned.Are you sure you want to continue?
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-default" id="close">No</button>
        <button type="button" class="btn btn-primary" id="save">Yes</button>
      </div>

    </div>
  </div>
</div>
<!--Ends Here -->

<script type="text/javascript">
$(document).ready(function() {
  $("#startD").click(function(){
    $("#startD").hide();
    $("#hh").show();
  });

  $("#close").click(function() {
    $(".bs-example-modal-lg").modal('hide');
    location.reload();
  });

  $("#close1").click(function() {
    $(".bs-example-modal-lg").modal('hide');
    location.reload();
  });

});

function changeStatus(milestoneId,clientID,businessID,amount,type){
  if(type==1){
    $(".bs-example-modal-lg").modal();
  }else if(type==2){
    $(".bs-example-modal-lgCancel").modal();
  }else{
    $(".bs-example-modal-lgDispute").modal();
  }
}

function updateDateRange(){
  var dateRange = $("#reservation").val();
  var milestoneId = $("#milestoneId").val();
  jQuery.ajax({
    type: "POST",
    url: "<?php echo base_url();?>admin/milestone/updateMilestoneDates",
    data: {dateRange: dateRange,milestoneId:milestoneId},
    success: function(data) {
      location.reload();
    }
  });
}

</script>
