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
                              <h2>Group Chat</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <div class="profile_form_update edu_update01">                 
                                <div class="form-group new_row">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                  <label  for="first-name">Team <span class="required">*</span></label>                                  
                                    <select name="team" id="team" class="form-control" onChange="getTeam(this.value);" required>
                                      <option value="0">--Select Team--</option>
                                      <?php foreach($teamList as $row){
                                        echo '<option value="'.$row->id.'" '.($team==$row->id ? 'selected': '').'>'.$row->team_name.'</option>';
                                      }?>
                                    </select>
                                  </div>
                                </div>
                            <div class="col-md-12"><div id="result"></div></div>
                            <div class="x_content" id="msss" style="display:none;">
                                <span style="color:red;"><?php echo validation_errors(); ?></span>
            
                                <?php
                                //$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                                //echo form_open_multipart('',$attributes); ?> 
                                                 
                                <form action="" method="post" id="forums-form" class="form-horizontal form-label-left">
                                  <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="first-name">Message :<span class="required">*</span></label>                                    
                                        <input type="hidden" id="team_id" name="team_id" value=""/>
                                        <textarea name="message" id="message"  placeholder="message"></textarea>
                                    </div>
                                  </div>
                                  <div class="row form-group">
                                    <div class="profo_edi_sub">
                                      <input type="submit" value="<?php echo $submit_btn_value; ?>">
                                    </div>
                                  </div>
                                </form>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="close3"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Requested to Join Team</h4>

      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-success" id="close2">Ok</button>
      </div>

    </div>
  </div>
</div>
      <!-- Ends here -->

<script>
    $(document).ready(function(){
        $("#forums-form").submit(function(e){
            e.preventDefault();
            var team_id = $("#team_id").val();;
            var message= $("#message").val();
			//alert(team_id);
			if(team_id == 0){
				alert('Please select Team.');
			}
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>admin/forums',
                data: {team_id:team_id,message:message},
                success:function(data){
                    $("#message").val('');
                },
                error:function(){
                    alert('fail');
                }
            });
        });
    });
</script>

<script>
function getTeam(teamId){  
   if(teamId){
	   $("#team_id").val(teamId);
     $.ajax({
       type:"POST",
       url:"<?php echo base_url();?>admin/forums/getTeamByIdForForum",
       data:{teamId:teamId},	   
       success:function(res){
         //alert(res);
         $("#result").html(res);
		 $("#msss").show();
       }
     });
   }
}
</script>

<script>
$(function() {
    var team = setInterval(function() {
	var team_id = $("#team option:selected").val();
	//alert(team_id)
	if(team_id !=0){
       getTeam(team_id);
	}
    }, 3000);
	
    setTimeout(function() {
		var team_id = $("#team option:selected").val();
		if(team_id !=0){
        getTeam(team_id);
		}
    }, 2000);
	
});
</script>
