<?php

$id = $_GET["id"];
$id_login = $_SESSION["user"]["id_login"];

$row = $data->editSiswa($id);
$bulanBelumLunas = $data->getBulanBelumLunas($row['id_siswa']);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Biodata Siswa</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nis</th>
                <td><?= $row['nis']; ?></td>
            </tr>
            <tr>
                <th>Nama Siswa</th>
                <td><?= $row['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td><?= $row['nama_kelas']; ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td><?= $row['jurusan']; ?></td>
            </tr>
            <tr>
                <th>Tahun Ajaran</th>
                <td><?= $row['tahun']; ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Tagihan SPP Siswa</h2>
    </div>
    <div class="card-body">
        <form action="proses.php" method="POST">
            <input type="hidden" name="id_login" value="<?= $id_login; ?>">
            <input type="hidden" name="id_siswa" value="<?= $row['id_siswa']; ?>">
            <input type="hidden" name="id_spp" value="<?= $row['id_spp']; ?>">
            <div class="mb-3">
                <label for="bulan" class="form-label">Bayar Bulan <sup class="text-danger font-weight-bold">*</sup></label>
                <select name="bulan" id="bulan" class="form-control" required>
                    <option value="">-- Pilih Bulan --</option>
                    <?php
                    $bulanArray = [
                        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ];

                    // Tampilkan hanya bulan-bulan yang belum lunas
                    foreach ($bulanArray as $bulan) {
                        if (!in_array($bulan, $bulanBelumLunas)) {
                            echo "<option value='$bulan'>$bulan</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nominal" class="form-label">Jumlah Bayar <sup class="text-danger font-weight-bold">*</sup></label>
                <input type="text" class="form-control" id="nominal" name="nominal" value="<?= number_format($row['nominal']); ?>" readonly>
            </div>
            <div class="mb-">
                <button type="submit" name="btn-pembayaran" class="btn btn-primary">Bayar</button>
                <a href="index.php?page=pembayaran-spp" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
