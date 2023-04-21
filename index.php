<?php
session_start();
require 'functions.php';

$role = '';

if (isset($_COOKIE['id_usr']) && isset($_COOKIE['role_usr']) && isset($_COOKIE['email_usr'])) {
  $role = $_COOKIE['role_usr'];
  $id_cookie = $_COOKIE['id_usr'];
  $email_cookie = $_COOKIE['email_usr'];

  $result = mysqli_query($conn, "SELECT {$role}_email FROM {$role} WHERE {$role}_id = {$id_cookie}");
  $row = mysqli_fetch_assoc($result);

  $salt = "1ni92r7%4$" . $row["{$role}_email"];
  if ($email_cookie === hash('sha384', $salt)) {
    $_SESSION['login'] = true;
    $_SESSION["role"] = $role;

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
  <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <div class="navbar-index">
    <!-- <h1>ini navbar</h1>
    <h1>ini navbar</h1>
    <h1>ini navbar</h1>
    <h1>ini navbar</h1>
    <h1>ini navbar</h1> -->
    <nav style="display: flex; justify-content: space-around; align-items: center; padding-left:20%; padding-right: 20%; height: 15%" class="navbar fixed-top border-bottom border-warning-subtle border-3">
      <img class="icon" src="gambar/Untitled75_20230419165549.png" alt="">
      <a class="atas" href="">Home</a>
      <a class="atas" href="">Toko</a>
      <a class="atas" href="">Petani</a>
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
</body>

</html>