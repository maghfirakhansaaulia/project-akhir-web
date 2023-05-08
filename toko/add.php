<?php
session_start();
require 'functions.php';

// https://www.youtube.com/watch?v=-TtwaG60VPk&t=545s

if(isset($_POST['submit'])){
  tambah($_FILES['prd_image'],$_POST);
   
}

$cat = query("SELECT * FROM kat_produk");


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>    
  </head>
  <body>
    <a href="index.php">Balek</a>
    <h1>Hello,</h1>
    <form method="post" class="p-3" enctype="multipart/form-data">

      <!-- bagian nama produk -->
      <input type="text" required name="prd_name" placeholder="pisang balikpapan"><br>
      
      <!-- bagian kategori -->
      <select name="prd_kat">
        <?php foreach($cat as $row) : ?>
        <option value="<?= $row["katP_id"]; ?>"><?= $row["katP_name"]; ?></option>
        <?php endforeach; ?>         
      </select><br>

      <!-- ini buat bagian varian1 -->      
      <input type="text" required name="prd_v1" placeholder="500g"><br>
      
      <!-- ini buat bagian varian2 -->
      <input type="text" name="prd_v2" placeholder="1kg"><br>
      
      <!-- ini buat bagian harga varian1  -->      
      <input type="number" required name="prd_v1pc" placeholder="11200"><br>
      
      <!-- ini buat bagian harga varian2  -->
      <input type="number" name="prd_v2pc" placeholder="21900"><br>
      
      <!-- ini buat bagian deskripsi -->
      <textarea name="prd_desc" id="prd_desc" cols="30" rows="10"></textarea><br>
      
      <!-- ini buat masukkan gambar -->
      <input type="file" name="prd_image" accept=".jpg,.gif,.png,.jpeg" required >
      
      <input type="submit" name="submit">
    </form>        
    <script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'prd_desc' );</script>    
  </body>
</html>