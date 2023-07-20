<?php
session_start();
if ($_SESSION['status'] != "admin") {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jadwal Piket</title>

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
                    <span>Logout</span>
                </a>
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
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']?></span>
                                <img class="img-profile rounded-circle"
                                    src="../bootstrap/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
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
                <h1 class="h3 mb-4 text-gray-800">Jadwal Piket</h1>
                
                <!-- Add JadwalPiket Button -->
                <div class="mb-4">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addJadwalPiketModal">Jadwal Data</button>
                </div>


                <!-- Jadwal Piket Table -->
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jadwal Piket</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="JadwalPiketTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Hari</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- PHP code to fetch JadwalPiket data from the database and loop through it -->
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

                            // Fetch JadwalPiket data from the "user" table
                            $sql = "SELECT j.id_jadwal_piket, j.hari, u.username 
                                    FROM jadwal_piket j 
                                    JOIN user u ON u.id_user = j.id_user
                                    WHERE u.status = 'member'";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                            // Loop through each row and display JadwalPiket data in the table
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $count . "</td>";
                                echo "<td>" . $row['hari'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>
                                        <a href='#' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#editJadwalPiketModal' data-jadwalpiket-id='" . $row['id_jadwal_piket'] . "' data-username='" . $row['username'] . "' data-hari='" . $row['hari'] . "'>Edit</a> |
                                        <a href='#' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#deleteJadwalPiketModal' data-jadwalpiket-id='" . $row['id_jadwal_piket'] . "'>Delete</a>
                                    </td>";
                                echo "</tr>";
                                $count++;
                            }
                            } else {
                            echo "<tr><td colspan='4'>No jadwalpiket found.</td></tr>";
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


                <!-- Add JadwalPiket Modal -->
                <div class="modal fade" id="addJadwalPiketModal" tabindex="-1" role="dialog" aria-labelledby="addJadwalPiketModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addJadwalPiketModalLabel">Tambah JadwalPiket Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form action="add_jadwal_piket.php" method="POST">
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                    <select class="form-control" id="hari" name="hari" required>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <!-- Add other days of the week as needed -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <select class="form-control" id="nama" name="nama" required>
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

                                    // Fetch member usernames from the "user" table
                                    $sql = "SELECT username FROM user WHERE status = 'member'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value='' disabled>No member found.</option>";
                                    }

                                    // Close the database connection
                                    mysqli_close($conn);
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add JadwalPiket</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Update JadwalPiket Modal -->
                <div class="modal fade" id="editJadwalPiketModal" tabindex="-1" role="dialog" aria-labelledby="editJadwalPiketModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editJadwalPiketModalLabel">Edit JadwalPiket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editJadwalPiketForm" action="edit_jadwal_piket.php" method="POST">
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                        <select class="form-control" id="editHari" name="hari" required>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <!-- Add other days of the week as needed -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <select class="form-control" id="editNama" name="nama" required>
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

                                        // Fetch member usernames from the "user" table
                                        $sql = "SELECT username FROM user WHERE status = 'member'";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value='' disabled>No member found.</option>";
                                        }

                                        // Close the database connection
                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                </div>
                                    <input type="hidden" id="editJadwalPiketId" name="jadwalpiket_id" value="">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Delete JadwalPiket Modal -->
                <div class="modal fade" id="deleteJadwalPiketModal" tabindex="-1" role="dialog" aria-labelledby="deleteJadwalPiketModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteJadwalPiketModalLabel">Delete JadwalPiket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this JadwalPiket?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a href="#" id="confirmDeleteJadwalPiket" class="btn btn-danger">Delete</a>
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
                        <span>Copyright &copy; Your Website 2020</span>
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
                    <a class="btn btn-primary" href="../../index.php">Logout</a>
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
        $(document).ready(function () {
            var deleteJadwalPiketId;

            // Set the JadwalPiket ID when delete button is clicked
            $('#JadwalPiketTable').on('click', '.btn-danger', function () {
                deleteJadwalPiketId = $(this).data('jadwalpiket-id');
            });

            // Confirm delete and redirect
            $('#confirmDeleteJadwalPiket').click(function () {
                // Delete JadwalPiket based on the ID
                // You can implement the deletion process in a separate PHP file
                window.location.href = 'delete_jadwalpiket.php?jadwalpiket_id=' + deleteJadwalPiketId;
            });
        });
    </script>
    <!-- Make sure to include jQuery before this script -->
    <script>
        $(document).ready(function () {
            var editJadwalPiketId;

            // Set the JadwalPiket ID and values when edit button is clicked
            $('#JadwalPiketTable').on('click', '.btn-primary', function () {
                editJadwalPiketId = $(this).data('jadwalpiket-id');
                var hari = $(this).data('hari');
                var username = $(this).data('username');

                $('#editJadwalPiketForm #editJadwalPiketId').val(editJadwalPiketId);
                $('#editJadwalPiketForm #editHari').val(hari);
                $('#editJadwalPiketForm #editHama').val(username);
            });

            // Clear the form values when the edit modal is closed
            $('#editJadwalPiketModal').on('hidden.bs.modal', function () {
                $('#editJadwalPiketForm')[0].reset();
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var deleteJadwalPiketId;

            // Set the JadwalPiket ID when delete button is clicked
            $('#JadwalPiketTable').on('click', '.btn-danger', function () {
                deleteJadwalPiketId = $(this).data('jadwalpiket-id');
            });

            // Confirm delete and redirect
            $('#confirmDeleteJadwalPiket').click(function () {
                // Delete JadwalPiket based on the ID
                // You can implement the deletion process in a separate PHP file
                window.location.href = 'delete_jadwal_piket.php?jadwalpiket_id=' + deleteJadwalPiketId;
            });
        });
    </script>


</body>

</html>