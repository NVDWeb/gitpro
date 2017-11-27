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
                        <?php if($this->session->userdata('admin_user_type')==1){?>
                          <th>Business Name/Individual Name</th>
                          <th>Quotation Type</th>
                        <?php  }?>
                          <th>Category</th>
                          <?php if($hireda!='Team'){ ?>
                            <th>Sub Category</th>
                          <?php } ?>
                          <th>Work Detail</th>
                          <th>Assigned To</th>
                          <th>Quotation Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>


                      <tbody>

                          <?php foreach ($quotationList as $row) {
                          //echo '<pre>';  print_r($row);
                          echo '<input type="hidden" id="quotation_'.$row->id.'" value="'.$row->proposal_count.'">';

                            $proposalCount = $row->proposal_count*5;
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
                          if($hireda!='Team'){ echo '<td>'.$row->sub_category.'</td>'; }
                          echo '<td class="contet_work">'.$row->work_detail.'</td>';
                          echo '<td>'.($row->assignedbusiness_id!=0 ? @$row->business_name : 'Not Assigned').'</td>';?>
                          <td><?php if($bidStatus=='Open'){ echo 'Bid is open for '.$proposalCount.' Teams';}else if($row->assignedbusiness_id!=0){ echo 'Bid Is Closed';}else{ echo 'Bid is Closed <a href="javascript:void(0);" class="tabl_link open" id="open_'.$row->id.'" data-id="'.$row->id.'">Click to open</a>';};?></td>
                          <?php //echo '<td>'.($bidStatus=='Open' ? 'Bid is open for '.$bidCount.' Professionals' : 'Bid is Closed <a href="javascript:void(0);" class="btn btn-success open" id="open_'.$row->id.'" data-id="'.$row->id.'">Click to open</a>').'</td>';?>
                          <?php echo '<td> '.($row->totalProposal ? '' : '<a href="'.base_url().'admin/quotation/edit/'.$row->id.'" class="tabl_link"><i class="fa fa-edit"></i></a>  <a href="javascript:void(0);" class="delete tabl_link" id="delete_'.$row->id.'" data-id="'.$row->id.'" ><i class="fa fa-trash"></i></a>').'
                          '.(( ($this->session->userdata('admin_user_type')==3 || $this->session->userdata('admin_user_type')==1 )&& $row->totalProposal > 0 ) ? '<a href="'.base_url().'admin/quotation/proposals/'.$row->id.'">Total '.$row->totalProposal.' Proposal </a>': '').'
                          </td> </tr>';
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
