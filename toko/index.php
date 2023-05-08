<?php
session_start();

require 'functions.php';


if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
} elseif ($_SESSION["role"] !== 'toko') {
  header("Location: ../index.php");
  exit;
}

$produk = query("SELECT * FROM produk join kat_produk on produk.katP_id = kat_produk.katP_id");

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toko</title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/bd49e73b8b.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="style.css" />

</head>


<body>
    <nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm">
      <div class="container">
        <div class="py-2">
          <a class="navbar-brand fw-light fs-4" href="index.php"><i class="fa-solid fa-leaf fa-xl" style="color: #116530"></i> PasarSegari</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="py-2 px-3 w-75">
            <form class="d-flex">
              <div class="input-group">
                <input type="text" class="form-control bg-white border border-success" placeholder="Aku mau belanja..." aria-label="Recipient's username" aria-describedby="button-addon2" />
                <button class="btn btn-outline-success" type="button" id="button-addon2">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown me-1">
              <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item btn btn-light " href="products.php?c=sayur"><i class="fa-solid fa-carrot fa-lg" style="color: #ed9121"></i> Sayur
                    Segar</a>
                </li>
                <li>
                  <a class="dropdown-item btn btn-light " href="products.php?c=buah"><i class="fa-solid fa-apple-whole fa-lg" style="color: #8db600"></i> Buah
                    Segar</a>
                </li>
                <li>
                  <a class="dropdown-item btn btn-light " href="products.php?c=sembako"><i class="fa-solid fa-egg fa-lg" style="color: #f4bb29"></i> Sembako</a>
                </li>
              </ul>
            </li>
          </ul>
          <div class="py-2 px-4 ms-auto">
            <a href="" class="link-dark position-relative">
              <i class="fa-sharp fa-solid fa-cart-shopping fa-lg"></i>
              <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
              </span>
            </a>
          </div>
          <div class="vr"></div>
          <div class="py-2 px-3 d-flex ">
            <div class="dropdown">
              <a href="" class="link-dark dropdown-toggle btn btn-outline-light rounded-1 border-0" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-circle-user fa-xl"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item py-2 btn btn-light" href="logout.php"><i class="fa-solid fa-clock-rotate-left fa-lg"></i> Histori Transaksi</a>
                </li>
                <li>
                  <a class="dropdown-item py-2 btn btn-light" href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg"></i> Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>

    
    <div class="mt-3  container">
      <a class="btn btn-primary" href="add.php">Tambah</a>
    <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php $i = 1; ?>  
    <?php foreach($produk as $row) : ?>

    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $row['produk_name'] ?></td>
      <td><?= $row['katP_name'] ?></td>
      <td>
        <a href="" class="btn btn-success"></a>
        <a href="" class="btn btn-danger"></a>
      </td>
    </tr>
    
    <?php $i ++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"
></script>
</body>

</html>