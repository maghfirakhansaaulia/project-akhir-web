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

function phpalert($bny)
{
  echo "        
    <script>    
        Swal.fire({
          title: 'Transaksi Berhasil!',
          text: 'Kamu membeli sebanyak {$bny} Item',
          icon: 'success',
          confirmButtonText: 'Save',                    
        }).then((result) => {
          window.location.href = 'index.php';
        })                              
    </script>
    ";
}

$prdID = $_SESSION['prdID'];

$prdd = query("SELECT * from produk join kat_produk on produk.katP_id = kat_produk.katP_id left join toko on produk.toko_id = toko.toko_id WHERE produk.produk_id = {$prdID}");

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
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="sweetalert2.all.min.js"></script>
      <script src="sweetalert2.min.js"></script>
      <link rel="stylesheet" href="sweetalert2.min.css">

      <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="bg-white" id="bd">
    <nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm">
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
            <form class="d-flex">
              <div class="input-group">
                <input
                type="text"
                class="form-control bg-white border border-success"
                placeholder="Aku mau belanja..."
                aria-label="Recipient's username"
                aria-describedby="button-addon2"
                />
                <button class="btn btn-outline-success" type="button" id="button-addon2">
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
                <a class="dropdown-item btn btn-light" href="#"
                ><i class="fa-solid fa-carrot fa-lg" style="color: #ed9121"></i> Sayur Segar</a
                >
              </li>
              <li>
                <a class="dropdown-item btn btn-light" href="#"
                    ><i class="fa-solid fa-apple-whole fa-lg" style="color: #8db600"></i> Buah
                    Segar</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item btn btn-light" href="#"
                    ><i class="fa-solid fa-egg fa-lg" style="color: #f4bb29"></i> Sembako</a
                    >
                  </li>
                </ul>
            </li>
          </ul>
          <div class="py-2 px-4 ms-auto">
            <a href="" class="link-dark position-relative">
              <i class="fa-sharp fa-solid fa-cart-shopping fa-lg"></i>
              <span
              class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"
              >
              <span class="visually-hidden">New alerts</span>
            </span>
          </a>
        </div>
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
                <a class="dropdown-item py-2 btn btn-light" href="history.php"
                ><i class="fa-solid fa-clock-rotate-left fa-lg"></i> Histori Transaksi</a
                >
              </li>
                <li>
                  <a class="dropdown-item py-2 btn btn-light" href="logout.php"
                    ><i class="fa-sharp fa-solid fa-right-from-bracket fa-lg"></i> Logout</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="container">        
          <div class="row gx-4 py-2 mt-5">
            <div class="col-lg-8">
              <div class="bg-white p-2 rounded-2 shadow"> 
                <div class="row justify-content-start">   
                  <div class="col-1 py-2">
                    <i class="fa-sharp fa-solid fa-shop fa-2xl" style="color: #666;"></i>
                  </div> 
                  <div class="col-5">
                  <?php foreach ($prdd as $rows): ?>                                                                                                                               
                      <a class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover fw-semibold px-1 " href=""><?= $rows['toko_shopname']; ?></a>
                      <p class="text-body-secondary"><i class="fa-sharp fa-solid fa-location-dot"></i> <?= $rows['toko_address']; ?></p>
                    </div>
                  </div>
                </div>
                <div class="bg-white p-3 rounded-2 shadow mt-3">
                  <div class="row">
                    <div class="col-lg-2">
                      <img
                      src="view.php?id_gambar=<?php echo $rows['gambar_id']; ?>"
                      class="card-img-top object-fit-cover rounded-2"
                      height="120"
                      alt="..."
                      />
                    </div>
                    <div class="col-lg-5">
                      <p class="fs-4 lh-1"><?= $rows['produk_name']; ?></p>
                    </div>
                    <div class="col-lg-5">                           
                      <div class="form-floating form-floating-sm">
                        <input type="number" id="typeNumber" class="form-control"  min=1  max=10  value=1 onchange="myFunction(<?= $rows['produk_var1pc']; ?>)"/>
                        <label for="typeNumber">Jumlah</label>
                      </div>
                        <p id="msg"></p>                                          
                        <p class="fs-4 text-danger fw-bold text-end" id="total"></p>                     
                      </div>                  
                    </div>
                  </div> 
                  <div class="bg-white p-2 rounded-2 shadow mt-3"> 
                    <div class="row">
                      <div class="col-lg-2"></div>
                      <div class="col-lg-10">
                        <div class="form-floating p-2">
                          <input type="text" class="form-control" id="footNote" placeholder="Catatan untuk toko" onkeyup="note()">
                          <label for="footNote">Catatan untuk toko</label>
                        </div>
                      </div>
                    </div>
                  </div>           
                </div>
                <div class="col-lg-4 p-2">
                  <div class="sticky-top z-2" style="top:12%">
                    <div class="bg-white rounded-2 shadow">
                      <div class="p-3 d-grid gap-1">                                  
                        <p class="fs-4">Total Pembayaran</p>                                        
                        <p class="fs-4 text-danger fw-bold" id="total2"></p>        
                        <form method="post">                        
                          <input type="hidden" id="jumlah" name="jumlah" >
                          <input type="hidden" id="hideNote" name="hideNote" >
                          <input type="hidden" id="hideTotal" name="hideTotal" >
                          <button class="btn py-2 fw-semibold btn-success w-100" name="btnBeli" id="btnBeli">Beli Sekarang</button> 
                      </form>
                      <script>document.getElementById("bd").onload = function() {myFunction(<?= $rows['produk_var1pc']; ?>)};</script>                  
                    <?php endforeach; ?>                             
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="js/transaction.js"></script>    
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"
    ></script>
    <?php
    if (isset($_POST['btnBeli'])) {
      if (beliLangsung($prdID, $_SESSION["id"], $_POST) > 0) {
        phpalert($_POST['jumlah']);
      }
    }
    ?>
  </body>
</html>
  