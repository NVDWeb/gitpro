<html>
<title>Proyourway</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?php echo base_url();?>assets/images/fevicon.png">


<link href="<?php echo base_url();?>assets/common/css/colorbox.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://cdn.rawgit.com/jackmoore/colorbox/master/jquery.colorbox-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>

<script>
				
		function onPopupOpen() {
		  $("#modal-content").show();
		  $("#yurEmail").focus();
		}
		
		function onPopupClose() {
		  $("#modal-content").hide();
		  Cookies.set('colorboxShown', 'yes', {
			expires: 1
		  });
		  $(".clear-cookie").fadeIn();
		  lastFocus.focus();
		}
		
		function displayPopup() {
		  $.colorbox({
			inline: true,
			href: "#modal-content",
			className: "cta",
			width: 600,
			height: 350,
			onComplete: onPopupOpen,
			onClosed: onPopupClose
		  });
		}
		
		var lastFocus;
		var popupShown = Cookies.get('colorboxShown');
		
		if (popupShown) {
		  console.log("Cookie found. No action necessary");
		  $(".clear-cookie").show();
		} else {
		  console.log("No cookie found. Opening popup in 3 seconds");
		  $(".clear-cookie").hide();
		  setTimeout(function() {
			lastFocus = document.activeElement;
			displayPopup();
		  }, 6000);
		}
		  //# sourceURL=pen.js
  </script>

<head>
	<style>
	body{margin:0px; padding:0px;}
	img{max-width:100%;}
    .upcoming_banner{ width:100%; height:100%; float:left; background-image:url(assets/common/images/new_banner_comming.jpg); background-repeat:no-repeat; background-position:center; background-size:105%;}
.bottom_form01{     width: 100%;
    height: auto;
    float: none;
    position: fixed;
    right: 12px;
    bottom:2%;
    margin: auto;
    text-align: center;
    max-width: 262px;
    background-color: #ffa813;
    padding: 17px;
    border-radius: 19px;}
.bottom_form01 input{    font-size: 13px;
    padding: 12px;
    border: 0px;
    width: 100%;
    margin-bottom: 9px;
    border-radius: 5px;}
.bottom_form01 select{    font-size: 13px;
    padding: 12px;
    border: 0px;
    width: 100%;
    margin-bottom: 9px;
    border-radius: 5px;}
.bottom_form01 textarea{    font-size: 13px;
    padding: 12px;
    border: 0px;
    width: 100%;
    border-radius: 6px;
    height: 80px;
    margin-bottom: 12px;}
.bottom_form01 input[type="submit"]{    background-color: #565656;    color: #fff;    text-transform: uppercase; margin-bottom:0px;}
.bottom_form01 input[type="submit"]:hover{    background-color: #ffffff;    color: #000;}
.follow{ width:100%; height:auto; float:left;}
.follow h2{    font-size: 22px;
    font-family: sans-serif;
    text-transform: uppercase;
    margin: 8px 0px 14px;
    color: #565656;
    font-weight: 600;}
.follow a{    color: #fff;
    margin: 0px 4px;}
.follow a i{    font-size: 24px;}
.follow a:hover{    color: #565656;}
.header{width:100%;height:auto;float:left;background-color: rgba(0, 0, 0, 0.65);position: absolute;z-index: 999;}
.logo_left{ float:left;     margin-bottom: 13px;}
.logo_left img{ max-width:100%;}
.top_right_social{ float:right;}
.top_right_social ul{    width: auto;
    float: right;
    margin: 0px;
    padding: 0px;}
.top_right_social ul h2{    width: auto;
    float: none;
    display: inline-block;
    font-size: 17px;
    color: #fff;
    font-family: sans-serif;
    font-weight: normal;
    margin-right: 10px;}
.top_right_social ul li{    display: inline-block;
    vertical-align: sub;
    margin-left: 10px;}
.top_right_social ul li a{    color: #ffa813;}
.top_right_social ul li a i{    font-size: 21px;}
.top_right_social ul li a:hover{    color: #ffffff}
.header .container{  margin: auto;    padding-top: 15px;     padding-right: 20px;    padding-left: 20px;}
.num{    width: 100%;}
.num .sel{width: 30%;    float: left;  line-height:37px;}
.num .num01{    width: 68%;    float: right;}
.text_left{    font-family: sans-serif;
    margin-top: 20%;
    margin-left: 15px;
    text-align: center;}
.text_left h3{    font-size: 57px;
    text-transform: uppercase;
    color: #fff;
    margin-bottom: 32px;
    line-height: 30px;}
.text_left h4{    font-size: 46px;
    text-transform: uppercase;
    color: #ffa813;
    margin-top: 0px;
    margin-bottom: 31px;}
.text_left h5{    margin: 0px auto;
    font-size: 30px;
    color: #ffa813;
    font-weight: normal;
    border: 1px solid #ffa813;
    width: 250px;
    padding: 15px;
    border-radius: 4px;
    text-align: center;}
.bottom_form01 form{margin-bottom:0px;}

.lead_popup{     width: 100%;
    height: auto;
    float: none;
    position: static;
    right: 0px;
    bottom:0%;
    margin: auto;
    text-align: center;
    max-width: 262px;
    background-color: #ffa813;
    padding: 17px;
    border-radius: 19px;}
#colorbox{ border:0px;}
#cboxOverlay{     background-color: #000;
    width: 100%;
    position: absolute;
    height: 100%;
	opacity:0.8}
.lead_popup h2{    font-family: sans-serif;
    margin: 0px;
    margin-bottom: 11px;}

@media (max-width: 1024px) {
	.text_left{text-align: left;}
	.text_left h5{margin: 0px 0px;}
	.text_left h3{font-size: 44px;}
	.text_left h4{font-size: 40px;}
}

@media (max-width: 768px) {
	.upcoming_banner{background-size: 150%;}
	.text_left h3{font-size: 26px;}
	.text_left h4{font-size: 31px;}
	.text_left h5{font-size: 23px; width: 180px;}
	.text_left{margin-top: 30%;}
}

@media (max-width: 600px) {
	.upcoming_banner{height:auto;    background-size: 500%;}
	.bottom_form01{bottom: 1%;max-width: 300px;position: relative;margin: auto;right: 0;}
	.logo_left{margin-bottom: 0px;width: 100%;text-align: center;}
	.top_right_social{width: 100%;text-align: center;}
	.top_right_social ul{float: none;}
	.text_left{ margin-top:160px; text-align: center; margin-bottom: 30px;}
	.text_left h3{font-size: 30px;line-height: 38px; margin-bottom: 13px;}
	.text_left h5{margin:auto;}


}

    </style>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" media="all" />
</head>
<body>
<div class="header">
	<div class="container">
    	<div class="logo_left"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/common/images/logo.png"></a></div>
        <div class="top_right_social">
        	<ul>
            	<h2>Follow us</h2>
            	<li><a href="https://www.facebook.com/proyourway/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/proyourway" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/company-beta/17951491/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://plus.google.com/collection/g1rVmB" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="upcoming_banner">
	<div class="text_left">
    	<h3>The next big thing is here</h3>
        <h4>Proyourway</h4>
        <h5>Launching Soon</h5>
    </div>
	<div class="container">
    	<div class="row">
            <div class="bottom_form01">
            <?php
            if(form_error('name')){
              $errorStyleName="border:1px solid red";
            }else{
              $errorStyleName="";
            }

            if(form_error('email')){
              $errorStyleEmail="border:2px solid red";
            }else{
              $errorStyleEmail="";
            }

            if(form_error('country')){
              $errorStyleCountry="border:2px solid red";
            }else{
              $errorStyleCountry="";
            }

            if(form_error('mobile')){
              $errorStyleMobile="border:2px solid red";
            }else{
              $errorStyleMobile="";
            }

            if(form_error('comment')){
              $errorStyleComment="border:2px solid red";
            }else{
              $errorStyleComment="";
            }

            ?>
            <?php if ($this->session->flashdata('message')) { ?>
            <span style="color:green"><?php echo $this->session->flashdata('message');?></span>
            <?php } ?>



                <form method="post" action="<?php echo $action;?>">
                <input type="text" style="<?php echo $errorStyleName;?>" placeholder="Name*" name="name" value="<?php echo $name;?>" />
                <input type="text" style="<?php echo $errorStyleEmail;?>" placeholder="Email*" name="email" value="<?php echo $email;?>" />
                <div class="num">
                	<select name="country" style="<?php echo $errorStyleCountry;?>" class="sel">
                <?php foreach ($countryList as $value) { ?>
                 <option value="<?php echo $value->phonecode;?>" <?php if($country==$value->phonecode) { echo 'selected';} ?>><?php echo $value->name ;?>(+<?php echo $value->phonecode ;?>) </option>
                <?php  } ?>
                </select>
                    <input type="text" class="num01" style="<?php echo $errorStyleMobile;?>" placeholder="Mobile*" name="mobile" value="<?php echo $mobile;?>" >
                </div>
                <textarea placeholder="Comments*" name="comment" style="<?php echo $errorStyleComment;?>"><?php echo $comment;?></textarea>
                <input type="submit" value="Submit" />
</form>
            </div>
        </div>
    </div>
</div>

<div id="modal-content" style="display:none;">
	<div class="bottom_form01 lead_popup">
    <h2>Lead Generation Form</h2>
    <?php echo validation_errors();?>
    <span id="err" style="color: red;"></span>
    <span id="suc" style="color: green;"></span>
    <div>
        <input type="text" placeholder="Name*" name="namenn"  id="name"value="<?php echo $name;?>" /><span id="errN" style="color:red;"></span>
        <input type="text" placeholder="Email*" name="emailnn" id="email" value="<?php echo $email;?>" /><span id="errE" style="color:red;"></span>
            <div class="num">
            <select name="countrynn" id="country" style="" class="sel">
            <?php foreach ($countryList as $value) { ?>
            <option value="<?php echo $value->phonecode;?>" <?php if($country==$value->phonecode) { echo 'selected';} ?>><?php echo $value->name ;?>(+<?php echo $value->phonecode ;?>) </option>
            <?php  } ?>
            </select><span id="errC" style="color:red;"></span>
            <input type="text" class="num01" placeholder="Mobile*" name="mobilenn" id="mobile" value="<?php echo $mobile;?>" ><span id="errM" style="color:red;"></span>
            </div>
        <textarea placeholder="Comments*" name="commentnn" id="comment"><?php echo $comment;?></textarea><span id="errCO" style="color:red;"></span>
        <button name="leadbtn" id="leadbtn" >Submit</button>
       <!-- <input type="button" name="leadbtn" id="leadbtn" value="Submit" /></form>-->
    </div>
</div>

</div>

<script>
$("#leadbtn").click(function(){

    var name = $("#name").val();
    var email = $("#email").val();
    var country = $("#country").val();
    var mobile = $("#mobile").val();
    var comment = $("#comment").val();
    var error = 0;

    if(name==''){
      $("#errN").html('Please provide Name.');
      error=1;
    }else{
      $("#errN").html('');
    }
    if(email==''){
      $("#errE").html('Please provide email.');
      error=1;
    }else{
        $("#errE").html('');
    }

    if(country==0){
      $("#errC").html('Please select country.');
      error=1;
    }else{
        $("#errC").html('');
    }
    if(mobile==''){
      $("#errM").html('Please provide mobile.');
      error=1;
    }else{
        $("#errM").html('');
    }
	if(comment==''){
	$("#errCO").html('Please Write the message.');
	error=1;
	}else{
	$("#errCO").html('');
	}
    if(error==0){
      //$('#leadbtn').prop('disabled', true);     
      $("#loading").show();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>landing/leadForm",
        data:{"name":name,"email":email,"country":country,"mobile":mobile,"comment":comment},
        success: function(theResponse){
          //alert(theResponse);
          $("#loading").hide();
          if (theResponse=='success'){            
            $("#suc").html('Lead Generation Form Submitted Successfully!');
            setTimeout(function(){location.reload();}, 4000);
          }else{           
            $("#err").html('Sorry something went wrong.');
            setTimeout(function(){$('#err').html('');}, 4000);
          }
          //$("#succ").html(theResponse);
        }
      });
    }
  });

</script>

</body>
</html>
