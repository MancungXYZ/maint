<?php
require 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Maintenance | Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="assets/img/covid-img/battle-againts-coronavirus.svg" alt="logo" width="200">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">
                                        <i class="bi bi-person"></i> Name Lengkap</label>
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Name is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">
                                        <i class="bi bi-geo-alt"></i> Alamat Lengkap
                                    </label>
                                    <textarea name="alamat" id="alamat" cols="10" rows="5" placeholder="isi alamat disini.." class="form-control" required></textarea>
                                    <div class="invalid-feedback">
                                        Alamat is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">
                                        <i class="bi bi-envelope"></i> Email
                                    </label>
                                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="namaanda@gmail.com" required>
                                    <div class="invalid-feedback">
                                        Username is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="tel">
                                        <i class="bi bi-envelope"></i> No Hp
                                    </label>
                                    <input id="tel" type="tel" class="form-control" name="tel" value="" placeholder="08xxxxxx" required>
                                    <div class="invalid-feedback">
                                        No Hp is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">
                                        <i class="bi bi-key"></i> Password
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">
                                        <i class="bi bi-lock"></i> Masukan Kembali Password
                                    </label>
                                    <input id="password2nd" type="password" class="form-control" name="password2nd" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="align-items-center d-flex">
                                    <button type="submit" name="register" class="btn btn-primary ms-auto">
                                        Register <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center text-muted">
                                Already have an account?
                                <a href="login.php" class="text-dark text-muted">
                                    <strong>Login</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 mb-5 text-muted">
                        &copy; Copyright <strong><span>Syntax Error</span></strong>. All Rights Reserved
                    </div>
                </div>
            </div>
    </section>

    <?php
    if (isset($_POST['register'])) {
        $id_pengguna = rand(100, 10000);
        $nama = $_POST['name'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];
        $password2nd = $_POST['password2nd'];

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        if ($password == $password2nd) {
            $sql = "SELECT * FROM tb_pengguna WHERE email='$email'";
            $result = mysqli_query($koneksi, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO tb_pengguna (id_user, tipe_user, email, nama_pengguna, alamat, no_hp, password)
                        VALUES ('$id_pengguna', 'pengguna', '$email', '$nama', '$alamat', '$tel', '$hash_password')";
                $result = mysqli_query($koneksi, $sql);
                if ($result) {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {Swal.fire("Selamat", "Akun berhasil disimpan", "success");';
                    echo '}, 1000);</script>';
                } else {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () {Swal.fire("Ooops", "Terjadi kesalahan!", "error");';
                    echo '}, 1000);</script>';
                }
            } else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () {Swal.fire("Ooops", "Akun sudah terdaftar!", "error");';
                echo '}, 1000);</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {Swal.fire("Ooops", "Konfirmasi password salah, silahkan coba lagi!", "error");';
            echo '}, 1000);</script>';
        }
    }
    ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>

</html>