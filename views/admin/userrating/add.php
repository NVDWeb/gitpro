  <style>
/****** Rating Starts *****/
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating {
                border: none;
                float: left;
            }

            .rating > input { display: none; }
            .rating > label:before {
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before {
                content: "\f089";
                position: absolute;
            }

            .rating > label {
                color: #ddd;
                float: right;
            }

            .rating > input:checked ~ label,
            .rating:not(:checked) > label:hover,
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover,
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label,
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

            .demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
            .demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
            .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
            .demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
            .demo-table ul{margin:0;padding:0;}
            .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
            .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}

</style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">          
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
                            <h2><?php if($getRatingById){ echo 'Proyourway Experience'; } else { echo 'Add Proyourway Experience';} ?></h2>
                            <div class="clearfix"></div>
                          </div>                         
                          <div class="x_content">
                          <span style="color:red;"><?php echo validation_errors(); ?></span>
                          <div class="profile_form_update edu_update01">
                            <?php $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                            		echo form_open_multipart($action,$attributes); ?>       
                          
							<input type="hidden" name="userId" id="userId" value="<?php echo $this->session->userdata('adminId');?>"/>
                            <div class="row form-group">
                            	<div class="col-md-12">                            
                                    <label for="first-name">Review (Out Of 10):*</label>
                                    <input type="text" id="rating" name="rating" value="<?php echo $ratings;?>">
                            	</div>
                            </div>
                            
                            <div class="row form-group">
                            	<div class="col-md-12">    
                                    <label for="first-name">Review Text</label>
                                    <textarea id="reviewtext" name="reviewtext" class=""><?php echo $reviewtext;?></textarea>
                            	</div>
                            </div>                           
                           
                             <div class="form-group" id="submitButtonId">
                        	<div class="profo_edi_sub">
                          <input type="submit" class="" name="btnrating" id="btnrating" value="<?php echo $submit_btn_value; ?>">
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
        </div>
        <!-- /page content -->   
        