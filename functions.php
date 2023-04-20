<?php
$conn = mysqli_connect("localhost", "root", "", "pasar_segari");

//fun registrasi
function registrasi($data, $role)
{
    global $conn;

    $name = strtolower(stripcslashes($data["namaRegis"]));
    $name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $data["passwordRegis"]);
    $password2 = mysqli_real_escape_string($conn, $data["passwordRegis2"]);
    $email = mysqli_real_escape_string($conn, $data["emailRegis"]);
    $phone = mysqli_real_escape_string($conn, $data["noHpRegis"]);
    $address = mysqli_real_escape_string($conn, $data["alamatRegis"]);

    if ($role === "toko") {
        $shop_name = mysqli_real_escape_string($conn, $data["tokoRegis"]);
    } elseif ($role === "petani") {
        $farmer_group = mysqli_real_escape_string($conn, $data["kelompokRegis"]);
    }



    //cek email    
    if ($role === "toko") {
        $colEmail = "toko_email";
    } elseif ($role === "petani") {
        $colEmail = "petani_email";
    } else {
        $colEmail = "user_email";
    }

    $res = mysqli_query($conn, "SELECT $colEmail FROM $role WHERE $colEmail = '$email'");
    if (mysqli_fetch_assoc($res)) {
        $msg = "email";
        return $msg;
    }

    // cek password
    if ($password !== $password2) {
        $msg = "password";
        return $msg;
    }
    //hashing password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //tambah user ke db

    if ($role === "toko") {
        mysqli_query($conn, "INSERT INTO $role VALUES('', '$name', '$phone', ' $shop_name', '$email', '$address', '$password')");
    } elseif ($role === "petani") {
        mysqli_query($conn, "INSERT INTO $role VALUES('', '$name', '$phone', '$email', '$farmer_group', '$address', '$password')");
    } else {
        mysqli_query($conn, "INSERT INTO $role VALUES('', '$name', '$phone', '$email', '$address', '$password')");
    }


    return mysqli_affected_rows($conn);
}

?>