<nav class="navbar sticky-top">
    <a href="index.php" class="navbar-logo">Toko<span>Online</span></a>
    <div class="navbar-menu">
        <a href="index.php">Beranda</a>
        <a href="produk.php">Produk</a>
        <a href="#">About</a>
        <a href="#">Tentang Kami</a>
        <a href="#">Kontak</a>
    </div>

    <div class="navbar-icon">
        <a href="#"><i class="fas fa-search"></i></a>
        <?php if (empty($_SESSION['keranjang_belanja'])) : ?>
        <a href="keranjang.php"><i class="fas fa-shopping-cart">(0)</i></a>
        <?php else : ?>
        <?php
                        $item = 0;
                        foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah) {
                            $item++;
                        }
                        ?>
        <a href="keranjang.php"><i class="fas fa-shopping-cart">(<?= $item; ?>)</i></a>
        <?php endif; ?>

        <a href="#" id="btn-user"><i class="fas fa-user"></i></a>
        <a href="#" id="btn-menu"><i class="fas fa-bars"></i></a>
    </div>

    <div class="user">
        <?php if (isset($_SESSION['pelanggan'])) : ?>
        <li><a href="pelanggan/">Profil</a></li>
        <li><a href="logout.php">logout</a></li>
        <?php else : ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="daftar.php">Daftar</a></li>
        <?php endif; ?>
    </div>
</nav>