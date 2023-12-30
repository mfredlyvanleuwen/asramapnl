<?php
include 'koneksi.php';


$upload_foto = $_FILES["upload_foto"];

$targetDirectory = "../../images/bukti_pembayaran/";
$hasil = uploadGambar($upload_foto, $targetDirectory);

if ($hasil[0] == "success") {
    $idtagihan = $_POST['idtagihan'];
    $nomor_identitas = $_SESSION['nomor_identitas'];

    $k = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = $nomor_identitas");
    $rk = mysqli_fetch_array($k);
    $idmhs = $rk['id_mhs'];

    $namafile = $hasil[1];
    $kueri = mysqli_query($conn, "INSERT INTO pembayaran (id_tagihan, id_mhs, foto_bukti_pembayaran ) VALUES ('$idtagihan', '$idmhs', '$namafile')");

    header("location:../index.php?x=tagihan&status=berhasil");
} elseif ($hasil[0] == "error") {
    $statusupload = 'Upload Error';
    header("location:../index.php?x=tagihan&status=" . $statusupload);
} else {
    $statusupload = $hasil;
    header("location:../index.php?x=tagihan&status=" . $statusupload);
}


?>