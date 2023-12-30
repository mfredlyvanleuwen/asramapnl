<?php

include 'koneksi.php';

$idmhs = $_GET['idmhs'];

$kueri = mysqli_query($conn, "DELETE FROM penghuni WHERE id_mhs = $idmhs");


header("location:../mahasiswa_kamar.php?id=" . $idmhs . "&status=berhasil");



?>