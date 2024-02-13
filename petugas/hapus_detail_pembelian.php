<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$DetailID = $_POST['DetailID'];
$PelangganID = $_POST['PelangganID'];

 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from detailpenjualan where DetailID='$DetailID'");
 
// mengalihkan halaman kembali ke detail_pembelian.php
header("location:detail_pembelian.php?PelangganID=$PelangganID");
 
?>