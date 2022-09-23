<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>My Maintenance | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css">
</head>

<body>
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
          <div class="text-center my-5">
            <img src="img/lg-bc.png" alt="logo" width="100" />
          </div>
          <div class="card shadow-lg">
            <div class="card-body p-5">
              <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
              <form method="POST">
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="email">
                    <i class="bi bi-person"></i> Email
                  </label>
                  <input type="text" class="form-control" name="email" required autofocus />
                  <div class="invalid-feedback">Username is invalid</div>
                </div>

                <div class="mb-3">
                  <div class="mb-2 w-100">
                    <label class="text-muted" for="password">
                      <i class="bi bi-key"></i> Password
                    </label>
                    <a href="forgot.html" class="float-end">
                      Forgot Password?
                    </a>
                  </div>
                  <input type="password" class="form-control" name="password" required />
                  <div class="invalid-feedback">Password is required</div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                    <label for="remember" class="form-check-label">Remember Me</label>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary ms-auto">
                    Login <i class="bi bi-arrow-right"></i>
                  </button>
                </div>
              </form>
            </div>
            <div class="kembali text-center fs-4 mt-2 mb-2">
              <h5><a href="index.php">Kembali</a></h5>
            </div>
            <div class="card-footer py-3 border-0">
              <div class="text-center text-muted">
                Don't have an account?
                <a href="register.php" class="text-dark text-muted">
                  <strong>Create One</strong>
                </a>
              </div>
            </div>
          </div>
          <div class="text-center mt-5 mb-5 text-muted">
            &copy; Copyright <strong><span>Syntax Error</span></strong>. All Rights Reserved
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  require 'koneksi.php';

  if (isset($_POST['submit'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $get_user = "SELECT * FROM tb_pengguna WHERE email = '$email'";
    $result = mysqli_query($koneksi, $get_user);

    if ($result->num_rows > 0) {
      $data = mysqli_fetch_array($result);
      if (password_verify($password, $data["password"])) {

        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['nama'] = $data['nama_pengguna'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['email'] = $data['email'];
        header("Location: index.php");
      } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () {Swal.fire("Ooops", "Username atau Password Salah!", "error");';
        echo '}, 1000);</script>';
      }
    }
  }
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>

</html>