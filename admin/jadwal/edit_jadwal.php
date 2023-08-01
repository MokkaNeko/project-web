<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $jadwalId = $_POST["jadwal_id"];
    $nama = $_POST["nama"];
    $hari = $_POST["hari"];
    $waktuMulai = $_POST["waktu_mulai"];
    $waktuSelesai = $_POST["waktu_selesai"];
    $guru = $_POST["guru"];

    // Validate and sanitize the input data if needed

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

    // Update the Jadwal entry in the database
    $sql = "UPDATE mata_pelajaran 
            SET nama = '$nama', hari = '$hari', waktu = '$waktuMulai - $waktuSelesai', guru = '$guru'
            WHERE id_mata_pelajaran = '$jadwalId'";

    if (mysqli_query($conn, $sql)) {
        // Successful update, redirect back to jadwal.php
        header("Location: jadwal.php");
        exit();
    } else {
        // Error handling if the update fails
        // You can display an error message or log the error
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
