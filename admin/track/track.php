<?php
/*
  | Source Code Aplikasi Rental motor PHP & MySQL
  | 
  | @package   : rental_motor
  | @file	   : header.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-motor-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    
    // select untuk panggil nama admin
    $id_login = $_SESSION['USER']['id_login'];
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
    $title_web = 'Track';
    $row = $koneksi->prepare("SELECT * FROM login WHERE id_login=?");
    $row->execute(array($id_login));
    $hasil_login = $row->fetch();
    include '../header.php';
?>
<br>
<br>
<div class="container my-5" style=" min-height:335px;">
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5> Track motor</h5>
            </div>
            <div class="card-body">
            <div class="d-flex justify-content-center">
                <?php include 'index.html'?>
            </div>
        </div>
        <br>
    </div>
</div>
</div>
<br>
<br>
<br>
    </div>

<?php  include '../footer.php';?>