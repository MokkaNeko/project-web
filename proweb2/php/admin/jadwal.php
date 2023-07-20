
<?php
$conn = mysqli_connect("localhost", "root", "", "class_system");

$daftarHari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat');

// Menampilkan jadwal berdasarkan hari
foreach ($daftarHari as $hari) {
    $sql = "SELECT mata_pelajaran, waktu FROM jadwal WHERE hari = '$hari'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>$hari</h3>";
        echo "<table>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Waktu</th>
                </tr>";

        $no = 1; // Variable untuk menyimpan nomor urut
        while ($row = $result->fetch_assoc()) {
            $mataPelajaran = $row['mata_pelajaran'];
            $waktu = $row['waktu'];

            echo "<tr>
                    <td>$no</td>
                    <td>$mataPelajaran</td>
                    <td>$waktu</td>
                  </tr>";

            $no++; // Increment nomor urut
        }

        echo "</table>";
    } else {
        // Jika tidak ada data, mencetak pesan
        echo "Tidak ada jadwal yang tersedia.";
    }
}

// Menutup koneksi
$conn->close();
?>
