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
                            <h2>Invoice Detail</h2>
                            <ul class="nav navbar-right panel_toolbox">
                            
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <section class="content invoice">
                              <!-- title row -->
                              <div class="row">
                                <div class="col-xs-12 invoice-header">
                                  <h1>
                                                  <i class="fa fa-globe"></i> Invoice.
                                                  <small class="pull-right">Date: <?php echo date('Y-m-d H:i',strtotime($invoiceDate));?></small>
                                              </h1>
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- info row -->
                              <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                  From
                                  <address>
                                  strong>Iron Admin, Inc.</strong>
                                  <br>795 Freedom Ave, Suite 600
                                  <br>New York, CA 94107
                                  <br>Phone: 1 (804) 123-9876
                                  <br>Email: ironadmin.com
                                  </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                  To
                                  <address>
                                  <strong><?php echo $business_name;?></strong>
                                  <br>795 Freedom Ave, Suite 600
                                  <br>New York, CA 94107
                                  <br>Phone: 1 (804) 123-9876
                                  <br>Email: jon@ironadmin.com
                                  </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                  <b>Invoice #<?php echo $order_id;?></b>
                                  <br>
                                  <br>
                                  <b>Order ID:</b> 4F3S8J
                                  <br>
                                  <b>Payment Due:</b> 2/22/2014
                                  <br>
                                  <b>Account:</b> 968-34567
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
        
                              <!-- Table row -->
                              <div class="row">
                                <div class="col-xs-12 table">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Payment Type</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                       <td><?php echo ucfirst($payment_type);?></td>
                                        <td><?php echo $category_name;?></td>
                                        <td><?php echo $subCategory;?></td>
                                        <td><?php echo $order_id;?></td>
                                        <td><?php echo $work_detail;?></td>
                                        <td><?php echo $amount;?> AUD ($) </td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                </div>
                                <!-- /.col -->
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