<!-- PAGE RECOVERY PASSWORD -->

<?php

include "koneksi.php";

if(isset($_POST['recover'])){
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : '';
    $password = md5($password);
    $simpan = mysqli_query($koneksi, "UPDATE tuser SET password='$password' WHERE email='$email'");

    if($simpan) {
        echo "<script>alert('Password anda telah berubah, Terimakasih...');
                document.location = 'index.php' </script>";
    }else {
        echo "<script>alert('Salah Masukkan, Silahkan masukkan data yang benar');
                document.location = '?' </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login | Sistem Informasi Kunjungan Tamu</title>

    <!-- Buat Favicon -->
    <link rel="icon" href="asset/img/sikunjung_logo.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="p-5">
                                    <div class="text-center offset-md-4">
                                        <h1 class="h4 text-gray-900 mb-4" style="text-align: center;">User Password Recover</h1>
                                    </div>
                                    <form  action="#" method="POST" name="recover_psw">
                                        <div class="form-group row">
                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                            <div class="col-md-8">
                                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                            </div>
                                            <label for="blank" class="col-md-4 col-form-label text-md-right"></label>
                                            <div class="col-md-8"></div>
                                            <label for="new_password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                            <div class="col-md-8">
                                                <input type="text" id="new_password" class="form-control" name="password" required autofocus>
                                            </div>
                                            <label for="blank" class="col-md-4 col-form-label text-md-right"></label>
                                            <div class="col-md-8"></div>
                                            <div class="col-md-6 offset-md-4">
                                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Recover" name="recover">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>