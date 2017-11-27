
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
              <h3>Search Project</h3>
           
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
                    
                    
                     <h3 class="open">Type of Project</h3>
                    <div>
                        <ul>                        
                          <li>
                            <input type="checkbox" name="sport2" id="top1" class="ipchkindustry" value="ongoing" onClick="selectCat();"/>
                            <label for="top1">Ongoing</label>
                          </li>
                          <li>
                            <input type="checkbox" name="sport2" id="top2" class="ipchkindustry" value="onetime" onClick="selectCat();"/>
                            <label for="top2">Onetime</label>
                          </li>                       
                      </ul>
                    </div>
                    
                      <h3 class="open">Prefered Mode</h3>
                    <div>
                        <ul>                        
                          <li>
                            <input type="checkbox" name="sport3" id="pm1" class="ipchkindustry" value="Onsite" onClick="selectCat();"/>
                            <label for="pm1">Onsite</label>
                          </li>
                          <li>
                            <input type="checkbox" name="sport3" id="pm2" class="ipchkindustry" value="Offsite" onClick="selectCat();"/>
                            <label for="pm2">Offsite</label>
                          </li>                       
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-sm-8 col-xs-12">
               <div id="result">
                <div class="match_pro_list match_pro_search">
                          <div class="shot_list_pro"><?php //echo count($projectList);?>  <!--<span>Sort by : <b>Date</b></span>--></div>
                          <ul>
                          <?php foreach ($projectList as $row) { //echo '<pre>';print_r($row); die;?>
                            <li>
                                <div class="mact_lit01">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h3>Project posted <?php echo date('Y-m-d',strtotime($row->created_date)); ?></h3>
                                      <h4><a href="<?php echo base_url();?>admin/projects/view/<?php echo $row->id;?>"><?php echo $row->project_name; ?></a></h4>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    <?php if($row->bidamounthire){?>
                                      <p>Budget <b>$<?php echo $row->bidamounthire; ?> /<?php echo $row->paytype; ?></b></p>
                                      <?php }?>
                                      <?php if($row->no_of_hours){?>
                                      <p>Duration  <b><?php echo $row->no_of_hours; ?> hours (approx)</b></p>
                                      <?php }?>
                                      <?php if($row->prefered_mode){?>
                                      <p>Consultant location <b><?php echo $row->prefered_mode; ?></b></p>
                                      <?php }?>
                                      <?php if($row->location){?>
                                      <p>Location  <b><?php echo $row->location; ?></b></p>
                                      <?php }?>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                      <p><?php echo $row->work_detail;?></p>
                                      <p><a href="<?php echo base_url();?>admin/projects/view/<?php echo $row->id;?>">View full details ›</a></p>
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
      <!-- /page content -->

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

$(document).ready(function() {  
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
  //alert(favorite);
  jQuery.ajax({  
      type: "POST",  
      url: "<?php echo base_url();?>admin/quotation/getSearchProject",  
      data: {'ipchk': favorite,'ipchk2':favorite1,'ipchk3':favorite2,'ipchk4':favorite3},  
      success: function(theResponse){
        $("#result").html(theResponse);  
      }
    });
 }
</script>


<script>
  

jQuery('.toggle-list label').click(function() {
    
   jQuery(this).next('.search_sub_list').slideToggle(1000);
   jQuery(this).children('.fa-plus').toggleClass('fa-minus');
    
});


</script>