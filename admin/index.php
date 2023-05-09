<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
} elseif ($_SESSION["role"] !== 'admin') {
  header("Location: ../index.php");
  exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <title>PasarSegari</title>
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

    <link rel="stylesheet" href="css/style.css" />

  </head>
  <body>
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
          
    
          <div class="vr"></div>
          <div class="py-2 px-3 d-flex ms-auto">
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
                  <a class="dropdown-item py-2 btn btn-light" href="logout.php"
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
    <div class="container"><table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Meningkatkan Pengalaman Konsumen di Pasar Modern dengan Teknologi Canggih</td>
      <td>12 Februari 2022</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Bagaimana E-commerce Mempengaruhi Industri Pasar Modern</td>
      <td>15 Maret 2022</td>
      <td>@fat</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Meningkatkan Pengalaman Konsumen di Pasar Modern dengan Teknologi Canggih</td>
      <td>20 April 2022</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td colspan="2">Tantangan dan Peluang Pasar Modern: Menghadapi Persaingan yang Ketat</td>
      <td>1 Mei 2022</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
