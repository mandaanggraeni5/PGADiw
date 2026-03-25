<?php include 'config.php';

if(isset($_POST['add'])){
    $_SESSION['cart'][] = $_POST['id'];
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<h2>Keranjang</h2>

<?php
foreach($cart as $id){
    $p = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
    echo $p['nama']." - Rp".$p['harga']."<br>";
    $total += $p['harga'];
}
?>

<h3>Total: Rp<?= $total ?></h3>

<a href="checkout.php">Checkout</a>
