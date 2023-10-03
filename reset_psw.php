<?php
include "koneksi.php";

if (isset($_POST['inputEmail'])) {
    $token = md5(rand('123456','212121'));
    $status_akun = 'inactive';
    $data = array (
        'email' => $_POST['inputEmail'],
        'password' => $_POST['inputPassword'],
        'token' => $token,
        'status_akun' => $status,
    );
    $hasil = $myData->updateData($data);

    if($hasil['status_akun']){
        echo $hasil['$status_akun'];
    } else {
        echo $hasil['$status_akun'];
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
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4" style="text-align: center;">Reset Password</h1>
                                    </div>
                                    <form  action="reset_psw.php" method="POST" name="login">
                                        <div class="form-group row">
                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">New Password</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="exampleIDUser" value="<?php echo $data['id_user'] ?>" name='id_user' hidden>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="password" class="form-control" name="password" required autofocus>
                                            </div>
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Reset</button>
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