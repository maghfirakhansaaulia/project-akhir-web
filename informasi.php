<?php
require 'functions.php';

$sql = "SELECT * FROM artikel join kat_artikel on artikel.katA_id = kat_artikel.katA_id";
$all_art = $conn->query($sql);

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <script src="https://kit.fontawesome.com/bd49e73b8b.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="login.css" />
</head>

<body>


  <div class="index">
    <div class="navbar-index">
      <nav style="display: flex; justify-content: space-around; align-items: center;  padding-left:20%; padding-right:30%;  height: 12%" class="navbar fixed-top border-bottom border-warning-subtle border-3">
        <!-- <img class="icon" src="gambar/Untitled75_20230419165549.png" alt=""> -->
        <a class="navbar-brand fw-light fs-4" href="index.php"><i class="fa-solid fa-leaf fa-xl" style="color: #116530"></i> PasarSegari</a>
        <a class="atas" href="index.php">Home</a>
        <a class="atas" href="informasi.php">informasi</a>
        <a class="atas" href="login.php">Login</a>
        <a class="atas" href="register.php">Daftar</a>
      </nav>

    </div>
    <h1 class="header-info">Informasi Terbaru</h1>
    <?php
    while ($row = mysqli_fetch_assoc($all_art)) {


    ?>

      <div class="container " style=" background-color: #fcf8f5;">

        <div class="berita">
          <div class="gambar-info">
            <!-- <img src="gambar/2342554562.jpg" alt=""> -->
            <img src="view.php?id_gambar=<?php echo $row['gambar_id']; ?>" alt="">
          </div>
          <div class="judul-info">
            <h1><?php echo $row['artikel_title']; ?></h1>
            <h5> <?php echo $row['katA_name']; ?></h5>
            <p id="tanggal">Tanggal dibuat: <span><?php echo $row['artikel_date'] ?><span></p>
            <p id="konten-info"><?php echo $row['artikel_content']; ?></p>
          </div>

        </div>
      </div>
    <?php
    }
    ?>
  </div>


  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myTable');
  </script>
</body>

</html>