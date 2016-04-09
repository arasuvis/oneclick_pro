<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>OneClick Admin</title>
      <link rel="icon" href="<?php echo base_url(); ?>img/oneclick.jpg" type="image/jpg">
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.5 -->
      <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
   	  <link href="<?php echo base_url();?>css/dataTables.bootstrap.css" rel="stylesheet">
	    <link href="<?php echo base_url();?>css/AdminLTE.min.css" rel="stylesheet">
	    <link href="<?php echo base_url();?>css/_all-skins.min.css" rel="stylesheet">
    
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini">
    
      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">                  
                    <span class="hidden-xs"><?php echo $this->session->userdata['is_logged_in']['email_address']; ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="<?php echo base_url(); ?>img/avatar5.png" class="img-circle" alt="User Image">
                     
                    </li>
                 
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">   
                      </div>
                        <div class="pull-right">
                          <a href="<?php echo base_url(); ?>admin/admin/logout" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                  </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
                </li>
              </ul>
            </div>
          </nav>
        </header>
