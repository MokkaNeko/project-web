<?php
$conn = mysqli_connect("localhost", "root", "", "class_system");
// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Eksekusi query SQL
$sql = "SELECT mata_pelajaran, CONCAT('<img src=\"', img, '\" alt=\"\">') AS image_html, deadline FROM tugas";
$result = mysqli_query($conn, $sql);

// Periksa hasil query
if (mysqli_num_rows($result) > 0) {
    // Loop melalui hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['image_html'];
        echo '<p>Deadline: <br>' . $row['deadline'] . '</p>';
    }
} else {
    echo "Tidak ada hasil.";
}

// Tutup koneksi
mysqli_close($conn);
?>