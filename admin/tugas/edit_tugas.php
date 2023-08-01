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
    // Get the form data
    $taskId = $_POST["task_id"];
    $nama = $_POST["nama"];
    $mataPelajaran = $_POST["mata_pelajaran"];
    $deadline = $_POST["deadline"];

    // Update the data in the "tasks" table
    $sql = "UPDATE tasks
            SET name = '$nama', deadline = '$deadline', id_mata_pelajaran = (SELECT id_mata_pelajaran FROM mata_pelajaran WHERE nama = '$mataPelajaran')
            WHERE id_tasks = '$taskId'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the original page after successful update
        header("Location: tugas.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
