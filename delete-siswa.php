<?php
$id = $_GET["id"];
$data = new App\Spp();

if (!$data->deleteSiswa($id)) {
    header("Location: index.php?page=data-siswa");
} else {
    echo '
    <script>
        alert("Data gagal dihapus");
    </script>
';
}
?>