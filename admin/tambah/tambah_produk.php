<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Tambah Produk</b>
    </h5>
</div>
<?php
$kategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch_assoc()) {
    $kategori[] = $pecah;
}
?>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-body">

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Ketegori</label>
                <div class="col-sm-9">
                    <select name="id_kategori" class="form-control" required>
                        <option selected disabled>Pilih Nama Kategori</option>
                        <?php foreach ($kategori as $key => $item): ?>
                        <option value="<?=$item['id_kategori']?>"><?=$item['nama_kategori']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Produk</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Produk" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Harga Produk</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="harga" placeholder="Masukan Harga" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Berat Produk</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="berat" placeholder="Masukan Berat" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Foto Produk</label>
                <div class="col-sm-9">
                    <div class="input-foto">
                        <input type="file" name="foto[]" class="form-control" required>
                    </div>
                    <span class="btn btn-sm btn-success mt-3 btn-tambah">
                        <i class="fas fa-plus"></i>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Deskripsi Produk</label>
                <div class="col-sm-9">
                    <textarea type="number" class="form-control" name="deskripsi" placeholder="Masukan Produk" required>
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Stok Produk</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="stok" placeholder="Masukan Stok" required>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-11">
                    <button class="btn btn-sm btn-success" name="simpan">Simpan</button>
                </div>
                <div class="col-md-1 text-right">
                    <a href="index.php?halaman=kategori" class="btn btn-sm btn-danger">Kembali</a>
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

    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    move_uploaded_file($lokasi_foto[0], "../asset/foto_produk/" . $nama_foto[0]);
    $koneksi->query("INSERT INTO `produk`(`id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`)
    VALUES
    ('$id_kategori','$nama','$harga','$berat','$nama_foto[0]','$deskripsi','$stok')");

    $id_baru = $koneksi->insert_id;
    foreach ($nama_foto as $key => $tiap_nama) {
        $tiap_lokasi = $lokasi_foto[$key];
        move_uploaded_file($tiap_lokasi, "../asset/foto_produk/" . $tiap_nama);

        $koneksi->query("INSERT INTO `produk_foto`(`id_produk`, `nama_produk_foto`)
        VALUES
        ('$id_baru','$tiap_nama')");
    }

    // echo "<pre>";
    // print_r($_FILES['foto']);
    // echo "</pre>";
    echo "<script>alert('data berhasil disimpan');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>