<?php

 
if (isset($_POST['submit-form'])){
	$name = $_POST['username'];
	$lastname = $_POST['lastname'];
        $email = $_POST['email'];
		$phone = $_POST['phone'];
	$text = $_POST['message'];

}
         $to = "services@proyourway.com";
         $message = $name;
		 $message .= $lastname;
         $message .= $email;
          $message .= $phone;
          $message .= $text;

$formcontent=" From: $name \n Lastname: $lastname \n Email: $email \n Phone: $phone \n Message: $text";
$recipient = "info@ameltd.net";
$subject = "Contact Form";
$mailheader = "From: $username \r\n";
$retval=mail($to, $subject, $formcontent, $mailheader);
if( $retval == true ) {
//echo "Thank You!" . " -" . "<a href='http://proyourway.com/beta/application/views/front/' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
}else {
            echo "Message could not be sent...";
         }
?>
    
    <!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>AME LTD</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/owl.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">
 
    
    <!-- Page Banner -->
    
    
    <section class="heading01">
    	<div class="auto-container">
        <div class="row"><div class="col-md-12"><h1>Thank You for your enquiry. We will get back to you soon.</h1>
        </div>
        </div>
        </div>
        </section>
    <!--Contact Options-->
    
    
    <!--Main Footer-->
    
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"></div>


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/masterslider.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->




</body>

</html>
