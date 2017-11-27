<div class="service_banner_new01">
   		<div class="container">
        	<div class="row">
            	<h3>Services</h3>            	               
            </div>
       </div>
   		<img src="<?php echo base_url();?>assets/images/serivde_banner01.jpg" />   		
   </div> 
   
   <div class="landing_serive_new01">
   	 <div class="container">
     	<div class="row">
        	<div class="landing_service_tabing">
            	<div id="horizontalTab">
                    <ul>
                    <?php $i =1;					
					foreach($allcategories as $categories){?>
                        <li><a href="#tab-<?php echo $i;?>"><h3><?php echo $categories->category_name;?></h3><img src="<?php echo base_url();?>assets/images/new_cat_service0<?php echo $i;?>.png" /></a></li>
                        <div id="tab-<?php echo $i;?>">
                        <?php foreach($categories->parent_cat as $subcat){?>
                        <a href="<?php echo base_url();?>services/<?php echo $subcat->slug;?>">                         		
                        <div class="col-md-2 col-sm-2 col-xs-6">
                        	<div class="service_cat_new">
                            	<img src="<?php echo base_url();?>assets/images/ser_cat_new01.png" />
                               <h4><?php echo $subcat->category_name;?></h4>
                            </div>
                        </div>
                        </a>
						<?php }?>
                     </div>
					<?php $i++;}?>                     
                    </ul>
            
                </div>
            </div>
        </div>
     </div>
   </div>
   
   <div class="tried_form">
   		<div class="container">
        	<div class="row">
            	<div class="col-md-6">
                	<div class="tried_form_left">
                		<img src="<?php echo base_url();?>assets/images/team_create_left.png" />
                    </div>               
                </div>
                <div class="col-md-6">
                    <div class="tried_form_right">
                        <h3>Tired of Working alone</h3> 
                        <p>Create your Team Now</p>    
                        <input type="text" placeholder="Type your email address" />
                        <button>Get Started</button>
                    </div> 
                </div>
            </div>
        </div>
   </div>
   
   <div class="testimonial">
        <div class="container">
            <div class="row wow fadeInUp">
                <h3>Client’s <span>Say</span></h3>
            </div>
            <div class="testimonail01">
                <ul id="flexiselDemo6">
                    <li>
                        <div class="testi01 wow fadeInUp">
                            <img src="<?php echo base_url();?>assets/images/testi01.jpg" alt="client03">
                            <p>Posting a project and building a team was never this easier. With ProYourWay a streamlined working relationship and getting things done effectively is now an attainable target. I was in search of a corporate accountant for my firm and got into touch with the most proficient one. </p>
                            <h2>| &nbsp; matthew &nbsp; |</h2>
                        </div>
                    </li>
                    <li>
                        <div class="testi01 wow fadeInUp">
                            <img src="<?php echo base_url();?>assets/images/testi02.jpg" alt="client03">
                            <p>My experience at ProYourWay has been a profitable one. Not just I saved my costing for hiring and training personnel but also gathered the best professionals for my IT project and completed my target before the deadline. </p>
                            <h2>| &nbsp; Vickie &nbsp; |</h2>
                      </div>
                    </li>
                    <li>
                        <div class="testi01 wow fadeInUp">
                            <img src="<?php echo base_url();?>assets/images/testi03.jpg" alt="client03">
                            <p>With their special features and add on tools for online negotiation and live chat, Global communication and maintaining overseas connections has been made simpler and efficient with ProYourWay</p>
                            <h2>| &nbsp; Alex &nbsp; |</h2>
                        </div>
                    </li>
                </ul>
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
   
   
   <script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.responsiveTabs.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var $tabs = $('#horizontalTab');
            $tabs.responsiveTabs({
                rotate: false,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                setHash: true,
                activate: function(e, tab) {
                    $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                },
                activateState: function(e, state) {
                    //console.log(state);
                    $('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                }
            });

            $('#start-rotation').on('click', function() {
                $tabs.responsiveTabs('startRotation', 1000);
            });
            $('#stop-rotation').on('click', function() {
                $tabs.responsiveTabs('stopRotation');
            });
            $('#start-rotation').on('click', function() {
                $tabs.responsiveTabs('active');
            });
            $('#enable-tab').on('click', function() {
                $tabs.responsiveTabs('enable', 3);
            });
            $('#disable-tab').on('click', function() {
                $tabs.responsiveTabs('disable', 3);
            });
            $('.select-tab').on('click', function() {
                $tabs.responsiveTabs('activate', $(this).val());
            });

        });
    </script>
    
    <script type="text/javascript">
$(window).load(function() {
    $("#flexiselDemo6").flexisel({
        visibleItems: 2,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 1
            },
            landscape: {
                changePoint:640,
                visibleItems: 2
            },
            tablet: {
                changePoint:769,
                visibleItems: 2
            }
        }
    });

});
</script>
