<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | PasarSegari</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <nav class="navbar fixed-top border-bottom border-warning-subtle border-3">
      <div class="container">
        <div>
          <a class="navbar-brand fw-light fs-4" href="index.php">PasarSegari</a>
        </div>
        <div class="ml-auto">
          <a
            href="index.php"
            class="link-dark link-offset-2 link-offset-3-hover link-underline-opacity-0 link-underline-opacity-75-hover"
            ><i class="fa-solid fa-angles-left"></i>Kembali</a
          >
        </div>
      </div>
    </nav>
    <div class="main container">
      <div class="first-wrapper container text-center">
        <p class="fs-3 fw-semibold">Pilih satu</p>
        <form action="login-form.php" method="get">
          <div class="row justify-content-center g-2">
            <div class="col-lg-4 d-flex">
              <div class="p-3">
                <div class="card hover-effect">
                  <div class="card-body">
                    <i class="ikon fa-sharp fa-solid fa-seedling fa-5x"></i>
                    <h5 class="card-title mt-3 fs-3">Petani</h5>
                    <p class="card-text text-center">
                      Masuk sebagai
                      <span class="fw-semibold">Petani</span> untuk kelola sayur lebih mudah, tingkatkan produktivitas
                      dan keuntungan Anda!
                    </p>
                    <button href="#" class="btn btn-costom stretched-link fw-medium w-25" name="role" value="petani">
                      Masuk
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex">
              <div class="p-3">
                <div class="card hover-effect">
                  <div class="card-body">
                    <i class="ikon fa-solid fa-shop fa-5x"></i>
                    <h5 class="card-title mt-3 fs-3">Toko</h5>
                    <p class="card-text text-center">
                      Kelola toko sayur dengan lebih efisien, tawarkan pengalaman belanja yang lebih baik, dan
                      tingkatkan kesuksesan bisnis Anda!
                    </p>
                    <button href="#" class="btn btn-costom stretched-link fw-medium w-25" name="role" value="toko">
                      Masuk
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex">
              <div class="p-3">
                <div class="card hover-effect">
                  <div class="card-body">
                    <i class="ikon fa-solid fa-user-large fa-5x"></i>
                    <h5 class="card-title mt-3 fs-3">User</h5>
                    <p class="card-text text-center">
                      Belanja sayur segar semakin mudah dan menyenangkan dengan aplikasi online terpercaya yang lengkap
                      dan aman!
                    </p>
                    <button href="#" class="btn btn-costom stretched-link fw-medium w-25" name="role" value="user">
                      Masuk
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="second-wrapper container text-center">
        <p class="fs-3 fw-semibold mb-4">Daftar akun PasarSegari</p>
        <div class="d-flex justify-content-center g-5">
          <div class="p-1">
            <a href="register-form.php?role=petani" class="btn btn-lg btn-costom rounded-1"
              >Petani <i class="fa-solid fa-up-right-from-square fa-2xs"></i
            ></a>
          </div>

          <div class="p-1">
            <a href="register-form.php?role=toko" class="btn btn-lg btn-costom rounded-1"
              >Toko <i class="fa-solid fa-up-right-from-square fa-2xs"></i
            ></a>
          </div>

          <div class="p-1">
            <a href="register-form.php?role=user" class="btn btn-lg btn-costom rounded-1"
              >User <i class="fa-solid fa-up-right-from-square fa-2xs"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
