<?php
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

?>


<div class="p-3 mb-3 shadow rounded">
    <h4>Update Password <strong><?= $_SESSION['pelanggan']['nama_pelanggan'] ?></strong></h4>
</div>

<div class="p-3 mb-3 shadow rounded">
    <form method="post" action="" enctype="multipart/form-data">


        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password Lama:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="pass_lama"
                    placeholder="Masukan Password Lama anda">
            </div>
        </div>

        <div class="form-group row">
            <label for="password2" class="col-sm-3 col-form-label">Password baru:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password2" name="pass_baru"
                    placeholder="Masukan Password Baru anda">
            </div>
        </div>

        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button class="btn btn-primary" name="update">Update</button>
            </div>
        </div>

    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $pass_lama = sha1($_POST['pass_lama']);
    $pass_baru = sha1($_POST['pass_baru']);
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE password_pelanggan='$pass_lama'");
    $pass = $ambil->num_rows;
    if ($pass == 1) {
        $koneksi->query("UPDATE pelanggan SET password_pelanggan='$pass_baru' WHERE id_pelanggan='$id_pelanggan'");
        echo "<script>alert('password berhasil di update');</script>";
        session_destroy();
        echo "<script>location='../login.php';</script>";
    } else {
        echo "<script>alert('Passsword Gagal di update');</script>";
        echo "<script>location='index.php?page=ubah_password';</script>";
    }
}
?>