<?php
// File: page_tugas.php
// Deskripsi: Halaman untuk menampilkan daftar tugas pengguna yang telah masuk sebagai anggota (member).

// Mulai sesi atau mengambil sesi yang sudah ada
session_start();

// Periksa apakah pengguna sudah masuk dan memiliki status "member"
if ($_SESSION['status'] != "member") {
    // Jika tidak, arahkan ke halaman utama
    header("Location: ../index.php");
    exit();
}

// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'class';

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

// Periksa apakah pengguna sudah masuk dengan username
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Mengupdate status tugas jika checkbox diubah
    if (isset($_POST['task_id']) && isset($_POST['completed'])) {
        $taskId = $_POST['task_id'];
        $completed = $_POST['completed'] ? 1 : 0;

        // Perbarui status tugas di database
        $query = "UPDATE tasks SET completed = $completed WHERE id_tasks = $taskId";
        mysqli_query($conn, $query);

        // Redirect ke halaman ini untuk menyegarkan daftar tugas
        header("Location: page_tugas.php");
        exit();
    }

    // Mendapatkan daftar tugas dari database untuk pengguna yang sedang masuk
    $query = "SELECT tasks.*, mata_pelajaran.nama AS nama_mata_pelajaran
              FROM tasks
              INNER JOIN mata_pelajaran ON tasks.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran
              JOIN user ON tasks.id_user = user.id_user
              WHERE user.username = '{$username}'
              ORDER BY mata_pelajaran.id_mata_pelajaran, tasks.completed ASC";
    $result = mysqli_query($conn, $query);
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Menghitung total tugas dan tugas yang selesai
    $totalTasks = count($tasks);
    $completedTasks = 0;
    foreach ($tasks as $task) {
        if ($task['completed']) {
            $completedTasks++;
        }
    }

    // Menghitung persentase kemajuan
    $progress = 0;
    if ($totalTasks > 0) {
        $progress = ($completedTasks / $totalTasks) * 100;
    }

    // Fungsi untuk menandai tugas sebagai selesai
    function markTaskAsCompleted($taskId)
    {
        global $conn;
        $query = "UPDATE tasks SET completed = 1 WHERE id_tasks = $taskId";
        mysqli_query($conn, $query);
        header("Location: page_tugas.php"); // Refresh halaman setelah menandai tugas selesai
        exit();
    }
} else {
    // Jika pengguna belum masuk, tampilkan pesan
    echo "User not logged in.";
}

$containerHeight = $totalTasks > 0 ? 'auto' : '500px';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Tugas</title>
    <!-- Gaya CSS -->
    <style>
        /* Gaya halaman */
        body {
            background-image: linear-gradient(#FFD400, #FFFFB7);
            padding-bottom: 100px;
        }

        /* Gaya kontainer */
        .container h1 {
            margin-left: 600px;
            margin-right: 600px;
        }

        .subject {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .task {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-left: 10px;
            background-color: #F6F8E2;
        }

        .completed {
            text-decoration: line-through;
        }

        .task p {
            margin-left: 25px;
            margin-top: 5px;
        }

        .task-container {
            display: inline-block;
            width: 40%;
            /* Sesuaikan lebarnya jika diperlukan */
            margin: 10px;
            vertical-align: top;
            border: 1px;
            background-color: #FCBC58;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            /* Tambahkan box-shadow untuk memberikan efek bayangan */
            padding: 20px;
        }

        .container {
            height: 500px;
            border: px solid;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            /* Tambahkan box-shadow untuk memberikan efek bayangan */
            padding: 20px;
            margin-top: 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            background-color: #FFFFFF;
            margin-bottom: 50px;
        }

        .container .task-container:first-child {
            margin-top: 50px;
            /* Memberikan margin-top pada task-container pertama dan kedua di dalam container */
        }

        /* Gaya navbar */
        .navbar {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f2f2f2;
            border-top: 1px solid #ddd;
            width: 400px;
            height: 60px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            transition: opacity 0.3s;
            opacity: 1;
        }

        .navbar.hidden {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s, height 0.3s;
            height: 0;
        }

        .navbar a {
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar a img {
            width: 25px;
            height: 25px;
            margin-bottom: 5px;
        }

        /* Gaya footer */
        .footer {
            text-align: center;
            background-color: #E0DDCA;
            padding: 20px;
            bottom: 0;
            color: #333333;
            font-size: 14px;
        }
    </style>

    <!-- Script JavaScript -->
    <script>
        // Fungsi untuk memperbarui status tugas
        function updateTaskStatus(taskId, completed) {
            // Membuat form tersembunyi dan mengirimkannya
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'page_tugas.php';

            var taskIdField = document.createElement('input');
            taskIdField.type = 'hidden';
            taskIdField.name = 'task_id';
            taskIdField.value = taskId;

            var completedField = document.createElement('input');
            completedField.type = 'hidden';
            completedField.name = 'completed';
            completedField.value = completed ? 0 : 1;

            form.appendChild(taskIdField);
            form.appendChild(completedField);
            document.body.appendChild(form);

            form.submit();
        }
    </script>
</head>

<body>
    <!-- Include file header.php -->
    <?php include '../php/header.php'; ?>

    <!-- Tampilan progress bar -->
    <div class="progress-bar">
        <div class="progress" style="width: <?php echo $progress; ?>%;"></div>
    </div>

    <!-- Kontainer untuk daftar tugas -->
    <div class="container" style="height: <?php echo $containerHeight; ?>;">
        <h1>Daftar Tugas</h1>
        <?php
        $currentSubject = '';
        if (empty($tasks)) {
            // Tampilkan pesan jika tidak ada tugas
            echo '<p>Tidak ada tugas untuk ditampilkan.</p>';
        } else {
            foreach ($tasks as $task) {
                if ($task['nama_mata_pelajaran'] !== $currentSubject) {
                    // Jika subjek berubah, buat kontainer baru
                    if ($currentSubject !== '') {
                        echo '</div>'; // Tutup kontainer tugas sebelumnya
                    }
                    $currentSubject = $task['nama_mata_pelajaran'];
                    echo '<div class="task-container">';
                    echo '<div class="subject"> <h2>' . $currentSubject . '</h2></div>';
                }
                ?>
                <!-- Tugas individual -->
                <div class="task">
                    <label>
                        <!-- Checkbox untuk status selesai -->
                        <input type="checkbox" <?php echo $task['completed'] ? 'checked' : ''; ?>
                            onchange="updateTaskStatus(<?php echo $task['id_tasks']; ?>, <?php echo $task['completed']; ?>)">
                        <!-- Nama tugas, dengan garis bawah jika selesai -->
                        <span <?php echo $task['completed'] ? 'class="completed"' : ''; ?>><?php echo $task['name']; ?></span>
                    </label>
                    <br>
                    <!-- Deadline tugas -->
                    <p>Deadline:
                        <?php echo $task['deadline']; ?>
                    </p>
                </div>
                <?php
            }
            // Tutup kontainer tugas terakhir
            echo '</div>';
        }
        ?>
    </div>


    <!-- Navbar Section -->
    <div class="navbar" id="navbar">

        <a href="dashboard_member.php">
            <img src="../img/house.png" alt="home">
            home
        </a>
        <a href="page_jadwal.php">
            <img src="../img/schedule.png" alt="schedule">
            schedule
        </a>
        <a href="page_jadwal_piket.php">
            <img src="../img/cleaning.png" alt="picket">
            piket
        </a>
        <a href="page_tugas.php">
            <img src="../img/clipboard.png" alt="task">
            task
        </a>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2023 MyClass. All rights reserved.
    </div>

    <?php
    // Tandai tugas sebagai selesai jika parameter 'complete' diberikan
    if (isset($_GET['complete'])) {
        $taskId = $_GET['complete'];
        markTaskAsCompleted($taskId);
    }
    ?>

    <!-- Script JavaScript -->
    <script>
        var isScrolling = false;
        var timeout = null;
        // Fungsi untuk memperbarui status tugas
        function updateTaskStatus(taskId, completed) {
            // Membuat form tersembunyi dan mengirimkannya
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'page_tugas.php';

            var taskIdField = document.createElement('input');
            taskIdField.type = 'hidden';
            taskIdField.name = 'task_id';
            taskIdField.value = taskId;

            var completedField = document.createElement('input');
            completedField.type = 'hidden';
            completedField.name = 'completed';
            completedField.value = completed ? 0 : 1;

            form.appendChild(taskIdField);
            form.appendChild(completedField);
            document.body.appendChild(form);

            form.submit();
        }

        // Fungsi untuk menampilkan atau menyembunyikan navbar
        function toggleNavbarVisibility(show) {
            var navbar = document.getElementById('navbar');
            navbar.style.opacity = show ? 1 : 0;
            navbar.style.pointerEvents = show ? 'auto' : 'none';
        }

        // Fungsi untuk menyembunyikan navbar setelah beberapa waktu tanpa aktivitas
        function hideNavbar() {
            toggleNavbarVisibility(false);
        }

        // Fungsi untuk menampilkan navbar saat halaman digulir atau pointer bergerak
        function showNavbar() {
            toggleNavbarVisibility(true);
            clearTimeout(timeout);
            timeout = setTimeout(hideNavbar, 2000); // Sembunyikan navbar setelah 2 detik tanpa aktivitas
        }

        // Fungsi untuk menangani peristiwa scroll
        function handleScroll() {
            isScrolling = true;
            showNavbar();
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                isScrolling = false;
                hideNavbar();
            }, 2000); // Deteksi berhentinya scroll setelah 2000ms (2 detik)
        }

        // Fungsi untuk memeriksa apakah pointer berada di atas navbar
        function isPointerOverNavbar(event) {
            var rect = navbar.getBoundingClientRect();
            var pointerX = event.clientX;
            var pointerY = event.clientY;

            return (
                pointerX >= rect.left && pointerX <= rect.right &&
                pointerY >= rect.top && pointerY <= rect.bottom
            );
        }

        // Tambahkan event listener untuk menampilkan navbar saat digulir atau pointer bergerak
        window.addEventListener('scroll', handleScroll);
        window.addEventListener('mousemove', function (event) {
            if (!isScrolling) {
                if (isPointerOverNavbar(event)) {
                    showNavbar();
                } else {
                    hideNavbar();
                }
            }
        });

        // Fungsi untuk menangani animasi saat halaman digulir
        function checkScroll() {
            animatedElements.forEach(element => {
                // Hitung posisi relatif elemen terhadap jendela browser
                const elementPosition = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                // Periksa apakah elemen terlihat di jendela
                if (elementPosition < windowHeight * 0.8) {
                    element.classList.add('animate');
                }
            });
        }
    </script>

</body>

</html>