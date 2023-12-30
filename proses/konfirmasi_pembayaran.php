<?php
include 'koneksi.php';

$id = $_GET['id'];
$status = $_GET['status'];

$kueri = mysqli_query($conn, "UPDATE pembayaran SET status = '$status' WHERE id_pembayaran = $id");
header('location:../dt_pembayaran.php?x=pembayaran&status=' . $status);

?>