<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$TotalHarga = $_POST['TotalHarga'];
$PenjualanID = $_POST['PenjualanID'];
$PelangganID = $_POST['PelangganID'];

// menginput data ke database
 mysqli_query($koneksi,"update penjualan set TotalHarga='$TotalHarga' where PenjualanID='$PenjualanID'");


// mengalihkan halaman kembali ke detail_pembelian.php
header("location:detail_pembelian.php?PelangganID=$PelangganID");
 
?>