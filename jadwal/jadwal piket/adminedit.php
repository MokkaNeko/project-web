<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal Piket</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(
            to right,
            #baf3d7,
            #c2f5de,
            #cbf7e4,
            #d4f8ea,
            #ddfaef
    );
        }
        
        .form-container {
            width: 400px;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"] {
            width: 380px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"] {
            width: 392px;
            padding: 6px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="submit"][name="back"] {
            background-color: red;
            color: white;
            
        }
    </style>
</head>
<body>
    <?php
    // Konfigurasi koneksi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kelas";

    $id = $_GET['id'];
    $hari = $_GET['hari']; 


    // Mengatur level error_reporting
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

    
    // Membuat koneksi database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }


    // Memeriksa apakah form telah disubmit untuk operasi hapus
    if (isset($_POST['delete'])) {
        // Simpan nilai hari sebelumnya sebelum menghapus data
        $previousHari = $_GET['hari'];
        $lihatStmt = $conn->prepare("SELECT * from jadwal_piket WHERE id = ? AND hari = ?");
        $lihatStmt->bind_param("is", $id, $previousHari);
        $lihatStmt->execute();
        $lihatResult = $lihatStmt->get_result();
    
        if ($lihatResult->num_rows > 0) {
            // Data ditemukan, lanjutkan dengan penghapusan
            $stmt = $conn->prepare("DELETE from jadwal_piket WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                // Menampilkan pesan alert sebelum mengarahkan halaman
                echo '<script>alert("Data berhasil dihapus.");</script>';
    
                // Mengarahkan pengguna ke halaman sebelumnya dengan parameter hari yang sebelumnya diklik
                $redirectURL = 'admin.php?hari=' . $previousHari;
                echo '<script>window.location.href = "' . $redirectURL . '";</script>';
                exit; // Hentikan eksekusi skrip
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            // Data tidak ditemukan, tampilkan pesan atau lakukan tindakan lainnya
            echo '<script>alert("Data tidak ditemukan.");</script>';
        }
    
        $lihatStmt->close();
    }

    
        // Memeriksa apakah form telah disubmit untuk operasi update
        if (isset($_POST['update'])) {
        $previousHari = $_GET['hari'];
        $lihatStmt = $conn->prepare("SELECT * from jadwal_piket WHERE id = ? AND hari = ?");
        $lihatStmt->bind_param("is", $id, $previousHari);
        $lihatStmt->execute();
        $lihatResult = $lihatStmt->get_result();

        if ($lihatResult->num_rows > 0) {
            // Mendapatkan nilai yang diinputkan dari form
            $nama = $_POST['nama_siswa'];
            $stmt = $conn->prepare("UPDATE jadwal_pelajaran SET nama_siswa = ? WHERE id = ?");
            $stmt->bind_param("si", $nama, $id);

            if ($stmt->execute()) {
                // Menampilkan pesan alert sebelum mengarahkan halaman
                echo '<script>alert("Data berhasil diupdate.");</script>';
    
                // Mengarahkan pengguna ke halaman sebelumnya dengan parameter hari yang sebelumnya diklik
                $redirectURL = 'admin.php?hari=' . $previousHari;
                echo '<script>window.location.href = "' . $redirectURL . '";</script>';
                exit; // Hentikan eksekusi skrip
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            // Data tidak ditemukan, tampilkan pesan atau lakukan tindakan lainnya
            echo '<script>alert("Data tidak ditemukan.");</script>';
        }
    
        $lihatStmt->close();
    }
    if(isset($_POST['back'])){
        $previousHari = $_GET['hari'];
        $redirectURL = 'admin.php?hari=' . $previousHari;
                echo '<script>window.location.href = "' . $redirectURL . '";</script>';
                exit; // Hentikan eksekusi skrip
    }

    // Mendapatkan ID data yang akan diedit atau dihapus
    
    $stmt = $conn->prepare("SELECT * from jadwal_piket WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    // Menutup koneksi database
    $conn->close();
    ?>
    
        <div class="form-container">
        <h1>Edit Jadwal Piket</h1>
        <p>Hari <?php echo $hari; ?></p>

        <form method="POST" action="">
            <label for="mapel">Nama Murid:</label>
            <input type="text" name="nama_murid" value="<?php echo $row['nama_siswa']; ?>"><br>

            <input type="submit" name="update" value="Update">
        </form>
        <form method = "POST" action ="">
            <input type="submit" name="delete" value="Delete">
        </form>
        <form method="POST" action="">
            <input type="submit" name="back" value="Kembali">
        </form>
    </body>
    </html>
