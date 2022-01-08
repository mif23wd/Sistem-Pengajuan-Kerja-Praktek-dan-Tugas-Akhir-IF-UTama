<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/Utama.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/Utama.png" sizes="32x32">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(); ?>admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url(); ?>asset/Utama-W.png" width="50%" height="50%"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url(); ?>asset/Utama-W.png" width="10%" height="10%"><b>  Pusat Data</b> Prodi</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?php if ($this->session->userdata('foto')!=''){ ?>
              <img src="<?php echo base_url().'files/user/'.$this->session->userdata('foto'); ?>" width="32%" height="32%" class="user-image" alt="User Image"> 
              <?php }else{ ?>
              <img src="<?php echo base_url(); ?>asset/Utama-W.png" width="32%" height="32%" class="user-image" alt="User Image">
              <?php } ?>
              
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_user'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php if ($this->session->userdata('foto')!=''){ ?>
                <img src="<?php echo base_url().'files/user/'.$this->session->userdata('foto'); ?>" width="32%" height="32%" class="img-circle" alt="User Image">  
                <?php }else{ ?>
                <img src="<?php echo base_url(); ?>asset/Utama-W.png" width="32%" height="32%" class="img-circle" alt="User Image">
                <?php } ?>
                <p>
                  <?php echo $this->session->userdata('nama_user'); ?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url().'c_front/logout'?>" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php if (isset($active_home)) {echo $active_home;} ?>"><a href="<?php echo base_url(); ?>prodi"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="treeview <?php if (isset($active_list_peng)) {echo $active_list_peng;} ?>">
          <a href="#"><i class="fa fa-pencil"></i> <span>List Pengajuan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($active_kp)) {echo $active_kp;} ?>"><a href="<?php echo base_url(); ?>prodi/listpengajuankp"><i class="fa fa-pencil"></i> <span>Kerja Praktek</span></a></li>
            <li class="<?php if (isset($active_ta)) {echo $active_ta;} ?>"><a href="<?php echo base_url(); ?>prodi/listpengajuanta"><i class="fa fa-pencil"></i> <span>Tugas Akhir</span></a></li>
          </ul>
        </li>
        <li class="treeview <?php if (isset($active_list_takp)) {echo $active_list_takp;} ?>">
          <a href="#"><i class="fa fa-book"></i> <span>List KP dan TA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($active_kp)) {echo $active_kp;} ?>"><a href="<?php echo base_url(); ?>prodi/listkp"><i class="fa fa-book"></i> <span>Kerja Praktek</span></a></li>
            <li class="<?php if (isset($active_ta)) {echo $active_ta;} ?>"><a href="<?php echo base_url(); ?>prodi/listta"><i class="fa fa-book"></i> <span>Tugas Akhir</span></a></li>
          </ul>
        </li>
        <li class="<?php if (isset($active_ddosen)) {echo $active_ddosen;} ?>"><a href="<?php echo base_url(); ?>prodi/datadosen"><i class="fa fa-industry"></i> <span>Data Dosen</span></a></li>
        <li class="<?php if (isset($active_setting)) {echo $active_setting;} ?>"><a href="<?php echo base_url(); ?>prodi/setting"><i class="fa fa-wrench"></i> <span>Setting</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
