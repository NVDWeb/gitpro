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
                    <h2>Legal Document</h2>
                                      
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Document Created for Project</th>
                          <th>Document</th>
                        <?php if($this->session->userdata('admin_user_type')==3){?>
                          <th>Professional Name</th>
                          <th>Document Status</th>
                        <?php  }?>
                        <?php if($this->session->userdata('admin_user_type')==2){?>
                          <th>Client Name</th>
                          <th>Document Status</th>
                          <th>Action</th>
                        <?php }?>
                       

                        </tr>
                      </thead>


                      <tbody>

                          <?php foreach ($documentList as $row) { ?>

							               <tr>
                              <td><?php echo $row->project_name;?></td>
                              <td>
                                <a href="<?php echo base_url();?>admin/document/download/<?php echo trim($row->file);?>" title="click to view"><?php echo $row->file;?></a></td>
                              <?php if($this->session->userdata('admin_user_type')==3){ ?>
                                <td><?php echo $row->professionalName;?></td>
                                <td><?php if($row->signed_by_professional==0) { echo 'Waiting for acceptence';}else{ echo 'Accepted by Professional';}?></td>
                             <?php } ?>
                             <?php if($this->session->userdata('admin_user_type')==2){ ?>
                              <td><?php echo $row->clientName;?></td>
                              <td><?php if($row->signed_by_professional==2) { echo 'Rejected.';}
                              else if($row->signed_by_professional==0){
                                echo 'Your Approval Needed.';
                              }else{ echo 'Accepted.';}?></td>
                              <td>
                                <?php if($row->signed_by_professional==0){?>
                                <button onclick="accept('<?php echo $row->file;?>',<?php echo $row->id;?>,<?php echo $row->q_id;?>,1);" class="btn btn-primary">Accept</button> <button onclick="reject(<?php echo $row->id;?>,2);" class="btn btn-primary">Reject</button>
                                <?php }else{
                                  if($row->accepted==1){
                                    echo 'Accepted by You.';
                                  }else{
                                    echo 'Rejected by You.';
                                  }

                                } ?>
                              </td>
                             <?php } ?>
                             </tr>
                          <?php } ?>
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

<div class="modal fade bs-example-modal-lgAccept" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="closeAccept1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Accept this Aggrement</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal">
            <div id="ifr"></div>
              
            <input type="hidden" id="documentid" name="documentid" value="">
            <input type="hidden" id="status" name="status" value="">
            <input type="hidden" id="quotation_id" name="quotation_id" value="">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Name as Signature : </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="name" value="">
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <span id="err" style="color: red;"></span>
          <span id="suc" style="color: green;"></span>
        <button type="button" class="btn btn-default" id="closeAccept">Close</button>
        <button type="button" class="btn btn-primary" id="saveAccept">Accept</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lgReject" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="closeReject1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Reject this Aggrement</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="documentidR" name="documentidR" value="">
            <input type="hidden" id="statusR" name="statusR" value="">
        You are going to Reject this legal agreement.
        Are you sure to Reject ?   
        
      </div>
      <div class="modal-footer" style="text-align: center;">
        <span id="err" style="color: red;"></span>
          <span id="suc" style="color: green;"></span>
        <button type="button" class="btn btn-default" id="closeReject">No</button>
        <button type="button" class="btn btn-primary" id="saveReject">Yes</button>
      </div>

    </div>
  </div>
</div>


 <!--delete services script-->
<script type="text/javascript">
// Ajax post
$(document).ready(function() {
  $("#saveAccept").click(function(event) {
    //alert('open');
    event.preventDefault();
    var documentid = $("#documentid").val();
    var status = $("#status").val();
    var quotation_id  = $("#quotation_id").val();
    var signature  = $("#name").val();
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/document/accept",
      data: {documentid: documentid,status:status,quotation_id:quotation_id,signature:signature},
      success: function(data) {
        //alert(data);
        location.reload();
      }
    });
  });

  $("#saveReject").click(function(event) {
    //alert('open');
    event.preventDefault();
    var documentid = $("#documentidR").val();
    var status = $("#statusR").val();
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/document/reject",
      data: {documentid: documentid,status:status},
      success: function(data) {
        alert(data);
        //location.reload();
      }
    });
  });


});



function accept(file,documentId,quotation_id,status){
  // $("#ifr").html("<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=https://www.proyourway.com/beta/uploads/agreement/"+file+"' frameborder='0' style='width:800px; height:450px;'></iframe>");

  $("#ifr").html("<iframe src='https://docs.google.com/viewer?url=https://www.proyourway.com/beta/uploads/agreement/"+file+"&embedded=true' style='width:880px; height:500px;' frameborder='0'></iframe>");
    $(".bs-example-modal-lgAccept").modal();
    $("#documentid").val(documentId);
    $("#status").val(status);
    $("#quotation_id").val(quotation_id);
}

$("#closeAccept").click(function() {
  $("#documentid").val('');
  $("#status").val('');
  $(".bs-example-modal-lgAccept").modal('hide');
});
$("#closeAccept1").click(function() {
  $("#documentid").val('');
  $("#status").val('');
  $(".bs-example-modal-lgAccept").modal('hide');
});




function reject(documentId,status){
    $(".bs-example-modal-lgReject").modal();
    $("#documentidR").val(documentId);
    $("#statusR").val(status);
}

$("#closeReject").click(function() {
  $("#documentidR").val('');
  $("#statusR").val('');
  $(".bs-example-modal-lgReject").modal('hide');
});
$("#closeReject1").click(function() {
  $("#documentidR").val('');
  $("#statusR").val('');
  $(".bs-example-modal-lgReject").modal('hide');
});

</script>
