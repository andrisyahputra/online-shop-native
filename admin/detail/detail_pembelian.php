<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Detail Pembelian</b></h5>
</div>

<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
?>
<!-- untuk melihat -->
<!-- <pre><=print_r($detail);></pre> -->

<div class="row">
    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header">
                <strong>Data Pelanggan</strong>
            </div>
            <div class="card-body row">
                <!--  -->
                <label class="col-md-4 col-form-label">Nama :</label>
                <label class="col-md-8 col-form-label"><?=$detail['nama_pelanggan']?></label>
                <!--  -->
                <label class="col-md-4 col-form-label">Email :</label>
                <label class="col-md-8 col-form-label"><?=$detail['email_pelanggan']?></label>
                <!--  -->
                <label class="col-md-4 col-form-label">Telepon :</label>
                <label class="col-md-8 col-form-label"><?=$detail['telepon_pelanggan']?></label>
                <!--  -->
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header">
                <strong>Data Pembelian</strong>
            </div>
            <div class="card-body row">
                <!--  -->
                <label class="col-md-4 col-form-label">Tanggal :</label>
                <label class="col-md-8 col-form-label"><?=$detail['tanggal_pembelian']?></label>
                <!--  -->
                <!--  -->
                <label class="col-md-4 col-form-label">Total :</label>
                <label class="col-md-8 col-form-label"><?=number_format($detail['total_pembelian'])?></label>
                <!--  -->
            </div>
        </div>
    </div>
</div>
<?php
$pp = [];
$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$id_pembelian'");

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
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pp as $key => $item): ?>
                    <?php $subtotal = $item['harga_produk'] * $item['jumlah'];?>
                    <tr>
                        <td><?=$key + 1?></td>
                        <td><?=$item['nama_produk']?></td>
                        <td>Rp .<?=number_format($item['harga_produk'])?></td>
                        <td><?=$item['jumlah']?></td>
                        <td>Rp <?=number_format($subtotal);?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

    </div>
</div>