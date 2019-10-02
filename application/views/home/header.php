<!DOCTYPE html>
<html>
<head>
    <title>Mountain Project TA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap.CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet" type="text/css"/>
    <!--CSS Custom-->
    <link href="<?php echo base_url('assets/custom/frontEnd.css')?>" rel="stylesheet" type="text/css"/>
    <!-- LOAD JQUERY -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom/jquery_custom.css') ?>">
    <script src="<?php echo base_url('assets/bootstrap/js/jquery-3.3.1.slim.min.js')?>" type="text/javascript"></script>
</head>
<body>

    <!--1. Header-->
    <div class="header fixed-top-custom "style="background-color: rgba(25, 42, 86,1.0)">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-left">

                    </div>
                </div>
                <div class="col-md-6">
                 <div class="header-left text-right">
                    <a href="#"><i class="fa fa-phone"></i> 0858-1729-9642</a>
                    <a href="#"><i class="fa fa-envelope"></i> nurmuhammadsyafei1447@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--2. Navbar / Menu-->
<nav class="navbar fixed-top-custom-1 navbar-expand-lg navbar-light pt-4 navbar-custom" style="">
    <div class="container">
        <a class="navbar-brand font-custom" href="#">
            <img  src="<?php echo base_url('images/pgl.png')?>" style="width: 13% ;height:13%;"> Mountain Climbing
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link pr-5 pl-5" style="color:rgba(0,0,0, 0.9);font-size: 15px;" href="<?php echo base_url()?>">Beranda<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pr-5 pl-5" style="color:rgba(0,0,0, 0.9);font-size: 15px;" href="<?php echo base_url('welcome/booking')?>">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pr-5 pl-5" style="color:rgba(0,0,0, 0.9);font-size: 15px;" href="#">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pr-5 pl-5" style="color:rgba(0,0,0, 0.9);font-size: 15px;" href="<?= base_url('cbayar') ?>">Pembayaran</a>
                    </li><!-- 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ARTICLE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link pr-5 pl-5" style="color:rgba(0,0,0, 0.9)" href="<?php echo base_url('cloginadmin')?>" tabindex="-1" aria-disabled="true">ADMIN</a>
                    </li> -->
                </ul>
            </div>
        </div><br>
    </nav>
    <br><br><br><br>
    <div class="header fixed-top-custom-1">

    </div>
