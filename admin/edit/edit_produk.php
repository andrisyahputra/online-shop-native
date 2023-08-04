<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Edit Produk</b>
    </h5>
</div>

<?php

$id_produk = $_GET['id_produk'];
$id_foto = $_GET['id_foto'];

$kategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$edit = $ambil->fetch_assoc();

$ambil = $koneksi->query("SELECT * FROM produk_foto JOIN produk ON produk_foto.id_produk=produk.id_produk WHERE id_produk_foto='$id_foto'");
$editfoto = $ambil->fetch_assoc();

?>
<!-- <pre>< print_r($edit)></pre> -->

<form method="post" action="" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control">

                        <option value="<?=$edit['id_kategori']?>"><?=$edit['nama_kategori']?></option>

                        <?php foreach ($kategori as $key => $item): ?>
                        <option value="<?=$item['id_kategori']?>"><?=$item['nama_kategori']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Produk :</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" value="<?=$edit['nama_produk']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Harga Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="harga" class="form-control" value="<?=$edit['harga_produk']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Berat Produk :</label>
                <div class="col-sm-9">
                    <input type="text" name="berat" class="form-control" value="<?=$edit['berat_produk']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Foto Produk :</label>
                <div class="col-sm-9">
                    <img width="150" src="../asset/foto_produk/<?=$edit['foto_produk']?>"
                        alt="<?=$edit['foto_produk']?>" class="img-thumbnail">
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Deskripsi Produk :</label>
                <div class="col-sm-9">
                    <textarea type="text" name="deskripsi"
                        class="form-control"><?=$edit['deskripsi_produk']?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Stok Produk :</label>
                <div class="col-sm-9">
                    <input type="number" name="stok" class="form-control" value="<?=$edit['stok_produk']?>">
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
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];

    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    // jika foto di ubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../asset/foto_produk/" . $namafoto);

        $koneksi->query("UPDATE produk SET
        id_kategori = '$id_kategori',
        nama_produk = '$nama',
        harga_produk = '$harga',
        berat_produk = '$berat',
        foto_produk = '$namafoto',
        deskripsi_produk = '$deskripsi',
        stok_produk = '$stok'
        WHERE id_produk= '$id_produk'
        ");
    } else {
        // jika foto tidak di ubah
        $koneksi->query("UPDATE produk SET
        id_kategori = '$id_kategori',
        nama_produk = '$nama',
        harga_produk = '$harga',
        berat_produk = '$berat',
        deskripsi_produk = '$deskripsi',
        stok_produk = '$stok'
        WHERE id_produk= '$id_produk'
        ");
    }

    $namaprodukfoto = $_FILES['foto']['name'];
    $lokasiprodukfoto = $_FILES['foto']['tmp_name'];

    if (!empty($lokasiprodukfoto)) {
        move_uploaded_file($lokasiprodukfoto, "../asset/foto_produk/" . $namaprodukfoto);

        $koneksi->query("UPDATE produk_foto SET
        id_produk = '$id_produk',
        nama_produk_foto = '$namafoto'
        WHERE id_produk_foto= '$id_foto'
        ");
    } else {
        $koneksi->query("UPDATE produk_foto SET
        id_produk = '$id_produk'
        WHERE id_produk= '$id_foto'
        ");
    }

    echo "<script>alert('data berhasil diedit');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";

}
?>