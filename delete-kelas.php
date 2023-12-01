<?php
$id = $_GET["id"];
$data = new App\Spp();

if (!$data->deleteKelas($id)) {
    header("Location: index.php?page=data-kelas");
} else {
    echo '
    <script>
        alert("Data gagal dihapus");
    </script>
';
}
?>