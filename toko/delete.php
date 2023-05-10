<?php
include 'functions.php';

if(isset($_GET['deleteid'])){
  $id = $_GET['deleteid'];

  $hapus = mysqli_query($conn, "DELETE from produk where produk_id=$id");
  if($hapus){
    header('Location: index.php');
    exit();
  } else {
    die(mysqli_error($conn));
  }

}

?>