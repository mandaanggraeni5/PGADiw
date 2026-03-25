<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = getenv('mysql.railway.internal');
$user = getenv('root');
$pass = getenv('LzdpQOruIhidxMhotOxzfOZOoPgoDSHI');
$db   = getenv('railway');
$port = getenv('3306');

$conn = new mysqli($host, $user, $pass, $db, $port);
$conn->set_charset("utf8mb4");

// products
$conn->query("
CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(100),
harga INT,
stock INT,
gambar TEXT,
diskon INT DEFAULT 0,
flashsale TINYINT(1) DEFAULT 0,
flashsale_end DATETIME NULL,
promo_text VARCHAR(100)
)");

// orders
$conn->query("
CREATE TABLE IF NOT EXISTS orders (
id INT AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(100),
total INT,
metode VARCHAR(20),
status VARCHAR(20) DEFAULT 'Menunggu'
)");
?>
