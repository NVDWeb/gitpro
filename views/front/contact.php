	<div class="contact_page">
    	<!--<div class="contact_brad" style="background-image:url(<?php echo base_url();?>/assets/images/contact_banner.jpg);">
        	<div class="contact_brad1">
            	<div class="container">
                	<div class="contact_br">
                    	<h3>Contact <span>us</span></h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="service_banner_new01">
            <div class="container">
                <div class="row">
                    <h3>Get in Touch <span>We help you master the Biz world!</span></h3>
                </div>
           </div>
            <img src="<?php echo base_url();?>assets/images/contact_banner01.jpg" />        
       </div> 
		<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

        <div class="contact_page01">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-6 col-sm-6 col-xs-12">
                    	<div class="contact_left">
                        	<h3>reach out to <span>us</span></h3>
                            <p>Got a Question? Are you interested in partershiping with us? Have some suggestions to say hi?</p>
                            <p><b>Email :</b> <a href="mailto:services@proyourway.com">services@proyourway.com</a></p>
                            <p><b>Get in touch with us</b></p>

							<?php if(validation_errors()){ ?>
								<div class="alert alert-danger" role="alert" style="font-family: verdana;"><?php echo validation_errors(); ?></div>
							<?php }?>

							<?php if($this->session->flashdata('success')){ ?>
								<div class="alert alert-success" role="alert" style="font-family: verdana;">

								<?php echo $this->session->flashdata('success'); ?>

							</div>
							<?php }?>


                            <form id="contact-form" method="post" action="<?php echo base_url();?>contact">
                            <ul>
                            	<li><input type="text" name="username" value="<?php echo $username;?>"  placeholder="First Name*" /></li>
                                <li><input type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Last Name*" /></li>
                                <li><input type="email" name="email" value="<?php echo $email;?>" placeholder="Your email address*" /></li>
                                <li><input type="text" name="phone" value="<?php echo $phone;?>" placeholder="Contact no.*" /></li>
                                <li><textarea name="message" placeholder="Message"><?php echo $message;?></textarea></li>
                                <li><button type="submit" name="submit-form">Submit</button> <button type="reset">Reset</button></li>
                            </ul>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<div class="contact_right"><img src="<?php echo base_url();?>assets/common/images/contact_rigjht.png" /></div>
                    </div>
                </div>
                <div class="contact_bootomm_call">
                    <div class="row">
                        <div class="col-md-12"><h3>ProYourWay is here to provide you with more information, answer all your questions and solve your queries you may have.</h3></div>
                        <div class="col-md-6 col-sm-6 col-xs-12"><h4><i class="fa fa-volume-control-phone"></i> +91- 91 954 8280280</h4></div>
                        <div class="col-md-6 col-sm-6 col-xs-12"><h4><i class="fa fa-envelope"></i> services@proyourway.com</h4></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="induster_expart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Our Professionals</h3>
                        <h4>We don’t like bragging but here are the companies associated with us</h4>
                        <img src="<?php echo base_url();?>assets/images/our_pro_cont.png" />                
                    </div>
                </div>
            </div>
        </div>

    </div>

