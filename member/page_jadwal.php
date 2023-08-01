<!DOCTYPE html>
<html>

<head>
  <title>Jadwal Pelajaran</title>
  <style>
    /* Gaya tampilan */
    body {
      font-family: "Arial", sans-serif;
      margin: 0;
      padding: 0;
      background-image: linear-gradient(to right,
          #baf3d7,
          #c2f5de,
          #cbf7e4,
          #d4f8ea,
          #ddfaef);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-top: 30px;
    }

    .tab {
      overflow: hidden;
      background-color: #fff;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .tab button {
      background-color: #f8f8f8;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
      border-bottom: 3px solid transparent;
    }

    .tab button:hover {
      background-color: #ebebeb;
    }

    .tab button.active {
      background-color: #ebebeb;
      border-bottom: 3px solid #4CAF50;
      color: #4CAF50;
    }

    .tabcontent {
      display: none;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .jadwal-table {
      border-collapse: collapse;
      width: 100%;
    }

    .jadwal-table th,
    .jadwal-table td {
      padding: 12px;
      text-align: left;
    }

    .jadwal-table th {
      background-color: #f2f2f2;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 14px;
      border-bottom: 2px solid #ccc;
      color: #333;
      width: 100px;
    }

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

    .footer {
      text-align: center;
      background-color: #E0DDCA;
      padding: 20px;
      bottom: 0;
      color: #333333;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <?php
  // Konfigurasi koneksi database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "class";

  // Membuat koneksi database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Memeriksa koneksi
  if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
  }

  // Array untuk hari-hari
  $days = array("senin", "selasa", "rabu", "kamis", "jumat");

  // Mengambil hari yang sedang aktif dari parameter URL atau menggunakan Senin sebagai default
  $activeTab = isset($_GET['hari']) ? strtolower($_GET['hari']) : $days[0];
  ?>

  <!-- Header halaman -->
  <?php include '../php/header.php'; ?>
  <h1 style="margin-top: 150px">Jadwal Pelajaran</h1>

  <div class="tab">
    <!-- Tombol untuk setiap hari -->
    <?php foreach ($days as $day) { ?>
      <button class="tablinks <?php echo ($day === $activeTab) ? 'active' : ''; ?>"
        onclick="openTab(event, '<?php echo $day; ?>')" data-tab="<?php echo $day; ?>"><?php echo ucfirst($day); ?></button>
    <?php } ?>
  </div>

  <!-- Konten untuk setiap hari -->
  <?php foreach ($days as $day) { ?>
    <div id="<?php echo $day; ?>" class="tabcontent" <?php echo ($day === $activeTab) ? 'style="display: block;"' : ''; ?>>
      <h2>
        <?php echo ucfirst($day); ?>
      </h2>
      <p>Jadwal pelajaran untuk hari
        <?php echo ucfirst($day); ?>.
      </p>
      <?php
      // Query untuk mengambil jadwal pelajaran dari database berdasarkan hari
      $sql = "SELECT * FROM mata_pelajaran WHERE hari = '$day' ORDER BY waktu ASC";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        echo '<table class="jadwal-table">
                <thead>
                  <tr>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Waktu</th>
                  </tr>
                </thead>
                <tbody>';
        while ($row = $result->fetch_assoc()) {
          echo '<tr>
                  <td>' . $row['nama'] . '</td>
                  <td>' . $row['guru'] . '</td>
                  <td>' . $row['waktu'] . '</td>
                </tr>';
        }
        echo '</tbody>
              </table>';
      } else {
        echo "Tidak ada jadwal pelajaran yang tersedia.";
      }
      ?>
    </div>
  <?php } ?>


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


  <!-- Script JavaScript -->
  <script>
    var isScrolling = false;
    var timeout = null;

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

  <script>
    var tabs = document.getElementsByClassName("tablinks");
    var tabcontent = document.getElementsByClassName("tabcontent");

    // Fungsi untuk menampilkan tab dan kontennya secara otomatis saat halaman dimuat
    function showDefaultTab() {
      // Menghapus kelas "active" dari semua tab
      for (var i = 0; i < tabs.length; i++) {
        tabs[i].className = tabs[i].className.replace(" active", "");
      }

      // Menentukan tab dan konten default yang ingin ditampilkan
      var defaultTab = "<?php echo $activeTab; ?>";
      var defaultContent = document.getElementById(defaultTab);

      // Menampilkan tab dan konten default
      defaultContent.style.display = "block";
      document.querySelector('[data-tab="' + defaultTab + '"]').className += " active";
    }

    // Fungsi untuk membuka tab saat diklik
    function openTab(evt, tabName) {
      for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      for (var i = 0; i < tabs.length; i++) {
        tabs[i].className = tabs[i].className.replace(" active", "");
      }

      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Memanggil fungsi showDefaultTab saat halaman dimuat
    document.addEventListener("DOMContentLoaded", function () {
      showDefaultTab();
    });
  </script>
</body>

</html>