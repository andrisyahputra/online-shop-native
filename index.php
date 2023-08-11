<?php

session_start();
include 'koneksi/koneksi.php';

$produk = [];
$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT 8");
while ($pecah = $ambil->fetch_assoc()) {
    $produk[] = $pecah;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
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





    <!-- about tentangkami mulai-->
    <div class="container">

        <!-- Hero Section Mulai-->
        <section class="hero">
            <div id="owl-nav"> </div>
            <div class="owl-carousel owl-theme">

                <div class="item">
                    <img src="asset/foto/slider/slider1.jpg" alt="slider1.jpg">
                    <main class="content">
                        <h1>Toko <span>Online</span></h1>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio, ad repudiandae. At ullam
                            odio voluptates.
                        </p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </main>
                </div>

                <div class="item">
                    <img src="asset/foto/slider/slider2.jpg" alt="slider2.jpg">
                    <main class="content">
                        <h1>Toko <span>Online</span></h1>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio, ad repudiandae. At ullam
                            odio voluptates.
                        </p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </main>
                </div>

                <div class="item">
                    <img src="asset/foto/slider/slider3.jpg" alt="slider3.jpg">
                    <main class="content">
                        <h1>Toko <span>Online</span></h1>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio, ad repudiandae. At ullam
                            odio voluptates.
                        </p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </main>
                </div>

            </div>
        </section>
        <!-- Hero Section Akhir -->


        <div class="about">
            <div class="row">
                <div class="col-md-6 about-img">
                    <img src="asset/foto/slider/slider1.jpg" alt="slider1.jpg">
                </div>
                <div class="col-md-6 content">
                    <h3>Kenapa Memilih Produk Kami</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque error facere totam magnam sequi
                        minus.
                    </p>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem, sed.
                    </p>
                </div>
            </div>
        </div>
        <!-- about tentangkami akhir -->

        <!-- produk section mulai -->
        <section class="produk">
            <div class="produk-box">
                <h2><span>Produk</span> Kami</h2>
            </div>
            <div class="row">
                <?php foreach ($produk as $key => $item) : ?>
                    <div class="col-md-3">
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

            </div>
        </section>
        <!-- produk section end -->

        <!-- kontak mulai -->
        <section class="kontak">
            <div class="judul"><span>Kontak</span> Kami</div>
            <div class="row">
                <div class="col-md-6 kontak-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63709.55260437139!2d98.46000389159218!3d3.6224091779540846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3030d60114970f8d%3A0x3039d80b220cbd0!2sBinjai%2C%20Kota%20Binjai%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1691080784795!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 kontak-form">
                    <form method="post">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">
                                        Nama Lengkap :
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap Anda ." required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">
                                        Email :
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email  Anda ." required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">
                                        No WA :
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="nowa" placeholder="Masukkan Nomor WA Anda ." required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label">
                                        Pesan :
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <textarea class="form-control" name="pesan" placeholder="Masukkan Pesan Anda ." required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button name="kirim" class="btn btn-primary">Kirim</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- kontak akhir-->
        <?php
        if (isset($_POST['kirim'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $nowa = $_POST['nowa'];
            $pesan = $_POST['pesan'];

            $koneksi->query("INSERT INTO pesan
                (nama,email,no_telepon,isi_pesan) VALUES
                ('$nama','$email','$nowa','$pesan')
                ");

            echo "<script>alert('Pesan Dikirim');</script>";
            echo "<script>location='kontak.php';</script>";
        }
        ?>


    </div>
    <!-- footer mulai-->
    <?php include 'include/footer.php' ?>
    <!-- footer akhir-->
















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