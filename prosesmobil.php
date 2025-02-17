<?php
include 'koneksi.php';

// Periksa apakah ada file yang diunggah
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['gambar']['tmp_name'];
    $fileName = $_FILES['gambar']['name'];
    $fileSize = $_FILES['gambar']['size'];
    $fileType = $_FILES['gambar']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Daftar ekstensi file yang diizinkan
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    if (in_array($fileExtension, $allowedExtensions)) {
        // Beri nama unik pada file untuk mencegah bentrok
        $newFileName = uniqid('mobil_', true) . '.' . $fileExtension;

        // Tentukan direktori tujuan penyimpanan file
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        // Pastikan direktori penyimpanan ada
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }

        // Pindahkan file dari lokasi sementara ke folder tujuan
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Data lain dari form
            $merek = $_POST['merek'];
            $no_plat = $_POST['no_plat'];
            $harga = $_POST['harga'];
            $denda = $_POST['denda'];
            $status = $_POST['status'];

            // Simpan data ke database
            $query = "INSERT INTO mobil (gambar, merek, no_plat, harga, denda, status) VALUES ('$newFileName', '$merek', '$no_plat', '$harga', '$denda', '$status')";

            if (mysqli_query($conn, $query)) {
                echo "<script>
                    alert('Data mobil berhasil disimpan.');
                    window.location.href = 'datamobil.php';
                </script>";
            } else {
                echo "<script>
                    alert('Terjadi kesalahan saat menyimpan ke database: " . mysqli_error($conn) . "');
                    window.history.back();
                </script>";
            }
        } else {
            echo "<script>
                alert('Terjadi kesalahan saat mengunggah file.');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Format file tidak didukung. Gunakan file .jpg, .jpeg, atau .png.');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Tidak ada file yang diunggah atau terjadi kesalahan.');
        window.history.back();
    </script>";
}

mysqli_close($conn);
?>
