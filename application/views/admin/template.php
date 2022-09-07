<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title><?php echo $title; ?></title>
   <link rel="icon" href="<?php echo base_url(''); ?>UI/img/logo/title.png" type="image/x-icon">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <?php include 'css_ex.php' ?>
  
</head>
<SCRIPT language=Javascript>
  function isNumberKey(evt)
  {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

  return false;
  return true;
  }
  //-->
</SCRIPT>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <div class="preload-wrapper" id="loading">
   <div id="preloader_2">
       <span></span>
       <span></span>
       <span></span>
       <span></span>
   </div>
   </div>
  <?php include 'header.php'; ?>
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
    <?php include 'sidebar.php' ?>
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <?php include 'page_header.php' ?>
            <?php include $content; ?>
            <div id="modal_crud"></div>
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <?php include 'footer.php' ?>
   <!-- END FOOTER -->
   <?php include 'js_ex.php' ?>
   <script type="text/javascript">
      $(window).load(function() { $("#loading").delay(1000).fadeOut("slow"); })
       $("#selCSI").chosen({no_results_text: "Oops, nothing found!"}); 
       $("#selCSI2").chosen({no_results_text: "Oops, nothing found!"}); 
   </script>
</body>
<!-- END BODY -->
</html>