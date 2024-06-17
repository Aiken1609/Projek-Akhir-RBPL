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
 require '../../koneksi/koneksi.php';

if($_GET['id'] == 'konfirmasi')
{
    $data2[] = $_POST['status'];
    $data2[] = $_POST['id_motor'];
    $sql2 = "UPDATE `motor` SET `status`= ? WHERE id_motor= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>history.go(-1);alert("Status Motor di pinjam");</script>'; 
}