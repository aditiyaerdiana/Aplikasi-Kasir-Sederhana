<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_petugas = $_POST['id_petugas'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from petugas where id_petugas='$id_petugas'");
 
// mengalihkan halaman kembali ke data_pengguna.php
header("location:data_pengguna.php?pesan=hapus");
 
?>