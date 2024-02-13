<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
</head>

    <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
        <a href= "index.php" class="brand-link">
      <div class="image">
        <img src="../assets/kasir.png" alt="logo" style="max-width: 80px; max-height: 80px;" />
        <span class="brand-text font-weight-light" class="text-center"><b>KASIR PREMIUM</b></span>
    </a>
      <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="../assets/pengguna.jpg" alt="logo" class="img-circle elevation-2" alt="User Image">        
      </div>
        <div class="info">
          <a href="../administrator/index.php" class="d-block"><?='Aditiya Erdiana'?></a>
        </div>
      </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="data_barang.php" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>
                  Data Barang
                </p>
              </a>
            </li>
            <li class="nav-header">Transaksi</li>
            <li class="nav-item">
              <a href="pembelian.php" class="nav-link">
                <i class="nav-icon fa fa-shopping-cart"></i>
                <p>
                  Penjualan
                </p>
              </a>
            </li>
            <li class="nav-header">System</li>
            <li class="nav-item">
              <a href="data_pengguna.php" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Data Pengguna
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="data_member.php" class="nav-link">
                <i class="nav-icon fa fa-id-card"></i>
                <p>
                  Data Member
                </p>
              </a>
            </li>
            <li class="nav-header">Report</li>
            <li class="nav-item">
              <a href="laporan_periode.php" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../logout.php" class="nav-link">
                <i class="nav-icon fa fa-sign-out"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>
</html>