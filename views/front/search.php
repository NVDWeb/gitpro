<title>Codeigniter Autocomplete</title>  
<style> 
.ui-menu {  
    list-style:none;  
    padding: 2px;  
    margin: 0;  
    display:block;  
}  
.ui-menu .ui-menu {  
    margin-top: -3px;  
}  
.ui-menu .ui-menu-item {  
    margin:0;  
    padding: 0;  
    zoom: 1;  
    float: left;  
    clear: left;  
    width: 100%;  
    font-size:80%;  
}  
.ui-menu .ui-menu-item a {  
    text-decoration:none;  
    display:block;  
    padding:.2em .4em;  
    line-height:1.5;  
    zoom:1;  
}  
.ui-menu .ui-menu-item a.ui-state-hover,  
.ui-menu .ui-menu-item a.ui-state-active {  
    font-weight: normal;  
    margin: -1px;  
}  
</style>  

        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <hr>
                                <h2 style="text-align: center;">Search</h2>
                                <hr>
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
                                <span style="color:red;"><?php echo validation_errors(); ?></span>
                                <?php 
                                 $attributes = array('style'=>'display:bolck;margin:auto','class'=>'form-inline','id' => 'demo-form2');

                                echo form_open_multipart($action,$attributes); ?>
                                <div class="form-group">
                                   <div class="col-md-3 col-sm-3 col-xs-3">
                                        <select class="form-control" id="location" name="location">
                                                <option>--Select Location--</option>
                                                <?php $i=0;
                                                foreach($locationList as $location){ ?>
                                                <option value="<?php echo $location->city_name;?>">
                                                <?php echo $location->city_name;?></option>
                                                <?php } $i++;?>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                   <div class="col-md-3 col-sm-3 col-xs-3">
                                        <select class="form-control" id="service" name="service">
                                                <option>--Select Treatment--</option>
                                                <?php $i=0;
                                                foreach($serviceList as $service){ ?>
                                                <option value="<?php echo $service->id;?>">
                                                <?php echo $service->service_name;?></option>
                                                <?php } $i++;?>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                      <input type="text" id="id" name="term" required="required" class="form-control col-md-7 col-xs-12" value="">
                                    </div>
                                </div>
                                 <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="submit" class="btn btn-success" value="<?php echo $submit_btn_value; ?>">
                      </div>
                    </div>

                    </form>
                    <br/>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       

<script type="text/javascript">  
        $(document).ready( function() {  
            $("#id").autocomplete({  
 
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "<?php echo base_url(); ?>search/getFunction",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                                console.log(data);
                            }  
                        },  
                    });  
                },  
                     
            });  
        });  
        </script>  

            