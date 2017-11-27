
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
              <h3>Find & get the Job <strong>done</strong></h3>
              <div class="explor-profes-list-form">
                
                <div class="explor-profes-list-form-inbox"> <input type="text" id="name" value="" placeholder="Search professionals by name"><i class="fa fa-search" aria-hidden="true"></i></div>
                <input type="submit" name="" value="Hire Now" onClick="getProfessionalByName();">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="boday_main">
        	<div class="main_container01">

            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="explore_left_side">
                  <div id="open-by-default-example" data-collapse>
                    <h3 class="open">Categories </h3>
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
                                  <input id="test<?php echo $value->id;?>" class="ipchkCategory" value="<?php echo $value->id;?>" name="sport1" onclick="selectCat();" type="checkbox">
                                    <label for="test<?php echo $value->id;?>"><?php echo $value->category_name;?></label>
                                  
                              </li>
                               <?php } ?>
                            </ul>
                            <!--Ends here-->
                          </li>
                        <?php $i++ ; } ?>
                       
                        
                      </ul>
                    </div>
                    <!-- <h3 class="open">Sub Category</h3>
                    <div>
                        <ul>
                          <?php $i=7; foreach ($subCategoryList as $key => $value) { ?>
                          <li>
                            <input type="checkbox" name="sport1" id="test<?php echo $i;?>" class="ipchkSubCategory" value="<?php echo $value->id;?>" onClick="selectCat();"/>
                            <label for="test<?php echo $i;?>"><?php echo $value->category_name;?></label>
                          </li>
                        <?php $i++ ; } ?>
                      </ul>
                    </div> -->
                    
                     <h3 class="open">Industry</h3>
                    <div>
                        <ul>
                          <?php $j=1; foreach ($industrylist as $key => $value) { //echo '<pre>';print_r($value);die;?>
                          <li>
                            <input type="checkbox" name="sport3" id="ipchkindustry<?php echo $j;?>" class="ipchkindustry" value="<?php echo $value->id;?>" onClick="selectCat();"/>
                            <label for="ipchkindustry<?php echo $j;?>"><?php echo $value->industry_name;?></label>
                          </li>
                        <?php $j++ ; } ?>
                      </ul>
                    </div>
                    <!-- <h3 class="open">Job Type</h3>
                    <div>
                        <ul>
                          <li>
                              <input type="checkbox" id="test13" />
                              <label for="test13">Full Time</label>
                          </li>
                          <li>
                              <input type="checkbox" id="test14"  checked="checked"/>
                              <label for="test14">Part Time</label>
                          </li>
                          <li>
                              <input type="checkbox" id="test15" />
                              <label for="test15">Contract Work </label>
                          </li>
                      </ul>
                    </div> -->
                    <h3 class="open">Ratings</h3>
                    <div>
                        <ul>
                          
                          <?php for($i=5;$i > 0;$i-=1){ ?>
                          <li>
                              <input type="checkbox" id="test<?php echo $i+100;?>" value="<?php echo $i;?>"
                               onclick="selectCat();"  name="sport2" class="ipchkStar" />
                              <label for="test<?php echo $i+100;?>"><?php echo $i;?> star <?php if($i==1) { ?><i class="fa fa-star"></i> <?php } ?><?php if($i==2){ ?><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php } ?>
                              <?php if($i==3){ ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php } ?>
                            <?php if($i==4){ ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php } ?>
                          <?php if($i==5){ ?><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <?php } ?></label>
                          </li>
                          <?php } ?>
                          
                          
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="explore_right_side">
                  <div id="result">
                  <?php 
				 	//echo '<pre>';print_r($professionalList);die;
                    foreach ($professionalList as $row) { ?>
                   <!--repeat start here-->
                   
                    <div class="explore_profesnal_list">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="explore_profesnal_list_left">
                              <?php if($row->businesslogo!=''){ ?>
                              <img src="<?php echo base_url();?>uploads/business/<?php echo $row->businesslogo;?>" alt="profile image">
                              <?php } else if($row->picture!=''){ ?>
                              <img src="<?php echo $row->picture ;?>" alt="profile image">
                              <?php } else{ ?>
                              <img src="<?php echo base_url();?>admin-assets/images/profile_pic.png" alt="profile image">
                              <?php } ?>
                              </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="explore_profesnal_list_right">
                                <h3><?php echo $row->profile_name; ?> <span class="star_rewviw"><i class="fa fa-star"></i> <?php echo $row->totalRatings->MaxRating;?></span> <span class="star_coment"><i class="fa fa-commenting"></i><?php echo $row->totalRatings->totalRatings;?></span></h3>
                                <p><?php echo $row->executiveSummary;?></p>
                                <ul>
                                  <li>No. of Hiring<span><?php echo $row->totalHiring->totalHiring;?></span></li>
                                  <li>Location<span><?php echo strtoupper($row->country_name);?></span></li>
                                  <li>Category<span><?php echo $row->category_name;?></span></li>
                                </ul>
                                <div class="explore_bottom_buttom">
                                    <button class="fulltime">FULL TIME</button>
                                    <a href="<?php echo base_url();?>admin/professionals/index/<?php echo $row->id;?>"><button class="hirenow">HIRE NOW</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--repeat ends here-->
                  
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
      <!-- /page content -->

<div class="modal fade bs-example-modal-lghirefor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="closePostProposal1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Hire professional</h4>

      </div>
      <div class="modal-body">
        <input type="hidden" id="cats" name="cat" value="">
            <input type="hidden" id="subcats" name="subcat" value="">
            <input type="hidden" id="pids" name="pid" value="">
          <form class="form-horizontal">
            <input type="button" id="project" class="btn btn-default" onClick="openPopUp2();" value="Hire for Project">
            <input type="button" id="work" class="btn btn-default" onClick="openPopUp3();" value="Hire for Work">
          </form>
      </div>
      </div>
  </div>
</div>


<!--hire popup starts here-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Project Details</h4>
      </div>
      <div class="modal-body">

          <form class="form-horizontal">
            <input type="hidden" id="cat" name="cat" value="">
            <input type="hidden" id="subcat" name="subcat" value="">
            <input type="hidden" id="pid" name="pid" value="">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Project Name* : </label>
              <div class="col-sm-4">
                <input type="text" name="project_name" id="project_name" value="" class="form-control"><span id="errP" style="color:red;"></span>
              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Work Details* : </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="work_detail"></textarea><span id="errW" style="color:red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Type of Project* : </label>
              <div class="col-sm-4">
                <select name="type_of_project" id="type_of_project" class="form-control">
                  <option value="0">Type of Project</option>
                  <option value="ongoing">Ongoing</option>
                  <option value="onetime">Onetime</option>
                </select>
                <span id="errTP" style="color:red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Hire* : </label>
              <div class="col-sm-4">
                <select name="hiretype" id="hiretype" class="form-control">
                  <option value="0">Hire</option>
                  <option value="contract">Contract Work</option>
                  <option value="project">Project Work</option>
                </select>
                <span id="errHT" style="color:red;"></span>
              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Prefered Mode Of Consultant* : </label>
              <div class="col-sm-4">
                <select name="prefered_mode" id="prefered_mode" class="form-control">
                  <option value="0">Prefered Mode</option>
                  <option value="Onsite">Onsite</option>
                  <option value="Offsite">Offsite</option>
                </select>
                <span id="errPM" style="color:red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Number of approximate hours required per week for completion of project* : </label>
              <div class="col-sm-4">
                <select name="no_of_hours" id="no_of_hours" class="form-control">
                  <option value="0">Number of Hours Required</option>
                  <option value="10">0-10</option>
                  <option value="25">10-25</option>
                  <option value="35">25-35</option>
                  <option value="45">35-45</option>
                  <option value="46">45+</option>
                </select>
                <span id="errWH" style="color:red;"></span>
              </div>
            </div>

            <!-- <div class="form-group">
              <label class="control-label col-sm-4" for="email">Your Location : </label>
              <div class="col-sm-4">
                <input type="text" id="location" name="location" required="required" class="form-control col-md-7 col-xs-12" value="">

              </div>
            </div> -->

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Budget for the Project* : </label>
              <div class="col-sm-4">
                <input type="text" class="form-control numeric" id="bidAmountIndividual" placeholder="BID Amount">
                <span id="errBudget" style="color:red;"></span>
                <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">What is Payment options* :</label>
              <div class="col-sm-4">
                <select  name="paytype" id="paytype" class="form-control">
                  <option value="">Select Payment Option *</option>
                  <option value="hourly">Hourly</option>
                  <option value="daily">Daily</option>
                  <option value="weekly">Weekly</option>
                  <option value="monthly">Monthly</option>
                  <option value="fixed">Fixed</option>
                </select>
                <span id="errPT" style="color:red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Additional Comment : </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="comment"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Do you want company name to be confidential : </label>
              <div class="col-sm-4">
                <select name="confedential" id="confedential" class="form-control">
                  <option value="0">Confidential</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>

                </select>
              </div>
            </div>

          </form>
      </div>
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
</div>
<!-- ends here-->

<!--hire popup starts here-->
<div class="modal fade bs-example-modal-lgforjob" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="close1forjob"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Project Details</h4>
      </div>
      <div class="modal-body">

          <form class="form-horizontal">
            <input type="hidden" id="catjob" name="cat" value="">
            <input type="hidden" id="subcatjob" name="subcat" value="">
            <input type="hidden" id="pidjob" name="pid" value="">
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Job Title* : </label>
              <div class="col-sm-4">
                <input type="text" name="project_name" id="project_namejob" value="" class="form-control"><span id="errPJob" style="color:red;"></span>
              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Job Description* : </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="work_detailjob"></textarea>
                <span id="errWJob" style="color:red;"></span>
              </div>
            </div>

           
            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Type of Role* : </label>
              <div class="col-sm-4">
                <select name="hiretype" id="hiretypejob" class="form-control">
                  <option value="full">Full Time</option>
                  <option value="part">Part Time </option>
                  <option value="contract">Contract</option>
                </select>
                <span id="errHTJob" style="color:red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Location* : </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="location" value="">
                <span id="errLocjob" style="color:red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Number of approximate hours required per week for completion of project* : </label>
              <div class="col-sm-4">
                <select name="no_of_hours" id="no_of_hoursjob" class="form-control">
                  <option value="0">Number of Hours Required</option>
                  <option value="10">0-10</option>
                  <option value="25">10-25</option>
                  <option value="35">25-35</option>
                  <option value="45">35-45</option>
                  <option value="46">45+</option>
                </select>
                <span id="errWHJob" style="color:red;"></span>
              </div>
            </div>

            

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Salary* : </label>
              <div class="col-sm-4">
                <input type="text" class="form-control numeric" id="bidAmountIndividualJob" placeholder="BID Amount">
                <span id="errBudgetjob" style="color:red;"></span>
                <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">What is Payment options* :</label>
              <div class="col-sm-4">
                <select  name="paytype" id="paytypejob" class="form-control">
                  <option value="">Select Payment Option *</option>
                  <option value="hourly">Hourly</option>
                  <option value="daily">Daily</option>
                  <option value="anually">Annually</option>
                </select>
                <span id="errPTjob" style="color:red;"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Additional Comment : </label>
              <div class="col-sm-4">
                <textarea class="form-control" id="commentjob"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">Do you want company name to be confidential : </label>
              <div class="col-sm-4">
                <select name="confedential" id="confedentialjob" class="form-control">
                  <option value="0">Confidential</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>

                </select>
              </div>
            </div>

          </form>
      </div>
      <span id="errjob" style="color: red;"></span>
      <span id="sucjob" style="color: green;"></span>
      <div class="modal-footer" style="text-align: center;">
        <div id="loading" style="display: none;">
          <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
        </div>
        <button type="button" class="btn btn-default" id="closeforwork">Close</button>
        <button type="button" class="btn btn-primary" id="saveforwork">Hire</button>
      </div>

    </div>
  </div>
</div>
<!-- ends here-->

<!--delete services script-->
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

function getSubCategory(matches){
if(matches){
  jQuery("#subC").html("<center>Loading...</center>");
  jQuery.ajax({
  type: "POST",
  url: "<?php echo base_url();?>admin/professionals/getSubCategory",
  data: {'ipchk': matches},
    success: function(theResponse)
    {
      //alert(theResponse);
      jQuery("#subC").html(theResponse);
      }
  });
}
}

function getProfessional(){
  $("#frm").submit();
}

function openPopUp(cat,subcat,pId){
  $("#cats").val(cat);
  $("#subcats").val(subcat);
  $("#pids").val(pId);
  $(".bs-example-modal-lghirefor").modal();

}

function openPopUp2(){
  var cat = $("#cats").val();
  var subcat = $("#subcats").val();
  var pId = $("#pids").val();

  $("#cat").val(cat);
  $("#subcat").val(subcat);
  $("#pid").val(pId);
  $(".bs-example-modal-lghirefor").hide();
  $(".bs-example-modal-lg").modal();
}

function openPopUp3(){
  var cat = $("#cats").val();
  var subcat = $("#subcats").val();
  var pId = $("#pids").val();

  $("#catjob").val(cat);
  $("#subcatjob").val(subcat);
  $("#pidjob").val(pId);

  $(".bs-example-modal-lghirefor").hide();
  $(".bs-example-modal-lgforjob").modal();
}

/*function getProfessional(sub_category){
var category = $("#category option:selected").val();
$.ajax({
  type: "POST",
  url: "<?php echo base_url();?>admin/professionals/getProfessionalByCatNSubCat",
  data: {'category': category,'sub_category':sub_category},
    success: function(theResponse)
    {
      //alert(theResponse);
      jQuery("#datatable").html(theResponse);
      }
});
}*/
$(document).ready(function() {
  $("#close1").click(function() {
    $("#work_detail").val('');
    $("#location").val('');
    $("#errM").html('');
    $("#suc").html('');
    $("#err").html('');
    $("#errorNumeric").html('');
    $(".bs-example-modal-lg").modal('hide');
    $(".bs-example-modal-lghirefor").modal('hide');
  });
  $("#close").click(function() {
    $("#work_detail").val('');
    $("#location").val('');
    $("#errM").html('');
    $("#suc").html('');
    $("#err").html('');
    $("#errorNumeric").html('');
    $(".bs-example-modal-lg").modal('hide');
    $(".bs-example-modal-lghirefor").modal('hide');
  });

  $("#save").click(function(){

    var cat = $("#cat").val();
    var subcat = $("#subcat").val();
    var pId = $("#pid").val();
    var project_name = $("#project_name").val();
    var work_detail = $("#work_detail").val();
    var type_of_project = $("#type_of_project option:selected").val();
    var hiretype = $("#hiretype option:selected").val();
    var prefered_mode = $("#prefered_mode option:selected").val();
    var no_of_hours = $("#no_of_hours option:selected").val();
    //var type_of_project = $("#type_of_project").val();

    //var location = $("#location").val();
    var comment = $("#comment").val();
    var confedential = $("#confedential").val();
    var bidAmountIndividual = $("#bidAmountIndividual").val();
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

    if(bidAmountIndividual==''){
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
        url:"<?php echo base_url();?>admin/professionals/hireProfessional",
        data:{"cat":cat,"subcat":subcat,"pId":pId,"work_detail":work_detail,"type_of_project":type_of_project,"hiretype":hiretype,
          "prefered_mode":prefered_mode,"no_of_hours":no_of_hours,"bidAmountIndividual":bidAmountIndividual,"paytype":paytype,"comment":comment,"confedential":confedential},
        success: function(theResponse){
          //alert(theResponse);
          $("#loading").hide();
          if (theResponse=='success'){
            $('#close').prop('disabled', false);
            $("#suc").html('Quotation is added and Assign to the professional.');
            setTimeout(function(){$('#suc').html('');}, 4000);
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


  /*post a job for professional*/

  $("#close1forjob").click(function() {
    $("#work_detail").val('');
    $("#location").val('');
    $("#errM").html('');
    $("#suc").html('');
    $("#err").html('');
    $("#errorNumeric").html('');
    $(".bs-example-modal-lgforjob").modal('hide');
    $(".bs-example-modal-lghirefor").modal('hide');
  });
  $("#closeforwork").click(function() {
    $("#work_detail").val('');
    $("#location").val('');
    $("#errM").html('');
    $("#suc").html('');
    $("#err").html('');
    $("#errorNumeric").html('');
    $(".bs-example-modal-lgforjob").modal('hide');
    $(".bs-example-modal-lghirefor").modal('hide');
  });

  $("#saveforwork").click(function(){

    var cat = $("#catjob").val();
    var subcat = $("#subcatjob").val();
    var pId = $("#pidjob").val();
    var project_name = $("#project_namejob").val();
    var work_detail = $("#work_detailjob").val();
    var hiretype = $("#hiretypejob option:selected").val();
    var no_of_hours = $("#no_of_hoursjob option:selected").val();
    var location = $("#location").val();
    var bidAmountIndividual = $("#bidAmountIndividualJob").val();
    var paytype = $("#paytypejob option:selected").val();
    var comment = $("#commentjob").val();
    var confedential = $("#confedentialjob").val();

    var error = 0;

    if(project_name==''){
      $("#errPJob").html('Please provide Project Name.');
      error=1;
    }else{
      $("#errPJob").html('');
    }
    if(work_detail==''){
      $("#errWJob").html('Please provide work details.');
      error=1;
    }else{
        $("#errWJob").html('');
    }

   
    if(hiretype==0){
      $("#errHTJob").html('Please select Hire Type.');
      error=1;
    }else{
        $("#errHTJob").html('');
    }
    if(no_of_hours==0){
      $("#errWHJob").html('Please provide Number of Hours Required.');
      error=1;
    }else{
        $("#errWHJob").html('');
    }

    if(bidAmountIndividual==''){
      $("#errBudgetjob").html('Please provide your Budget.');
      error=1;
    }else{
      $("#errBudgetjob").html('');
    }

    if(paytype==''){
      $("#errPTjob").html('Please select Payment Option.');
      error=1;
    }else{
      $("#errPTjob").html('');
    }

 

    if(error==0){
      $('#saveforwork').prop('disabled', true);
      $('#closeforwork').prop('disabled', true);
      $("#loading").show();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/professionals/hireProfessionalForJob",
        data:{"cat":cat,"subcat":subcat,"pId":pId,"project_name":project_name,"work_detail":work_detail,"hiretype":hiretype,"no_of_hours":no_of_hours,"location":location,"bidAmountIndividual":bidAmountIndividual,"paytype":paytype,"comment":comment,"confedential":confedential},
        success: function(theResponse){
          $("#loading").hide();
          if (theResponse=='success'){
            $('#closeforwork').prop('disabled', false);
            $("#sucjob").html('Quotation is added and Assign to the professional.');
            setTimeout(function(){$('#sucjob').html('');}, 4000);
          }else{
            $('#closeforwork').prop('disabled', false);
            $("#errjob").html('Sorry something went wrong.');
            setTimeout(function(){$('#errjob').html('');}, 4000);
          }
        }
      });
    }
  });

  
  
  $('.ipchkCategory:checked').each(function(){
    var matches = [];
    alert('checked');
    //matches.push(this.value);
    //alert(matches);
    // jQuery.ajax({  
    //   type: "POST",  
    //   url: "<?php echo base_url();?>admin/settings/setNotification",  
    //   data: {'ipchk': matches},  
    //   success: function(theResponse){
    //     alert(theResponse);
    //     if(theResponse=='success'){
    //       alert('Your Lead notification updated.');
    //       location.reload();
    //     }else{
    //       alert('Something went wrong.');
    //       location.reload();
    //     }
        
        
    //   }

    // }); 
  });

  

});

function favourite(ind_id,b_id){
     $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/professionals/insertFavourite",
        data:{ind_id,b_id},
        success: function(theResponse){        
          if (theResponse=='success'){
     alert('Favourite tab added ');           
           }else if (theResponse =='already'){
      alert('Already added Favourite tab');   
     }else{
            alert('Error'); 
          }
        }
      });
 }

 function getProfessionalByName(){
  alert('click');
 }

function selectCat(){
  var favorite = [];
  var favorite1 = [];
  var favorite2 = [];
  var favorite3 = [];
  $.each($("input[name='sport']:checked"), function(){            
    favorite.push($(this).val());
  });

  $.each($("input[name='sport1']:checked"), function(){            
    favorite1.push($(this).val());
  });

  $.each($("input[name='sport2']:checked"), function(){            
    favorite2.push($(this).val());
  });
  $.each($("input[name='sport3']:checked"), function(){            
    favorite3.push($(this).val());
  });
  var ff = favorite.join(", ");
  jQuery.ajax({  
      type: "POST",  
      url: "<?php echo base_url();?>admin/professionals/getSearchProfessional",  
      data: {'ipchk': favorite,'ipchk2':favorite1,'ipchk3':favorite2,'ipchk4':favorite3},  
      success: function(theResponse){
        $("#result").html(theResponse);  
      }
    });
 }
</script>
<script>
  var el = $("#events-example"),
    log = $("#event-log");

  el.collapse()
    .bind("open", function(e, section) {
      log.html("'" + section.$summary.text() + "' was opened");
    })
    .bind("close", function(e, section) {
      log.html("'" + section.$summary.text() + "' was closed");
    });
</script>

<script>
  


jQuery('.toggle-list label').click(function() {
    
   jQuery(this).next('.search_sub_list').slideToggle(1000);
   jQuery(this).children('.fa-plus').toggleClass('fa-minus');
    
});


</script>

