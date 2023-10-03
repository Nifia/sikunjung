<!-- DASHBOARD TAMU -->

<?php
    include 'theader.php';
    include "koneksi.php";

        // mengubah status data kunjungan tamu yang diterima
        if (isset($_GET['status_kunjungan']) && isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $action = $_GET['status_kunjungan'];

            if ($action === 'Disetujui') {
                $sql = "UPDATE ttamu SET status_kunjungan = 'Disetujui' WHERE id = $user_id";
            } elseif ($action === 'Ditolak') {
                $sql = "UPDATE ttamu SET status_kunjungan = 'Ditolak' WHERE id = $user_id";
            }

            if ($conn->query($sql) === TRUE) {
                echo "Pengguna dengan ID $user_id telah $action.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Card -->
    <div class="card shadow mb-3">
        <div class="card-header py-3">
            <ul class="navbar-nav ml-auto">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="pengajuan.php" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Pengajuan</a>
                    </div>
                </div>
            </ul>
        </div>

        <div class="card-body">
            <form method="POST" action="" class="text-center">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input class="form-control" type="date" name="tanggal1" value="<?= isset($_POST['tanggal1']) ? $_POST['tanggal1'] : date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input class="form-control" type="date" name="tanggal2" value="<?= isset($_POST['tanggal2']) ? $_POST['tanggal2'] : date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Filter Data</label>
                            <button class="btn btn-primary form-control" name="btampilkan">Filter</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Reset Data</label>
                            <a href="DashboardPengunjung.php" class="btn btn-danger form-control">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
    
            <div class="table-responsive m-1">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
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
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_POST['btampilkan'])) {
                                $tgl1 = $_POST['tanggal1'];
                                $tgl2 = $_POST['tanggal2'];
                                $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE id_user='$_SESSION[id_user]' AND tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id DESC");
                            } else {
                                $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE id_user='$_SESSION[id_user]' ORDER BY id DESC");
                            }

                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) {
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
                            <td>
                                <a href="edit_data.php?id=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <button class="btn btn-danger" onclick="confirmDelete(<?php echo $data['id']; ?>)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php include('tfooter.php')?>

<!-- Alert ConfirmDelete -->
<script>
function confirmDelete(id) {
    var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (result) {
        window.location.href = 'delete_data.php?id=' + id + '&confirm=true';
    }
}
</script>

</body>

</html>