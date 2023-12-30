<?php

include 'koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jk = $_POST['jk'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$agama = $_POST['agama'];
$email = $_POST['email'];
$password = $_POST['password'];
$no_telp = $_POST['no_telp'];
$nama_ortu = $_POST['nama_ortu'];
$nomor_ortu = $_POST['nomor_ortu'];
$alamatortu = $_POST['$alamatortu'];
$alamat = $_POST['alamat'];
$kode_pos = $_POST['kode_pos'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$pendidikan = $_POST['pendidikan'];
$sekolah = $_POST['sekolah'];
$jurusan = $_POST['jurusan'];
$semester = $_POST['semester'];
$prodi = $_POST['prodi'];

$upload_foto = $_FILES["upload_foto"];

$targetDirectory = "../images/";
$hasil = uploadGambar($upload_foto, $targetDirectory);
if ($hasil[0] == "success") {
    $namafile = $hasil[1];
    $kueri = mysqli_query($conn, "INSERT INTO mahasiswa (nama_mhs, nim, tempat, tgl_lahir, jk, kewarganegaraan, agama, foto, email, no_hp, ortu, no_hp_ortu, alamat, kode_pos, provinsi, kecamatan, pendidikan, nama_sekolah, jurusan, semester, prodi, alamat_ortu, kabupaten) 
VALUES ('$nama', '$nim', '$tempat_lahir', '$tanggal_lahir', '$jk', '$kewarganegaraan', '$agama', '$namafile', '$email', '$no_telp', '$nama_ortu', '$nomor_ortu', '$alamat', '$kode_pos', '$provinsi', '$kecamatan', '$pendidikan', '$sekolah', '$jurusan', '$semester', '$prodi', '$alamatortu', '$kabupaten')");

    $kueri2 = mysqli_query($conn, "INSERT INTO user (nama_user, nomor_identitas, username, level, password) VALUES ('$nama','$nim','$nama','mahasiswa','$password')");

    header("location:../login.php?status=berhasil");
} elseif ($hasil[0] == "error") {
    $statusupload = "Upload Error";
    header("location:../reg.php?status=error");
} else {
    $statusupload = $hasil;
    header("location:../reg.php?status=error");
}


?>