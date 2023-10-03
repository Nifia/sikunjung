<?php include('theader.php')?>

<!-- STATISTIK PENGUNJUNG -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Statistik Pengunjung</h1>
    </div>

    <?php

        // deklarasi tanggal
        //menampilkan tanggal sekarang
        $tgl_sekarang = date('Y-m-d');
    
        //mendapatkan 6 hari sebelum tgl skrg
        $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));

        $sekarang = date('Y-m-d h:i:s');

        //persiapan query tampilkan jumlah date pengunjung

        $tgl_sekarang = mysqli_fetch_array(mysqli_query(
            $koneksi,
            "SELECT count(*) FROM ttamu where tanggal_dibuat like '%$tgl_sekarang%'"));

        $seminggu = mysqli_fetch_array(mysqli_query(
            $koneksi,
            "SELECT count(*) FROM ttamu where date(tanggal_dibuat) BETWEEN '$seminggu' and '$sekarang'"));

        $bulan_ini = date('m');
        $sebulan = mysqli_fetch_array(mysqli_query(
            $koneksi,
            "SELECT count(*) FROM ttamu where month(tanggal_dibuat) = '$bulan_ini'"));

        $keseluruhan = mysqli_fetch_array(mysqli_query(
            $koneksi,
            "SELECT count(*) FROM ttamu"));
    ?>
                    

    <div class="row">
        <!-- Hari Ini Card-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$tgl_sekarang[0]?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Minggu Ini Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Minggu Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$seminggu[0]?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulan Ini Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$sebulan[0]?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keseluruhan Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Keseluruhan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$keseluruhan[0]?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include('tfooter.php')?>


