<?php 
$conn = mysqli_connect("localhost", "root", "", "pasar_segari");

function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $row = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

function findID($kolom){
  global $conn;
  $query = mysqli_query($conn, "SELECT MAX({$kolom}_id) FROM $kolom;");    
  $result = mysqli_fetch_array($query);
  return $result[0];    
}

function tambah($gambar,$data){
  global $conn;
  $admin = $_SESSION["id"];
  $kategori = $data["art_kat"];
  $judul = htmlspecialchars($data["judul"]);
  $tanggal = $data["art_tanggal"];
  $desc = $data['art_desc'];   
  $file_size = $gambar['size'];
  $file_type = $gambar['type'];

  if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
  {
      $image   = addslashes(file_get_contents($gambar['tmp_name']));        
      // mysqli_query($conn,"insert into produk (toko_id,produk_name,produk_var1,produk_var2,produk_var1pc,produk_var2pc, katP_id, produk_description) values ($toko,'$name','$v1','$v2',$v1pc,$v2pc,$kategori,'$desc')");
      mysqli_query($conn,"insert into artikel (artikel_title, artikel_content, artikel_date, katA_id, admin_id) values 
      ('$judul','$desc', str_to_date('$tanggal', '%Y-%d-%m'), $kategori, $admin)");
      
      mysqli_query($conn,"insert into gambar (gambar_blb,gambar_type) values ('$image','$file_type')");
      
      $idGambar = findID("gambar");
      $idArtikel = findID("artikel");
       
      mysqli_query($conn,"UPDATE artikel SET gambar_id = $idGambar WHERE artikel_id = $idArtikel");
      
      header("location:index.php");
  }
}


function ubah($gambar, $data){
  if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];
    
    global $conn;
      $title = $data['judul'];
      $kategori_art = $data["art_kat"];
      $date = $data['art_tanggal'];   
      $deskrip = $data['art_desc'];   
      $file_sizegambar = $gambar['size'];
      $file_typegambar = $gambar['type'];
    }
    
    if ($file_sizegambar < 2048000 and ($file_typegambar =='image/jpeg' or $file_typegambar == 'image/png'))
    {
        $image   = addslashes(file_get_contents($gambar['tmp_name']));        
        mysqli_query($conn, "UPDATE artikel SET artikel_title = '$title', katA_id= $kategori_art,  artikel_date = '$date', artikel_content = '$deskrip' WHERE artikel.artikel_id=$id");
        
        mysqli_query($conn,"insert into gambar (gambar_blb,gambar_type) values ('$image','$file_typegambar')");
        
        $idGambar = findID("gambar");
        mysqli_query($conn,"UPDATE artikel SET gambar_id = $idGambar WHERE artikel_id = $id");
        
        header("location:index.php");
    }
  
  
}


?>