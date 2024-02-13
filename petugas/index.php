<?php

$title = "Dashboard | POS KASIR";
require "header.php";
require "navbar.php";
require "sidebar.php";

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-8">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                    include '../koneksi.php';
                    $data_produk = mysqli_query($koneksi,"SELECT*FROM produk");
                    $jumlah_produk = mysqli_num_rows($data_produk);
                    ?>
                    <h3><?php echo $jumlah_produk; ?></h3>
                <p>Data Barang</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="data_barang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-8">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php 
                    include '../koneksi.php';
                    $data_penjualan = mysqli_query($koneksi,"SELECT*FROM penjualan");
                    $jumlah_penjualan = mysqli_num_rows($data_penjualan);
                    ?>
                    <h3><?php echo $jumlah_penjualan; ?></h3>

                <p>Data Penjualan</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="pembelian.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    </div>
  </div>
  </div>
    <!-- /.content -->

<?php 
require "footer.php"
 ?>