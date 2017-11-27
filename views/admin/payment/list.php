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
                            <ul class="nav navbar-right panel_toolbox">

                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>

                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>

                          <div class="x_content">

                              <!-- title row -->
								<?php //echo  '<pre>';print_r($this->session->userdata);?>
                                <?php if($this->session->userdata('admin_user_type')==3){?>
                                  <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <th>Date</th>
                                    <th>Transaction Details</th>
                                    <th>Amount</th>
                                    <th>Total</th>
                                  </thead>
                                  <?php if($paymentDetails){
                                    foreach ($paymentDetails as  $value) {
                                      //echo '<pre>';print_r($value);
                                      if($value->milestone_id!=''){ ?>
                                    <tr>
                                      <td><?php echo date("Y-m-d",strtotime($value->paidDate));?></td>
                                      <td>Fund Deposited</td>
                                      <td><?php 
                                      $paypalProcessinFees = (($value->amount*2.85)/100);
                                      $proyourwayServiceCharge = (($value->amount*3)/100);
                                      $total = $value->amount + $paypalProcessinFees + $proyourwayServiceCharge;
                                      echo $total;   
                                      ?>                                   
                                      </td>
                                      <td><?php echo $total;?></td>
                                    </tr>
                                    <tr>
                                      <td><?php echo date("Y-m-d",strtotime($value->paidDate));?></td>
                                      <td>Paypal Processing Fees (2.85)</td>
                                      <td><?php echo  '-'.$total1 = (2.85*$value->amount)/100;?></td>
                                      <td><?php echo $total1 = $total-$total1;?></td>
                                    </tr>
                                    <tr>
                                      <td><?php echo date("Y-m-d",strtotime($value->paidDate));?></td>
                                      <td>Proyourway Service Charge (3)</td>
                                      <td><?php echo  '-'.$total2= (3*$value->amount)/100;?></td>
                                      <td><?php echo $total3 = $total1-$total2;?></td>
                                    </tr>

                                    <?php if($value->paidAmountToTeamAdmin!=''){?>
                                    <tr>
                                      <td><?php echo date("Y-m-d",strtotime($value->paidDate));?></td>
                                      <td>Payment to <?php echo $value->first_name;?> for <?php echo $value->milestone_name;?></td>
                                      <td><?php echo '-'.$total2 = $value->paidAmountToTeamAdmin;?></td>
                                      <td><?php echo  $total2-$total3;?></td>
                                    </tr>
                                  <?php } ?>
                                    <?php }
                                  }
                                  }?>
                                </table>
                              <?php } ?>

                              <?php if($this->session->userdata('admin_user_type')==2){?>
                                <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                  <th>Date</th>
                                  <th>Transaction Details</th>
                                  <th>Amount</th>
                                  <th>Total</th>
                                </thead>
                                <?php if($paymentDetails){
                                  //echo '<pre>';print_r($paymentDetails);
                                  foreach ($paymentDetails as  $value) {
                                    if($value->id!=''){ ?>
                                  <tr>
                                    <td><?php echo $value->released_date;?></td>
                                    <td>Payment for project <?php echo $value->project_name;?> <?php echo $value->milestone_name;?> </td>
                                    <td><?php echo $total = $value->amount;?></td>
                                    <td><?php echo $total;?></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo $value->released_date;?></td>
                                    <td>ProYourWay 7.5% of <?php echo $value->milestone_name;?> Transaction Fee</td>
                                    <td><?php echo '-' . $total1 = (($value->amount*7.5)/100);?></td>
                                    <td><?php echo $sum = $total - $total1;?></td>
                                  </tr>
                                  <?php if($value->is_withdraw){?>
                                  <tr>
                                    <td><?php echo $value->released_date;?></td>
                                    <td>Withdraw</td>
                                    <td><?php echo '-'.$sum;?></td>
                                    <td><?php echo $sum-$sum;?></td>
                                  </tr>
                                <?php } ?>
                                  <?php }
                                }
                                }?>
                              </table>
                            <?php } ?>

                            <?php if($this->session->userdata('admin_user_type')==1){?>
                              <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <th>Date</th>
                                <th>Transaction Details</th>
                                <th>Amount</th>
                                <th>Total</th>
                              </thead>
                              <?php if($paymentDetails){
                                $sum=0;
                                $s=0;
                                $paidAm = 0;
                                //echo '<pre>';print_r($paymentDetails);
                                $i=0;
                                $tt=0;
                                $totalMilestoneAmount=0;
                                foreach ($paymentDetails as  $value) {
                                  if($value->name!=''){ ?>
                                <tr>
                                  <td><?php echo date("Y-m-d",strtotime($value->paidDate));?></td>
                                  <td>Funds deposited by Client <?php echo $value->name;?> </td>
                                  <td><?php 
                                  //echo $total = (($value->totalAmount*2.75)/100);
								  		 $proyourwaySC = (($value->totalAmount*3)/100);
                       $paypalSC = (($value->totalAmount*2.85)/100);
									  	echo $total = $value->totalAmount+$proyourwaySC+$paypalSC;
								  
								  ?></td>
                                  <td><?php if($i==0) { echo $total = $total; } else { echo $total = $s+$sum+$total; }?></td>
                                </tr>
                                <tr>
                                  <td><?php echo date("Y-m-d",strtotime($value->paidDate)); ?></td>
                                  <td>ProYourWay Service fee of milestone (Client) </td>
                                  <td><?php  $total1 = (($value->totalAmount*3)/100); echo - $total1;?></td>
                                  <td><?php if($i==0) { echo $sum = $total - $total1; } else {  echo $sum = $total-$total1 ; }?></td>
                                </tr>


                                <tr>
                                  <td><?php echo date("Y-m-d",strtotime($value->paidDate)); ?></td>
                                  <td>Paypal Service Charge </td>
                                  <td><?php  $total2 = (($value->totalAmount*2.85)/100); echo - $total2;?></td>
                                  <td><?php if($i==0) { echo $sum1 = $sum - $total2; } else {  echo $sum1 = $total-$total2 ; }?></td>
                                </tr>

                                <tr>
                                  <td><?php echo date("Y-m-d",strtotime($value->paidDate)); ?></td>
                                  <td>ProYourWay Service fee of milestone (Professional) </td>
                                  <td><?php  $total2 = (($value->totalAmount*7.5)/100); echo - $total2;?></td>
                                  <td><?php if($i==0) { echo $sum2 = $sum1 - $total2; } else {  echo $sum2 = $total-$total2 ; }?></td>
                                </tr>

                                <?php //$totalMilestoneAmount = $totalMilestoneAmount+$value->totalAmount; ?>

                                <?php }
                                $i++;
                              }
							  $paidAm = $sum2;
							  $j=0;
							  $tis = 0 ;
							  $withBalance = 0;
							   foreach ($paymentDetails as  $value) {
                  if(isset($value->withdraw)){
							    if($withdrawl = $value->withdraw){
                                  foreach ($withdrawl as $rows) { //echo '<pre>';print_r($rows); ?>
                                <tr>
                                  <td><?php echo $rows->released_date;?></td>
                                  <td>Withdraw by <?php echo $rows->first_name;?></td>
                                  <td><?php  $tis = $rows->amount -(($rows->amount*7.5)/100); echo - $tis;?></td>
                                  <td <?php echo $j;?>>
                                    <?php if($j==0){
                                      echo $withBalance = $paidAm-$tis;
                                    }else{
                                      echo $withBalance = $withBalance-$tis;
                                    }?>
                                  </td>
                                </tr>
                                <?php $j++; }?>

                              <?php } }
							  }?>
							  <?php }?>
                            </table>
                          <?php } ?>



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
function closeBid(business_id,quotation_id,amount,status){
  //alert(quotation_id);
  $(".bs-example-modal-lgCloseAmount").modal();
  $("#quot_id").val(quotation_id);
  $("#business_id").val(business_id);
  $("#totAmount").html(amount+' AUD ($)');
  $("#amount").val(amount);
  $("#status").val(status);


  /*$.ajax({
    type:"POST",
    url:"<?php echo base_url();?>admin/quotation/",
    data:{business_id:business_id,quotation_id:quotation_id,status:status,amount:amount},
    success:function(data){
      alert(data);
    }
  });*/
}

$("#saveCloseBid").click(function(){
  var quotation_id = $("#quot_id").val();
  var business_id =  $("#business_id").val();
  var amount =  $("#bidCloseAmount").val();
  var status =  $("#status").val();

  if($("#partially").is(":checked") || $("#fully").is(":checked")) {
      var paymentType = $("input[name='radio']:checked").val();
      //alert(paymentType);
      $("#loading").show();

      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/quotation/payment",
        data:{business_id:business_id,quotation_id:quotation_id,status:status,amount:amount,paymentType:paymentType},
          success:function(data){
            //alert(data);
             $("#loading").hide();
             $("#order_id").val(data);
             $( "#pay" ).submit();
        }
      });
  }else{
    alert('please select one of payment mode');

  }






});

$("#partially").click(function(){
    var realAmount = $("#amount").val();
    var amounttopay = realAmount/2;
    $("#paypalamount").val(amounttopay);
    $(".rel").show();
    $("#bidCloseAmount").val(amounttopay);
    $("#bidCloseAmount").attr("disabled", "disabled");

});

$("#fully").click(function(){

    var amounttopay = $("#amount").val();
    $("#paypalamount").val(amounttopay);
    $(".rel").show();
    $("#bidCloseAmount").val(amounttopay);
    $("#bidCloseAmount").attr("disabled", "disabled");

});

$("#closeBid1").click(function() {
    $("#quotation_id").val('');
    $("#business_id").val('');
    $("#amount").val('');
    $("#status").val('');
    $("#paypalamount").val('');
    $("#err").html('');
    $('#partially').prop('checked', false);
    $('#fully').prop('checked', false);
    $("#loading").hide();
    $("#bidCloseAmount").val();
     $(".rel").hide();
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgCloseAmount").modal('hide');


  });

  $("#closeBid2").click(function() {
    $("#quotation_id").val('');
    $("#business_id").val('');
    $("#amount").val('');
    $("#paypalamount").val('');
    $("#status").val('');
    $("#suc").html('');
    $("#err").html('');
     $('#partially').prop('checked', false);
    $('#fully').prop('checked', false);
    $("#bidCloseAmount").val();
    $(".rel").hide();
    $("#loading").hide();
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgCloseAmount").modal('hide');
  });


function showDiv(id){
  $("#divT_"+id).toggle();
}

function sendMessage(quotation_id,businessId){
    $(".bs-example-modal-lg").modal();
    $("#quotationId").val(quotation_id);
    $("#businessId").val(businessId);
}

function placeAmount(quotation_id){
  $(".bs-example-modal-lgplaceAmount").modal();
  $("#quotation_id").val(quotation_id);
}


$(document).ready(function() {
  $("#save").click(function() {
   // alert('click');
    //event.preventDefault();
    var quotation_id = $("#quotationId").val();
    var businessId = $("#businessId").val();
    var message = $("#message").val();
    $("#suc").html();
    $("#err").html();

    if(message==''){
      $("#err").html('Please fill Message');
    }else{
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postMessageOnBid",
        data: {quotation_id: quotation_id,businessId: businessId,message: message},
        success: function(data) {
          if (data=='success'){
            $("#suc").html('Your Message To Bidder is successfully Send.');
            setTimeout(function(){$('#suc').html('');}, 4000);
          }else{
            $("#err").html('Sorry something went wrong.');
            setTimeout(function(){$('#err').html('');}, 4000);
          }
        }
      });
    }

  });

  $("#close").click(function() {

    //event.preventDefault();
    //$("#quotation_id").val('');
    $("#quotationId").val('');
    $("#businessId").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');


  });

  $("#close1").click(function() {

    //event.preventDefault();
    //$("#quotation_id").val('');
    $("#quotationId").val('');
    $("#businessId").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lg").modal('hide');


  });


/*Bid amount by individual*/

$("#save1").click(function() {
    //event.preventDefault();
    var quotation_id = $("#quotation_id").val();
    var bidAmountIndividual = $("#bidAmountIndividual").val();
    $("#sucBid").html();
    $("#errBid").html();

    if(bidAmountIndividual==''){
      $("#errBid").html('Please Enter BID Amount');
    }else{
      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/quotation/postBidAmountToBid",
        data: {quotation_id: quotation_id,bidAmountIndividual: bidAmountIndividual},
        success: function(data) {
          if (data=='success'){
            $("#sucBid").html('Your Message To Bidder is successfully Send.');
            setTimeout(function(){$('#suc').html(''); location.reload();}, 4000);
          }else{
            $("#errBid").html('Sorry something went wrong.');
            setTimeout(function(){$('#err').html(''); location.reload();}, 4000);
          }
        }
      });
    }

  });


  $("#close2").click(function() {
    //event.preventDefault();
    $("#bidAmountIndividual").val('');
    $("#quotation_id").val('');
    $("#sucBid").html('');
    $("#errBid").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgplaceAmount").modal('hide');
  });

  $("#close3").click(function() {
    //event.preventDefault();
    $("#bidAmountIndividual").val('');
    $("#quotationId").val('');
    $("#businessId").val('');
    $("#message").val('');
    $("#suc").html('');
    $("#err").html('');
    $(".errorNumeric").hide();
    $(".bs-example-modal-lgplaceAmount").modal('hide');
  });




});





</script>
<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        $(function () {
            $(".numeric").on("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
               $(".errorNumeric").css("display", ret ? "none" : "inline");
                //setTimeout(function(){$('#err').html('');}, 4000);
                return ret;
            });
            $(".numeric").bind("paste", function (e) {
                return false;
            });
            $(".numeric").bind("drop", function (e) {
                return false;
            });
        });
    </script>
