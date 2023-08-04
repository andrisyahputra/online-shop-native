<?php
include 'koneksi/koneksi.php';

$produk = [];
$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT 9");
while ($pecah = $ambil->fetch_assoc()) {
    $produk[] = $pecah;
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
    <?php include 'include/navbar.php'?>
    <!-- navbar akhir -->
    <section class="page-produk">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Produk</li>
            </ul>

            <div class="row">

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategori Produk</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav navpills flex-column">
                                <div class="nav-item">
                                    <a href="#" class="nav-link">Baju</a>
                                </div>
                                <div class="nav-item">
                                    <a href="#" class="nav-link">Celana</a>
                                </div>
                                <div class="nav-item">
                                    <a href="#" class="nav-link">Sepatu</a>
                                </div>
                            </ul>
                        </div>
                    </div>
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
                        <?php foreach ($produk as $key => $item): ?>
                        <div class="col-md-4 card-produk">
                            <div class="card">
                                <img src="asset/foto_produk/<?=$item['foto_produk'];?>"
                                    alt="<?=$item['foto_produk'];?>">
                                <div class="card-body content">
                                    <h5><?=$item['nama_produk']?></h5>
                                    <p>Rp. <?=number_format($item['harga_produk'])?></p>
                                    <a href="#" class="btn btn-sm btn-success">
                                        <i class="fas fa-shopping-cart"></i> Keranjang
                                    </a>
                                    <a href="#" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i> Details
                                    </a>

                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php include 'include/footer.php'?>


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