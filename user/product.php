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

if (!isset($_SESSION['prdID'])) {
  header("Location: index.php");
  exit;
}

$prdID = $_SESSION['prdID'];

$prdd = query("SELECT * from produk join kat_produk on produk.katP_id = kat_produk.katP_id left join toko on produk.toko_id = toko.toko_id WHERE produk.produk_id = {$prdID}");

$aktif = 1;

if (isset($_POST['vart2'])) {
  $aktif = 2;
}
if (isset($_POST['vart1'])) {
  $aktif = 1;
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

  <body class="bg-white" id="bd">
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
                    ><i class="fa-solid fa-clock-rotate-left fa-lg"></i> Histori
                    Transaksi</a>
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
    <div class="container-floid bg-light">
      <div class="container">
        <div class="row gx-4 py-2 mt-5" id="products">
          <div class="col-lg-9">
            <div class="bg-white p-2 rounded-2 shadow">
              <div class="row">                
                <?php foreach ($prdd as $rowd): ?>                
                    <div class="col-lg-6">
                      <img
                        src="view.php?id_gambar=<?php echo $rowd['gambar_id']; ?>"
                        class="rounded-2 mx-auto d-block object-fit-cover"
                        height="350px"                    
                        alt="..."
                        width="100%"
                      />
                    </div>
                    <div class="col-lg-6">                            
                      <p class="fs-4 lh-1"><?php echo mb_strimwidth($rowd['produk_name'], 0, 58, "...") ?></p> 
                      <p class="fs-4 text-danger fw-bold" id="pc"></p>                                                                          
                      <script>document.getElementById("bd").onload = function() {myVariant('var1', <?= $rowd['produk_var1pc']; ?>)};</script>
                      <hr class="border opacity-50">
                      <p class="fw-semibold">Varian</p>                      
                      <button type="button" name="var" id="var1" class="btn btn-sm btn-outline-secondary" onclick="myVariant('var1', <?= $rowd['produk_var1pc']; ?>)"><?= $rowd['produk_var1']; ?></button>                                             
                      <button type="button" name="var" id="var2" class="btn btn-sm btn-outline-secondary" onclick="myVariant('var2', <?= $rowd['produk_var2pc']; ?>) "><?= $rowd['produk_var2']; ?></button>                                             
                      <hr class="border opacity-50">
                      <div class="py-4">
                        <i class="fa-sharp fa-solid fa-shop fa-xl" style="color: #666;"></i><a class="link-dark link-offset-1-hover 
                      link-underline-opacity-0 link-underline-opacity-100-hover fw-semibold px-1 " href="setID.php?key=<?= $rowd['toko_id']; ?>&goto=store"><?= $rowd['toko_shopname']; ?></a>
                      </div>
                    </div>
                <?php endforeach; ?>                             
              </div>
            </div>
            <div class="bg-white p-2 rounded-2 shadow mt-3">
              <div class="row">
                <div class="col-lg-5">
                  <p  class="sticky-top z-2 text-nowrap border-3 border-bottom fs-4 fw-semibold" style="width: 4.5rem; top:12%">Informasi Barang</p>
                </div>
                
                <div class="border-start col-lg-7">   
                  <p class="fs-5 fw-semibold pb-2">Kategori - <a class="link-dark text-capitalize" href="setID.php?key=sayur&goto=products"><?= $rowd['katP_name']; ?></a></p>               
                  <p class="fs-5 fw-semibold">Deskripsi</p>
                  <div class="lh-1"><?= $rowd['produk_description']; ?></div>                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 p-2">
            <div class="sticky-top z-2" style="top:12%">
              <div class="bg-white rounded-2 shadow-sm">
                <div class="p-3 d-grid gap-2">
                  <button class="btn py-2 fw-semibold btn-outline-success" id="keranjang" type="button" onclick="simpanSesi(<?php echo $prdID; ?>)"><i class="fa-solid fa-cart-plus fa-xl"></i> Masukkan Keranjang</button>
                  <button class="btn py-2 fw-semibold btn-success" type="button" onclick="transction()">Beli Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <script>
      
      function konfirAlert() {
        Swal.fire({
          title: "Tersimpan!",
          text: "Produk tersimpan dikeranjang",
          icon: "success",
          confirmButtonText: "OK",
        }).then((result) => {
          window.location.href = "setID.php?key=&goto=products";
        });
      }
        // sementara masih simpan di sessionStorage
      function simpanSesi(id){ 
        if (sessionStorage.getItem("item") !== null) {
          let ar = sessionStorage.getItem("item");
          let idPrd = JSON.parse(ar)
          idPrd.push(id);          
          sessionStorage.setItem("item",JSON.stringify(idPrd));
        } else {
          let ar = [id];
          sessionStorage.setItem("item",JSON.stringify(ar));
        }
        konfirAlert();
      }
      </script>           
    <script src="js/variant.js"></script>       
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
