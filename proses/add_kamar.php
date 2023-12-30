<?php
include 'koneksi.php';

$nama = $_GET['nama'];
$lantai = $_GET['lantai'];
$kapasitas = $_GET['kapasitas'];
$tarif = $_GET['tarif'];
$jenis = $_GET['jenis'];

$kueri1 = mysqli_query($conn, "SELECT * FROM kamar where nama_kamar = '$nama'");
$cek = mysqli_num_rows($kueri1);

if ($cek > 0) {
    header('location:../add_kamar.php?status=duplikat&nama=' . $nama);
} else {
    $kueri = mysqli_query($conn, "INSERT INTO kamar (nama_kamar, lantai, kapasitas, jenis, full) VALUES ('$nama', '$lantai', $kapasitas, '$jenis', 'false')");
    header('location:../add_kamar.php?status=ditambahkan');
}



?>