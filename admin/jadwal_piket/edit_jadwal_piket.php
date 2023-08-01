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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $jadwalpiket_id = $_POST["jadwalpiket_id"];
    $hari = $_POST["hari"];
    $nama = $_POST["nama"];

    // Perform validation on the form data (if needed)

    // Update the existing JadwalPiket data in the database
    $sql = "UPDATE jadwal_piket SET hari = '$hari', id_user = (SELECT id_user FROM user WHERE username = '$nama') WHERE id_jadwal_piket = $jadwalpiket_id";

    if (mysqli_query($conn, $sql)) {
        // If update is successful, redirect to the JadwalPiket table page
        header("Location: jadwal_piket.php");
        exit;
    } else {
        // If there's an error, display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
