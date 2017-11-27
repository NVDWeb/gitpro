<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php echo validation_errors(); ?>
            <form id="demo-form2" method="post" action="<?php echo $action;?>" class="form-horizontal form-label-left">
              <h1>Login Form</h1>
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
<input type="text" name="username" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="<?php echo $username;?>"/>
<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"/>
</div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
<input type="password" name="password" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Password" value="<?php echo $password;?>"/>
<span class="fa fa-user form-control-feedback left" aria-hidden="true"/>
</div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Log in"/>
                <a class="reset_pass" href="#signup">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="<?php echo $action;?>">
              <h1>Forget Password</h1>
              
             <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
<input type="text" name="username" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="<?php echo $username;?>"/>
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
  </body>
</html>