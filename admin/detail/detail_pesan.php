<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Detail Pesan</b>
    </h5>
</div>

<?php
$id_pesan = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pesan WHERE id_pesan='$id_pesan'");
$pecah = $ambil->fetch_assoc();
?>
<div class="card shadow bg-white">
    <div class="card-body">

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $pecah['nama'] ?>" id="nama" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $pecah['email'] ?>" id="email" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="nowa" class="col-sm-3 col-form-label">No Telpon :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $pecah['no_telepon'] ?>" id="nowa" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Isi Pesan :</label>
            <div class="col-sm-9">
                <textarea class="form-control" readonly><?= $pecah['isi_pesan']; ?></textarea>
            </div>
        </div>

    </div>
</div>