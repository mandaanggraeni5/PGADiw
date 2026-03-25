<?php
function uploadCloudinary($file){
    $url = "https://api.cloudinary.com/v1_1/des2j9wll/image/upload";

    $data = [
        'file' => new CURLFile($file),
        'upload_preset' => 'ml_default'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($result, true);
    return $json['secure_url'];
}
?>
