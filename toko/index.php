<?php
session_start();
error_reporting(0);

require 'functions.php';


if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
} elseif ($_SESSION["role"] !== 'toko') {
  header("Location: ../index.php");
  exit;
}

$id_masuk = $_SESSION['id'];
$produk = query("SELECT * FROM produk join kat_produk on produk.katP_id = kat_produk.katP_id where toko_id = $id_masuk");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toko</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">

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
            </div>
          </form>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown me-1">
          </li>
        </ul>
        <div class="py-2 px-4 ms-auto">
        </div>
        <div class="vr"></div>
        <div class="py-2 px-3 d-flex ">
          <div class="dropdown">
            <a href="" class="link-dark dropdown-toggle btn btn-outline-light rounded-1 border-0" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-circle-user fa-xl"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item py-2 btn btn-light" href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg"></i> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>


  <div id="kont" class="container">
    <a class="btn btn-primary" id='tombol-tambah' href="add.php">Tambah</a>
    <table class="table pt-4 table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Foto</th>
          <th scope="col">Produk</th>
          <th scope="col">Deskripsi Produk</th>
          <th scope="col">varian</th>
          <th scope="col">harga</th>
          <th scope="col">Kategori</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php $i = 1;;
        ?>
        <?php foreach ($produk as $row) : ?>

          <tr>
            <th scope="row"><?= $i;
                            $id = $row['produk_id']; ?></th>
            <td><img src="view.php?id_gambar=<?php
                                              $gambar = $row['gambar_id'];
                                              echo $gambar;
                                              ?>" width="100" /></td>
            <td><?= $row['produk_name'];
                ?></td>
            <td><?= $row['produk_description'] ?></td>
            <td><?= $row['produk_var1'] . ' , ' . $row['produk_var2'] ?></td>
            <td><?= 'Rp', $row['produk_var1pc'] . ' , ' . 'Rp', $row['produk_var2pc'] ?></td>
            <td><?= $row['katP_name'] ?></td>
            <td>
              <button class="btn btn-success" style="margin-bottom: 5%;">
                <a style="text-decoration: none; color: white; " href='modify.php?updateid=<?= $id ?>'>ubah</a>
              </button>
              <button class="btn btn-danger">
                <a style="text-decoration: none; color: white;" href="delete.php?deleteid=<?= $id ?>">hapus</a>
              </button>

            </td>
          </tr>

          <?php $i++;

          ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script>
    let table = new DataTable('.table');
  </script>
</body>

</html>