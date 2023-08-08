<div class="shadow bg-white p-3 mb-3 rounded">
    <h5>Pesanan Saya</h5>
</div>
<?php
$ide_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$pembelian = [];
$ambil = $koneksi->query("SELECT *FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pelanggan='$ide_pelanggan'");
while ($pecah = $ambil->fetch_assoc()) {
    $pembelian[] = $pecah;
}
?>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembelian as $key => $item) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= date("d F Y", strtotime($item['tanggal_pembelian'])) ?></td>
                        <td><?= number_format($item['total_pembelian']) ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">
                                <?= $item['status'] ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>