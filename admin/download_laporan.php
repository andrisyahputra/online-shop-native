<?php
// Require composer autoload
require_once '../koneksi/koneksi.php';
require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();


$tanggal_mulai = $_GET['tglm'];
$tanggal_selesai = $_GET['tgls'];
$status = $_GET['status'];

$semuadata = [];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE
    status='$status' AND tanggal_pembelian 
    BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
while ($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";

$html = '

<h2 style="text-align: center;">Data Laporan Pembelian</h2>
<div style="border: 2px solid black; margin: 0 500px 0;"></div>
<table border="1"
    style="border: 1px solid #f2f2f2; color: #232323; width: 100%; text-align: center; margin-top: 20px; padding: 5px;">
    <tr style="background: #35a9db; color: #fff;">
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Jumlah</th>
    </tr>';
$total = 0;
foreach ($semuadata as $key => $item) :
    $total += $item['total_pembelian'];
    $no = $key + 1;
    $nama = $item['nama_pelanggan'];
    $tanggal = date("d F Y", strtotime($item['tanggal_pembelian']));
    $status = $item['status'];
    $total_pembelian = number_format($item['total_pembelian']);
    $jumlah = number_format($total);
    $html .= '
    <tr>
        <td>' . $no . '</td>
        <td>' . $nama . '</td>
        <td>' . $tanggal . '</td>
        <td>' . $status . '</td>
        <td>' . $total_pembelian . '</td>
    </tr>';

endforeach;

$html .= '
    <tr>
        <th colspan="4">Total</th>
        <th>Rp. ' . $jumlah . '</th>
    </tr>
</table>
';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
