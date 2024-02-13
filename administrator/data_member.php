<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data member</h1>
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

                    <?php if (isset($_GET['pesan'])) : ?>
                        <script>
                            alert('<?php echo "Data Berhasil ".$_GET['pesan']; ?>');
                        </script>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table  class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM member");
                                while ($d = mysqli_fetch_array($data)) :
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['nik']; ?></td>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td><?php echo $d['jenkel']; ?></td>
                                        <td><?php echo $d['alamat']; ?></td>
                                        <td><?php echo $d['telp']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['nik']; ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['nik']; ?>">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Data -->
                                    <div class="modal fade" id="edit-data<?php echo $d['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="proses_update_member.php" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="nik" class="form-control" value="<?php echo $d['nik']; ?>" autocomplete="off" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>"autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenkel" class="form-control">
                                        <option>--- Pilih Akses ---</option>
                                        <option value="laki-laki" <?php if ($d['jenkel']=='laki-laki') {echo "selected";} ?>>laki-laki</option>
                                        <option value="perempuan" <?php if ($d['jenkel']=='perempuan') {echo "selected";} ?>>Perempuan</option>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>"autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="text" name="telp" class="form-control" value="<?php echo $d['telp']; ?>"autocomplete="off">
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
                                    <div class="modal fade" id="hapus-data<?php echo $d['nik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="proses_hapus_member.php">
                                  <div class="modal-body">
                                    <input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
                                    Apakah Anda yakin akan menghapus data <b><?php echo $d['nama']; ?></b>
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

<?php include "footer.php"; ?>
