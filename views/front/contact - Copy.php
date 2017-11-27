	<div class="contact_page">
    	<div class="contact_brad" style="background-image:url(<?php echo base_url();?>assets/images/contact_banner.jpg);">
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
                            <form id="contact-form" method="post" action="<?php echo base_url();?>application/views/front/sendmail.php">
	                            <ul>
	                          		<li><input type="text" name="username" value=""  placeholder="First Name" /></li>
	                              <li><input type="text" name="lastname" value="" placeholder="Last Name" /></li>
	                              <li><input type="email" name="email" value="" placeholder="Your email address" /></li>
	                              <li><input type="text" name="phone" value="" placeholder="Contact no." /></li>
	                              <li><textarea name="message" placeholder="Message"></textarea></li>
	                              <li><button type="submit" name="submit-form">Submit</button> <button type="reset">Reset</button></li>
	                            </ul>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    	<div class="contact_right"><img src="<?php echo base_url();?>assets/common/images/contact_rigjht.png" /></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
