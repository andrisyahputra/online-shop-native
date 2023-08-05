<?php
session_start();
include 'koneksi/koneksi.php';

$id_produk = $_GET['idproduk'];

$ambil = $koneksi->query("SELECT * FROM produk");
$produk = $ambil->fetch_assoc();

$produkfoto = [];
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($pecah = $ambil->fetch_assoc()) {
    $produkfoto[] = $pecah;
}

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
    <section class="page-produk">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Detail Produk</li>
            </ul>

            <div class="row">

                <div class="col-md-3">
                    <?php include 'include/sidebar.php' ?>
                </div>

                <div class="col-md-9 detail-produk">

                    <div class="row">
                        <div class="col-6">
                            <div id="owl-nav"></div>
                            <div class="owl-carousel owl-theme">

                                <?php foreach ($produkfoto as $key => $value) : ?>
                                    <div class="item">
                                        <img src="asset/foto_produk/<?= $value['nama_produk_foto'] ?>" alt="<?= $value['nama_produk_foto'] ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="col-md-6 detail-form">
                            <form action="" method="post">
                                <div class="card">
                                    <div class="card-body">
                                        <h3><?= $produk['nama_produk'] ?></h3>

                                        <div class="form-group row">

                                            <label for="" class="col-md-3 col-form-label">Jumlah :</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="jumlah" value="1" min="1" max="<?= $produk['stok_produk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-md-3 col-form-label">Stok :</label>
                                            <div class="col-md-9">
                                                <input disabled class="form-control" value="<?= $produk['stok_produk'] ?>">
                                            </div>
                                        </div>
                                        <h5>Rp. <?= number_format($produk['harga_produk']) ?></h5>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button name="beli" class="btn btn-success"><i class="fas fa-shopping-cart"></i>
                                            Keranjang</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card detail">
                        <div class="card-body">
                            <h2>Detail Produk</h2>
                            <p><?= $produk['deskripsi_produk'] ?></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['beli'])) {
        $jumlah = $_POST['jumlah'];

        $_SESSION['keranjang_belanja'][$id_produk] = $jumlah;

        echo "<script>alert('produk berhasil masuk ke keranjang');</script>";
        echo "<script>location='keranjang.php';</script>";
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