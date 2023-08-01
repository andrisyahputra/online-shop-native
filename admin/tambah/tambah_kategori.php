<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Tambah Kategori</b></h5>
</div>

<form method="post">
    <div class="card-shadow bg-white">
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Nama Ketegori</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required>
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
    </div>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];

    $koneksi->query("INSERT INTO kategori (nama_kategori) VALUES ('$nama')");

    echo "<script>alert('data berhasil disimpan');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>