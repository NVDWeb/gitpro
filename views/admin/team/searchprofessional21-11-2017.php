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
                  <h2>Search Professional to join</h2>                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                
                <div class="profile_form_update edu_update01 lead_box">

                  <?php
                  $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                  echo form_open_multipart($action='',$attributes); ?>
                  <div class="searc_button">
                      <input type="hidden" name="searchBy" value="<?php echo $searchBy;?>">
                      <button type = "button" class="" id="showCatDiv"><i class="fa fa-search" aria-hidden="true"></i> Search By Category and Sub category </button>  <button  class="" type = "button" id="showNameDiv"><i class="fa fa-search" aria-hidden="true"></i> Search by Name or Email </button>
                  </div>
                  <?php if($searchBy=='cat'){
                    $styleCat = 'display:block';
                    $styleName = 'display:none';
                  }else{
                    $styleCat = 'display:none';
                  }?>
                  <div id="catDiv" style="<?php echo $styleCat;?>">
                  	<div class="serac_box">
                    	<div class="row form-group">
                        	<div class="col-md-6 col-sm-6 col-xs-12">
                            	<label class="" for="first-name">Category <span class="required">*</span></label>
                                <select name="category" id="category" class="" onChange="getSubCategoriesByParentId(this.value);" required>
                                  <option value="0">--Select Category--</option>
                                  <?php foreach($categoryList as $row){
                                    echo '<option value="'.$row->id.'" '.($cat==$row->id ? 'selected': '').'>'.$row->category_name.'</option>';
                                  }?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<label class="" for="first-name">Sub Category <span class="required">*</span></label>
                                <select name="sub_category" class="form-control" id="sub_category" onChange="getTeam(this.value);">
								  <?php echo $subcat;?>
                                </select>
                            </div>
                        </div>
                      </div>
                  </div>
                  
                  <?php if($searchBy=='name'){
                    $styleName = 'display:block';
                    $styleCat = 'display:none';
                  }else{
                    $styleName = 'display:none';
                  }?>
                  <div id="NameDiv" style="<?php echo $styleName;?>">
                    <div class="row form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <label for="first-name">Name / Email<span class="required">*</span></label>
                          <input type="text"  name="searchByNameOrEmail" placeholder="Serach by Name/Email" value="<?php echo $searchByNameOrEmail;?>">
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="submit" class="pro_sec_cat" name="submit" id="search" value="Search">
                      </div>
                    </div>

                  </div>
                    </form>
                    <?php //echo '<pre>'; print_r($this->session->userdata());?>
                    <table id="datatable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Professional Name</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if($getBusinessAray){
                          foreach ($getBusinessAray as $row) {
                            if($row->id!=$this->session->userdata('adminId')){
                              $nameArray = explode(" ",$row->contact_person_name);
                              if($row->contact_person_name){
                                echo '<tr><td>'.$nameArray[0].'</td>';
                                echo '<td><a href="'.base_url().'admin/team/professional/'.$row->id.'" class="tabl_link"><i class="fa fa-eye" aria-hidden="true"></i></a>   <a href="javascript:void(0);" class="tabl_link mm" data-id="'.$row->email.'"><i class="fa fa-user"> </i></a></td></tr>';
                              }
                            }else{
                              echo '<tr class="odd"><td valign="top" colspan="2" class="dataTables_empty">No data available in table</td></tr>';
                            }
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
      </div>
      <!-- /page content -->
<!--Place you BID AMOUNT popup-->
<div class="modal fade bs-example-modal-lgteamRequest" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Requested to Join Team</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form_pop">
        <input type="hidden" id="member_email" value="">
        <input type="hidden" id="admin_id" value="<?php echo $this->session->userdata('adminId');?>">		
        <div class="row form-group">
          <div class="col-md-12">
            <label for="email">Select Your team: </label>
            <select name="team_id" id="team_id">
                <option value="0">--Select Team--</option>
                <?php foreach($teamArray as $row){
                  echo '<option value="'.$row->id.'">'.$row->team_name.'</option>';
                }?>
              </select>            
          </div>
        </div>
      
      <div class="row form-group">
        <div class="col-md-12">
          <label for="email">Short Note: </label>
          <textarea id="shortnote" name="shortnote"></textarea>           
        </div>
      </div>
      </div>
        </form>

      <div class="modal-footer" style="text-align: center;">
          <span id="er" style="color:red"></span>
          <div id="loading" style="display: none;">Please Wait...</div></br>
        <button type="button" class="pop_submit" id="sendRequest"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Request</button>
      </div>

    </div>
  </div>
</div>
      <!-- Ends here -->

<script>
$(document).ready(function(){

  $(".mm").click(function() {
       var email = $(this).data('id');
      $("#member_email").val(email);
	   $("#shortnote").val();
	   $("#admin_id").val();
	   
    $(".bs-example-modal-lgteamRequest").modal('show');
  });

  $("#sendRequest").click(function() {
       var myarray = [];
       var email = $("#member_email").val();
	   var shortnote = $("#shortnote").val();
	   var admin_id = $("#admin_id").val();
       var team_id = $("#team_id option:selected").val();	    
       var error = 0;
       if(team_id==0){
         $("#er").html('Please select Team.');
         error = 1;
       }else{
         $("#er").html('');
         error = 0;
       }
       if(error==0){
         $("#loading").show();
         //$("#sendRequest").attr('disabled',true);
         $.ajax({
           dataType:"json",
           type:"POST",
           url:"<?php echo base_url();?>admin/team/addMoreMembers",
           data:{team_id:team_id,members_email:email,shortnote:shortnote,admin_id:admin_id},
		  
           success:function(res){
             //alert(res);
                 $.each(res, function(k,v) {
                 if(v=='success'){
                   $("#loading").html('Congratulation! Professional has added to your team and a mail has also sent to the professional');
                   setTimeout(function(){$('#loading').html(''); location.reload();}, 4000);
                 }else{
                   myarray.push(v);
                   $("#loading").html('Professional is already in your team or already requested to join.');
                   setTimeout(function(){$('#loading').html(''); location.reload();}, 4000);
                 }

             });
           }
         });

       }

  });

  $("#close2").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });
  $("#close3").click(function() {
    $(".bs-example-modal-lgteamRequest").modal('hide');
  });

  $("#showCatDiv").click(function(){
    $("#catDiv").show();
    $("#NameDiv").hide();
  });

  $("#showNameDiv").click(function(){
    $("#category").val(0);
    $("#catDiv").hide();
    $("#NameDiv").show();
  });
});

function getSubCategoriesByParentId(categoryId){
  if(categoryId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/team/getSubCategoriesByParentId",
      data:{categoryId:categoryId},
      success: function(data){
        $("#sub_category").html(data);
      }
    });
  }
}

function getTeam(sub_category){
  //alert(sub_category);
  $("#search").click();
  //$("#demo-form2").submit();
  // var category = $("#category option:selected").val();
  // if(category){
  //   $.ajax({
  //     type:"POST",
  //     url:"<?php echo base_url();?>admin/team/getTeamByCategoryAndSubcategory",
  //     data:{category:category,sub_category:sub_category},
  //     success:function(res){
  //       alert(res);
  //       $("#result").html(res);
  //     }
  //   });
  // }
}


function teamJoinRequest(teamId,member_id){
  if(teamId){
    $.ajax({
       type:"POST",
        url:"<?php echo base_url();?>admin/team/teamJoinRequest",
        data:{teamId:teamId,member_id:member_id},
        success:function(res){
          //alert(res);
          if(res==1){
            $(".modal-body").html('Your request to join team has been submitted to the Team Admin.You will be the part of the team once confirmed by the Admin.');
            $(".bs-example-modal-lgteamRequest").modal('show');
          }else{
            $(".modal-body").html('You have already sent a request to join this team.');
            $(".bs-example-modal-lgteamRequest").modal('show');
          }
          //$("#result").html(res);
        }
      });
  }
}
</script>
