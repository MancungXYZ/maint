<?php
include "koneksi.php";
//jika benar mendapatkan GET id dari URL
if (isset($_GET['id_main'])) {
    //membuat variabel
    $id_main = $_GET['id_main'];

    //melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
    $cek = mysqli_query($koneksi, "SELECT * FROM tb_keluhan WHERE id_main ='$id_main'");

    //jika query menghasilkan nilai > 0 maka eksekusi script di bawah
    if (mysqli_num_rows($cek) > 0) {
        //query ke database DELETE untuk menghapus data dengan kondisi id=$id
        $del = mysqli_query($koneksi, "DELETE FROM tb_keluhan WHERE id_main ='$id_main");
        if ($del) {
            echo '<script>alert("Berhasil menghapus data."); document.location="booking.php";</script>';
        } else {
            echo '<script>alert("Gagal menghapus data."); document.location="booking.php";</script>';
        }
    } else {
        echo '<script>alert("ID Pegawai tidak ditemukan di database."); document.location="booking.php";</script>';
    }
} else {
    echo '<script>alert("Koneksi database gagal."); document.location="booking.php";</script>';
}
