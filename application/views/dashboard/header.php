<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Dashboard | Mountain</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font-awesome/css/font-awesome.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatables/datatables.css') ?>">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom1/dashboard.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom1/style.css') ?>">
  <!-- Link CHART JS -->
  <script type="text/javascript" src="<?= base_url('assets/chart.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/jquery-3.3.1.slim.min.js')?>" type="text/javascript"></script>
</head>
<body>

  <!--header-->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark flex-md-nowrap p-0 navbar-header bg-purple">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
    <i class="fa fa-toggle-up color-ijo mt-1 ml-2"> Administrator</i>
  </a>
  <ul class="navbar-nav px-3 ml-auto">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#"><i class="fa fa-user mr-1"></i> <?php echo $admin['adm_nama'] ?></a>
    </li>

    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?= base_url('cloginadmin/logout') ?>"><i class="fa fa-sign-out mr-1"></i>Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
  	<!--Nemu Sidebar-->
    <nav class="col-md-2 d-none d-md-block sidebar">
      <div class="sidebar-sticky">

        <div class="navbar-profile">
          <img src="<?= base_url('images/user/index.png') ?>">
          <p>Hai, <?php echo $admin['adm_nama'] ?></p>
          <span>Administrator</span>
        </div>

        <ul class="nav flex-column navbar-sidebar">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('cdashboard'); ?>">
              <i class="fa fa-home"></i>
              Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('cdashboard/data_admin'); ?>">
              <i class="fa fa-car"></i>
              Data Admin
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#collapsependaki" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-home"></i>
              <span >Pendaki</span>
            </a>
            <div class="collapse" id="collapsependaki">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="nav-link collapsed" href="<?= base_url('cdashboard/data_kelompok'); ?>">
                  <i class="ml-3 fa fa-home"></i>Kelompok
                </a>
                <a class="nav-link collapsed" href="<?= base_url('cdashboard/data_ketua'); ?>">
                  <i class="ml-3 fa fa-home"></i>Ketua kelompok
                </a>
                <a class="nav-link collapsed" href="<?= base_url('cdashboard/data_anggota') ?>">
                  <i class="ml-3 fa fa-home"></i>Anggota
                </a>
              </div>
            </div>
          </li>
<!-- 
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#collapsebooking" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-home"></i>
              <span >Booking</span>
            </a>
            <div class="collapse" id="collapsebooking">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="nav-link collapsed" href="<?= base_url('cdashboard/data_unaccepted'); ?>">
                  <i class="ml-3 fa fa-home"></i>Unaccepted
                </a>
                <a class="nav-link collapsed" href="<?= base_url('cdashboard/data_booking'); ?>">
                  <i class="ml-3 fa fa-home"></i>Semua data booking
                </a>
              </div>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('cdashboard/data_booking'); ?>">
              <i class="fa fa-home"></i>
              Booking
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('cdashboard/data_kuota'); ?>">
              <i class="fa fa-home"></i>
              Kuota
            </a>
          </li>
<!-- 
          <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-home"></i>
              <span >Customer</span>
            </a>
            <div class="collapse" id="collapseExample">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="nav-link collapsed" href="<?= base_url('dashboard/customer') ?>">
                  <i class="ml-3 fa fa-home"></i>Daftar Customer
                </a>
                <a class="nav-link collapsed" href="<?= base_url('dashboard/member') ?>">
                  <i class="ml-3 fa fa-home"></i>Daftar Member
                </a>
                <a class="nav-link collapsed" href="<?= base_url('dashboard/new_member') ?>">
                  <i class="ml-3 fa fa-home"></i>Buat Member Baru
                </a>
              </div>
            </div>
          </li> -->

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Laporan</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <i class="fa fa-home"></i>
            </a>
          </h6>

          <ul class="nav flex-column mb-2">
            <li class="nav-item">
             <a class="nav-link" href="<?= base_url('cdashboard/lap_bulanan'); ?>">
              <i class="fa fa-home"></i>
              Bulanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('cdashboard/lap_tahunan'); ?>">
              <i class="fa fa-home"></i>
              Tahunan
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-home"></i>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-home"></i>
              Year-end sale
            </a>
          </li> -->


        <!--     <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Laporan</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <i class="fa fa-home"></i>
            </a>
          </h6>

          <ul class="nav flex-column mb-2">
            <li class="nav-item">
             <a class="nav-link" href="#">
              <i class="fa fa-home"></i>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-home"></i>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-home"></i>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-home"></i>
              Year-end sale
            </a>
          </li> -->
        </ul>
      </ul>
    </div>
  </nav>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
