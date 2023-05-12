<?php
session_start();
require 'functions.php';


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



$role = $_GET['role'];

if ($role === "toko") {
  $ikon = "ikon fa-solid fa-shop fa-5x";
} elseif ($role === "user") {
  $ikon = "ikon fa-solid fa-user-large fa-5x";
} else {
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register |
    <?php echo $role; ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <nav class="navbar fixed-top border-bottom border-warning-subtle border-3">
    <div class="container">
      <div>
        <a class="navbar-brand fw-light fs-4" href="index.php"><i class="fa-solid fa-leaf fa-xl"
        style="color: #116530"></i> PasarSegari</a>
      </div>
      <div class="ml-auto">
        <script>
          document.write('<a href="' + document.referrer + '" class="link-dark link-offset-2 link-offset-3-hover link-underline-opacity-0 link-underline-opacity-75-hover"><i class="fa-solid fa-angles-left"></i>Kembali</a>');
          </script>
      </div>
    </div>
  </nav>
  <div class="main container">
    <div class="first-wrapper container">
      <div class="text-center">
        <i class="<?php echo $ikon ?>"></i>
        <p class="fs-3 fw-semibold text-capitalize">
          Register
          <?php echo $role ?>
        </p>
      </div>
      <div class="col-7 mx-auto">
        <div class="card shadow">
          <div class="card-body">
            <form method="post">
              <?php if (isset($msg)): ?>
                <div class="alert alert-danger py-3" id="err" role="alert">
                  <?php echo $msg; ?>
                </div>
              <?php endif; ?>
              <div class="row mb-3">
                <label for="namaRegis" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="namaRegis" name="namaRegis" required />
                </div>
              </div>
              <div class="row mb-3">
                <label for="noHpRegis" class="col-sm-2 col-form-label">Nomor Hp</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="noHpRegis" name="noHpRegis" required />
                </div>
              </div>
              <div class="row mb-3">
                <label for="emailRegis" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="emailRegis" name="emailRegis" required />
                </div>
              </div>
              <hr class="border border-success border-2 opacity-25">
              <div class="mb-3">
                <?php if ($role === "toko") {
                  echo
                  "
                  <label for='tokoRegis' class='form-label'>Nama Toko</label>                  
                  <input type='text' class='form-control' id='tokoRegis' name='tokoRegis' required/>                    
                  ";
                } ?>
              </div>              
              <div class="mb-3">
                <label for="alamatRegis" class="form-label">Alamat</label>
                <textarea class="form-control" rows="3" id="alamatRegis" name="alamatRegis" required></textarea>
                
              </div>
              <hr class="border border-success border-2 opacity-25">
              <div class="row mb-3 g-3">
                <div class="col-md-6">
                  <label for="passwordRegis" class="form-label">Password</label>
                  <input type="password" class="form-control" id="passwordRegis" name="passwordRegis" required />
                </div>
                <div class="col-md-6">
                  <label for="passwordRegis2" class="form-label">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="passwordRegis2" name="passwordRegis2" required />
                </div>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <input type="submit" class="btn btn-success" name="register" value="Daftar" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"></script>
  <?php
  if (isset($_POST["register"])) {
    if (registrasi($_POST, $role) == 1) {
      header("Location: $role/index.php");
    } elseif (registrasi($_POST, $role) == "email") {
      $msg = "Email sudah terpakai!!";
    } elseif (registrasi($_POST, $role) == "password") {
      $msg = "Konfirmasi password tidak sesuai!!";
    } else {
      echo mysqli_error($conn);
    }
  }
  ?>
</body>

</html>