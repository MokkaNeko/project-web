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
    $hari = $_POST["hari"];
    $nama = $_POST["nama"];

    // Perform validation on the form data (if needed)

    // Insert the new JadwalPiket data into the database
    $sql = "INSERT INTO jadwal_piket (hari, id_user) VALUES ('$hari', (SELECT id_user FROM user WHERE username = '$nama'))";

    if (mysqli_query($conn, $sql)) {
        // If insertion is successful, redirect to the JadwalPiket table page
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
