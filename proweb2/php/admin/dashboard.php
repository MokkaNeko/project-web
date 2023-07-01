<?php
$conn = mysqli_connect("localhost", "root", "", "class_system");

// Query to get the number of admins
$sqlAdmins = "SELECT COUNT(*) AS adminCount FROM user WHERE status = 'admin'";
$resultAdmins = $conn->query($sqlAdmins);
$adminCount = ($resultAdmins->num_rows > 0) ? $resultAdmins->fetch_assoc()["adminCount"] : 0;

// Query to get the number of members
$sqlMembers = "SELECT COUNT(*) AS memberCount FROM user WHERE status = 'member'";
$resultMembers = $conn->query($sqlMembers);
$memberCount = ($resultMembers->num_rows > 0) ? $resultMembers->fetch_assoc()["memberCount"] : 0;

// Close the database connection
$conn->close();
?>
