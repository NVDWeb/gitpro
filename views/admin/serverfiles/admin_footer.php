<!-- footer content -->
<script type="text/javascript">
var specialKeys = new Array();
specialKeys.push(8); //Backspace
$(function () {
  $(".numeric").on("keypress", function (e) {
      var keyCode = e.which ? e.which : e.keyCode
      var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
     $(".errorNumeric").css("display", ret ? "none" : "inline");
      return ret;
  });
  $(".numeric").bind("paste", function (e) {
      return false;
  });
  $(".numeric").bind("drop", function (e) {
      return false;
  });
});
  function showShareUpdate(team_id,member_id){
    //alert(member_id);
      $("#shareUpdate_"+member_id).html('<input type="number" id="share" name="share" class="tet"> <button onclick="updateShareForMember('+team_id+','+member_id+');">Update</button>')
  }
  function updateShareForMember(team_id,member_id){
    var share = $("#share").val();
    //alert(team_id);
    if(share){
      $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>admin/team/updateShareForMember",
        data:{team_id:team_id,member_id:member_id,share:share},
        success:function(res){
          if(res=1){
            $("#s_"+member_id).html(share);
            $("#shareUpdate_"+member_id).html('updated');
          }

        }
      });
    }
  }

</script>
        <footer>
          <div class="copy_foot">
            Copyright © 2016 NVD All Rights Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  </footer>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>admin-assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>admin-assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>admin-assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url();?>admin-assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url();?>admin-assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>admin-assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>admin-assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url();?>admin-assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url();?>admin-assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url();?>admin-assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url();?>admin-assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url();?>admin-assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>admin-assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>


    <!-- Datatables -->
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>admin-assets/build/js/custom.min.js"></script>

    <script src="<?php echo base_url();?>admin-assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>admin-assets/js/waypoints-sticky.min.js"></script>
    <script>
        function makeSticky() {
            var myWindow = $( window ),
                myHeader = $( ".site-header" );

            myWindow.scroll( function() {
                if ( myWindow.scrollTop() == 0 ) {
                    myHeader.removeClass( "sticky-nav" );
                } else {
                    myHeader.addClass( "sticky-nav" );
                }
            } );
        }

        $( function() {
            // makeSticky();
             
            $( ".site-header" ).waypoint( 'sticky' );
        } );
    </script>
<?php //echo '<pre>';print_r($this->session->userdata());?>

<script>
 var chat_name = '<?php echo $this->session->userdata('fname');?>';
 var chat_id = '<?php echo $this->session->userdata('adminId');?>';
 var chat_avatar = 'LOGGEDIN_PROFILE_IMAGE';
 var chat_link = '<?php echo base_url();?>admin/professional/index/<?php echo $this->session->userdata('adminId');?>';
 var chat_user_type = '<?php echo $this->session->userdata('admin_user_type');?>';
</script>

 <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>cometchat/js.php?"></script><link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>cometchat/css.php?" />
 
    </body>
</html>
