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
                    <h2>Quotation</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php echo base_url();?>admin/quotation/add"> <i class="fa fa-plus-circle"></i> Add Quotation</a></li>
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
                        <?php //echo '<pre>';print_r($this->session->userdata);?>
                        <?php if($this->session->userdata('admin_user_type')==1){?>
                          <th>Business Name/Individual Name</th>
                          <th>Quotation Type</th>
                        <?php  }?>
                          <th>Category</th>
                          <th>Sub Category</th>
                          <th>Work Detail</th>
                          <th>Assigned To</th>
                          <th>Quotation Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>


                      <tbody>

                          <?php foreach ($quotationList as $row) {
							  //echo '<pre>';print_r($row);
                          echo '<input type="hidden" id="quotation_'.$row->id.'" value="'.$row->bid_count.'">';
                          $bidCount = $row->proposal_count*5;
                          if($row->bid_status==0){
                            $bidStatus = 'Open';
                          }else{
                            $bidStatus = 'Closed';
                          }
                          echo '<tr>';
                          if($this->session->userdata('admin_user_type')==1){
                            echo '<td>'.($row->business_id !='0' ? $row->business_name : $row->name).'</td>';
                          }
                          if($this->session->userdata('admin_user_type')==1){
                            echo '<td>'.($row->business_id !='0' ? 'Business' : 'Individual').'</td>';
                          }
                          echo '<td>'.$row->category_name.'</td>';
                          echo '<td>'.$row->sub_category.'</td>';
                          echo '<td>'.$row->work_detail.'</td>';
                          echo '<td>'.($row->assignedbusiness_id!=0 ? $row->business_name : 'Not Assigned').'</td>';?>
                          <td><?php if($bidStatus=='Open'){ echo 'Bid is open for '.$bidCount.' Professionals';}else if($row->assignedbusiness_id!=0){ echo 'Bid Is Closed';}else{ echo 'Bid is Closed <a href="javascript:void(0);" class="btn btn-success open" id="open_'.$row->id.'" data-id="'.$row->id.'">Click to open</a>';};?></td>
                          <?php //echo '<td>'.($bidStatus=='Open' ? 'Bid is open for '.$bidCount.' Professionals' : 'Bid is Closed <a href="javascript:void(0);" class="btn btn-success open" id="open_'.$row->id.'" data-id="'.$row->id.'">Click to open</a>').'</td>';?>
                          <?php if($this->session->userdata('admin_user_type')==1){?>
                          <td>
                          <a href="<?php echo base_url();?>admin/quotation/view/<?php echo $row->id;?>"><button class="btn btn-primary">View</button></a>
                          <?php if($row->is_verifed == 0){?>
                          <button class="btn btn-primary" onClick="verified(<?php echo $row->id;?>,<?php echo $row->created_by;?>)">Active</button>
                          <?php }else {?>
                          <button class="btn btn-primary">Verified</button>
                          <?php }?>
						  </td>
                          </tr>
                        <?php } else { ?>
                        
                        <?php echo '<td> '.($row->totalBid ? '' : '<a href="'.base_url().'admin/quotation/edit/'.$row->id.'"><i class="fa fa-edit"></i></a> | <a href="javascript:void(0);" class="delete" id="delete_'.$row->id.'" data-id="'.$row->id.'" >Delete</a>').'
                          '.(( ($this->session->userdata('admin_user_type')==3 || $this->session->userdata('admin_user_type')==1 ) && $row->totalProposal > 0 ) ? '<a href="'.base_url().'admin/quotation/proposals/'.$row->id.'"> <strong>Total '.$row->totalProposal.' Proposals </strong></a>': '').'
                          </td> </tr>';
						  }
						  }?>

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

 <!--delete services script-->
<script type="text/javascript">
// Ajax post
$(document).ready(function() {
  $(".delete").click(function(event) {
    event.preventDefault();
    var deleteid = $(this).data('id');
    var parent = $(this).parent("td").parent("tr");
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/quotation/deleteQuotation",
      data: {quotation_id: deleteid},
      success: function(data) {
        if (data=='success'){
           parent.fadeOut('slow');
           $("#successMsg").html('Deleted.');
          setTimeout(function(){$('#successMsg').hide()}, 4000);
        }else{
          $("#errorMsg").html('Some error to delete Business.');
          setTimeout(function(){$('#errorMsg').hide()}, 4000);

        }
      }
    });
  });

  $(".open").click(function(event) {
    //alert('open');
    event.preventDefault();
    var quotationId = $(this).data('id');
    var bid_count = $("#quotation_"+quotationId).val();
    //alert(quotationId);
  //  alert(bid_count);
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/quotation/updateQuotationBidStatus",
      data: {quotation_id: quotationId,bid_count:bid_count},
      success: function(data) {
        location.reload();
      }
    });
  });


});

function updateStatus(businessId,status){
  //alert(businessId);
  //alert(status);
  if(businessId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/business/updateStatus",
      data:{businessId:businessId,status:status},
      success:function(data){
        location.reload();
        /*if(data==0){
          $("#status_"+businessId).html('Inactive');
        }else{
          $("#status_"+businessId).html('Active');
        }
        window.reload();*/

      }
    });
  }

}

function verified(quotationId,created_by){
  if(quotationId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/quotation/verified",
      data:{quotationId:quotationId,created_by:created_by},
      success:function(data){
        location.reload();
      }
    });
  }
}
</script>
