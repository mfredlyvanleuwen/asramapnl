<?php

include 'koneksi.php';


$id = $_GET['id'];
$idkamar = $_GET['idkamar'];


$status = '';

$kueri = mysqli_query($conn, "SELECT * FROM penghuni WHERE id_mhs = $id");
$cek = mysqli_num_rows($kueri);

if ($cek > 0) {
    $q = mysqli_query($conn, "UPDATE penghuni SET id_kamar = $idkamar WHERE id_mhs = $id");
    $status = 'berhasil';
} else {
    $q = mysqli_query($conn, "INSERT INTO penghuni (id_kamar, id_mhs) VALUES ($idkamar, $id)");
    $status = 'berhasil';
}

header("location:../mahasiswa_kamar.php?id=" . $id . "&status=berhasil");



?>