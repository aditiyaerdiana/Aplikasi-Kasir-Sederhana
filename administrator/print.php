<!DOCTYPE html>
<html>
<head>
  <title>CETAK LAPORAN KASIR PREMIUM</title>
</head>
<body>
 
  <center>
 
    <h2>DATA LAPORAN BARANG</h2>
  </center>
 
  <?php 
  include '../koneksi.php';
  ?>
 
  <table border="1" style="width: 100%">
    <tr>
      <th width="1%">No</th>
      <th>Nama Produk</th>
      <th>Jumlah Produk</th>
      <th width="5%">Subtotal</th>
      <th>Tanggal Penjualan</th>
    </tr>
    <?php 
    $no = 1;
   if(isset($_POST['Tampilkan'])){
                $tgl_awal=mysqli_real_escape_string($koneksi,$_POST['awal']);
                $tgl_akhir=mysqli_real_escape_string($koneksi,$_POST['akhir']);
                $data = mysqli_query($koneksi,"SELECT * from penjualan inner join detailpenjualan on penjualan.PenjualanID=detailpenjualan.PenjualanID inner join  produk on detailpenjualan.ProdukID=produk.ProdukID WHERE TanggalPenjualan BETWEEN '$tgl_awal' AND '$tgl_akhir'");
            }
            else  {
                $data = mysqli_query($koneksi,"SELECT * from penjualan inner join detailpenjualan on penjualan.PenjualanID=detailpenjualan.PenjualanID inner join  produk on detailpenjualan.ProdukID=produk.ProdukID");
            }

    while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $d['NamaProduk']; ?></td>
      <td><?php echo $d['JumlahProduk']; ?></td>
      <td><?php echo $d['Subtotal']; ?></td>
      <td><?php echo $d['TanggalPenjualan']; ?></td>
    </tr>
    <?php 
    }
    ?>
  </table>
 
  <script>
    window.print();
  </script>
 
</body>
</html>