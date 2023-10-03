<!-- KELOLA PROSES LOGIN -->

<?php

// Aktifkan session (menyimpan data pengguna saat mereka menjelajahi situs web)
session_start();

// panggil koneksi database
include "koneksi.php";

@$pass = md5($_POST['password']); // enkripsi kata sandi menggunakan algoritma MD5
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);

$login = mysqli_query($koneksi, "SELECT * FROM tuser where username='$username' and password = '$password' and status_akun = 'Aktif' ");

$data = mysqli_fetch_array($login);

// Uji jika username dan password ditemukan/sesuai

if($data) {
    $_SESSION["id_user"] = $data['id_user'];
    $_SESSION["username"] = $data['username'];
    $_SESSION["password"] = $data['password'];
    $_SESSION["nama_pengguna"] = $data['nama_pengguna'];
    $_SESSION["level"] = $data['level'];
    

    //arahkan ke halaman dashboard
    if($_SESSION['level']=='user'){
        header('location:dashboardPengunjung.php');
    }if($_SESSION['level']=='admin'){
        header('location:dashboard.php');
    }
} else {
    echo "<script>
    alert('Maaf, Login Gagal, Pastikan Username dan Password anda Benar...!');
    document.location='index.php';
    </script>";
}