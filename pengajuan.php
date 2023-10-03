<!-- PENGAJUAN DATA PENGUNJUNG -->
<?php
    include "koneksi.php";
    include "theader.php";
?>

<?php
// Uji jika tombol simpan diklik
if(isset($_POST['bsimpan'])) {
    // htmlspecialchars agar inputan lebih aman dari injection
    $tgl = isset($_POST['tanggal']) ? htmlspecialchars($_POST['tanggal'], ENT_QUOTES) : '';
    $waktu_kunjungan = isset($_POST['waktu_kunjungan']) ? htmlspecialchars($_POST['waktu_kunjungan'], ENT_QUOTES) : '';
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama'], ENT_QUOTES) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender'], ENT_QUOTES) : '';
    $telepon = isset($_POST['telepon']) ? htmlspecialchars($_POST['telepon'], ENT_QUOTES) : '';
    $instansi = isset($_POST['instansi']) ? htmlspecialchars($_POST['instansi'], ENT_QUOTES) : '';
    $keperluan = isset($_POST['keperluan']) ? htmlspecialchars($_POST['keperluan'], ENT_QUOTES) : '';
    $nama_dituju = isset($_POST['nama_dituju']) ? htmlspecialchars($_POST['nama_dituju'], ENT_QUOTES) : '';
    $password = md5($password);
    $id_user = $_SESSION['id_user'];
    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu (tanggal, waktu_kunjungan, nama, gender, telepon, instansi, keperluan, nama_dituju, status_kunjungan, id_user) VALUES ('$tgl', '$waktu_kunjungan', '$nama', '$gender', '$telepon', '$instansi', '$keperluan', '$nama_dituju', 'Menunggu', '$id_user')");


    // Uji jika simpan data sukses
    if($simpan) {
        echo "<script>alert('Simpan data Sukses, Terima kasih');
                document.location = 'DashboardPengunjung.php' </script>";
    }else {
        echo "<script>alert('Simpan Data Gagal');
                document.location = '?' </script>";
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!--First Row-->
    <div class="row mt-2">

        <!--col-lg-7-->
        <div>
            <a href="dashboardPengunjung.php" class="btn btn-primary form-control"><i class="fa fa-backward"></i> Kembali</a>
        </div>
        <div class="col-md-9 mx-sm-5">
            <div class="card shadow">

                <!--Card Body-->
                <div class="card-body">
                    <div class='p-5'>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4" >IDENTITAS PENGUNJUNG</h1>
                        </div>
                        <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" id="exampleInputDate" name='tanggal' required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputTime" name='waktu_kunjungan'  placeholder="Jam Kunjungan" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputName" name='nama' placeholder="Nama Lengkap" required>
                                </div>
                
                                <div class="form-group">
                                    <select class="form-select mt-3 form-control-gender" name='gender' required>
                                        <option selected disabled value="">Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputTelepon" name='telepon' placeholder="Nomor Telepon" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputInstansi" name='instansi' placeholder="Instansi" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputKeperluan" name='keperluan' placeholder="Keperluan Kunjungan" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputDituju" name='nama_dituju' placeholder="Nama yang Ditujukan" required>
                                </div>

                                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                        </form>
                    </div>
                </div>
                <!--End-Card Body-->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('tfooter.php')?>

</body>

</html>