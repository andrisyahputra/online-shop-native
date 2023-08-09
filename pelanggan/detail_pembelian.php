<div class="shadow p-3 mb-4 bg-white rounded">
    <h5><b>Halaman Detail Pembelian</b></h5>
</div>

<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

$id_pembelian = $detail['id_pelanggan'];
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
if ($id_pembelian !== $id_pelanggan) {
    echo "<script>alert('Tidak ditemukan');</script>";
    echo "<script>location='index.php?page=pesanan';</script>";
}
?>
<!-- untuk melihat -->
<!-- <pre></?= print_r($detail); ?></pre> -->

<div class="row">
    <div class="col-md-4">
        <h5>Data Pelanggan</h5>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Nama :</th>
                    <td><?= $detail['nama_pelanggan'] ?></td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td><?= $detail['email_pelanggan'] ?></td>
                </tr>
                <tr>
                    <th>Telepon :</th>
                    <td><?= $detail['telepon_pelanggan'] ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="col-md-4">
        <h5>Data Pembelian</h5>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>No.Pembelian :</th>
                    <td><?= $detail['id_pembelian'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal :</th>
                    <td><?= $detail['tanggal_pembelian'] ?></td>
                </tr>
                <tr>
                    <th>Total :</th>
                    <td>Rp. <?= number_format($detail['total_pembelian']) ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="col-md-4">
        <h5>Data Pengiriman</h5>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Alamat :</th>
                    <td><?= $detail['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Ekspedisi:</th>
                    <td><?= $detail['ekspedisi'] ?></td>
                </tr>
                <tr>
                    <th>Ongkir :</th>
                    <td>Rp. <?= number_format($detail['ongkir']) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
$pp = [];
$ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE pembelian_produk.id_pembelian='$id_pembelian'");

while ($pecah = $ambil->fetch_assoc()) {
    $pp[] = $pecah;
}
?>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderd table-hover table-striped" id="tables">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">subBerat</th>
                        <th scope="col">subHarga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pp as $key => $item) : ?>

                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td>Rp. <?= number_format($item['harga']) ?></td>
                            <td><?= $item['jumlah'] ?></td>
                            <td><?= $item['subberat'] ?> Gr.</td>
                            <td>Rp. <?= number_format($item['subharga']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="alert alert-primary shadow mt-3">
    <p>
        Silakan Melakukan Pembayaran: Rp. <?= number_format($detail['total_pembelian']) ?> <br>
        <strong>BNK BRI: 123-1321312123 AN. Andri</strong>
    </p>
</div>