<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$ProdukID = $_POST['ProdukID'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from produk where ProdukID='$ProdukID'");
 
// mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=hapus");
 
?>