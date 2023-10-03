<?php
include "koneksi.php";
$id = $_GET['id'];

$updateQuery = "UPDATE ttamu SET status_kunjungan='Accepted' WHERE id='$id'";
$ambilData = mysqli_query($koneksi, $updateQuery);

if($ambilData) {
    echo 'Saved!!';
    header("Location: rekapitulasi.php");
} else {
    echo "Query Error : " . $updateQuery . "<br>" . mysqli_error($koneksi);
}

ini_set('display_errors', true);
error_reporting(E_ALL);
?>