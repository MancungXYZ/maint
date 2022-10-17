<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['loggedin'])) {
  echo '<script type="text/javascript">alert("Anda belum melakukan login")</script>';
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Maintenence</title>

  <link rel="stylesheet" href="assets/css/main/app.css" />
  <link rel="stylesheet" href="assets/css/main/app-dark.css" />
  <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css">
  <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon" />
  <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png" />
</head>

<body>
  <div id="app">
    <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
          <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
              <a href="index.php"><img src="assets/images/logo/logo.svg" alt="Logo" srcset="" /></a>
            </div>
            <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                  <g transform="translate(-210 -1)">
                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                    <circle cx="220.5" cy="11.5" r="4"></circle>
                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                  </g>
                </g>
              </svg>
              <div class="form-check form-switch fs-6">
                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" />
                <label class="form-check-label"></label>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
              </svg>
            </div>
            <div class="sidebar-toggler x">
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item">
              <a href="index.php" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
              </a>
              <a href="logout.php" class="sidebar-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Maintenence</h3>
              <p class="text-subtitle text-muted" name="status_pengerjaan"></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Maintenence
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <section class="section">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Daftar Pekerjaan Maintenence</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table id="tabelSaya" class="table table-striped table-hover">
                        <tr>
                          <thead class="text-center">
                            <td>No</td>
                            <td>ID</td>
                            <td>Ruangan</td>
                            <td>Deskripsi</td>
                            <td>Tanggal Keluhan</td>
                            <td>Status</td>
                            <td>Tanggal penanganan</td>
                            <td>Aksi</td>
                          </thead>
                        </tr>
                        <tbody class="text-centers">
                          <!-- Tampil data -->
                          <?php
                          $sql = mysqli_query($koneksi, "SELECT * FROM tb_keluhan");
                          //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                          if (mysqli_num_rows($sql) > 0) {
                            //membuat variabel untuk menyimpan nomor urut
                            //melakukan perulangan while dengan dari dari query
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($sql)) {
                              //menampilkan data perulangan
                              echo '
						<tr>
                            <td>' . $no . '</td>
							<td>' . $data['id_main'] . '</td>
							<td>' . $data['ruangan'] . '</td>
                            <td>' . $data['deskripsi_keluhan'] . '</td>
                            <td>' . $data['tgl_keluhan'] . '</td>
                            <td>' . $data['status'] . '</td>
                            <td>' . $data['tgl_penanganan'] . '</td>
                            <td>
                            <button value="' . $data['id_main'] . '" id="editBtn" class="btn btn-primary btnEdit"><i class="fa fa-pencil"></i></a>
                            <button value="' . $data['id_main'] . '" id="hapusBtn" class="btn btn-danger btnDelete"><i class="fa fa-trash"></i></a>
                            </td>
						</tr>
						';
                              $no++;
                            }
                            //jika query menghasilkan nilai 0
                          } else {
                            echo '
					<tr>
						<td colspan="8">Tidak ada data.</td>
					</tr>
					';
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>

        <!-- Button Trigger Modal -->
        <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-plus"></i> Tambah Laporan</button>
      </div>

      <!-- Modal Tambah User-->
      <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Laporan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="formInsert" method="POST" role="form">
                <div id="pesanBerhasil" class="alert alert-primary d-none" role="alert">
                  DATA BERHASIL DI SIMPAN
                </div>
                <div class="mb-3">
                  <label for="ruangan" class="form-label">Ruangan Terkait</label>
                  <input type="text" class="form-control" name="ruangan">
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi Terkait</label>
                  <textarea class="form-control" aria-label="With textarea" name="desk"></textarea>
                </div>
                <div class="mb-3">
                  <label for="Tanggal" class="form-label">Tanggal Pengajuan</label>
                  <input type="date" class="form-control" name="tgl_keluhan">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Edit User-->
      <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Laporan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="editForm" method="POST" role="form">
                <div id="pesanBerhasil" class="alert alert-primary d-none" role="alert">
                  DATA BERHASIL DI SIMPAN
                </div>
                <input type="hidden" id="id_main" name="id_main">
                <div class="mb-3">
                  <label for="ruangan" class="form-label">Ruangan Terkait</label>
                  <input type="text" class="form-control" id="ruangan" name="ruangan">
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi Terkait</label>
                  <textarea class="form-control" aria-label="With textarea" id="desk" name="desk"></textarea>
                </div>
                <div class="mb-3">
                  <label for="Tanggal" class="form-label">Tanggal Pengajuan</label>
                  <input type="date" class="form-control" id="tgl_keluhan" name="tgl_keluhan">
                </div>
                <div class="mb-3">
                  <label for="Status" class="form-label">Status Pengerjaan</label>
                  <select class="form-select" aria-label="Default select example" id="status" name="status">
                    <option value="PENDING" selected>Pending</option>
                    <option value="ON PROGRESS">On Progress</option>
                    <option value="DONE">Done</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="Tanggal" class="form-label">Tanggal Penanganan</label>
                  <input type="date" class="form-control" id="tgl_penanganan" name="tgl_penanganan">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>


      <!-- Modal Delete User -->
      <div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Konfirmasi Hapus Laporan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus laporan dengan ID <?php echo $_GET['id']; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <?php

      ?>
      <!-- modal delete -->


      <!-- Footer -->
      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>2021 &copy; Mazer</p>
          </div>
          <div class="float-end">
            <p>
              Crafted with
              <span class="text-danger"><i class="bi bi-heart"></i></span> by
              <a href="https://saugi.me">Saugi</a>
            </p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/app.js"></script>
  <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
  <script src="https://kit.fontawesome.com/3e6170f06f.js" crossorigin="anonymous"></script>

  <script>
    //ajax tambah data pegawai
    $(document).on('submit', '#formInsert', function(e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("form_insert", true);

      $.ajax({
        type: "POST",
        url: "functions.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

          var res = jQuery.parseJSON(response);
          if (res.status == 422) {
            Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Ooops terjadi kesalahan',
              showConfirmButton: false,
              timer: 1500
            })
          } else if (res.status == 200) {
            $('#formInsert').modal('hide');
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Data berhasil di simpan',
              showConfirmButton: false,
              timer: 1500
            })
            $('#formInsert')[0].reset();
            $('#tabelSaya').load(location.href + " #tabelSaya");
          }
        }
      });

    });
    //ajax edit data
    $(document).on('click', '.btnEdit', function() {
      var id_main = $(this).val();

      $.ajax({
        type: "GET",
        url: "functions.php?id_main=" + id_main,
        success: function(response) {
          var res = jQuery.parseJSON(response);
          console.log(res);
          if (res.status == 404) {
            alert("404 Not found");
          } else if (res.status == 200) {
            $('#id_main').val(res.data.id_main);
            $('#ruangan').val(res.data.ruangan);
            $('#desk').val(res.data.deskripsi_keluhan);
            $('#tgl_keluhan').val(res.data.tgl_keluhan);
            $('#status').val(res.data.status);
            $('#tgl_penanganan').val(res.data.tgl_penanganan);

            $('#editModal').modal('show');
          }
        }
      });
    });

    //update isi ajax
    $(document).on('submit', '#editForm', function(e) {
      e.preventDefault();

      var formData = new FormData(this);
      formData.append("edit_form", true);

      $.ajax({
        type: "POST",
        url: "functions.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

          var res = jQuery.parseJSON(response);
          if (res.statusCode == 422) {
            Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Ooops terjadi kesalahan',
              showConfirmButton: false,
              timer: 1500
            })
          } else if (res.statusCode == 200) {
            $('#formInsert').modal('hide');
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Data berhasil di simpan',
              showConfirmButton: false,
              timer: 1500
            })
            $('#tabelSaya').load(location.href + " #tabelSaya");
          }
        }
      });

    });


    //ajax hapus data
    $(document).on('click', '.btnDelete', function() {

      var id_main = $(this).val();
      $.ajax({
        type: "POST",
        url: "functions.php",
        data: {
          'delete_laporan': true,
          'id_main': id_main,
        },
        success: function(response) {
          var res = jQuery.parseJSON(response);

          if (res.status == 422) {
            Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Ooops terjadi kesalahan',
              showConfirmButton: false,
              timer: 1500
            })
          } else if (res.status == 200) {
            Swal.fire({
              title: 'Apa anda yakin?',
              text: "Data yang terhapus tidak bisa di kembalikan!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $('#tabelSaya').load(location.href + " #tabelSaya");
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
          }
        }
      });


    });
  </script>
</body>

</html>