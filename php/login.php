<?php
session_start();
include 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);

if ($row && password_verify($password, $row['password'])) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = $row['status'];

    if ($row['status'] == "admin") {
        header("Location: ../admin_dashboard.php");
    } elseif ($row['status'] == "member") {
        header("Location: ../dashboard_member.php");
    }
} elseif ($row && $password == $row['password']) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = $row['status'];

    if ($row['status'] == "admin") {
        header("Location: ../admin_dashboard.php");
    } elseif ($row['status'] == "member") {
        header("Location: ../dashboard_member.php");
    }
} else {
    header("Location: login.php?login_error=true");
}
?>
