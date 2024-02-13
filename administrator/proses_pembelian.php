<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$Alamat = $_POST['Alamat'];
$NomorTelepon = $_POST['NomorTelepon'];
$TanggalPenjualan = $_POST['TanggalPenjualan'];


// menginput data ke database
mysqli_query($koneksi,"insert into pelanggan values('$PelangganID','$NamaPelanggan','$Alamat','$NomorTelepon')");
mysqli_query($koneksi,"insert into penjualan values('','$TanggalPenjualan','','$PelangganID')");
 
// mengalihkan halaman kembali ke data_barang.php
header("location:pembelian.php?pesan=simpan");
 
?>