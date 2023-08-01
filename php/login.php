<?php
session_start();
include 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if ($row && $password == $row['password']) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = $row['status'];

    if ($row['status'] == "admin") {
        header("Location: ../admin/dashboard_admin.php");
    } elseif ($row['status'] == "member") {
        header("Location: ../member/dashboard_member.php");
    }
} else {
    $_SESSION['login_error'] = "Invalid username or password";
    header("Location: ../index.php");
}
?>