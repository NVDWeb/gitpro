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
                    <div class="page-title">
                    </div>
        
                    <div class="clearfix"></div>
        
                    <div class="row">
                      <?php //echo '<pre>';print_r($businessDetails);?>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Professional Profile<small>Activity report</small></h2>
                            <div class="clearfix"></div>
                          </div>
        
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-12">
                            <div class="profile_team">
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <div class="profile_team_box1">
                                     <?php if($businessDetails[0]->picture!=0 || $businessDetails[0]->picture ) { ?>
                                        <img src="<?php echo $businessDetails[0]->picture ;?>" alt="Avatar">
                                       <?php } else if($businessDetails[0]->businessLogo!='' ) { ?>
                                       <img src="<?php echo base_url();?>uploads/business/<?php echo $businessDetails[0]->businessLogo ;?>" alt="Avatar"> 
                                        <?php }else { ?>                           		 
                                         <img class="img-responsive avatar-view" src="<?php echo base_url();?>admin-assets/images/img.jpg" alt="Avatar" title="Change the avatar">
                                        <?php } ?> 
                                        <div class="profile_team_reating">
                                        
                                        <p class="ratings">
                                      <?php
                                      if(isset($ratings[0]->rating)){ ?>
                                          <a><?php echo $ratings[0]->rating;?>/5</a>
                                            <?php for($i=1 ; $i<=$ratings[0]->rating; $i++){
                                              $selected = "-o";
                                              if(!empty($ratings[0]->rating) && $i<=$ratings[0]->rating) {
                                                $selected = "";
                                            } ?>
                                          <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                          <?php }
                                          $relC = 5-$ratings[0]->rating;
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
                                    <?php if(isset($businessDetails['languageKnown'])){?>
                                    <div class="profile_team_desig">
                                        <?php  
                                        foreach ($businessDetails['languageKnown'] as $ach) {
                                         echo $ach->languageKnown;
                                        }?>
                                    </div>
                                    <?php }?>
                                            <!--<i class="fa fa-star"></i> <i class="fa fa-star"></i>  <i class="fa fa-star"></i>  <i class="fa fa-star"></i> <i class="fa fa-star-o" ></i>
                                            <p>TOP 19%</p>-->
                                        </div>
                                       <!-- <div class="profile_team_desig">
                                            <a href="#" target="_blank">Web Design</a>
                                            <a href="#" target="_blank">UI/UX Designer</a>
                                        </div>
                                        <div class="profile_project_com"><p><a href="#">6 PROJECTS COMPLETED</a></p></div>-->
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
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
                                        <?php echo $ach->executiveSummary;?>
                                        
                                      <?php $i++; } } ?>
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
                                    <h2><i class="fa fa-file-code-o"></i>Management Summary</h2>
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
                                    <h2><i class="fa fa-file-code-o"></i> TECH STACK</h2>
                                   <!-- <h3>Development Tools :</h3>-->
                                   <h3>Skill</h3>
                                    <div class="profile_team_exp_tag">
                                     <?php                                
                                       //echo '<pre>';print_r($businessDetails);					
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
                                <div class="profile_team_edu">
                                    <h2><i class="fa fa-graduation-cap"></i> EDUCATION</h2>
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
                                <div class="profile_team_exp01">
                                    <h2><i class="fa fa-cogs"></i> Achiement</h2>
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
                                    <h2><i class="fa fa-file-code-o"></i>Lincence and Certification</h2>
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
                                <div class="profile_team_exp_sheet">
                                    <h2><i class="fa fa-briefcase"></i> PORTFOLIO HIGHLIGHTS</h2>
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
