<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$nik = $_POST['nik'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from member where nik='$nik'");
 
// mengalihkan halaman kembali ke data_member.php
header("location:data_member.php?pesan=hapus");
 
?>