<?php
include 'config.php';
$query = "SELECT foto FROM user";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Foto tersedia, tampilkan foto dari database
    while ($row = mysqli_fetch_assoc($result)) {
        $foto = $row['foto'];
        echo '<img src="' . htmlspecialchars($foto) . '" alt="Profile Picture" class="profile-img" onclick="openSidebar()">';
    }
} else {
    echo "<> HAAIII </";
    // Tidak ada foto tersedia, tampilkan user.png
    echo '<img src="../user.png" alt="Profile Picture" class="profile-img" onclick="openSidebar()">';
}

?>
