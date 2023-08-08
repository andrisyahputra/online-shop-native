<?php
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah = $ambil->fetch_assoc();
?>


<div class="p-3 mb-3 shadow rounded">
    <h4>Selamat Datang <strong><?= $_SESSION['pelanggan']['nama_pelanggan'] ?></strong></h4>
</div>

<div class="p-3 mb-3 shadow rounded">
    <form method="post" action="" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="judul" value="<?= $pecah['nama_pelanggan'] ?>" id="nama" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="<?= $pecah['email_pelanggan'] ?>" id="email" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="telepon" class="col-sm-3 col-form-label">Telepon :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="telepon" value="<?= $pecah['telepon_pelanggan'] ?>" id="telepon" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label"> alamat :</label>
            <div class="col-sm-9">
                <textarea type="text" class="form-control" name="alamat" id="alamat" readonly><?= $pecah['alamat_pelanggan'] ?></textarea>
            </div>
        </div>

    </form>
</div>