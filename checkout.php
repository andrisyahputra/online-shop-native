<?php
session_start();
include 'koneksi/koneksi.php';

if (empty($_SESSION['keranjang_belanja']) or !isset($_SESSION['keranjang_belanja'])) {
    echo "<script>alert('Keranjang Kosong, Silakan Belanja');</script>";
    echo "<script>location='produk.php';</script>";
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
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <!-- navbar start -->
    <?php include 'include/navbar.php' ?>
    <!-- navbar akhir -->
    <section class="page-keranjang">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Beranda</a></li>
                <li>Keranjang Belanja</li>
            </ul>


            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tables">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) :
                                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                                    $pecah = $ambil->fetch_assoc();
                                    $subtotal = $pecah['harga_produk'] * $jumlah;
                                ?>
                                <tr class="">
                                    <td width="25px"><?= $nomor++; ?></td>
                                    <td>
                                        <img src="./asset/foto_produk/<?= $pecah['foto_produk'] ?>"
                                            alt="<?= $pecah['foto_produk'] ?>" width="50">
                                    </td>
                                    <td><?= $pecah['nama_produk']; ?></td>
                                    <td><?= $jumlah ?></td>
                                    <td>Rp. <?= number_format($pecah['harga_produk']) ?></td>
                                    <td>Rp. <?= number_format($subtotal) ?></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" class="form-control"
                                value="<?= $_SESSION['pelanggan']['nama_pelanggan'] ?>" readonly>
                            <br>
                            <input type="text" class="form-control"
                                value="<?= $_SESSION['pelanggan']['email_pelanggan'] ?>" readonly>
                            <br>
                            <input type="text" class="form-control"
                                value="<?= $_SESSION['pelanggan']['telepon_pelanggan'] ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="provinsi" class="col-sm-3 col-form-label"> Provinsi :</label>
                                    <div class="col-sm-9">
                                        <select name="provinsi" id="provinsi" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="distrik" class="col-sm-3 col-form-label"> Distrik :</label>
                                    <div class="col-sm-9">
                                        <select name="distrik" id="distrik" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="expedisi" class="col-sm-3 col-form-label"> Expedisi :</label>
                                    <div class="col-sm-9">
                                        <select name="expedisi" id="expedisi" class="form-control">

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="paket" class="col-sm-3 col-form-label"> paket :</label>
                                    <div class="col-sm-9">
                                        <select name="paket" id="paket" class="form-control">

                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    <!-- Page level custom scripts -->
    <script src="asset/js/demo/datatables-demo.js"></script>
    <!-- buat js ketika tombol btn menu -->
    <script src="asset/js/main.js"></script>





</body>

</html>