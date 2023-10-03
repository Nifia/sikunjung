<!-- EXPORT DATA KE EXCEL -->
<?php

include "koneksi.php";

// persiapan untuk excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengunjung Diskominfo.xls");
header("Pragma: no-cache");
header("Expires:0");
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="7">Rekapitulasi Data Pengunjung Diskominfo KEPRI</th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Tanggal Kunjungan</th>
            <th>Jam Kunjungan</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No. HP</th>
            <th>Instansi</th>
            <th>Keperluan</th>
            <th>Nama yang Ditujukan</th>
            <th>Status Kunjungan</th>
        </tr>
        <tbody>
            <?php
        
            if(isset($_POST['export_by_date']) && $tgl1 = $_POST['tanggala'] == null && $tgl1 = $_POST['tanggalb'] == null ) {
                // Query untuk mendapatkan semua data
                $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu ORDER BY id DESC");
                $no = 1;
            } else {
                // Mengambil tanggal dari inputan form
                $tgl1 = $_POST['tanggala'];
                $tgl2 = $_POST['tanggalb'];
                
                // Query untuk mendapatkan data berdasarkan rentang tanggal
                $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal BETWEEN '$tgl1' and '$tgl2' order by id desc");
                $no = 1;
            }

            while($data = mysqli_fetch_array($tampil)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data[ 'tanggal'] ?></td>
                <td><?= $data[ 'waktu_kunjungan'] ?></td>
                <td><?= $data[ 'nama'] ?></td>
                <td><?= $data[ 'gender'] ?></td>
                <td><?= $data[ 'telepon'] ?></td>
                <td><?= $data[ 'instansi'] ?></td>
                <td><?= $data[ 'keperluan'] ?></td>
                <td><?= $data[ 'nama_dituju'] ?></td>
                <td><?= $data[ 'status_kunjungan'] ?></td>
            </tr>
            <?php }  ?>
        </tbody>
    </thead>
</table>