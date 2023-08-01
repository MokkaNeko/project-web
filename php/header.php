<?php
session_start();
if ($_SESSION['status'] != "member") {
    header("Location: ../index.php");
    exit();
}
?>


<style>
    body {
        margin: 0;
        padding: 0;
    }

    .header {
        height: 50px;
        display: flex;
        align-items: center;
        padding: 20px;
        background-color: #E0DDCA;
        position: fixed;
        /* Menjadikan elemen fixed */
        top: 0;
        /* Menetapkan posisi di bagian atas halaman */
        width: 100%;
        /* Menetapkan lebar elemen sesuai lebar layar */
        z-index: 333;
    }


    .profile-img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 50px;
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
        left: 20px;
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
        left: 25px;
    }
</style>

<div class="header">
    <h1>MyClass</h1>
    <img src="../img/user.png" alt='Profile Picture' class='profile-img' onclick='openSidebar()'>

</div>


<div class="sidebar" id="sidebar">
    <div class="close-icon" onclick="closeSidebar()">
        <img src="../img/exit.png" height="15px" alt="Close Icon">
    </div>
    <div class="profile-details">
        <img src="../img/user.png" alt="Profile Picture">
        <div>
            <h2>
                <?php echo $_SESSION['username'] ?>
            </h2>
        </div>
    </div>
    <hr>
    <div class="logout">
        <img src="../img/logout.png" alt="logout" height='20px' onclick="logout()">
    </div>
</div>


<script>
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
</script>