<?php
/*
  | Source Code Aplikasi Rental motor PHP & MySQL
  | 
  | @package   : rental_motor
  | @file	   : proses.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-motor-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
 require 'koneksi.php';
if($_GET['id'] == 'login'){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = ? AND password = md5(?)");
    
    $row->execute(array($user,$pass));
    
    $hitung = $row->rowCount();

    if($hitung > 0)
    {

        session_start();
        $hasil = $row->fetch();
        
        $_SESSION['USER'] = $hasil;

        if($_SESSION['USER']['level'] == 'admin')
        {
            echo '<script>window.location="../admin/index.php";alert("Login Sukses");</script>';    
        } elseif ($_SESSION['USER']['level'] == 'pegawai'){
            echo '<script>window.location="../pegawai/index.php";alert("Login Sukses");</script>';
        }
        else
        {
            echo '<script>window.location="../index.php";alert("Login Sukses");</script>'; 
        }

    }
    else
    {
        echo '<script>window.location="../index.php";alert("Login Gagal");</script>'; 
    }
}

if($_GET['id'] == 'daftar')
{
    $data[] = $_POST['nama'];
    $data[] = $_POST['user'];
    $data[] = md5($_POST['pass']);
    $data[] = 'pengguna';

    $row = $koneksi->prepare("SELECT * FROM login WHERE username = ?");
    
    $row->execute(array($_POST['user']));
    
    $hitung = $row->rowCount();

    if($hitung > 0)
    {
        echo '<script>window.location="../index.php";alert("Daftar Gagal, Username Sudah digunakan ");</script>'; 
    }
    else
    {

        $sql = "INSERT INTO `login`(`nama_pengguna`, `username`, `password`, `level`)
                VALUES (?,?,?,?)";
        $row = $koneksi->prepare($sql);
        $row->execute($data);
    
        echo '<script>window.location="../index.php";alert("Daftar Sukses Silahkan Login");</script>'; 
    }


}

if($_GET['id'] == 'booking')
{
    $total = $_POST['total_harga'] * $_POST['lama_sewa'];
    $unik  = random_int(100,999);
    $total_harga = $total+$unik;
    
    $data[] = time();
    $data[] = $_POST['id_login'];
    $data[] = $_POST['id_motor'];
    $data[] = $_POST['ktp'];
    $data[] = $_POST['nama'];
    $data[] = $_POST['alamat'];
    $data[] = $_POST['no_tlp'];
    $data[] = $_POST['tanggal'];
    $data[] = $_POST['lama_sewa'];
    $data[] = $total_harga;
    $data[] = "Belum Bayar";
    $data[] = date('Y-m-d');
    $data[] = "Sedang diproses";

    $sql = "INSERT INTO booking (kode_booking, 
    id_login, 
    id_motor, 
    ktp, 
    nama, 
    alamat, 
    no_tlp, 
    tanggal, lama_sewa, total_harga, konfirmasi_pembayaran, tgl_input, status_pengiriman) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    echo '<script>window.location="../bayar.php?id='.time().'";alert("Anda Sukses Booking silahkan Melakukan Pembayaran");</script>'; 
}

if($_GET['id'] == 'konfirmasi')
{

    $data[] = $_POST['id_booking'];
    $data[] = $_POST['no_rekening'];
    $data[] = $_POST['nama'];
    $data[] = $_POST['nominal'];
    $data[] = $_POST['tgl'];

    $sql = "INSERT INTO `pembayaran`(`id_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) 
    VALUES (?,?,?,?,?)";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    $data2[] = 'Sedang di proses';
    $data2[] = $_POST['id_booking'];
    $sql2 = "UPDATE `booking` SET `konfirmasi_pembayaran`=? WHERE id_booking=?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>history.go(-2);alert("Kirim Sukses , Pembayaran anda sedang diproses");</script>'; 
}