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
                            <h2>Quotation</h2>
                            <div class="clint_right_link">
                                 <a href="<?php echo base_url();?>admin/quotation/add"> <i class="fa fa-plus-circle"></i> Add Quotation</a>
                            </div>                            
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                          	<div class="profile_form_update edu_update01 lead_box">
                            <div id="errorMsg" style="color:red"></div>
                            <div id="successMsg" style="color:green"></div>
                            <table id="datatable" class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Proposal by</th>
                                  <th>Proposal date</th>
                                  <th>Action</th>
        
                                </tr>
                              </thead>
        
        
                              <tbody>
        
                                  <?php
                                  //echo '<pre>';  print_r($allProposal);
                                  foreach ($allProposal as $row) {
        
                                  echo '<tr>';
                                  echo '<td>'.$row->first_name.'</td>';
                                  echo '<td>'.date('Y-m-d',strtotime($row->created_date)).'</td>';
                                  echo '<td><a href="'.base_url().'admin/quotation/proposal/'.$row->id.'" class="tabl_link"><i class="fa fa-eye"></i> View</a></td>';
                                  echo '</tr>';
                                } ?>
        
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
</script>
