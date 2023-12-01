<?php

namespace Inc;

class Koneksi {

    public object $db;
    public function __construct() {
        try {
            $this->db = new \PDO("mysql:host=localhost;dbname=db_spp","root","");
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Koneksi database gagal : ' . $e->getMessage());
        }
    }
}

?>