<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Edit Kategori</b>
    </h5>
</div>

<?php
$id_kategori = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$edit = $ambil->fetch_assoc();
?>
<!-- //cek dulu -->
<!-- <pre>< print_r($edit)?></pre> -->

<form method="post" action="">
    <div class="card shadow bg-white">
        <div class="card-body">

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Kategori :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" value="<?=$edit['nama_kategori'];?>">
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
    $nama = $_POST['nama'];
    $koneksi->query("UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id_kategori'");

    echo "<script>alert('kategori berhasil diupdate');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>