<?php
include 'koneksi.php';

$id = $_GET['id'];
$status = $_GET['status'];

$kueri = mysqli_query($conn, "UPDATE tagihan SET status = '$status' WHERE id_tagihan = $id");
header('location:../tagihan.php?x=tagihan&status=' . $status);

?>