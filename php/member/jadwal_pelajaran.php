<?php
$conn = mysqli_connect("localhost", "root", "", "class");

// Daftar hari
$daftarHari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

// Menampilkan jadwal berdasarkan hari
foreach ($daftarHari as $hari) {
    // Mengambil data jadwal dari database berdasarkan hari
    $query = "SELECT nama FROM mata_pelajaran WHERE hari = '$hari'";
    $result = mysqli_query($conn, $query);

    // Jika ada jadwal, tampilkan container-2
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container-2">';
        // Menampilkan judul hari
        echo '<div class="hari">
                <h2>' . $hari . '</h2>
            </div>';

        // Menampilkan mata pelajaran
        echo '<div class="mapel">';
        while ($row = mysqli_fetch_assoc($result)) {
            $mataPelajaran = $row['nama'];
            echo '<p>' . $mataPelajaran . '</p>';
        }
        echo '</div>'; // Menutup div mapel

        echo '</div>'; // Menutup div container-2
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>