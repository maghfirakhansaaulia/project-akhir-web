<?php
require 'function.php';
if (isset($_GET['id_gambar'])) {
    global $conn;
    $query = mysqli_query($conn, "select * from gambar where gambar_id ='" . $_GET['id_gambar'] . "'");
    $row = mysqli_fetch_array($query);
    header("Content-type: " . $row["gambar_type"]);
    echo $row["gambar_blb"];
} else {
    header('location: index.php');
}
?>