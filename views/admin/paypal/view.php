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
                  
                 
                 <div class="x_title">
                    <h2>Business Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="row">
                  <div class="col-sm-4">
                      <?php if(@$businessDetail){?>
                    
                     <?php //echo '<pre>';print_r($businessDetail);?>
                  <label>Business Name : </label> <?php echo $businessDetail[0]->business_name;?><br>
                  <label>Business Reg.No. : </label> <?php echo $businessDetail[0]->business_registration_number;?><br>
                      <label>Mobile : </label> <?php echo $businessDetail[0]->mobile;?><br>
                      <label>Email: </label> <?php echo $businessDetail[0]->email;?><br>


                  </div>
                  
                 
                </div>


                  
                  <?php } else { echo 'No Data Found';}?>

                  <hr>

                 

                  
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

        