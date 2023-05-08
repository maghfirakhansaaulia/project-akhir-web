<?php
session_start();
require 'functions.php';

$role = '';

if (isset($_COOKIE['idusr']) && isset($_COOKIE['roleusr']) && isset($_COOKIE['emailusr'])) {
  $role = $_COOKIE['roleusr'];
  $id_cookie = $_COOKIE['idusr'];
  $email_cookie = $_COOKIE['emailusr'];

  $result = mysqli_query($conn, "SELECT {$role}_email FROM {$role} WHERE {$role}_id = {$id_cookie}");
  $row = mysqli_fetch_assoc($result);

  $salt = "1ni92r7%4$" . $row["{$role}_email"];
  if ($email_cookie === hash('sha256', $salt)) {
    $_SESSION['login'] = true;
    $_SESSION["role"] = $role;
    $_SESSION["id"] = $id_cookie;

  }
}
if (isset($_SESSION['login'])) {
  header("Location: $role/index.php");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PasarSegari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />

  <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <div class="index">
    <div class="navbar-index">    
      <nav style="display: flex; justify-content: space-around; align-items: center; padding-left:20%; padding-right: 20%; height: 15%" class="navbar fixed-top border-bottom border-warning-subtle border-3">
        <img class="icon" src="gambar/Untitled75_20230419165549.png" alt="">
        <a class="atas" href="">Home</a>
        <a class="atas" href="">Toko</a>
        <a class="atas" href="">informasi</a>
        <a class="atas" href="">Contact</a>
        <a class="atas" href="login.php">Login</a>
        <a class="atas" href="register.php">Daftar</a>
        <!-- <a href="" class="link-dark link-offset-2 link-offset-3-hover link-underline-opacity-0 link-underline-opacity-75-hover"><i class="fa-solid fa-angles-left"></i> Kembali</a> -->
      </nav>
    </div>

    <div class='sayur'>
      <h1>Enak Segar Organik</h1>
      <h2>Berbelanja Cepat di Pasar Segari!</h2>
      <p>Kami menjual apa yang baik untuk anda</p>
    </div>
    <div class="konten">
      <div class="konten-sayur">
        <h1>Sayur</h1>
        <p>Kami menyediakan sayur segar yang dapat memenuhi kebutuhan nutrisi anda tiap hari</p>
      </div>
      <div class="konten-buah">
        <h1>Buah</h1>
        <p>Butuh buah yang segar dan manis? Pasar Segari adalah tempatnya</p>
      </div>
      <div class="konten-sembako">
        <h1>Sembako</h1>
        <p>Tersedia bahan untuk mengolah sayur dan buah-buahan secara lengkap</p>
      </div>
    </div>
    <div class="alasan">
      <div class="why">
        <p>Kenapa harus berbelanja di Pasar Segari?</p>
      </div>
      <div class="konten-why">
        <div class="konten-why-gambar">
          <img class="gambar-why" src="gambar/toppng.com-fruits-and-vegetables-1709x979.png" alt="">
        </div>
        <div class="isi-konten-why">
          <h2><span class="material-symbols-outlined">eco</span>100% Organik</h2>
          <p>Sayur dan buah yang dijual berasal dari perkebunan yang menggunakan bahan organik</p>
          <h2><span class="material-symbols-outlined">health_and_safety</span>Sehat & Aman</h2>
          <p>Perkebunan dipantau secara berkala untuk meyakinkan sayur dan buah yang ditanam aman dan sehat untuk dikonsumsi</p>
          <h2><span class="material-symbols-outlined">paid</span>Harga Terjangkau</h2>
          <p>Walaupun online, harga barang di Pasar Segari tidak berbeda dengan pasar lokal yang ada</p>
        </div>
      </div>
    </div>

    <div class="gabung-toko">
      <div class="img-toko">
        <!-- <img src="gambar/gabung-toko.jpg" alt=""> -->
      </div>
      <div class="isi-gabung-toko">
        <h1>Jadilah smart-seller dengan berjualan di Pasar Segari!</h1>
          <a href="register.php">Daftar menjadi penjual sekarang!</a>
      </div>
    </div>
    
    <div class="gabung-user">
      <div class="isi-gabung-user">
        <h1>Bergabung di Pasar Segari untuk memudahkan kamu berbelanja kebutuhan dapur!</h1>
          <a href="register.php">Daftar menjadi pembeli sekarang!</a>
      </div>
      <div class="img-user">
        <!-- <img src="gambar/gabung-toko.jpg" alt=""> -->
      </div>
    </div>

    <div class="testimoni">
      <h1>Testimoni</h1>
      <div class="isi-test">
        <div class="testi1">
          <img class="muka" src="gambar/lutpi.png" alt="">
          <h1>Ahmad Lutfi</h1>
          <p>Pasar Segari sangat memudahkan saya untuk membeli sayuran yang susah didapatkan di pasar lokal</p>
        </div>
        <div class="testi2">
          <img class="muka" src="gambar/IMG_20220327_025433_547-min.jpg" alt="">
          <h1>Nur Avivah</h1>
          <p>Alternatif untuk saya yang malas bepergian</p>
        </div>
        <div class="testi3">
          <img class="muka" src="gambar/fira.jpeg" alt="">
          <h1>Magfira Khansa</h1>
          <p>Untuk saya yang memiliki kesibukan, membeli sayur dan lainnya jadi lebih mudah</p>
        </div>
      </div>
    </div>

    <footer>
      <p>&#169 PasarSegari</p>
    </footer>

  </div>

</body>

</html>