<?php 
include "header.php";
include "navbar.php";
include "sidebar.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <!-- Breadcrumbs or any additional content here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card mt-2">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan']=="simpan"){
                            echo "<script>alert('Data Berhasil di Simpan');</script>";
                        } elseif($_GET['pesan']=="update"){
                            echo "<script>alert('Data Berhasil di Update');</script>"; 
                        } elseif($_GET['pesan']=="hapus"){
                            echo "<script>alert('Data Berhasil di Hapus');</script>"; 
                        }
                    }
                    ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>ID Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Total Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID ");
                                while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['PelangganID']; ?></td>
                                    <td><?php echo $d['NamaPelanggan']; ?></td>
                                    <td><?php echo $d['Alamat']; ?></td>
                                    <td><?php echo $d['NomorTelepon']; ?></td>
                                    <td>Rp. <?php echo $d['TotalHarga']; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="detail_pembelian.php?PelangganID=<?php echo $d['PelangganID']; ?>"><i class="fa fa-info-circle"></i>Detail</a>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['PelangganID']; ?>"><i class="fa fa-edit"></i>Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['PelangganID']; ?>"><i class="fa fa-trash"></i>Delete</button>
                                    </td>
                                </tr>
                                

<!-- Modal Edit Data -->
<div class="modal fade" id="edit-data<?php echo $d['PelangganID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             <form action="proses_update_pembelian.php" method="post">
                  <div class="modal-body">
                        <div class="form-group">
             
                            <input type="text" name="PelangganID" value="<?php echo $d['PelangganID'];?>"class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan </label>
                            <input type="text" name="NamaPelanggan" value="<?php echo $d['NamaPelanggan']; ?>" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="Alamat" value=" <?php echo $d['Alamat']; ?>"class="form-control"autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>No.Telepon</label>
                            <input type="text" name="NomorTelepon" value="<?php echo $d['NomorTelepon']; ?>" class="form-control"autocomplete="off">
                        </div>
                  </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
            </form>
        </div>
    </div>
</div>
                        <!-- Modal hapus Data -->
                        <div class="modal fade" id="hapus-data<?php echo $d['PelangganID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="proses_hapus_pembelian.php">
                                  <div class="modal-body">
                                    <input type="hidden" name="PelangganID" value="<?php echo $d['PelangganID']; ?>">
                                    Apakah Anda yakin akan menghapus data <b><?php echo $d['NamaPelanggan']; ?></b>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                  </div>
                             </form>
                            </div>
                          </div>
                        </div>
                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- Modal Tambah Data -->
        <div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="proses_pembelian.php" method="post">
                  <div class="modal-body">
                        <div class="form-group">
                            <label>ID pelanggan</label>
                            <input type="text" name="PelangganID" value="<?php echo date("dmHi") ?>"class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan </label>
                            <input type="text" name="NamaPelanggan" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="Alamat" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>No.Telepon</label>
                            <input type="text" name="NomorTelepon" class="form-control" autocomplete="off">
                            <input type="hidden" name="TanggalPenjualan" value="<?php echo date("Y-m-d") ?>" class="form-control">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
</div>
<?php include "footer.php"; ?>
