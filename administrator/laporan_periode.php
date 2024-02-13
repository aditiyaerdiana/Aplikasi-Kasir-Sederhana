<?php
include "header.php";
include "navbar.php";
include "sidebar.php";
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Data Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <!-- Breadcrumb or any other content for the header -->
                </div>
            </div>
        </div>
    </div>

<div class="card mt-2">
<div class="card-body">
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rentang Tanggal</title>
</head>
<body>

    <div class="container mt-3">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form10" target="_self">                                                           
        <div class="row">
          <div class="col-lg-3">
            <input name="awal" type="date" class="form-control" value="<?php echo $tgl_awal; ?>" size="10" /> 
          </div>
          <div class="col-lg-3">
           <input name="akhir" type="date" class="form-control" value="<?php echo  $tgl_akhir; ?>" size="10" />
          </div>

          <div class="col-lg-3">            
          <input name="Tampilkan" class="btn btn-success" type="submit" value="Tampilkan" />
          </div>      
        </div>
        </form>
    </div>
    <br>
    <?php
    include '../koneksi.php';
        if(isset($_POST['Tampilkan'])) {
                $tgl_awal=mysqli_real_escape_string($koneksi,$_POST['awal']);
                $tgl_akhir=mysqli_real_escape_string($koneksi,$_POST['akhir']);
                echo"Dari tanggal " .$tgl_awal. "Sampai tanggal ".$tgl_akhir; 
            }
    ?>
    <table class="table table-bordered table-striped table-sm mt-3">
        <thead class="thead-dark">
        <tr class="table-dark" class="fw-bold" align="center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah beli</th>
            <th>Subtotal</th>
            <th>Tanggal Penjualan</th>
        </tr>
    </thead>
    <?php
     include '../koneksi.php';
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
        <?php }?>
    </table>
    <div class="row">
  <div class="col-lg-3">
    <a href="print.php" class="btn btn-primary">Cetak Laporan</a>
   </div>
</div> 
</div>
</div>
</body>
</html>
</div>
</div>
<?php include "footer.php"; ?>
