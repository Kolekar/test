     
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2016-2017 <a href="#" class="text-yellow">Soulmate Matrimony</a>.</strong> All rights reserved.
      </footer>

      	<script>
	
	base_url = "<?php echo base_url(); ?>";
	config_url = "<?php echo base_url(); ?>";
	</script>
    <!-- jQuery 2.1.4 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
	<!--<script src="<?php //echo base_url(); ?>assets/js/app.min.js"></script>-->
	 <script src="<?php echo base_url(); ?>assets/js/sortables.js"></script>
	  <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/app-test.js"></script>
    
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pace.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
    
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/TableTools.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
   <!--  <script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.highchartTable-min.js"></script> -->

	
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
	
	
	<!-- plugin for gallery image view Ragu -->
   <script src="<?php echo base_url();?>assets/js/jquery.colorbox-min.js"></script>
   <!-- application script for Charisma demo Ragu -->
   <script src="<?php echo base_url();?>assets/js/charisma.js"></script>
   <script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
	
    <!-- FastClick 
    <script src="../../plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/custom-script.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/custom-script-popup.js"></script>
	
	
	 <script src="<?php echo base_url(); ?>assets/js/jquery.raty.min.js"></script>
	
	<!--time picker-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
	<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	<!--[validation js]-->
	 <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/parsley.min.js"></script>
    <!--[validation js]-->
	<script>
	 $(function () {
	   $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	<!--time picker-->
<!--Cancellation Time Picker-->	
	<script>
	 $(function () {
	   $("#timepicker_cancellation").timepicker({
          showInputs: false,
		  //defaultTime: false,
		  showMeridian: false,
		 /* $('#timepicker_cancellation').timepicker({
                minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                //showSeconds: false,
                //showMeridian: false,
                defaultTime: false
            });*/
		  
		  
		  
		  
		  
        });
 });
    </script>
	
	<!--Date picker-->
	<script>
	 $(function () {
    $('#datepicker').datepicker({
      autoclose: true
    });
	});
    </script>
	<script>
	 $(function () {
    $('#datepicker1').datepicker({
      autoclose: true
    });
	});
    </script>
<!--time picker-->

    
    <!-- CK Editor -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
		
		$('.datatable').DataTable({
			"ordering" : $(this).data("ordering"),
			"order": [[ 0, "desc" ]]
      });

    $('.datatable1').DataTable({
      "ordering" : $(this).data("ordering"),
      "order": [[ 0, "desc" ]],
      "sDom": 'T<"clear">lfrtip',
      "oTableTools": {
            "sSwfPath": "../../assets/swf/copy_csv_xls_pdf.swf"
        }
      });

     //$('table.highchart').highchartTable();

		
	  });
	</script>
	
	
	 <script>
 
//Multi Select Box 				   
$(document).ready(function() {			
				 
$(".js-example-basic-multiple").select2();   
				   
});
</script>
<script type="text/javascript">
    /*tinymce.init({
         selector: "textarea",
   
  height: 230,
  plugins: 'link image code',
  relative_urls: false,
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]

    });*/
</script>
  
   <script>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
     if(job!=true)
    {
        return false;
    }
}

function doapprove()
{
    job=confirm("Are you sure ?");
     if(job!=true)
    {
        return false;
    }
}


  /**time for alert messages**/
  $(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(300, function(){
        $(this).remove();
    });
}, 2000);
});
</script>
        </body>
</html>
