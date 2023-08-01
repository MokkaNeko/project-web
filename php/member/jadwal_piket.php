<?php
$conn = mysqli_connect("localhost", "root", "", "class");

// Mengambil data hari dan username dari database
$query = "SELECT jadwal_piket.hari, GROUP_CONCAT(user.username) AS usernames
FROM jadwal_piket
JOIN user ON jadwal_piket.id_user = user.id_user
GROUP BY jadwal_piket.hari
ORDER BY jadwal_piket.hari DESC;";
$result = mysqli_query($conn, $query);

// Menampilkan dropdown untuk setiap data
while ($row = mysqli_fetch_assoc($result)) {
    $jadwalPiket = $row['hari'];
    $usernames = explode(',', $row['usernames']);

    echo '<div class="dropdown">';
    echo '<button class="btn btn-secondary dropdown-toggle" type="button" onclick="toggleDropdown(\'dropdown-menu-' . $jadwalPiket . '\')" aria-expanded="false">';
    echo $jadwalPiket;
    echo '</button>';
    echo '<ul class="dropdown-menu" id="dropdown-menu-' . $jadwalPiket . '">';
    foreach ($usernames as $username) {
        echo '<li>' . $username . '</li>';
    }
    echo '</ul>';
    echo '</div>';
}

// Menutup koneksi ke database
mysqli_close($conn);
?>