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
                                <div class="col-sm-12">
                                    <div class="left col-xs-7">
                                      <h2><?php echo $recomteam->first_name;?></h2>
                                    </div>                            
                                 </div>
                                 
                              <?php     
                              //echo '<pre>';print_r($recommendations);die;             
                              foreach ($recommendations as $row) {?>
                                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="well profile_view">
                                <div class="col-sm-12">
                                    <div class="left col-xs-7">
                                    Team Name: <h2><?php echo $row->team_name;?></h2>                           
                                    </div>                            
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-6 col-sm-6 emphasis">
                                        <a href="<?php echo base_url();?>admin/team/viewteam/<?php echo $row->id;?>"><button>View Team</button></a>
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
      url:'<?php echo base_url();?>admin/recomteam/ajax_more',
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
