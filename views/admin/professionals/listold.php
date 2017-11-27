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
                  <h2>Professionals</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="profile_form_update edu_update01 lead_box">
                <form id="frm" action="<?php echo base_url();?>admin/professionals" method="post">
                <div class="row form-group">
                	<div class="col-md-3 col-sm-3 col-xs-12"><div class="more_filer">Filters</div></div>
                   <div class="col-md-3 col-sm-3 col-xs-12">
                     <select id="category" name="category" class="" onChange="getSubCategory(this.value);">
                     <option value="">--Select Category--</option>
                     <?php $i=0;
                     foreach($categoryList as $category){?>
                        <option value="<?php echo $category->id;?>"><?php echo $category->category_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                  	<div class="register_form_sub_02" id="subC"></div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                     <select id="country" name="country" class=""  onchange="getProfessional();">
                     <option value="">--Select Country--</option>
                     <?php $i=0;
                     foreach($countryList as $country){
                     //echo '<pre>';print_r($country);?>
                        <option value="<?php echo $country->id;?>"><?php echo $country->name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                
                </form>
                <div class="x_content">
                  <div id="errorMsg" style="color:red"></div>
                  <div id="successMsg" style="color:green"></div>
                  <table id="datatable" class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <!--<th>Email</th>
                        <th>Mobile</th>-->
                        <th>Category</th>
                        <th>Sub Category</th>                       
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;
                        if(! empty($professionalsList)){
                          foreach ($professionalsList[$i] as $row) {							  
                            //echo '<pre>';print_r($row);
                            echo '<tr><td>'.$row->contact_person_name.'</td>';
                            //echo '<td>'.$row->email.'</td>';
                          //  echo '<td>'.$row->mobile.'</td>';
                            echo '<td>'.$row->category_name.'</td>';
                            echo '<td>'.$sub_cat.'</td>';							
							echo '<td><a href="'.base_url().'admin/professionals/index/'.$row->id.'" class="tabl_link"><i class="fa fa-eye"></i> view</a></td> ';
                            //echo '<td><a href="javascript:void();" class="btn btn-success" onclick="openPopUp('.$categorys.','.$sub_category.','.$row->id.')">Hire</a></td>';
							echo '</tr>';
                            $i++;
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

});
</script>
