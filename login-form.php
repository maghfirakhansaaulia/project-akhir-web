<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/bd49e73b8b.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <nav class="navbar fixed-top border-bottom border-warning-subtle border-3">
      <div class="container">
        <div>
          <a class="navbar-brand fw-light fs-4" href="#">PasarSegari</a>
        </div>
        <div class="ml-auto">
          <a
            href="login.php"
            class="link-dark link-offset-2 link-offset-3-hover link-underline-opacity-0 link-underline-opacity-75-hover"
            ><i class="fa-solid fa-angles-left"></i> Kembali</a
          >
        </div>
      </div>
    </nav>
    <div class="main container">
      <div class="login-wrapper container">
        <div class="text-center">
          <i class="ikon fa-sharp fa-solid fa-seedling fa-5x"></i>
          <p class="fs-3 fw-semibold text-capitalize">
            Login
            <?php echo $_GET['role'] ?>
          </p>
        </div>
        <div class="col-md-6 mx-auto">
          <div class="card shadow">
            <div class="card-body">
              <form>
                <div class="row mb-3">
                  <label for="emailLogin" class="col-sm-2 col-form-label"
                    >Email</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="email"
                      class="form-control"
                      id="emailLogin"
                      name="emailLogin"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="passwordLogin" class="col-sm-2 col-form-label"
                    >Password</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="password"
                      class="form-control"
                      id="passwordLogin"
                      name="passwordLogin"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="exampleCheck1"
                    />
                    <label class="form-check-label" for="exampleCheck1"
                      >Ingat saya</label
                    >
                  </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                  <input
                    type="submit"
                    class="btn btn-success"
                    name="login"
                    value="Login"
                  />
                </div>
              </form>
            </div>
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
