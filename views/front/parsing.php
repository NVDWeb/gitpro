<div class="contact_page">
        <div class="contact_brad1">
            <div class="container">
                <div class="contact_br">
                    <h3>Upload <span>Resume</span></h3>

                  </div>
              </div>
          </div>
      </div>
  <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

      <div class="contact_page01">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="contact_left">

            <?php if(validation_errors()){ ?>
              <div class="alert alert-danger" role="alert" style="font-family: verdana;"><?php echo validation_errors(); ?></div>
            <?php }?>

            <?php if($this->session->flashdata('success')){ ?>
              <div class="alert alert-success" role="alert" style="font-family: verdana;">

              <?php echo $this->session->flashdata('success'); ?>

            </div>
            <?php }?>


                          <form id="contact-form" method="post" action="<?php echo $action;?>" enctype="multipart/form-data">
                          <ul>
                            <li><input type="file" name="resume"  placeholder="Resume*" /></li>
                            <li><input type="submit" name="submit-form" value="<?php echo $submit_btn_value;?>"></li>
                          </ul>
                          </form>
                      </div>
                  </div>
                              </div>
          </div>
      </div>

  </div>
