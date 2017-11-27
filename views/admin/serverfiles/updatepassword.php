<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php echo validation_errors(); ?>

            <form id="demo-form2" method="post" action="<?php echo $action;?>" class="form-horizontal form-label-left">
              <h1>Update Password</h1>

              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                <input type="password" name="password" class="form-control has-feedback-left" id="inputSuccess4" placeholder="New Password*" value=""/>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"/>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                <input type="password" name="cpassword" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Confirm Password*" value=""/>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"/>
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Update"/>
              </div>

              <div class="clearfix"></div>

            </form>
          </section>
        </div>


      </div>
    </div>


  </body>
</html>
