<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
} elseif ($_SESSION["role"] !== 'toko') {
  header("Location: ../index.php");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toko</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,400,1,200" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,400,1,200" />
  <link rel="stylesheet" href="style.css">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,0" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

</head>


<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg" id="navbar-toko">
    <a class="navbar-brand" href="#">Pasar Segari</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="#">Features</a>
        <a class="nav-item nav-link" href="#"><span class="material-symbols-outlined">
            shopping_cart
          </span></a>
      </div>
    </div>

    <div class="dropdown mt-3" id="profile-setting">
      <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        username akun
      </button>
      <ul class="dropdown-menu" aria-labelledby="profile-dropdown">
        <li><a href="#" class="dropdown-item">Profile</a></li>
        <li><a href="logout.php" class="dropdown-item">logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- Navbar End -->

  <div class="body">
    <div class="container">
      <!-- searchbar -->
      <div class="searching ">
        <div class="searchbar" style="background-color: #fcf8f5;">
          <form class="form-inline" >
            <input class="input-search" type="search" placeholder="Search" aria-label="Search" id="input-search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
        <div class="filtering">
          <ul class="nav">
            <li class="nav-item me-2">
              <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Vegetable</a>
            </li>
            <li class="nav-item me-2">
              <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Fruits </a>
            </li>
            <li class="nav-item me-0">
              <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Fresh</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- searchbar -->

      <div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="../gambar/product-1.jpg " alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="img/product-6.jpg" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="img/product-7.jpg" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="img/product-8.jpg" alt="">
                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                <span class="text-primary me-1">$19.00</span>
                <span class="text-body text-decoration-line-through">$29.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>


      <h1>Sayur</h1>
      <div class="container text-center">
        <div class="row row-cols-4">
          <div class="col-3">
            <div class="box">
              <div class="tumbnail-row">
                <img class="tumbnail-img" src="gambar/kentang.jpeg" alt="">
              </div>
              <div class="info-jualan">
                <div class="muka-penjual"><img class="pp-penjual" src="gambar/is-loki-alive-1618935098.jpeg" alt=""></div>
                <div class="deskripsi jualan">
                  <div class="judul-jualan">Kentang Anime</div>
                  <div class="harga">Rp100.000 / kg</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="box">
              <div class="tumbnail-row">
                <img class="tumbnail-img" src="gambar/kentang.jpeg" alt="">
              </div>
              <div class="info-jualan">
                <div class="muka-penjual"><img class="pp-penjual" src="gambar/is-loki-alive-1618935098.jpeg" alt=""></div>
                <div class="deskripsi jualan">
                  <div class="judul-jualan">Kentang Anime</div>
                  <div class="harga">Rp100.000 / kg</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="box">
              <div class="tumbnail-row">
                <img class="tumbnail-img" src="gambar/kentang.jpeg" alt="">
              </div>
              <div class="info-jualan">
                <div class="muka-penjual"><img class="pp-penjual" src="gambar/is-loki-alive-1618935098.jpeg" alt=""></div>
                <div class="deskripsi jualan">
                  <div class="judul-jualan">Kentang Anime</div>
                  <div class="harga">Rp100.000 / kg</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="box">
              <div class="tumbnail-row">
                <img class="tumbnail-img" src="gambar/kentang.jpeg" alt="">
              </div>
              <div class="info-jualan">
                <div class="muka-penjual"><img class="pp-penjual" src="gambar/is-loki-alive-1618935098.jpeg" alt=""></div>
                <div class="deskripsi jualan">
                  <div class="judul-jualan">Kentang Anime</div>
                  <div class="harga">Rp100.000 / kg</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>



</body>

</html>