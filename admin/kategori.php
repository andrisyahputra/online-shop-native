<div class="shadow p-3 mb-3 bg-white rouded">
    <h5>
        <b>Halaman Kategori</b>
    </h5>
</div>

<?php
    $kategori = [];
    $ambil = $koneksi->query("SELECT * FROM kategori");
    while ($pecah = $ambil->fetch_assoc()){
        $kategori[] = $pecah;   
    }
?>

<div class="card shadow bg-white">
    <div class="card-body">
       <table class="table table-bordered table-hover table-striped" id="tables">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kategori as $key => $item) : ?>
            <tr>
                <td width="50"><?= $key+1 ?></td>
                <td><?= $item['nama_kategori'] ?></td>
                <td class="text-center" width="150">
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger ">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
       </table> 
    </div>
</div>