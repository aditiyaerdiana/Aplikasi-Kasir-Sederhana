<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

 
// update data ke database
mysqli_query($koneksi,"update member set nama='$nama', jenkel='$jenkel', alamat='$alamat',telp='$telp' where nik='$nik'");
 
// mengalihkan halaman kembali ke data_member.php
header("location:data_member.php?pesan=update");
 
?>