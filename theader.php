<!DOCTYPE html>
<html lang="en">

<?php include "koneksi.php";?>

<?php

// buat session start
session_start();

// uji jika session telah di set atau tidak
if (
    empty($_SESSION['username'])
    or empty($_SESSION['password'])
    or empty($_SESSION['nama_pengguna'])
) {

    echo "<script>
    alert('Maaf, untuk mengakses halaman ini, Anda diharuskan Login terlebih dahulu..!!');
    document.location='index.php';
    </script>";
}

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIKUNJUNG</title>

    <link rel="icon" href="asset/img/sikunjung_logo.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand (Logo SIKUNJUNG)-->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <img class='logo-sikunjung' src='asset/img/logo.png' width='120px' >
                <div class="sidebar-brand-text">SIKUNJUNG</div>
            </a>

            <!-- Divider (Garis Pemisah)-->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Sidebar -->
            <?php
            if($_SESSION['level']=='user'){ ?>
            <li class="nav-item">
                <a class="nav-link" href="dashboardPengunjung.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="profile.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Profile</span>
                </a>
            </li>
            <?php }
            
            if($_SESSION['level']=='admin'){ ?>
            <li class="nav-item ">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link collapsed" href="rekapitulasi.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kelola Pengunjung</span>
                </a>
            </li>
            <?php } ?>
            
            <li class="nav-item ">
                <a class="nav-link collapsed" href="logout.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button class="fa fa-bars" id="sidebarToggle"></button>

                    <!-- Topbar Search -->
                <div class="sidebar-brand-text-detail mx-3">Sistem Informasi Kunjungan Tamu</div>
                

                    <!-- Topbar Navbar -->
                    
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Diskominfo Provinsi Kepri</span>
                                <img class="img-profile rounded-circle"
                                    src="asset/img/undraw_profile.png">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->