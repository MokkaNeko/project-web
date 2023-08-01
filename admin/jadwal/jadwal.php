<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jadwal</title>

  <!-- Custom fonts for this template-->
  <link href="../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard_admin.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MyClass</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../dashboard_admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../admin/admin.php">
          <i class="fas fa-user-cog"></i>
          <span>Admin</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../siswa/siswa.php">
          <i class="fas fa-users"></i>
          <span>Siswa</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="../jadwal/jadwal.php">
          <i class="far fa-calendar-alt"></i>
          <span>Jadwal</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="../jadwal_piket/jadwal_piket.php">
          <i class="fas fa-calendar-check"></i>
          <span>Jadwal Piket</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../tugas/tugas.php">
          <i class="fas fa-tasks"></i>
          <span>Tugas</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
              aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">admin</span>
                <img class="img-profile rounded-circle" src="../bootstrap/img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Jadwal Table</h1>

          <!-- Add Jadwal Button -->
          <div class="mb-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addJadwalModal">Tambah
              Data</button>
          </div>


          <!-- Jadwal Table -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jadwal List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="jadwalTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Mata Pelajaran</th>
                      <th>Hari</th>
                      <th>Waktu</th>
                      <th>Guru</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- PHP code to fetch Jadwal data from the database and loop through it -->
                    <?php
                                        // Establish a database connection
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $database = "class";

                                        $conn = mysqli_connect($servername, $username, $password, $database);

                                        // Check connection
                                        if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }

                                        // Fetch Jadwal data from the "user" table
                                        $sql = "SELECT id_mata_pelajaran, nama, hari, waktu, guru FROM mata_pelajaran ORDER BY hari DESC, waktu ASC";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // Loop through each row and display Jadwal data in the table
                                            $count = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $count . "</td>";
                                                echo "<td>" . $row['nama'] . "</td>";
                                                echo "<td>" . $row['hari'] . "</td>";

                                                $waktu = $row['waktu'] ? $row['waktu'] : 'Not specified';
                                                echo "<td>" . $row['waktu'] . "</td>";
                                                echo "<td>" . $row['guru'] . "</td>";
                                                echo "<td>
                                        <a href='#' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#editJadwalModal'
                                            data-jadwal-id='" . $row['id_mata_pelajaran'] . "'
                                            data-nama='" . $row['nama'] . "'
                                            data-hari='" . $row['hari'] . "'
                                            data-waktu='" . $row['waktu'] . "'
                                            data-guru='" . $row['guru'] . "'
                                            >Edit</a>
                                        <a href='#' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#deleteJadwalModal' data-jadwal-id='" . $row['id_mata_pelajaran'] . "'>Delete</a>
                                    </td>";
                                                echo "</tr>";
                                                $count++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>No Jadwal found.</td></tr>";
                                        }

                                        // Close the database connection
                                        mysqli_close($conn);
                                        ?>
                    <!-- End of PHP code -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <!-- Add Jadwal Modal -->
          <div class="modal fade" id="addJadwalModal" tabindex="-1" role="dialog" aria-labelledby="addJadwalModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addJadwalModalLabel">Tambah Jadwal Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="add_jadwal.php" method="POST">
                    <div class="form-group">
                      <label for="nama">Mata Pelajaran</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                      <label for="hari">Hari</label>
                      <select class="form-control" id="hari" name="hari" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <!-- Add other days of the week as needed -->
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="waktu_mulai">Waktu Mulai</label>
                      <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai">
                    </div>
                    <div class="form-group">
                      <label for="waktu_selesai">Waktu Selesai</label>
                      <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai">
                    </div>
                    <div class="form-group">
                      <label for="guru">Guru</label>
                      <input type="text" class="form-control" id="guru" name="guru">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Jadwal</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Edit Jadwal Modal -->
        <div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="editJadwalModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="edit_jadwal.php" method="POST">
                  <input type="hidden" name="jadwal_id" id="editJadwalId" value="">
                  <div class="form-group">
                    <label for="editNama">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="editNama" name="nama" required>
                  </div>
                  <div class="form-group">
                    <label for="editHari">Hari</label>
                    <select class="form-control" id="editHari" name="hari" required>
                      <option value="Senin">Senin</option>
                      <option value="Selasa">Selasa</option>
                      <option value="Rabu">Rabu</option>
                      <option value="Kamis">Kamis</option>
                      <option value="Jumat">Jumat</option>
                      <!-- Add other days of the week as needed -->
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="editWaktuMulai">Waktu Mulai</label>
                    <input type="time" class="form-control" id="editWaktuMulai" name="waktu_mulai">
                  </div>
                  <div class="form-group">
                    <label for="editWaktuSelesai">Waktu Selesai</label>
                    <input type="time" class="form-control" id="editWaktuSelesai" name="waktu_selesai">
                  </div>
                  <div class="form-group">
                    <label for="editGuru">Guru</label>
                    <input type="text" class="form-control" id="editGuru" name="guru">
                  </div>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <!-- Delete Jadwal Modal -->
        <div class="modal fade" id="deleteJadwalModal" tabindex="-1" role="dialog"
          aria-labelledby="deleteJadwalModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteJadwalModalLabel">Delete Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete this Jadwal?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="#" id="confirmDeleteJadwal" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Page Content -->


      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Myclass Class System 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    var deleteJadwalId;

    // Set the Jadwal ID when delete button is clicked
    $('#jadwalTable').on('click', '.btn-danger', function() {
      deleteJadwalId = $(this).data('jadwal-id');
    });

    // Confirm delete and redirect
    $('#confirmDeleteJadwal').click(function() {
      // Delete Jadwal based on the ID
      // You can implement the deletion process in a separate PHP file
      window.location.href = 'delete_jadwal.php?jadwal_id=' + deleteJadwalId;
    });
  });
  </script>

  <script>
  $(document).ready(function() {
    var editJadwalId;
    var editNama;
    var editHari;
    var editWaktu;
    var editGuru;

    // Set the Jadwal data when edit button is clicked
    $('#jadwalTable').on('click', '.btn-primary', function() {
      editJadwalId = $(this).data('jadwal-id');
      editNama = $(this).data('nama');
      editHari = $(this).data('hari');
      editWaktu = $(this).data('waktu');
      editGuru = $(this).data('guru');

      $('#editJadwalId').val(editJadwalId);
      $('#editNama').val(editNama);
      $('#editHari').val(editHari);
      $('#editWaktuMulai').val(editWaktu);
      $('#editGuru').val(editGuru);
    });

    // Clear the form values when the edit modal is closed
    $('#editJadwalModal').on('hidden.bs.modal', function() {
      $('#editJadwalForm')[0].reset();
    });
  });
  </script>

</body>

</html>