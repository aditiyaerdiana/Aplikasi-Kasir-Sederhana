<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

 
// menginput data ke database
mysqli_query($koneksi,"insert into member values('$nik','$nama','$jenkel','$alamat','$telp')");
 
// mengalihkan halaman kembali ke data_barang.php
header("location:data_member.php?pesan=simpan");
 
?>