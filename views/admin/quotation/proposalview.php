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
                    <h2>Proposal View</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="profile_form_update edu_update01">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                   
                    <?php if($proposalView){ //echo '<pre>';print_r($proposalView);?>
                    <?php if($proposalView[0]->verifiedbyadmin ==3){?>
                    		<form action="<?php echo base_url();?>admin/proposal/proposalUpdate/" id="frmpro" method="post">
                            <input type="hidden" id="proposalId" name="proposalId" value="<?php echo $proposalView[0]->id;?>"/>
                            <input type="hidden" id="projectname" name="projectname" value="<?php echo $proposalView[0]->project_name;?>"/>
                             <input type="hidden" id="clientname" name="clientname" value="<?php echo $proposalView[0]->name;?>"/>                   
                        <div class="bid_01">
                            <div class="bid_01_half">Client's Name</div>                             
                            <?php echo $proposalView[0]->name; ?>
                        </div>                    	
                        <div class="bid_01">
                            <div class="bid_01_half">Project Name</div> 
                            <?php echo $proposalView[0]->project_name; ?>
                        </div>                  
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Work Details</div> 
                            <div class="work_div_detail"><?php echo $proposalView[0]->work_detail; ?></div>
                        </div>
                        
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Project Name</div>
                            <input type="text" id="proposalprojectname" name="proposalprojectname" value=" <?php echo $proposalView[0]->proposalprojectname; ?>"/> 
                           
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Overview</div> 
                                                        
                            <textarea class="form-control" id="overview" name="overview"><?php echo $proposalView[0]->proposaloverview; ?></textarea>
                        </div>                   	
                        <div class="bid_01">
                            <div class="bid_01_half"> Proposal Message</div>
                            <textarea class="form-control" id="message" name="message"><?php echo $proposalView[0]->proposal_text; ?></textarea>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Scope Of Work</div>
                            <textarea class="form-control" id="scopeofwork" name="scopeofwork"><?php echo $proposalView[0]->proposalscopeofwork; ?></textarea> 
                            
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Time frame </div> 
                            <div class="work_div_detail">
                                <select id="proposaltimelimit" name="proposaltimelimit" class="form-control">                                
                                    <option value="1" <?php if($proposalView[0]->proposaltimelimit ==1){echo 'selected';}?>>1</option>
                                    <option value="2" <?php if($proposalView[0]->proposaltimelimit ==2){echo 'selected';}?>>2</option>
                                    <option value="3" <?php if($proposalView[0]->proposaltimelimit ==3){echo 'selected';}?>>3</option>
                                    <option value="4" <?php if($proposalView[0]->proposaltimelimit ==4){echo 'selected';}?>>4</option>
                                    <option value="5" <?php if($proposalView[0]->proposaltimelimit ==5){echo 'selected';}?>>5</option>
                                    <option value="6" <?php if($proposalView[0]->proposaltimelimit ==6){echo 'selected';}?>>6</option>
                                    <option value="7" <?php if($proposalView[0]->proposaltimelimit ==7){echo 'selected';}?>>7</option>
                                    <option value="8" <?php if($proposalView[0]->proposaltimelimit ==8){echo 'selected';}?>>8</option>
                                    <option value="9" <?php if($proposalView[0]->proposaltimelimit ==9){echo 'selected';}?>>9</option>
                                    <option value="10" <?php if($proposalView[0]->proposaltimelimit ==10){echo 'selected';}?>>10</option>
                                    <option value="11" <?php if($proposalView[0]->proposaltimelimit ==11){echo 'selected';}?>>11</option>
                                    <option value="12" <?php if($proposalView[0]->proposaltimelimit ==12){echo 'selected';}?>>12</option>
                                </select>
                                <select id="proposaltime" name="proposaltime" class="form-control">
                                    <option value="week" <?php if($proposalView[0]->proposaltime =='week'){echo 'selected';}?>>Week</option>
                                    <option value="month" <?php if($proposalView[0]->proposaltime =='month'){echo 'selected';}?>>Month</option>
                                </select>                           
							
                            </div>
                        </div>
                    	
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Additional Details</div> 
                            <textarea class="form-control" id="additionaldetails" name="additionaldetails"><?php echo $proposalView[0]->proposaladditionaldetails; ?></textarea>
                           
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Fee</div>
                            <input type="text" id="proposalfee" name="proposalfee" value=" <?php echo $proposalView[0]->proposalfee; ?>"/> 
                           
                        </div>
                        <div class="bid_01">
                            <div class="bid_01_half"></div> 
                            <input type="submit" value="Update"/>
                        </div>
                        
                        </form>
						<?php }else{?>                        	                    
                        <div class="bid_01">
                            <div class="bid_01_half">Client's Name</div> 
                            <?php echo $proposalView[0]->name; ?>
                        </div>                    	
                        <div class="bid_01">
                            <div class="bid_01_half">Project Name</div> 
                            <?php echo $proposalView[0]->project_name; ?>
                        </div>                  
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Work Details</div> 
                            <div class="work_div_detail"><?php echo $proposalView[0]->work_detail; ?></div>
                        </div>
                        
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Project Name</div> 
                            <?php echo $proposalView[0]->proposalprojectname; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Overview</div> 
                            <?php echo $proposalView[0]->proposaloverview; ?>
                        </div>
                    	
                        <div class="bid_01">
                            <div class="bid_01_half"> Proposal Message</div> 
                            <?php echo $proposalView[0]->proposal_text; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Scope Of Work</div> 
                            <?php echo $proposalView[0]->proposalscopeofwork; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Time</div> 
                            <div class="work_div_detail"><?php echo $proposalView[0]->proposaltimelimit .' '.$proposalView[0]->proposaltime; ?></div>
                        </div>
                    	
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Additional Details</div> 
                            <?php echo $proposalView[0]->proposaladditionaldetails; ?>
                        </div>
                        
                        <div class="bid_01">
                            <div class="bid_01_half">Proposal Fee</div> 
                            <?php echo $proposalView[0]->proposalfee; ?>
                        </div>                       
                    <?php }?>
                    
					<?php }?>                    
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