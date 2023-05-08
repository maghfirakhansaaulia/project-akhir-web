<?php
$conn = mysqli_connect("localhost", "root", "", "pasar_segari");

function query($query)
{
    global $conn;
    $res = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword)
{
    $query = "SELECT produk.produk_id, produk.produk_name, produk.produk_var1pc, produk.produk_var2pc, produk.produk_var1, produk.produk_var2, produk.gambar_id,produk.produk_description, toko.toko_id, toko.toko_shopname, kat_produk.katP_name 
        from produk join kat_produk on produk.katP_id = kat_produk.katP_id left join toko on produk.toko_id = toko.toko_id WHERE produk.produk_name LIKE '%$keyword%' OR toko.toko_shopname LIKE '%$keyword%' OR kat_produk.katP_name LIKE '%$keyword%'";
    return query($query);
}

?>