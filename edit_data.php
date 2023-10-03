<!-- EDIT DATA PENGUNJUNG -->

<?php
    include "theader.php";
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE id='$id'");
    $data = mysqli_fetch_array($ambilData);
?>

<?php
    // Uji jika tombol simpan diklik
    if(isset($_POST['bsimpan'])) {
    $id = $_POST['id'];
    $waktu_kunjungan = isset($_POST['waktu_kunjungan']) ? htmlspecialchars($_POST['waktu_kunjungan'], ENT_QUOTES) : '';
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama'], ENT_QUOTES) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender'], ENT_QUOTES) : '';
    $telepon = isset($_POST['telepon']) ? htmlspecialchars($_POST['telepon'], ENT_QUOTES) : '';
    $instansi = isset($_POST['instansi']) ? htmlspecialchars($_POST['instansi'], ENT_QUOTES) : '';
    $keperluan = isset($_POST['keperluan']) ? htmlspecialchars($_POST['keperluan'], ENT_QUOTES) : '';
    $nama_dituju = isset($_POST['nama_dituju']) ? htmlspecialchars($_POST['nama_dituju'], ENT_QUOTES) : '';

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "UPDATE ttamu SET waktu_kunjungan='$waktu_kunjungan', nama='$nama', gender='$gender', telepon='$telepon', instansi='$instansi', keperluan='$keperluan', nama_dituju='$nama_dituju' WHERE id=".$id);
    // Uji jika edit data sukses
    if($simpan) {
        echo "<script>alert('Data berhasil diubah!');
                document.location = 'dashboardPengunjung.php' </script>";
    }else {
        echo "<script>alert('Gagal mengedit data. Silakan coba lagi!');
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
                            <h1 class="h4 text-gray-900 mb-4" >EDIT DATA PENGUNJUNG</h1>
                        </div>
                        <form class="user" method="POST" action="">
                            
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleID" value="<?php echo $data['id'] ?>" name='id' hidden>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputTime" value="<?php echo $data['waktu_kunjungan'] ?>" name='waktu_kunjungan'  placeholder="Jam Kunjungan" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputName" value="<?php echo $data['nama'] ?>" name='nama' placeholder="Nama Lengkap" required>
                                </div>
                    
                                <div class="form-group">
                                    <select class="form-select mt-3 form-control-gender" name='gender' required>
                                        <option selected disabled value="">Jenis Kelamin</option>
                                        <option value="Laki-laki" <?php echo ($data['gender']=='Laki-laki')?"selected":"";?>>Laki-laki</option>
                                        <option value="Perempuan" <?php echo ($data['gender']=='Perempuan')?"selected":"";?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputTelepon" value="<?php echo $data['telepon'] ?>" name='telepon' placeholder="Nomor Telepon" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputInstansi" value="<?php echo $data['instansi'] ?>" name='instansi' placeholder="Instansi" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputKeperluan" value="<?php echo $data['keperluan'] ?>" name='keperluan' placeholder="Keperluan Kunjungan" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputDituju" value="<?php echo $data['nama_dituju'] ?>" name='nama_dituju' placeholder="Nama yang Ditujukan" required>
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
