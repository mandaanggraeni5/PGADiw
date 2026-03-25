<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = getenv('mysql.railway.internal');
$user = getenv('root');
$pass = getenv('LzdpQOruIhidxMhotOxzfOZOoPgoDSHI');
$db   = getenv('railway');
$port = getenv('3306');

try {
    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
        $user,
        $pass
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}

// products
$conn->exec("
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
$conn->exec("
CREATE TABLE IF NOT EXISTS orders (
id INT AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(100),
total INT,
metode VARCHAR(20),
status VARCHAR(20) DEFAULT 'Menunggu'
)");
?>
