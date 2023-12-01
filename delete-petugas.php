<?php
$id = $_GET["id"];
$data = new App\Spp();

if (!$data->deletePetugas($id)) {
    header("Location: index.php?page=data-petugas");
} else {
    echo '
    <script>
        alert("Data gagal dihapus");
    </script>
';
}
?>