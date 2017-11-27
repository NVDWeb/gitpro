<?php header('X-Frame-Options: DENY'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php if(isset($meta_title)) { echo $meta_title; } else { echo $title ; }?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="<?php if(isset($meta_keywords)) { echo $meta_keywords; } else { echo $title ; }?>" />
<meta name="description" content="<?php if(isset($meta_description)) { echo strip_tags($meta_description); } else { echo $title ; }?>">
<link rel="icon" href="<?php echo base_url();?>/assets/images/fevicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/common/css/style.css">
<link href="<?php echo base_url();?>assets/common/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/common/css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.flexisel.js"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>
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
<meta name="google-site-verification" content="IW3xPW62RpmAVaTOXBbPVGnlB-M6UH8JScdrYmZPWDM" />
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-98062972-1', 'auto');

  ga('send', 'pageview');



</script>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".scl").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 800, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });
});
</script>

<script type="text/javascript">
var rowCountw = 1; function addMoreRows(frm) {
	var count_row = $('p[id^=Edurowcount]').length;

	if(count_row<=4) {
rowCountw ++; var recRow = '<p id="Edurowcount'+rowCountw+'"><td><input type="text"  name="work_place[]" placeholder="add more workplace" /></td> <a href="javascript:void(0);" onclick="removeRowedu('+rowCountw+');">Delete</a></p>'; jQuery('#addedRows').append(recRow); } } function removeRowedu(removeNum) { jQuery('#Edurowcount'+removeNum).remove(); } </script>

<script type="text/javascript">
var rowCount = 3; function addMoreRowss(frm) {
var count_row1 = $('p[id^=rowCount]').length;
if(count_row1<=4) {
rowCount ++;
var recRow = '<p id="rowCount'+rowCount+'"><td><select name="education_level[]"><option value="0">--Level of Education--</option><option value="bachelor">Bachelor Degree</option><option value="bachelorhons">Bachelor degree (hons)</option><option value="doubledegree">Double Degree </option><option value="masters">Masters</option><option value="phd">PHD</option></select></td><td><input type="text"  placeholder="Add Course Details" name="more_education[]" value="" /></td> <a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></p>';
jQuery('#addedRowss').append(recRow);
}
 } function removeRow(removeNum) {  jQuery('#rowCount'+removeNum).remove(); } </script>

<script type="text/javascript">
var rowCount = 1; function addMoreRowsss(frm) { rowCount ++; var recRow = '<p id="rowCount'+rowCount+'"><td><input name="" type="text"  /></td> <a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a></p>'; jQuery('#addedRowsss').append(recRow); } function removeRow(removeNum) { jQuery('#rowCount'+removeNum).remove(); } </script>





</head>

<body>
<div class="header">

    <div class="top_header">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="top_email">

                        <ul>

                            <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:services@proyourway.com">services@proyourway.com</a></li>

                            <!--<li>

                                <select>

                                    <option value="INR" selected="selected"><i class="fa fa-inr" aria-hidden="true"></i> INR</option>

                                    <option value="USD" ><i class="fa fa-usd" aria-hidden="true"></i> US</option>

                                    <option value="EURO" ><i class="fa fa-euro" aria-hidden="true"></i> EURO</option>

                                </select>

                            </li>

                            <li>

                                <select>

                                    <option value="English" selected="selected">English</option>

                                    <option value="Hindi" >Hindi</option>

                                    <option value="Urdu" >Urdu</option>

                                </select>

                            </li>-->

                        </ul>

                    </div>

                </div>
<?php
echo $cnt = $this->router->fetch_class();
echo $mth = $this->router->fetch_method();?>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="top_login">

                        <ul>
                        <?php if($cnt!='landing'){?>
                            <li><a href="<?php echo base_url();?>login"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url();?>business"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="bottom_header">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12">

                    <div class="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/common/images/logo.png" alt="Pro Your Way" /></a></div>

                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <?php /*?><div class="head_log">
                        <ul>

                             <?php if($cnt=='landing' && $mth!='form'){?><li><a href="<?php echo base_url();?>form"  class="top_reg"><i class="fa fa-user-plus" aria-hidden="true"></i> Register  Now</a></li><?php } ?>

                           <?php if($cnt=='landing' && $mth!='index'){?><li><a href="<?php echo base_url();?>login"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a></li> <?php } ?>

                        </ul>

                    </div><?php */?>

                    <div class="menu01">
                    	<div class="menu_right">
                            <nav class="nav is-fixed" role="navigation">
                              <div class="wrapper wrapper-flush">
                                <button class="nav-toggle">
                                <div class="icon-menu"><span class="line line-1"></span> <span class="line line-2"></span> <span class="line line-3"></span></div>
                                </button>
                                <div class="nav-container">
                                  <ul class="nav-menu menu">
                                  <!--<li class="menu-item has-dropdown"> <a href="#!" class="menu-link">Home</a>
                                    <ul class="nav-dropdown menu">
                                      <li class="menu-item"> <a href="#!" class="menu-link">jQuery</a> </li>
                                      <li class="menu-item"> <a href="#!" class="menu-link">Front-end</a></li>
                                      <li class="menu-item"> <a href="#!" class="menu-link">jQueryScript</a> </li>
                                    </ul>
                                  </li>-->
                                  <li class="menu-item"> <a href="<?php echo base_url();?>" class="menu-link active">Home</a> </li>
                                  <li class="menu-item"> <a href="<?php echo base_url();?>about" class="menu-link">About us</a> </li>
                                  <!--<li class="menu-item"> <a href="#!" class="menu-link">How it Works</a> </li>
                                  <li class="menu-item"> <a href="#!" class="menu-link">For Professionals</a> </li>
                                  <li class="menu-item"> <a href="#!" class="menu-link">Blogs</a> </li>-->
                                  <li class="menu-item has-dropdown"> <a href="#" class="menu-link reg"><i class="fa fa-user" aria-hidden="true"></i> Register</a>
                                      <ul class="nav-dropdown menu">
                                      <li class="menu-item"> <a href="<?php echo base_url();?>form" class="menu-link">Signup as Professional</a> </li>
                                      <li class="menu-item"> <a href="<?php echo base_url();?>register/business" class="menu-link">Signup as Business</a></li>
                                    </ul>

                                      </li>
                                  <li class="menu-item"> <a href="<?php echo base_url();?>login" class="menu-link sin"><i class="fa fa-user" aria-hidden="true"></i> Sign in</a> </li>
                                  <li class="menu-item">
                                    <a href="<?php echo base_url();?>post" class="menu-link pot">Post a Project</a>
                                  </li>
                                </ul>
                                </div>
                              </div>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
