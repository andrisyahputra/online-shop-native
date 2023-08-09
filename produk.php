<?php
session_start();
include 'koneksi/koneksi.php';

if (isset($_GET['idkategori'])) {
    $id_kategori = $_GET['idkategori'];
    $ketegori_produk = [];
    $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori = '$id_kategori'");
    while ($pecah = $ambil->fetch_assoc()) {
        $ketegori_produk[] = $pecah;
    }
} elseif (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    $cariproduk = [];
    $ambil = $koneksi->query(
        "SELECT * FROM produk 
    WHERE 
    nama_produk LIKE '%$keyword%' OR 
    deskripsi_produk LIKE '%$keyword%'"
    );
    while ($pecah = $ambil->fetch_assoc()) {
        $cariproduk[] = $pecah;
    }
} else {
    $produk = [];
    $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
    while ($pecah = $ambil->fetch_assoc()) {
        $produk[] = $pecah;
    }
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
                <li>Produk</li>
                <?php if (isset($keyword)) : ?>
                    <li><?= $keyword ?></li>
                <?php endif ?>
            </ul>

            <div class="row produk">

                <div class="col-md-3">
                    <?php include 'include/sidebar.php' ?>
                </div>

                <div class="col-md-9">

                    <div class="card box">
                        <div class="card-body">
                            <h2>Produk Kami</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur impedit at dolor
                                similique ut quibusdam distinctio, expedita sequi corporis nihil? Dolorem, architecto.
                                Tempora dolorem nobis facere quo eveniet laborum maxime!</p>
                        </div>
                    </div>

                    <div class="row">
                        <?php if (isset($_GET['idkategori'])) : ?>
                            <?php foreach ($ketegori_produk as $item) : ?>
                                <div class="col-md-4 card-produk">
                                    <div class="card">
                                        <img src="asset/foto_produk/<?= $item['foto_produk']; ?>" alt="<?= $item['foto_produk']; ?>">
                                        <div class="card-body content">
                                            <h5><?= $item['nama_produk'] ?></h5>
                                            <p>Rp. <?= number_format($item['harga_produk']) ?></p>
                                            <a href="beli.php?idproduk=<?= $item['id_produk']; ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-shopping-cart"></i> Keranjang
                                            </a>
                                            <a href="detail_produk.php?idproduk=<?= $item['id_produk'] ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i> Details
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

                        <?php elseif (isset($keyword)) : ?>
                            <?php foreach ($cariproduk as $item) : ?>
                                <div class="col-md-4 card-produk">
                                    <div class="card">
                                        <img src="asset/foto_produk/<?= $item['foto_produk']; ?>" alt="<?= $item['foto_produk']; ?>">
                                        <div class="card-body content">
                                            <h5><?= $item['nama_produk'] ?></h5>
                                            <p>Rp. <?= number_format($item['harga_produk']) ?></p>
                                            <a href="beli.php?idproduk=<?= $item['id_produk']; ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-shopping-cart"></i> Keranjang
                                            </a>
                                            <a href="detail_produk.php?idproduk=<?= $item['id_produk'] ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i> Details
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <?php if (!empty($keyword)) : ?>
                                <div class="col-md-12 mt-2">
                                    <div class="alert alert-danger shadow">
                                        <p>Pencarian Porduk Tidak Ditemukan</p>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php else : ?>
                            <?php foreach ($produk as $key => $item) : ?>
                                <div class="col-md-4 card-produk">
                                    <div class="card">
                                        <img src="asset/foto_produk/<?= $item['foto_produk']; ?>" alt="<?= $item['foto_produk']; ?>">
                                        <div class="card-body content">
                                            <h5><?= $item['nama_produk'] ?></h5>
                                            <p>Rp. <?= number_format($item['harga_produk']) ?></p>
                                            <a href="beli.php?idproduk=<?= $item['id_produk']; ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-shopping-cart"></i> Keranjang
                                            </a>
                                            <a href="detail_produk.php?idproduk=<?= $item['id_produk'] ?>" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i> Details
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="pagination justify-content-center">

                <li class="page-item prev disabled">
                    <a href="#" class="page-link">Prev</a>
                </li>

                <li class="page-item halaman">
                    <a href="#" class="page-link active">1</a>
                </li>

                <li class="page-item dots">
                    <a href="#" class="page-link">...</a>
                </li>

                <li class="page-item halaman">
                    <a href="#" class="page-link">5</a>
                </li>

                <li class="page-item halaman">
                    <a href="#" class="page-link">6</a>
                </li>

                <li class="page-item dots">
                    <a href="#" class="page-link">...</a>
                </li>

                <li class="page-item next">
                    <a href="#" class="page-link">Next</a>
                </li>

            </div>

        </div>
    </section>


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