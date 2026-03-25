<?php
include 'config.php';

$nama = $_POST['nama'];
$metode = $_POST['metode'];

$total = 0;
foreach($_SESSION['cart'] as $id){
    $p = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
    $total += $p['harga'];
}

$conn->query("INSERT INTO orders (nama,total,metode) VALUES ('$nama','$total','$metode')");

$_SESSION['cart'] = [];

header("Location: status.php");
