<body class="nav-md">
  <div class="container body">
    <div class="main_container">     
      <?php $this->load->view('admin/top-navigation');?>
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
                              <h2>List Of Rating</h2>                              
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            
                            <div class="profile_form_update edu_update01 lead_box">
                            <table id="datatable" class="table table-striped">
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>Rating</th>
                                <th>Message</th>
                                
                                </tr>
                            </thead>
                                <tbody>
                                <?php                                
                                foreach ($getUserratings as $row){                                                      
                                echo '<tr><td>'.$row->name.'</td>';?>                          
                                <td>
									<?php $j=0;?>
                                    <p class="ratings">
                                    <?php
										if(isset($row->rating)){ ?>
										<a><?php echo $row->rating;?>/10</a>
										<?php for($i=1 ; $i<=$row->rating; $i++){
											$selected = "-o";
											if(!empty($row->rating) && $i<=$row->rating) {
												$selected = "";
											} ?>
											<span class="fa fa-star<?php echo $selected;?>"></span>
										<?php }
										$relC = 10-$row->rating;
											for($k=1; $k<=$relC; $k++){
												echo '<span class="fa fa-star-o"></span>';
										}?>
									<?php } ?>
                                    </p>
                                    <?php
                                    $j++; if($j==10) break;  ?>
                                    </td>
                                <?php 
                                	echo '<td>'.$row->reviewtext.'</td>';
                                	echo '<tr>';
                                } ?>
                                
                                
                                
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



