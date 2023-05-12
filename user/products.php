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

if(!isset($_SESSION['key'])){
  $key = 'semua';
  $prdd = query("SELECT * FROM produk WHERE produk_status = 'aktif'");
  $filter = 'suitable';
}

if(isset($_SESSION['key'])){
  $key = $_SESSION['key'];
  $prdd = cariProduct($key,'suitable');
}

if (isset($_POST["search"])) { 
  $key = $_POST["keyword"];
  $filter = $_POST["filter"];
  $prdd = cariProduct($key,$filter);
}


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
                    ><i class="fa-solid fa-carrot fa-lg" style="color: #ed9121"></i> Sayur Segar</a
                  >
                </li>
                <li>
                  <a class="dropdown-item btn btn-light" href="setID.php?key=buah&goto=products"
                    ><i class="fa-solid fa-apple-whole fa-lg" style="color: #8db600"></i> Buah
                    Segar</a
                  >
                </li>
                <li>
                  <a class="dropdown-item btn btn-light" href="setID.php?key=sembako&goto=products"
                    ><i class="fa-solid fa-egg fa-lg" style="color: #f4bb29"></i> Sembako</a
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
    <div class="container-fluid" >
      <div class="row g-1 px-5">
        <div class="col-lg-4 col-md-6">
          <div class="col">
            <div id="scrollspyAtas" class="p-3 fs-4 fw-semibold text-capitalize">Product</div>
          </div>
        </div>
      </div>
      <div class="row gx-4 py-2 px-5 bg-light ">
        <div class="col-lg-3 col-md-3">
          <div class="sticky-top z-2" style="top:12%">
            <div class="bg-white rounded-2 shadow-sm">
              <div class="p-3">
                <p class="fs-4 fw-semibold">Filter</p>
                <hr class="border border-secondary border-1" />
                <form method="post">
                  
                  <label for="keyword" class="form-label mb-0  fs-5 fw-semibold">Pencarian</label>
                  <input
                  type="text"
                  class="form-control bg-white border border-success"
                  placeholder="Aku mau belanja..."                                   
                  name="keyword"
                  id="keyword"                  
                  autocomplete="off"
                  />
                  <label for="filter" class="form-label mb-0 mt-2 fs-5 fw-semibold">Harga</label>
                  <!-- <p class="fs-5 fw-semibold mb-0 mt-2">Harga</p>                -->
                  <select class="form-select border-success" name='filter' id="filter">
                    <option value="suitable">Paling Sesuai</option>
                    <option value="ASC">Terendah</option>
                    <option value="DESC">Tertinggi</option>
                  </select>
                  <div class="d-md-flex justify-content-md-end">
                    <button class="btn btn-success w-50 mt-3 " type="submit" name="search" id="searchBTN" >
                      <i class="bi bi-search"></i> Cari
                    </button>
                  </div>                
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <div class="bg-white shadow-sm rounded-2 mb-3">
            <p class="fs-4 p-2 text-capitalize">Hasil Pencarian <?php echo $key ?></p>
          </div>
          <div class="bg-white shadow-sm rounded-2">
            <div id="products" class="p-2">
              <div class="row row-cols-md-4 g-4 mb-3">
                <?php if($prdd != 'kosong'){foreach ($prdd as $rowd): ?>                                                                                                                               
                <div class="col">
                  <div class="card hover-effect h-100 w-100">
                    <img
                      src="view.php?id_gambar=<?php echo $rowd['gambar_id']; ?>"
                      class="card-img-top"
                      height="200"                      
                      width="100"                      
                    />
                    <div class="card-body">
                      <!-- sampai sini -->
                      <a                                                                        
                        class="link-dark link-offset-1-hover link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product">
                        <p class="card-text">
                          <?php echo mb_strimwidth($rowd['produk_name'], 0, 58, "...") ?>
                        </p>                        
                      </a>
                      <p class="card-text text-secondary">
                        <?php echo mb_strimwidth("{$rowd['produk_var1']},{$rowd['produk_var2']}", 0, 23, "...") ?>
                      </p>
                    </div>
                    <div class="card-footer bg-white border border-0">
                      <p class="fw-semibold fs-4">
                        <?php echo "Rp" . number_format($rowd['produk_var1pc'], 0, "", "."); ?>
                      </p>
                    </div>
                    <div class="card-footer bg-white border text-center border-0">
                      <a href="setID.php?key=<?= $rowd['produk_id']; ?>&goto=product" class="btn btn-success fw-semibold w-100 rounded-1"
                        >Beli Sekarang</a>
                    </div>
                  </div>
                </div>             
                <?php endforeach; } else{?>
                  <div class="col mb-0">
                    <div class="alert alert-danger" role="alert">
                      <i class="fa-solid fa-triangle-exclamation"></i> Tidak Ditemukan
                    </div>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="fixed-bottom d-md-flex justify-content-md-end py-2 px-1">
        <a class="btn btn-outline-success border-2 scrollspyBTN me-md-2" href="#scrollspyAtas"><i class="fa-solid fa-angles-up"></i></a>
      </div>
    </div>  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>