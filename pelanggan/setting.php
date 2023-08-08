<?php
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah = $ambil->fetch_assoc();
?>


<div class="p-3 mb-3 shadow rounded">
    <h4>Edit Profile <strong><?= $_SESSION['pelanggan']['nama_pelanggan'] ?></strong></h4>
</div>

<div class="p-3 mb-3 shadow rounded">
    <form method="post" action="" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" value="<?= $pecah['nama_pelanggan'] ?>" id="nama">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="<?= $pecah['email_pelanggan'] ?>" id="email" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password :</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" value="<?= $pecah['password_pelanggan'] ?>" id="password">
            </div>
        </div>

        <div class="form-group row">
            <label for="telepon" class="col-sm-3 col-form-label">Telepon :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="telepon" value="<?= $pecah['telepon_pelanggan'] ?>" id="telepon">
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat :</label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" name="alamat" id="alamat"><?= $pecah['alamat_pelanggan'] ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto :</label>
            <div class="col-sm-9">
                <img src="../asset/foto_pelanggan/<?= $pecah['foto_pelanggan'] ?>" alt="<?= $pecah['foto_pelanggan'] ?>" width="200">
                <input type="file" class="form-control" name="foto">
            </div>
        </div>

        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button class="btn btn-primary" name="simpan">Simpan</button>
            </div>
        </div>

    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $pass = sha1($_POST['password']);
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    move_uploaded_file($lokasi_foto, "../asset/foto_pelanggan/" . $nama_foto);

    if (!empty($lokasi_foto)) {
        $koneksi->query("UPDATE pelanggan SET 
            nama_pelanggan = '$nama',
            password_pelanggan = '$pass',
            telepon_pelanggan = '$telepon',
            alamat_pelanggan = '$alamat',
            foto_pelanggan = '$nama_foto'
            WHERE
            id_pelanggan='$id_pelanggan'
            ");
    } else {
        // jika foto tidak di ubah
        $koneksi->query("UPDATE pelanggan SET 
            nama_pelanggan = '$nama',
            password_pelanggan = '$pass',
            telepon_pelanggan = '$telepon',
            alamat_pelanggan = '$alamat'
            WHERE
            id_pelanggan='$id_pelanggan'
            ");
    }
    echo "<script>alert('Berhasil DiEdit');</script>";
    echo "<script>location='index.php';</script>";
}
?>