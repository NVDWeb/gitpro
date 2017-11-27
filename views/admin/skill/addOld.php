  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- sidebar menu -->
            <?php //$this->load->view('admin/left-sidebar');?>
            <!-- /sidebar menu -->



        <!-- top navigation -->
        <?php $this->load->view('admin/top-navigation');?>
        <!-- /top navigation -->

        <div class="boday_main">
        	<div class="main_container01">
            	<!-- page content -->
        		<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title page_tit">
                    <h2>Skills Add</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div class="profile_form_update edu_update01"> 
                    <span style="color:red;"><?php echo validation_errors(); ?></span>
                      <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');

                    echo form_open_multipart($action,$attributes); ?> 
                    
                    <div class="field_wrapper"> 
                    
                    	<div class="row form-group">
                             <div class="col-md-3 col-sm-4 col-xs-12">
                             	<label class="" for="executiveSummary">Skill</label>
                                <input type="text" name="skills[]" value=""/>
                             </div>
                             <div class="col-md-3 col-sm-4 col-xs-12">
                             	<label class="" for="executiveSummary">Experience in Month</label>
                                <input type="text" name="experince[]" value=""/>
                             </div>
                             <div class="col-md-3 col-sm-4 col-xs-12">
                             	<label class="" for="executiveSummary">Last Used</label>
                                <input type="date" name="lastUsed[]" value=""/>
                             </div>
                             <div class="col-md-3 col-sm-4 col-xs-12">
                                <label class="" for="">&nbsp;</label>
                             	<a href="javascript:void(0);" class="add_button" title="Add field">Add More Skill</a>
                             </div>
                        </div>
                        
					</div>
                        
                        
                      
                      <div class="row form-group">
                        <div class="profo_edi_sub">
                          <input type="submit" class="" value="<?php echo $submit_btn_value; ?>">
                        </div>
                      </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
                </div>
              </div>
           </div>
       </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        $(function () {
            $(".numeric").on("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
               $(".errorNumeric").css("display", ret ? "none" : "inline");
                //setTimeout(function(){$('#err').html('');}, 4000);
                return ret;
            });
            $(".numeric").bind("paste", function (e) {
                return false;
            });
            $(".numeric").bind("drop", function (e) {
                return false;
            });
        });
        </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10;	
    var addButton = $('.add_button'); 
    var wrapper = $('.field_wrapper');
    var fieldHTML = 
	'<div class="aComment"><div class="row form-group"><div class="col-md-3 col-sm-3 col-xs-12"><label class="" for="executiveSummary">Skill</label><input type="text" name="skills[]" value="" /></div><div class="col-md-3 col-sm-3 col-xs-12"><label class="" for="executiveSummary">Experince</label><input type="text" name="experince[]" value="" /></div><div class="col-md-3 col-sm-3 col-xs-12"><label class="" for="executiveSummary">Last Used</label><input type="date" name="lastUsed[]" value="" /></div><div class="col-md-3 col-sm-3 col-xs-12"><label class="" for="">&nbsp;</label><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div></div></div>'; 
	
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        //$(this).parent('<div>').remove(); //Remove field html
		$(this).closest(".aComment").remove();
        x--; //Decrement field counter
    });
});
</script>