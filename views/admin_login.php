<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php echo validation_errors(); ?>
          <?php //print_r($form_names);?>
          <img src="<?php echo base_url();?>assets/images/logo.png"/>
            <form id="demo-form2" method="post" action="<?php echo $action;?>" class="form-horizontal form-label-left">
              <h1>Login Form</h1>
              <input type="hidden" name="role" value="1">
               <input type="hidden" name="<?php echo $token_id;?>" value="<?php echo $token_value;?>">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              
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

            </form>
          </section>
        </div>

        
      </div>
    </div>


  </body>
</html>