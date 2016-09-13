<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('adminstrator.title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/flat/blue.css'); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker-bs3.css'); ?>">



    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>



    <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/ckeditor/plugins/uploadimage/plugin.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/clipboard.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/ngclipboard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/underscore-min.js'); ?>"></script>

    <script>
        site_url = "<?php echo site_url(); ?>";
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini" ng-app="myApp">
    <div class="wrapper">
      <header class="main-header">
        <?php include('_header.php'); ?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <?php include('_menu.php'); ?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header)
        <section class="content-header">
            <?php //include('_content_header.php'); ?>
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div class="loading" style="display:none">
                <img class="loading-image" src="<?php echo base_url('assets/img/loading.gif'); ?>" alt="Loading..." />
            </div>
            <?php echo $contents;?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <?php include('_footer.php'); ?>
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->


    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/plugins/knob/jquery.knob.js'); ?>"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>"></script>


    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?php echo base_url('assets/js/pages/dashboard.js'); ?>"></script> -->

    <script src="<?php echo base_url('assets/js/bootstrap-show-password.min.js'); ?>"></script>

    <script>
        $(document).ready(function(){

            $('tr[data-href]').on("click", function() {
                document.location = $(this).data('href');
            });

            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('.datepicker-today').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            }).datepicker("setDate", new Date());

        });
    </script>

  </body>
</html>
