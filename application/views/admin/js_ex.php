 <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url('') ?>UI/js/jquery-1.8.3.min.js"></script>

   <script src="<?php echo base_url('') ?>UI/js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo base_url('') ?>UI/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url('') ?>UI/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="<?php echo base_url('') ?>UI/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="<?php echo base_url('') ?>UI/assets/bootstrap/js/bootstrap.min.js"></script>
	
	<script src="<?php echo base_url('') ?>/UI/js/jquery.blockui.js"></script>
	<script type="text/javascript" src="<?php echo base_url('') ?>/UI/assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('') ?>/UI/assets/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url('') ?>/UI/assets/data-tables/DT_bootstrap.js"></script>
	<script src="<?php echo base_url('') ?>/UI/js/dynamic-table.js"></script>
	
   <script src="<?php echo base_url('') ?>UI/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script><?php echo base_url('') ?>UI/
   <script src="<?php echo base_url('') ?>UI/js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="<?php echo base_url('') ?>UI/assets/chart-master/Chart.js"></script>
   <script src="<?php echo base_url('') ?>UI/js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="<?php echo base_url('') ?>UI/js/common-scripts.js"></script>
   <script src="<?php echo base_url(''); ?>UI/sweet/sweetalert2.js"></script>
   <!-- <script src="<?php echo base_url(''); ?>UI/js/form-component.js"></script> -->
   <script type="text/javascript" src="<?php echo base_url(''); ?>UI/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	


   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap/js/bootstrap-fileupload.js"></script>
   
   <script src="<?php echo base_url() ?>UI/js/jQuery.dualListBox-1.3.js" language="javascript" type="text/javascript"></script>

   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>UI/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="<?php echo base_url() ?>UI/assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="<?php echo base_url() ?>UI/js/jquery.scrollTo.min.js"></script>


   <script>
      function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
 
          return false;
        return true;
      }
   </script>
	<script>
      $(function() {
         $.configureBoxes();
      });

		$(document).ready(function(){
		    $('#myTable').DataTable();
		});
	</script>
   <!-- END JAVASCRIPTS -->   
