<!-- PAGE LOGIN -->

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

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 bg-login shadow-lg  p-4 text-center ">
                                <br>
                                <h5 class="h4 text-gray-900">S I K U N J U N G</h5>
                                <img class="p-4" src='asset/img/sikunjung_logo.png' >
                                <h6 class="h5 text-gray-900"><b>Sistem Informasi Kunjungan Tamu <br> Diskominfo Provinsi Kepri</b></h6>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di Website Sikunjung</h1>
                                    </div>
                                    <form class="user" action="cek_login.php" method="POST">
                                    <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputUsername" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">Login</button>
                                        <div class="text-left" style="margin-top: 10px;">
                                            <a href="lupapassclass.php">Forgot Your Password?</a>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        Belum memiliki akun? silahkan <a href="daftar.php">daftar</a><br>
                                        <a class="small" >Diskominfo Provinsi Kepri</a>
                                    </div>
                                </div>
                            </div>
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