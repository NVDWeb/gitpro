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
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <!--  <li><a href="<?php echo base_url();?>admin/profile"><i class="fa fa-user"></i> Profile</a></li> -->



                    <li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-user pull-right"></i>Profile</a></li>
                     <li><a href="<?php echo base_url();?>admin/settings"><i class="fa fa-pencil pull-right"></i>Settings</a></li>
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
                      <a href="#" onmouseover="somefunction('<?php echo $value['id'];?>')" id="tmnoti" data-id="<?php echo $value['id'];?>">
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
                	<?php /*?><?php $this->load->view('admin/left-sidebar');?><?php */?>

                    <div id='cssmenu'>
                        <ul>
                        <?php if($this->session->userdata('admin_user_type')==1){?>
							<li>
                            <a><i class="fa fa-bars"></i> Category <span class="fa fa-chevron-down"></span></a>
                    		<ul>
                                <!-- <li style="display:none;"><a href="<?php echo base_url();?>admin/category/edit/<?php echo $id;?>"></a></li>
                                 <li style="display:none;"><a href="<?php echo base_url();?>admin/subcategory/edit/<?php echo $id;?>"></a></li> -->
                                <li><a href="<?php echo base_url();?>admin/category">List</a></li>
                                <li><a href="<?php echo base_url();?>admin/category/add">Add</a></li>
                                <li><a href="<?php echo base_url();?>admin/subcategory">Sub Category List</a></li>
                                <li><a href="<?php echo base_url();?>admin/subcategory/add">Sub Category Add</a></li>
                                <li><a href="<?php echo base_url();?>admin/category/team">Team Up Category List</a></li>
                                <li><a href="<?php echo base_url();?>admin/category/teamadd">Team Up Category Add</a></li>
                                </ul>
                              </li>

                                  <li>
                                    <a><i class="fa fa-users"></i> Professionals<span class="fa fa-chevron-down"></span></a>
                                    <ul>
                                    <!-- <li style="display:none;"><a href="<?php echo base_url();?>admin/business/edit/<?php echo $id;?>"></a></li> -->


                                      <li><a href="<?php echo base_url();?>admin/business">List</a></li>
                                      <li><a href="<?php echo base_url();?>admin/business/add">Add</a></li>

                                    </ul>
                                  </li>

                                  <li>
                                    <a><i class="fa fa-user"></i> Individual<span class="fa fa-chevron-down"></span></a>
                                    <ul>
                                    <!-- <li style="display:none;"><a href="<?php echo base_url();?>admin/individual/edit/<?php echo $id;?>"></a></li> -->


                                      <li><a href="<?php echo base_url();?>admin/individual">List</a></li>
                                      <li><a href="<?php echo base_url();?>admin/individual/add">Add</a></li>

                                    </ul>
                                  </li>
                                  <li>
                                    <a><i class="fa fa-user"></i> Projects <span class="fa fa-chevron-down"></span></a>
                                    <ul >
                                      <li><a href="<?php echo base_url();?>admin/quotation">List</a></li>
                                    </ul>
                                  </li>

								<li>
                                   <a href="<?php echo base_url();?>admin/payment""><i class="fa fa-user"></i> Payment <span class="fa fa-chevron-down"></span></a>
                                 </li>

						<?php } ?>
                        <?php if($this->session->userdata('admin_user_type')==2 ){?>

                  <?php } ?>

                  <?php if($this->session->userdata('admin_user_type')==2){?>
                  <li class='active has-sub'>
                    <a><i class="fa fa-rocket"></i> Projects</a>
                    <ul>
                     <li class="has-sub"><a href="#">Browse Project  </a>
                     	<ul>
                        	<?php if($this->session->userdata('resume_status')==1){ ?>
                            <li><a href="<?php echo base_url();?>admin/projects">Active Project</a></li>
                            <?php } else{ ?>
							 <li><a href="#">Active Project</a></li>
							<?php } ?>
                          <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/projects/team' ; }else {echo '#';}?>">Active Team Project </a></li>
                            <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo '#' ; }else {echo '#';}?>">Send Proposal </a></li>
                        </ul>
                     </li>
                     <li class=' has-sub'>
                        <a>Matched Projects </a>
                        <ul>
                          <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/leads' ; }else {echo '#';}?>">My Project List</a></li>
                          <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/leads/team' ; }else {echo '#';}?>">Team Project List</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>
                  <?php }?>
                  <?php if($this->session->userdata('admin_user_type')==3){?>
                  
                    <li class='active'><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation/add' ; }else {echo '#';}?>">Post a project   </a></li>
                    <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/professionals' ; }else {echo '#';}?>">Explore Professionals</a></li>
                    <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/explore/team' ; }else {echo '#';}?>">Explore Teams</a></li>
                    <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation' ; }else {echo '#';}?>">Active Projects  </a></li>
                    <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation/team' ; }else {echo '#';}?>">Active Team Projects  </a></li>
                      <!-- <li><a href="#">Completed Projects   </a></li>
                      <li><a href="#">Delete the projects  </a></li> -->
                  <?php } ?>


                  <?php
                      if($this->session->userdata('admin_user_type')==2 ){?>
                  <li class='has-sub'>
                    <a><i class="fa fa-users" aria-hidden="true"></i> Team </a>
                    <ul>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/add' ; }else {echo '#';}?>">Create a New Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/' ; }else {echo '#';}?>">Team List</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/joined' ; }else {echo '#';}?>">Joined Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/search' ; }else {echo '#';}?>">Search Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/professional' ; }else {echo '#';}?>">Search Professional</a></li>
                    </ul>
                  </li>
                  <li class='has-sub'>
                    <a><i class="fa fa-credit-card" aria-hidden="true"></i> Payments </a>
                    <ul>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/paypal' ; }else {echo '#';}?>">PayPal A/C </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/bank' ; }else {echo '#';}?>">Bank A/C  </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/card' ; }else {echo '#';}?>">Debit or Credit Card  </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/payment' ; }else {echo '#';}?>">Payment History  </a></li>
                     <!-- <li><a href="#">ABN Number </a></li> -->
                    </ul>
                  </li>

                  <li>
                   <a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/invite/' ; }else {echo '#';}?>"><i class="fa fa-users" aria-hidden="true"></i> Refer a professional</a>
                  </li>

                  <li>
                   <a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/forums/' ; }else {echo '#';}?>"><i class="fa fa-forumbee" aria-hidden="true"></i> Forums</a>
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
                           <?php if($this->session->userdata('admin_user_type')==3) { ?><li class='last'><a href='<?php echo base_url();?>admin/quotation/add'><span>Post a Project</span></a></li><?php } ?>
                        </ul>
                    </div>



                </div>
            </div>
        </div>




<script>
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
