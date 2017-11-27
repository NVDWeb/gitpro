  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- sidebar menu -->
        <!-- /sidebar menu -->
        <!-- top navigation -->
        <?php $this->load->view('admin/top-navigation');?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="boday_main">
          <div class="main_container01">
            <div class="right_col" role="main">
         <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Split Amount List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php echo base_url();?>admin/milestone/splitadd/<?php echo $milestoneId;?>"> <i class="fa fa-plus-circle"></i> Split Amount Add</a></li>
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
                    
						<?php if($this->session->flashdata('checkAmountNotExceeded')){ ?>
                        	<div class="alert alert-danger"><?php echo $this->session->flashdata('checkAmountNotExceeded');?></div>
                        <?php } ?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Member Name</th>
                          <th>Amount</th>
                          <th>Is Accepted</th>

                        </tr>
                      </thead>


                      <tbody>
                      <?php
                     if($splitAmount){
						 //echo '<pre>';print_r($splitAmount);
						 
                      foreach ($splitAmount as $row) {
                        echo '<tr>';
                        echo '<td>'.$row->first_name.'</td>';
						if($row->member_id == $this->session->userdata('adminId') && $row->realeased_status == 0){
							echo '<td>';							
							echo ' <input type="hidden" id="split_amountId" value="'.$row->id.'">';
							echo ' <input type="hidden" id="milestone_id" value="'.$row->milestone_id.'">';
							echo ' <input type="hidden" id="member_id" value="'.$row->member_id.'">';
							echo '<input type="text" style="width: 100px" name="amount_split" id="amount_split" class="form-control" value="'.$row->amount.'">';
							echo '  <button class="btn btn-success bid01" id="updateAmount" onClick="updateAmount();"> Update </button>';
							
                        	//echo $row->amount;
							echo '</td>';
						}else{
							echo '<td>'.$row->amount.'</td>';
						}
                        if($row->status==0){
                          echo '<td>Not Accepted Yet</td>';
                        }else if($row->status==2) {
                          echo '<td>Rejected | <button class="btn btn-primary" onclick="assignAmount('.$row->milestone_id.','.$row->member_id.','.$this->session->userdata('adminId').')">Assign Amount to Me</button></td>';
                        }else{
                          echo '<td>Accepted </td>';
                        }
                        echo '</tr>';


                      }
                    }else{
                      echo '<td>No Data Found</td>';
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

function assignAmount(milestone_id,member_id,team_admin_id){
  if(member_id && team_admin_id){
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/milestone/assignAmountToTeamAdmin",
      data: {milestone_id,member_id,team_admin_id},
      success: function(data) {
        if(data=='Success'){
          location.reload();
        }else{
          alert('Amount is not assign to you.');
          location.reload();
        }
      }
    });
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

 function updateAmount(){
  var split_amountId = $("#split_amountId").val();
  var milestone_id = $("#milestone_id").val();
  var member_id = $("#member_id").val();
  var amount_split = $("#amount_split").val();
  jQuery.ajax({
    type: "POST",
    url: "<?php echo base_url();?>admin/milestone/updateSplitAmount",
    data: {split_amountId: split_amountId,milestone_id:milestone_id,member_id:member_id,amount_split:amount_split},
    success: function(data) {
		//alert(data);
		if(data='success'){
			location.reload();
		}else{
			location.reload();			
		}
      //location.reload();
    }
  });
}

</script>
