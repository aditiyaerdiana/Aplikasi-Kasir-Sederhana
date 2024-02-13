<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <!-- Breadcrumbs or any additional content here -->
                </div>
            </div>
        </div>
    </div>

        <div class="content">
        <div class="container-fluid">
            <div class="card mt-2">
                <div class="card-body">
                   <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>

               <div class="card-body">

                    <?php if (isset($_GET['pesan'])) : ?>
                        <script>
                            alert('<?php echo "Data Berhasil ".$_GET['pesan']; ?>');
                        </script>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Username</th>
                                    <th>Akses Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM petugas");
                                while ($d = mysqli_fetch_array($data)) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['nama_petugas']; ?></td>
                                        <td><?php echo $d['username']; ?></td>
                                        <td>
                                            <?php echo ($d['level'] == 'admin') ? 'Administrator' : 'Petugas'; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['id_petugas']; ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['id_petugas']; ?>">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Data -->
                                    <div class="modal fade" id="edit-data<?php echo $d['id_petugas']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="proses_update_petugas.php" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input type="hidden" name="id_petugas" value="<?php echo $d['id_petugas']; ?>">
                                    <input type="text" name="nama_petugas" class="form-control" value="<?php echo $d['nama_petugas']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="text" name="password" class="form-control" autocomplete="off">
                                    <small class="text-danger"> Kosongkan Kalau Tidak Merubah Password</small>
                                </div>
                                    <div class="form-group">
                                    <label>Akses Petugas</label>
                                    <select name="level" class="form-control">
                                        <option>--- Pilih Akses ---</option>
                                        <option value="admin" <?php if ($d['level']=='admin') {echo "selected";} ?>>Administrator</option>
                                        <option value="petugas" <?php if ($d['level']=='petugas') {echo "selected";} ?>>petugas</option>
                                    </select>
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
                                    <div class="modal fade" id="hapus-data<?php echo $d['id_petugas']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="proses_hapus_petugas.php">
                                  <div class="modal-body">
                                    <input type="hidden" name="id_petugas" value="<?php echo $d['id_petugas']; ?>">
                                    Apakah Anda yakin akan menghapus data <b><?php echo $d['nama_petugas']; ?></b>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">
                                    Hapus</button>
                                  </div>
                             </form>
                            </div>
                          </div>
                        </div>

                                <?php endwhile; ?>
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
              <form action="proses_simpan_petugas.php" method="post">
                  <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="password" class="form-control" autocomplete="off">
                        </div>
                  <div class="form-group">
                    <label>Akses Petugas</label>
                    <select name="level" class="form-control">
                        <option>--- Akses Petugas ---</option>
                        <option value="admin">Administrator</option>
                        <option value="petugas">Petugas</option>
                    </select>
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
