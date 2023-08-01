<?php
// PHP Session Start
session_start();

// Check if the user is not authenticated as a member
if ($_SESSION['status'] != "member") {
  // Redirect to the index.php page
  header("Location: ../index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>MyClass - Dashboard</title>
  <!-- CSS Stylesheet -->
  <link href="../css/member.css" rel="stylesheet">
</head>

<body>
  <div class="header">
    <h1 style="align-text: center;">MyClass</h1>
    <img src="../img/user.png" alt='Profile Picture' class='profile-img' onclick='openSidebar()'>
  </div>

  <!-- Sidebar Section -->
  <div class="sidebar" id="sidebar">
    <div class="close-icon" onclick="closeSidebar()">
      <img src="../img/exit.png" height="25px" alt="Close Icon">
    </div>
    <div class="profile-details">
      <img src="../img/user.png" alt="Profile Picture">
      <div>
        <!-- Display the username of the logged-in member -->
        <h2>
          <?php echo $_SESSION['username'] ?>
        </h2>
      </div>
    </div>
    <hr>
    <!-- Logout button that triggers the logout() JavaScript function -->
    <div class="logout">
      <img src="../img/logout.png" alt="logout" height='20px' onclick="logout()">
    </div>
  </div>

  <!-- Main Content Area -->
  <div class="content">
    <h2 id="greeting" style="margin-top:25px; margin-bottom:25px">
      <?php echo $_SESSION['username'] ?>
    </h2>
    </br>
    <div class="container">
      <div>
        <h2>Welcome,
          <?php echo $_SESSION['username'] ?>
        </h2>
        <p>Let's check your task and assignment</p>
      </div>
      <img src="../img/pc.png" alt="Image">
    </div>
  </div>

  <!-- Jadwal Section -->
  <div class="container-1">
    <div class="jadwal">
      <div class="heading">
        <a href="page_jadwal.php" class="page-heading">
          <h2>Jadwal</h2>
        </a>
      </div>
      <div class="container-row">
        <?php include('../php/member/jadwal_pelajaran.php') ?>
        <!-- Include the "jadwal_pelajaran.php" file that fetches and displays schedule information -->
      </div>
    </div>

    <hr class="schedule-divider">

    <!-- Jadwal Piket Section -->
    <div class="jadwal-piket">
      <div class="heading">
        <a href="page_jadwal_piket.php" class="page-heading">
          <h2>Jadwal Piket</h2>
        </a>
      </div>
      <div class="container-row">
        <?php include('../php/member/jadwal_piket.php'); ?>
        <!-- Include the "jadwal_piket.php" file that fetches and displays duty schedule information -->
      </div>
    </div>

    <hr class="schedule-divider">

    <!-- Task Section -->
    <div class="task">
      <div class="heading">
        <a href="page_tugas.php" class="page-heading">
          <h2>Task</h2>
        </a>
      </div>
      <div class="container-row">
        <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "class");

        // Check if the user is logged in and retrieve tasks associated with their username
        if (isset($_SESSION['username'])) {
          $username = $_SESSION['username'];

          // SQL query to retrieve tasks and their associated subject names using JOIN
          $sql = "SELECT t.name AS task_name, t.deadline, m.nama AS mata_pelajaran
                        FROM tasks AS t
                        INNER JOIN mata_pelajaran AS m ON t.id_mata_pelajaran = m.id_mata_pelajaran
                        JOIN user ON t.id_user = user.id_user
                        WHERE user.username = '{$username}'
                        ORDER BY t.deadline ASC";

          $result = mysqli_query($conn, $sql);

          // Check if there are any tasks found
          if ($result && mysqli_num_rows($result) > 0) {
            // Loop through the query results and display task information
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<div class='container-3'>";
              echo "<p>" . $row['mata_pelajaran'] . "</p>";
              echo "<div class='deadline'>";
              echo "<img src='../img/book1.jpg' alt='Book Icon'>";
              echo "<p>Deadline: " . $row['deadline'] . "</p>";
              echo "</div>";
              echo "</div>";
            }
          } else {
            echo "No tasks found.";
          }
        } else {
          echo "User not logged in.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
      </div>
    </div>
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

  <div class="footer">
    &copy; MyClass 2023. All rights reserved.
  </div>

  <script>
    // Memanggil fungsi checkScroll saat halaman digulir
    // Add an event listener to call the checkScroll function when the page is scrolled
    window.addEventListener('scroll', checkScroll);

    // Get the navbar element by its ID
    var navbar = document.getElementById('navbar');
    var isScrolling = false;
    var timeout = null;

    // Function to hide the navbar when not scrolling and not hovering over it
    function hideNavbar() {
      if (!isScrolling && !isPointerOverNavbar()) {
        // Add the 'hidden' class to hide the navbar
        navbar.classList.add('hidden');
      }
    }

    // Function to show the navbar and set a timeout to hide it after 2 seconds of inactivity
    function showNavbar() {
      // Remove the 'hidden' class to show the navbar
      navbar.classList.remove('hidden');
      clearTimeout(timeout);
      timeout = setTimeout(hideNavbar, 2000); // Hide navbar after 2 seconds of inactivity
    }

    // Function to handle scrolling events
    function handleScroll() {
      isScrolling = true;
      showNavbar();
      clearTimeout(timeout);
      timeout = setTimeout(function () {
        isScrolling = false;
        hideNavbar();
      }, 2000); // Detect scrolling pause after 200ms
    }

    // Function to check if the mouse pointer is over the navbar
    function isPointerOverNavbar() {
      var rect = navbar.getBoundingClientRect();
      var pointerX = event.clientX;
      var pointerY = event.clientY;

      // Check if the pointer is within the boundaries of the navbar
      if (pointerX >= rect.left && pointerX <= rect.right && pointerY >= rect.top && pointerY <= rect.bottom) {
        return true;
      } else {
        return false;
      }
    }

    // Add event listeners to handle scrolling and mouse movements
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('mousemove', function (event) {
      if (!isScrolling) {
        // Check if the pointer is over the navbar to determine whether to show or hide it
        if (isPointerOverNavbar()) {
          showNavbar();
        } else {
          hideNavbar();
        }
      }
    });

    // Get the element with ID "greeting" and display a greeting message based on the time of day
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

    // Function to open the sidebar
    function openSidebar() {
      var sidebar = document.getElementById("sidebar");
      // Add the 'open' class to show the sidebar
      sidebar.classList.add("open");

      // Blur the other elements in the body except the sidebar
      var elementsToBlur = document.querySelectorAll("body > *:not(.sidebar)");
      for (var i = 0; i < elementsToBlur.length; i++) {
        elementsToBlur[i].style.filter = "blur(8px)";
      }
    }

    // Function to close the sidebar
    function closeSidebar() {
      var sidebar = document.getElementById("sidebar");
      // Remove the 'open' class to hide the sidebar
      sidebar.classList.remove("open");

      // Remove the blur from the other elements in the body
      var elementsToBlur = document.querySelectorAll("body > *:not(.sidebar)");
      for (var i = 0; i < elementsToBlur.length; i++) {
        elementsToBlur[i].style.filter = "none";
      }
    }

    // Function to handle logout
    function logout() {
      // Fetch the logout.php file on the server (you may modify the URL as needed)
      fetch('../php/logout.php')
        .then(response => {
          // Handle the response from the PHP script if needed
          // For example, you can redirect the user to another page after successful logout
          window.location.href = '../php/logout.php';
        })
        .catch(error => {
          // Handle any error that occurred during the request
          console.error('Logout error:', error);
        });
    }

    // Function to toggle the display of a dropdown menu by ID
    function toggleDropdown(menuId) {
      var dropdownMenu = document.getElementById(menuId);
      // Toggle the 'show' class to display or hide the dropdown menu
      dropdownMenu.classList.toggle('show');
    }

    // Function to close dropdown menus when clicking outside
    window.addEventListener('click', function (event) {
      var dropdowns = document.getElementsByClassName('dropdown-menu');
      for (var i = 0; i < dropdowns.length; i++) {
        var dropdown = dropdowns[i];
        if (!dropdown.classList.contains('show')) continue;
        // Check if the click is outside the dropdown menu, then close it
        if (!dropdown.parentNode.contains(event.target)) {
          dropdown.classList.remove('show');
        }
      }
    });

    // Get the elements to be animated on scroll
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    // Detect when the page is scrolled and add animation class to elements in view
    function checkScroll() {
      animatedElements.forEach(element => {
        // Calculate the relative position of the element to the browser window
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        // Check if the element is visible in the window
        if (elementPosition < windowHeight * 0.8) {
          element.classList.add('animate');
        }
      });
    }
  </script>


</body>

</html>