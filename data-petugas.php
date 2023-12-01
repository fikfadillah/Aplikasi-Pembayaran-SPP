<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade text-black" id="data-petugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username <sup class="text-danger font-weight-bold">*</sup></label>
                <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <sup class="text-danger font-weight-bold">*</sup></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="nama-lengkap" class="form-label">Nama Lengkap <sup class="text-danger font-weight-bold">*</sup></label>
                <input type="text" class="form-control" id="nama-lengkap" name="nama-lengkap" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role <sup class="text-danger font-weight-bold">*</sup></label>
                <select name="role" id="role" class="form-control">
                    <option value="#" readonly>-- Pilih Role --</option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="btn-tambah-petugas">Save changes</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Petugas</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#data-petugas">
                <strong>+ </strong>Tambah Petugas
            </button>
            <table id="table" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $rows = $data->tampilPetugas();
                    foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row["username"]; ?></td>
                        <td><?= $row["nama_lengkap"]; ?></td>
                        <td><?= $row["role"]; ?></td>
                        <td>
                            <a href="index.php?page=edit-petugas&id=<?= $row['id_login']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="index.php?page=delete-petugas&id=<?= $row['id_login']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
 </div>
 