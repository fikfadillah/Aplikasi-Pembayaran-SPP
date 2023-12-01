<?php
$id = $_GET["id"];
$data = new App\Spp();

if (!$data->deleteSpp($id)) {
    header("Location: index.php?page=data-spp");
} else {
    echo '
    <script>
        alert("Data gagal dihapus");
    </script>
';
}
?>