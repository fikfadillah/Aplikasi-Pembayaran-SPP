<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data SPP</h1>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade text-black" id="data-spp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah SPP</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="POST">
            <div class="mb-3">
                <label for="tahun-spp" class="form-label">Tahun <sup class="text-danger font-weight-bold">*</sup></label>
                <input type="text" class="form-control" id="tahun-spp" aria-describedby="tahun-sppHelp" name="tahun_spp" required value="<?= date('Y') . ' / ' . date('Y') + 1; ?>">
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal <sup class="text-danger font-weight-bold">*</sup></label>
                <input type="text" class="form-control" id="nominal" name="nominal" required value="<?= '125000' ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="btn-tambah-spp">Save changes</button>
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
        <h5 class="m-0 font-weight-bold text-primary">Data SPP</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#data-spp">
                <strong>+ </strong>Tambah SPP
            </button>
            <table id="table" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $rows = $data->tampilSpp();
                    foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row["tahun"]; ?></td>
                        <td><?= 'Rp. ' . number_format($row["nominal"]); ?></td>
                        <td>
                            <a href="index.php?page=edit-spp&id=<?= $row['id_spp']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="index.php?page=delete-spp&id=<?= $row['id_spp']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#No</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
 </div>
 