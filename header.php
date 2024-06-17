<!doctype html>
<html lang="en">
  <head>
    <title>Rental Motor</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" >
    <link rel="stylesheet" href="assets/css/font-awesome.css" >
  </head>
  <body style="background-color: #E9EAEC;">
    <div class="pt-4 pb-5 px-4" style="background-color: #1D213B;">
        <div class="row">
            <div class="col-sm-8">
                <h2><b style="text-transform:uppercase; color:#E9EAEC;"><?= $info_web->nama_rental;?> </b></h2>
            </div>
            <div class="col-sm-4">
                <form class="form-inline align-items-center justify-content-end" method="get" action="blog.php">
                    <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari Nama Motor" aria-label="Search">
                    <button class="btn my-2 my-sm-0" style="background-color: #FAD02C;" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div style="margin-top:-2pc"></div>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #90ADC6;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color:#1D213B;">Home <span class="sr-only" style="color:#FEFAF6;">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="blog.php" style="color:#1D213B;">Daftar Motor</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="kontak.php" style="color:#1D213B;">Kontak Kami</a>
                </li>
            <?php if(!empty($_SESSION['USER'])){?>
                <li class="nav-item active">
                    <a class="nav-link" href="history.php" style="color:#1D213B;">History</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="profil.php" style="color:#1D213B;">Profil</a>
                </li>
            <?php }?>
            </ul>
            <?php if(!empty($_SESSION['USER'])){?>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user"> </i> Hallo, <?php echo $_SESSION['USER']['nama_pengguna'];?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');" href="<?php echo $url;?>admin/logout.php">Logout</a>
                </li>
            </ul>
            <?php }?>
        </div>
    </nav>