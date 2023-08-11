<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Admin</b>
    </h5>
</div>

<?php
$id_admin = $_SESSION['admin']['id'];

$ambil = $koneksi->query("SELECT * FROM admin WHERE id='$id_admin'");
$admin = $ambil->fetch_assoc();
?>

<a href="index.php?halaman=tambah_kategori" class="btn btn-sm btn-success">Tambah</a>
<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row">

                <div class="col-md-9">

                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $admin['nama_lengkap'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" value="<?= $admin['username'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" id="password" placeholder="Jika Password tidak di ubah">
                            <small class="text-danger font-italic">Jika Password tidak di ubah!</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button name="update" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </div>


                </div>

                <div class="col-md-3">
                    <img src="../asset/foto_admin/<?= $admin['foto_admin'] ?>" alt="<?= $admin['foto_admin'] ?>" class="img-thumbnail img-responsive">
                    <input type="file" class="form-control" name="foto">
                </div>

            </div>
        </form>
    </div>
</div>

<?php

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $user = $_POST['username'];


    $nama_asli = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    $nama_foto = date('YmdHis') . $nama_asli;

    if (!empty($lokasi_foto) or !empty($_POST['password'])) {
        $pass = sha1($_POST['password']);

        move_uploaded_file($lokasi_foto, "../asset/foto_admin/" . $nama_foto);

        $koneksi->query("UPDATE admin SET 
        username='$user',
        password='$pass',
        nama_lengkap='$nama',
        foto_admin='$nama_foto'
        WHERE
        id='$id_admin'
        ");
    } else {
        // ini jika kosong
        $koneksi->query("UPDATE admin SET 
        username='$user',
        nama_lengkap='$nama'
        WHERE
        id='$id_admin'
        ");
    }
    echo "<script>alert('Data Berahsil diUpdate');</script>";
    echo "<script>location='index.php?halaman=admin';</script>";
}

?>