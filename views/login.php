<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="signupN"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <span style="color: red;"><?php echo validation_errors(); ?></span>
          <a href="<?php echo base_url();?>">
          <img src="<?php echo base_url();?>assets/images/logo.png"/></a>
            <form id="demo-form2" method="post" action="<?php echo $action;?>" class="form-horizontal form-label-left">
              <h1>Login Form</h1>
              <input type="hidden" name="<?php echo $token_id;?>" value="<?php echo $token_value;?>">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <select name="role" class="form-control" >
                <option value="3">Business User</option>
                <option value="2">Professional User</option>
              </select>
            </div> -->

              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
<input type="text" name="<?php echo $form_names['username'];?>" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="<?php echo $username;?>"/>
<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"/>
</div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
<input type="password" name="<?php echo $form_names['password'];?>" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Password" value="<?php echo $password;?>"/>
<span class="fa fa-circle form-control-feedback left" aria-hidden="true"/>
</div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Log in"/>
                <a class="reset_pass" href="#signup">Lost your password?</a>
              </div>

              <div class="clearfix"></div>
              <p class="change_link">New to site? <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Create Account</a>

              </p>
              <hr>
              <div class="clearfix"></div>
              <p class="change_link">
                <?php
        if(!empty($authUrl)){

        echo '<a href="'.$authUrl.'"><img class="resource-paragraph-image lazy-load lazy-load-src" alt="Sign in with LinkedIn" src="https://content.linkedin.com/content/dam/developer/global/en_US/site/img/signin-button.png" pagespeed_url_hash="1811720327"></a>';
        //echo '<div class="linkedin_btn"><a href="'.$authUrl.'">login with linkedin</a></div>';
        }
        ?>
              </p>



              <div class="clearfix"></div>
              <br />
            </form>
          </section>
        </div>

        <div id="signupN" class="animate form registration_form">

          <section class="login_content">
            <img src="<?php echo base_url();?>assets/images/logo.png"/>

            <form action="<?php echo base_url();?>login/forgetpassword" method="post">
              <h1>Sign Up</h1>

             <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <input type="text" name="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="" required />
              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"/>
            </div>

              <div>
                <input type="submit" name="forget" class="btn btn-default submit" value="Submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>
        <div id="register" class="animate form registration_form">

          <section class="login_content">
            <img src="<?php echo base_url();?>assets/images/logo.png"/>

            <form action="<?php echo base_url();?>login/forgetpassword" method="post">
                <h1>Reset Password</h1>
            <!--  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <select name="role" class="form-control" >
                <option value="3">Business User</option>
                <option value="2">Professional User</option>
              </select>
            </div> -->

             <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
<input type="text" name="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="" required />

<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"/>

</div>

              <div>
                <input type="submit" name="forget" class="btn btn-default submit" value="Submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_registers"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />
              <!-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>

        </div>
    </div>

    <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Choose Your Registration</h4>
            </div>
            <div class="modal-body">
              <table style="margin-left:100px">
                <tr>
                  <td><a href="<?php echo base_url();?>register" class="btn btn-primary">Register as Business</a></td>
                  <td><a href="<?php echo base_url();?>form" class="btn btn-primary">Register as Professional</a></td>
                </tr>
              </table>
              <!-- <a href="<?php echo base_url();?>register" class="btn btn-primary"> Register as Business</a> <br/> <a href="<?php echo base_url();?>form" class="btn btn-primary">Register as Professional</a> -->
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

    </div>



<script src="<?php echo base_url();?>admin-assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>


  </body>
</html>
