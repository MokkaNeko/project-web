<style>
    .container-2 {
        position: relative;
        width: 150px;
        border-radius: 0 0 20px 20px;
        padding: 10px;
        background-color: #ffffff;
        margin: 10px 20px;
    }

    .hari {
        position: absolute;
        top: -25px;
        left: -20px;
        background-color: #f0f0f0;
        padding: 5px;
        width: 100px;
        border-radius: 35%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hari h2 {
        margin: 0;
    }

    .mapel {
        position: relative;
        
    }
    .mapel p {
        margin-top: 20px;
    }
</style>

<?php
include 'config.php';

// Daftar hari
$daftarHari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat');

// Menampilkan jadwal berdasarkan hari
foreach ($daftarHari as $hari) {
    // Mengambil data jadwal dari database berdasarkan hari
    $query = "SELECT mata_pelajaran FROM jadwal WHERE hari = '$hari'";
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
            $mataPelajaran = $row['mata_pelajaran'];
            echo '<p>' . $mataPelajaran . '</p>';
        }
        echo '</div>'; // Menutup div mapel

        echo '</div>'; // Menutup div container-2
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
