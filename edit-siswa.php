<?php
$id = $_GET["id"];

$row = $data->editSiswa($id);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h5>
    </div>
    <div class="card-body">
       <form action="proses.php" method="POST">
            <input type="hidden" value="<?= $row['id_siswa']; ?>" name="id_siswa">
            <div class="mb-3">
                <label for="nisn" class="form-label">Nisn</label>
                <input type="text" class="form-control" id="nisn" aria-describedby="nisnHelp" name="nisn" required value="<?= $row['nisn']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">Nis</label>
                <input type="text" class="form-control" id="nis" aria-describedby="nisHelp" name="nis" required value="<?= $row['nis']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkapHelp" name="nama_lengkap" required value="<?= $row['nama_lengkap']; ?>">
            </div>
            <div class="mb-3">
                <label for="nama-lengkap" class="form-label">Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                    <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                    <hr><hr><hr>
                    <?php
                    $rowss = $data->tampilKelas();
                    foreach ($rowss as $rows) {
                    ?>
                        <option value="<?= $rows['id_kelas']; ?>"><?= $rows['nama_kelas']; ?></option>
                    <?php } ?>
                </select>
            </div>
             <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" aria-describedby="alamatHelp" name="alamat" required value="<?= $row['alamat']; ?>">
            </div>
             <div class="mb-3">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="no_telp" aria-describedby="no_telpHelp" name="no_telp" required value="<?= $row['no_telp']; ?>">
            </div>
            <div class="mb-3">
                <label for="spp" class="form-label">Spp</label>
                <select name="spp" id="spp" class="form-control">
                    <option value="<?= $row['id_spp']; ?>"><?= number_format($row['nominal']); ?></option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="btn-update-siswa">Save changes</button>
                <a href="index.php?page=data-siswa" class="btn btn-secondary">Return</a>
            </div>
        </form>
    </div>
</div>