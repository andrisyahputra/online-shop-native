<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Produk</b>
    </h5>
</div>

<?php
$produk = [];
$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
while ($pecah = $ambil->fetch_assoc()) {
    $produk[] = $pecah;
}
?>

<a href="index.php?halaman=tambah_produk" class="btn btn-sm btn-success">Tambah</a>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="tables">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Foto</th>
                        <th scope="col">opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $key => $item): ?>
                    <tr class="">
                        <td width="50"><?=$key + 1?></td>
                        <td><?=$item['nama_kategori']?></td>
                        <td><?=$item['nama_produk']?></td>
                        <td><?=number_format($item['harga_produk'])?></td>
                        <td><?=number_format($item['berat_produk'])?></td>
                        <td><?=$item['foto_produk']?></td>
                        <td class="text-center" width="150">
                            <a class="btn btn-primary" href="#" role="button">Edit</a>
                            <a class="btn btn-danger" href="#" role="button">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</div>