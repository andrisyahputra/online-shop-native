<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Detail Produk</b>
    </h5>
</div>

<?php
$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk = $ambil->fetch_assoc();

$produk_foto = [];
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($pecah = $ambil->fetch_assoc()) {
    $produk_foto[] = $pecah;
}
?>

<pre><?php print_r($detailproduk);?></pre>
<pre><?php print_r($produk_foto);?></pre>