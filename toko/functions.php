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
  $toko = $_SESSION["id"];
  $kategori = $data["prd_kat"];
  $name = htmlspecialchars($data["prd_name"]);
  $v1 = htmlspecialchars($data["prd_v1"]);
  $v2 = htmlspecialchars($data["prd_v2"]);
  $v1pc = htmlspecialchars($data["prd_v1pc"]);
  $v2pc = htmlspecialchars($data["prd_v2pc"]); 
  $desc = $data['prd_desc'];   
  $file_size = $gambar['size'];
  $file_type = $gambar['type'];

  if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
  {
      $image   = addslashes(file_get_contents($gambar['tmp_name']));        
      mysqli_query($conn,"insert into produk (toko_id,produk_name,produk_var1,produk_var2,produk_var1pc,produk_var2pc, katP_id, produk_description)values ($toko,'$name','$v1','$v2',$v1pc,$v2pc,$kategori,'$desc')");
      
      mysqli_query($conn,"insert into gambar (gambar_blb,gambar_type) values ('$image','$file_type')");
      
      $idGambar = findID("gambar");
      $idProduk = findID("produk");
       
      mysqli_query($conn,"UPDATE produk SET gambar_id = $idGambar WHERE produk_id = $idProduk");
      
      header("location:index.php");
  }

}

function ubah($gambar, $data){
  if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];
    
    global $conn;
      $nama = $_POST['prd_name'];
      $varian1 = $data['prd_v1'];
      $kategori_prd = $data["prd_kat"];
      $varian2 = htmlspecialchars($data["prd_v2"]);
      $varian1pc = htmlspecialchars($data["prd_v1pc"]);
      $varian2pc = htmlspecialchars($data["prd_v2pc"]); 
      $deskrip = $data['prd_desc'];   
      $file_sizegambar = $gambar['size'];
      $file_typegambar = $gambar['type'];
    }
    
    if ($file_sizegambar < 2048000 and ($file_typegambar =='image/jpeg' or $file_typegambar == 'image/png'))
    {
      // echo $id, $nama, $varian1, $varian1pc, $deskrip;
        $image   = addslashes(file_get_contents($gambar['tmp_name']));        
        mysqli_query($conn, "UPDATE produk SET produk_name = '$nama', katP_id= $kategori_prd,  produk_var1 = '$varian1', produk_var2 = '$varian2', produk_var1pc = '$varian1pc', produk_var2pc = '$varian2pc', produk_description = '$deskrip' WHERE produk.produk_id=$id");
        
        mysqli_query($conn,"insert into gambar (gambar_blb,gambar_type) values ('$image','$file_typegambar')");
        
        $idGambar = findID("gambar");
        // $idProduk = findID("produk");
         
        // mysqli_query($conn, "UPDATE produk SET produk_name = $nama, produk_var1 = $varian1, produk_var2 = $varian2, produk_var1pc = $varian1pc, produk_var2pc = $varian2pc, produk_description = $deskrip WHERE produk.produk_id=$id");
        mysqli_query($conn,"UPDATE produk SET gambar_id = $idGambar WHERE produk_id = $id");
        
        header("location:index.php");
    }
  
  
}
