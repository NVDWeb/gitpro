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
                  <h2>Milestone Amount Details</h2>
                  <div class="clearfix"></div>
                </div>
                <?php $paymilestone = $this->session->userdata('paymilestone'); ?>
                <div class="x_content">
                    <div class="bid_01"><div class="bid_01_half"><label>Milestone Name</label></div>
                     <?php echo $paymilestone['milestone_name'];?>
                    </div>



                    <div class="bid_01"><div class="bid_01_half"><label>Amount</label></div>
                     <?php echo $paymilestone['amount'];?>
                    </div>

                    <div class="bid_01"><div class="bid_01_half"><label>Paypal Service Charge</label></div>
                     2.85 %
                    </div>
					<div class="bid_01"><div class="bid_01_half"><label>Proyourway Service Charge</label></div>
                     3.00 %
                    </div>

                    <!--<div class="bid_01"><div class="bid_01_half"><label>Total Amount to be Paid</label></div>
                     <?php //$t= $paymilestone['amount']*2.85;  $ttt = $t/100 ; echo $paymilestone['amount']+$ttt.' AUD' ;?>
                    </div>-->
					<div class="bid_01"><div class="bid_01_half"><label>Total Amount to be Paid</label></div>
                     <?php 
                     $t= $paymilestone['amount']*2.85; 
                     $ttt = $t/100 ;
                    //$subtotal = $paymilestone['amount']+$ttt;
					           $st= $paymilestone['amount']*3;  $sttt = $st/100 ; echo $paymilestone['amount']+$ttt+ $sttt .' AUD'; $total = $paymilestone['amount']+$ttt+ $sttt ;
					 ?>
                    </div>



                    <div class="bid_01"><div class="bid_01_half"><label>Your Action</label></div>
                     <button class="btn btn-primary" id="acc">Accept</button>
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

<!--Ends Her-->

<div  style="display: none">
      <form id="milestonePaypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="business" value="love4u_1352373210_biz@yahoo.co.in">
      <input type="hidden" name="undefined_quantity" value="1">
      <input type="hidden" name="item_name" id="item_name" value="<?php echo $paymilestone['milestone_name'];?>">
      <input type="hidden" name="item_number" value="dd01">
      <input type="hidden" name="amount" id="paypalamount" value="<?php echo $total;?>">
      <input type="hidden" name="rm" value="2">
      <input type="hidden" name="custom" id="order_id" value="<?php echo $paymilestone['order_id'];?>">
      <input type="hidden" name="return" value="<?php echo base_url();?>admin/milestone/notifymilestone">
      <input type="hidden" name="cancel_return" value="<?php echo base_url();?>admin/quotation/cancelMilestone">
      <input type="hidden" name="notify_url" value="<?php echo base_url();?>admin/milestone/notifymilestone">
      <input type="image" border="0" name="submit" src="http://images.paypal.com/images/x-click-but5.gif" alt="Buy doodads with PayPal">
      </form>
      </div>


<!--delete services script-->
<script type="text/javascript">
$(document).ready(function() {
  $("#acc").click(function() {
    $("#milestonePaypal").submit();

  });
});




</script>
