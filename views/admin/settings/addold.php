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
  padding-left: 1.95em;
  cursor: pointer;
}

/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  content: '';
  position: absolute;
  left: 0; top: 0;
  width: 1.25em; height: 1.25em;
  border: 1px solid #ccc;
  background: #fff;
  border-radius: 4px;
  box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '✔';
  position: absolute;
     top: -4px;
    left: 4px;
    font-size: 24px;
    line-height: 0.8;
    color: #f68d1f;
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
  border: 2px dotted blue;
}

/* hover style just for information */
label:hover:before {
  border: 2px solid #4778d9!important;
}


.check_llist_new{ width:100%; height:auto; float:left; list-style:none; margin:0px; padding:0px; margin-left: 10px; margin-top:20px;}
.check_llist_new li{    width: 97%;
    height: auto;
    float: left;
    margin-bottom: 12px;
    padding: 13px 10px 0px;
    background-color: #0000000f;
    border: 1px solid #c7c7c75e;
    border-radius: 4px;}

.smart-tabs {
	position: relative;
}
	.smart-tabs:before,
	.smart-tabs:after {
		content: " ";
		display: table;
	}
	.smart-tabs:after {
		clear: both;
	}
	
	/* ------------------------ navigation ------------------------ */
	.smart-tabs dt {
		background: #eee;
		border: solid #dfe1e1;
		border-width: 1px 1px 0;
		color: #333;
		float: left;
		font-size: 20px;
		font-weight: 400;
		height: 3em;
		line-height: 3;
		text-align: center;
	}
		.smart-tabs dt a {
			color: #6b6b6b;
			display: block;
			padding: 0 1rem;
			text-decoration: none;
		}
		.smart-tabs dt.current {
			background: #fff;
			border-bottom: 1px solid #fff;
			position: relative;
			z-index: 2;
		}
			.smart-tabs dt.current a {
				color: #111;
			}
			
	/* ------------------------ panels ------------------------ */
	.smart-tabs dd {
		background: #fff;
		border: 1px solid #dfe1e1;
		font-size: 0.875em;
		margin-top: -1px;
		padding: 0.75em 1em;
		position: absolute;
		width: 100%;
	}

	/* ------------------------ accordion changes ------------------------ */
	.smart-tabs.accordion {
		border-bottom: 1px solid #dfe1e1;
		min-height: 100%;
	}
		.smart-tabs.accordion dt {
			float: none;
			text-align: left;
			width: 100%;
			z-index: 1;
		}
			.smart-tabs.accordion dt.current {
				z-index: 0;
			}
			.smart-tabs.accordion dt a:before {
				content: '\2b\a0';
				float:right;
			}
			.smart-tabs.accordion dt.current a:before {
				content: '\2013\a0';
			}
			/*.smart-tabs.accordion dt a:after {
				content: '\2b';
				position: absolute;
				right: 1rem;
			}
			.smart-tabs.accordion dt.current a:after {
				content: '\2013';
			}*/
		.smart-tabs.accordion dd {
			border-bottom: 0 none;
			height: 100%;
			min-height: 0;
			position: relative;
			top: 0;
		}
			.smart-tabs.accordion dd:before,
			.smart-tabs.accordion dd:after {
				content: " ";
				display: table;
			}
			.smart-tabs.accordion dd:after {
				clear: both;
			}
.add_tabing01{     width: 100%;
    height: auto;
    float: left;
    max-width: 900px;
    margin-left: 20px;
    margin-top: 47px;
}

.service-sub{    width: 100%;
    height: auto;
    float: left;
    margin-left: 21px;
    margin-top: 35px;}
.service-sub h2{font-weight: 600;
    color: #5a5a5a;
    font-size: 21px;
    width: 100%;;
    border-bottom: 1px solid #ddd;
    padding-bottom: 6px;
    margin-bottom: 20px;}
.service-sub a{ float: left;
    background-color: #f0f0f0;
    margin-right: 16px;
    color: #5a5a5a;
    font-weight: bold;
    padding: 7px 15px;}
.service-sub a:hover{    background-color: #f68d1f;    color: #fff; text-decoration:none;}

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
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title page_tit">
                            <h2>Settings</h2>                            
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <div class="profile_form_update edu_update01">
                            <span style="color:red;"><?php echo validation_errors(); ?></span>        
                            <div class="col-md-12"><div class="manage_note">Change Password</div></div>
                            <?php
                            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        
                            echo form_open_multipart($action,$attributes); ?>
        
                            
                              <div class="row form-group">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label for="first-name">New Password<span class="required">*</span></label>
                                  <input type="password" id="new_password" name="new_password" required  value="<?php echo $new_password;?>">
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label for="first-name">Confirm New Password<span class="required">*</span></label>
                                  <input type="password" id="cnew_password" name="cnew_password" required  value="<?php echo $cnew_password;?>">
                                </div>


                                <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label> <br></label>
                                  <div class="profo_edi_sub">
                                    <input type="submit" value="<?php echo $submit_btn_value; ?>" class="form-control">
                                  </div>
                                </div>
                              </div>
                              
        
                            </form>
                           <?php if($this->session->userdata('admin_user_type')==2){?>
                            <div class="row form-group">
                              <div class="col-md-12"><div class="manage_note">Manage Lead Notification</div></div>
                              <div class="col-md-4 col-sm-4 col-xs-12"><div class="check_select"><input type="radio" name="notification_type" class="ipchk" value="1" <?php if($userData[0]->email_notification==1){ echo 'checked=checked'; } ?> onClick="setNotification();"> <span>Every lead on Email</span> </div></div>
                              <div class="col-md-4 col-sm-4 col-xs-12"><div class="check_select"><input type="radio" name="notification_type" class="ipchk" value="2" <?php if($userData[0]->email_notification==2){ echo 'checked=checked'; } ?> onClick="setNotification();"> <span>Daily Summary of leads</span>  </div></div>
                              <!-- <div class="col-md-4 col-sm-4 col-xs-12"><div class="check_select"><input type="checkbox" name="notification_type" class="ipchk" value="3" onclick="setNotification();"> <span>Dashboard</span></div></div> -->                           
                            <div class="service-sub">
                           
                            <?php 
							if(!empty($getservices)){
								echo ' <h2>Profile Type</h2>';
							foreach($getservices as $service){
								
								echo '<a href="" class="bid01">'.$service[0]->category_name.'</a>';
								//echo '<p>'.$service[0]->category_name.'</p>';
							}
							}
							?>                            
                            
                            </div>
                            <form class ="form-horizontal form-label-left" id="demo-form2" action="<?php echo base_url();?>admin/settings/updateservices" method="post">
                              <div class="add_tabing01">
                              <dl id="js-smart-tabs--accordion" class="smart-tabs">
								<?php 
                                foreach($categories as $category){		
									$parentid = $category->id;?>
									
                                        <dt><a href="#"><?php echo $category->category_name;?></a></dt>
                                        <?php 
                                        $subcategories = $this->category_model->getSubCategoriesByParentId($parentid);?>
                                        <dd>
                                            <ul class="check_llist_new">
												<?php
												$i = 0; 
                                                foreach($subcategories as $subcat){ ?>                                              
                                                <li>
                                                    <input type="checkbox" id="sub<?php echo $subcat->id;?>" name="sub_cat[]" value="<?php echo $subcat->id;?>"   /> 
                                                    <label for="sub<?php echo $subcat->id;?>"><?php echo $subcat->category_name;?></label>
                                                </li>
                                                <?php  $i++;}?>                                           
                                            </ul>
                                        </dd>
																
                                <?php }?>
                              	
                                   
                                  </dl>
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                  <label> <br></label>
                                  <div class="profo_edi_sub">
                                    <input type="submit" value="Update">
                                  </div>
                                </div>
                              </div>
                              
                              
                              
                            </div>
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
        <!-- /page content -->
<script type="text/javascript">

function setNotification(){
  var matches = [];
  
  $(".ipchk:checked").each(function() {
    matches.push(this.value);
    jQuery.ajax({  
      type: "POST",  
      url: "<?php echo base_url();?>admin/settings/setNotification",  
      data: {'ipchk': matches},  
      success: function(theResponse){
        alert(theResponse);
        if(theResponse=='success'){
          alert('Your Lead notification updated.');
          location.reload();
        }else{
          alert('Something went wrong.');
          location.reload();
        }
        
        
      }

    }); 
  });

}
</script>

<script src="<?php echo base_url();?>admin-assets/js/smartTabs.js"></script> 
<script>
$('#js-smart-tabs').smartTabs();
$('#js-smart-tabs--tabs').smartTabs({
	layout: 'tabs'
});
$('#js-smart-tabs--accordion').smartTabs({
	layout: 'accordion'
});
</script>