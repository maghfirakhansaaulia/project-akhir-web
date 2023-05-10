<?php
$conn = mysqli_connect("localhost", "root", "", "pasar_segari");

function query($query)
{
    global $conn;
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res)>0){
        $row = [];
        while ($row = mysqli_fetch_assoc($res)) {        
            $rows[] = $row;
        }
        return $rows;
    }else{
        $error = 'kosong';
        return $error;
    }
}

function cariProduct($keyword,$filter)
{
    if($filter == 'suitable'){
    $query = "SELECT produk.produk_id, produk.produk_name, produk.produk_var1pc, produk.produk_var1,produk.gambar_id,produk.produk_description, toko.toko_id, toko.toko_shopname, kat_produk.katP_name 
        from produk join kat_produk on produk.katP_id = kat_produk.katP_id left join toko on produk.toko_id = toko.toko_id WHERE produk.produk_status = 'aktif' AND produk.produk_name LIKE '%$keyword%' OR toko.toko_shopname LIKE '%$keyword%' OR kat_produk.katP_name LIKE '%$keyword%'";
    }elseif($filter == 'ASC'){
    $query = "SELECT produk.produk_id, produk.produk_name, produk.produk_var1pc, produk.produk_var1,produk.gambar_id,produk.produk_description, toko.toko_id, toko.toko_shopname, kat_produk.katP_name 
        from produk join kat_produk on produk.katP_id = kat_produk.katP_id left join toko on produk.toko_id = toko.toko_id WHERE produk.produk_status = 'aktif' AND produk.produk_name LIKE '%$keyword%' OR toko.toko_shopname LIKE '%$keyword%' OR kat_produk.katP_name LIKE '%$keyword%' ORDER BY produk.produk_var1pc ASC";
    }elseif($filter == 'DESC'){
    $query = "SELECT produk.produk_id, produk.produk_name, produk.produk_var1pc, produk.produk_var1,produk.gambar_id,produk.produk_description, toko.toko_id, toko.toko_shopname, kat_produk.katP_name 
        from produk join kat_produk on produk.katP_id = kat_produk.katP_id left join toko on produk.toko_id = toko.toko_id WHERE produk.produk_status = 'aktif' AND produk.produk_name LIKE '%$keyword%' OR toko.toko_shopname LIKE '%$keyword%' OR kat_produk.katP_name LIKE '%$keyword%' ORDER BY produk.produk_var1pc DESC";
    }
    return query($query);
}

function beliLangsung($prd,$usr,$data){
    global $conn;
    $date = date('Y-m-d');
    $jumlah = $data['jumlah'];
    $total = $data['hideTotal'];
    settype($jumlah, "integer");
    settype($total, "integer");
    $note = $data['hideNote'];
    
    if("" == trim($note)){
        $note = 'tidak ada';
    }

    mysqli_query($conn,"INSERT INTO transaksi (transaksi_date,transaksi_note,produk_id,user_id,transaksi_amount,transaksi_total) VALUES ('$date','$note',$prd,$usr,$jumlah,$total)");
    
    return mysqli_affected_rows($conn);


}

?>