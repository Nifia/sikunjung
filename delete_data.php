<!-- HAPUS DATA PENGUNJUNG -->

<?php
    include "koneksi.php";
    $id = $_GET['id'];
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        $ambilData = mysqli_query($koneksi, "DELETE FROM ttamu WHERE id='$id'");
        header("Location: dashboardPengunjung.php");
        exit();
    }
?>

<script>
    function confirmDelete() {
        var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (result) {
            window.location.href = 'delete_data.php?id=<?php echo $id; ?>&confirm=true';
        }
    }
</script>

<button onclick="confirmDelete()">Hapus Data</button>
