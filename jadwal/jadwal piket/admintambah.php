<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal Piket</title>
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

    // Memeriksa apakah form telah disubmit untuk operasi insert
    if (isset($_POST['insert'])) {
        // Mendapatkan nilai yang diinputkan dari form
        $nama = $_POST['nama_siswa'];
        $previousHari = $_GET['hari'];

        // Insert data ke database (menggunakan prepared statement untuk mengamankan kueri)
        $stmt = $conn->prepare("insert into jadwal_piket (nama_siswa,hari) VALUES (?,?)");
        $stmt->bind_param("ss", $nama, $previousHari);

        if ($stmt->execute()) {
            echo '<script>alert("Data berhasil ditambahkan.");</script>';

            // Mengarahkan pengguna kembali ke halaman dengan hari yang telah ditambahkan datanya
            $redirectURL = 'admin.php?hari=' . $previousHari;
            echo '<script>window.location.href = "' . $redirectURL . '";</script>';
            exit; // Hentikan eksekusi skrip
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
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
        <h1>Tambah Nama Murid</h1>

        <form method="POST" action="">
            <label for="mapel">Nama Siswa:</label>
            <input type="text" name="nama_siswa" required><br>
            <input type="submit" name="insert" value="Insert">
            
        </form>
        <form method="POST" action="">
            <input type="submit" name="back" value="Kembali">
        </form>
    </body>
    </html>
