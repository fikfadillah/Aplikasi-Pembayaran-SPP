<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pembayaran / Transaksi SPP</h1>
</div>
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Pembayaran Siswa</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">  
            <table id="table" class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Nis</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Spp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $rows = $data->tampilSiswa();
                    foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row["nis"]; ?></td>
                        <td><?= $row["nama_lengkap"]; ?></td>
                        <td><?= $row["nama_kelas"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                        <td><?= 'Rp. ' . number_format($row["nominal"]) . ' / Bulan'; ?></td>
                        <td>
                            <a href="index.php?page=transaksi-pembayaran&id=<?= $row['id_siswa']; ?>" class="btn btn-success"><i class="fa-solid fa-cash-register"></i> Bayar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                         <th>#No</th>
                        <th>Nis</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Spp</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
 </div>
 