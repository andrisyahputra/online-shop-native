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

$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
$produkfoto = $ambil->fetch_assoc();
?>

<div class="card shadow bg-white">
    <div class="card-header">
        <strong>Data Produk</strong>
    </div>

    <div class="card-body">
        <div class="form-group row">
            <label for="Nama Kategori :" class="col-sm-3 col-form-label">Nama Kategori :</label>
            <div class="col-sm-9">
                <input readonly class="form-control" value="<?= $detailproduk['nama_kategori'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Nama Kategori :" class="col-sm-3 col-form-label">Nama Produk :</label>
            <div class="col-sm-9">
                <input readonly class="form-control" value="<?= $detailproduk['nama_produk'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Nama Kategori :" class="col-sm-3 col-form-label">Harga Produk :</label>
            <div class="col-sm-9">
                <input readonly class="form-control" value="Rp. <?= number_format($detailproduk['harga_produk']) ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Nama Kategori :" class="col-sm-3 col-form-label">Berat Produk :</label>
            <div class="col-sm-9">
                <input readonly class="form-control" value="<?= $detailproduk['berat_produk'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="Nama Kategori :" class="col-sm-3 col-form-label">Deskripsi Produk :</label>
            <div class="col-sm-9">
                <textarea class="form-control" readonly><?= $detailproduk['deskripsi_produk'] ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="Nama Kategori :" class="col-sm-3 col-form-label">Stok Produk :</label>
            <div class="col-sm-9">
                <input readonly class="form-control" value="<?= $detailproduk['stok_produk'] ?>"></input>
            </div>
        </div>


    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-11">
                <a class="btn btn-sm btn-primary" href="index.php?halaman=edit_produk&id_produk=<?= $detailproduk['id_produk'] ?>&id_foto=<?= $produkfoto['id_produk_foto'] ?>">Edit</a>
            </div>
            <div class="col-md-1 text-right">
                <a href="index.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a>
            </div>
        </div>
    </div>
</div>





<div class="row mt-4">


    <?php foreach ($produk_foto as $item) : ?>
        <div class="col-4">
            <div class="card" style="width: 22rem;">
                <img src="../asset/foto_produk/<?= $item['nama_produk_foto'] ?>" alt="<?= $item['nama_produk_foto'] ?>" class="img-thumbnail">
            </div>
            <div class="card-footer text-center">
                <a href="index.php?halaman=hapus_foto&idfoto=<?= $item['id_produk_foto'] ?>&idproduk=<?= $item['id_produk'] ?>" class="btn btn-sm btn-danger">Hapus</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- tambah foto -->
<form method="post" action="" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-header">
            <strong>Tambah Foto</strong>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">File Foto :</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="produk_foto">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-11">
                    <button class="btn btn-sm btn-success" name="simpan">Simpan</button>
                </div>
                <div class="col-md-1 text-right">
                    <a href="index.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
if (isset($_POST['simpan'])) {
    $namaFoto = $_FILES['produk_foto']['name'];
    $lokasiFoto = $_FILES['produk_foto']['tmp_name'];
    $tgl_foto = date('YmdHis') . $namaFoto;
    move_uploaded_file($lokasiFoto, "../asset/foto_produk/" . $tgl_foto);

    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto)
    VALUES
    ('$id_produk','$tgl_foto')");

    echo "<script>alert('foto berhasil disimpan');</script>";
    echo "<script>location='index.php?halaman=detail_produk&id=$id_produk';</script>";
}
?>