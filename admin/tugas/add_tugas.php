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
    $nama = $_POST["nama"];
    $mataPelajaran = $_POST["mata_pelajaran"];
    $deadline = $_POST["deadline"];
    $usernames = $_POST["usernames"];

    // Insert the data into the "tasks" table
    $sql = "INSERT INTO tasks (name, deadline, completed, id_mata_pelajaran, id_user)
            VALUES ('$nama', '$deadline', 0, (SELECT id_mata_pelajaran FROM mata_pelajaran WHERE nama = '$mataPelajaran'), NULL)";

    if (mysqli_query($conn, $sql)) {
        $taskId = mysqli_insert_id($conn);

        // Insert task assignments for selected usernames (members)
        foreach ($usernames as $username) {
            $sql = "INSERT INTO tasks (name, deadline, completed, id_mata_pelajaran, id_user)
                    VALUES ('$nama', '$deadline', 0, (SELECT id_mata_pelajaran FROM mata_pelajaran WHERE nama = '$mataPelajaran'), (SELECT id_user FROM user WHERE username = '$username'))";
            mysqli_query($conn, $sql);
        }

        // Redirect to the original page after successful insertion
        header("Location: tugas.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
