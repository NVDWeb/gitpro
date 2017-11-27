<div class="admin_header01">
     <div class="main_container01">
         <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle01">
                <a id="menu_toggle01"><i class="fa fa-bars"></i></a>
              </div>
              <div class="logo_admin"><a href="<?php echo base_url();?>admin/dashboard"><img src="<?php echo base_url();?>admin-assets/images/logo_footer.png" alt="check"></a></div>
              <?php //echo '<pre>';print_r($adminData);?>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php if(isset($adminData[0]->picture) && $adminData[0]->picture) { ?>
                      <img src="<?php echo $adminData[0]->picture ;?>">
                    <?php } else if(isset($adminData[0]->businessLogo) && $adminData[0]->businessLogo!='' ) { ?>
                      <img src="<?php echo base_url();?>uploads/business/<?php echo $adminData[0]->businessLogo ;?>" alt="">
                    <?php }else { ?>
                    <img src="<?php echo base_url();?>admin-assets/images/img.jpg" alt="">
                  <?php }?>
                    <?php echo 'Welcome '.$this->session->userdata('fname');?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-user pull-right"></i>Profile</a></li>
                    <li><a href="<?php echo base_url();?>admin/settings"><i class="fa fa-edit pull-right"></i>Settings</a></li>
                    <li><a href="<?php echo base_url();?>admin/dashboard/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>

                        <span>
                          <span>Hello <?php echo $this->session->userdata('fname');?> , </span>
                        </span>
                        <span class="message">
                          Thank you for registering with Proyourway.
                        </span>
                      </a>
                    </li>


                  </ul>
                </li>

                 <?php $team_notification = getTeamJoinNotification();
                $getTeamJoinNotification = count($team_notification);
        //echo '<pre>'; print_r($team_notification);
                ?>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-plus"></i>
                    <span class="badge bg-green"><?php echo $getTeamJoinNotification ; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if($team_notification){
                      foreach ($team_notification as $value) { ?>
                      <li>
                      <!-- <a href="#" onmouseover="somefunction('<?php echo $value['id'];?>')" id="tmnoti" data-id="<?php echo $value['id'];?>"> -->
                        <a href="<?php echo base_url();?>admin/team/requestview/<?php echo $value['tId'];?>" id="tmnoti" data-id="<?php echo $value['id'];?>">
                        <span class="message">
                          <?php  echo ''.$value['first_name'].' has send a request to join '.$value['team_name'].' Note : '.$value['shortnote'].''; ?>
                        </span>
                      </a>
                    </li>
                  <?php } }else{ ?>
                    <li>
                    <a>
                      <span class="message">
                        No Notification
                      </span>
                    </a>
                  </li>
                  <?php } ?>
                  </ul>
                </li>

                <?php  $getSplitAmount   =  getSplitAmountByMemberId() ; ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-suitcase"></i>
                    <span class="badge bg-green"><?php echo count($getSplitAmount) ; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if($getSplitAmount){
                      foreach ($getSplitAmount as $value) { ?>
                      <li>
                      <a href="<?php echo base_url();?>admin/milestone/acceptsplit/<?php echo $value['id'];?>">
                        <span class="message">
                          <?php  echo ''.$value['first_name'].' has set an Amount for '.$value['milestone_name'].''; ?>
                        </span>
                      </a>
                    </li>
                  <?php } }else{ ?>
                    <li>
                    <a>
                      <span class="message">
                        No Notification
                      </span>
                    </a>
                  </li>
                  <?php } ?>
                  </ul>
                </li>

                <?php $ar = countNotSeenProposal();
                $countNotSeenProposal = count($ar)
                ?>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-pencil"></i>
                    <span class="badge bg-green"><?php echo $countNotSeenProposal ; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if($ar){
                      foreach ($ar as $value) { ?>
                      <li>
                      <a href="<?php echo base_url();?>admin/quotation/proposal/<?php echo $value['id'];?>">
                        <span class="message">
                          <?php  echo ''.$value['first_name'].' Has send a proposal for '.$value['project_name'].''; ?>
                        </span>
                      </a>
                    </li>
                  <?php } }else{ ?>
                    <li>
                    <a>
                      <span class="message">
                        No Notification
                      </span>
                    </a>
                  </li>
                  <?php } ?>
                  </ul>
                </li>

                <?php $ar = getOpenTeamJoinRequest();
                $countOpenTeamJoinRequest = count($ar)
                ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span class="badge bg-green"><?php echo $countOpenTeamJoinRequest ; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if($ar){
                      foreach ($ar as $value) { ?>
                      <li>
                      <a href="<?php echo base_url();?>admin/team/viewrequest/<?php echo $value['id'];?>">
                        <span class="message">
                          <?php  echo ''.$value['contact_person_name'].' Wants to join your '.$value['team_name'].' Team'; ?>
                        </span>
                      </a>
                    </li>
                  <?php } }else{ ?>
                    <li>
                    <a>
                      <span class="message">
                        No Notification
                      </span>
                    </a>
                  </li>
                  <?php } ?>
                  </ul>
                </li>

                <?php
                if($this->session->userdata('admin_user_type')==2){
                $getRealeasedAmountForTeamAdmin = getRealeasedAmountForTeamAdmin();
                if($getRealeasedAmountForTeamAdmin){
                $totalWithdrawAmount = 0;
                foreach ($getRealeasedAmountForTeamAdmin as $value) {
                  $totalWithdrawAmount = $totalWithdrawAmount + $value['accepted_amount'];
                }
                ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:void();" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-google-wallet"></i>
                    <span class="badge bg-green"><?php echo $totalWithdrawAmount ; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if($totalWithdrawAmount){
                      ?>
                      <li>
                      <a href="<?php echo base_url();?>admin/milestone/withdraw">
                        <span class="message">
                          Total amount to Withdraw is <?php echo $totalWithdrawAmount;?> USD
                        </span>
                      </a>
                    </li>
                  <?php } else{ ?>
                    <li>
                    <a>
                      <span class="message">
                        No Notification
                      </span>
                    </a>
                  </li>
                <?php }  } } ?>

                <?php
                if($this->session->userdata('admin_user_type')==2){
                $getRealeasedAmountForProfessional = getRealeasedAmountForProfessional();
                if($getRealeasedAmountForProfessional){
                $totalWithdrawAmountP = 0;
                foreach ($getRealeasedAmountForProfessional as $value) {
                  $totalWithdrawAmountP = $totalWithdrawAmountP + $value['accepted_amount'];
                }
                ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-google-wallet"></i>
                    <span class="badge bg-green"><?php echo $totalWithdrawAmountP ; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                    if($totalWithdrawAmountP){
                      ?>
                      <li>
                      <a href="<?php echo base_url();?>admin/milestone/withdraw">
                        <span class="message">
                          Total amount to Withdraw is <?php echo $totalWithdrawAmountP;?> USD
                        </span>
                      </a>
                    </li>
                  <?php } else{ ?>
                    <li>
                    <a>
                      <span class="message">
                        No Notification
                      </span>
                    </a>
                  </li>
                <?php }  } }?>


                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
     </div>
</div>
<div class="admin_header_bottom">
          <div class="main_container01">
              <div class="admin_submenu">
                  <?php 
                  $controller = $this->router->fetch_class();
                  $method = $this->router->fetch_method();
                  ?>

                    <div id='cssmenu'>
                        <ul>
                        <?php if($this->session->userdata('admin_user_type')==1){?>
                        <?php if($controller=='subcategory' || $controller=='category' && ($method=='index' || $method=='add' || $method=='team' || $method=='teamadd' || $method == 'edit' || $method=='teamedit')){
                          $active = 'active';
                        }else{
                          $active = '';
                        }?>
                        <li class="<?php echo $active;?> has-sub">
                            <a><i class="fa fa-bars"></i> Category <span class="fa fa-chevron-down"></span></a>
                        <ul>
                                
                                <li><a href="<?php echo base_url();?>admin/category">List</a></li>
                                <li><a href="<?php echo base_url();?>admin/category/add">Add</a></li>
                                <li><a href="<?php echo base_url();?>admin/subcategory">Sub Category List</a></li>
                                <li><a href="<?php echo base_url();?>admin/subcategory/add">Sub Category Add</a></li>
                                <li><a href="<?php echo base_url();?>admin/category/team">Team Up Category List</a></li>
                                <li><a href="<?php echo base_url();?>admin/category/teamadd">Team Up Category Add</a></li>
                                </ul>
                              </li>
                         <?php if($controller=='industry' && ($method=='index' || $method=='add' || $method == 'edit' )){
                          $active = 'active';
                        }else{
                          $active = '';
                        }?>     
                          <li class="<?php echo $active;?> has-sub">
                            <a><i class="fa fa-bars"></i> Industry <span class="fa fa-chevron-down"></span></a>
                          <ul>
                                
                                <li><a href="<?php echo base_url();?>admin/industry">List</a></li>
                                <li><a href="<?php echo base_url();?>admin/industry/add">Add</a></li>
                                
                                </ul>
                              </li>
                              <?php if($controller=='business'  || $controller=='professionals' && ($method=='index' || $method=='add' || $method=='edit')){
                          $active = 'active';
                        }else{
                          $active = '';
                        }?>
                                  <li class="<?php echo $active;?> has-sub">
                                    <a><i class="fa fa-users"></i> Professionals<span class="fa fa-chevron-down"></span></a>
                                    <ul>
                                    <!-- <li style="display:none;"><a href="<?php echo base_url();?>admin/business/edit/<?php echo $id;?>"></a></li> -->


                                      <li><a href="<?php echo base_url();?>admin/business">List</a></li>
                                      <li><a href="<?php echo base_url();?>admin/business/add">Add</a></li>

                                    </ul>
                                  </li>
                                  <?php if($controller=='individual' && ($method=='index' || $method=='add')){
                                      $active = 'active';
                                  }else{
                                    $active = '';
                                  }
                                  ?>
                                  <li class="<?php echo $active;?> has-sub">
                                    <a><i class="fa fa-user"></i> Individual<span class="fa fa-chevron-down"></span></a>
                                    <ul>
                                    <!-- <li style="display:none;"><a href="<?php echo base_url();?>admin/individual/edit/<?php echo $id;?>"></a></li> -->


                                      <li><a href="<?php echo base_url();?>admin/individual">List</a></li>
                                      <li><a href="<?php echo base_url();?>admin/individual/add">Add</a></li>

                                    </ul>
                                  </li>
                                  <?php if($controller=='quotation' && ($method=='index' || $method=='add')){
                                      $active = 'active';
                                  }else{
                                    $active = '';
                                  }
                                  ?>
                                  <li class="<?php echo $active;?> has-sub">
                                    <a><i class="fa fa-user"></i> Projects <span class="fa fa-chevron-down"></span></a>
                                    <ul >
                                      <li><a href="<?php echo base_url();?>admin/quotation">List</a></li>
                                    </ul>
                                  </li>
                                  <?php if($controller=='explore' && ($method=='team')){
                                      $active = 'active';
                                  }else{
                                    $active = '';
                                  }
                                  ?>
                                  <li class="<?php echo $active;?>"><a href="<?php echo base_url().'admin/explore/team';?>">Explore Teams</a></li>
                                  
                                  <?php if($controller=='payment' && ($method=='index')){
                                      $active = 'active';
                                  }else{
                                    $active = '';
                                  }
                                  ?>
                                  <li class="<?php echo $active;?>">
                                   <a href="<?php echo base_url();?>admin/payment"><i class="fa fa-user"></i> Payment <span class="fa fa-chevron-down"></span></a>
                                 </li>
                                  <?php if($controller=='userrating' && ($method=='index')){
                                      $active = 'active';
                                  }else{
                                    $active = '';
                                  }
                                  ?>
                                 <li class="<?php echo $active;?>">
                                   <a href="<?php echo base_url();?>admin/userrating"><i class="fa fa-user"></i>Reviews<span class="fa fa-chevron-down"></span></a>
                                 </li>

            <?php } ?>
                        <?php if($this->session->userdata('admin_user_type')==2 ){?>

                  <?php } ?>

                  <?php if($this->session->userdata('admin_user_type')==2){?>
                  
                  <?php if($controller=='projects' && ($method=='view' || $method=='index' || $method=='complete' || $method=='team')){ 
                      $active = 'active';
                    }else{
                      $active = '';
                    } ?>
                  <li  class="<?php echo $active;?> has-sub"<?php if($controller=='leads' && ($method=='index' ||  $method=='team')){ ?> class="active has-sub" <?php } ?>>
                    <a><i class="fa fa-rocket"></i> Projects</a>
                    <ul>
                     <li class="has-sub"><a href="#">Browse Project  </a>
                      <ul>
                          <?php if($this->session->userdata('resume_status')==1){ ?>
                            <li><a href="<?php echo base_url();?>admin/projects">Active Project</a></li>
                            <?php } else{ ?>
               <li><a href="#" onclick="status();">Active Project</a></li>
              <?php } ?>
                            <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/projects/complete' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Completed Project </a></li>
                          <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/projects/team' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Active Team Project </a></li>
                          
                            <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo '#' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Send Proposal </a></li>
                        </ul>
                     </li>
                     <li class=' has-sub'>
                        <a>Matched Projects </a>
                        <ul>
                          <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/leads' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>My Project List</a></li>
                          <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/leads/team' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Team Project List</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>
                  <?php if($controller=='milestone' && ($method=='withdraw' || $method=='index' || $method=='add' || $method=='view')){ $active = 'active'; }else{ $active = '';} ?>
                  <li  class="<?php echo $active;?>"><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/milestone' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Milestone</a></li>
                  <?php }?>
                  <?php if($this->session->userdata('admin_user_type')==3){?>
                  
                    <li <?php if($controller=='quotation' && $method=='add'){ ?> class="active" <?php } ?>><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation/add' ; }else {echo '#';}?>" <?php if($this->session->userdata('verified') != 1){echo 'onclick="status();"';}?>>Post a project   </a></li>
                    
                    <li <?php if($controller=='professionals' && $method=='index'){ ?> class="active" <?php } ?>><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/professionals' ; }else {echo '#';}?>" <?php if($this->session->userdata('verified') != 1){echo 'onclick="status();"';}?>>Explore Professionals</a></li>
                    
                    <li <?php if($controller=='explore' && $method=='team'){ ?> class="active" <?php } ?>><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/explore/team' ; }else {echo '#';}?>" <?php if($this->session->userdata('verified') != 1){echo 'onclick="status();"';}?>>Explore Teams</a></li>
                    
                    <li <?php if($controller=='quotation' && $method=='index'){ ?> class="active" <?php } ?>><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation' ; }else {echo '#';}?>" <?php if($this->session->userdata('verified') != 1){echo 'onclick="status();"';}?>>Active Projects  </a></li>
                    
                    <li <?php if($controller=='quotation' && $method=='completed'){ ?> class="active" <?php } ?>><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation/completed' ; }else {echo '#';}?>" <?php if($this->session->userdata('verified') != 1){echo 'onclick="status();"';}?>>Complete Projects  </a></li>
                    
                    <li <?php if($controller=='quotation' && $method=='team'){ ?> class="active" <?php } ?>><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation/team' ; }else {echo '#';}?>" <?php if($this->session->userdata('verified') != 1){echo 'onclick="status();"';}?>>Active Team Projects  </a></li>
                    
                    <li <?php if($controller=='userrating' && $method=='index'){ ?> class="active" <?php } ?>><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/userrating/' ; }else {echo '#';}?>" <?php if($this->session->userdata('verified') != 1){echo 'onclick="status();"';}?>><i class="fa fa-user"></i>Write A Reviews<span class="fa fa-chevron-down"></span></a>
                    </li>
                      <!-- <li><a href="#">Completed Projects   </a></li>
                      <li><a href="#">Delete the projects  </a></li> -->
                  <?php } ?>


                  <?php
                      if($this->session->userdata('admin_user_type')==2 ){?>
                  <?php if($controller=='team' && ($method=='index' || $method=='add' || $method=='view' || $method=='joined' || $method=='search' || $method=='professional')){
                    $active='active';
                    }else{
                      $active = '';
                    }
                    ?>
                    <li class="<?php echo $active;?> has-sub">
                    <a><i class="fa fa-users" aria-hidden="true"></i> Team </a>
                    <ul>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/add' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Create a New Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Team List</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/joined' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Joined Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/search' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Search Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/professional' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Search Professional</a></li>
                    </ul>
                  </li>
                  <li <?php if($controller=='payment' || $controller=='account' && ($method=='paypal' || $method=='bank' || $method=='card')){ ?> class="active has-sub" <?php } ?>>
                    <a><i class="fa fa-credit-card" aria-hidden="true"></i> Payments </a>
                    <ul>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/paypal' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>PayPal A/C </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/bank' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Bank A/C  </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/card' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Debit or Credit Card  </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/payment' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>>Payment History  </a></li>
                     <!-- <li><a href="#">ABN Number </a></li> -->
                    </ul>
                  </li>

                  <li <?php if($controller=='invite'  && ($method=='index')){ ?> class="active" <?php } ?>>
                   <a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/invite/' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>><i class="fa fa-users" aria-hidden="true"></i> Refer a professional</a>
                  </li>

                  <li <?php if($controller=='forums'  && ($method=='index')){ ?> class="active" <?php } ?>>
                   <a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/forums/' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>><i class="fa fa-forumbee" aria-hidden="true"></i> Forums</a>
                  </li>
                  
                    <li <?php if($controller=='userrating'  && ($method=='index')){ ?> class="active" <?php } ?>>
                    <a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/userrating/' ; }else {echo '#';}?>" <?php if($this->session->userdata('resume_status') != 1){echo 'onclick="status();"';}?>><i class="fa fa-user"></i>Write A Reviews<span class="fa fa-chevron-down"></span></a>
                    </li>
                  <?php } ?>




                           <!--<li><a href='#'><span>Home</span></a></li>
                           <li class='active has-sub'><a href='#'><span>Products</span></a>
                              <ul>
                                 <li><a href='#'><span>Product 1</span></a></li>
                                 <li><a href='#'><span>Product 2</span></a></li>
                              </ul>
                           </li>
                           <<li class='active has-sub'><a href='#'><span>Products</span></a>
                              <ul>
                                 <li class='has-sub'><a href='#'><span>Product 1</span></a>
                                    <ul>
                                       <li><a href='#'><span>Sub Product</span></a></li>
                                       <li class=''><a href='#'><span>Sub Product</span></a></li>
                                    </ul>
                                 </li>
                                 <li class='has-sub'><a href='#'><span>Product 2</span></a>
                                    <ul>
                                       <li><a href='#'><span>Sub Product</span></a></li>
                                       <li class=''><a href='#'><span>Sub Product</span></a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li><a href='#'><span>About</span></a></li>-->
                          <?php /*?> <?php if($this->session->userdata('admin_user_type')==3) { ?>
                           <li class='last'>
                           <a href='<?php echo base_url();?>admin/quotation/add'><span>Post a Project</span></a>
                           </li>
               <?php } ?><?php */?>
                        </ul>
                    </div>



                </div>
            </div>
        </div>


<div class="modal fade bs-example-modal-lgStatus" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="closeing1"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Status</h4>
      </div>
      <div class="modal-body">
          <span class="errorNumeric" style="color: Red; display: none">* Input digits (0 - 9)</span>
          <span id="err" style="color: red;"></span>
          <span id="suc" style="color: green;"></span>
          <div class="status">Your Profile not verified.</div>
      </div>
      <div class="modal-footer" style="text-align: center;">
        <button type="button" class="btn btn-default" id="closeing">Ok</button>        
      </div>

    </div>
  </div>
</div>

<script>
function status(){
    $(".bs-example-modal-lgStatus").modal();   
}
$(document).ready(function() {
  $("#closeing").click(function() {   
    $(".bs-example-modal-lgStatus").modal('hide');
  });

  $("#closeing1").click(function(){    
    $(".bs-example-modal-lgStatus").modal('hide');
  });
});



function somefunction(id){
 $.ajax({
   type:"post",
           url:"<?php echo base_url();?>admin/team/updateTeamNotification",
       data:{team_id:id},
            success:function(){
        location.reload();
                //alert("success");
            },
            error:function(){
                alert("ERROR");
            }
        });
}


</script>
