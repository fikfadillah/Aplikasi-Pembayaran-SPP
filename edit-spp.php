<?php
$id = $_GET["id"];

$row = $data->editSpp($id);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Data Spp</h5>
    </div>
    <div class="card-body">
        <form action="proses.php" method="POST">
            <input type="hidden" value="<?= $row['id_spp']; ?>" name="id_spp">
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" aria-describedby="tahunHelp" name="tahun" required
                    value="<?= $row['tahun']; ?>">
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="text" class="form-control" id="nominal" name="nominal" required
                    value="<?= number_format($row['nominal']); ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="btn-update-spp">Save changes</button>
                <a href="index.php?page=data-spp" class="btn btn-secondary">Return</a>
            </div>
        </form>
    </div>
</div>