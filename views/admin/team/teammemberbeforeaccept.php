  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
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
                  <div class="x_title">
                    <h2>Team Request List</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="tutorial_list">
                      <?php 
                      if(count($teamMemberBeforeAccept) > 0){ 
                      foreach ($teamMemberBeforeAccept as $row) {  ?>
                      	<a href="<?php echo base_url();?>admin/team/teammessview/<?php echo $row->teamId;?>/<?php echo $row->professional_id;?>">
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">                        
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-xs-7">
                              <h2><?php echo $row->contact_person_name;?></h2>
                              <p><strong>Profile Type: </strong><?php echo @$row->profile_name;?></p>
                              <!--<ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php  //if(isset($row->country_name)) {
                                 // echo $row->country_name; } echo ','; if(isset($row->state_name)) {
                                  //echo $row->state_name; } echo ','; if(isset($row->city_name)) {
                                  //echo $row->city_name; } ?> </li>
                              </ul>-->
                            </div>
                            <div class="right col-xs-5 text-center">
                              <?php if($row->businessLogo!='' ) { ?>
                             <img class="img-circle img-responsive" src="<?php echo base_url();?>uploads/business/<?php echo $row->businessLogo ;?>" alt="Avatar">                            
                          <?php }else { ?>
                          <img class="img-circle img-responsive" src="<?php echo base_url();?>admin-assets/images/img.jpg" alt="Avatar">    
                          <?php } ?>
                            </div>
                         </div>                          
                        </div>
                      </div>
                      </a>
                      <?php } ?>
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
            </div>
          </div>
        </div>
        <!-- /page content -->