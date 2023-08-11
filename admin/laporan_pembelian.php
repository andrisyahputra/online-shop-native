<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Laporan Pembelian</b></h5>
</div>
<?php
if (isset($_POST['cari'])) {
    $tanggal_mulai = $_POST['tgl_mulai'];
    $tanggal_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];


    $semuadata = [];
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE
    status='$status' AND tanggal_pembelian 
    BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
    while ($pecah = $ambil->fetch_assoc()) {
        $semuadata[] = $pecah;
    }
}
?>

<?php if (!empty($semuadata)) : ?>
    <div class="alert alert-info shadow">
        <h5>
            <b>
                Laporan Pembelian Dari <?= date("d F Y", strtotime($tanggal_mulai)) ?> Sampai
                <?= date("d F Y", strtotime($tanggal_selesai)) ?>
            </b>
        </h5>
    </div>
<?php endif; ?>


<div class="card shadow bg-white">
    <div class="card-body">
        <form method="post">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="mulai" class="col-sm-3 col-form-label">Mulai :</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgl_mulai" id="mulai" value="<?= (isset($_POST['cari'])) ?  $tanggal_mulai : "" ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="selesai" class="col-sm-3 col-form-label">Selesai :</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgl_selesai" id="selesai" value="<?= (isset($_POST['cari'])) ?  $tanggal_selesai : "" ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select name="status" id="status" class="form-control">
                                <option disabled selected>Pilih Status</option>
                                <option value="pending">Pending</option>
                                <option value="pembayaran dikonfirmasi">Pembayaran Konfirmasi</option>
                                <option value="barang dikirim">Barang Dikirim</option>
                                <option value="pengiriman dibatalkan">Pengiriman Dibatalkan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-1">
                    <button name="cari" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<div class="card shadow bg-white">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="tables">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                </thead>
                <?php if (!empty($semuadata)) : ?>
                    <?php $total = 0 ?>
                    <?php foreach ($semuadata as $key => $item) : ?>
                        <?php $totalbelanja = $total += $item['total_pembelian'] ?>
                        <tbody>
                            <td width="50"><?= $key + 1 ?></td>
                            <td><?= $item['nama_pelanggan'] ?></td>
                            <td><?= date("d F Y", strtotime($item['tanggal_pembelian'])) ?></td>
                            <td><?= $item['status'] ?></td>
                            <td><?= number_format($item['total_pembelian']) ?></td>
                        </tbody>
                    <?php endforeach; ?>
                    <tfoot>
                        <th colspan="4">Total</th>
                        <th>Rp. <?= number_format($totalbelanja) ?></th>
                    </tfoot>
                <?php else : ?>
                    <tr class="text-center">
                        <td colspan="5" class="alert alert-danger shadow">
                            tidak ada data
                        </td>
                    </tr>
                <?php endif ?>
            </table>
        </div>
    </div>
</div>
<?php if (!empty($semuadata)) : ?>
    <div class="alert shadow alert-primary mt-3">
        <a href="download_laporan.php?tglm=<?= $tanggal_mulai ?>&tgls=<?= $tanggal_selesai ?>&status=<?= $status ?>" class="btn btn-success" target="_blank">Download Laporan</a>
    </div>
<?php endif; ?>