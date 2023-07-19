<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/admin/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin/assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/admin/assets/css/my_style.css">
    <link rel="icon" type="image/png" href="/admin/assets/img/crud_logo.png" />
</head>


<body class="hold-transition sidebar-mini layout-fixed">
   
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link"  style="text-decoration:none;">
                <img src="/admin/assets/img/crud_logo.png" alt="CI4 CRUD Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Form Builder</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <?= $this->include('admin/cmps/nav') ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
      
        <div class="content-header" style="padding: 30px;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-size: 30px; font-weight: bolder;color:floralwhite; "> <i class="fas fa-paper-plane" style="color:floralwhite;"></i>  <?= @$title ?></h1>
                    </div>
                </div>
            </div>
        </div>
    
        <section class="content">
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer" style="background-color:floralwhite;">
            <strong>Copyright &copy; 2023 CSC1106 Group 7 🤑</strong>
            <audio id="myAudio" src="/admin/assets/rowing-boat-rowboat-01.mp3"></audio>
<button onclick="document.getElementById('myAudio').play()">Play</button>
        </footer>

    </div>

    <!-- Back to Top -->
    <a id="scrollbtn"><i class="fa fa-angle-up icon-top"></i></a>

    ./wrapper

    <!-- jQuery -->
    <script src="/admin/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- ChartJS -->
    <script src="/admin/assets/plugins/chart.js/Chart.min.js"></script>

    <!-- Sparkline -->
    <script src="/admin/assets/plugins/sparklines/sparkline.js"></script>

    <!-- JQVMap -->
    <script src="/admin/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <!-- jQuery Knob Chart -->
    <script src="/admin/assets/plugins/jquery-knob/jquery.knob.min.js"></script>

    <!-- daterangepicker -->
    <script src="/admin/assets/plugins/moment/moment.min.js"></script>
    <script src="/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Summernote -->
    <script src="/admin/assets/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- overlayScrollbars -->
    <script src="/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- Bootstrap Dropdown (Included in bootstrap.bundle.min.js) -->

    <!-- AdminLTE App -->
    <script src="/admin/assets/js/adminlte.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/admin/assets/js/pages/dashboard.js"></script>
    <script  src="/admin/assets/js/myscript.js"></script>
</body>
</html>
