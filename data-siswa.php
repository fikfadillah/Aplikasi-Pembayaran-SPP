<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade text-black" id="data-siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses.php" method="POST">
                    <div class="mb-3">
                        <label for="nisn" class="form-label">Nisn <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" class="form-control" id="nisn" aria-describedby="nisnHelp" name="nisn"
                            required value="<?= $data->generateNisn(); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="form-label">Nis <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" class="form-control" id="nis" name="nis" required
                            value="<?= $data->generateNis(); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama-siswa" class="form-label">Nama Siswa <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" class="form-control" id="nama-siswa" name="nama_lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="#" readonly>-- Pilih Kelas --</option>
                            <?php
                            $rows = $data->tampilKelas();
                            foreach ($rows as $row) {
                                ?>
                                <option value="<?= $row['id_kelas']; ?>">
                                    <?= $row['nama_kelas']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp" class="form-label">No Telp <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <input type="number" class="form-control" id="no-telp" name="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="spp" class="form-label">Spp <sup
                                class="text-danger font-weight-bold">*</sup></label>
                        <select name="spp" id="spp" class="form-control">
                            <option value="#" readonly>-- Pilih Spp --</option>
                            <?php
                            $rows = $data->tampilSpp();
                            foreach ($rows as $row) {
                                ?>
                                <option value="<?= $row['id_spp']; ?>">
                                    <?= number_format($row['nominal']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="btn-tambah-siswa">Save changes</button>
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
        <h5 class="m-0 font-weight-bold text-primary">Data Siswa</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#data-siswa">
                <strong>+ </strong>Tambah Siswa
            </button>
            <table id="table" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Nisn</th>
                        <th>Nis</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Spp</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no   = 1;
                    $rows = $data->tampilSiswa();
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $row["nisn"]; ?>
                            </td>
                            <td>
                                <?= $row["nis"]; ?>
                            </td>
                            <td>
                                <?= $row["nama_siswa"]; ?>
                            </td>
                            <td>
                                <?= $row["nama_kelas"]; ?>
                            </td>
                            <td>
                                <?= $row["jurusan"]; ?>
                            </td>
                            <td>
                                <?= $row["alamat"]; ?>
                            </td>
                            <td>
                                <?= $row["no_telp"]; ?>
                            </td>
                            <td>
                                <?= 'Rp. ' . number_format($row["nominal"]) . ' / Bulan'; ?>
                            </td>
                            <td>
                                <?= $row["username"]; ?>
                            </td>
                            <td>
                                <a href="index.php?page=edit-siswa&id=<?= $row['id_siswa']; ?>" class="btn btn-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="index.php?page=delete-siswa&id=<?= $row['id_siswa']; ?>" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#No</th>
                        <th>Nisn</th>
                        <th>Nis</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Spp</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>