<?php

include 'koneksi.php';

$nama = $_GET['nama'];
$nim = $_GET['nim'];
$tempat_lahir = $_GET['tempat_lahir'];
$tanggal_lahir = $_GET['tanggal_lahir'];
$jk = $_GET['jk'];
$kewarganegaraan = $_GET['kewarganegaraan'];
$agama = $_GET['agama'];
$email = $_GET['email'];
$no_telp = $_GET['no_telp'];
$nama_ortu = $_GET['nama_ortu'];
$nomor_ortu = $_GET['nomor_ortu'];
$alamatortu = $_GET['alamatortu'];
$alamat = $_GET['alamat'];
$kode_pos = $_GET['kode_pos'];
$provinsi = $_GET['provinsi'];
$kabupaten = $_GET['kabupaten'];
$kecamatan = $_GET['kecamatan'];
$pendidikan = $_GET['pendidikan'];
$sekolah = $_GET['sekolah'];
$jurusan = $_GET['jurusan'];
$semester = $_GET['semester'];
$prodi = $_GET['prodi'];

$id = $_GET['id'];


$kueri = mysqli_query($conn, "UPDATE mahasiswa SET nim = '$nim', nama_mhs = '$nama', tempat = '$tempat_lahir', tgl_lahir = '$tanggal_lahir', jk = '$jk', kewarganegaraan = '$kewarganegaraan', agama = '$agama', email = '$email', no_hp = '$no_telp', kode_pos = '$kode_pos', alamat = '$alamat', provinsi = '$provinsi', kabupaten = '$kabupaten', kecamatan = '$kecamatan', ortu = '$nama_ortu', no_hp_ortu = '$nomor_ortu', alamat_ortu = '$alamatortu', pendidikan = '$pendidikan', nama_sekolah = '$sekolah', jurusan = '$jurusan', prodi = '$prodi', semester = $semester  WHERE id_mhs = $id");

header("location:../edit_mahasiswa.php?id=" . $id . "&status=berhasil");



?>