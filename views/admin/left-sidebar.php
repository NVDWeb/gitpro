<?php $id= $this->uri->segment(4); $ids= $this->uri->segment(5);?>
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>admin/dashboard" class="site_title"><img src="<?php echo base_url();?>admin-assets/images/top_logo.png" alt="logo" class="top_logo"></a>
            </div>
<?php //echo '<pre>';print_r($this->session->userdata());?>
            <div class="clearfix"></div>			
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <?php //echo '<pre>';print_r($this->session->userdata());?>
                <?php if(isset($adminData[0]->picture) && $adminData[0]->picture) { ?>
                  <img src="<?php echo $adminData[0]->picture ;?>" class="img-circle profile_img">
                <?php } else if(isset($adminData[0]->businessLogo) && $adminData[0]->businessLogo!='' ) { ?>
                  <img src="<?php echo base_url();?>uploads/business/<?php echo $adminData[0]->businessLogo ;?>" alt="" class="img-circle profile_img">
                <?php }else { ?>
                <img src="<?php echo base_url();?>admin-assets/images/img.jpg" class="img-circle profile_img">
              <?php }?>

              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('fname');?></h2>
              </div>
            </div>

            <!-- /menu profile quick info -->

            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <?php if($this->session->userdata('admin_user_type')==1){?>

                  <!-- <li>
                    <a><i class="fa fa-cubes"></i> Subscriptions Plan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li style="display:none;"><a href="<?php echo base_url();?>admin/plan/edit/<?php echo $id;?>"></a></li>


                      <li><a href="<?php echo base_url();?>admin/plan">List</a></li>
                      <li><a href="<?php echo base_url();?>admin/plan/add">Add</a></li>

                    </ul>
                  </li> -->


                   <li>
                    <a><i class="fa fa-bars"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li style="display:none;"><a href="<?php echo base_url();?>admin/category/edit/<?php echo $id;?>"></a></li>
                     <li style="display:none;"><a href="<?php echo base_url();?>admin/subcategory/edit/<?php echo $id;?>"></a></li>
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
                    <ul class="nav child_menu">
                    <li style="display:none;"><a href="<?php echo base_url();?>admin/business/edit/<?php echo $id;?>"></a></li>


                      <li><a href="<?php echo base_url();?>admin/business">List</a></li>
                      <li><a href="<?php echo base_url();?>admin/business/add">Add</a></li>

                    </ul>
                  </li>

                  <li>
                    <a><i class="fa fa-user"></i> Individual<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li style="display:none;"><a href="<?php echo base_url();?>admin/individual/edit/<?php echo $id;?>"></a></li>


                      <li><a href="<?php echo base_url();?>admin/individual">List</a></li>
                      <li><a href="<?php echo base_url();?>admin/individual/add">Add</a></li>

                    </ul>
                  </li>


                  <!-- <li>
                    <a><i class="fa fa-comment-o"></i> Testimonial <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="display:none;"><a href="<?php echo base_url();?>admin/testimonial/edit/<?php echo $id;?>"></a></li>
                     <li style="display:none;"><a href="<?php echo base_url();?>admin/testimonial/video/edit/<?php echo $ids;?>"></a></li>


                      <li><a href="<?php echo base_url();?>admin/testimonial">Testimonial List</a></li>
                      <li><a href="<?php echo base_url();?>admin/testimonial/add">Testimonial Add</a></li>
                      <li><a href="<?php echo base_url();?>admin/testimonial/video">Video Testimonial</a></li>
                      <li><a href="<?php echo base_url();?>admin/testimonial/video/add">Video Testimonial Add</a></li>
                    </ul>
                  </li> -->


                  <!-- <li>
                    <a><i class="fa fa-users"></i> Team <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li style="display:none;"><a href="<?php echo base_url();?>admin/team/edit/<?php echo $id;?>"></a></li>


                      <li><a href="<?php echo base_url();?>admin/team">List</a></li>
                      <li><a href="<?php echo base_url();?>admin/team/add">Add</a></li>
                    </ul>
                  </li> -->


                  <?php } ?>
                  <?php //if($this->session->userdata('admin_user_type')==1 || $this->session->userdata('admin_user_type')==2 || $this->session->userdata('admin_user_type')==3){ ?>
                  <!-- <li>
                    <a><i class="fa fa-file-text-o" aria-hidden="true"></i> Quotation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li style="display:none;"><a href="<?php echo base_url();?>admin/quotation/edit/<?php echo $id;?>"></a></li>

                      <li><a href="<?php echo base_url();?>admin/quotation">List</a></li>
                      <li><a href="<?php echo base_url();?>admin/quotation/add">Add</a></li>
                    </ul>
                  </li> -->


                  <?php //} ?>

                    <!-- <li>
                      <a><i class="fa fa-users"></i>Professionals <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo base_url();?>admin/professionals">Browse Professionals</a></li>
                      </ul>
                    </li> -->

                  <?php if($this->session->userdata('admin_user_type')==2 ){?>
                  <li>
                    <a><i class="fa fa-cubes" aria-hidden="true"></i> Leads <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/leads' ; }else {echo '#';}?>">My lead List</a></li>
                      <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/leads/team' ; }else {echo '#';}?>">Team lead List</a></li>
                    </ul>
                  </li>
                  <?php } ?>

                  <?php if($this->session->userdata('admin_user_type')==1){?><li>
                    <a><i class="fa fa-newspaper-o"></i> Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li style="display:none;"><a href="<?php echo base_url();?>admin/pages/edit/<?php echo $id;?>"></a></li>

                      <li><a href="<?php echo base_url();?>admin/pages">List</a></li>
                      <li><a href="<?php echo base_url();?>admin/pages/add">Add</a></li>
                    </ul>
                  </li>
                  <?php } ?>

                  <li>
                    <a><i class="fa fa-user" aria-hidden="true"></i> Profile <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="<?php echo base_url();?>admin/dashboard">Edit Profile </a></li>
                    </ul>
                  </li>
                  <?php if($this->session->userdata('admin_user_type')==2){?>
                  <li>
                    <a><i class="fa fa-rocket"></i>Projects <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="#">Browse Project  <span class="fa fa-chevron-down"></span></a>
                     	<ul class="nav child_menu">
                        	<?php if($this->session->userdata('resume_status')==1){ ?>
                            <li><a href="<?php echo base_url();?>admin/projects">Active Project</a></li>
                            <?php } else{ ?>
							 <li><a href="#">Active Project</a></li>
							<?php } ?>
                          <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/projects/team' ; }else {echo '#';}?>">Active Team Project </a></li>
                            <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo '#' ; }else {echo '#';}?>">Send Proposal </a></li>
                        </ul>
                     </li>
                     
                    </ul>
                  </li>
                  <?php }?>
                  <?php
                      if($this->session->userdata('admin_user_type')==2 ){?>
                  <li>
                    <a><i class="fa fa-users" aria-hidden="true"></i> Team  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/add' ; }else {echo '#';}?>">Create a New Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/' ; }else {echo '#';}?>">Team List</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/joined' ; }else {echo '#';}?>">Joined Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/search' ; }else {echo '#';}?>">Search Team</a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/team/professional' ; }else {echo '#';}?>">Search Professional</a></li>
                    </ul>
                  </li>
                  <li>
                    <a><i class="fa fa-credit-card" aria-hidden="true"></i> Payments  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/paypal' ; }else {echo '#';}?>">PayPal A/C </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/bank' ; }else {echo '#';}?>">Bank A/C  </a></li>
                     <li><a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/account/card' ; }else {echo '#';}?>">Debit or Credit Card  </a></li>
                     <!-- <li><a href="#">ABN Number </a></li> -->
                    </ul>
                  </li>
                  
                  <li>
                   <a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/invite/' ; }else {echo '#';}?>"><i class="fa fa-users" aria-hidden="true"></i>Refer a professional</a>                                    
                  </li>
                  
                  <li>
                   <a href="<?php if($this->session->userdata('resume_status') == 1){echo base_url().'admin/forums/' ; }else {echo '#';}?>"><i class="fa fa-forumbee" aria-hidden="true"></i>Forums</a>                                    
                  </li>
                  <?php } ?>
                  <?php if($this->session->userdata('admin_user_type')==3){?>
                  <li>
                    <a><i class="fa fa-rocket"></i> Projects <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation/add' ; }else {echo '#';}?>">Post a post   </a></li>
                      <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/professionals' ; }else {echo '#';}?>">Explore Professionals</a></li>
                      <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/explore/team' ; }else {echo '#';}?>">Explore Teams</a></li>
                      <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation' ; }else {echo '#';}?>">Active Projects  </a></li>
                      <li><a href="<?php if($this->session->userdata('verified') == 1){echo base_url().'admin/quotation/team' ; }else {echo '#';}?>">Active Team Projects  </a></li>
                      <!-- <li><a href="#">Completed Projects   </a></li>
                      <li><a href="#">Delete the projects  </a></li> -->
                    </ul>
                  </li>
                  <?php } ?>
                  <?php if($this->session->userdata('admin_user_type')==3 ){?>
                  <!-- <li>
                    <a><i class="fa fa-file-text-o"></i> Proposal  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="#">View Proposal </a></li>
                     <li><a href="#">Manage proposal   </a></li>
                     <li><a href="#">Request on additional proposal     </a></li>
                    </ul>
                  </li> -->
                  <?php } ?>
                  <?php if($this->session->userdata('admin_user_type')==3 ){?>
                  <!-- <li>
                    <a><i class="fa fa-thumb-tack"></i> Track Record   <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="#">Track Record  </a></li>
                    </ul>
                  </li> -->
                  <?php } ?>

                 </ul>
              </div>

            </div>
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url();?>admin/dashboard/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a> -->
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
