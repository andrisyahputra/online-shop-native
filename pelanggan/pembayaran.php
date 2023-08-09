<div class="shadow bg-white p-3 mb-3 rounded">
    <h5><strong>Pembayaran</strong></h5>
</div>
<?php
$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$pecah = $ambil->fetch_assoc();
?>

<div class="alert alert-primary shadow text-dark">
    Total Tagihan anda: Rp. <b><?= number_format($pecah['total_pembelian']) ?></b>
</div>

<div class="shadow bg-white p-3 mb-3 rounded">
    <form method="post" action="" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" id="nama">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Bank :</label>
            <div class="col-sm-9">
                <select name="bank" class="form-control">
                    <option selected disabled>Pilih Metode Pembayaran</option>
                    <option value="bri">BRI</option>
                    <option value="bca">BCA</option>
                    <option value="btn">BTN</option>
                    <option value="mandiri">Mandiri</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah :</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="jumlah" value="<?= $pecah['total_pembelian'] ?>" id="jumlah" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="bukti" class="col-sm-3 col-form-label">Bukti :</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="bukti" id="bukti" required>
                <small class="text-danger font-italic">Foto bukti harus pg/png max ukuran 2mb</small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button name="kirim" class="btn btn-primary">Kirim</button>
            </div>
        </div>


    </form>
</div>

<?php
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date("Y-m-d");

    $nama_bukti = $_FILES['bukti']['name'];
    $lokasi_bukti = $_FILES['bukti']['tmp_name'];
    $tgl_bukti = date('YmHis') . $nama_bukti;

    move_uploaded_file($lokasi_bukti, "../asset/foto_bukti/" . $tgl_bukti);

    // buat simpan tabel pembayaran
    $koneksi->query("INSERT INTO pembayaran 
    (id_pembelian,nama,bank,jumlah,tanggal,bukti)
    VALUES
    ('$id_pembelian','$nama','$bank','$jumlah','$tanggal','$tgl_bukti')");

    // update tabel pembelian
    $koneksi->query("UPDATE pembelian SET status='sedang diproses' WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Pembayaran Terkirim');</script>";
    echo "<script>location='index.php?page=pesanan';</script>";
}
?>