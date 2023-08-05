<?php
session_start();
include 'koneksi/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <!-- navbar start -->
    <?php include 'include/navbar.php' ?>
    <!-- navbar akhir -->
    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center" id="login">

            <div class="col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form method="post" class="user">
                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">
                                                <i class="fas fa-envelope"></i>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Masukan Email...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-md-2 col-form-label">
                                                <i class="fas fa-lock"></i>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Masukan Password...">
                                            </div>
                                        </div>


                                        <div class="text-right">
                                            <button name="login" class="btn btn-primary">
                                                Login
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

        $akun = $ambil->num_rows;
        if ($akun == 1) {
            $_SESSION['pelanggan'] = $ambil->fetch_assoc();
            echo "<script>alert('Login Sukses');</script>";
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>alert('Login Gagal');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>


    <?php include 'include/footer.php' ?>


    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="asset/js/owl.carousel.min.js"></script>
    <!-- buat js ketika tombol btn menu -->
    <script src="asset/js/main.js"></script>



</body>

</html>