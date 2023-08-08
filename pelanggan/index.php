<?php
session_start();
include '../koneksi/koneksi.php';

if (!isset($_SESSION['pelanggan']['id_pelanggan'])) {
    echo "<script>alert('Silakan Login');</script>";
    echo "<script>location='../login.php';</script>";
    exit();
}

$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");

$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>
    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../asset/vendor/datatables/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar sticky-top">
        <a href="../index.php" class="navbar-logo">Toko<span>Online</span></a>
        <div class="navbar-menu">
            <a href="../index.php">Beranda</a>
            <a href="../produk.php">Produk</a>
            <a href="#">About</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak</a>
        </div>

        <div class="navbar-icon">
            <a href="#"><i class="fas fa-search"></i></a>
            <a href="../keranjang.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="#" id="btn-user"><i class="fas fa-user"></i></a>
            <a href="#" id="btn-menu"><i class="fas fa-bars"></i></a>
        </div>

        <div class="user">
            <li><a href="index.php">Profil</a></li>
            <li><a href="../logout.php">logout</a></li>
        </div>
    </nav>
    <!-- navbar akhir -->
    <section class="page-profil">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="../index.php">Beranda</a></li>
                <li>Produk</li>
            </ul>

            <div class="row">

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="img">
                                <img src="../asset/foto_pelanggan/<?= $pecah['foto_pelanggan'] ?>" alt="/<?= $pecah['foto_pelanggan'] ?>" class="rounded-circle rounded mx-auto d-block" width="150">
                            </div>
                            <div class="card-title">
                                <h2><?= $pecah['nama_pelanggan'] ?></h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=pesanan" class="nav-link">Pesanan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=riwayat" class="nav-link">Riwayat</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (isset($_GET['page'])) {
                                if ($_GET['page'] == "pesanan") {
                                    include 'pesanan.php';
                                } elseif ($_GET['page'] == "detail_pembelian") {
                                    include 'detail_pembelian.php';
                                }
                            } else {
                                include 'home.php';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- footer mulai -->
    <!-- footer mulai-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Halaman Utama</h3>
                    <ul class="footer-menu">
                        <li><a href="../index.php">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="../produk.php">Produk</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-4">
                    <h3>Hubungi kami</h3>
                    <ul class="footer-kotak">
                        <b><i class="fas fa-store"></i> Toko Online</b>
                        <br>
                        <b><i class="fas fa-city"></i> Binjai</b>
                        <br>
                        <b><i class="fas fa-map-marker-alt"></i> Perjuangan</b>
                        <br>
                        <b><i class="fas fa-phone"></i> 081278391690</b>
                        <br>
                        <b><i class="fas fa-envelope"></i>andrisyahputra2209@gmail.com</b>
                        <br>
                        <b><i class="fas fa-user"></i>Andri Syahputra</b>
                    </ul>
                </div>
                <div class="col-4">
                    <h3>Social Media kami</h3>
                    <ul class="footer-social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></i></a>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <!-- footer akhir -->

    <!-- hak cipta -->
    <div class="created">
        <p>Created By <a href="#">Andri Syahputra</a>. | &copy; 2023</p>
    </div>
    <!-- footer akhir -->


    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../asset/js/owl.carousel.min.js"></script>
    <!-- buat js ketika tombol btn menu -->
    <script src="../asset/js/main.js"></script>



</body>

</html>