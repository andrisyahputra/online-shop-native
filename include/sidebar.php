<?php
include 'koneksi/koneksi.php';
$kategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}
?>
<div class="card">
    <div class="card-header">
        <h4>Kategori Produk</h4>
    </div>
    <div class="card-body">
        <ul class="nav navpills flex-column">
            <?php foreach ($kategori as $item): ?>
            <div class="nav-item">
                <a href="produk.php?idkategori=<?=$item['id_kategori']?>"
                    class="nav-link"><?=$item['nama_kategori']?></a>
            </div>
            <?php endforeach;?>
            <div class="nav-item">
                <a href="produk.php" class="nav-link">Semua Produk</a>
            </div>
        </ul>
    </div>
</div>