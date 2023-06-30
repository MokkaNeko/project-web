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
    

  <style>
    body {
      background-color: #ECE5C7;
      margin: 0;
      padding: 0;
      
    }
    
    .header {
      height: 50px;
      display: flex;
      align-items: center;
      padding: 20px;
      background-color: #ffffff;
    }
    
    .profile-img {
      
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-left: auto;
      cursor: pointer;
    }
    
    .sidebar {
      position: fixed;
      top: 0;
      right: -400px;
      width: 300px;
      height: 30%;
      background-color: #ffffff;
      box-shadow: -2px 0 4px rgba(0, 0, 0, 0.1);
      transition: right 0.3s ease-in-out;
      z-index: 999;
      padding: 20px;
      text-align: center;
    }
    
    .sidebar.open {
      right: 0;
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
    }
    
    .sidebar .close-icon {
      position: absolute;
      top: 20px;
      left: 20px
      cursor: pointer;
    }
    
    .sidebar .profile-details {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }
    
    .sidebar .profile-details img {
      margin-top: 20px;
      display: block;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-right: 10px;
    }
    
    .sidebar hr {
      margin: 20px 0;
      border: none;
      border-top: 1px solid #dddddd;
    }
    
    .sidebar .logout {
      position: absolute;
      margin-top: 15px;
      left: 25px
      cursor: pointer;
    }

    
    .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-radius: 20px;
      background-color: rgba(255, 255, 255, 0.5);
      padding: 10px 20px;
      backdrop-filter: blur(8px);
      position: absolute;
      left: 50%;
      height: 200px;
      transform: translateX(-50%);
    }
    
    .container h2 {
      margin-top: -30px;
      margin-right: 20px;
    }
    
    .container p {
      margin: 0;
    }
    
    .container img {
      width: 30%;
      height: 70%;
      
    }
    .container-1 {
      margin-top: 350px;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      background-color: rgba(232, 53, 53, 0.5);
      padding: 20px 20px 100px 20px;
      
    }
    
    .heading {
      text-align: center;
      border-radius: 20px;
      background-color: rgba(255, 255, 255, 0.5);
      padding: 10px;
      margin-bottom: 30px;
    }
    .container-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .container-2 {
        z-index: 0;
        width: calc(33.33% - 20px); /* Adjust the width to fit three elements per row */
      position: relative;
      background-color: #ffffff;
      border-radius: 0 0 20px 20px;
      padding: 20px;
      width: 150px;
      margin: 50px 25px;
    }
    
    .hari {
    position: absolute;
    top: -35px;
    left: -20px;
    background-color: #bbec19;
    padding: 10px;
    border-radius: 35%;
    z-index: 1;
    height: 40px;
    width: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    }
    
    
    .mapel {
      position: relative;
      z-index: 0;
    }
    .schedule-divider {
      border: none;
      border-top: 1px solid #dddddd;
      margin: 40px 0;
    }

    .dropdown {
      position: relative;
      display: inline-block;
      margin: 10px;
    }

    .dropdown button {
      background-color: #f2f2f2;
      border: none;
      color: #333;
      padding: 8px 16px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      width: 150px;
      display: block;
      text-align: center;
    }

    .dropdown button:hover {
      background-color: #ddd;
    }

    .dropdown ul {
      position: absolute;
      top: calc(100% + 5px);
      left: 0;
      background-color: #fff;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      border-radius: 4px;
      padding: 8px 0;
      min-width: 120px;
      z-index: 1;
      display: none;
      list-style-type: none;
      margin: 10px;
    }

    .dropdown li {
      padding: 8px 16px;
      color: #333;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .dropdown li:hover {
      background-color: #f2f2f2;
    }

    .dropdown.open ul {
      display: block;
    }
    .dropdown .show {
      display: block;
    }

    .task {
      margin-top: 50px;
    }

    .container-3 {
      position: relative;
      background-color: #f2f2f2;
      border-radius: 20px;
      padding: 20px;
      width: 200px;
      margin: 10px;
      justify-content: center;
    }

    .container-3 img {
      margin-top: 10px;
      max-height: 100px;
      object-fit: cover;
    }

    .container-3 .deadline {
      display: flex;
      align-items: center;
    }

    .container-3 .deadline span {
      font-size: 14px;
    }

    .container-3 p {
      margin: 0;
      text-align: center;
    }

    .container-3 .deadline p {
      margin: 10px;
      text-align: left;
    }

    .footer {
      text-align: center;
      background-color: #ffffff;
      padding: 20px;
      bottom: 0;
      color: #333333;
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
    <h1>Welcome to My Website</h1>
    <img src="user.png" alt="Profile Picture" class="profile-img" onclick="openSidebar()">
</div>

  
    <div class="sidebar" id="sidebar">
        <div class="close-icon" onclick="closeSidebar()">
            <img src="cross-circle_icon-icons.com_48318.png" height="15px" alt="Close Icon">
        </div>
        <div class="profile-details">
            <img src="user.png" alt="Profile Picture">
            <div>
                <h2><?php echo $_SESSION['username']?></h2>
            </div>
        </div>
            <hr>
        <div class="logout">
          <img src="logout.png" alt="logout" height='20px' onclick="logout()">
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
            <img src="login.png" alt="Image">
        </div>
    </div>

    <div class="container-1">
      <div class="jadwal">
        <div class="heading">
            <h2>Jadwal</h2>
        </div>
        <div class="container-row">
            <?php include('php/jadwal_pelajaran.php') ?> 
        </div>
      </div>
      
      <hr class="schedule-divider">
      
      <div class="jadwal-piket">
        <div class="heading">
          <h2>Jadwal Piket</h2>
        </div>
        <div class="container-row">
          <?php include('php/jadwal_piket.php'); ?>
        </div>
      </div>

        <hr class="schedule-divider">

        <div class="task">
          <div class="heading">
            <h2>Task</h2>
          </div>
          <div class="container-row">
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            <div class="container-3">
              <p>Matematika</p>
              <div class="deadline">
                <img src="book/10156.jpg" alt="">
                <p>Deadline: <br>30 Juni 2023</p>
              </div>
            </div>
            
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
