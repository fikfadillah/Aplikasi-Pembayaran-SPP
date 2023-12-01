<?php
$id = $_GET["id"];

$row = $data->editPetugas($id);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Data Petugas</h5>
    </div>
    <div class="card-body">
       <form action="proses.php" method="POST">
            <input type="hidden" value="<?= $row['id_login']; ?>" name="id_login">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" name="username" required value="<?= $row['username']; ?>">
            </div>
            <div class="mb-3">
                <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama-lengkap" name="nama_lengkap" required value="<?= $row['nama_lengkap']; ?>">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="#" readonly>-- Pilih Role --</option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="btn-update-petugas">Save changes</button>
                <a href="index.php?page=data-petugas" class="btn btn-secondary">Return</a>
            </div>
        </form>
    </div>
</div>