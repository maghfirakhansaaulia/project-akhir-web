
<?php
session_start();

require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
} elseif ($_SESSION["role"] !== 'user') {
  header("Location: ../index.php");
  exit;
}

if (isset($_POST["search"])) { 
  $key = $_POST["keyword"];
  header("Location: setID.php?key=$key&goto=products");
}
$prdd = query("SELECT * FROM transaksi JOIN produk on transaksi.produk_id = produk.produk_id WHERE transaksi.user_id = {$_SESSION['id']}");

$usr = query("SELECT user_email FROM user WHERE user_id = {$_SESSION['id']}");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>User</title>
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
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <script src="sweetalert2.all.min.js"></script>
        <script src="sweetalert2.min.js"></script>
    
    
        <link rel="stylesheet" href="css/style.css" />
    </head>
      
    <body class="bg-white">
      <nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm z-3">
        <div class="container">
      <div class="py-2">
        <a class="navbar-brand fw-light fs-4" href="index.php"
        ><i class="fa-solid fa-leaf fa-xl" style="color: #116530"></i> PasarSegari</a
        >
      </div>
      <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="py-2 px-3 w-75">
          <form class="d-flex" method="post">
            <div class="input-group">
              <input
              type="text"
              class="form-control bg-white border border-success"
              placeholder="Aku mau belanja..."
              name="keyword"          
              />
              <button class="btn btn-outline-success" type="submit" name="search">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown me-1">
            <a
            class="nav-link dropdown-toggle text-dark"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            >
            Kategori
          </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item btn btn-light" href="setID.php?key=sayur&goto=products"
                ><i class="fa-solid fa-carrot fa-lg" style="color: #ed9121"></i> Sayur
                Segar</a
                >
              </li>
              <li>
                <a class="dropdown-item btn btn-light" href="setID.php?key=buah&goto=products"
                ><i class="fa-solid fa-apple-whole fa-lg" style="color: #8db600"></i>
                Buah Segar</a
                >
              </li>
              <li>
                <a class="dropdown-item btn btn-light" href="setID.php?key=sembako&goto=products"
                ><i class="fa-solid fa-egg fa-lg" style="color: #f4bb29"></i>
                  Sembako</a
                >
              </li>
            </ul>
          </li>
        </ul>       
      <div class="vr"></div>
      <div class="py-2 px-3 d-flex">
        <div class="dropdown">
            <a
              href=""
              class="link-dark dropdown-toggle btn btn-outline-light rounded-1 border-0"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              >
              <i class="fa-solid fa-circle-user fa-xl"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <?php foreach ($usr as $rows): ?>
                  <a class="dropdown-item py-2 btn btn-light">
                    <?= $rows['user_email'] ?>
                  </a>                
                <?php endforeach; ?>   
              </li>
              <li>
                <a class="dropdown-item py-2 btn btn-light" href="history.php"
                ><i class="fa-solid fa-clock-rotate-left fa-lg"></i> Histori
                Transaksi</a
                >
              </li>
              <li>
                <a class="dropdown-item py-2 btn btn-light" href="logout.php"
                ><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg"></i>
                Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="bg-white shadow-sm rounded-2 mt-3 p-4">
      <table class="table table-hover table-sm align-middle">
        <thead class="table-success">
          <tr>
            <th scope="col">#</th>
            <th colspan="2" scope="col">Produk</th>
            <th scope="col">Catatan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php $i = 1; ?>
          <?php if($prdd != 'kosong'){foreach ($prdd as $row): ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><img src="view.php?id_gambar=<?php echo $row['gambar_id']; ?>" width="100"/></td>
            <td><?= $row['produk_name']; ?></td>
            <td><?= $row['transaksi_note']; ?></td>
            <td><?= $row['transaksi_date']; ?></td>
            <td><?= $row['transaksi_amount']; ?></td>
            <td><?= $row['transaksi_total']; ?></td>              
          </tr>
        </tbody>
        <?php $i++; ?>
        <?php endforeach; } else{?>
          <tbody class="table-group-divider">    
          <tr>           
            <td colspan="7">
              <div class="alert alert-warning" role="alert">
                <i class="fa-solid fa-money-bill-wave"></i> Anda Belum Melakukan Transaksi
              </div>
            </td>              
          </tr>
        </tbody>         
          <?php }?>
        </table>
      </div>
  </div>
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
      ></script>
  </body>
</html>