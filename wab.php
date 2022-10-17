<?php
$id_main = rand(10, 10000);
$isi = '{ 
    "messaging_product": "whatsapp",
    "to": "6285320550301", 
    "type": "template", 
    "template": { 
        "name": "laporan_masuk", 
        "language": { 
            "code": "en_US" 
        } 
    } 
}';

$isi = json_decode($isi);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v14.0/100225879557902/messages");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($isi));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer EAAQsucpqAZCABAGAZBvc7tsMMDUIiJqKJcVVEF96ehLRRz0LnyErW7Dw2HVHTZAxISuQZCBx4gopfToOx4088NzVi56fi7OiWrLZBjwnxAoYYKEvYVyP0KCOvHcJmiCmW8kJZCCOsPdZA476otQLD2e2kFbOSxTua2avLiStFdCYMtBDp9q6uuN1wtYL8a7df6m2PXZBHXIFjgZDZD'));
$result = curl_exec($ch);
curl_close($ch);
print_r($result);
