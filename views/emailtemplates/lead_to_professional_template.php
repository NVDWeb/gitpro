<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pro Your Way</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">

<style>
	body{margin:0px; padding:0px; font-family: 'Open Sans', sans-serif;}
	.main01{ width:100%; height:auto; max-width:500px; margin:auto; padding-top: 20px;}
	.logo{ width:100%; height:auto; float:left; text-align:center;}
	.logo img{ max-width:100%;}
	.content{ width:100%; height:auto; float:left; color:#333;}
	.content h3{ text-align:center; font-size:20px;     font-weight: normal;}
	.content p{ font-size:12px; color:#333;     line-height: 20px;    margin-bottom: 15px;}
	.content img{ max-width:100%;}
	.footer{width:100%; height:auto; float:left;     background-color: #194570;}
	.footer_left{width:46%; height:auto; float:left;     padding: 3% 2%;}
	.footer_left img{ max-width:180px;     margin-bottom: 15px;}
	.footer_left ul{width: 100%;    height: auto;    float: left; list-style:none; margin:0px; padding:0px;}
	.footer_left ul li{    float: left;}
	.footer_left ul li a{    width: 26px;    height: 19px;    text-align: center;    line-height: 16px;    margin-right: 8px;    border-radius: 50%;    float: left;    padding-top: 8px;    text-decoration: none;    font-size: 12px;}
	.footer_left ul li a i{display: inherit;}
	.footer_left ul li a:hover{}
	.foot3{width:46%;     padding: 3% 2%; height:auto; float:left;}
	.foot3 h3{margin: 0px;    color: #fff;    font-size: 17px;       font-weight: normal;  margin-bottom: 16px;}
	.foot3 h3 span{    color: #ff8c00;}
	.foot3 h3:after { display: block; margin:0; height: 1px; content: " "; text-shadow: none; background-color: #fff; width:40px; margin-top: 6px;}
	.foot3 ul{font-family: 'Open Sans', sans-serif; width: 100%;    height: auto;    float: left; margin:0px; padding:0px; list-style:none;}
	.foot3 ul li{width:100%;    height: auto;    float: left; }
	.foot3 ul li .icon01{    float: left;    width: 24px;}
	.foot3 ul li .icon01 i{    font-size: 18px;    color: #ff8c00;}
	.foot3 ul li .icon01_detail{    padding-left: 26px;     color: rgba(255, 255, 255, 0.74);     font-size: 12px;    line-height: 18px;}
	.foot3 ul li .icon01_detail span{ color:#fff;}
	.copy_right{width:96%; height:auto; float:left;     padding:10px 10px 7px;    background-color: rgb(24, 60, 99);     color: rgba(255, 255, 255, 0.41);    font-size: 12px;}
	.left_copy{width:50%; height:auto; float:left; }
	.right_copy{width:50%; height:auto; float:left; text-align: right;}
	.right_copy a{  color:#337ab7;    text-decoration: underline;}
	.right_copy a:hover{    color: #fff;}

</style>
</head>
<body>
	<div class="main01">
    	<div class="logo"><img src="<?php echo base_url();?>assets/common/img/logo.png" /></div>
        <div class="content">
        	<h3>Dear <?php echo $name;?>,</h3>
					<p>Greeting from ProYourWay!</p>
					<p>Your inbox has received various opportunities for you from various business units.</p>
					<p>Here is the ultimate chance for you to grow and stand out from other professionals with the same expertise. Here is the <strong>list of projects that are awaiting your response</strong>. Grab the opportunity that knocked on your door & don’t let them wait for too long!</p>
					<p>Private or government business organisations (big or small) are out there looking for you and need your immediate response. With our P2B (Professional to Business) platform you can portray your skills set and present our clients with your exceptional provisions.</p>
					<p>Show them what you have in your pockets. Your talent is what they need and demand.</p>
					<p>Make yourself visible, act in response to the proposals and fixate your core expertise on the project!</p>
					<?php //echo '<pre>';print_r($projectList);?>
						<table>
							<tr>
								<th>Project posted by</th>
								<th>Project name</th>
							</tr>
							<?php foreach ($projectList as $value) { ?>
								<tr>
									<td><?php echo $value->quotationAdminName;?></td>
									<td><?php echo $value->project_name;?></td>
								</tr>
							<?php } ?>
						</table>
          <p>Regards<br />ProYourWay Team</p>
        </div>
        <div class="footer">
        	<div class="footer_left">
            	<img src="<?php echo base_url();?>assets/common/img/footer_logo.png" />
                <ul>
                     <li><a href="https://www.facebook.com/proyourway/" target="_blank"><img src="<?php echo base_url();?>assets/common/images/face.png"  alt="" /></a></li>
                     <li><a href="https://twitter.com/proyourway" target="_blank"><img src="<?php echo base_url();?>assets/common/images/twitter.png" alt="" /></a></li>
                     <li><a href="https://www.linkedin.com/company-beta/17951491/" target="_blank"><img src="<?php echo base_url();?>assets/common/images/linkdin.png" alt="" /></a></li>
                     <li><a href="https://plus.google.com/collection/g1rVmB" target="_blank"><img src="<?php echo base_url();?>assets/common/images/google.png" alt="" /></a></li>
                 </ul>
            </div>
            <div class="foot3">
                     <h3>Contact <span>us</span></h3>
                     <ul>
                        <li>
                            <div class="icon01"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="icon01_detail"><span>send us mail</span><br>services@proyourway.com</div>
                        </li>
                     </ul>
           </div>
        </div>
        <div class="copy_right">
        	<div class="left_copy">Copyrights © 2017 All Rights Reserved.</div>
            <div class="right_copy"><a href="<?php echo base_url();?>terms" target="_blank">Terms &amp; Conditions</a> I <a href="<?php echo base_url();?>privacy" target="_blank">Privacy Policy</a></div>
        </div>
    </div>
</body>
</html>
