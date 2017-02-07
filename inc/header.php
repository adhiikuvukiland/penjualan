<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Toko ABC</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../../assets/bootstrap/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../assets/bootstrap/font-awesome/css/font-awesome.min.css">
	<!--Datetime Picker-->	
	<link rel='stylesheet' type='text/css' media='all' href='../assets/dist/calendar/calendar-system.css' title='system' />
	<script src="../assets/dist/calendar/datetimepicker.js"></script>
	<script type='text/javascript' src='../../assets/dist/calendar/calendar.js'></script>
	<script type='text/javascript' src='../../assets/dist/calendar/calendar-id.js'></script>
	<script type='text/javascript' src='../../assets/dist/calendar/calendar-setup.js'></script>
	<!-- Datatables -->
	<link rel="stylesheet" href="../../assets/plugins/datatables/dataTables.bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../../assets/plugins/iCheck/all.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="../../assets/plugins/select2/select2.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="../../assets/plugins/iCheck/square/blue.css">
	<!-- Validation -->
	<link rel="stylesheet" href="../../assets/formvalidation/formValidation.css">
	<link rel="stylesheet" href="../../assets/formvalidation/validation.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="../../assets/dist/css/skins/skin-purple.min.css">
	<link rel="stylesheet" href="../../assets/sweetalert/sweetalert.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="../../assets/bootstrap/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="../../assets/bootstrap/html5shiv/3.7.3/resp ond.min.js"></script>
	<![endif]-->
	
<body class="hold-transition skin-black fixed sidebar-mini">
<div class="wrapper">
  <!--sidebar-collapse-->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>BC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Toko </b>ABC</span>
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
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu dropdown-toggle" data-toggle="dropdown">
            <a href="#">
              <img src="../../assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" onclick="logout();"><i class="fa fa-power-off"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
		  <li class="treeview">
							<?php
							if (isset($class0)){
								echo $class0;
							}else {
								echo "";
							}
							?>
							  <a href="maste.php">
								  <i class="fa fa-user"></i> <span>Dashboard</span> <i class="fa pull-right"></i>
							  </a>
							</li>
							<li class="treeview">
							<?php
							if (isset($class1)){
								echo $class1;
							}else {
								echo "";
							}
							?>
							  <a href="sales.php">
								  <i class="ion ion-ios-cart-outline"></i> <span>Sales</span> <i class="fa pull-right"></i>
							  </a>
							</li>
							<li class="treeview">
							<?php
								if (isset($class2)){
								echo $class2;
								}else {
								echo "";
								}
							?>
							<?php
								if (isset($class3)){
								echo $class3;
								}else {
								echo "";
								}
							?>
								  <a href="#">
									  <i class="fa fa-th"></i> <span>Master Barang</span>
									  <i class="fa fa-angle-right pull-right"></i>
								  </a>
								  <ul class="treeview-menu">
								<li>
							<?php
								if (isset($class2)){
								echo $class2;
								}else {
								echo "";
								}
							?><a href="master_brg.php"><i class="fa fa-circle-o"></i> Produk</a></li>
										<li>
							<?php
								if (isset($class3)){
								echo $class3;
								}else {
								echo "";
								}
							?><a href="#.php"><i class="fa fa-circle-o"></i> Stok</a></li>
									</ul>
						</li>
						<li class="treeview">
							<?php
							if (isset($class4)){
								echo $class4;
							}else {
								echo "";
							}
						?>
							<a href="supplier.php">
								<i class="fa fa-cloud-download"></i> <span>Supplier</span></a></li>
						</li>
						<!--<li class="treeview">-->
							<?php
							//if (isset($class3)){
							//	echo $class3;
							//}else {
							//	echo "";
							//}
						?>
								<?php //if ($status==0){ echo"<a href=report_summary.php><i class='fa fa-files-o'></i><span>Report Summary</span><i class='fa pull-right'></i></li>"; } else { echo""; }
								?>
								<!--</a>
						</li>-->
						<li class="treeview">
							<?php
							  if (isset($class5)){
							  echo $class5;
							  }else {
							  echo "";
							  }
						  ?>
								<a href="#">
									<i class="fa fa-gears"></i>
									<span>Setting</span>
									<i class="fa fa-angle-right pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<?php
							if (isset($class6)){
								echo $class6;
							}else {
								echo "";
							}
									?>
										<li>
											<a href='edit_pwd.php?hal=edit&kd=<?php echo"".$_SESSION[' username '].""?>'>
												<i class='fa fa-key'></i> Ubah Password</a>
										</li>
								</ul>
						</li>
    </section>
    <!-- /.sidebar -->
  </aside>
<!--  -->