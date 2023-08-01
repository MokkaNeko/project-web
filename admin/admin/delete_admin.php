<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "class";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the admin_id parameter exists
if (isset($_GET["admin_id"])) {
  $adminId = $_GET["admin_id"];

  // Check if there are any associated tasks
  $checkQuery = "SELECT * FROM tasks WHERE id_user = $adminId";
  $checkResult = mysqli_query($conn, $checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
    // Delete associated tasks first
    $deleteTasksQuery = "DELETE FROM tasks WHERE id_user = $adminId";
    if (!mysqli_query($conn, $deleteTasksQuery)) {
      // Handle the error if the deletion fails
      echo "Error deleting associated tasks: " . mysqli_error($conn);
      exit();
    }
  }

  // Delete admin from user table
  $deleteAdminQuery = "DELETE FROM user WHERE id_user = $adminId";
  if (mysqli_query($conn, $deleteAdminQuery)) {
    // Redirect back to the admin table page
    header("Location: admin.php");
    exit();
  } else {
    // Handle the error if the deletion fails
    echo "Error deleting admin: " . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>