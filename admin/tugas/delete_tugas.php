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

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "taskId" parameter is set
    if (isset($_POST['taskId'])) {
        // Sanitize the taskId to prevent SQL injection
        $taskId = mysqli_real_escape_string($conn, $_POST['taskId']);

        // Construct the SQL query to delete the task with the given taskId
        $sql = "DELETE FROM tasks WHERE id_tasks = '$taskId'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Task deleted successfully, redirect to tugas.php
            header("Location: tugas.php");
            exit();
        } else {
            // Error occurred while deleting the task
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // "taskId" parameter is not set
        echo "Invalid request!";
    }
}

// Close the database connection
mysqli_close($conn);
?>
