<?php
$id_main = rand(10, 10000);
$isi = array(
    "to_number" => "6289671123987",
    "message" => "Laporan maintenence baru masuk ke dengan ID $id_main, mohon segera diperiksa",
    "type" => "text"
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.maytapi.com/api/9e25987e-d0c5-4182-b094-22b0cc062280/24118/sendMessage");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($isi));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-maytapi-key: bf69a727-99ed-4e3b-b82b-bc1a524af7ad'));
$result = curl_exec($ch);
curl_close($ch);
print_r($result);
