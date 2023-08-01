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

// Check if the "jadwalpiket_id" query parameter exists
if (isset($_GET['jadwalpiket_id'])) {
    // Get the JadwalPiket ID from the query parameter
    $jadwalpiket_id = $_GET['jadwalpiket_id'];

    // Delete the JadwalPiket from the database
    $sql = "DELETE FROM jadwal_piket WHERE id_jadwal_piket = $jadwalpiket_id";

    if (mysqli_query($conn, $sql)) {
        // If deletion is successful, redirect back to the JadwalPiket table page
        header("Location: jadwal_piket.php");
        exit;
    } else {
        // If there's an error, display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // If the "jadwalpiket_id" query parameter is missing, redirect back to the JadwalPiket table page
    header("Location: jadwal_piket.php");
    exit;
}

// Close the database connection
mysqli_close($conn);
?>
