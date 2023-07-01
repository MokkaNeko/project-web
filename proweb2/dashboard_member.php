<?php
session_start();
if ($_SESSION['status'] != "member") {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/member.css" />
</head>
<body>
<div class="header">
    <h1>MyClass</h1>
    <img src="img/user.png" alt='Profile Picture' class='profile-img' onclick='openSidebar()'>
    
</div>

  
    <div class="sidebar" id="sidebar">
        <div class="close-icon" onclick="closeSidebar()">
            <img src="img/exit.png" height="15px" alt="Close Icon">
        </div>
        <div class="profile-details">
            <img src="img/user.png" alt="Profile Picture">
            <div>
                <h2><?php echo $_SESSION['username']?></h2>
            </div>
        </div>
            <hr>
        <div class="logout">
          <img src="img/logout.png" alt="logout" height='20px' onclick="logout()">
        </div>
    </div>

    <div class="content">
        <h2 style="margin-left: 100px;">Hi!<span><?php echo $_SESSION['username']?></span></h2>
        <p style="margin-left: 100px; margin-bottom: 50px;" id="greeting">selamat pagi</p>
        <div class="container">
            <div>
                <h2>Welcome</h2>
                <p>Let's check your task and assignment</p>
            </div>
            <img src="img/pc.png" alt="Image">
        </div>
    </div>

    <div class="container-1">
      <div class="jadwal">
        <div class="heading">
            <h2>Jadwal</h2>
        </div>
        <div class="container-row">
            <?php include('php/member/jadwal_pelajaran.php') ?> 
        </div>
      </div>
      
      <hr class="schedule-divider">
      
      <div class="jadwal-piket">
        <div class="heading">
          <h2>Jadwal Piket</h2>
        </div>
        <div class="container-row">
          <?php include('php/member/jadwal_piket.php'); ?>
        </div>
      </div>

        <hr class="schedule-divider">

        <div class="task">
          <div class="heading">
            <h2>Task</h2>
          </div>
          <div class="container-row">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "class_system");

            // Eksekusi query SQL
            $sql = "SELECT mata_pelajaran, CONCAT('<img src=\"', img, '\" alt=\"\">') AS image_html, deadline FROM tugas GROUP BY mata_pelajaran";
            $result = mysqli_query($conn, $sql);

            // Periksa hasil query
            if ($result && mysqli_num_rows($result) > 0) {
              // Loop melalui hasil query
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='container-3'>";
                echo "<p>" . $row['mata_pelajaran'] . "</p>";
                echo "<div class='deadline'>";
                echo $row['image_html']; // Tampilkan HTML gambar langsung
                echo "<p>Deadline: <br>" . $row['deadline'] . "</p>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              echo "Tidak ada hasil.";
            }

            // Tutup koneksi
            mysqli_close($conn);
            ?>
            
          </div>
        </div>
    </div>

    <div class="footer">
      &copy; 2023 Your Website. All rights reserved.
    </div>
  <script>
    var greeting = document.getElementById("greeting");
        var currentHour = new Date().getHours();

        if (currentHour >= 1 && currentHour < 12) {
            greeting.textContent = "Selamat Pagi";
        } else if (currentHour >= 12 && currentHour < 15) {
            greeting.textContent = "Selamat Siang";
        } else if (currentHour >= 15 && currentHour < 18) {
            greeting.textContent = "Selamat Sore";
        } else {
            greeting.textContent = "Selamat Malam";
        }

    function openSidebar() {
      var sidebar = document.getElementById("sidebar");
      sidebar.classList.add("open");
      
      var elementsToBlur = document.querySelectorAll("body > *:not(.sidebar)");
      for (var i = 0; i < elementsToBlur.length; i++) {
        elementsToBlur[i].style.filter = "blur(8px)";
      }
    }
    
    function closeSidebar() {
      var sidebar = document.getElementById("sidebar");
      sidebar.classList.remove("open");
      
      var elementsToBlur = document.querySelectorAll("body > *:not(.sidebar)");
      for (var i = 0; i < elementsToBlur.length; i++) {
        elementsToBlur[i].style.filter = "none";
      }
    }
    
    function logout() {
      // Implement logout functionality here
      alert("Logout");

      fetch('php/logout.php')
        .then(response => {
          // Handle the response from the PHP script if needed
          // For example, you can redirect the user to another page after successful logout
          window.location.href = 'php/logout.php';
        })
        .catch(error => {
          // Handle any error that occurred during the request
          console.error('Logout error:', error);
        });
    }


    function toggleDropdown(menuId) {
      var dropdownMenu = document.getElementById(menuId);
      dropdownMenu.classList.toggle('show');
    }

    // Close dropdown when clicking outside
    window.addEventListener('click', function(event) {
      var dropdowns = document.getElementsByClassName('dropdown-menu');
      for (var i = 0; i < dropdowns.length; i++) {
        var dropdown = dropdowns[i];
        if (!dropdown.classList.contains('show')) continue;
        if (!dropdown.parentNode.contains(event.target)) {
          dropdown.classList.remove('show');
        }
      }
    });


  </script>

  
</body>
</html>
