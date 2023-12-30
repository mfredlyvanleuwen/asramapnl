<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$nip = $_POST['nip'];
$username = $_POST['username'];
$password = $_POST['password'];

$level = 'pengelola';

$upload_foto = $_FILES["upload_foto"];
$targetDirectory = "../images/";
$hasil = uploadGambar($upload_foto, $targetDirectory);
if ($hasil[0] == "success") {
    $namafile = $hasil[1];
    $query = mysqli_query($conn, "INSERT INTO  user (nama_user, nomor_identitas, username, level, password, foto) VALUES ('$nama', $nip,'$username','$level','$password', '$namafile')");
    header('location:../add_pengelola.php?status=berhasil');
} elseif ($hasil[0] == "error") {
    header('location:../add_pengelola.php?status=error');
} else {
    $statusupload = $hasil;
    header('location:../add_pengelola.php?status=error&pesan=' . $statusupload);
}



?>