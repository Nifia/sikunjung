<!-- REKAPITULASI DATA PENGUNJUNG (ADMIN)-->

<?php
    include "koneksi.php";
    include "theader.php";

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

<!DOCTYPE html>
<html lang="en">
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
                            <form method="POST" action="exportexcel.php" class="d-inline-block">
                                <input type="hidden" name="tanggala" value="<?= @$_POST['tanggal1'] ?>">
                                <input type="hidden" name="tanggalb" value="<?= @$_POST['tanggal2'] ?>">
                                <button class="btn btn-success" name="export_by_date">
                                    <i class="fa fa-download"></i> Export Data Excel
                                </button>
                            </form>
                        </div>
                    </div>
                </ul>
            </div>

            <div class="card-body">
                <form method="POST" action="" class="text-center" action="emailkonferm.php">
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
                                <a href="rekapitulasi.php" class="btn btn-danger form-control" href="rekapitulasi.php">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
                        
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No. HP</th>
                                <th>Instansi</th>
                                <th>Keperluan</th>
                                <th>Nama yang Ditujukan</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php
                                    if (isset($_POST['btampilkan'])) {
                                        $tgl1 = $_POST['tanggal1'];
                                        $tgl2 = $_POST['tanggal2'];
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id DESC");
                                    } else {
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu ORDER BY id DESC");
                                    }

                                    $no = 1;
                                    while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data[ 'tanggal'] ?></td>
                                        <td><?= $data[ 'nama'] ?></td>
                                        <td><?= $data[ 'gender'] ?></td>
                                        <td><?= $data[ 'telepon'] ?></td>
                                        <td><?= $data[ 'instansi'] ?></td>
                                        <td><?= $data[ 'keperluan'] ?></td>
                                        <td><?= $data[ 'nama_dituju'] ?></td>
                                        <td><?= $data[ 'status_kunjungan'] ?></td>
                                        <td>
                                            <a href="emailaccepted.php?id_user=<?= $data['id_user'] ?>&id=<?= $data['id'] ?>">
                                                <button class="btn-success btn-sm disabled">Accept</button>
                                            </a>
                                            <br><br>
                                                <button class="btn-danger btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">Reject</button>

                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Keterangan Rejected</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="emailrejected.php?id_user=<?= $data['id_user'] ?>&id=<?= $data['id']?>">
                                                            <div class="modal-body">
                                                                <div class="form-group mb-3">
                                                                    <label for="">Keterangan Rejected</label>
                                                                    <input type="text" class="form-control" id="exampleInputKeterangan" name='keterangan_rejected' placeholder="Masukkan Keterangan Rejected" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include('tfooter.php')?>