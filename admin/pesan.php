<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Pesan</b>
    </h5>
</div>

<?php
$pesan = [];
$ambil = $koneksi->query("SELECT * FROM pesan");
while ($pecah = $ambil->fetch_assoc()) {
    $pesan[] = $pecah;
}
?>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pesan as $key => $item) : ?>
                    <tr>
                        <td width="50"><?= $key + 1 ?></td>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['no_telepon'] ?></td>
                        <td class="text-center" width="200">
                            <a href="index.php?halaman=detail_pesan&id=<?= $item['id_pesan'] ?>" class="btn btn-sm btn-primary">Lihat Pesan</a>
                            <a href="index.php?halaman=hapus_pesan&id=<?= $item['id_pesan'] ?>" class="btn btn-sm btn-danger ">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>