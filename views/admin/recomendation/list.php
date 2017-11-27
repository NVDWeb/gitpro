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
                  <div class="x_title">
                    <h2>Recommendations</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="tutorial_list">
                      <?php 
                      if(count($recommendations) > 0){ 
                      foreach ($recommendations as $row) {  ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-xs-7">
                              <h2><?php echo $row->first_name;?></h2>
                              <p><strong>About: </strong><?php echo @$row->title;?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php  if(isset($row->country_name)) {
                                  echo $row->country_name; } echo ','; if(isset($row->state_name)) {
                                  echo $row->state_name; } echo ','; if(isset($row->city_name)) {
                                  echo $row->city_name; } ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <?php if($row->picture ) { ?>
                            <img class="img-circle img-responsive" src="<?php echo $row->picture ;?>" alt="Avatar">
                          <?php } else if($row->businessLogo!='' ) { ?>
                            <img class="img-circle img-responsive" src="<?php echo base_url();?>uploads/business/<?php echo $row->businessLogo ;?>" alt="Avatar">
                          <?php }else { ?>
                          <img class="img-circle img-responsive" src="<?php echo base_url();?>admin-assets/images/img.jpg" alt="Avatar">                      
                            <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                          <?php } ?>
                            </div>
                         </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-6 col-sm-6 emphasis">
                              <p class="ratings">
                               <?php
                              if(isset($row->rating)){ ?>
                                  <a><?php echo $row->rating;?>/5</a>
                                    <?php for($i=1 ; $i<=$row->rating; $i++){
                                      $selected = "-o";
                                      if(!empty($row->rating) && $i<=$row->rating) {
                                      $selected = "";
                                    } ?>
                                  <a href="#"><span class="fa fa-star<?php echo $selected;?>"></span></a>
                                  <?php }
                                  $relC = 5-$row->rating;
                                  for($k=1; $k<=$relC; $k++){
                                    echo '  <a href="#"><span class="fa fa-star-o"></span></a>';
                                  }?>
                            <?php } else{ ?>
                              <a>0/5</a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                              <a href="#"><span class="fa fa-star-o"></span></a>
                            <?php }?>
                              </p>
                            </div>
                            <div class="col-xs-6 col-sm-6 emphasis">
                              <p class="checkbox">
							  <a href="<?php echo base_url();?>admin/team/professional/<?php echo $row->id;?>" class="btn btn-primary"><i class="fa fa-user"> </i> View Profile</a>
                              <button class="btn btn-primary" id="user_<?php echo $row->id;?>" onClick="sendRequest('<?php echo $row->id;?>','<?php echo $this->session->userdata('teamSelected');?>','<?php echo $row->email;?>')">Connect</button>
                              </p>
                            </div>
                                                  
                          </div>
                        </div>
                      </div>
                   
                        
                      <?php } ?>

                      <div class="row" align="center">
                        <div class="col-md-12">

                      <div class="show_more_main" id="show_more_main<?php echo $row->id; ?>">
                         <span id="<?php echo $row->id; ?>" class="show_more btn btn-success" title="More Recommendation">Load more</span>
                        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
                      </div>
                       </div>
                    </div>
                      <?php } ?>
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
          </div>
        </div>
        <!-- /page content -->

 <!--delete services script-->
<script type="text/javascript">

$(document).ready(function(){
  $(document).on('click','.show_more',function(){
    var ID = $(this).attr('id');
    $('.show_more').hide();
    $('.loding').show();
    $.ajax({
      type:'POST',
      url:'<?php echo base_url();?>admin/recomendation/ajax_more',
      data:'id='+ID,
      success:function(html){
        $('#show_more_main'+ID).remove();
        $('.tutorial_list').append(html);
      }
    });
    
  });

  

});

function sendRequest(id,team_id,email){
    if(team_id && email){
      $.ajax({
        type:"POST",
        url :"<?php echo base_url();?>admin/recomendation/sendRequest",
        data:{team_id:team_id,email:email},
        success:function(response){
          $("#user_"+id).html(response);
        }
      });
    }
}
</script>
