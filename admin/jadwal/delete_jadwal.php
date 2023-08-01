<?php
// Check if the Jadwal ID is provided in the query string
if (isset($_GET["jadwal_id"])) {
    // Sanitize and validate the Jadwal ID
    $jadwal_id = $_GET["jadwal_id"];

    // Database connection credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "class";

    // Create a new database connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to delete the Jadwal entry
    $sql = "DELETE FROM mata_pelajaran WHERE id_mata_pelajaran='$jadwal_id'";

    if (mysqli_query($conn, $sql)) {
        // If the query was successful, redirect to the original page (Jadwal Table)
        header("Location: jadwal.php"); // Change 'charts.html' to the appropriate URL
        exit();
    } else {
        // If the query failed, display an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle the case when Jadwal ID is not provided in the query string
    echo "Jadwal ID not provided.";
}
?>
