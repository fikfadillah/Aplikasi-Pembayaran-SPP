<?php
namespace App;

use DateTime;
use Inc\Koneksi;

date_default_timezone_set('Asia/Jakarta');

class Spp extends Koneksi {

    public function generateNisn()
    {
        $tahunMasuk       = date('Y');
        $randomAngka      = str_pad(mt_rand(1, 9999), 2, '0', STR_PAD_LEFT);
        $counter          = 1;
        $counterFormatted = str_pad($counter, 3, '0', STR_PAD_LEFT);


        $nisn = $tahunMasuk . $randomAngka . $counterFormatted;

        return $nisn;
    }

    public function getTimeNow()
    {
        $date    = new DateTime();
        $format  = "d F Y, H:i:s";
        $timeNow = $date->format($format);

        return $timeNow;
    }

    public function generateNis()
    {
        $tahunMasuk    = date('Y');
        $tahunDuaDigit = substr($tahunMasuk, -2);
        $randomAngka   = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        $nis = $tahunDuaDigit . $randomAngka;

        return $nis;
    }

    public function chekUser($username, $password)
    {
        $sql  = "SELECT * FROM tb_login WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result && password_verify($password, $result["password"])) {
            $_SESSION["user"] = $result;
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        if ($this->chekUser($username, $password)) {
            return true;
        } else {
            return false;
        }
    }

    public function tampilPetugas()
    {
        $sql  = "SELECT * FROM tb_login WHERE role='Admin' OR role='Petugas' ORDER BY id_login ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }

    public function tambahPetugas()
    {
        $username     = $_POST["username"];
        $password     = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $nama_lengkap = $_POST["nama-lengkap"];
        $role         = $_POST["role"];

        $sql = "INSERT INTO tb_login (username, password, nama_lengkap, role) VALUES (:username, :password, :nama_lengkap, :role)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":nama_lengkap", $nama_lengkap);
        $stmt->bindParam(":role", $role);
        $stmt->execute();
    }

    public function editPetugas($id)
    {
        $sql  = "SELECT * FROM tb_login WHERE id_login = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch();
        return $row;
    }

    public function updatePetugas()
    {
        $username     = $_POST["username"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $role         = $_POST["role"];
        $id           = $_POST["id_login"];

        $sql = "UPDATE tb_login SET
        username=:username,
        nama_lengkap=:nama_lengkap,
        role=:role WHERE id_login=:id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":nama_lengkap", $nama_lengkap);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
    }

    public function deletePetugas($id)
    {
        $sql = "DELETE FROM tb_login WHERE id_login=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function tampilSiswa()
    {
        $sql  = "SELECT * FROM tb_siswa 
        JOIN tb_spp ON tb_siswa.id_spp = tb_spp.id_spp JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas JOIN tb_login ON tb_siswa.id_login = tb_login.id_login
        ORDER BY id_siswa ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }

    public function tambahSiswa()
    {
        $nisn         = $_POST["nisn"];
        $nis          = $_POST["nis"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $kelas        = $_POST["kelas"];
        $alamat       = $_POST["alamat"];
        $no_telp      = $_POST["no_telp"];
        $spp          = $_POST["spp"];

        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $role     = "Siswa";

        // Tabel Login
        $sql = "INSERT INTO tb_login (username, password, nama_lengkap, role) VALUES (:username, :password, :nama_lengkap, :role)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":nama_lengkap", $nama_lengkap);
        $stmt->bindParam(":role", $role);

        $stmt->execute();

        $sql = "INSERT INTO tb_siswa (nisn, nis, nama_siswa, id_kelas, alamat, no_telp, id_spp, id_login) VALUES (:nisn, :nis, :nama_siswa, :kelas, :alamat, :no_telp, :spp, LAST_INSERT_ID())";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nisn", $nisn);
        $stmt->bindParam(":nis", $nis);
        $stmt->bindParam(":nama_siswa", $nama_lengkap);
        $stmt->bindParam(":kelas", $kelas);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":no_telp", $no_telp);
        $stmt->bindParam(":spp", $spp);

        $stmt->execute();
    }

    public function editSiswa($id)
    {
        $sql = "SELECT * FROM tb_siswa 
        JOIN tb_spp ON tb_siswa.id_spp = tb_spp.id_spp JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas JOIN tb_login ON tb_siswa.id_login = tb_login.id_login WHERE id_siswa = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch();
        return $row;
    }

    public function updateSiswa()
    {
        $nama_siswa = $_POST["nama_lengkap"];
        $kelas      = $_POST["kelas"];
        $alamat     = $_POST["alamat"];
        $no_telp    = $_POST["no_telp"];
        $spp        = intval($_POST["spp"]);
        $id         = $_POST["id_siswa"];

        $sql = "UPDATE tb_siswa SET
        nama_siswa=:nama_siswa,
        id_kelas=:kelas,
        alamat=:alamat,
        no_telp=:no_telp,
        id_spp=:spp
        WHERE id_siswa=:id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama_siswa", $nama_siswa);
        $stmt->bindParam(":kelas", $kelas);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":no_telp", $no_telp);
        $stmt->bindParam(":spp", $spp);

        $stmt->execute();
    }

    public function deleteSiswa($id)
    {
        $sql = "DELETE FROM tb_siswa WHERE id_siswa=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function tampilKelas()
    {
        $sql = "SELECT * FROM tb_kelas";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }

    public function tambahKelas()
    {
        $nama_kelas = $_POST["nama_kelas"];
        $jurusan    = $_POST["jurusan"];

        $sql = "INSERT INTO tb_kelas (nama_kelas, jurusan) VALUES (:nama_kelas, :jurusan)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nama_kelas", $nama_kelas);
        $stmt->bindParam(":jurusan", $jurusan);

        $stmt->execute();
    }

    public function editKelas($id)
    {
        $sql = "SELECT * FROM tb_kelas WHERE id_kelas = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch();
        return $row;
    }

    public function updateKelas()
    {
        $nama_kelas = $_POST["nama_kelas"];
        $jurusan    = $_POST["jurusan"];
        $id         = $_POST["id_kelas"];

        $sql = "UPDATE tb_kelas SET
        nama_kelas=:nama_kelas,
        jurusan=:jurusan WHERE id_kelas=:id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nama_kelas", $nama_kelas);
        $stmt->bindParam(":jurusan", $jurusan);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function deleteKelas($id)
    {
        $sql = "DELETE FROM tb_kelas WHERE id_kelas=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function tampilSpp()
    {
        $sql = "SELECT * FROM tb_spp";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }

    public function tambahSpp()
    {
        $tahun   = $_POST["tahun_spp"];
        $nominal = intval($_POST["nominal"]);

        $sql  = "INSERT INTO tb_spp (tahun, nominal) VALUES (:tahun,  :nominal)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":tahun", $tahun);
        $stmt->bindParam(":nominal", $nominal);
        $stmt->execute();
    }

    public function editSpp($id)
    {
        $sql = "SELECT * FROM tb_spp WHERE id_spp = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch();
        return $row;
    }

    public function updateSpp()
    {
        $tahun = $_POST["tahun"];
        /* $bulan   = $_POST["bulan"];*/
        $nominal = (int) str_replace(',', '', $_POST["nominal"]);
        $id      = $_POST["id_spp"];

        $sql = "UPDATE tb_spp SET
        tahun=:tahun,
        /*bulan=:bulan,*/
        nominal=:nominal WHERE id_spp=:id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":tahun", $tahun);
        /* $stmt->bindParam(":bulan", $bulan);*/
        $stmt->bindParam(":nominal", $nominal);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function deleteSpp($id)
    {
        $sql = "DELETE FROM tb_spp WHERE id_spp=:id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function transaksiPembayaran()
    {
        $id_login      = $_POST["id_login"];
        $id_siswa      = $_POST["id_siswa"];
        $tgl_bayar     = $this->getTimeNow();
        $bulan_dibayar = $_POST["bulan"];
        $id_spp        = $_POST["id_spp"];
        $nominal       = (int) str_replace(',', '', $_POST["nominal"]);
        $ket           = "Lunas";

        $sql = "INSERT INTO tb_pembayaran (id_login, id_siswa, tgl_bayar, bulan_dibayar, id_spp, jumlah_bayar, keterangan) VALUES (:id_login, :id_siswa, :tgl_bayar, :bulan_dibayar, :id_spp, :jumlah_bayar, :keterangan)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_login", $id_login);
        $stmt->bindParam(":id_siswa", $id_siswa);
        $stmt->bindParam(":tgl_bayar", $tgl_bayar);
        $stmt->bindParam(":bulan_dibayar", $bulan_dibayar);
        $stmt->bindParam(":id_spp", $id_spp);
        $stmt->bindParam(":jumlah_bayar", $nominal);
        $stmt->bindParam(":keterangan", $ket);

        $stmt->execute();
    }

    public function getBulanBelumLunas($id_siswa)
    {
        $sql  = "SELECT DISTINCT bulan_dibayar FROM tb_pembayaran WHERE keterangan = 'Lunas' AND id_siswa = :id_siswa";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_siswa", $id_siswa);
        $stmt->execute();

        $bulanBelumLunas = $stmt->fetchAll(\PDO::FETCH_COLUMN);

        return $bulanBelumLunas;
    }

    public function tampilLaporan()
    {
        $sql = "SELECT * FROM tb_pembayaran 
        JOIN tb_spp ON tb_pembayaran.id_spp = tb_spp.id_spp JOIN tb_siswa ON tb_pembayaran.id_siswa = tb_siswa.id_siswa JOIN tb_login ON tb_pembayaran.id_login = tb_login.id_login
        ORDER BY id_pembayaran ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }

    public function dataBarang($tableName)
    {
        $sql    = "SELECT COUNT(*) as total FROM $tableName";
        $result = $this->db->prepare($sql);
        $result->execute();
        $rows = $result->fetchColumn();

        return $rows;
    }

}
?>