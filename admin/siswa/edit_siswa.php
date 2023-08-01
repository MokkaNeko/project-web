<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the siswa ID from the form
    $siswaId = $_POST['siswa_id'];

    // Get the updated username and password from the form
    $updatedUsername = $_POST['username'];
    $updatedPassword = $_POST['password'];

    // Perform necessary validation and sanitization of the input data

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

    // Update the siswa record in the database
    $sql = "UPDATE user SET username = '$updatedUsername', password = '$updatedPassword' WHERE id_user = '$siswaId' AND status = 'member'";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the siswa table page after successful update
        header("Location: siswa.php");
        exit();
    } else {
        // Handle the case where the update query fails
        echo "Error updating siswa: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
