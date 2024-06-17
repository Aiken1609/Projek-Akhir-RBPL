<?php
/*
  | Source Code Aplikasi Rental Mobil PHP & MySQL
  | 
  | @package   : rental_mobil
  | @file      : index.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-mobil-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
session_start();
require '../koneksi/koneksi.php';
if(empty($_SESSION['USER']))
{
    echo '<script>alert("Harap Login");window.location="index.php"</script>';
}
$title_web = 'Pegawai';
include 'header.php';

$hasil = $koneksi->query("SELECT m.merk, b.* FROM booking b
JOIN motor m ON b.id_motor = m.id_motor
WHERE b.status_pengiriman LIKE '%Sedang dikirim%' OR b.status_pengiriman LIKE '%Sedang diproses%' OR b.status_pengiriman LIKE '%Dipinjam%'
ORDER BY b.id_booking DESC")->fetchAll();

// Periksa apakah ada data dalam hasil
if (empty($hasil)) {
  echo "<div class='container pt-5' style=\" min-height:465px;\">
            <div class='alert' style=\"background-color:#FFFFFF;\">
                <strong>Tidak ada data!</strong> Tidak ada pengiriman yang sedang berlangsung saat ini.
            </div>
        </div>";
} else {
  // Tampilkan tabel seperti sebelumnya
  ?>
  <div class="container py-5 my-5" style=" min-height:370px;">
  <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Daftar Pengiriman
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered table-sm">
          <thead>
            <tr>
              <th>No. </th>
              <th>Kode Booking</th>
              <th>Merk Motor</th>
              <th>Nama </th>
              <th>Tanggal Sewa </th>
              <th>Lama Sewa </th>
              <th>Total Harga</th>
              <th>Konfirmasi</th>
              <th>Status Pengiriman</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach($hasil as $isi){?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?= $isi['kode_booking'];?></td>
                <td><?= $isi['merk'];?></td>
                <td><?= $isi['nama'];?></td>
                <td><?= $isi['tanggal'];?></td>
                <td><?= $isi['lama_sewa'];?> hari</td>
                <td>Rp. <?= number_format($isi['total_harga']);?></td>
                <td><?= $isi['konfirmasi_pembayaran'];?></td>
                <td><?= $isi['status_pengiriman'];?></td>
                <td>
                  <a class="btn btn-primary" href="ubah.php?id=<?= $isi['kode_booking'];?>" 
                  role="button">Detail</a>
                </td>
              </tr>
              <?php $no++;}?>
          </tbody>
        </table>
      </div>
    </div> 
  </div>
  </div>
  </div>


  <?php
}

include 'footer.php';
?>