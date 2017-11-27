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
            .demo-table td {border-bottom: #f0f0f0 0px solid;background-color: #ffffff;padding: 5px;}
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
                      <?php //echo '<pre>';print_r($businessDetails);?>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="padding-bottom: 0px;">
                          <div class="x_title page_tit">
                            <h2>Professional Profile<small>Part Time</small></h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="profile_form_update edu_update01">
                          	<div class="profile_team site-header">
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <div class="profile_team_box1">
                                    
                                     <?php if($businessDetails[0]->picture!=0 || $businessDetails[0]->picture ) { ?>
                                        <img src="<?php echo $businessDetails[0]->picture ;?>" alt="Avatar">
                                       <?php } else if($businessDetails[0]->businessLogo!='' ) { ?>
                                       <img src="<?php echo base_url();?>uploads/business/<?php echo $businessDetails[0]->businessLogo ;?>" alt="Avatar"> 
                                        <?php }else { ?>                           		 
                                         <img class="img-responsive avatar-view" src="<?php echo base_url();?>admin-assets/images/img.jpg" alt="Avatar" title="Change the avatar">
                                        <?php } ?>
                              <?php //echo '<pre>';print_r($rating);?>
                              <table class="demo-table bid_star01">
                              <tbody>
                              <tr>
                              </tr>
                              <tr>
                              <td valign="top">
                              <div id="tutorial-<?php echo $businessDetails[0]->id; ?>">
                              <input type="hidden" name="rating" id="rating" value="<?php echo @$rating[0]->rating; ?>" />
                              <ul onMouseOut="resetRating(<?php echo @$rating[0]->ratingId; ?>);">
                                <?php
                                $indArray = array();
                                $adminArray = array();
                                foreach ($rating[1] as $rows) {
                                   $indArray[] = $rows->ind_id;
                                   $adminArray[] = $rows->admin_id;
                                }
                                $adminId = $this->session->userdata('adminId');
                                //echo '<pre>';print_r($indArray);
                                for($i=1;$i<=5;$i++) {
                                $selected = "";
                                if(!empty(@$rating[0]->rating) && $i<=@$rating[0]->rating) {
                                $selected = "selected";
                                }
                                ?>
                                <?php if(in_array($adminId,$adminArray) || in_array($adminId,$indArray) ){ ?>
                                  <li class='<?php echo $selected; ?>' onMouseOver="highlightStar(this,<?php echo @$rating[0]->ratingId; ?>);" onMouseOut="removeHighlight(<?php echo @$rating[0]->ratingId; ?>);" onClick="updateRating(this,<?php echo $businessDetails[0]->id; ?>);">&#9733;</li>
                                <?php  }else{?>
                                  <li class='<?php echo $selected; ?>' onMouseOver="highlightStar(this,<?php echo @$rating[0]->ratingId; ?>);" onMouseOut="removeHighlight(<?php echo @$rating[0]->ratingId; ?>);" onClick="addRating(this,<?php echo $businessDetails[0]->id; ?>);">&#9733;</li>
                                <?php } ?>
                                <?php }  ?>
                              <ul>
                                <button class="tabl_link review_button" onClick="showReviews();"><?php echo count($totalReviews);?> Reviews</button>
                                
                              </div> 
                              </td>
                              </tr>
        
                              </tbody>
                            </table>
        
        
                                       <!-- <div class="profile_team_desig">
                                            <a href="#" target="_blank">Web Design</a>
                                            <a href="#" target="_blank">UI/UX Designer</a>
                                        </div>
                                        <div class="profile_project_com"><p><a href="#">6 PROJECTS COMPLETED</a></p></div>-->
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12 steky_text1">
                                    <div class="profile_team_box2">
                                        <div class="profile_team_name">
                                            <h2><?php echo $businessDetails[0]->first_name;?> <span><?php if(isset($businessDetails['workexp'])) { echo $businessDetails['workexp'][0]->Title; } else { echo 'No Work Experience';}?></span></h2>
                                            <!--<h3>Product designer, lead UX/UI designer</h3>-->
                                            <!--<ul>
                                                <li>Adobe Illustrator <span>6 years</span></li>
                                                <li>Adobe Photoshop <span>4 years</span></li>
                                                <li>Adobe Dreamweaver <span>3 years</span></li>
                                                <li>Sketch <span>3 years</span></li>
                                                <li>UI/UX Designer <span>6 years</span></li>
                                            </ul>-->
                                             <?php
                                        $i=1;
                                        //echo '<pre>';print_r($businessDetails);
                                        if(isset($businessDetails['executiveSummary'])){
                                        foreach ($businessDetails['executiveSummary'] as $ach) {
                                        ?>
                                        <div class="profile_contetnt_new"><?php echo $ach->executiveSummary;?></div>
                                        
                                      <?php $i++; } } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 steky_text2">
                                	<div class="hire_project">
                                   <?php if($this->session->userdata('admin_user_type') == 3){ ?>
           <!--  <?php  echo '<a href="javascript:void();" class="btn btn-success" onclick="openPopUp('.$categorys.','.$sub_category.','.$businessDetails[0]->id.')"><i class="fa fa-user" aria-hidden="true"></i> Hire</a>';?> -->
         
        
                   <?php  echo '<a href="javascript:void();" class="hire_project1" onclick="openPopUp2('.$categorys.','.$sub_category.','.$businessDetails[0]->id.')"><i class="fa fa-user" aria-hidden="true"></i> Hire for project</a>';?>
        
        
                   <?php  echo '<a href="javascript:void();" class="hire_project1" onclick="openPopUp3('.$categorys.','.$sub_category.','.$businessDetails[0]->id.')"><i class="fa fa-briefcase" aria-hidden="true"></i> Hire for work</a>';?>
                  <?php  if(empty($checkfavourite)){?>
                   <?php  echo '<a href="javascript:void();" class="hire_project1" onclick="favourite('.$this->session->userdata('adminId').','.$businessDetails[0]->id.')"><i class="fa fa-star" aria-hidden="true"></i> Favourite</a>';?>
        <?php }?>
        
                    <?php }else{?>
                    <?php echo ($businessDetails[0]->resume_status==0 ? '<a id="status_'.$businessDetails[0]->id.'" href="javascript:void(0);" onclick="updateStatus('.$businessDetails[0]->id.',1);" title="Click to Activate Account" class="btn btn-primary">Verify Account</a>':'<a id="status_'.$businessDetails[0]->id.'" href="javascript:void(0);" class="btn btn-primary">Verified</a>');?>
                    <?php }?>
                                    </div>
                                </div>                        
                            </div>
                            <div class="prfoile_review01">
                              <div id="rev" style="display:none">
                                    <?php $j=0; 
                                    foreach ($totalReviews as $revs) {
                                      echo '<div class="rivew_commen">';
                                    if($revs->admin_id){
                                      echo '<h6>Proyourway</h6>';
                                    }else{
                                       echo '<div class="rivew_name">'.$revs->name.' </div>';
                                    } ?>
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
                                    echo'</div>';
                                  } 
                                  ?>
        
                                </div>
                            </div>
                          </div>        
                          </div>
                        </div>
                      </div>
                      
                      
                    <?php if(isset($businessDetails['objectiveSummary'])){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                                <div class="profile_team_exp">
                                    <h2><i class="fa fa-file-code-o"></i> Objective</h2>
                                   <!-- <h3>Development Tools :</h3>-->                           
                                    <div class="profile_team_exp_tag">
                                     <?php                                
                                        foreach ($businessDetails['objectiveSummary'] as $ach) {								
                                        echo $ach->objectiveSummary;								
                                        }
                                        ?>
                                                                         
                                    </div>                          
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <?php }?> 
                    <?php if(isset($businessDetails['managementSummary'])){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                                <div class="profile_team_exp">
                                    <h2><i class="fa fa-file-code-o"></i> Management Summary</h2>
                                   <!-- <h3>Development Tools :</h3>-->                          
                                    <div class="profile_team_exp_tag">
                                     <?php                                
                                        foreach ($businessDetails['managementSummary'] as $ach){								
                                        echo $ach->managementSummary;
                                        } ?>                            	 
                                    </div>                            
                                </div>                        
                            </div>
                        </div>
                    </div>
                   <?php }?>
                   <?php  if(isset($businessDetails['skills'])){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                                <div class="profile_team_exp">
                                    <h2><i class="fa fa-file-code-o"></i> Tech Stack</h2>
                                   <!-- <h3>Development Tools :</h3>-->                                   
                                    <div class="profile_team_exp_tag">
                                     <?php                                
                                       //echo '<pre>';print_r($businessDetails['skills']);					
                                        foreach ($businessDetails['skills'] as $ach) {									
                                        ?>
                                        <a href="#" title="<?php echo $ach->ExperienceInMonths;?> Months"><?php echo $ach->skills;?></a>                               <?php }?>                            	 
                                    </div>
                                    <!--<h3>Other skills :</h3>
                                    <div class="profile_team_exp_tag">
                                        <a href="#">Axure RP</a> <a href="#">Adobe After Effects</a> <a href="#">Adobe Illustrator</a> <a href="#">Adobe Photoshop</a> <a href="#">Sketch</a> <a href="#">InVision</a> <a href="#">Axure RP</a> <a href="#">Adobe After Effects</a> <a href="#">Adobe Illustrator</a> <a href="#">Adobe Photoshop</a> <a href="#">Sketch</a> <a href="#">InVision</a> <a href="#">Axure RP</a>
                                    </div>-->
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php  if(isset($businessDetails['education'])){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                            	<h2 class="h2_head"><i class="fa fa-graduation-cap"></i> Education</h2>
                                <div class="profile_team_edu">                                    
                                    <ul>
                                    <?php 
                                    //echo '<pre>';print_r($businessDetails['education']);                               
                                        foreach ($businessDetails['education'] as $education) {
                                        ?>                                
                                        <li>
                                        <?php if(isset($education->school_name)){
                                            echo '<h2>'.$education->school_name.'</h2>';
                                            }?>
                                                <?php if(isset($education->school_Type)){
                                                echo '<p>'.$education->school_Type.'</p>';
                                                }?>                                        
                                                <?php if(isset($education->school_City)){
                                                echo '<p>'.$education->school_City.'</p>';
                                                }?>                                        
                                                 <?php if(isset($education->school_State)){
                                                echo '<p>'.$education->school_State.'</p>';
                                                }?>                                        
                                                 <?php if(isset($education->school_Country)){
                                                echo '<p>'.$education->school_Country.'</p>';
                                                }?>                                        
                                                 <?php if(isset($education->DegreeName)){
                                                echo '<p>'.$education->DegreeName.'</p>';
                                                }?>  
                                        </li>
                                        <?php }?>      	
                                      </ul>
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(isset($businessDetails['achivement'])){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                            	<h2 class="h2_head"><i class="fa fa-cogs"></i> Achiement</h2>
                                <div class="profile_team_exp01">
                                    <ul>
                                    <?php
                                        $i=1;
                                        //echo '<pre>';print_r($businessDetails);                                
                                        foreach ($businessDetails['achivement'] as $ach) {
                                        ?>
                                        <li>
                                            <!--<h3>INDUSTRY EXPERIENCE</h3>-->
                                            <p><?php echo $ach->achivement;?></p>
                                        </li>
                                         <?php }?>
                                        <!--<li>
                                            <h3>PRODUCT EXPERIENCE</h3>
                                            <p>Web app and mobile app for hiring part-time professionals, Web service for HRs, Business process improvement tool, Mobile app for booking cleaners, Redesign web site, eBook web store for independent writers</p>
                                        </li>-->                                
                                    </ul>
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if(isset($businessDetails['license'])){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                                <div class="profile_team_exp">
                                    <h2 class="h2_head"><i class="fa fa-file-code-o"></i> Lincence and Certification</h2>
                                   <!-- <h3>Development Tools :</h3>-->                           
                                    <div class="profile_team_exp_tag">                             
                                     <?php 
                                        foreach ($businessDetails['license'] as $ach) {
                                         echo $ach->license;                                
                                       }?>
                                                                 
                                    </div>                           
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                            	<h2 class="h2_head" style="margin-bottom: 30px;"><i class="fa fa-briefcase"></i> Portfolio Highlights</h2>
                                <div class="profile_team_exp_sheet">                                    
                                    <ul>
                                     <?php $i=1;
                                     //echo '<pre>';print_r($businessDetails['workexp']);
                                        if(isset($businessDetails['workexp'])){
                                        foreach ($businessDetails['workexp'] as $value) {
                                            //echo '<pre>';print_r($value);
                                        ?>
                                        <li>
                                            <h3><?php echo $value->startDate;?> <br><?php if($value->CurrentEmplyor=='True') { echo 'Currently Working'; }
                                            else{
                                                if($value->endDate !== '1970-01-01'){
                                                        echo $value->endDate;								
                                                }
                                             }?>
                                            </h3>
                                            <p><?php echo $value->EmployerOrgName;?></p>
                                            <h4><?php echo $value->Title;?></h4>
                                            <?php if(isset($value->JobPeriod)){
                                                echo '<p>'.$value->JobPeriod.'</p>';
                                            }?>
                                            <?php if(isset($value->EmployerCity)){
                                                echo '<p>'.$value->EmployerCity.'</p>';
                                            }?>
                                            <?php if(isset($value->EmployerState)){
                                                echo '<p>'.$value->EmployerState.'</p>';
                                            }?>
                                            <?php if(isset($value->EmployerCountry)){
                                                echo '<p>'.$value->EmployerCountry.'</p>';
                                            }?>                  
                                                                             
                                            <p><?php echo $value->Description;?></p>
                                        </li>
                                         <?php $i++; } } else { echo '<li>No Work Experience</li>';}?>
                                        
                                        
                                        <!--<li>
                                            <h3>Mar `16 – Present<br>1 year</h3>
                                            <p>Web app and mobile app for hiring part-time professionals</p>
                                            <h4>Product designer, UX/UI lead</h4>
                                            <p>Competitor analysis, Product development consultation, Features Roadmap, Use Cases, IA, Persona Creation, Product roles, User flows, Moodboard, Visual concept, UI design (20+ different web UI layouts), UI Guidelines (Writing Specs), Design supervision</p>
                                            <p>Vienna Austria-based startup company NDA</p>
                                            <p>Web app and mobile app for hiring part-time professionals</p>
                                            <h5>TECHNOLOGIES STACK :</h5>
                                            <p><a href="#">UI</a> <a href="#">Concept Design</a> <a href="#">Wireframing</a></p>
                                            <h5>INDUSTRY :</h5>
                                            <p>Business & Productivity, Human Resources & Career</p>
                                            <h5>PRODUCT :</h5>
                                            <p>Web app and mobile app for hiring part-time professionals</p>
                                        </li>
                                        <li>
                                            <h3>Mar `16 – Present<br>1 year</h3>
                                            <p>Web app and mobile app for hiring part-time professionals</p>
                                            <h4>Product designer, UX/UI lead</h4>
                                            <p>Competitor analysis, Product development consultation, Features Roadmap, Use Cases, IA, Persona Creation, Product roles, User flows, Moodboard, Visual concept, UI design (20+ different web UI layouts), UI Guidelines (Writing Specs), Design supervision</p>
                                            <p>Vienna Austria-based startup company NDA</p>
                                            <p>Web app and mobile app for hiring part-time professionals</p>
                                            <h5>TECHNOLOGIES STACK :</h5>
                                            <p><a href="#">UI</a> <a href="#">Concept Design</a> <a href="#">Wireframing</a></p>
                                            <h5>INDUSTRY :</h5>
                                            <p>Business & Productivity, Human Resources & Career</p>
                                            <h5>PRODUCT :</h5>
                                            <p>Web app and mobile app for hiring part-time professionals</p>
                                        </li>-->
                                                                        
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
            <!-- <input type="button" id="project" class="btn btn-default" onClick="openPopUp2();" value="Hire for Project"> -->
           <!--  <input type="button" id="work" class="btn btn-default" onClick="openPopUp3();" value="Hire for Work">
 -->
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
            <div class="form_pop">
            <input type="hidden" id="cat" name="cat" value="">
            <input type="hidden" id="subcat" name="subcat" value="">
            <input type="hidden" id="pid" name="pid" value="">
            <div class="row form-group">
              <div class="col-md-12">
                <label for="email">Project Name * </label>
                <input type="text" name="project_name" id="project_name" value=""><span id="errP" style="color:red;"></span>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label for="email">Project Details *  </label>
                <textarea class="form-control" id="work_detail"></textarea><span id="errW" style="color:red;"></span>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label for="email">Type of Project *  </label>
                <select name="type_of_project" id="type_of_project">
                    <option value="0">Type of Project</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="onetime">Onetime</option>
                  </select>
                  <span id="errTP" style="color:red;"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label for="email">Hire * </label>
                <select name="hiretype" id="hiretype">
                  <option value="0">Hire</option>
                  <option value="contract">Contract</option>
                  <option value="project">Project</option>
                </select>
                <span id="errHT" style="color:red;"></span>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label for="email">Prefered Mode Of Consultant * </label>
                <select name="prefered_mode" id="prefered_mode">
                    <option value="0">Prefered Mode</option>
                    <option value="Onsite">Onsite</option>
                    <option value="Offsite">Offsite</option>
                  </select>
                  <span id="errPM" style="color:red;"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label for="email">Number of Hours required per week *  </label>
                <select name="no_of_hours" id="no_of_hours" >
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

            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label for="email">Budget Amount * </label>
                <input type="text" class="form-control numeric" id="bidAmountIndividual" placeholder="BID Amount">
                  <span id="errBudget" style="color:red;"></span>
                  <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label for="email">Payment options * </label>
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

            
            <div class="row form-group">
              <div class="col-md-12">
                <label for="email">Additional Comment  </label>
                <textarea id="comment"></textarea>
              </div>              
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label for="email">Do you want company details to be confidential  </label>
                <select name="confedential" id="confedential" class="form-control">
                    <option value="0">Confidential</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>

                  </select>
              </div>
            </div>
          </div>

          </form>
      </div>
      <span id="err" style="color: red;"></span>
      <span id="suc" style="color: green;"></span>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes">
          
        </div>
        <div id="loading" style="display: none;">
          <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
        </div>
        <button type="button" class="pop_close" id="close"> <i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="save"> <i class="fa fa-user" aria-hidden="true"></i> Hire</button>
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
            <div class="form_pop">
            <input type="hidden" id="catjob" name="cat" value="">
            <input type="hidden" id="subcatjob" name="subcat" value="">
            <input type="hidden" id="pidjob" name="pid" value="">
            <div class="row form-group">
              <div class="col-md-12">
                <label for="email">Job Title *  </label>
                <input type="text" name="project_name" id="project_namejob" value="" ><span id="errPJob" style="color:red;"></span>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label  for="email">Job Description *  </label>
                <textarea class="form-control" id="work_detailjob"></textarea>
                  <span id="errWJob" style="color:red;"></span>
              </div>
            </div>

           
            <div class="row form-group">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label for="email">Type of Role *  </label>
                <select name="hiretype" id="hiretypejob">
                    <option value="full">Full Time</option>
                    <option value="part">Part Time </option>
                    <option value="contract">Contract</option>
                  </select>
                  <span id="errHTJob" style="color:red;"></span>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label for="email">Location *  </label>
                <input type="text" id="location" value="">
                <span id="errLocjob" style="color:red;"></span>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label for="email">Number of Hours required per week * </label>
                <select name="no_of_hours" id="no_of_hoursjob">
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

            

            <div class="row form-group">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label for="email">Salary * </label>
                <input type="text" class="numeric" id="bidAmountIndividualJob" placeholder="BID Amount">
                  <span id="errBudgetjob" style="color:red;"></span>
                  <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <label for="email">Payment options * </label>
                <select  name="paytype" id="paytypejob">
                  <option value="">Select Payment Option *</option>
                  <option value="hourly">Hourly</option>
                  <option value="daily">Daily</option>
                  <option value="anually">Annually</option>
                </select>
                <span id="errPTjob" style="color:red;"></span>
              </div>
            </div>

            
            <div class="row form-group">
              <div class="col-md-12">
                <label for="email">Additional Comment : </label>
                <textarea class="form-control" id="commentjob"></textarea>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label for="email">Do you want company Details to be confidential : </label>
                <select name="confedential" id="confedentialjob">
                  <option value="0">Confidential</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
            </div>
          </div>
          </form>
      </div>
      <span id="errjob" style="color: red;"></span>
      <span id="sucjob" style="color: green;"></span>
      <div class="modal-footer" style="text-align: center;">
        <div class="pop_mes"></div>
        <div id="loading" style="display: none;">
          <img id="loading-image" src="http://i.imgur.com/QnRSWrr.gif" alt="Loading..." />
        </div>
        <button type="button" class="pop_close" id="closeforwork"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
        <button type="button" class="pop_submit" id="saveforwork"><i class="fa fa-user" aria-hidden="true"></i> Hire</button>
      </div>

    </div>
  </div>
</div>
<!-- ends here-->


<div class="modal fade bs-example-modal-lgreview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="closePostProposal1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Your Reviews</h4>

      </div>
      <div class="modal-body">
        <input type="hidden" id="rbid" name="rbid" value="">
          <form class="form-horizontal">
            <div class="form_pop">
              <div class="col-md-12">
                <label>Write your review</label>
                <textarea id="reviewtext" value=""></textarea>
            </div>
          </div>
          </form>
      </div>
            <div class="modal-footer" style="text-align: center;">
              <button type="button" class="pop_submit" id="postReview"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Review</button>
            </div>
      </div>
  </div>
</div>



<script>
//22-9
function openPopUp(cat,subcat,pId){
  $("#cats").val(cat);
  $("#subcats").val(subcat);
  $("#pids").val(pId);
  $(".bs-example-modal-lghirefor").modal();
}
function openPopUp2(cat,subcat,pId){
  $("#cat").val(cat);
  $("#subcat").val(subcat);
  $("#pid").val(pId);
  //$(".bs-example-modal-lghirefor").hide();
  $(".bs-example-modal-lg").modal();
}

function openPopUp3(cat,subcat,pId){
  // var cat = $("#cats").val();
  // var subcat = $("#subcats").val();
  // var pId = $("#pids").val();

  $("#catjob").val(cat);
  $("#subcatjob").val(subcat);
  $("#pidjob").val(pId);

  //$(".bs-example-modal-lghirefor").hide();
  $(".bs-example-modal-lgforjob").modal();
}

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
            setTimeout(function(){location.reload();}, 4000);
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

//22-9 end




function updateStatus(businessId,resume_status){
  //alert(businessId);alert(resume_status);
  if(businessId){
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>admin/professionals/updateResumeStatus",
      data:{businessId:businessId,resume_status:resume_status},
      success:function(data){
        location.reload();
        /*if(data==0){
          $("#status_"+businessId).html('Inactive');
        }else{
          $("#status_"+businessId).html('Active');
        }
        window.reload();*/

      }
    });
  }

}


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
            url: "<?php echo base_url();?>admin/professionals/addRatings",
            data:'reviewtext='+reviewtext+'&b_id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
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
      url: "<?php echo base_url();?>admin/professionals/updateRatings",
      data:'b_id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
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

</script>