<?php

$id = $_GET["id"];

if ($data->transaksiPembayaran($id)) {
    header("Location: index.php?page=transaksi-pembayaran");
} else {
    echo '
        <script>
            alert("Gagal");
        </script>
    ';
}

?>