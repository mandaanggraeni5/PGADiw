<?php include 'config.php'; ?>

<link rel="stylesheet" href="assets/style.css">

<div class="header">🍔 Food App</div>

<a href="cart.php" class="cart-btn">🛒 Cart</a>

<?php
$q = $conn->query("SELECT * FROM products ORDER BY id DESC");
while($p = $q->fetch_assoc()){

$harga = $p['harga'];
if($p['diskon'] > 0) $harga -= $p['diskon'];

if($p['flashsale'] && strtotime($p['flashsale_end']) > time()){
    $harga -= 3000;
}
?>

<div class="card">
    <img src="<?= $p['gambar'] ?>">
    
    <?php if($p['flashsale']){ ?>
        <div class="badge red">FLASH</div>
    <?php } ?>

    <?php if($p['promo_text']){ ?>
        <div class="badge orange"><?= $p['promo_text'] ?></div>
    <?php } ?>

    <div class="content">
        <h3><?= $p['nama'] ?></h3>

        <div class="price">
            <?php if($harga < $p['harga']){ ?>
                <small class="strike">Rp<?= $p['harga'] ?></small>
            <?php } ?>
            Rp<?= $harga ?>
        </div>

        <form method="POST" action="cart.php">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">
            <button name="add">Tambah</button>
        </form>
    </div>
</div>

<?php } ?>
