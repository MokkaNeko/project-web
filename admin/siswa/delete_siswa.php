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

// Check if the siswa_id parameter exists
if (isset($_GET["siswa_id"])) {
    $siswaId = $_GET["siswa_id"];

    // Delete siswa from the user table
    $deleteSiswaQuery = "DELETE FROM user WHERE id_user = $siswaId";
    if (mysqli_query($conn, $deleteSiswaQuery)) {
        // Redirect back to the siswa table page
        header("Location: siswa.php");
        exit();
    } else {
        // Handle the error if the deletion fails
        echo "Error deleting siswa: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
