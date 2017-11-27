
<script src="<?php echo base_url();?>admin-assets/js/jquery.collapse.js"></script>
<script src="<?php echo base_url();?>admin-assets/js/jquery.collapse_storage.js"></script>

<style>
/* Base for label styling */
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 30px;
  cursor: pointer;
      color: #565656;
    font-size: 14px;
    font-weight: normal;
}


/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  content: '';
  position: absolute;
  left: 0; top: 0;
      width: 20px;
    height: 20px;
    border: 1px solid rgba(204, 204, 204, 0.48);
    background: #fff;
    border-radius: 1px;
    box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '✔';
  position: absolute;
      top: 3px;
    left: .3em;
    font-size: 15px;
    line-height: 0.8;
    color: #f68c21;
    transition: all .2s;
}
/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="checkbox"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="checkbox"]:disabled:not(:checked) + label:before,
[type="checkbox"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #bbb;
  background-color: #ddd;
}
[type="checkbox"]:disabled:checked + label:after {
  color: #999;
}
[type="checkbox"]:disabled + label {
  color: #aaa;
}
/* accessibility */
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before {
  border: 1px solid #f68c21;
}

/* hover style just for information */
label:hover:before {
  border: 1px solid #f68c21!important;
}


/* Base for label styling */
[type="radio"]:not(:checked),
[type="radio"]:checked {
  position: absolute;
  left: -9999px;
}
[type="radio"]:not(:checked) + label,
[type="radio"]:checked + label {
  position: relative;
  padding-left: 30px;
  cursor: pointer;
      color: #565656;
    font-size: 14px;
    font-weight: normal;
}


/* checkbox aspect */
[type="radio"]:not(:checked) + label:before,
[type="radio"]:checked + label:before {
  content: '';
  position: absolute;
  left: 0; top: 0;
      width: 20px;
    height: 20px;
    border: 1px solid rgba(204, 204, 204, 0.48);
    background: #fff;
    border-radius: 1px;
    box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
}
/* checked mark aspect */
[type="radio"]:not(:checked) + label:after,
[type="radio"]:checked + label:after {
  content: '✔';
  position: absolute;
      top: 3px;
    left: .3em;
    font-size: 15px;
    line-height: 0.8;
    color: #f68c21;
    transition: all .2s;
}
/* checked mark aspect changes */
[type="radio"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="radio"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="radio"]:disabled:not(:checked) + label:before,
[type="radio"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #bbb;
  background-color: #ddd;
}
[type="radio"]:disabled:checked + label:after {
  color: #999;
}
[type="radio"]:disabled + label {
  color: #aaa;
}
/* accessibility */
[type="radio"]:checked:focus + label:before,
[type="radio"]:not(:checked):focus + label:before {
  border: 1px solid #f68c21;
}



#open-by-default-example .search_sub_list {
    padding-left: 40px;  display: none;;    margin: 10px 0;
}
#open-by-default-example  .search_sub_list li a {
    color: #444;
}
#open-by-default-example ul li.active .search_sub_list { display: block; }




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

      <div class="explor-profes-list">
        <div class="container">
          <div class="row">
            <div class="explor-profes-list01">
              <h3>Search Professional</h3>
              <div class="explor-profes-list-form">
               <div class="explor-profes-list-form-inbox">
                <input type="text" id="nameemail" name="nameemail" value="" placeholder="Search professionals by name or email"><i class="fa fa-search" aria-hidden="true"></i></div>
                <input type="submit" name="" value="Search" onClick="getProfessionalByName();">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="boday_main">
        	<div class="main_container01">
            	<!-- page content -->
      			<div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="explore_left_side">
                  <div id="open-by-default-example" data-collapse>
                    <h3 class="open">Category </h3>
                    <div>
                        <ul>
                        <?php $i=1; foreach ($categoryList as $key => $value) { //echo '<pre>';print_r($value);die;?>
                          <li class="toggle-list">
                           <!--  <input type="hidden" id="test<?php echo $i;?>" class="ipchkCategory" value="<?php echo $value->id;?>" name="sport" onClick="selectCat();"  /> -->
                            <label for="test<?php echo $i;?>"><?php echo $value->category_name;?><i class="fa fa-plus" aria-hidden="true"></i></label>
                            <!--Loop for sub category-->
                            <ul class="search_sub_list">
                               <?php foreach ($value->sub_cat as $key => $value) { ?>
                              <li>
                                  <input id="test<?php echo $value->id;?>" class="ipchkCategory" value="<?php echo $value->id;?>" name="sport1" onclick="selectCat();" type="radio">
                                    <label for="test<?php echo $value->id;?>"><?php echo $value->category_name;?></label>
                                 
                              </li>
                               <?php } ?>
                            </ul>
                            <!--Ends here-->
                          </li>
                        <?php $i++ ; } ?>
                       
                        
                      </ul>
                    </div>
                    
                    
                    
                    
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="macth_pro pro-lis">
                  <div class="">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      <div id="result">
                        <div class="match_pro_list">
                        <?php ?>
                          <ul>
                          <?php foreach($professionalList as $row){ //echo '<pre>'; print_r($professionalList); ?>
                            <li>
                                <div class="mact_lit01">
                                  <div class="row">
                                    <div class="col-md-3 col-md-3 col-xs-12">
                                      <div class="profef-img">
                                      	<?php if(isset($row->businessLogo) && $row->businessLogo){?>
                                      	  <img src="<?php echo base_url();?>uploads/business/<?php echo $row->businessLogo;?>">
										<?php }elseif(isset($row->picture) && $row->picture){?>
                                        	<img src="<?php echo $row->picture ;?>">
                                        <?php }else {?>
                                        <img src="<?php echo base_url();?>admin-assets/build/images/profile_img012.jpg" alt="Professional image">
                                        <?php }?>
                                      </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <div class="row pro-right_sd">
                                        <div class="col-md-12 ">
                                          <h4><a href="#"><?php echo $row->contact_person_name;?></a></h4>
                                          <p><?php echo $row->executiveSummary;?></p>
                                          <p><a href="<?php echo base_url();?>admin/team/professional/<?php echo $row->id;?>">View full details ›</a> <!--<a href="#" >Request to Join ›</a>--></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </li>
                            <?php }?>
                          </ul>
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

  $("#showCatDiv").click(function(){});

  $("#showNameDiv").click(function(){});
});

function getSubCategoriesByParentId(categoryId){}

function getTeam(sub_category){}


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

$(document).ready(function() {  
  $('.ipchkCategory:checked').each(function(){
    var matches = [];
    alert('checked');
  });
});

function selectCat(){
  var favorite = [];
  var favorite1 = []; 
  $.each($("input[name='sport']:checked"), function(){            
    favorite.push($(this).val());
  });

  $.each($("input[name='sport1']:checked"), function(){            
    favorite1.push($(this).val());
  });
  var ff = favorite.join(", ");
  //alert(favorite);
  jQuery.ajax({  
      type: "POST",  
      url: "<?php echo base_url();?>admin/team/getSearchProfessional",  
      data: {'ipchk': favorite,'ipchk2':favorite1},  
      success: function(theResponse){
        $("#result").html(theResponse);  
      }
    });
 }
 
 function getProfessionalByName(){
	  var nameemail = $("#nameemail").val();
	  if(nameemail){
		  jQuery.ajax({  
		  type: "POST",  
		  url: "<?php echo base_url();?>admin/team/getProfessionalByName",  
		  data: {'nameemail': nameemail},  
		  success: function(theResponse){
			$("#result").html(theResponse);  
		  }
		});
	  }
	 
 }
</script>
<script>
  

jQuery('.toggle-list label').click(function() {
    
   jQuery(this).next('.search_sub_list').slideToggle(1000);
   jQuery(this).children('.fa-plus').toggleClass('fa-minus');
    
});


</script>