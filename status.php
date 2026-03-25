<?php
include 'config.php';

$o = $conn->query("SELECT * FROM orders ORDER BY id DESC LIMIT 1")->fetch_assoc();
?>

<h2>Status Pesanan</h2>
<p>Status: <?= $o['status'] ?></p>

<?php if($o['metode']=='qris'){ ?>
    <img src="QRIS_KAMU.png" width="200">
<?php } else { ?>
    Bayar di tempat (COD)
<?php } ?>
