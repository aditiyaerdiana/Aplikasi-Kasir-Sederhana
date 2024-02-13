<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$PenjualanID = $_POST['PenjualanID'];

// menginput data ke database
mysqli_query($koneksi,"insert into detailpenjualan values('','$PenjualanID','','','')");
 
// mengalihkan halaman kembali ke data_barang.php
header("location:detail_pembelian.php?PelangganID=$PelangganID");
 
?>