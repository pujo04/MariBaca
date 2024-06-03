<?php
  include "koneksi.php";
  session_start();
  if (!isset($_SESSION['id_anggota'])) {
    header("Location: login.php");
    exit();
  }

  $sql_anggota = "SELECT COUNT(id_anggota) FROM anggota";
  $sql_buku = "SELECT COUNT(id_buku) FROM buku";
  $sql_peminjaman = "SELECT COUNT(id_peminjaman) FROM peminjaman";
  $sql_pengembalian = "SELECT COUNT(id_pengembalian) FROM pengembalian";

  $result_anggota = ($db->query($sql_anggota))->fetch_assoc();
  $result_buku = ($db->query($sql_buku))->fetch_assoc();
  $result_peminjaman = ($db->query($sql_peminjaman))->fetch_assoc();
  $result_pengembalian = ($db->query($sql_pengembalian))->fetch_assoc();

  $data_anggota = $result_anggota['COUNT(id_anggota)'];
  $data_buku = $result_buku['COUNT(id_buku)'];
  $data_peminjaman = $result_peminjaman['COUNT(id_peminjaman)'];
  $data_pengembalian = $result_pengembalian['COUNT(id_pengembalian)'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
      
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">MariBaca</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="data_buku.php">Buku</a>
                <a class="dropdown-item" href="data_anggota.php">Anggota</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transaksi</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="peminjaman.php">Peminjaman</a>
                <a class="dropdown-item" href="pengembalian.php">Pengembalian</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>    
    </nav>
    <!-- Navbar Akhir -->

    <!-- Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mt-4">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Selamat Datang di MariBaca</h1>
              <p class="lead">Sebuah website perpustakaan sederhana yang memungkinkan anggota dapat meminjam dan mengembalikan buku</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Peminjaman</h5>
              <p class="card-text">Jumlah transaksi peminjaman: <?= $data_peminjaman ?></p>
              <a href="peminjaman.php" class="btn btn-primary">Peminjaman</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pengembalian</h5>
              <p class="card-text">Jumlah transaksi pengembalian: <?= $data_pengembalian ?></p>
              <a href="pengembalian.php" class="btn btn-primary">Pengembalian</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Buku</h5>
              <p class="card-text">Jumlah buku yang tersedia: <?= $data_buku ?></p>
              <a href="data_buku.php" class="btn btn-primary">Data Buku</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Anggota</h5>
              <p class="card-text">Jumlah anggota yang ada: <?= $data_anggota ?></p>
              <a href="data_anggota.php" class="btn btn-primary">Anggota</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content Akhir -->

    <!-- Footer -->
    <footer class="mt-3 bg-dark p-3 text-center" style="color: white;font-weight: bold">
      <p>MariBaca &copy; 2024</p>
    </footer>
    <!-- Footer Akhir -->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>