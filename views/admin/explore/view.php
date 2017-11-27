  <style>
/****** Rating Starts *****/
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating {
                border: none;
                float: left;
            }

            .rating > input { display: none; }
            .rating > label:before {
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before {
                content: "\f089";
                position: absolute;
            }

            .rating > label {
                color: #ddd;
                float: right;
            }

            .rating > input:checked ~ label,
            .rating:not(:checked) > label:hover,
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover,
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label,
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

            .demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
            .demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
            .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
            .demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
            .demo-table ul{margin:0;padding:0;}
            .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
            .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}

</style>
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
                            <h2>Team Details <?php if($this->session->userdata('admin_user_type') == 3){ ?>
                   <?php  echo '<a href="javascript:void();" class="btn btn-success" onclick="openPopUp('.$category_team.','.$teamData[0]->id.')"><i class="fa fa-users" aria-hidden="true"></i>  TEAM HIRE</a>';?>
                    <?php }?></h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">   
                          <div class="team_pro_review">     
                          <?php //echo '<pre>';print_r($teamData);?>
                            <div class="team_box">
                              <p><b>Team admin:</b> <a href="<?php echo base_url();?>admin/professionals/index/<?php echo $teamData[0]->businessId;?>" title="View Profile" target="_blank"><?php echo $teamData[0]->first_name;?></a></p>
                              <p><b>Team name :</b> <?php echo $teamData[0]->team_name;?></p> 
                            </div>
                          <?php //echo '<pre>';print_r($teamrating);?>
                          <div class="team_rating_right">
                            <table class="demo-table bid_star01">
                              <tbody>
                              <tr>
                              </tr>
                              <tr>
                              <td valign="top">
                              <div id="tutorial-<?php echo $teamData[0]->id; ?>">
                              <input type="hidden" name="rating" id="rating" value="<?php echo @$teamrating[0]->teamrating; ?>" />
                              <ul onMouseOut="resetRating(<?php echo @$teamrating[0]->ratingId; ?>);">
                                <?php
                                $indArray = array();
                                $adminArray = array();
                                foreach ($teamrating[1] as $rows) {
                                   $indArray[] = $rows->ind_id;
                                   $adminArray[] = $rows->admin_id;
                                }
                                $adminId = $this->session->userdata('adminId');
                                //echo '<pre>';print_r($indArray);
                                for($i=1;$i<=5;$i++) {
                                $selected = "";
                                if(!empty(@$teamrating[0]->teamrating) && $i<=@$teamrating[0]->teamrating) {
                                $selected = "selected";
                                }
                                ?>
                                <?php if(in_array($adminId,$adminArray) || in_array($adminId,$indArray) ){ ?>
                                  <li class='<?php echo $selected; ?>' onMouseOver="highlightStar(this,<?php echo @$teamrating[0]->ratingId; ?>);" onMouseOut="removeHighlight(<?php echo @$teamrating[0]->ratingId; ?>);" onClick="updateRating(this,<?php echo $teamData[0]->id; ?>);">&#9733;</li>
                                <?php  }else{?>
                                  <li class='<?php echo $selected; ?>' onMouseOver="highlightStar(this,<?php echo @$teamrating[0]->ratingId; ?>);" onMouseOut="removeHighlight(<?php echo @$teamrating[0]->ratingId; ?>);" onClick="addRating(this,<?php echo $teamData[0]->id; ?>);">&#9733;</li>
                                <?php } ?>
                                <?php }  ?>
                              <ul>
                                <button class="tabl_link review_button" onClick="showReviews();"><?php echo count($totalTeamReviews);?> Reviews</button>
                                
                              </div> 
                              </td>
                              </tr>
        
                              </tbody>
                            </table>
                          </div>
                            
                          </div>

                          <div class="col-md-12">
                            <div id="rev" style="display:none">
                                    <?php $j=0; 
                                    foreach ($totalTeamReviews as $revs) {
                                      echo '<div class="rivew_commen">';
                                      if($revs->admin_id){
                                        echo '<h6>Proyourway</h6>';
                                      }else{
                                        echo '<div class="rivew_name">'.$revs->name.'</div>';
                                      } 
                                      ?>
                                    <p class="ratings rating_pro">
                                      <?php
                                      if(isset($revs->rating)){ ?>
                                          <a><?php echo $revs->rating;?>/5</a>
                                            <?php for($i=1 ; $i<=$revs->rating; $i++){
                                              $selected = "-o";
                                              if(!empty($revs->rating) && $i<=$revs->rating) {
                                              $selected = "";
                                            } ?>
                                          <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                          <?php }
                                          $relC = 5-$revs->rating;
                                          for($k=1; $k<=$relC; $k++){
                                            echo '  <a href="#"><span class="fa fa-star-o"></span></a>';
                                          }?>
                                    <?php } ?>
                                    </p>
                                    <?php 
                                    echo '<div class="rivew_text">'.$revs->reviewtext.'</div>'; 
        
                                    $j++;
                                    
                                    if($j==5) break;
                                    echo '</div>';
                                  } 
                                  ?>
                                    
        
                                </div>
                          </div>
                          
                          
                                           
                            <?php foreach($member_data as $row){
                            //print_r($row); ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="teampofile">
                                  <div class="col-sm-12">
                                    <h4>Team Member</h4>
                                    <div class="teampofile_left">
                                      <h2><a href="<?php echo base_url();?>admin/professionals/index/<?php echo $row[0]->id;?>" title="View Profile" target="_blank"><?php echo $row[0]->first_name;?></a></h2>
                                      <p><strong>About: </strong>About the member</p>
                                      <ul class="list-unstyled">
                                        <li><i class="fa fa-building"></i> Address: <?php  if(isset($row['country'][0]->countryName)) {
                                          echo $row['country'][0]->countryName; } echo ','; if(isset($row['state'][0]->stateName)) {
                                          echo $row['state'][0]->stateName; } echo ','; if(isset($row['city'][0]->cityName)) {
                                          echo $row['city'][0]->cityName; } ?> </li>
        
                                      </ul>
                                    </div>
                                    <div class="teampofile_right">
                                      <?php if($row[0]->picture!=0 || $row[0]->picture ) { ?>
                                    <img  src="<?php echo $row[0]->picture ;?>" alt="Avatar">
                                  <?php } else if($row[0]->businessLogo!='' ) { ?>
                                    <img  src="<?php echo base_url();?>uploads/business/<?php echo $row[0]->businessLogo ;?>" alt="Avatar">
                                  <?php }else { ?>
                                    No Image Available
                                    <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                                  <?php } ?>
                                    </div>
                                  </div>
                                  <div class="">
                                    <div class="team_star_rating">
                                      <p class="ratings">
                                       <?php
                                      if(isset($row['rating'][0]->rating)){ ?>
                                          <a><?php echo $row['rating'][0]->rating;?>/5</a>
                                            <?php for($i=1 ; $i<=$row['rating'][0]->rating; $i++){
                                              $selected = "-o";
                                              if(!empty($row['rating'][0]->rating) && $i<=$row['rating'][0]->rating) {
                                              $selected = "";
                                            } ?>
                                          <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                          <?php }
                                          $relC = 5-$row['rating'][0]->rating;
                                          for($k=1; $k<=$relC; $k++){
                                            echo '  <a href="#"><span class="fa fa-star-o"></span></a>';
                                          }?>
                                    <?php } else{ ?>
                                      <a>0/5</a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                      <a href="#"><span class="fa fa-star-o"></span></a>
                                    <?php }?>
                                      </p>
                                    </div>
        
                                  </div>
                                </div>
                              </div>
        
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
        </div>
        <!-- /page content -->
        
        <div class="modal fade bs-example-modal-lghirefor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="close1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Hire Team</h4>

      </div>
      <div class="modal-body">
      		<form class="form-horizontal" id="formteam">
        	<input type="hidden" id="cats" name="cat" value="">           
            <input type="hidden" id="pids" name="pid" value="">
            <input type="hidden" id="assignedbusiness_id" name="assignedbusiness_id" value="<?php echo $assignedbusiness_id;?>">
         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Project Name* : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" name="project_name" id="project_name" value="" class="form-control"><span id="errP" style="color:red;"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Work Details <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <textarea class="form-control" name="work_detail" id="work_detail"></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Type of Project * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select name="type_of_project" id="type_of_project" class="form-control">
                            <option value="">Type of Project</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Onetime">Onetime</option>
                          </select>
                          <span id="errTP" style="color:red;"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Hire * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select name="hiretype" id="hiretype" class="form-control">
                            <option value="">Hire  *</option>
                            <option value="contract" >Contract work</option>
                            <option value="project">Project Work</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Prefered Mode Of Consultant * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select name="prefered_mode" id="prefered_mode" class="form-control">
                            <option value="">Prefered Mode</option>
                            <option value="Onsite">Onsite</option>
                            <option value="Offsite">Offsite</option>
                          </select>
                          <span id="errPM" style="color:red;"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Number of approximate hours required per week for completion of project * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select name="no_of_hours" id="no_of_hours" class="form-control">
                            <option value="">Number of Hours Required</option>
                            <option value="10">0-10</option>
                            <option value="25">10-25</option>
                            <option value="35">25-35</option>
                            <option value="45">35-45</option>
                            <option value="46">45+</option>
                          </select>
                          <span id="errWH" style="color:red;"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Budget for the Project (AUD) * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <input type="text" class="form-control numeric" name="bidamounthire" id="bidamounthire" placeholder="Budget Amount" value="">
                          <span id="errBudget" style="color:red;"></span>
                          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Payment Option * : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select  name="paytype" id="paytype" class="form-control">
                            <option value="">Select Payment Option *</option>
                            <option value="hourly">Hourly</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="fixed">Fixed</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Additional Comment : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <textarea class="form-control" id="comment" name="comment"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Do you want company name to be confidential : </label>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                          <select name="confedential" id="confedential" class="form-control">
                            <option value="">Confidential</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>

                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <span id="err" style="color: red;"></span>
                            <span id="suc" style="color: green;"></span>
                            <div class="modal-footer" style="text-align: center;">
                            <div id="loading" style="display: none;">
                            <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
                            </div>
                            <button type="button" class="btn btn-default" id="close">Close</button>
                            <button type="button" class="btn btn-primary" id="save">Hire</button>
                            </div>                            
                        </div>
                      </div>                    

          </form>
      </div>
      </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lgreview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="closeteamrating"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Your Reviews</h4>

      </div>
      <div class="modal-body">
        <input type="hidden" id="rbid" name="rbid" value="">
          <form class="form-horizontal">
            <textarea id="reviewtext" value="" class="form-control"></textarea>
          </form>
      </div>
            <div class="modal-footer" style="text-align: center;">
              <button type="button" class="btn btn-primary" id="postReview">Post Review</button>
            </div>
      </div>
  </div>
</div>        
        
        <script>
		function openPopUp(cat,pId){
			$("#cats").val(cat); 
 			$("#pids").val(pId);
			
			$("#close1").click(function() {
			$("#project_name").val('');
			$("#work_detail").val('');
			$("#type_of_project").val('');
			
			$("#hiretype").val('');
			$("#prefered_mode").val('');
			$("#no_of_hours").val('');
			
			$("#bidamounthire").val('');
			$("#paytype").val('');
			$("#comment").val('');
			$("#confedential").val('');
			
			$("#errM").html('');
			$("#suc").html('');
			$("#err").html('');
			$("#errorNumeric").html('');
			$(".bs-example-modal-lg").modal('hide');
			$(".bs-example-modal-lghirefor").modal('hide');
			});
			
			$("#close").click(function() {
			$("#project_name").val('');
			$("#work_detail").val('');
			$("#type_of_project").val('');
			
			$("#hiretype").val('');
			$("#prefered_mode").val('');
			$("#no_of_hours").val('');
			
			$("#bidamounthire").val('');
			$("#paytype").val('');
			$("#comment").val('');
			$("#confedential").val('');	
			
			$("#errM").html('');
			$("#suc").html('');
			$("#err").html('');
			$("#errorNumeric").html('');
			$(".bs-example-modal-lg").modal('hide');
			$(".bs-example-modal-lghirefor").modal('hide');
			});
			
			$("#save").click(function(){				
				//var cat = $("#cat").val();
				var assignedbusiness_id = $("#assignedbusiness_id").val();
				var pid = $("#pids").val();								
				var project_name = $("#project_name").val();
				var work_detail = $("#work_detail").val();
				var type_of_project = $("#type_of_project option:selected").val();
				var hiretype = $("#hiretype option:selected").val();
				var prefered_mode = $("#prefered_mode option:selected").val();
				var no_of_hours = $("#no_of_hours option:selected").val();				
				var comment = $("#comment").val();
				var confedential = $("#confedential").val();
				var bidamounthire = $("#bidamounthire").val();
				var paytype = $("#paytype option:selected").val();
			
				var error = 0;
			
				if(project_name==''){
				  $("#errP").html('Please provide Project Name.');
				  error=1;
				}else{
				  $("#errP").html('');
				}
				if(work_detail==''){
				  $("#errW").html('Please provide work details.');
				  error=1;
				}else{
					$("#errW").html('');
				}
			
				if(type_of_project==0){
				  $("#errTP").html('Please provide Type of Project.');
				  error=1;
				}else{
					$("#errTP").html('');
				}
				if(hiretype==0){
				  $("#errHT").html('Please select Hire Type.');
				  error=1;
				}else{
					$("#errHT").html('');
				}
				if(no_of_hours==0){
				  $("#errWH").html('Please provide Number of Hours Required.');
				  error=1;
				}else{
					$("#errWH").html('');
				}
			
				if(bidamounthire==''){
				  $("#errBudget").html('Please provide your Budget.');
				  error=1;
				}else{
				  $("#errBudget").html('');
				}
			
				if(paytype==''){
				  $("#errPT").html('Please select Payment Option.');
				  error=1;
				}else{
				  $("#errPT").html('');
				}
			
			
				if(prefered_mode==0){
				  $("#errPM").html('Please provide Prefered Mode.');
				  error=1;
				}else{
					$("#errPM").html('');
				}
			
				if(error==0){
				  $('#save').prop('disabled', true);
				  $('#close').prop('disabled', true);
				  $("#loading").show();
				  $.ajax({
					type:"POST",
					url:"<?php echo base_url();?>admin/explore/add",
					data:{"work_detail":work_detail,"project_name":project_name,"type_of_project":type_of_project,"hiretype":hiretype,
					  "prefered_mode":prefered_mode,"no_of_hours":no_of_hours,"bidamounthire":bidamounthire,"paytype":paytype,"comment":comment,"confedential":confedential,"assignedbusiness_id":assignedbusiness_id,"pid":pid},
					success: function(theResponse){
					  //alert(theResponse);
					  $("#loading").hide();
					  if (theResponse=='success'){
						$('#close').prop('disabled', false);
						$("#suc").html('Quotation is added and Assign to the professional.');
						setTimeout(function(){window.location.href ="<?php echo base_url();?>admin/quotation/team"}, 4000);
						
					  }else{
						$('#close').prop('disabled', false);
						$("#err").html('Sorry something went wrong.');
						setTimeout(function(){$('#err').html('');}, 4000);
					  }
					  //$("#succ").html(theResponse);
					}
				  });
	}
  });	
$(".bs-example-modal-lghirefor").modal();
		}
</script>
<script>
function highlightStar(obj,id) {
      removeHighlight(id);
      $('.demo-table #tutorial-'+id+' li').each(function(index) {
        $(this).addClass('highlight');
        if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
          return false;
        }
      });
    }
	
	 function removeHighlight(id) {
      $('.demo-table #tutorial-'+id+' li').removeClass('selected');
      $('.demo-table #tutorial-'+id+' li').removeClass('highlight');
    }
	$("#closeteamrating").click(function() {   
    $(".bs-example-modal-lgreview").modal('hide');   
  });
	 function addRating(obj,id) {
      $("#rbid").val(id);
      $(".bs-example-modal-lgreview").modal('show');
      $('.demo-table #tutorial-'+id+' li').each(function(index) {
        $(this).addClass('selected');
        $('#tutorial-'+id+' #rating').val((index+1));
        if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
          return false;
        }
      });
	  
	     $("#postReview").click(function(){
          var reviewtext = $("#reviewtext").val();
          $.ajax({
            url: "<?php echo base_url();?>admin/explore/addTeamRatings",
            data:'reviewtext='+reviewtext+'&team_id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
            type: "POST",
            success:function(d){
              if(d=='Error'){
                alert('You already rated');
                location.reload();
              }else{
                  alert('Thanks For Rating');
                  location.reload();
              }
            }
          });
      });
	}
	
	function updateRating(obj,id) {
      $('.demo-table #tutorial-'+id+' li').each(function(index) {
        $(this).addClass('selected');
        $('#tutorial-'+id+' #rating').val((index+1));
        if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
          return false;
        }
      });
      $.ajax({
      url: "<?php echo base_url();?>admin/explore/updateTeamRatings",
      data:'team_id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
      type: "POST",
      success:function(d){
        if(d=='Error'){
          alert('You already rated');
          location.reload();
        }else{
            alert('Thanks For Rating');
            location.reload();
        }
      }
      });
    }
	
	 function resetRating(id) {
      if($('#tutorial-'+id+' #rating').val() != 0) {
        $('.demo-table #tutorial-'+id+' li').each(function(index) {
          $(this).addClass('selected');
          if((index+1) == $('#tutorial-'+id+' #rating').val()) {
            return false;
          }
        });
      }
    } 

    function showReviews(){
      $("#rev").toggle();
    }	
</script>

        
        