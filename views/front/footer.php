<div class="footer" >

    <div class="container">

        <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="foot1">

                    <img src="<?php echo base_url();?>assets/common/images/logo.png" />

                     <div class="email_foot_sovl">
                         <div class="icon01"><i class="fa fa-envelope" aria-hidden="true"></i></div>

                         <div class="icon01_detail"><span>SEND US EMAIL </span><br /><a href="mailto:services@proyourway.com">services@proyourway.com</a></div>
                     </div>


                </div>

            </div>

           <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="foot2">

                    <ul>

                        <!-- <li><a href="<?php echo base_url();?>about"><i class="fa fa-angle-right" aria-hidden="true"></i> Our Team</a></li>

                        <li><a href="<?php echo base_url();?>about"><i class="fa fa-angle-right" aria-hidden="true"></i> Media</a></li>

                        <li><a href="<?php echo base_url();?>about"><i class="fa fa-angle-right" aria-hidden="true"></i> How it works</a></li>-->
                        <li><a href="<?php echo base_url();?>about"><i class="fa fa-angle-right" aria-hidden="true"></i> About us</a></li>

                        <li><a href="<?php echo base_url();?>contact"><i class="fa fa-angle-right" aria-hidden="true"></i> Contact us</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="foot3">

                     <h3>Follow us</h3>

                     <ul>
                     	<li><a href="https://www.facebook.com/proyourway/" target="_blank"><img src="<?php echo base_url();?>assets/common/images/facebook0061.png" /></a></li>
                        <li><a href="https://twitter.com/proyourway" target="_blank"><img src="<?php echo base_url();?>assets/common/images/twitter0062.png" /></a></li>
                        <li><a href="https://www.linkedin.com/company-beta/17951491/" target="_blank"><img src="<?php echo base_url();?>assets/common/images/linkdin_0064.png" /></a></li>
                        <li><a href="https://plus.google.com/collection/g1rVmB" target="_blank"><img src="<?php echo base_url();?>assets/common/images/google_plus0063.png" /></a></li>
                     </ul>

                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="foot3">

                     <h3><a href="<?php echo base_url();?>about">About <span>us</span></a></h3>

                     <p>Pro Your Way is an innovative and an extraordinary platform where Top Talented Experts are given a play work area that leads them to potential consumers and the end-users.  <br /><a href="<?php echo base_url();?>about">Read more</a></p>

                </div>

            </div>

        </div>

    </div>

</div> <div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="copy_right">Copyrights Bookyourspot Pvt. Ltd. © 2017 All Rights Reserved.</div>
            </div>

<div class="col-md-3 col-sm-3 col-xs-12">
                <div class="copy_right"><a href="<?php echo base_url();?>terms">Terms & Conditions</a>   |   <a href="<?php echo base_url();?>privacy">Privacy Policy</a></div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="design">Design and Developed by <a href="http://www.newvisiondigital.co/" target="_blank"><img src="<?php echo base_url();?>assets/common/images/nvdlogo.PNG" alt="New vision digital" /></a></div>
            </div>
        </div>
    </div>
</div>

<a href="#" class="scrollup" >Scroll To Top</a>

<script src="<?php echo base_url();?>assets/common/js/wow.js"></script>
  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script>
  <script>
$(function() {
    var html = $('html, body'),
        navContainer = $('.nav-container'),
        navToggle = $('.nav-toggle'),
        navDropdownToggle = $('.has-dropdown');

    // Nav toggle
    navToggle.on('click', function(e) {
        var $this = $(this);
        e.preventDefault();
        $this.toggleClass('is-active');
        navContainer.toggleClass('is-visible');
        html.toggleClass('nav-open');
    });

    // Nav dropdown toggle
    navDropdownToggle.on('click', function() {
        var $this = $(this);
        $this.toggleClass('is-active').children('ul').toggleClass('is-visible');
    });

    // Prevent click events from firing on children of navDropdownToggle
    navDropdownToggle.on('click', '*', function(e) {
        e.stopPropagation();
    });
});
</script>
<script src="<?php echo base_url();?>assets/common/js/slider.js"></script>
<script>
    $("#slider-container").sliderUi({
        speed: 500,
        cssEasing: "cubic-bezier(0.285, 1.015, 0.165, 1.000)"
    });
    $("#caption-slide").sliderUi({
        caption: true
    });
</script>
<script>
	$("#slider-container01").sliderUi({
		speed: 500,
		cssEasing: "cubic-bezier(0.285, 1.015, 0.165, 1.000)"
	});
	$("#caption-slide").sliderUi({
		caption: true
	});
</script>




<script src="<?php echo base_url();?>assets/common/js/bootstrap-portfilter.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $("#flexiselDemo3").flexisel({
        visibleItems: 3,
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
<script src="<?php echo base_url();?>assets/common/js/jquery-scheme.js"></script>
<script>
        $('.schemes-group').scheme({
            button_bar: 'no'
        });
    </script>

<script src="<?php echo base_url();?>assets/common/js/magicselection.js"></script>
        <script>
            (function() {

                var selList = document.getElementById( 'me-select-list' ),
                    items = selList.querySelectorAll( 'li' );

                // fill the initial checked elements (mozilla)
                [].slice.call( items ).forEach( function( el ) {
                    el.className = el.querySelector( 'input[type="checkbox"]' ).checked ? 'selected' : '';
                } );

                function checkUncheck( el ) {
                    var elCheckbox = el.querySelector( 'input[type="checkbox"]' );
                    el.className = elCheckbox.checked ? '' : 'selected';
                    elCheckbox.checked = !elCheckbox.checked;
                }

                new magicSelection( selList.querySelectorAll( 'li' ), {
                    onSelection : function( el ) { checkUncheck( el ); },
                    onClick : function( el ) {
                        el.className = el.querySelector( 'input[type="checkbox"]' ).checked ? 'selected' : '';
                    }
                } );

            } )();
        </script>

<script src="<?php echo base_url();?>assets/common/js/jquery.bbq.js"></script>
<script src="<?php echo base_url();?>assets/common/js/jquery.atAccordionOrTabs.js"></script>
<script type="text/javascript">
$('.demo').accordionortabs();
</script>
 <script>
     $(document).ready(function(){
        $("#closed").click(function(){
            //$(".modal-body").html("");
            //$('#forgetpasswordsuccess').modal().hide();;
            window.location="<?php echo base_url();?>";
        });

        $("#closedd").click(function(){
            //$(".modal-body").html("");
            //$('#forgetpasswordsuccess').modal().hide();;
            window.location="<?php echo base_url();?>form";
        });


     });
 </script>

<script type="text/javascript">
_linkedin_data_partner_id = "48552";
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=48552&fmt=gif" />
</noscript>
</body>
</html>
