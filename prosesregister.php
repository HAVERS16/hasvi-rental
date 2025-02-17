<?php
include 'koneksi.php';

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Validasi input
    if (empty($username) || empty($password) || empty($level)) {
        echo "Semua field harus diisi!";
    } else {
        // Cek apakah username sudah ada di database
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username sudah terdaftar. Silakan pilih username lain.";
        } else {
            // Menyisipkan data ke tabel user tanpa meng-hash password
            $stmt = $conn->prepare("INSERT INTO user (username, password, level) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $password, $level);

            if ($stmt->execute()) {
                echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>