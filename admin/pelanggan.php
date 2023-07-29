<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Pelanggan</b>
    </h5>
</div>
<?php
    $pelanggan = [];
    $ambil = $koneksi->query("SELECT * FROM pelanggan");
    while($pecah = $ambil->fetch_assoc()){
        $pelanggan[] = $pecah;
    }
?>

<div class="card shadow bg-white">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="tables">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pelanggan as $key => $item) : ?>
                        <tr>
                        <td width="50"><?= $key+1; ?></td>
                        <td><?= $item['nama_pelanggan']; ?></td>
                        <td><?= $item['email_pelanggan']; ?></td>
                        <td><?= $item['telepon_pelanggan']; ?></td>
                        <td><?= $item['foto_pelanggan']; ?></td>
                        <td class="text-center" width="150">
                            <a class="btn btn-danger" href="#" role="button">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>