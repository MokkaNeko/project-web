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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the values from the form
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Prepare and execute the SQL statement
  $sql = "INSERT INTO user (username, password, status) VALUES ('$username', '$password', 'admin')";
  if (mysqli_query($conn, $sql)) {
    // Redirect back to the admin table page
    header("Location: admin.php");
    exit();
  } else {
    // Handle the error if the query fails
    echo "Error: " . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>
