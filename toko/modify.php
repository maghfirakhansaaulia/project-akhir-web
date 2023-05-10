<?php 
session_start();

require 'functions.php';

if (isset($_POST['submit'])){
  ubah($_FILES['prd_image'], $_POST);
}
$cat = query("SELECT * FROM kat_produk");


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,700,0,0" />
  <title>update data toko</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top shadow-sm" style="background-color: #b0e6aa;">
    <a style="margin: 1% 0 1% 2%;" class="kembali-add" href="index.php">< Kembali</a>
  </nav>

  <form method="post" class="p-5" enctype="multipart/form-data">

    <!-- bagian nama produk -->
    <p id="deskripsi-tambah">Nama Produk</p>
    <input type="text" required name="prd_name" placeholder="pisang balikpapan"><br>
    
    <!-- bagian kategori -->
    <p id="deskripsi-tambah">Nama Kategori</p>
    <select name="prd_kat">
      <?php foreach ($cat as $row) : ?>
        <option value="<?= $row["katP_id"]; ?>"><?= $row["katP_name"]; ?></option>
        <?php endforeach; ?>
      </select><br>
      
      <!-- ini buat bagian varian1 -->
      <p id="deskripsi-tambah">varian 1</p>
      <input type="text" required name="prd_v1" placeholder="500g"><br>
      <!-- ini buat bagian harga varian1  -->
      <input type="number" required name="prd_v1pc" placeholder="11200"><br>
      
      <!-- ini buat bagian varian2 -->
      <p id="deskripsi-tambah">Varian 2</p>
      <input type="text" name="prd_v2" placeholder="1kg"><br>
      <!-- ini buat bagian harga varian2  -->
      <input type="number" name="prd_v2pc" placeholder="21900"><br>
      
      
      
      <!-- ini buat bagian deskripsi -->
      <p id="deskripsi-tambah">Deskripsi Produk</p>
      <textarea name="prd_desc" id="prd_desc" cols="30" rows="10"></textarea><br>
      
      <!-- ini buat masukkan gambar -->
      <p id="deskripsi-tambah">Foto Produk</p>
    <input type="file" name="prd_image" accept=".jpg,.gif,.png,.jpeg" required>

    <br><input type="submit" name="submit">
  </form>
  <script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('prd_desc');
  </script>
</body>

</html>