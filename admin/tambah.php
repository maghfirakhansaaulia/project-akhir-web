<?php
session_start();
require 'function.php';   

// https://www.youtube.com/watch?v=-TtwaG60VPk&t=545s

if (isset($_POST['submit'])) {
  tambah($_FILES['art_image'], $_POST);
}

$cat = query("SELECT * FROM kat_artikel");


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
  <title>input data toko</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top shadow-sm" style="background-color: #b0e6aa;">
    <p><span class="material-symbols-outlined">
        arrow_back_ios
      </span></p>
    <a style="margin: 1% 0 1% 0;" class="kembali-add" href="index.php">Kembali</a>
  </nav>

  <form method="post" class="p-5" enctype="multipart/form-data">

    <!-- bagian judul artikel -->
    <p id="deskripsi-tambah">Judul Artikel</p>
    <input type="text" required name="judul"><br>
    
    <!-- bagian kategori -->
    <p id="deskripsi-tambah">Nama Kategori</p>
    <select name="art_kat">
      <?php foreach ($cat as $row) : ?>
        <option value="<?= $row["katA_id"]; ?>"><?= $row["katA_name"]; ?></option>
        <?php endforeach; ?>
      </select><br>
      
      <!-- ini buat bagian tanggal -->
      <p id="deskripsi-tambah">Tanggal Dibuat</p>
      <input type="date" required name="art_tanggal" ><br>

      <!-- ini buat bagian deskripsi -->
      <p id="deskripsi-tambah">Isi Konten</p>
      <textarea name="prd_desc" id="art_desc" cols="30" rows="10"></textarea><br>
      
      <!-- ini buat masukkan gambar -->
      <p id="deskripsi-tambah">Foto Produk</p>
    <input type="file" name="art_image" accept=".jpg,.gif,.png,.jpeg" required>

    <br><input type="submit" name="submit">
  </form>
  <script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('prd_desc');
  </script>
</body>

</html>