<!-- EDIT PROFILE USER -->
<?php
    include "koneksi.php";
    include "theader.php";
    $id_user = $_GET['id_user'];
    $ambilData = mysqli_query($koneksi, "SELECT * FROM tuser WHERE id_user='$id_user'");
    $data = mysqli_fetch_array($ambilData);

?>

<?php
// Uji jika tombol simpan diklik
if(isset($_POST['bsimpan'])) {
    // htmlspecialchars agar inputan lebih aman dari injection
    $id_user = $_POST['id_user'];
    //$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : ''; // Periksa jika id_user tersedia
    $nama_pengguna = isset($_POST['nama_pengguna']) ? htmlspecialchars($_POST['nama_pengguna'], ENT_QUOTES) : '';
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : '';
    $password = md5($password);
    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "UPDATE tuser SET nama_pengguna='$nama_pengguna', username='$username', password='$password' WHERE id_user='$id_user'");

    // Uji jika simpan data sukses
    if($simpan) {
        echo "<script>alert('Data Profile Sudah Berubah, Terima kasih..!');
                document.location = 'profile.php' </script>";
    }else {
        echo "<script>alert('GAGAL Ubah Profile!!!');
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
            <a href="profile.php" class="btn btn-primary form-control"><i class="fa fa-backward"></i> Kembali</a>
        </div>
        <div class="col-md-9 mx-sm-5">
            <div class="card shadow">

                <!--Card Body-->
                <div class="card-body">
                    <div class='p-5'>
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4" >Profile Pengunjung</h1>
                        </div>
                        <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleIDUser" value="<?php echo $data['id_user'] ?>" name='id_user' hidden>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="namapengguna" value="<?php echo $data['nama_pengguna'] ?>" name='nama_pengguna' placeholder="Nama" blockquote>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" value="<?php echo $data['username'] ?>" name='username' placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" value="<?php echo $data['password'] ?>" name='password' placeholder="Password" required>
                                </div>
                                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                                
                        </form>
                    </div>
                </div>
                <!--End-Card Body-->
            </div>
        </div>
        <!--End-col-lg-7-->
    </div>
<!--End-col-lg-7-->

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include('tfooter.php')?>