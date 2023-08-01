<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if all required form fields are filled
    if (isset($_POST["nama"]) && isset($_POST["hari"])) {
        // Sanitize and validate the form data
        $nama = $_POST["nama"];
        $hari = $_POST["hari"];
        $waktu_mulai = $_POST["waktu_mulai"];
        $waktu_selesai = $_POST["waktu_selesai"];
        $guru = $_POST["guru"];

        // Combine the waktu_mulai and waktu_selesai into a single string
        $waktu = $waktu_mulai . " - " . $waktu_selesai;

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

        // Insert new Jadwal data into the "mata_pelajaran" table
        $sql = "INSERT INTO mata_pelajaran (nama, hari, waktu, guru) VALUES ('$nama', '$hari', '$waktu', '$guru')";
        if (mysqli_query($conn, $sql)) {
            header("Location: jadwal.php"); // Change 'charts.html' to the appropriate URL
            exit();
        } else {
            // Error inserting data
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Handle form data missing error
        echo "Form data missing!";
    }
}
?>