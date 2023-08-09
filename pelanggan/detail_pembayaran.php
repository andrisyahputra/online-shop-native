<div class="shadow bg-white p-3 mb-3 rounded">
    <h5><strong>Detail Pembayaran</strong></h5>
</div>

<?php
$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembayaran JOIN pembelian ON 
    pembayaran.id_pembelian=pembelian.id_pembelian WHERE 
    pembayaran.id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();

// jika pelanggan belum melakukan pembayaran masih kosong
if (empty($pecah)) {
    echo "<script>alert('Belum ada Data pembayaran');</script>";
    echo "<script>location='index.php?page=pesanan';</script>";
}
// jika data pembayaran tidak sesuai dengan yg bayar atau yg login 
if ($_SESSION['pelanggan']['id_pelanggan'] !== $pecah['id_pelanggan']) {
    echo "<script>alert('Pembayaran tidak di temukan');</script>";
    echo "<script>location='index.php?page=pesanan';</script>";
}
?>

<div class="alert alert-primary shadow text-dark">
    Total tagihan anda: <b><?= number_format($pecah['total_pembelian']) ?></b>
</div>

<div class="shadow bg-white p-3 mb-3 rounded">
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nama</th>
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
                        <td><?= date("d F Y", strtotime(($pecah['tanggal']))) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <img src="../asset/foto_bukti/<?= $pecah['bukti'] ?>" alt="<?= $pecah['bukti'] ?>" width="250" class="img-thumbnail img-responsive">
        </div>
    </div>
</div>