<?php
session_start();
include '../koneksi/koneksi.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Silakan Login Dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
// data admin
$id_admin = $_SESSION['admin']['id'];

$ambil = $koneksi->query("SELECT * FROM admin WHERE id='$id_admin'");
$admin = $ambil->fetch_assoc();

// data pembayaran
$data_pbayar = [];
$ambil = $koneksi->query("SELECT * FROM pembayaran");
$item_pem = 0;
while ($pecah = $ambil->fetch_assoc()) {
    $data_pbayar[] = $pecah;
    $item_pem++;
}
// data pesan
$data_pesan = [];
$ambil = $koneksi->query("SELECT * FROM pesan");
$item_pesan = 0;
while ($pecah = $ambil->fetch_assoc()) {
    $data_pesan[] = $pecah;
    $item_pesan++;
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

    <title>Toko Online</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Toko Online</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pesan">
                    <i class="fas fa-bell fa-fw"></i>
                    <span>Pesan</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=kategori">
                    <i class="fas fa-list"></i>
                    <span>Kategori</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=produk">
                    <i class="fas fa-cubes"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pembelian">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pembelian</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pelanggan">
                    <i class="fas fa-users"></i>
                    <span>Pelanggan</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=laporan_pembelian">
                    <i class="fas fa-file"></i>
                    <span>Laporan</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?= $item_pem; ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Total Pembayaran
                                </h6>


                                <?php foreach ($data_pbayar as $key => $item) : ?>
                                    <a class="dropdown-item d-flex align-items-center" href="index.php?halaman=pembayaran&id=<?= $item['id_pembelian'] ?>">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                <?= date("d F Y", strtotime(($item['tanggal']))) ?></div>
                                            Rp. <?= number_format($item['jumlah']) ?> <br>
                                            <?= $item['nama']; ?>.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="index.php?halaman=pembelian">Lihat Semua Pesanan Produk</a>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?= $item_pesan; ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>

                                <?php foreach ($data_pesan as $key => $item) : ?>
                                    <a class="dropdown-item d-flex align-items-center" href="index.php?halaman=detail_pesan&id=<?= $item['id_pesan'] ?>">

                                        <div>
                                            <div class="text-truncate">
                                                <?= $item['nama']; ?>
                                            </div>
                                            <div class="small text-gray-500"><?= $item['email']; ?></div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                                <a class="dropdown-item text-center small text-gray-500" href="index.php?halaman=pesan">Lihat Semua
                                    Komentar</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['nama_lengkap'] ?></span>
                                <img class="img-profile rounded-circle" src="../asset/foto_admin/<?= $admin['foto_admin'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php?halaman=admin">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <?php
                    if (isset($_GET['halaman'])) {

                        // halaman admin
                        if ($_GET['halaman'] == "admin") {
                            include 'admin.php';
                            // halaman pesan
                        } elseif ($_GET['halaman'] == "pesan") {
                            include 'pesan.php';
                        } elseif ($_GET['halaman'] == "detail_pesan") {
                            include 'detail/detail_pesan.php';

                            // halaman kategori
                        } elseif ($_GET['halaman'] == "kategori") {
                            include 'kategori.php';
                        } elseif ($_GET['halaman'] == "tambah_kategori") {
                            include 'tambah/tambah_kategori.php';
                        } elseif ($_GET['halaman'] == "edit_kategori") {
                            include 'edit/edit_kategori.php';
                        } elseif ($_GET['halaman'] == "hapus_kategori") {
                            include 'hapus/hapus_kategori.php';
                        }

                        // halaman produk
                        elseif ($_GET['halaman'] == "produk") {
                            include 'produk.php';
                        } elseif ($_GET['halaman'] == "tambah_produk") {
                            include 'tambah/tambah_produk.php';
                        } elseif ($_GET['halaman'] == "detail_produk") {
                            include 'detail/detail_produk.php';
                        } elseif ($_GET['halaman'] == "hapus_foto") {
                            include 'hapus/hapus_foto.php';
                        } elseif ($_GET['halaman'] == "edit_produk") {
                            include 'edit/edit_produk.php';
                        } elseif ($_GET['halaman'] == "hapus_produk") {
                            include 'hapus/hapus_produk.php';
                        }

                        // halaman pembelian
                        elseif ($_GET['halaman'] == "pembelian") {
                            include 'pembelian.php';
                        } elseif ($_GET['halaman'] == "detail_pembelian") {
                            include 'detail/detail_pembelian.php';
                        } elseif ($_GET['halaman'] == "pembayaran") {
                            include 'pembayaran.php';
                        }

                        // halaman pelanggan
                        elseif ($_GET['halaman'] == "pelanggan") {
                            include 'pelanggan.php';
                        }

                        // halaman logout
                        elseif ($_GET['halaman'] == "logout") {
                            include 'logout.php';
                        }
                        // halaman laporan
                        elseif ($_GET['halaman'] == "laporan_pembelian") {
                            include 'laporan_pembelian.php';
                        }
                    } else {
                        include 'dashboard.php';
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php?halaman=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $(".btn-tambah").on("click", function() {
                // alert("berhasil")tes
                $('.input-foto').append("<input type='file' name='foto[]' class='form-control mt-1'>");
            })
        })
    </script>
</body>

</html>