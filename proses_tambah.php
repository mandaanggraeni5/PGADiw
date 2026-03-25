<?php
include 'config.php';
include 'cloudinary.php';

$url = uploadCloudinary($_FILES['gambar']['tmp_name']);

$conn->query("
INSERT INTO products 
(nama,harga,stock,gambar,diskon,flashsale,flashsale_end,promo_text)
VALUES (
'{$_POST['nama']}',
'{$_POST['harga']}',
'{$_POST['stock']}',
'$url',
'{$_POST['diskon']}',
'{$_POST['flashsale']}',
'{$_POST['flashsale_end']}',
'{$_POST['promo_text']}'
)");
header("Location: index.php");
