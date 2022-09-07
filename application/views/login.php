
<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
       <link rel="icon" href="<?php echo base_url(''); ?>UI/img/logo/title.png" type="image/x-icon">
    <!-- Open Sans font from Google CDN -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css"> -->

    <link href="<?php echo base_url('assets_login/stylesheets/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets_login/stylesheets/landerapp.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php  echo base_url('assets_login/stylesheets/pages.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets_login/stylesheets/rtl.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets_login/stylesheets/themes.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(''); ?>UI/sweet/sweetalert2.css" rel="stylesheet" />
    <!--[if lt IE 9]>
        <script src="assets_login/javascripts/ie.min.js"></script>
    <![endif]-->


<!-- $DEMO =========================================================================================

    Remove this section on production
-->
    <style>
        #signin-demo {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 10000;
            background: rgba(0,0,0,.6);
            padding: 6px;
            border-radius: 3px;
        }
        #signin-demo img { cursor: pointer; height: 40px; }
        #signin-demo img:hover { opacity: .5; }
        #signin-demo div {
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding-bottom: 6px;
        }
        #imglogo{
            margin-left: -13pt;
        }
    </style>
<!-- / $DEMO -->

</head>


<!-- 1. $BODY ======================================================================================

    Body

    Classes:
    * 'theme-{THEME NAME}'
    * 'right-to-left'     - Sets text direction to right-to-left
-->
<body class="theme-default page-signin">
<script>
    var init = [];
</script>
<script src="<?php echo base_url('assets_login/demo/demo.js') ?>"></script>
  <!-- Demo script -->  <!-- / Demo script -->
    <!-- Page background -->
    <div id="page-signin-bg">
        <!-- Background overlay -->
        <div class="overlay"></div>
        <!-- Replace this with your bg image -->
        <!-- background -->
        <img  src="<?php echo base_url('UI/img/logo/') ?>" alt="">
    </div>
    <!-- / Page background -->

    <!-- Container -->
    <div class="signin-container">
        <!-- Left side -->
        <div class="signin-info">
            <center> <img src="<?php echo base_url('UI/img/logo/donwload.png') ?>" id="imglogo" width="100%">
            </center>
            <a href="<?php echo site_url('C_login') ?>" class="logo">
                haris <span style="font-weight:100;"></span>
            </a> <!-- / .logo -->
            <div class="slogan">
                <?php echo get_apl('nama_sistem'); ?>
            </div> <!-- / .slogan -->

        </div>

        <div class="signin-form">

            <form action="<?php echo site_url('C_login/cek');?>" method="POST">
                <div class="signin-text">
                    <span>Log In</span>
                </div> <!-- / .signin-text -->
                <?=
                    alert()
                ?>
                <div class="form-group w-icon">
                    <input type="text" name="username" autofocus id="username_id" class="form-control input-lg" placeholder="masukkan username" required autocomplete="off">
                    <span class="fa fa-user signin-form-icon"></span>
                </div> <!-- / Username -->

                <div class="form-group w-icon">
                    <input type="password" name="password" id="password_id" class="form-control input-lg" placeholder="masukkan password" required autocomplete="off">
                    <span class="fa fa-lock signin-form-icon"></span>
                </div> <!-- / Password -->
                <br><br><br>
                <div class="col-md-2 col-md-offset-3">
                    <div class="form-actions">
                        <input type="submit" value="LOG IN" class="signin-btn bg-primary" style="margin-left: 6pt;">
                    </div>
                </div>

            </form>
            <!-- / Form -->
        </div>
        <!-- Right side -->
    </div>
<script type="text/javascript"> window.jQuery || document.write('<script src="assets_login/javascripts/jquery.min.js">'+"<"+"/script>"); </script>
<script src="assets_login/javascripts/bootstrap.min.js"></script>
<script src="assets_login/javascripts/landerapp.min.js"></script>
<script src="<?php echo base_url(''); ?>UI/sweet/sweetalert2.js"></script>
<script type="text/javascript">

    // Resize BG
    init.push(function () {
        $("#signup-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });

        // Validate name
        $("#name_id").rules("add", {
            required: true,
            minlength: 1
        });

        // Validate email
        $("#email_id").rules("add", {
            required: true,
            email: true
        });

        // Validate username
        $("#username_id").rules("add", {
            required: true,
            minlength: 3
        });

        // Validate password
        $("#password_id").rules("add", {
            required: true,
            minlength: 6
        });

        // Validate confirm checkbox
        $("#confirm_id").rules("add", {
            required: true
        });
    });

    window.LanderApp.start(init);
</script>

</body>
</html>
