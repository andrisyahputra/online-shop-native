<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Pembayaran</b>
    </h5>
</div>

<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();
?>

<div class="card shadow bg-white">
    <div class="card-body row">

        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td><?= $pecah['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?= $pecah['bank'] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?= number_format($pecah['jumlah']) ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>Rp. <?= $pecah['tanggal'] ?></td>
                    </tr>
                </table>
            </div>
        </div>


        <div class="col-md-4">
            <img src="../asset/foto_bukti/<?= $pecah['bukti'] ?>" alt="<?= $pecah['bukti'] ?>" width="250"
                class="img-thumbnail img-responsive">
        </div>
    </div>

    <div class="card-footer">
        <form method="post">

            <div class="form-group row">
                <label for="resi" class="col-sm-3 col-form-label">Resi Pengiriman</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="resi" placeholder="Masukan No Resi Pengiriman"
                        id="resi" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">Status Pengiriman</label>
                <div class="col-sm-9">
                    <select name="status" id="status" class="form-control">
                        <option disabled selected>Pilih Status</option>
                        <option value="pembayaran dikonfirmasi">Pembayaran Konfirmasi</option>
                        <option value="barang dikirim">Barang Dikirim</option>
                        <option value="pengiriman dibatalkan">Pengiriman Dibatalkan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <button class="btn-primary btn-sm" name="proses">Proses</button>
                </div>
            </div>

        </form>
    </div>
</div>

<?php
if (isset($_POST['proses'])) {
    $resi = $_POST['resi'];
    $status = $_POST['status'];

    $koneksi->query("UPDATE pembelian SET 
        resi_pengiriman='$resi',
        status='$status' 
        WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Data Pemeblian Berhasil Diupdate');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>