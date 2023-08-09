<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Pembelian</b>
    </h5>
</div>
<?php
$pembelian = [];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
while ($pecah = $ambil->fetch_assoc()) {
    $pembelian[] = $pecah;
}
?>
<div class="card shadow bg-white">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="tables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pembelian as $key => $item) : ?>
                        <tr>
                            <td width="50"><?= $key + 1; ?></td>
                            <td><?= $item['nama_pelanggan'] ?></td>
                            <td><?= date("d F Y", strtotime($item['tanggal_pembelian'])); ?></td>
                            <td>Rp. <?= number_format($item['total_pembelian']) ?></td>
                            <td><?= $item['status'] ?></td>
                            <td class="text-center" width="200">
                                <a class="btn btn-info btn-sm" href="index.php?halaman=detail_pembelian&id=<?= $item['id_pembelian'] ?>" role="button">Detail</a>
                                <!-- jika status tidak panding -->
                                <?php if ($item['status'] !== 'pending') : ?>
                                    <a class="btn btn-success btn-sm" href="index.php?halaman=pembayaran&id=<?= $item['id_pembelian'] ?>" role="button">Lihat
                                        Pembayaran</a>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>