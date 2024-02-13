<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$PelangganID = $_POST['PelangganID'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pelanggan where PelangganID='$PelangganID'");
mysqli_query($koneksi,"delete from penjualan where PelangganID='$PelangganID'");

 
// mengalihkan halaman kembali ke data_barang.php
header("location:pembelian.php?pesan=hapus");
 
?>