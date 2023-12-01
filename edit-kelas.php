<?php
$id = $_GET["id"];

$row = $data->editKelas($id);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Data Kelas</h5>
    </div>
    <div class="card-body">
       <form action="proses.php" method="POST">
            <input type="hidden" value="<?= $row['id_kelas']; ?>" name="id_kelas">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" aria-describedby="nama_kelasHelp" name="nama_kelas" required value="<?= $row['nama_kelas']; ?>">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required value="<?= $row['jurusan']; ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="btn-update-kelas">Save changes</button>
                <a href="index.php?page=data-kelas" class="btn btn-secondary">Return</a>
            </div>
        </form>
    </div>
</div>