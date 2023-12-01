<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Laporan Pembayaran</h2>
    </div>
    <div class="card-body">
        <table class="table" id="table-laporan">
            <thead>
                <tr>
                    <th>#No</th>
                    <th>Petugas</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Dibayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $rows = $data->tampilLaporan();
                foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td><?= $row['nama_siswa']; ?></td>
                    <td><?= $row['tgl_bayar']; ?></td>
                    <td><?= $row['bulan_dibayar']; ?></td>
                    <td><?= 'Rp. ' . number_format($row['jumlah_bayar']); ?></td>
                    <td><span class="badge text-bg-success"><?= $row['keterangan']; ?></span></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>