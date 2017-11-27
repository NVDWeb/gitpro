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
                  <h2>Payment Details</h2>
                  
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">



                      

                      <!-- <input type="radio" name="payment_type" value="1" onclick="goToPayment(this.value);">Credit / Debit card </br>
                      <input type="radio" name="payment_type" value="2" onclick="goToPayment(this.value);">Paypal
                       -->
                      <div id="paypalTotAmt">
                          <table>
                            <tbody>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Total</th>
                            </tbody>
                            <tr>
                              <td><?php echo $milestone_name;?></td>
                              <td><?php echo $amount;?></td>
                              <td><?php echo $amount;?></td>
                            </tr>
                            <tr>
                              <td>Paypal Service Charge</td>
                              <td>2.85%</td>
                              <td><?php
                              $t = $amount*2.85;
                              $tt = $t/100;
                              $ttt = $tt+$amount;
                               echo $ttt ;  ?></td>
                            </tr>


                            <tr>
                              <td>Proyourway Service Charge</td>
                              <td>3%</td>
                              <td><?php
                              $tttt = $ttt*3;
                              $tttt = $tttt/100;
                              $tttttt = $tttt+$ttt;
                               echo $tttttt ;  ?></td>
                            </tr>


                            <tr><td><button onclick="toPay();">Pay</button></td></tr>
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

        <!-- /page content -->

<div id="paypal" style="display: none">
  <form id="pay" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="love4u_1352373210_biz@yahoo.co.in">
  <input type="hidden" name="undefined_quantity" value="1">
  <input type="hidden" name="item_name" id="item_name" value="<?php echo $milestone_name;?>">
  <input type="hidden" name="item_number" value="dd01">
  <input type="hidden" name="amount" id="paypalamount" value="<?php echo $tttttt;?>">
  <input type="hidden" name="rm" value="2">
  <input type="hidden" name="custom" id="order_id" value="<?php echo $order_id;?>">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="return" value="<?php echo base_url();?>admin/milestone/notify">
  <input type="hidden" name="cancel_return" value="<?php echo base_url();?>admin/quotation/cancel">
  <input type="hidden" name="notify_url" value="<?php echo base_url();?>admin/quotation/notify">
  <input type="image" border="0" name="submit" src="http://images.paypal.com/images/x-click-but5.gif" alt="Buy doodads with PayPal">
  </form>
</div>

<script type="text/javascript">
function goToPayment(payment_type){
  //alert(payment_type);
  if(payment_type==2){
    $("#paypalTotAmt").show();

  }
}

function toPay(){
  $("#pay").submit();
}

</script>
