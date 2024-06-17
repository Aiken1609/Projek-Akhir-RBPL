<?php
/*
  | Source Code Aplikasi Rental motor PHP & MySQL
  | 
  | @package   : rental_motor
  | @file	   : tambah.php 
  | @author    : fauzan1892 / Fauzan Falah
  | @copyright : Copyright (c) 2017-2021 Codekop.com (https://www.codekop.com)
  | @blog      : https://www.codekop.com/products/source-code-aplikasi-rental-motor-php-mysql-7.html 
  | 
  | 
  | 
  | 
 */
    require '../../koneksi/koneksi.php';
    $title_web = 'Tambah Motor';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
?>


<br>
<div class="container my-5" style=" min-height:335px;">
    <div class="card">
        <div class="card-header text-white" style="background-color: #1D213B;">
            <h4 class="card-title">
                Tambah Motor
                <div class="float-right">
                    <a class="btn btn-warning" href="motor.php" role="button">Kembali</a>
                </div>
            </h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="proses.php?aksi=tambah" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">No Plat</label>
                                <input type="text" class="form-control col-sm-9" name="no_plat" placeholder="Isi No Plat">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Merk Motor</label>
                                <input type="text" class="form-control col-sm-9" name="merk" placeholder="Isi Merk">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Harga</label>
                                <input type="text" class="form-control col-sm-9" name="harga" placeholder="Isi Harga">
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">Deskripsi</label>
                                <input type="text" class="form-control col-sm-9" name="deskripsi" placeholder="Isi Deskripsi">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <select class="form-control col-sm-9" name="status">
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option>Tersedia</option>
                                    <option>Tidak Tersedia</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Gambar</label>
                                <input type="file" accept="image/*" class="form-control col-sm-9" name="gambar" placeholder="Isi Gambar">
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="float-right">
                        <button class="btn btn-primary" role="button" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>       
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>