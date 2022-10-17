<?php

use Awf\Hal\Render\Json;
use Elementor\Core\DocumentTypes\Post;
use Illuminate\Support\Arr;

session_start();
require 'koneksi.php';

if (isset($_POST['edit_form'])) {
    $id_main = $_POST['id_main'];
    $ruangan = $_POST['ruangan'];
    $desk = $_POST['desk'];
    $tgl_keluhan = $_POST['tgl_keluhan'];
    $status = $_POST['status'];
    $tgl_penanganan = $_POST['tgl_penanganan'];

    if ($ruangan == NULL || $desk == NULL || $tgl_keluhan == NULL || $status == NULL || $tgl_penanganan == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Dimohon mengisi form dengan lengkap'
        ];
        echo json_encode($res);
        return;
    }


    $sql = "UPDATE tb_keluhan SET ruangan='$ruangan', deskripsi_keluhan='$desk', tgl_keluhan='$tgl_keluhan', status='$status', tgl_penanganan='$tgl_penanganan' WHERE id_main='$id_main'";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        $res = [
            'statusCode' => 200,
            'message' => 'Perubahan data tersimpan'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'statusCode' => 500,
            'message' => 'Oopp, terjadi kesalahan'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_laporan'])) {
    $id_main = mysqli_real_escape_string($koneksi, $_POST['id_main']);

    $result = mysqli_query($koneksi, "DELETE FROM tb_keluhan WHERE id_main = '$id_main'");

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Data ditemukan'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Oopp, terjadi kesalahan'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['form_insert'])) {
    $id_main = rand(10, 10000);
    $id_user = $_SESSION['user_id'];
    $ruangan = $_POST['ruangan'];
    $desk = $_POST['desk'];
    $tgl_keluhan = $_POST['tgl_keluhan'];

    $atas_nama = $_SESSION['nama'];

    if ($ruangan == NULL || $desk == NULL || $tgl_keluhan == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Dimohon mengisi form dengan lengkap'
        ];
        echo json_encode($res);
        return;
    }


    $sql = "INSERT INTO tb_keluhan (id_main, id_user, ruangan, deskripsi_keluhan, tgl_keluhan, status)
                      VALUES ('$id_main', '$id_user', '$ruangan', '$desk', '$tgl_keluhan', 'PENDING')";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Tambah data berhasil'
        ];
        echo json_encode($res);

        $isi = array(
            "to_number" => "6285320550301",
            "message" => "Laporan maintenence atas nama $atas_nama baru saja masuk ke dengan ID $id_main, mohon segera diperiksa",
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

        //Whatsapp API Business
        // $isi = '{ 
        //     "messaging_product": "whatsapp",
        //     "to": "6285320550301", 
        //     "type": "template", 
        //     "template": { 
        //         "name": "laporan_masuk", 
        //         "language": { 
        //             "code": "en_US" 
        //         } 
        //     } 
        // }';
        // $isi = json_decode($isi);

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v14.0/100225879557902/messages");
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($isi));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer EAAQsucpqAZCABAGAZBvc7tsMMDUIiJqKJcVVEF96ehLRRz0LnyErW7Dw2HVHTZAxISuQZCBx4gopfToOx4088NzVi56fi7OiWrLZBjwnxAoYYKEvYVyP0KCOvHcJmiCmW8kJZCCOsPdZA476otQLD2e2kFbOSxTua2avLiStFdCYMtBDp9q6uuN1wtYL8a7df6m2PXZBHXIFjgZDZD'));
        // $result = curl_exec($ch);
        // curl_close($ch);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Oopp, terjadi kesalahan'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['id_main'])) {
    $id_main = $_GET['id_main'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_keluhan WHERE id_main = '$id_main' LIMIT 1");

    if (mysqli_num_rows($query) == 1) {
        $id = mysqli_fetch_array($query);

        $res = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'data' => $id
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Oopp, terjadi kesalahan'
        ];
        echo json_encode($res);
        return;
    }
}
