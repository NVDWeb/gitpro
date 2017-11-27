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
                    <h2>Sub Categories</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?php echo base_url();?>admin/subcategory/add"> <i class="fa fa-plus-circle"></i> Add Sub Category</a></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="errorMsg" style="color:red"></div>
                    <div id="successMsg" style="color:green"></div>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Category Name</th>
                          <th>Parent Category Name</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>


                      <tbody>
                       
                          <?php foreach ($categories as $row) {
                           // print_r($row);
                          echo '<tr><td>'.$row->category_name.'</td>';
                           echo '<td>'.$row->parent_cat.'</td>';
                          echo '<td><a href="'.base_url().'admin/subcategory/edit/'.$row->id.'"><i class="fa fa-edit"></i></a> | <a href="javascript:void(0);" class="delete" id="delete_'.$row->id.'" data-id="'.$row->id.'" >Delete</a></td></tr>';
                        } ?>
                          
                        
                        
                      </tbody>
                    </table>
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
// Ajax post
$(document).ready(function() {
  $(".delete").click(function() {
    event.preventDefault();
    var deleteid = $(this).data('id');
    var parent = $(this).parent("td").parent("tr");
    jQuery.ajax({
      type: "POST",
      url: "<?php echo base_url();?>admin/category/deleteCategory",
      data: {category_id: deleteid},
      success: function(data) {
        if (data=='success'){
           parent.fadeOut('slow');
           $("#successMsg").html('Deleted.');
          setTimeout(function(){$('#successMsg').hide()}, 4000);
        }else{
          $("#errorMsg").html('Some error to delete Clinic.');
          setTimeout(function(){$('#errorMsg').hide()}, 4000);
          
        }
      }
    });
  });
});
</script>      