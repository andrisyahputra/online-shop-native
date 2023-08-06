<?php
session_start();
include 'koneksi/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar</title>
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

            <div class="col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
                                    </div>
                                    <form method="post" class="user" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">
                                                Nama Lengkap :
                                            </label>
                                            <div class="col-md-8">
                                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama..." required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">
                                                Email :
                                            </label>
                                            <div class="col-md-8">
                                                <input type="email" name="email" class="form-control" placeholder="Masukan Email..." required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">
                                                Password :
                                            </label>
                                            <div class="col-md-8">
                                                <input type="password" name="password" class="form-control" placeholder="Masukan Password..." required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">
                                                No WA :
                                            </label>
                                            <div class="col-md-8">
                                                <input type="number" name="nowa" class="form-control" placeholder="Masukan No WA..." required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">
                                                Alamat lengkap :
                                            </label>
                                            <div class="col-md-8">
                                                <textarea name="alamat" class="form-control" rows="5" id="comment" name="text" placeholder="Masukan Alamat Lengkap..."></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-md-4 col-form-label">
                                                Foto :
                                            </label>
                                            <div class="col-md-8">
                                                <input type="file" name="foto" class="form-control" required>
                                            </div>
                                        </div>


                                        <div class="text-right">
                                            <button name="daftar" class="btn btn-primary">
                                                Daftar
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
    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $nowa = $_POST['nowa'];
        $alamat = $_POST['alamat'];

        $nama_foto = $_FILES['foto']['name'];
        $lokasifoto_foto = $_FILES['foto']['tmp_name'];

        move_uploaded_file($lokasifoto_foto, "./asset/foto_pelanggan/" . $nama_foto);

        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
        $ada_email = $ambil->num_rows;

        if ($ada_email == 1) {
            echo "<script>alert('Pendaftaran Gagal, Email Sudah digunakan');</script>";
            echo "<script>location='daftar.php';</script>";
        } else {
            $koneksi->query(
                //     "INSERT INTO pelanggan(nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan,alamat_pelanggan,foto_pelanggan)
                // VALUES
                // ('$nama','$email','$password','$alamat','$nama_foto')"
                "INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, password_pelanggan, telepon_pelanggan, alamat_pelanggan, foto_pelanggan) VALUES ('$nama','$email','$password','$nowa','$alamat','$nama_foto')"
            );

            echo "<script>alert('Pendaftaran Sukses Silakan Login');</script>";
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