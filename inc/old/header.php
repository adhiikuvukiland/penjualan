<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YOEL REPORT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../asset/bootstrap/font-awesome/css/font-awesome.min.css">
	<!--Datetime Picker-->	
		<link rel='stylesheet' type='text/css' media='all' href='../../asset/dist/calendar/calendar-system.css' title='system' />
		<script src="../../asset/dist/calendar/datetimepicker.js"></script>
    <script type='text/javascript' src='../../asset/dist/calendar/calendar.js'></script>
    <script type='text/javascript' src='../../asset/dist/calendar/calendar-id.js'></script>
    <script type='text/javascript' src='../../asset/dist/calendar/calendar-setup.js'></script>
  <!-- Datatables -->
  <link rel="stylesheet" href="../../asset/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../asset/dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="../../sweetalert/sweetalert.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="../../asset/bootstrap/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="../../asset/bootstrap/html5shiv/3.7.3/resp ond.min.js"></script>
  <![endif]-->
  
  <script type="text/javascript">
// 1 detik = 1000
  window.setTimeout("waktu()",1000);  
  function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>

<script language="JavaScript">
  var tanggallengkap = new String();
  var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
  namahari = namahari.split(" ");
  var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
  namabulan = namabulan.split(" ");
  var tgl = new Date();
  var hari = tgl.getDay();
  var tanggal = tgl.getDate();
  var bulan = tgl.getMonth();
  var tahun = tgl.getFullYear();
  tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>

<script>
  function logout() {
		swal({
				title: "You really want to exit?",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-primary",
				confirmButtonText: "Yes",
				closeOnConfirm: false
			},
			function() {
				window.location.href = '../index/logout.php';
			});
	}
</script>

<body class="hold-transition skin-purple fixed sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <a href="#" class="logo">
      <span class="logo-mini"><img src="../../asset/dist/img/user3-128x128.png" alt="YOGYA GROUP"></span>
      <span class="logo-lg"><img src="../../asset/dist/img/user3-128x128.png" alt="YOGYA GROUP" width="40px" height="40px"><b> YOEL REPORT</b></span> <!--Bahasa Catalan-->
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown tasks-menu">
            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
              
              <span class="label label-danger"></span>
            </a>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php
              echo $_SESSION['status']; ?> 
               </span>
            </a>
          <li>
           <a href="#" onclick="logout();"><i class="fa fa-power-off"></i></a>
          </li>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
<?php
    $timeout = 30; // Set timeout minutes
    $logout_redirect_url = "../../index.html"; // Set logout URL

  $timeout = $timeout * 60; // Converts minutes to seconds
    if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Waktu Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
$status = $_SESSION['status'];
?>
<?php  ?>
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MENU </li>
				<li class="treeview">
					<?php
							if (isset($class1)){
								echo $class1;
							}else {
								echo "";
							}
						?>
          <a href="tr.php">
            <i class="fa fa-files-o"></i> <span>Transaction</span>
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
					<a href="tr_li.php">
            <i class="fa fa-list"></i> <span>Transaction List Item</span> <i class="fa pull-right"></i></li>
          </a>
        </li>
        <li class="treeview">
          <?php
							if (isset($class3)){
								echo $class3;
							}else {
								echo "";
							}
						?> <a href=tr_lm.php>
						<i class='fa fa-list'></i><span>Transaction List Media</span></li>
						<!--<a href="report_summary.php"> <i class="fa fa-files-o"></i> <span>Report Summary</span> <i class="fa pull-right"></i></li>-->
          </a>
        </li>
    </section>
  </aside>