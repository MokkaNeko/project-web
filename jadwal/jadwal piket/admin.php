<!DOCTYPE html>
<html>
<head>
  <title>Jadwal Piket</title>
  <style>

    
   body {
    font-family: "Arial", sans-serif;
    margin: 0;
    padding: 0;
    background-image: linear-gradient(
      to right,
      #baf3d7,
      #c2f5de,
      #cbf7e4,
      #d4f8ea,
      #ddfaef
    );
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
    width:100px;
}

</style>
</head>
<body>
  <?php
  // Konfigurasi koneksi database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "kelas";

  // Membuat koneksi database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Memeriksa koneksi
  if ($conn->connect_error) {
      die("Koneksi database gagal: " . $conn->connect_error);
  }

  $days = array("senin", "selasa", "rabu", "kamis", "jumat");
  $activeTab = isset($_GET['hari']) ? strtolower($_GET['hari']) : $days[0];
  ?>

  <h1>Jadwal Piket</h1>

  <div class="tab">
    <?php foreach ($days as $day) { ?>
      <button class="tablinks <?php echo ($day === $activeTab) ? 'active' : ''; ?>" onclick="openTab(event, '<?php echo $day; ?>')" data-tab="<?php echo $day; ?>"><?php echo ucfirst($day); ?></button>
    <?php } ?>
  </div>

  <?php foreach ($days as $day) { ?>
    <div id="<?php echo $day; ?>" class="tabcontent" <?php echo ($day === $activeTab) ? 'style="display: block;"' : ''; ?>>
      <h2><?php echo ucfirst($day); ?></h2>
      <p>Jadwal piket untuk hari <?php echo ucfirst($day); ?>.</p>
      <?php echo '<p><a href="admintambah.php?hari=' . ucfirst($day) . '">Tambah Jadwal</a></p>';?>
      <?php
      $sql = "SELECT * FROM jadwal_piket WHERE hari = '$day'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          echo '<table class="jadwal-table">
                  <thead>
                      <tr>
                          <th>Nama Siswa</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>';
          while ($row = $result->fetch_assoc()) {
              echo '<tr>
                      <td>' . $row['nama_siswa'] . '</td>
                      <td><a href="adminedit.php?id=' . $row['id'] . '&hari=' . $row['hari'] . '">Edit</a></td>
                </tr>';
          }
          echo '</tbody>
              </table>';
      } else {
          echo "Tidak ada jadwal piket yang tersedia.";
      }
      ?>
    </div>
  <?php } ?>


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
    document.addEventListener("DOMContentLoaded", function() {
      showDefaultTab();
    });
  </script>
</body>
</html>
